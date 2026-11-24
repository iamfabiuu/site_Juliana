import type { Vaga } from "./vagas";
import { getVaga } from "./vagas";

export type Secao = { titulo: string; itens: string[] };

/* ---------- Títulos de seção (fonte única) ---------- */

export const TITULOS_SECAO = [
    "Responsabilidades",
    "Atividades",
    "Atribuições",
    "Qualificações",
    "Requisitos",
    "Diferenciais",
    "Soft skills",
    "Hard skills",
    "Benefícios",
    "Competências",
] as const;

export const CHIPS = new Set(["soft skills", "hard skills", "competências"]);

const RE_TITULO_LINHA = new RegExp(
    `^(${TITULOS_SECAO.join("|")})\\s*(?::\\s*(.*))?$`,
    "iu",
);

/* ---------- Helpers de texto ---------- */

const ENTIDADES: Record<string, string> = {
    "&nbsp;": " ",
    "&amp;": "&",
    "&lt;": "<",
    "&gt;": ">",
    "&quot;": '"',
    "&#39;": "'",
};

export const stripHtml = (s: string): string =>
    s
        .replace(/<[^>]*>/g, " ")
        .replace(/&(nbsp|amp|lt|gt|quot|#39);/g, (e) => ENTIDADES[e] ?? e)
        .replace(/\s+/g, " ")
        .trim();

export const limparItem = (s: string): string =>
    s.replace(/^[\s•·\-–*]+|[\s,;.]+$/g, "").trim();

export const capitalizar = (s: string): string =>
    s.charAt(0).toUpperCase() + s.slice(1);

export const normalizarTitulo = (t: string): string =>
    TITULOS_SECAO.find((x) => x.toLowerCase() === t.trim().toLowerCase()) ??
    capitalizar(t.trim());

export const quebrarChips = (s: string): string[] =>
    s
        .split(/\s*[,;]\s*|\s+e\s+(?=\p{L})/u)
        .map(limparItem)
        .filter((i) => i.length > 1)
        .map(capitalizar);

const resumoAuto = (txt: string, max = 220): string => {
    const t = stripHtml(txt);
    if (t.length <= max) return t;
    const corte = t.lastIndexOf(" ", max);
    return t.slice(0, corte > 0 ? corte : max).replace(/[,;:.\s]+$/, "") + "…";
};

export const humanize = (s: string): string =>
    s.replace(/[-_]/g, " ").replace(/^\p{L}/u, (c) => c.toUpperCase());

/* ---------- Parser de seções ---------- */

export function parseSecoes(html: string): { intro: string; secoes: Secao[] } {
    const linhas = html
        .split(/<\/p>|<\/li>|<br\s*\/?>|\n/i)
        .map(stripHtml)
        .filter(Boolean);

    const intro: string[] = [];
    const secoes: Secao[] = [];

    const abrir = (titulo: string): Secao => {
        const existente = secoes.find((s) => s.titulo === titulo);
        if (existente) return existente;
        const nova: Secao = { titulo, itens: [] };
        secoes.push(nova);
        return nova;
    };

    for (const l of linhas) {
        const m = l.match(RE_TITULO_LINHA);

        if (m) {
            const titulo = normalizarTitulo(m[1]);
            const secao = abrir(titulo);
            if (m[2]) {
                secao.itens.push(
                    ...(CHIPS.has(titulo.toLowerCase())
                        ? quebrarChips(m[2])
                        : [limparItem(m[2])]),
                );
            }
        } else if (/:$/.test(l) && l.length < 60) {
            abrir(normalizarTitulo(l.replace(/:$/, "")));
        } else if (secoes.length) {
            const item = limparItem(l);
            if (item) secoes[secoes.length - 1].itens.push(item);
        } else {
            intro.push(l);
        }
    }

    return {
        intro: intro.join(" "),
        secoes: secoes.filter((s) => s.itens.length),
    };
}

/* ---------- Normalização ---------- */

type Rec = Record<string, unknown>;

const isRecord = (x: unknown): x is Rec =>
    typeof x === "object" && x !== null && !Array.isArray(x);

const pick = (r: unknown, ...keys: string[]): unknown => {
    for (const k of keys) {
        const val = k
            .split(".")
            .reduce<unknown>((o, p) => (isRecord(o) ? o[p] : undefined), r);
        if (val !== undefined && val !== null && val !== "") return val;
    }
    return undefined;
};

const toText = (x: unknown): string => {
    if (x === undefined || x === null || x === "") return "";
    if (typeof x === "string") return x;
    if (typeof x === "number" || typeof x === "boolean") return String(x);
    if (isRecord(x)) {
        for (const key of [
            "nome",
            "name",
            "titulo",
            "label",
            "descricao",
            "texto",
        ]) {
            const v = x[key];
            if (typeof v === "string" || typeof v === "number")
                return String(v);
        }
    }
    return "";
};

const toList = (x: unknown): string[] => {
    if (!x) return [];
    if (Array.isArray(x)) return x.map(toText).map(stripHtml).filter(Boolean);
    if (typeof x !== "string") return [];

    const li = [...x.matchAll(/<li[^>]*>([\s\S]*?)<\/li>/gi)].map((m) =>
        stripHtml(m[1]),
    );
    if (li.length) return li.filter(Boolean);

    try {
        const parsed: unknown = JSON.parse(x);
        if (Array.isArray(parsed)) return toList(parsed);
    } catch {
        /* não é JSON, segue para o split */
    }

    return x
        .split(/\r?\n|;|<br\s*\/?>/i)
        .map((s) => limparItem(stripHtml(s).replace(/^[-•*\d.)\s]+/, "")))
        .filter(Boolean);
};

const resolverId = (idRaw: unknown, slug: string): number | string => {
    if (typeof idRaw === "number" && Number.isFinite(idRaw)) return idRaw;
    if (typeof idRaw === "string" && idRaw.trim() !== "") {
        const n = Number(idRaw);
        return Number.isFinite(n) ? n : idRaw;
    }
    return slug;
};

const desembrulhar = (raw: unknown): { r: Rec | undefined; ids: unknown[] } => {
    if (!isRecord(raw)) return { r: undefined, ids: [] };
    const data = isRecord(raw.data) ? raw.data : undefined;

    if (data) {
        const attrs = isRecord(data.attributes) ? data.attributes : data;
        return { r: attrs, ids: [data.id, raw.id] };
    }
    if (isRecord(raw.attributes)) return { r: raw.attributes, ids: [raw.id] };
    return { r: raw, ids: [raw.id] };
};

export function normalize(raw: unknown): Vaga | null {
    const { r, ids } = desembrulhar(raw);
    if (!r) return null;

    const slug = toText(pick(r, "slug"));
    const descricao = toText(
        pick(r, "descricao", "description", "conteudo", "content"),
    );
    const resumo =
        toText(pick(r, "resumo", "summary", "excerpt", "chamada")) ||
        resumoAuto(descricao);

    const idRaw =
        pick(r, "id", "_id", "uuid", "documentId") ??
        ids.find((i) => i !== undefined && i !== null && i !== "");

    return {
        id: resolverId(idRaw, slug),
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
export function normalizeLista(res: unknown): { vagas: Vaga[]; total: number } {
    const lista: unknown[] = Array.isArray(res)
        ? res
        : isRecord(res) && Array.isArray(res.data)
          ? res.data
          : [];

    const vagas = lista
        .map(normalize)
        .filter((v): v is Vaga => !!v && !!v.titulo && !!v.slug);

    const total = isRecord(res) ? Number(res.total) : NaN;
    return {
        vagas,
        total: Number.isFinite(total) && total > 0 ? total : vagas.length,
    };
}

export async function loadVaga(slug: string): Promise<Vaga | null> {
    const raw: unknown = await getVaga(slug);
    if (process.env.NODE_ENV === "development") {
        console.log("[vaga raw]", JSON.stringify(raw, null, 2));
    }
    return normalize(raw);
}
