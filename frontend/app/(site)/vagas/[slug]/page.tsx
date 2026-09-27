import Link from "next/link";
import { notFound } from "next/navigation";
import { ArrowLeft, MapPin, Clock, Briefcase } from "lucide-react";
import { vagas, getVaga } from "@/lib/vagas";
import CandidaturaForm from "./CandidaturaForm";

export const generateStaticParams = async () =>
  vagas.map((v) => ({ slug: v.slug }));

export async function generateMetadata({
  params,
}: {
  params: Promise<{ slug: string }>;
}) {
  const { slug } = await params;
  const v = getVaga(slug);
  return v
    ? {
        title: `${v.titulo} — ${v.local} | Costa DH`,
        description: v.resumo,
        alternates: { canonical: `/vagas/${v.slug}` },
        openGraph: {
          title: `${v.titulo} — ${v.local} | Costa DH`,
          description: v.resumo,
          url: `/vagas/${v.slug}`,
          type: "article",
        },
      }
    : { title: "Vaga não encontrada" };
}

const Bloco = ({ titulo, itens }: { titulo: string; itens: string[] }) => (
  <div className="mt-10">
    <h2 className="font-display text-2xl text-azul">{titulo}</h2>
    <ul className="mt-4 space-y-2.5">
      {itens.map((i) => (
        <li key={i} className="flex gap-3 text-azul/75">
          <span className="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-terracota" />
          {i}
        </li>
      ))}
    </ul>
  </div>
);

export default async function VagaPage({
  params,
}: {
  params: Promise<{ slug: string }>;
}) {
  const { slug } = await params;
  const v = getVaga(slug);
  if (!v) notFound();

  return (
    <main className="bg-off pb-24 pt-32">
      <article className="container-site max-w-3xl">
        <Link
          href="/vagas"
          className="inline-flex items-center gap-2 text-sm font-medium text-azul/60 transition-colors hover:text-terracota"
        >
          <ArrowLeft className="h-4 w-4" /> Todas as oportunidades
        </Link>

        <span className="mt-8 inline-block rounded-full bg-amarelo/20 px-3 py-1 text-xs font-semibold text-azul">
          {v.area}
        </span>
        <h1 className="mt-4 font-display text-4xl leading-tight text-azul md:text-5xl">
          {v.titulo}
        </h1>

        <div className="mt-5 flex flex-wrap gap-x-6 gap-y-2 text-sm text-azul/60">
          <span className="inline-flex items-center gap-1.5">
            <MapPin className="h-4 w-4" /> {v.local}
          </span>
          <span className="inline-flex items-center gap-1.5">
            <Clock className="h-4 w-4" /> {v.modelo}
          </span>
          <span className="inline-flex items-center gap-1.5">
            <Briefcase className="h-4 w-4" /> {v.tipo} · {v.senioridade}
          </span>
        </div>

        <p className="mt-8 text-lg leading-relaxed text-azul/80">{v.resumo}</p>

        <Bloco titulo="O que você vai fazer" itens={v.responsabilidades} />
        <Bloco titulo="Habilidades necessárias" itens={v.requisitos} />
        {v.diferenciais?.length ? (
          <Bloco titulo="Diferenciais" itens={v.diferenciais} />
        ) : null}

        <CandidaturaForm vaga={v.titulo} slug={v.slug} />
      </article>
    </main>
  );
}
