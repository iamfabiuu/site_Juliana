// app/vagas/page.tsx
import type { Metadata } from "next";
import Link from "next/link";
import { ArrowRight, Compass, HeartHandshake, Sparkles } from "lucide-react";
import { vagas } from "@/lib/vagas";
import VagasList from "./VagasList";

export const metadata: Metadata = {
  title: "Trabalhe com a gente | Costa DH",
  description:
    "Vagas abertas na Costa Desenvolvimento Humano. Consultoria em cultura, liderança e performance em Recife/PE.",
  alternates: { canonical: "/vagas" },
  openGraph: {
    title: "Trabalhe com a gente | Costa DH",
    description:
      "Estratégia que desenvolve pessoas, inclusive as nossas. Veja as vagas abertas.",
    url: "/vagas",
    type: "website",
  },
};

const valores = [
  {
    icon: Compass,
    titulo: "Método antes de opinião",
    texto:
      "Diagnóstico, dado e hipótese testável. Achismo aqui não passa da porta.",
  },
  {
    icon: HeartHandshake,
    titulo: "Conversas difíceis com cuidado",
    texto: "Feedback direto, sem crueldade. Clareza é uma forma de respeito.",
  },
  {
    icon: Sparkles,
    titulo: "Autonomia com contexto",
    texto: "Você decide o caminho; a gente combina o destino e sustenta junto.",
  },
];

export default function VagasPage() {
  const abertas = vagas.length;

  return (
    <main className="bg-off pb-24 pt-32">
      {/* HERO */}
      <section className="container-site">
        <div className="grid items-end gap-10 md:grid-cols-[1.4fr_1fr]">
          <div>
            <p className="text-sm font-semibold uppercase tracking-widest text-terracota">
              Carreiras
            </p>
            <h1 className="mt-3 max-w-2xl font-display text-4xl leading-tight text-azul md:text-5xl">
              Estratégia que desenvolve pessoas, inclusive as nossas.
            </h1>
            <p className="mt-5 max-w-xl text-lg leading-relaxed text-azul/70">
              Somos um time pequeno, técnico e inquieto. Se você gosta de
              método, dados e conversas difíceis feitas com cuidado, vem com a
              gente.
            </p>

            <div className="mt-8 flex flex-wrap items-center gap-3">
              <a
                href="#vagas"
                className="group inline-flex items-center gap-2 rounded-full bg-azul px-7 py-3.5 font-semibold text-off transition-all duration-300 hover:scale-[1.03] hover:bg-terracota"
              >
                Ver Oportunidades
                <ArrowRight
                  size={18}
                  className="transition-transform duration-300 group-hover:translate-x-1"
                />
              </a>
              <Link
                href="/sobre"
                className="inline-flex items-center gap-2 rounded-full border border-azul/20 px-7 py-3.5 font-semibold text-azul transition-colors duration-300 hover:border-azul hover:bg-azul/5"
              >
                Conhecer a Costa DH
              </Link>
            </div>
          </div>

          <dl className="grid grid-cols-2 gap-4 md:grid-cols-1">
            <div className="rounded-xl2 border border-azul/10 bg-white/60 p-6">
              <dt className="text-xs font-semibold uppercase tracking-widest text-azul/50">
                Oportunidades abertas
              </dt>
              <dd className="mt-1 font-display text-4xl text-terracota">
                {String(abertas).padStart(2, "0")}
              </dd>
            </div>
            <div className="rounded-xl2 border border-azul/10 bg-white/60 p-6">
              <dt className="text-xs font-semibold uppercase tracking-widest text-azul/50">
                Base
              </dt>
              <dd className="mt-1 font-display text-2xl text-azul">
                Recife/PE · híbrido
              </dd>
            </div>
          </dl>
        </div>
      </section>

      {/* VALORES */}
      <section className="container-site mt-20">
        <h2 className="font-display text-2xl text-azul md:text-3xl">
          Como a gente trabalha
        </h2>
        <ul className="mt-8 grid gap-5 md:grid-cols-3">
          {valores.map(({ icon: Icon, titulo, texto }) => (
            <li
              key={titulo}
              className="rounded-xl2 border border-azul/10 bg-white/60 p-7 transition-all duration-300 hover:-translate-y-1 hover:border-terracota/40 hover:shadow-[0_20px_50px_-30px_rgba(0,0,0,.35)]"
            >
              <Icon size={22} className="text-terracota" />
              <h3 className="mt-4 font-display text-xl text-azul">{titulo}</h3>
              <p className="mt-2 text-sm leading-relaxed text-azul/70">
                {texto}
              </p>
            </li>
          ))}
        </ul>
      </section>

      {/* VAGAS */}
      <section id="vagas" className="mt-20 scroll-mt-28">
        <VagasList vagas={vagas} />
      </section>

      {/* CTA */}
      <section className="container-site">
        <div className="mt-16 flex flex-wrap items-center justify-between gap-6 rounded-xl2 bg-terracota --color-bg-base p-9 shadow-[0_24px_60px_-28px_rgba(0,0,0,.45)]">
          <p className="max-w-xl font-display text-2xl text-off leading-snug">
            Não achou sua oportunidade? Manda seu currículo que a gente guarda com
            carinho.
          </p>

          <a
            href="mailto:contato@costadh.com.br?subject=Banco%20de%20talentos"
            className="group shrink-0 inline-flex items-center gap-2 rounded-full bg-off px-7 py-3.5 font-semibold text-terracota transition-all duration-300 hover:scale-[1.03] hover:bg-azul hover:text-off"
          >
            Entrar no banco de talentos
            <ArrowRight
              size={18}
              className="transition-transform duration-300 group-hover:translate-x-1"
            />
          </a>
        </div>
      </section>
    </main>
  );
}
