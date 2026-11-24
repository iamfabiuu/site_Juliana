const API = process.env.NEXT_PUBLIC_API_URL?.replace(/\/+$/, "");
const IS_DEV = process.env.NODE_ENV !== "production";

/* ---------- Tipos ---------- */
export type Vaga = {
    id: number | string;
    slug: string;
    titulo: string;
    descricao: string;
    area: string;
    local: string;
    cidade?: string;
    uf?: string;
    modelo: string;
    tipo: string;
    senioridade: string;
    nivel?: string;
    resumo: string;
    descricaoHtml: string;
    responsabilidades: string[];
    requisitos: string[];
    diferenciais: string[];
    beneficios: string[];
    publicadoEm: string;
};

export type Paginado<T> = {
    data: T[];
    current_page: number;
    last_page: number;
    total: number;
};

export type ErroApi = Error & {
    status?: number;
    errors?: Record<string, string[]>;
};

/* ---------- Helpers ---------- */
const str = (x: unknown): string => {
    if (x === null || x === undefined) return "";
    if (typeof x === "string") return x;
    if (typeof x === "number" || typeof x === "boolean") return String(x);
    if (typeof x === "object") {
        const o = x as Record<string, unknown>;
        return str(
            o.nome ?? o.name ?? o.titulo ?? o.label ?? o.descricao ?? "",
        );
    }
    return "";
};

const toList = (x: unknown): string[] => {
    if (Array.isArray(x))
        return x
            .map(str)
            .map((s) => s.trim())
            .filter(Boolean);
    if (typeof x === "string") {
        const li = [...x.matchAll(/<li[^>]*>([\s\S]*?)<\/li>/gi)].map((m) =>
            m[1].replace(/<[^>]*>/g, "").trim(),
        );
        if (li.length) return li.filter(Boolean);
        return x
            .split(/\r?\n|;/)
            .map((s) => s.replace(/^[-•*]\s*/, "").trim())
            .filter(Boolean);
    }
    return [];
};

const temHtml = (s: string) => /<[a-z][\s\S]*>/i.test(s);

const ROTULOS: Record<string, string> = {
    contabil: "Contábil",
    informatica: "Informática",
    "recursos-humanos": "Recursos Humanos",
};

const humanize = (s: string) =>
    ROTULOS[s.toLowerCase()] ??
    s.replace(/[-_]/g, " ").replace(/^\p{L}/u, (c) => c.toUpperCase());

/* ---------- Normalização ---------- */
export function normalizeVaga(raw: unknown): Vaga {
    const source =
        raw !== null && typeof raw === "object"
            ? (raw as Record<string, unknown>)
            : {};
    const attributes = source.attributes;
    const r =
        attributes !== null && typeof attributes === "object"
            ? (attributes as Record<string, unknown>)
            : source;
    const descricao = str(r.descricao ?? r.description ?? r.conteudo);
    const cidade = str(r.cidade ?? r.city) || undefined;
    const uf = str(r.uf ?? r.estado ?? r.state) || undefined;
    const senioridade = humanize(
        str(r.senioridade ?? r.nivel ?? r.seniority ?? r.level),
    );
    const id = r.id ?? source.id;

    return {
        id:
            typeof id === "number" && Number.isFinite(id) && id > 0
                ? id
                : str(id) || 0,
        slug: str(r.slug),
        titulo: str(r.titulo ?? r.title ?? r.cargo),
        descricao,
        descricaoHtml:
            str(r.descricao_html) || (temHtml(descricao) ? descricao : ""),
        area: humanize(str(r.area ?? r.departamento ?? r.categoria)),
        local:
            str(r.local ?? r.localizacao ?? r.location) ||
            [cidade, uf].filter(Boolean).join("/") ||
            "Recife/PE",
        cidade,
        uf,
        modelo:
            humanize(str(r.modelo ?? r.modalidade ?? r.work_model)) ||
            "Presencial",
        tipo: str(r.tipo ?? r.tipo_contrato ?? r.contract_type),
        senioridade,
        nivel: senioridade || undefined,
        resumo: str(r.resumo ?? r.summary ?? r.chamada),
        responsabilidades: toList(
            r.responsabilidades ?? r.atividades ?? r.responsibilities,
        ),
        requisitos: toList(r.requisitos ?? r.habilidades ?? r.requirements),
        diferenciais: toList(r.diferenciais ?? r.nice_to_have),
        beneficios: toList(r.beneficios ?? r.benefits),
        publicadoEm: str(r.publicado_em ?? r.published_at ?? r.created_at),
    };
}

/* ---------- Mock (fallback só em dev) ---------- */
const lista = (itens: string[]) =>
    `<ul>${itens.map((i) => `<li>${i}</li>`).join("")}</ul>`;

