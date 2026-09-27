"use client";
import { useMemo, useState } from "react";
import { ArrowRight, RotateCcw, Check, AlertCircle } from "lucide-react";

type P = { q: string; dim: string };

const perguntas: P[] = [
  { q: "Nossos líderes dão feedback com frequência e qualidade.", dim: "Liderança" },
  { q: "Existe trilha de desenvolvimento para lideranças.", dim: "Liderança" },
  { q: "A cultura declarada é vivida no dia a dia.", dim: "Cultura" },
  { q: "Conflitos são tratados de forma estruturada.", dim: "Cultura" },
  { q: "Temos indicadores de clima acompanhados periodicamente.", dim: "Dados" },
  { q: "As pessoas entendem como seu trabalho gera resultado.", dim: "Dados" },
  { q: "Sabemos identificar riscos psicossociais (NR-01).", dim: "Conformidade" },
  { q: "O onboarding prepara de fato as novas pessoas.", dim: "Conformidade" },
];

const escala = ["Nunca", "Raramente", "Às vezes", "Sempre"];

const faixas = [
  { max: 40, cor: "#ca8c47", t: "Cultura em risco", d: "Há lacunas críticas. O ponto de partida é um diagnóstico estruturado antes de qualquer treinamento.", acao: "Diagnóstico organizacional completo" },
  { max: 70, cor: "#ebc000", t: "Cultura em construção", d: "As bases existem, mas falta consistência e medição. Trilhas de liderança e indicadores destravam rápido.", acao: "Trilha de líderes + painel de indicadores" },
  { max: 101, cor: "#87997f", t: "Cultura madura", d: "Excelente base. O próximo salto está em performance, sucessão e sustentação dos resultados.", acao: "Programa de sucessão e alta performance" },
];

