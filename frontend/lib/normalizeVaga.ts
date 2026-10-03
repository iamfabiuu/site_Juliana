import type { Vaga } from "./vagas";
import { getVaga } from "./vagas";

export type Secao = { titulo: string; itens: string[] };

const pick = (r: any, ...keys: string[]) => {
    for (const k of keys) {
        const val = k.split(".").reduce((o, p) => o?.[p], r);
        if (val !== undefined && val !== null && val !== "") return val;
    }
    return undefined;
};

export const stripHtml = (s: string) =>
    s
        .replace(/<[^>]*>/g, " ")
        .replace(/&nbsp;/g, " ")
        .replace(/\s+/g, " ")
        .trim();

export function parseSecoes(html: string): { intro: string; secoes: Secao[] } {
    const linhas = html
        .split(/<\/p>|<br\s*\/?>|\n/i)
        .map(stripHtml)
        .filter(Boolean);
    const intro: string[] = [];
    const secoes: Secao[] = [];

    for (const l of linhas) {
        if (/:$/.test(l) && l.length < 60)
            secoes.push({ titulo: l.replace(/:$/, ""), itens: [] });
        else if (secoes.length)
            secoes.at(-1)!.itens.push(l.replace(/[,;.]$/, ""));
        else intro.push(l);
    }
    return { intro: intro.join(" "), secoes };
}

const toText = (x: unknown): string => {
    if (!x) return "";
    if (typeof x === "string") return x;
    if (typeof x === "object") {
        const o = x as any;
        return (
            o.nome ??
            o.name ??
            o.titulo ??
            o.label ??
            o.descricao ??
            o.texto ??
            ""
        );
    }
    return String(x);
};

const toList = (x: unknown): string[] => {
    if (!x) return [];
    if (Array.isArray(x)) return x.map(toText).map(stripHtml).filter(Boolean);
    if (typeof x === "string") {
        const li = [...x.matchAll(/<li[^>]*>([\s\S]*?)<\/li>/gi)].map((m) =>
            stripHtml(m[1]),
        );
        if (li.length) return li.filter(Boolean);
        try {
            const parsed = JSON.parse(x);
            if (Array.isArray(parsed)) return toList(parsed);
        } catch {}
        return x
            .split(/\r?\n|;|<br\s*\/?>/i)
            .map((s) =>
                stripHtml(s)
                    .replace(/^[-•*\d.)\s]+/, "")
                    .trim(),
            )
            .filter(Boolean);
    }
    return [];
};

export const humanize = (s: string) =>
    s.replace(/[-_]/g, " ").replace(/^\p{L}/u, (c) => c.toUpperCase());

export function normalize(raw: any): Vaga | null {
    const r = raw?.data?.attributes ?? raw?.data ?? raw?.attributes ?? raw;
    if (!r) return null;

    const slug = String(pick(r, "slug") ?? "");
    const descricao = toText(
        pick(r, "descricao", "description", "conteudo", "content"),
    );
    const resumo =
        toText(pick(r, "resumo", "summary", "excerpt", "chamada")) ||
        stripHtml(descricao).slice(0, 220);

    return {
        id: Number(
            pick(r, "id", "_id", "uuid", "documentId") ??
                raw?.data?.id ??
                raw?.id ??
                slug,
        ),
        slug,
        titulo: toText(pick(r, "titulo", "title", "nome", "cargo")),
        descricao,
        area: humanize(
            toText(
                pick(
                    r,
                    "area",
                    "departamento",
                    "department",
                    "categoria",
                    "category",
                ),
            ),
        ),
        local:
            toText(
                pick(r, "local", "localizacao", "location", "cidade", "city"),
            ) || "Recife/PE",
        modelo: humanize(
            toText(
                pick(
                    r,
                    "modelo",
                    "modalidade",
                    "work_model",
                    "workModel",
                    "regime",
                ),
            ),
        ),
        tipo: humanize(
            toText(
                pick(
                    r,
                    "tipo",
                    "tipo_contrato",
                    "contrato",
                    "contract_type",
                    "type",
                ),
            ),
        ),
        senioridade: humanize(
            toText(pick(r, "senioridade", "nivel", "seniority", "level")),
        ),
        resumo,
        descricaoHtml: /<[a-z][\s\S]*>/i.test(descricao) ? descricao : "",
        responsabilidades: toList(
            pick(
                r,
                "responsabilidades",
                "atividades",
                "atribuicoes",
                "responsibilities",
            ),
        ),
        requisitos: toList(
            pick(
                r,
                "requisitos",
                "habilidades",
                "competencias",
                "requirements",
                "skills",
            ),
        ),
        diferenciais: toList(
            pick(r, "diferenciais", "desejaveis", "nice_to_have", "niceToHave"),
        ),
        beneficios: toList(pick(r, "beneficios", "benefits")),
        publicadoEm: toText(
            pick(
                r,
                "publicado_em",
                "published_at",
                "publishedAt",
                "created_at",
                "createdAt",
            ),
        ),
    };
}

/** Aceita array puro ou { data, total } */
export function normalizeLista(res: any): { vagas: Vaga[]; total: number } {
    const lista: any[] = Array.isArray(res) ? res : (res?.data ?? []);
    const vagas = lista
        .map(normalize)
        .filter((v): v is Vaga => !!v?.titulo && !!v?.slug);
    return { vagas, total: Number(res?.total) || vagas.length };
}

export async function loadVaga(slug: string) {
    const raw = await getVaga(slug);
    if (process.env.NODE_ENV === "development") {
        console.log("[vaga raw]", JSON.stringify(raw, null, 2));
    }
    return normalize(raw);
}