const RESP_MOCK = [
    "Supervisionar a equipe e o atendimento.",
    "Acompanhar metas e indicadores de vendas.",
];

export const vagasMock: Vaga[] = [
    {
        id: 9999,
        slug: "supervisor-de-loja-mock",
        titulo: "Supervisor de Loja (mock)",
        area: "Comercial",
        local: "Recife/PE",
        cidade: "Recife",
        uf: "PE",
        modelo: "Presencial",
        tipo: "CLT",
        senioridade: "Pleno",
        nivel: "Pleno",
        resumo: "Vaga de exemplo exibida apenas quando a API está indisponível.",
        descricaoHtml: "",
        responsabilidades: RESP_MOCK,
        requisitos: [],
        diferenciais: [],
        beneficios: [],
        publicadoEm: "",
        descricao: [
            "<p>Vaga de exemplo exibida apenas quando a API está indisponível.</p>",
            "<h3>Responsabilidades</h3>",
            lista(RESP_MOCK),
        ].join(""),
    },
];

/* ---------- Fallbacks ---------- */
const vazio = (): Paginado<Vaga> => ({
    data: [],
    current_page: 1,
    last_page: 1,
    total: 0,
});

const fallbackLista = (motivo: unknown): Paginado<Vaga> => {
    console.error("[getVagas] fallback:", motivo);
    return IS_DEV
        ? {
              data: vagasMock,
              current_page: 1,
              last_page: 1,
              total: vagasMock.length,
          }
        : vazio();
};

const fallbackVaga = (slug: string, motivo: unknown): Vaga | null => {
    console.error("[getVaga] fallback:", motivo);
    if (!IS_DEV) return null;
    return (
        vagasMock.find((v) => v.slug === slug || String(v.id) === slug) ?? null
    );
};

/* ---------- API ---------- */
export async function getVagas(page = 1): Promise<Paginado<Vaga>> {
    if (!API) return fallbackLista("NEXT_PUBLIC_API_URL não definida");

    const url = `${API}/vagas?page=${page}`;
    try {
        const res = await fetch(url, {
            headers: { Accept: "application/json" },
            next: { revalidate: 60 },
        });
        if (!res.ok) throw new Error(`HTTP ${res.status} em ${url}`);

        const json: unknown = await res.json();
        const response =
            json !== null && typeof json === "object" && !Array.isArray(json)
                ? (json as Record<string, unknown>)
                : {};
        const itens: unknown[] = Array.isArray(json)
            ? json
            : Array.isArray(response.data)
              ? response.data
              : [];
        const data = itens.map(normalizeVaga).filter((v) => v.slug && v.titulo);

        return {
            data,
            current_page: Number(response.current_page) || page,
            last_page: Number(response.last_page) || 1,
            total: Number(response.total) || data.length,
        };
    } catch (e) {
        return fallbackLista(e);
    }
}

/** Aceita slug ("gerente-de-unidade-agreste") ou id legado ("50") */
export async function getVaga(slug: string): Promise<Vaga | null> {
    if (!slug) return null;
    if (!API) return fallbackVaga(slug, "NEXT_PUBLIC_API_URL não definida");

    const url = `${API}/vagas/${encodeURIComponent(slug)}`;
    try {
        const res = await fetch(url, {
            headers: { Accept: "application/json" },
            next: { revalidate: 60 },
        });
        if (res.status === 404) return null;
        if (!res.ok) throw new Error(`HTTP ${res.status} em ${url}`);

        const json: unknown = await res.json();
        const response =
            json !== null && typeof json === "object" && !Array.isArray(json)
                ? (json as Record<string, unknown>)
                : {};
        const vaga = normalizeVaga(response.data ?? json);
        return vaga.titulo ? vaga : null;
    } catch (e) {
        return fallbackVaga(slug, e);
    }
}

/** vagaId = id numérico da vaga (vaga.id), não o slug */
export async function enviarCandidatura(id: number | string, data: FormData) {
    if (!API) throw new Error("NEXT_PUBLIC_API_URL não definida");
    const numericId = typeof id === "number" ? id : Number(id);
    if (!Number.isInteger(numericId) || numericId <= 0)
        throw new Error(`ID de vaga inválido: ${id}`);

    const url = `${API}/vagas/${numericId}/candidaturas`;
    const res = await fetch(url, {
        method: "POST",
        body: data,
        headers: { Accept: "application/json" },
    });

    const json = await res.json().catch(() => ({}));

    if (!res.ok) {
        if (IS_DEV) console.error("[enviarCandidatura]", res.status, url, json);
        const msg =
            res.status === 429
                ? "Muitas tentativas. Aguarde um minuto e tente novamente."
                : (json?.message ?? `HTTP ${res.status}`);
        const err = new Error(msg) as ErroApi;
        err.status = res.status;
        err.errors = json?.errors;
        throw err;
    }
    return json;
}
