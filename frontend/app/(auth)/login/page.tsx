// app/login/page.tsx
import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import LoginForm from "./LoginForm";

export const metadata: Metadata = {
  title: "Login | Costa DH",
  description: "Acesse o painel de clientes da Costa Desenvolvimento Humano.",
  robots: { index: false },
};

export default function LoginPage() {
  return (
    <main className="grid min-h-screen lg:grid-cols-2">
      {/* Coluna do formulário */}
      <div className="flex flex-col justify-center bg-off px-6 py-16 sm:px-12 lg:px-20">
        <div className="mx-auto w-full max-w-sm">
          <Link
            href="/"
            aria-label="Voltar para a página inicial"
            className="inline-block"
          >
            <Image
              src="/logo_sec_corrida.svg"
              alt="Costa DH"
              width={160}
              height={40}
              priority
              className="h-9 w-auto"
            />
          </Link>

          <h1 className="mt-12 font-display text-3xl leading-tight text-azul">
            Bem-vindo de volta.
          </h1>
          <p className="mt-2 text-sm text-azul/60">
            Acesse seus diagnósticos, relatórios e planos de ação.
          </p>

          <LoginForm />

          <p className="mt-10 text-center text-sm text-azul/60">
            Ainda não é cliente?{" "}
            <Link
              href="/#contato"
              className="font-semibold text-terracota hover:underline"
            >
              Agende um diagnóstico
            </Link>
          </p>
        </div>
      </div>

      {/* Coluna institucional */}
      <aside className="relative hidden flex-col justify-end overflow-hidden bg-azul p-16 lg:flex">
        <div
          aria-hidden
          className="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-terracota/20 blur-3xl"
        />
        <div
          aria-hidden
          className="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-amarelo/10 blur-3xl"
        />
        <blockquote className="relative max-w-md">
          <p className="font-display text-3xl leading-snug text-off">
            “Cultura não se decreta. Se mede, se cuida e se constrói todos os
            dias.”
          </p>
          <footer className="mt-6 text-sm text-off/60">
            Juliana Costa · Costa Desenvolvimento Humano
          </footer>
        </blockquote>
      </aside>
    </main>
  );
}
