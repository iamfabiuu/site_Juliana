import { stripHtml } from "./normalizeVaga";

export type Bloco = { titulo: string; itens: string[] };

const TITULOS = [
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
];

const RE_TITULO = new RegExp(`\\b(${TITULOS.join("|")})\\s*:?\\s*`, "gi");

const quebrarItens = (s: string) =>
    s
        .split(/[,.;]\s+(?=\p{Lu})|\s*[•·]\s*/u)
        .map((i) => i.replace(/[,.;]\s*$/, "").trim())
        .filter((i) => i.length > 2)
        .map((i) => i[0].toUpperCase() + i.slice(1));

export function formatarDescricao(raw: string) {
    const texto = stripHtml(raw);
    const partes = texto.split(RE_TITULO);

    const intro = partes[0].trim();
    const blocos: Bloco[] = [];

    for (let i = 1; i < partes.length; i += 2) {
        const titulo = TITULOS.find(
            (t) => t.toLowerCase() === partes[i].toLowerCase(),
        )!;
        const itens = quebrarItens(partes[i + 1] ?? "");
        if (itens.length) blocos.push({ titulo, itens });
    }

    return { intro, blocos };
}