export default function Termometro() {
  const [resp, setResp] = useState<number[]>(Array(perguntas.length).fill(0));
  const [enviado, setEnviado] = useState(false);
  const [erro, setErro] = useState(false);

  const feitas = resp.filter((r) => r > 0).length;
  const respondido = feitas === perguntas.length;
  const progresso = Math.round((feitas / perguntas.length) * 100);

  const score = Math.round((resp.reduce((a, b) => a + b, 0) / (perguntas.length * 4)) * 100);
  const faixa = faixas.find((f) => score < f.max)!;

  const dims = useMemo(() => {
    const map = new Map<string, number[]>();
    perguntas.forEach((p, i) => {
      map.set(p.dim, [...(map.get(p.dim) ?? []), resp[i]]);
    });
    return [...map.entries()].map(([dim, vals]) => ({
      dim,
      pct: Math.round((vals.reduce((a, b) => a + b, 0) / (vals.length * 4)) * 100),
    }));
  }, [resp]);

  const set = (i: number, v: number) => {
    setResp((prev) => prev.map((r, idx) => (idx === i ? v : r)));
    setErro(false);
  };

  const reset = () => {
    setResp(Array(perguntas.length).fill(0));
    setEnviado(false);
    setErro(false);
  };

  const R = 54;
  const C = 2 * Math.PI * R;

  return (
    <section id="termometro" className="section border-y border-azul/10 bg-sage/25">
      <div className="container-site grid gap-14 lg:grid-cols-[1fr_.85fr] lg:items-start">
        {/* PERGUNTAS */}
        <div>
          <span className="eyebrow">Ferramenta gratuita</span>
          <h2 className="h2 mt-4">Termômetro de Cultura</h2>
          <p className="lead mt-5">
            Oito perguntas, dois minutos. Descubra o nível de maturidade da gestão de
            pessoas na sua empresa e receba um plano de ação inicial.
          </p>

          {/* progresso */}
          <div className="sticky top-20 z-10 mt-9 rounded-xl2 border border-azul/10 bg-off/90 p-4 backdrop-blur">
            <div className="flex items-center justify-between text-xs font-semibold uppercase tracking-widest text-azul/60">
              <span>{feitas} de {perguntas.length} respondidas</span>
              <span>{progresso}%</span>
            </div>
            <div className="mt-2.5 h-1.5 overflow-hidden rounded-full bg-azul/10">
              <div
                className="h-full rounded-full bg-terracota transition-all duration-500"
                style={{ width: `${progresso}%` }}
              />
            </div>
          </div>

          <div className="mt-10 space-y-8">
            {perguntas.map((p, i) => (
              <fieldset key={p.q} className="border-0 p-0">
                <legend className="w-full">
                  <span className="text-[11px] font-semibold uppercase tracking-widest text-terracota">
                    {p.dim}
                  </span>
                  <p className="mt-1.5 font-medium leading-snug text-azul">
                    <span className="text-azul/40">{i + 1}.</span> {p.q}
                  </p>
                </legend>
                <div className="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-4">
                  {escala.map((label, idx) => {
                    const v = idx + 1;
                    const ativo = resp[i] === v;
                    return (
                      <button
                        key={v}
                        type="button"
                        aria-pressed={ativo}
                        onClick={() => set(i, v)}
                        className={`rounded-lg border py-2.5 text-xs font-semibold transition-all duration-300 ${
                          ativo
                            ? "-translate-y-0.5 border-azul bg-azul text-off shadow-md"
                            : "border-azul/20 text-azul/70 hover:border-terracota hover:text-terracota"
                        }`}
                      >
                        {label}
                      </button>
                    );
                  })}
                </div>
              </fieldset>
            ))}
          </div>
        </div>

        {/* RESULTADO */}
        <aside className="lg:sticky lg:top-28 rounded-xl2 bg-azul p-9 text-off">
          <p className="text-xs font-semibold uppercase tracking-widest text-off/55">
            Seu resultado
          </p>

          {/* gauge radial */}
          <div className="relative mx-auto mt-6 h-[150px] w-[150px]">
            <svg viewBox="0 0 128 128" className="h-full w-full -rotate-90">
              <circle cx="64" cy="64" r={R} fill="none" stroke="rgba(236,230,218,.14)" strokeWidth="9" />
              <circle
                cx="64" cy="64" r={R} fill="none"
                stroke={respondido ? faixa.cor : "transparent"}
                strokeWidth="9" strokeLinecap="round"
                strokeDasharray={C}
                strokeDashoffset={C - (C * (respondido ? score : 0)) / 100}
                style={{ transition: "stroke-dashoffset 1s cubic-bezier(.22,1,.36,1)" }}
              />
            </svg>
            <div className="absolute inset-0 flex flex-col items-center justify-center">
              <span
                className="font-display text-4xl leading-none"
                style={{ color: respondido ? faixa.cor : "rgba(236,230,218,.35)" }}
              >
                {respondido ? `${score}%` : "—"}
              </span>
              <span className="mt-1 text-[10px] uppercase tracking-widest text-off/40">
                maturidade
              </span>
            </div>
          </div>

          {respondido ? (
            <>
              <h3 className="mt-6 text-center font-display text-2xl" style={{ color: faixa.cor }}>
                {faixa.t}
              </h3>
              <p className="mt-3 text-center text-sm leading-relaxed text-off/75">{faixa.d}</p>

              {/* breakdown */}
              <div className="mt-7 space-y-3 border-t border-off/12 pt-6">
                <p className="text-[11px] font-semibold uppercase tracking-widest text-off/45">
                  Por dimensão
                </p>
                {dims.map((d) => (
                  <div key={d.dim}>
                    <div className="flex justify-between text-xs text-off/70">
                      <span>{d.dim}</span>
                      <span className="font-semibold">{d.pct}%</span>
                    </div>
                    <div className="mt-1.5 h-1.5 overflow-hidden rounded-full bg-off/12">
                      <div
                        className="h-full rounded-full transition-all duration-700"
                        style={{
                          width: `${d.pct}%`,
                          background: d.pct < 50 ? "#ca8c47" : d.pct < 75 ? "#ebc000" : "#87997f",
                        }}
                      />
                    </div>
                  </div>
                ))}
              </div>

              <p className="mt-6 flex items-start gap-2 rounded-xl bg-off/[0.07] p-4 text-xs leading-relaxed text-off/75">
                <ArrowRight size={14} className="mt-0.5 shrink-0 text-amarelo" />
                <span>
                  <strong className="text-off">Recomendação:</strong> {faixa.acao}
                </span>
              </p>

              {!enviado ? (
                <form
                  onSubmit={(e) => { e.preventDefault(); setEnviado(true); }}
                  className="mt-6 space-y-3"
                >
                  <input
                    required type="email" placeholder="Seu e-mail corporativo"
                    className="w-full rounded-xl border border-off/20 bg-off/10 px-4 py-3 text-sm placeholder:text-off/45 focus:border-amarelo focus:outline-none"
                  />
                  <button className="btn-light w-full justify-center">
                    Receber diagnóstico completo <ArrowRight size={16} />
                  </button>
                  <p className="text-[11px] leading-relaxed text-off/40">
                    Sem spam. Seus dados são usados apenas para o envio do relatório.
                  </p>
                </form>
              ) : (
                <p className="mt-6 flex items-start gap-2 rounded-xl border border-amarelo/40 bg-amarelo/15 p-4 text-sm">
                  <Check size={16} className="mt-0.5 shrink-0 text-amarelo" />
                  Pronto! Enviamos seu relatório. A Juliana entrará em contato para comentar o resultado. 🎯
                </p>
              )}

              <button
                onClick={reset}
                className="mt-5 inline-flex items-center gap-2 text-xs text-off/50 transition-colors hover:text-amarelo"
              >
                <RotateCcw size={13} /> Refazer
              </button>
            </>
          ) : (
            <>
              <p className="mt-6 text-center text-sm leading-relaxed text-off/60">
                Responda às {perguntas.length} afirmações para liberar o seu score,
                o detalhamento por dimensão e a recomendação inicial.
              </p>
              {erro && (
                <p className="mt-4 flex items-center gap-2 text-xs text-amarelo">
                  <AlertCircle size={14} /> Faltam {perguntas.length - feitas} respostas.
                </p>
              )}
            </>
          )}
        </aside>
      </div>
    </section>
  );
}
