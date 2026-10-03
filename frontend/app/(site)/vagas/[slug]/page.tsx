import Link from "next/link";
import { notFound } from "next/navigation";
import {
    ArrowLeft,
    ArrowRight,
    MapPin,
    Clock,
    Briefcase,
    GraduationCap,
    CalendarDays,
} from "lucide-react";
import { getVagas } from "@/lib/vagas";
import { loadVaga, parseSecoes, type Secao } from "@/lib/normalizeVaga";
import CandidaturaForm from "./CandidaturaForm";

export const revalidate = 60;

/* ---------- Next ---------- */

export const generateStaticParams = async () => {
    const res: any = await getVagas();
    const lista = Array.isArray(res) ? res : (res?.data ?? []);
    return lista
        .map((v: any) => v?.slug ?? v?.attributes?.slug)
        .filter(Boolean)
        .map((slug: string) => ({ slug }));
};

export async function generateMetadata({
    params,
}: {
    params: Promise<{ slug: string }>;
}) {
    const { slug } = await params;
    const v = await loadVaga(slug);
    if (!v?.titulo) return { title: "Vaga não encontrada | Costa DH" };

    const title = `${v.titulo} — ${v.local} | Costa DH`;
    return {
        title,
        description: v.resumo,
        alternates: { canonical: `/vagas/${slug}` },
        openGraph: {
            title,
            description: v.resumo,
            url: `/vagas/${slug}`,
            type: "article",
        },
    };
}

/* ---------- UI ---------- */

const Bloco = ({ titulo, itens }: { titulo: string; itens: string[] }) =>
    itens.length ? (
        <section className="mt-12">
            <h2 className="font-display text-2xl text-azul">{titulo}</h2>
            <ul className="mt-5 space-y-3">
                {itens.map((i, idx) => (
                    <li
                        key={`${idx}-${i}`}
                        className="flex gap-3 leading-relaxed text-azul/75"
                    >
                        <span className="mt-2.5 h-1.5 w-1.5 shrink-0 rounded-full bg-terracota" />
                        {i}
                    </li>
                ))}
            </ul>
        </section>
    ) : null;

const Meta = ({
    icon: Icon,
    label,
    value,
}: {
    icon: any;
    label: string;
    value: string;
}) =>
    value ? (
        <div className="flex items-start gap-3">
            <Icon className="mt-0.5 h-4 w-4 shrink-0 text-terracota" />
            <div>
                <dt className="text-xs font-semibold uppercase tracking-widest text-azul/45">
                    {label}
                </dt>
                <dd className="mt-0.5 font-medium text-azul">{value}</dd>
            </div>
        </div>
    ) : null;

export default async function VagaPage({
    params,
}: {
    params: Promise<{ slug: string }>;
}) {
    const { slug } = await params;
    const v = await loadVaga(slug);
    if (!v?.titulo) notFound();

    const { intro, secoes } = parseSecoes(v.descricaoHtml || "");

    // Evita duplicar blocos que já vieram dentro da descrição
    const titulosDescricao = new Set(secoes.map((s) => s.titulo.toLowerCase()));
    const blocosFixos: Secao[] = [
        { titulo: "O que você vai fazer", itens: v.responsabilidades },
        { titulo: "Habilidades necessárias", itens: v.requisitos },
        { titulo: "Diferenciais", itens: v.diferenciais },
        { titulo: "Benefícios", itens: v.beneficios },
    ].filter((b) => !titulosDescricao.has(b.titulo.toLowerCase()));

    const data = v.publicadoEm
        ? new Date(v.publicadoEm).toLocaleDateString("pt-BR", {
              day: "2-digit",
              month: "short",
              year: "numeric",
          })
        : "";

    const jsonLd = {
        "@context": "https://schema.org",
        "@type": "JobPosting",
        title: v.titulo,
        description: v.descricaoHtml || v.resumo,
        datePosted: v.publicadoEm || undefined,
        employmentType: v.tipo || undefined,
        hiringOrganization: {
            "@type": "Organization",
            name: "Costa Desenvolvimento Humano",
        },
        jobLocation: {
            "@type": "Place",
            address: {
                "@type": "PostalAddress",
                addressLocality: v.local,
                addressCountry: "BR",
            },
        },
    };

    return (
        <main className="bg-off pb-24 pt-32">
            <script
                type="application/ld+json"
                dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd) }}
            />

            <div className="container-site">
                <Link
                    href="/vagas"
                    className="inline-flex items-center gap-2 text-sm font-medium text-azul/60 transition-colors hover:text-terracota"
                >
                    <ArrowLeft className="h-4 w-4" /> Todas as oportunidades
                </Link>

                <div className="mt-10 grid gap-12 lg:grid-cols-[1fr_340px]">
                    {/* CONTEÚDO */}
                    <article className="min-w-0">
                        {v.area && (
                            <span className="block w-fit rounded-full bg-amarelo/20 px-3 py-1 text-xs font-semibold text-azul">
                                {v.area}
                            </span>
                        )}

                        <h1 className="mt-4 font-display text-4xl leading-tight text-azul md:text-5xl">
                            {v.titulo}
                        </h1>

                        {intro && (
                            <p className="mt-8 text-lg leading-relaxed text-azul/80">
                                {intro}
                            </p>
                        )}

                        {secoes.map((s) => (
                            <Bloco
                                key={s.titulo}
                                titulo={s.titulo}
                                itens={s.itens}
                            />
                        ))}

                        {blocosFixos.map((b) => (
                            <Bloco
                                key={b.titulo}
                                titulo={b.titulo}
                                itens={b.itens}
                            />
                        ))}

                        <div id="candidatura" className="scroll-mt-28">
                            <CandidaturaForm
                                vaga={v.titulo}
                                slug={v.slug || slug}
                            />
                        </div>
                    </article>

                    {/* SIDEBAR */}
                    <aside className="lg:sticky lg:top-28 lg:self-start">
                        <div className="rounded-xl2 border border-azul/10 bg-white/60 p-7">
                            <dl className="space-y-5">
                                <Meta
                                    icon={MapPin}
                                    label="Local"
                                    value={v.local}
                                />
                                <Meta
                                    icon={Clock}
                                    label="Modelo"
                                    value={v.modelo}
                                />
                                <Meta
                                    icon={Briefcase}
                                    label="Contrato"
                                    value={v.tipo}
                                />
                                <Meta
                                    icon={GraduationCap}
                                    label="Senioridade"
                                    value={v.senioridade}
                                />
                                <Meta
                                    icon={CalendarDays}
                                    label="Publicada em"
                                    value={data}
                                />
                            </dl>

                            <a
                                href="#candidatura"
                                className="group mt-7 flex w-full items-center justify-center gap-2 rounded-full bg-azul px-6 py-3.5 font-semibold text-off transition-all duration-300 hover:scale-[1.02] hover:bg-terracota"
                            >
                                Quero me candidatar
                                <ArrowRight
                                    size={18}
                                    className="transition-transform group-hover:translate-x-1"
                                />
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
    );
}
