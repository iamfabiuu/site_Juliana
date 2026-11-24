import {
    stripHtml,
    limparItem,
    capitalizar,
    normalizarTitulo,
    quebrarChips,
    TITULOS_SECAO,
    CHIPS,
} from "./normalizeVaga";

export type Bloco = { titulo: string; itens: string[] };

/* Aceita "Atividades" e "ATIVIDADES", mas nunca "atividades" no meio da frase */
const variantes = TITULOS_SECAO.flatMap((t) => [t, t.toUpperCase()]);

const RE_TITULO = new RegExp(
    `(?<=^|\\n|[.,;:!?|]\\s*)\\s*(${variantes.join("|")})\\s*:?\\s*(?=\\p{Lu}|\\n|$)`,
    "gu",
);

const quebrarItens = (s: string) =>
    s
        .split(/\n+|[,.;]\s+(?=\p{Lu})|\s*[•·]\s*/u)
        .map(limparItem)
        .filter((i) => i.length > 2)
        .map(capitalizar);

export function formatarDescricao(raw: string) {
    const texto = stripHtml(raw).replace(/\r/g, "").trim();
    const partes = texto.split(RE_TITULO);

    const intro = limparItem(partes[0] ?? "");
    const blocos: Bloco[] = [];

    for (let i = 1; i < partes.length; i += 2) {
        const titulo = normalizarTitulo(partes[i]);
        const conteudo = partes[i + 1] ?? "";
        const itens = CHIPS.has(titulo.toLowerCase())
            ? quebrarChips(conteudo)
            : quebrarItens(conteudo);
        if (!itens.length) continue;

        const existente = blocos.find((b) => b.titulo === titulo);
        if (existente) existente.itens.push(...itens);
        else blocos.push({ titulo, itens });
    }

    return {
        intro: intro ? `${intro}${/[.!?]$/.test(intro) ? "" : "."}` : "",
        blocos,
    };
}
