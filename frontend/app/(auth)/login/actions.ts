// app/login/actions.ts
"use server";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

export type LoginState = { error?: string };

const PHP = process.env.PHP_URL ?? "https://api.costadh.com.br";

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

  let res: Response;
  try {
    res = await fetch(`${PHP}/valida_login.php`, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      // ⚠️ use os mesmos `name` que o PHP lê em $_POST
      body: new URLSearchParams({ email, senha }),
      redirect: "manual", // capturamos o cookie antes do redirect do PHP
      cache: "no-store",
    });
  } catch {
    return { error: "Sistema indisponível. Tente novamente." };
  }

  const sessao = res.headers
    .getSetCookie()
    .find((c) => c.startsWith("PHPSESSID="))
    ?.split(";")[0]
    .split("=")[1];

  const destino = res.headers.get("location") ?? "";

  // Ajuste a regra conforme o PHP: em geral, sucesso redireciona para o painel
  if (!sessao || !/painel|dashboard|home/i.test(destino))
    return { error: "E-mail ou senha incorretos." };

  (await cookies()).set("PHPSESSID", sessao, {
    domain: ".costadh.com.br", // compartilha com o sistema.costadh.com.br
    path: "/",
    httpOnly: true,
    secure: true,
    sameSite: "lax",
  });

  redirect(new URL(destino, PHP).toString());
}
