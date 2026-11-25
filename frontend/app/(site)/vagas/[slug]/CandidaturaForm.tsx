"use client";

import { useState } from "react";
import { UploadCloud, ChevronDown, Loader2 } from "lucide-react";
import { enviarCandidatura } from "@/lib/vagas";

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

// Precisa ser igual à validação da API (mimes + max:10240)
const EXTENSOES = ["pdf", "doc", "docx", "png", "jpg", "jpeg"];
const ACEITOS = EXTENSOES.map((e) => `.${e}`).join(",");
const MAX_MB = 10;

const input =
    "mt-1.5 w-full rounded-xl border border-azul/15 bg-off px-4 py-3 text-azul outline-none transition-colors placeholder:text-azul/40 focus:border-terracota";

type ErroApi = Error & { errors?: Record<string, string[]> };

type Props = {
    vaga: string;
    slug: string;
    vagaId: number | string;
};

function validarArquivo(f: File): string | null {
    const ext = f.name.split(".").pop()?.toLowerCase() ?? "";
    if (!EXTENSOES.includes(ext))
        return "Formato não aceito. Envie PDF, Word (.doc/.docx) ou imagem (JPG/PNG).";
    if (f.size > MAX_MB * 1024 * 1024)
        return `O arquivo tem ${(f.size / 1024 / 1024).toFixed(1)}MB. O máximo é ${MAX_MB}MB.`;
    if (f.size === 0) return "O arquivo está vazio. Selecione outro.";
    return null;
}

