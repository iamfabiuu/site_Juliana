export type Vaga = {
  slug: string;
  titulo: string;
  area: string;
  local: string;
  modelo: string;
  tipo: string;
  senioridade: string;
  resumo: string;
  responsabilidades: string[];
  requisitos: string[];
  diferenciais?: string[];
};

export const vagas: Vaga[] = [
  {
    slug: "supervisor-de-loja-recife",
    titulo: "Supervisor de Loja",
    area: "Comercial · Varejo",
    local: "Recife/PE",
    modelo: "Presencial",
    tipo: "CLT",
    senioridade: "Sênior",
    resumo:
      "Nosso cliente atua no segmento de Varejo e busca profissional para loja em Recife/PE, com foco em liderança de equipe, metas e a melhor experiência do cliente.",
    responsabilidades: [
      "Supervisionar a equipe, garantindo atendimento eficiente e alinhado à melhor experiência do cliente.",
      "Atuar no planejamento de vendas e na coleta de indicadores do mercado consumidor.",
      "Gerir o time de vendas de produtos e serviços, acompanhando metas, atendimentos e resultados da loja.",
      "Participar de atendimentos e resolver reclamações ativamente na operação.",
      "Apresentar à gestão resultados, análise de dados e planos de ação para as metas de vendas.",
      "Acompanhar a performance do time e desenvolver as pessoas da equipe.",
      "Garantir organização, padronização e layout da loja.",
    ],
    requisitos: [
      "Formação técnica completa (superior desejável).",
      "Habilidades interpessoais, de comunicação e negociação.",
      "Vivência no cargo, com liderança de equipes — preferencialmente na área comercial.",
      "Domínio de informática e ferramentas de gestão e indicadores de vendas.",
    ],
    diferenciais: [
      "Experiência com Vendas e Varejo.",
      "Histórico de gestão por metas e atendimento a clientes.",
    ],
  },
];

export const getVaga = (slug: string) => vagas.find((v) => v.slug === slug);
