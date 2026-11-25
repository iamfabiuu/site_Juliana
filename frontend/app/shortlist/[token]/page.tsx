"use client";

import { useEffect, useRef, useState } from "react";
import { useParams } from "next/navigation";
import {
    getShortlist,
    registrarAcao,
    ApiError,
    type Shortlist,
    type Status,
} from "@/lib/shortlist";
import CandidatoCard from "@/components/shortlist/CandidatoCard";
import ComparativoTable from "@/components/shortlist/ComparativoTable";
import StatusScreen from "@/components/shortlist/StatusScreen";

const Eyebrow = ({ children }: { children: React.ReactNode }) => (
    <p className="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#0E3049]/70">
        <span className="h-1.5 w-1.5 rounded-full bg-[#C98B4B]" /> {children}
    </p>
);

const serif = "font-[family-name:var(--font-serif)]";

export default function ShortlistPage() {
    const { token } = useParams<{ token: string }>();
    const [data, setData] = useState<Shortlist | null>(null);
    const [erro, setErro] = useState<ApiError | null>(null);
    const [toast, setToast] = useState("");
    const timer = useRef<ReturnType<typeof setTimeout>>(undefined);

    useEffect(() => {
        if (!token) return;
        getShortlist(token)
            .then(setData)
            .catch((e) =>
                setErro(e instanceof ApiError ? e : new ApiError("Erro", 500)),
            );
    }, [token]);

    useEffect(() => () => clearTimeout(timer.current), []);

    const handleAcao = async (id: number, acao: Status, comentario: string) => {
        await registrarAcao(token, id, acao, comentario);
        setData(
            (d) =>
                d && {
                    ...d,
                    candidatos: d.candidatos.map((c) =>
                        c.id === id ? { ...c, status: acao } : c,
                    ),
                },
        );
        setToast(
            acao === "aprovado"
                ? "Candidata aprovada!"
                : "Feedback registrado.",
        );
        clearTimeout(timer.current);
        timer.current = setTimeout(() => setToast(""), 2500);
    };

    if (erro?.status === 410)
        return (
            <StatusScreen
                icon="⏳"
                title="Link expirado"
                text="Solicite um novo link à Costa DH."
            />
        );
    if (erro)
        return (
            <StatusScreen
                icon="◇"
                title="Shortlist não encontrada"
                text="Confira se o link está correto."
            />
        );
    if (!data)
        return (
            <StatusScreen
                icon={<span className="inline-block animate-spin">◌</span>}
                title="Carregando..."
            />
        );

    const total = data.candidatos.length;
    const avaliados = data.candidatos.filter(
        (c) => c.status && c.status !== "pendente",
    ).length;
    const concluido = total > 0 && avaliados === total;

    return (
        <div className="min-h-screen bg-white text-[#0E3049]">
            {/* Navbar */}
            <nav className="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
                <img
                    src="/LOGO COMPACTA (costa dh ponto).svg"
                    alt="Costa DH"
                    className="h-7"
                />
                <a
                    href="https://costadh.com.br"
                    className="text-xs font-semibold hover:text-[#C98B4B]"
                >
                    ← Voltar ao site
                </a>
            </nav>

            {/* Hero */}
            <section className="bg-[#ECE5DA]">
                <div className="mx-auto max-w-5xl px-6 py-14 animate-[fadeUp_.5s_ease_both]">
                    <Eyebrow>Acesso exclusivo · Resultado da seleção</Eyebrow>
                    <h1 className={`${serif} mt-4 text-5xl`}>
                        Olá, {data.cliente_nome}
                    </h1>
                    <p className="mt-4 max-w-md text-sm leading-relaxed text-[#0E3049]/75">
                        Aqui está a shortlist de candidatos analisados e
                        selecionados no seu processo.
                    </p>

                    <div className="mt-8 flex gap-10">
                        {[
                            [String(total), "Candidatas"],
                            [data.data_envio, "Data de envio"],
                            [`${avaliados}/${total}`, "Avaliadas"],
                        ].map(([v, l]) => (
                            <div key={l}>
                                <p className={`${serif} text-2xl`}>{v}</p>
                                <p className="mt-1 text-[10px] font-semibold uppercase tracking-widest text-[#0E3049]/60">
                                    {l}
                                </p>
                            </div>
                        ))}
                    </div>

                    {data.mensagem && (
                        <div className="mt-8 max-w-lg rounded-xl border-l-2 border-[#C98B4B] bg-white px-5 py-4 text-sm leading-relaxed text-[#0E3049]/80">
                            {data.mensagem}
                        </div>
                    )}
                </div>
            </section>

            <main className="mx-auto max-w-5xl px-6 py-14">
                {/* Comparativo */}
                <div className="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <Eyebrow>Quadro comparativo</Eyebrow>
                        <h2 className={`${serif} mt-3 text-4xl`}>
                            Visão geral dos candidatos
                        </h2>
                        <p className="mt-1 text-xs text-[#0E3049]/60">
                            Compare os candidatos lado a lado. Se preferir,
                            baixe a planilha completa.
                        </p>
                    </div>
                    {data.planilha_url && (
                        <a
                            href={data.planilha_url}
                            className="rounded-full bg-[#0E3049] px-6 py-3 text-xs font-bold text-white transition hover:bg-[#C98B4B]"
                        >
                            ⤓ Baixar planilha
                        </a>
                    )}
                </div>
                <ComparativoTable data={data} />

                {/* Avaliação */}
                <div className="mt-20">
                    <Eyebrow>Sua decisão</Eyebrow>
                    <h2 className={`${serif} mt-3 text-4xl`}>
                        Avalie cada candidata
                    </h2>
                    <div className="mt-5 h-1.5 overflow-hidden rounded-full bg-[#ECE5DA]">
                        <div
                            className="h-full bg-[#C98B4B] transition-all duration-700"
                            style={{
                                width: `${total ? (avaliados / total) * 100 : 0}%`,
                            }}
                        />
                    </div>
                </div>

                {concluido && (
                    <div className="mt-6 rounded-xl border-l-2 border-[#C98B4B] bg-[#ECE5DA] p-4 text-sm animate-[fadeUp_.4s_ease_both]">
                        Avaliação concluída! Nossa equipe já foi notificada e
                        retornará em breve.
                    </div>
                )}

                <section className="mt-8 grid gap-6 md:grid-cols-2">
                    {data.candidatos.map((c, i) => (
                        <CandidatoCard
                            key={c.id}
                            candidato={c}
                            index={i}
                            onAcao={handleAcao}
                        />
                    ))}
                </section>
            </main>

            <footer className="border-t border-[#0E3049]/10 py-8 text-center text-[11px] text-[#0E3049]/50">
                © Costa DH · Desenvolvimento Humano · Powered by Lumminin
            </footer>

            {toast && (
                <div
                    role="status"
                    className="fixed bottom-6 left-1/2 -translate-x-1/2 rounded-full bg-[#0E3049] px-6 py-3 text-sm font-semibold text-white shadow-2xl animate-[fadeUp_.3s_ease_both]"
                >
                    {toast}
                </div>
            )}
        </div>
    );
}
