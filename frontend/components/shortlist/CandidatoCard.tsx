"use client";

import { useState } from "react";
import type { Candidato, Status } from "@/lib/shortlist";

interface Props {
    candidato: Candidato;
    index: number;
    onAcao: (id: number, acao: Status, comentario: string) => Promise<void>;
}

const STATUS: Record<Status, { label: string; cls: string }> = {
    aprovado: {
        label: "Aprovada",
        cls: "bg-emerald-50 text-emerald-700 ring-emerald-200",
    },
    recusado: {
        label: "Recusada",
        cls: "bg-rose-50 text-rose-700 ring-rose-200",
    },
    pendente: {
        label: "Aguardando",
        cls: "bg-[#F7F3EE] text-[#C98B4B] ring-[#C98B4B]/30",
    },
};

export default function CandidatoCard({ candidato, onAcao, index }: Props) {
    const [comentario, setComentario] = useState("");
    const [loading, setLoading] = useState<Status | null>(null);
    const [erro, setErro] = useState("");

    const status = STATUS[candidato.status ?? "pendente"];
    const iniciais = candidato.nome
        .split(" ")
        .filter(Boolean)
        .map((p) => p[0])
        .slice(0, 2)
        .join("")
        .toUpperCase();

    const agir = async (acao: Status) => {
        setLoading(acao);
        setErro("");
        try {
            await onAcao(candidato.id, acao, comentario);
            setComentario("");
        } catch {
            setErro("Não foi possível registrar. Tente novamente.");
        } finally {
            setLoading(null);
        }
    };

    return (
        <article
            className="rounded-2xl border border-[#0E3049]/10 bg-white p-6 shadow-sm transition
                 hover:-translate-y-0.5 hover:shadow-md animate-[fadeUp_.5s_ease_both]"
            style={{ animationDelay: `${index * 80}ms` }}
        >
            <header className="flex items-start gap-4">
                <div
                    className="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-[#0E3049]
                        font-[family-name:var(--font-serif)] text-lg text-white"
                >
                    {iniciais}
                </div>
                <div className="min-w-0 flex-1">
                    <h3 className="font-[family-name:var(--font-serif)] text-xl leading-tight text-[#0E3049]">
                        {candidato.nome}
                    </h3>
                    {candidato.curriculo_url && (
                        <a
                            href={candidato.curriculo_url}
                            target="_blank"
                            rel="noreferrer"
                            className="text-xs font-semibold text-[#C98B4B] hover:underline"
                        >
                            Ver currículo →
                        </a>
                    )}
                </div>
                <span
                    className={`rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wide ring-1 ${status.cls}`}
                >
                    {status.label}
                </span>
            </header>

            <textarea
                value={comentario}
                onChange={(e) => setComentario(e.target.value)}
                placeholder="Deixe um comentário (opcional)"
                rows={2}
                className="mt-5 w-full resize-none rounded-lg border border-[#0E3049]/15 bg-[#F7F3EE] p-3 text-sm
                   text-[#0E3049] placeholder:text-[#0E3049]/40 focus:border-[#C98B4B] focus:outline-none"
            />

            {erro && <p className="mt-2 text-xs text-rose-600">{erro}</p>}

            <div className="mt-3 grid grid-cols-2 gap-3">
                <button
                    type="button"
                    onClick={() => agir("recusado")}
                    disabled={!!loading}
                    className="rounded-full border border-[#0E3049]/25 py-2.5 text-xs font-bold text-[#0E3049]
                     transition hover:bg-[#0E3049]/5 disabled:opacity-50"
                >
                    {loading === "recusado" ? "Enviando..." : "Recusar"}
                </button>
                <button
                    type="button"
                    onClick={() => agir("aprovado")}
                    disabled={!!loading}
                    className="rounded-full bg-[#0E3049] py-2.5 text-xs font-bold text-white
                     transition hover:bg-[#C98B4B] disabled:opacity-50"
                >
                    {loading === "aprovado" ? "Enviando..." : "Aprovar"}
                </button>
            </div>
        </article>
    );
}
