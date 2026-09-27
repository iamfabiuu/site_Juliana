// app/vagas/VagasList.tsx
"use client";
import { useMemo, useState } from "react";
import Link from "next/link";
import { MapPin, Briefcase, Clock, ArrowRight, SearchX } from "lucide-react";
import type { Vaga } from "@/lib/vagas";

const FILTROS = ["Todas", "Presencial", "Híbrido", "Remoto"] as const;

export default function VagasList({ vagas }: { vagas: Vaga[] }) {
  const [filtro, setFiltro] = useState<(typeof FILTROS)[number]>("Todas");
  const [busca, setBusca] = useState("");

  const lista = useMemo(() => {
    const q = busca.trim().toLowerCase();
    return vagas.filter(
      (v) =>
        (filtro === "Todas" || v.modelo === filtro) &&
        (!q ||
          v.titulo.toLowerCase().includes(q) ||
          v.area.toLowerCase().includes(q)),
    );
  }, [vagas, filtro, busca]);

  return (
    <section className="container-site mt-14">
      <div className="flex flex-col gap-4 border-b border-azul/10 pb-6 md:flex-row md:items-center md:justify-between">
        <div
          className="flex flex-wrap gap-2"
          role="tablist"
          aria-label="Filtrar por modelo"
        >
          {FILTROS.map((f) => (
            <button
              key={f}
              role="tab"
              aria-selected={filtro === f}
              onClick={() => setFiltro(f)}
              className={`rounded-full px-4 py-2 text-sm font-medium transition-colors ${
                filtro === f
                  ? "bg-azul text-off"
                  : "border border-azul/20 text-azul/70 hover:border-terracota hover:text-terracota"
              }`}
            >
              {f}
            </button>
          ))}
        </div>

        <input
          type="search"
          value={busca}
          onChange={(e) => setBusca(e.target.value)}
          placeholder="Buscar cargo ou área..."
          aria-label="Buscar vaga"
          className="w-full rounded-full border border-azul/20 bg-transparent px-5 py-2.5 text-sm text-azul outline-none transition-colors placeholder:text-azul/40 focus:border-terracota md:w-72"
        />
      </div>

      {lista.length === 0 ? (
        <div className="flex flex-col items-center gap-3 py-24 text-center">
          <SearchX className="h-8 w-8 text-azul/30" />
          <p className="font-display text-xl text-azul">
            Nenhuma vaga com esse perfil agora.
          </p>
          <p className="max-w-sm text-sm text-azul/60">
            Mas talento bom a gente guarda. Manda seu currículo em{" "}
            <a
              href="mailto:talentos@costadh.com.br"
              className="font-semibold text-terracota hover:underline"
            >
              talentos@costadh.com.br
            </a>
            .
          </p>
        </div>
      ) : (
        <ul className="mt-8 grid gap-5 md:grid-cols-2">
          {lista.map((v) => (
            <li key={v.slug}>
              <Link
                href={`/vagas/${v.slug}`}
                className="group flex h-full flex-col rounded-xl2 border border-azul/10 bg-white p-7 transition-all hover:-translate-y-1 hover:border-terracota/40 hover:shadow-lg"
              >
                <div className="flex items-center gap-2">
                  <span className="rounded-full bg-amarelo/20 px-3 py-1 text-xs font-semibold text-azul">
                    {v.area}
                  </span>
                  <span className="text-xs text-azul/50">{v.senioridade}</span>
                </div>

                <h2 className="mt-4 font-display text-2xl leading-snug text-azul">
                  {v.titulo}
                </h2>
                <p className="mt-3 flex-1 text-sm leading-relaxed text-azul/70">
                  {v.resumo}
                </p>

                <div className="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-xs text-azul/60">
                  <span className="inline-flex items-center gap-1.5">
                    <MapPin className="h-3.5 w-3.5" /> {v.local}
                  </span>
                  <span className="inline-flex items-center gap-1.5">
                    <Clock className="h-3.5 w-3.5" /> {v.modelo}
                  </span>
                  <span className="inline-flex items-center gap-1.5">
                    <Briefcase className="h-3.5 w-3.5" /> {v.tipo}
                  </span>
                </div>

                <span className="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-terracota">
                  Ver Oportunidade
                  <ArrowRight className="h-4 w-4 transition-transform group-hover:translate-x-1" />
                </span>
              </Link>
            </li>
          ))}
        </ul>
      )}
    </section>
  );
}
