import { NextResponse } from "next/server";

export async function POST(req: Request) {
    const body = await req.json();
    console.log("Ação recebida:", body); // aparece no terminal do npm run dev
    return NextResponse.json({ ok: true });
}
