// app/login/actions.ts
"use server";
import { redirect } from "next/navigation";

export type LoginState = { error?: string };

export async function login(
  _prev: LoginState,
  formData: FormData,
): Promise<LoginState> {
  const email = String(formData.get("email") ?? "")
    .trim()
    .toLowerCase();
  const senha = String(formData.get("senha") ?? "");

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
    return { error: "E-mail inválido." };
  if (senha.length < 6)
    return { error: "A senha deve ter no mínimo 6 caracteres." };

  // 🔌 PLUGUE AQUI (Supabase):
  // const supabase = await createClient();
  // const { error } = await supabase.auth.signInWithPassword({ email, password: senha });
  // if (error) return { error: "E-mail ou senha incorretos." };

  await new Promise((r) => setTimeout(r, 700)); // simula latência

  redirect("/painel");
}
