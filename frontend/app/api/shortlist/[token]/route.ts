import { NextResponse } from "next/server";

export async function GET(
    _: Request,
    { params }: { params: Promise<{ token: string }> },
) {
    const { token } = await params;
    if (token === "expirado")
        return NextResponse.json({ message: "Expirado" }, { status: 410 });
    if (token !== "teste")
        return NextResponse.json(
            { message: "Não encontrada" },
            { status: 404 },
        );

    return NextResponse.json({
        vaga_titulo: "Assistente de Vendas",
        cliente_nome: "Carolina Fonseca",
        data_envio: "03/11/2026",
        mensagem:
            "Após recrutamento e seleção de todos os interessados, seguem candidatas finalistas indicadas para vaga Assistente de Vendas na Tron Controles.",
        planilha_url: "#",
        criterios: [
            { chave: "localizacao", label: "Localização" },
            { chave: "dados", label: "Dados pessoais" },
            { chave: "formacao", label: "Formação acadêmica" },
            { chave: "crm", label: "Já utilizou CRM? Qual?" },
        ],
        candidatos: [
            {
                id: 1,
                nome: "Giuliana Lessa Novellino",
                status: "pendente",
                respostas: {
                    localizacao: "Bairro Novo, Olinda, PE",
                    dados: "47 anos, mora com a mãe.",
                    formacao:
                        "Pós em Eng. de Segurança do Trabalho | 2016\nFaculdade Joaquim Nabuco",
                    crm: "Sim, HubSpot e ClickUp.",
                },
            },
            {
                id: 2,
                nome: "Jarmilla Maria Sampaio de Barros",
                status: "pendente",
                respostas: {
                    localizacao: "Piedade, Jaboatão dos Guararapes, PE",
                    dados: "45 anos, casada.",
                    formacao: "Ensino Médio Completo | 2000",
                    crm: "Sim. CRM e Salesforce.",
                },
            },
            {
                id: 3,
                nome: "Maria Rita da Silva",
                status: "pendente",
                respostas: {
                    localizacao: "Sítio Novo, Olinda, PE",
                    dados: "36 anos.",
                    formacao: "Gestão em Logística | 2015\nUNIBRA",
                    crm: "CRM 3.0, Zendesk, TOTVS.",
                },
            },
        ],
    });
}
