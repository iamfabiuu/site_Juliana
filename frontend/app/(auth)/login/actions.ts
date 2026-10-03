"use server";
import { redirect } from "next/navigation";

export type LoginState = { error?: string };

const API = (process.env.API_URL ?? "https://api.costadh.com.br/api").replace(/\/+$/, "");

export async function login(
  _prev: LoginState,
  formData: FormData,
): Promise<LoginState> {
  const email = String(formData.get("email") ?? "").trim().toLowerCase();
  const senha = String(formData.get("senha") ?? "");

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
    return { error: "E-mail inválido." };
  if (senha.length < 6)
    return { error: "A senha deve ter no mínimo 6 caracteres." };

  let destino: string;
  try {
    const res = await fetch(`${API}/login`, {
      method: "POST",
      headers: { "Content-Type": "application/json", Accept: "application/json" },
      body: JSON.stringify({ email, password: senha }),
      cache: "no-store",
    });
    const data = await res.json().catch(() => ({}));

    if (!res.ok) {
      if (res.status === 429) return { error: "Muitas tentativas. Aguarde 1 minuto." };
      if (res.status === 422) return { error: "Verifique os dados informados." };
      return { error: data?.message ?? "E-mail ou senha incorretos." };
    }
    if (!data?.redirect) return { error: "Resposta inesperada do sistema." };
    destino = data.redirect;
  } catch (e) {
    console.error("[login]", e);
    return { error: "Sistema indisponível. Tente novamente." };
  }

  redirect(destino); // fora do try: o redirect lança exceção interna do Next
}