export default function CandidaturaForm({ vagaId }: Props) {
    const [arquivo, setArquivo] = useState("");
    const [erro, setErro] = useState("");
    const [enviado, setEnviado] = useState(false);
    const [enviando, setEnviando] = useState(false);

    async function onSubmit(e: React.SyntheticEvent<HTMLFormElement>) {
        e.preventDefault();
        if (enviando) return;

        // Monta ANTES de travar o fieldset (campo disabled não entra no FormData)
        const data = new FormData(e.currentTarget);

        const f = data.get("arquivo");
        if (f instanceof File) {
            const problema = validarArquivo(f);
            if (problema) return setErro(problema);
        }

        setErro("");
        setEnviando(true);

        try {
            await enviarCandidatura(vagaId, data);
            setEnviado(true);
        } catch (err) {
            const { errors } = err as ErroApi;
            const primeiro = errors ? Object.values(errors)[0]?.[0] : undefined;
            console.error("[candidatura]", err);
            setErro(
                primeiro ??
                    (err as Error)?.message ??
                    "Não conseguimos enviar agora. Tente novamente em instantes.",
            );
        } finally {
            setEnviando(false);
        }
    }

    if (enviado)
        return (
            <div
                role="status"
                className="mt-14 rounded-xl2 bg-azul p-8 text-off"
            >
                <h2 className="font-display text-2xl">
                    Candidatura recebida! 🎉
                </h2>
                <p className="mt-2 text-sm text-off/70">
                    Obrigado pela confiança. Vamos avaliar seu perfil e, havendo
                    aderência com a posição, entraremos em contato com você.
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
                Preencha seus dados e anexe o currículo. Um parágrafo contando
                por que essa vaga faz sentido pra você conta muitos pontos.
            </p>

            <form onSubmit={onSubmit} className="mt-8 space-y-5">
                <fieldset disabled={enviando} className="space-y-5">
                    <div className="grid gap-5 md:grid-cols-2">
                        <label className="block text-sm font-medium text-off/80">
                            Nome completo *
                            <input
                                name="nome"
                                required
                                maxLength={150}
                                autoComplete="name"
                                placeholder="Seu nome"
                                className={input}
                            />
                        </label>
                        <label className="block text-sm font-medium text-off/80">
                            Contato (WhatsApp) *
                            <input
                                name="telefone"
                                required
                                type="tel"
                                inputMode="tel"
                                maxLength={30}
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
                                maxLength={255}
                                autoComplete="email"
                                autoCapitalize="none"
                                spellCheck={false}
                                placeholder="voce@email.com"
                                className={input}
                            />
                        </label>
                        <div className="grid grid-cols-[110px_1fr] gap-3">
                            <label className="block text-sm font-medium text-off/80">
                                Estado *
                                <div className="relative">
                                    <select
                                        name="uf"
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
                                    <ChevronDown className="pointer-events-none absolute right-3 top-1/2 mt-0.5 h-4 w-4 -translate-y-1/2 text-azul/50" />
                                </div>
                            </label>
                            <label className="block text-sm font-medium text-off/80">
                                Cidade *
                                <input
                                    name="cidade"
                                    required
                                    maxLength={100}
                                    autoComplete="address-level2"
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
                            maxLength={3000}
                            className={`${input} resize-none`}
                            placeholder="Conte em poucas linhas..."
                        />
                    </label>

                    {/* Upload */}
                    <div>
                        <span className="text-sm font-medium text-off/80">
                            Anexe seu currículo *
                        </span>
                        <label className="mt-1.5 flex cursor-pointer items-center gap-3 rounded-xl border border-dashed border-off/30 bg-off/5 px-4 py-5 transition-colors hover:border-amarelo focus-within:border-amarelo">
                            <UploadCloud className="h-5 w-5 shrink-0 text-amarelo" />
                            <span className="truncate text-sm text-off/70">
                                {arquivo || "Selecionar arquivo"}
                            </span>
                            <input
                                type="file"
                                name="arquivo"
                                required
                                accept={ACEITOS}
                                className="sr-only"
                                onChange={(e) => {
                                    const f = e.target.files?.[0];
                                    if (!f) return setArquivo("");
                                    const problema = validarArquivo(f);
                                    if (problema) {
                                        e.target.value = "";
                                        setArquivo("");
                                        return setErro(problema);
                                    }
                                    setErro("");
                                    setArquivo(f.name);
                                }}
                            />
                        </label>
                        <p className="mt-2 text-xs text-off/50">
                            Formatos: PDF, DOC, DOCX, JPG ou PNG · máx. {MAX_MB}
                            MB
                        </p>
                    </div>

                    {/* LGPD */}
                    <details className="rounded-xl border border-off/15 bg-off/5 p-5 text-sm text-white">
                        <summary className="cursor-pointer font-semibold text-white transition-colors hover:text-amarelo">
                            Aviso de Privacidade no processo de Recrutamento
                        </summary>
                        <div className="mt-3 space-y-3 leading-relaxed text-white [&_p]:text-white [&_h3]:text-base [&_h3]:leading-snug">
                            <p>
                                Na Costa Desenvolvimento Humano, acreditamos que
                                cada processo seletivo começa pelo respeito às
                                pessoas.
                            </p>
                            <p>
                                Ao se candidatar a uma oportunidade conduzida
                                por nossa consultoria, seus dados pessoais serão
                                tratados exclusivamente para atividades
                                relacionadas ao recrutamento e seleção, de forma
                                responsável, transparente e segura, em
                                conformidade com a Lei Geral de Proteção de
                                Dados Pessoais — LGPD (Lei nº 13.709/2018).
                            </p>

                            <h3 className="pt-2 font-semibold text-white">
                                Como utilizamos seus dados?
                            </h3>
                            <p>
                                As informações fornecidas por você poderão ser
                                utilizadas para:
                            </p>
                            <ul className="list-disc space-y-1.5 pl-5 marker:text-amarelo">
                                <li>
                                    analisar sua aderência aos requisitos da
                                    oportunidade para a qual você se candidatou;
                                </li>
                                <li>
                                    realizar contato e conduzir as etapas do
                                    processo seletivo;
                                </li>
                                <li>
                                    apresentar seu perfil profissional à empresa
                                    contratante, quando houver aderência à
                                    oportunidade;
                                </li>
                                <li>
                                    realizar entrevistas, avaliações e demais
                                    etapas previstas no processo;
                                </li>
                                <li>
                                    manter seu currículo em nossa base de
                                    profissionais para eventual contato sobre
                                    futuras oportunidades compatíveis com seu
                                    perfil, quando houver autorização para essa
                                    finalidade.
                                </li>
                            </ul>

                            <h3 className="pt-2 font-semibold text-white">
                                Quem poderá acessar seus dados?
                            </h3>
                            <p>
                                O acesso às suas informações será restrito às
                                pessoas envolvidas na condução do processo
                                seletivo e, quando necessário para a avaliação
                                de sua candidatura, aos representantes da
                                empresa contratante da oportunidade.
                            </p>
                            <p className="font-medium text-white">
                                A Costa DH não comercializa currículos ou dados
                                pessoais de candidatos.
                            </p>

                            <h3 className="pt-2 font-semibold text-white">
                                Por quanto tempo seus dados serão mantidos?
                            </h3>
                            <p>
                                Os dados relacionados ao processo seletivo serão
                                mantidos no período necessário ao cumprimento
                                das finalidades informadas. Após esse período,
                                os dados poderão ser eliminados ou, quando
                                aplicável, novamente solicitaremos sua
                                autorização para permanência na nossa base.
                            </p>

                            <h3 className="pt-2 font-semibold text-white">
                                Seus direitos
                            </h3>
                            <p>
                                Na condição de titular dos dados, você poderá
                                exercer os direitos previstos na LGPD, incluindo
                                solicitar informações sobre o tratamento de seus
                                dados, acesso, correção, atualização e, quando
                                aplicável, eliminação ou revogação do
                                consentimento.
                            </p>
                            <p>
                                Para solicitações relacionadas aos seus dados
                                pessoais, entre em contato conosco pelos canais
                                oficiais da Costa DH.
                            </p>

                            <h3 className="pt-2 font-semibold text-white">
                                Um processo seletivo com respeito às pessoas
                            </h3>
                            <p>
                                Seu currículo representa sua trajetória
                                profissional e confiamos que essa informação
                                merece ser tratada com responsabilidade. Na
                                Costa DH, buscamos conectar pessoas,
                                oportunidades e organizações de forma ética,
                                cuidadosa e transparente.
                            </p>
                            <p>
                                Ao prosseguir com sua candidatura, você declara
                                que leu este aviso e está ciente de como seus
                                dados pessoais serão tratados no processo
                                seletivo.
                            </p>
                        </div>
                    </details>

                    <div className="space-y-3">
                        <label className="flex items-start gap-3 text-sm text-white/80">
                            <input
                                type="checkbox"
                                name="concordo"
                                value="1"
                                required
                                className="mt-1 h-4 w-4 shrink-0 accent-terracota"
                            />
                            <span>
                                Estou ciente e de acordo com o tratamento dos
                                meus dados para participação neste processo
                                seletivo. *
                            </span>
                        </label>

                        <label className="flex items-start gap-3 text-sm text-white/80">
                            <input
                                type="checkbox"
                                name="bancoTalentos"
                                value="1"
                                className="mt-1 h-4 w-4 shrink-0 accent-terracota"
                            />
                            <span>
                                Autorizo a Costa DH a manter meus dados em seu
                                banco de talentos por até 12 meses para que eu
                                possa ser considerado(a) em futuras
                                oportunidades compatíveis com meu perfil.
                            </span>
                        </label>
                    </div>
                </fieldset>

                {erro && (
                    <p
                        role="alert"
                        aria-live="assertive"
                        className="rounded-xl bg-terracota/20 px-4 py-3 text-sm text-white/80"
                    >
                        {erro}
                    </p>
                )}

                <button
                    type="submit"
                    disabled={enviando}
                    className="group inline-flex items-center gap-2 rounded-full bg-off px-7 py-3.5 font-semibold text-terracota transition-all duration-300 hover:scale-[1.03] hover:bg-amarelo hover:text-azul disabled:cursor-wait disabled:opacity-60 disabled:hover:scale-100"
                >
                    {enviando && <Loader2 className="h-4 w-4 animate-spin" />}
                    {enviando ? "Enviando..." : "Enviar candidatura"}
                </button>
            </form>
        </section>
    );
}
