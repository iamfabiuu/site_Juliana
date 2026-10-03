const API = process.env.NEXT_PUBLIC_API_URL?.replace(/\/+$/, "");
const IS_DEV = process.env.NODE_ENV !== "production";

/* ---------- Tipos ---------- */
export type Vaga = {
    id: number;
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

/* ---------- Helpers ---------- */
const str = (x: unknown): string => {
    if (x === null || x === undefined) return "";
    if (typeof x === "string") return x;
    if (typeof x === "number" || typeof x === "boolean") return String(x);
    if (typeof x === "object") {
        const o = x as Record<string, unknown>;
        return str(o.nome ?? o.name ?? o.titulo ?? o.label ?? o.descricao ?? "");
    }
    return "";
};

const toList = (x: unknown): string[] => {
    if (Array.isArray(x)) return x.map(str).map((s) => s.trim()).filter(Boolean);
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
    "recursos-humanos": "Recursos Humanos",
};

const humanize = (s: string) =>
    ROTULOS[s.toLowerCase()] ??
    s.replace(/[-_]/g, " ").replace(/^\p{L}/u, (c) => c.toUpperCase());

/* ---------- Normalização ---------- */
export function normalizeVaga(raw: any): Vaga {
    const r = raw?.attributes ?? raw ?? {};
    const descricao = str(r.descricao ?? r.description ?? r.conteudo);
    const cidade = str(r.cidade ?? r.city) || undefined;
    const uf = str(r.uf ?? r.estado ?? r.state) || undefined;
    const senioridade = humanize(str(r.senioridade ?? r.nivel ?? r.seniority ?? r.level));
    const id = Number(r.id ?? raw?.id ?? parseInt(str(r.slug), 10));

    return {
        id: Number.isFinite(id) ? id : 0,
        slug: str(r.slug),
        titulo: str(r.titulo ?? r.title ?? r.cargo),
        descricao,
        descricaoHtml: str(r.descricao_html) || (temHtml(descricao) ? descricao : ""),
        area: humanize(str(r.area ?? r.departamento ?? r.categoria)),
        local:
            str(r.local ?? r.localizacao ?? r.location) ||
            [cidade, uf].filter(Boolean).join("/") ||
            "Recife/PE",
        cidade,
        uf,
        modelo: humanize(str(r.modelo ?? r.modalidade ?? r.work_model)) || "Presencial",
        tipo: str(r.tipo ?? r.tipo_contrato ?? r.contract_type),
        senioridade,
        nivel: str(r.nivel) || senioridade || undefined,
        resumo: str(r.resumo ?? r.summary ?? r.chamada),
        responsabilidades: toList(r.responsabilidades ?? r.atividades ?? r.responsibilities),
        requisitos: toList(r.requisitos ?? r.habilidades ?? r.requirements),
        diferenciais: toList(r.diferenciais ?? r.nice_to_have),
        beneficios: toList(r.beneficios ?? r.benefits),
        publicadoEm: str(r.publicado_em ?? r.published_at ?? r.created_at),
    };
}

/* ---------- Mock (fallback só em dev) ---------- */
const lista = (itens: string[]) =>
    `<ul>${itens.map((i) => `<li>${i}</li>`).join("")}</ul>`;

export const vagasMock: Vaga[] = [
    {
        id: 9999,
        slug: "9999-supervisor-de-loja-mock",
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
        responsabilidades: [
            "Supervisionar a equipe e o atendimento.",
            "Acompanhar metas e indicadores de vendas.",
        ],
        requisitos: [],
        diferenciais: [],
        beneficios: [],
        publicadoEm: "",
        descricao: [
            "<p>Vaga de exemplo exibida apenas quando a API está indisponível.</p>",
            "<h3>Responsabilidades</h3>",
            lista([
                "Supervisionar a equipe e o atendimento.",
                "Acompanhar metas e indicadores de vendas.",
            ]),
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
        ? { data: vagasMock, current_page: 1, last_page: 1, total: vagasMock.length }
        : vazio();
};

const fallbackVaga = (id: number, motivo: unknown): Vaga | null => {
    console.error("[getVaga] fallback:", motivo);
    return IS_DEV ? (vagasMock.find((v) => v.id === id) ?? null) : null;
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

        const json = await res.json();
        const itens: any[] = Array.isArray(json) ? json : (json?.data ?? []);
        const data = itens.map(normalizeVaga).filter((v) => v.slug && v.titulo);

        return {
            data,
            current_page: Number(json?.current_page) || page,
            last_page: Number(json?.last_page) || 1,
            total: Number(json?.total) || data.length,
        };
    } catch (e) {
        return fallbackLista(e);
    }
}

export async function getVaga(slug: string): Promise<Vaga | null> {
    const id = parseInt(slug, 10); // "48-supervisor-de-loja" → 48
    if (Number.isNaN(id)) return null;

    if (!API) return fallbackVaga(id, "NEXT_PUBLIC_API_URL não definida");

    const url = `${API}/vagas/${id}`;
    try {
        const res = await fetch(url, {
            headers: { Accept: "application/json" },
            next: { revalidate: 60 },
        });
        if (res.status === 404) return null;
        if (!res.ok) throw new Error(`HTTP ${res.status} em ${url}`);

        const json = await res.json();
        const vaga = normalizeVaga(json?.data ?? json);
        return vaga.titulo ? vaga : null;
    } catch (e) {
        return fallbackVaga(id, e);
    }
}

export async function enviarCandidatura(form: FormData) {
    if (!API) throw new Error("API não configurada");

    const res = await fetch(`${API}/candidaturas`, {
        method: "POST",
        body: form,
        headers: { Accept: "application/json" },
    });
    const data = await res.json().catch(() => ({}));

    if (!res.ok)
        throw Object.assign(new Error(data?.message ?? "Erro ao enviar"), {
            errors: data?.errors,
        });
    return data;
}
