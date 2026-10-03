"use client";

import { useState } from "react";
import { UploadCloud, ChevronDown } from "lucide-react";

const ESTADOS = [
  "AC",
  "AL",
  "AM",
  "AP",
  "BA",
  "CE",
  "DF",
  "ES",
  "GO",
  "MA",
  "MG",
  "MS",
  "MT",
  "PA",
  "PB",
  "PE",
  "PI",
  "PR",
  "RJ",
  "RN",
  "RO",
  "RR",
  "RS",
  "SC",
  "SE",
  "SP",
  "TO",
];
const ACEITOS = ".pdf,.doc,.docx,.xls,.xlsx,.png,.jpeg,.jpg";
const MAX_MB = 40;

const input =
  "mt-1.5 w-full rounded-xl border border-azul/15 bg-off px-4 py-3 text-azul outline-none transition-colors placeholder:text-azul/40 focus:border-terracota";

export default function CandidaturaForm({
  vaga,
  slug,
}: {
  vaga: string;
  slug: string;
}) {
  const [arquivo, setArquivo] = useState<string>("");
  const [erro, setErro] = useState<string>("");
  const [enviado, setEnviado] = useState(false);

  async function onSubmit(e: React.FormEvent<HTMLFormElement>) {
    e.preventDefault();
    setErro("");
    const data = new FormData(e.currentTarget);
    data.append("vaga", vaga);
    data.append("slug", slug);

    const res = await fetch("/api/candidatura", { method: "POST", body: data });
    if (!res.ok)
      return setErro(
        "Não conseguimos enviar agora. Tente novamente em instantes.",
      );
    setEnviado(true);
  }

  if (enviado)
    return (
      <div className="mt-14 rounded-xl2 bg-azul p-8 text-off">
        <h2 className="font-display text-2xl">Candidatura recebida! 🎉</h2>
        <p className="mt-2 text-sm text-off/70">
          Obrigado pela confiança. Se o perfil fizer match, a gente entra em
          contato.
        </p>
      </div>
    );

  return (
    <section
      id="candidatura"
      className="mt-14 scroll-mt-28 rounded-xl2 bg-azul p-8 text-off md:p-10"
    >
      <h2 className="font-display text-2xl">Quer se candidatar?</h2>
      <p className="mt-2 text-sm text-off/70">
        Preencha seus dados e anexe o currículo. Um parágrafo contando por que
        essa vaga faz sentido pra você conta muitos pontos.
      </p>

      <form onSubmit={onSubmit} className="mt-8 space-y-5">
        <div className="grid gap-5 md:grid-cols-2">
          <label className="block text-sm font-medium text-off/80">
            Nome completo *
            <input
              name="nome"
              required
              autoComplete="name"
              placeholder="Seu nome"
              className={input}
            />
          </label>
          <label className="block text-sm font-medium text-off/80">
            Contato (WhatsApp) *
            <input
              name="fone"
              required
              type="tel"
              autoComplete="tel"
              placeholder="(81) 90000-0000"
              className={input}
            />
          </label>
          <label className="block text-sm font-medium text-off/80">
            E-mail *
            <input
              name="email"
              required
              type="email"
              autoComplete="email"
              placeholder="voce@email.com"
              className={input}
            />
          </label>
          <div className="grid grid-cols-[110px_1fr] gap-3">
            <label className="block text-sm font-medium text-off/80">
              Estado *
              <div className="relative">
                <select
                  name="estado"
                  required
                  defaultValue=""
                  className={`${input} appearance-none pr-9`}
                >
                  <option value="" disabled>
                    UF
                  </option>
                  {ESTADOS.map((uf) => (
                    <option key={uf} value={uf}>
                      {uf}
                    </option>
                  ))}
                </select>
                <ChevronDown className="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-azul/50" />
              </div>
            </label>
            <label className="block text-sm font-medium text-off/80">
              Cidade *
              <input
                name="cidade"
                required
                placeholder="Sua cidade"
                className={input}
              />
            </label>
          </div>
        </div>

        <label className="block text-sm font-medium text-off/80">
          Por que essa vaga faz sentido pra você?
          <textarea
            name="mensagem"
            rows={4}
            className={`${input} resize-none`}
            placeholder="Conte em poucas linhas..."
          />
        </label>

        {/* Upload */}
        <div>
          <span className="text-sm font-medium text-off/80">
            Anexe seu currículo *
          </span>
          <label className="mt-1.5 flex cursor-pointer items-center gap-3 rounded-xl border border-dashed border-off/30 bg-off/5 px-4 py-5 transition-colors hover:border-amarelo">
            <UploadCloud className="h-5 w-5 shrink-0 text-amarelo" />
            <span className="text-sm text-off/70">
              {arquivo || "Selecionar arquivo"}
            </span>
            <input
              type="file"
              name="curriculo"
              required
              accept={ACEITOS}
              className="sr-only"
              onChange={(e) => {
                const f = e.target.files?.[0];
                if (!f) return setArquivo("");
                if (f.size > MAX_MB * 1024 * 1024) {
                  e.target.value = "";
                  setArquivo("");
                  return setErro(`Arquivo acima de ${MAX_MB}MB.`);
                }
                setErro("");
                setArquivo(f.name);
              }}
            />
          </label>
          <p className="mt-2 text-xs text-off/50">
            Formatos: .pdf, .doc, .docx, .xls, .xlsx, .png, .jpeg · máx.{" "}
            {MAX_MB}MB
          </p>
        </div>

        {/* LGPD */}
        <details className="rounded-xl border border-off/15 bg-off/5 p-5 text-sm text-off/70">
          <summary className="cursor-pointer font-semibold text-off">
            Privacidade de Dados no processo de Recrutamento
          </summary>
          <div className="mt-3 space-y-3 leading-relaxed">
            <p>Olá, tudo bem?</p>
            <p>
              Aqui na Costa Desenvolvimento Humano (CDH) prezamos pela
              privacidade em todos os nossos processos e no nosso modelo de
              negócio. Temos como premissa inegociável a proteção de dados de
              ponta a ponta, de todas as pessoas e empresas que utilizam os
              nossos serviços. Agimos com visibilidade e transparência: qualquer
              que seja o uso das informações, aplicamos o que foi acordado com o
              titular dos dados.
            </p>
            <p>
              O respeito pela privacidade da pessoa usuária dos nossos serviços
              será sempre um princípio primordial, seguido por todos os
              parceiros e colaboradores da CDH.
            </p>
            <p>
              Protegemos os dados das pessoas candidatas desde a aplicação na
              vaga, durante todo o processo seletivo, ou enquanto estiverem em
              nosso banco de talentos para oportunidades futuras. Processamos
              suas informações para fazer a interface entre você e nossos
              clientes, ou para encontrar uma função adequada em outro momento.
              Suas informações serão descontinuadas após 1 ano — ou antes, caso
              você solicite, a qualquer momento.
            </p>
            <p>Agradecemos pela confiança! — Costa Desenvolvimento Humano</p>
          </div>
        </details>

        <label className="flex items-start gap-3 text-sm text-off/80">
          <input
            type="checkbox"
            name="consentimento"
            required
            className="mt-1 h-4 w-4 shrink-0 accent-terracota"
          />
          <span>
            Li o Aviso de Privacidade e autorizo o processamento dos meus dados
            como parte da minha candidatura na Costa Desenvolvimento Humano. *
          </span>
        </label>

        {erro && (
          <p
            role="alert"
            className="rounded-xl bg-terracota/20 px-4 py-3 text-sm text-off"
          >
            {erro}
          </p>
        )}

        <button
          type="submit"
          className="group inline-flex items-center gap-2 rounded-full bg-off px-7 py-3.5 font-semibold text-terracota transition-all duration-300 hover:scale-[1.03] hover:bg-amarelo hover:text-azul"
        >
          Enviar candidatura
        </button>
      </form>
    </section>
  );
}
