// app/login/LoginForm.tsx
"use client";
import { useActionState } from "react";
import { useFormStatus } from "react-dom";
import { useState } from "react";
import Link from "next/link";
import { Eye, EyeOff, AlertCircle, Loader2 } from "lucide-react";
import { login, type LoginState } from "./actions";

const inputCls =
  "w-full rounded-lg border border-azul/20 bg-white px-4 py-3 text-sm text-azul outline-none transition-colors placeholder:text-azul/35 focus:border-terracota focus:ring-2 focus:ring-terracota/20";

function Submit() {
  const { pending } = useFormStatus();
  return (
    <button
      type="submit"
      disabled={pending}
      className="btn-primary mt-2 w-full justify-center disabled:cursor-not-allowed disabled:opacity-60"
    >
      {pending ? (
        <>
          <Loader2 className="h-4 w-4 animate-spin" /> Entrando...
        </>
      ) : (
        "Entrar"
      )}
    </button>
  );
}

export default function LoginForm() {
  const [state, formAction] = useActionState<LoginState, FormData>(login, {});
  const [ver, setVer] = useState(false);

  return (
    <form action={formAction} className="mt-10 space-y-5" noValidate>
      {state.error && (
        <div
          role="alert"
          className="flex items-start gap-2.5 rounded-lg border border-terracota/30 bg-terracota/10 px-4 py-3 text-sm text-terracota"
        >
          <AlertCircle className="mt-0.5 h-4 w-4 shrink-0" />
          {state.error}
        </div>
      )}

      <div>
        <label
          htmlFor="email"
          className="mb-1.5 block text-sm font-medium text-azul"
        >
          E-mail
        </label>
        <input
          id="email"
          name="email"
          type="email"
          autoComplete="email"
          required
          placeholder="voce@empresa.com.br"
          className={inputCls}
        />
      </div>

      <div>
        <div className="mb-1.5 flex items-center justify-between">
          <label htmlFor="senha" className="text-sm font-medium text-azul">
            Senha
          </label>
          <Link
            href="/recuperar-senha"
            className="text-xs font-medium text-azul/60 hover:text-terracota"
          >
            Esqueci minha senha
          </Link>
        </div>
        <div className="relative">
          <input
            id="senha"
            name="senha"
            type={ver ? "text" : "password"}
            autoComplete="current-password"
            required
            minLength={6}
            placeholder="••••••••"
            className={`${inputCls} pr-12`}
          />
          <button
            type="button"
            onClick={() => setVer((v) => !v)}
            aria-label={ver ? "Ocultar senha" : "Mostrar senha"}
            className="absolute right-3 top-1/2 -translate-y-1/2 text-azul/40 transition-colors hover:text-azul"
          >
            {ver ? <EyeOff className="h-4 w-4" /> : <Eye className="h-4 w-4" />}
          </button>
        </div>
      </div>

      <label className="flex cursor-pointer items-center gap-2.5 text-sm text-azul/70">
        <input
          type="checkbox"
          name="lembrar"
          defaultChecked
          className="h-4 w-4 rounded border-azul/30 text-terracota focus:ring-terracota/30"
        />
        Manter-me conectado
      </label>

      <Submit />
    </form>
  );
}
