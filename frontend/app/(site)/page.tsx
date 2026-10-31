import Image from "next/image";
import Parceiros from "@/components/Parceiros";
import Typewriter from "@/components/Typewriter";
import Reveal from "@/components/Reveal";
import Counter from "@/components/Counter";
import Termometro from "@/components/Termometro";
import {
    Users,
    Brain,
    ShieldCheck,
    Layers,
    TrendingUp,
    Search,
    ArrowRight,
    Check,
    Mail,
    MessageCircle,
    MapPin,
    UserCheck,
} from "lucide-react";

const credenciais = [
    {
        t: "Psicologia Organizacional",
        d: "CRP ativo · 20+ anos de prática clínica e corporativa",
    },
    {
        t: "Estratégia de Negócio",
        d: "6+ anos conectando pessoas a indicadores de resultado",
    },
    {
        t: "Gamificação e Metodologias Ativas em Educação",
        d: "Atuação aplicada em gestão de riscos e saúde organizacional.",
    },
    {
        t: "Desenvolvimento de Líderes",
        d: "Metodologia própria com trilhas e apoio individual",
    },
];

const atuacao = [
    "Hunting Executivo",
    "Diagnóstico organizacional",
    "Cultura e clima",
    "Formação de lideranças",
    "Fatores psicossociais",
    "Consultoria sob demanda",
];

const solucoes = [
    {
        icon: Search,
        t: "Hunting Executivo",
        d: "Recrutamento de profissionais alinhados ao desafio, à cultura e às necessidades do negócio.",
    },
    {
        icon: Users,
        t: "Ações de Clima e Cultura",
        d: "Diagnósticos, escuta e consultoria organizacional em ações para fortalecer cultura, relações e engajamento. Apoio à gestão dos fatores psicossociais, incluindo demandas relacionadas à NR-01.",
    },
    {
        icon: Brain,
        t: "Treinamento & Desenvolvimento",
        d: "Programas, palestras, rodas de conversa, workshops, trilhas e experiências práticas para desenvolver competências, visando transformar conhecimento em comportamento.",
    },
    {
        icon: TrendingUp,
        t: "Liderança & Gestão",
        d: "Desenvolvimento de líderes e gestores para ampliar repertório, fortalecer relações e otimizar decisões.",
    },
    {
        icon: Layers,
        t: "Consultoria sob demanda",
        d: "Apoio especializado para empresários e gestores que precisam tomar decisões sobre pessoas, estruturar processos ou enfrentar um desafio específico.",
    },
];

const metodo = [
    {
        n: "01",
        t: "Entender",
        d: "Escutamos pessoas, contexto e necessidades do negócio.",
        saida: "Leitura do contexto",
    },
    {
        n: "02",
        t: "Estruturar",
        d: "Transformamos informações em prioridades, estratégias e planos de ação.",
        saida: "Plano de ação",
    },
    {
        n: "03",
        t: "Desenvolver",
        d: "Colocamos a solução em prática por meio de projetos, processos, treinamentos ou intervenções.",
        saida: "Execução acompanhada",
    },
    {
        n: "04",
        t: "Acompanhar",
        d: "Observamos evolução, resultados e aprendizados para apoiar decisões futuras.",
        saida: "Evolução e aprendizados",
    },
];

const dores = [
    {
        t: "Turnover e dificuldade de retenção",
        d: "Você contrata, mas as pessoas não permanecem ou os motivos dos desligamentos não são claros.",
        icon: TrendingUp,
    },
    {
        t: "Lideranças que precisam se desenvolver",
        d: "Profissionais tecnicamente bons assumem a gestão, mas precisam de método para liderar pessoas e tomar decisões.",
        icon: Users,
    },
    {
        t: "Cultura que não chega à prática",
        d: "Os valores estão definidos, mas não aparecem nos comportamentos, decisões e relações do dia a dia.",
        icon: Layers,
    },
    {
        t: "Processos de pessoas desconectados",
        d: "Recrutamento, desenvolvimento, avaliação e gestão acontecem de forma isolada, sem conexão com a estratégia.",
        icon: Layers,
    },
    {
        t: "Decisões sobre pessoas baseadas apenas em percepção",
        d: "Faltam dados, indicadores e uma leitura estruturada para apoiar decisões.",
        icon: Brain,
    },
    {
        t: "Novos desafios de gestão e saúde organizacional",
        d: "A empresa precisa compreender riscos, relações de trabalho e fatores psicossociais de forma responsável e aplicada.",
        icon: ShieldCheck,
    },
];

const comoAtuamos = [
    {
        icon: UserCheck,
        t: "Condução estratégica",
        d: "A condução estratégica é feita por Juliana Costa, com apoio de uma estrutura e suporte de profissionais conforme a necessidade de cada projeto.",
    },
    {
        icon: Layers,
        t: "Estrutura flexível",
        d: "A Costa DH trabalha com uma estrutura flexível, que se adapta ao desafio de cada cliente.",
    },
    {
        icon: MapPin,
        t: "Presencial ou remoto",
        d: "Os encontros podem acontecer presencialmente na empresa, em espaços parceiros ou de forma remota, de acordo com o objetivo e a dinâmica de cada trabalho.",
    },
];

export default function Home() {
    return (
        <>
            {/* HERO */}
            <section className="relative overflow-hidden pt-36 pb-24 md:pt-44 md:pb-32">
                {/* padronagem decorativa — detalhe sutil de fundo */}
                <div
                    className="pointer-events-none absolute right-0 top-0 -z-10 hidden h-full w-[180px] select-none opacity-90 lg:block xl:w-[240px]"
                    aria-hidden
                >
                    <Image
                        src="/Hero.svg"
                        alt=""
                        fill
                        quality={90}
                        className="object-cover object-right-top"
                    />
                </div>

                <div className="container-site relative grid gap-14 lg:grid-cols-[1.05fr_.95fr] lg:items-stretch lg:gap-16 lg:pr-20 xl:pr-24">
                    <Reveal>
                        <span className="eyebrow">
                            Pessoas · Liderança · Negócio
                        </span>

                        <h1 className="h1 mt-5 leading-[1.08]">
                            Estratégia que <br />
                            <Typewriter
                                className="text-terracota"
                                words={[
                                    "desenvolve pessoas.",
                                    "sustenta o negócio.",
                                    "fortalece a cultura.",
                                    "forma líderes.",
                                ]}
                            />
                        </h1>

                        <p className="lead mt-7 max-w-[34rem]">
                            Apoiamos empresas nas decisões sobre pessoas,
                            liderança e desenvolvimento humano e organizacional,
                            transformando desafios de gestão em soluções
                            práticas, personalizadas e orientadas a resultados.
                        </p>

                        <p className="mt-5 max-w-[32rem] text-[0.95rem] leading-relaxed text-azul/60">
                            Soluções personalizadas para os desafios reais de
                            cada negócio, da decisão estratégica à aplicação na
                            rotina.
                        </p>

                        <div className="mt-9 flex flex-wrap items-center gap-4">
                            <a
                                href="https://www.linkedin.com/in/julianan-costa/"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="btn-primary whitespace-nowrap !leading-none"
                            >
                                Quero conversar sobre meu desafio{" "}
                                <ArrowRight size={18} />
                            </a>
                            <a
                                href="#metodo"
                                className="btn-ghost whitespace-nowrap !leading-none"
                            >
                                Conhecer método
                            </a>
                        </div>
                    </Reveal>

                    <Reveal delay={0.15}>
                        <div className="relative aspect-[4/5] h-full overflow-hidden rounded-xl2 bg-azul lg:aspect-auto">
                            <Image
                                src="/hero03.jpg"
                                alt="Consultoria em gestão de pessoas — Costa DH"
                                fill
                                sizes="(max-width: 1024px) 100vw, 45vw"
                                priority
                                className="object-cover object-top"
                            />
                        </div>
                    </Reveal>
                </div>
            </section>

            {/* DORES */}
            <section className="section relative overflow-hidden bg-azul text-off">
                <div
                    className="pointer-events-none absolute inset-0 opacity-[0.05]"
                    style={{
                        backgroundImage:
                            "url('/CostaDH_Modulos-Intercalados-Espacados.svg.svg')",
                        backgroundSize: "400px",
                    }}
                />

                <div className="container-site relative">
                    <Reveal>
                        <span className="eyebrow !text-amarelo">
                            O que costuma travar o crescimento
                        </span>
                        <h2 className="h2 mt-4 max-w-3xl text-off">
                            Quando as pessoas não acompanham, a estratégia para.
                        </h2>
                        <p className="mt-5 max-w-2xl text-lg leading-relaxed text-off/80">
                            Quando a gestão de pessoas não acompanha o negócio,
                            o crescimento trava. Reconhece algum desses
                            cenários?
                        </p>
                    </Reveal>

                    <div className="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        {dores.map((d, i) => (
                            <Reveal key={d.t} delay={i * 0.08}>
                                <div className="group relative h-full overflow-hidden rounded-xl2 border border-off/15 bg-off/[0.06] p-8 transition-all duration-500 hover:-translate-y-2 hover:border-amarelo/40 hover:bg-off/[0.1]">
                                    <span className="relative flex h-12 w-12 items-center justify-center rounded-full bg-off/10 text-amarelo transition-colors duration-500 group-hover:bg-amarelo group-hover:text-azul">
                                        <d.icon size={22} />
                                    </span>
                                    <h3 className="relative mt-6 text-xl font-semibold leading-snug text-off">
                                        {d.t}
                                    </h3>
                                    <p className="relative mt-3 text-sm leading-relaxed text-off/70">
                                        {d.d}
                                    </p>
                                    <span className="absolute bottom-0 left-0 h-[3px] w-0 bg-amarelo transition-all duration-500 group-hover:w-full" />
                                </div>
                            </Reveal>
                        ))}
                    </div>

                    <Reveal delay={0.2}>
                        <div className="mt-14 flex flex-wrap items-center justify-between gap-6 overflow-hidden rounded-xl2 bg-terracota p-9 text-off shadow-[0_24px_60px_-28px_rgba(0,0,0,.45)]">
                            <p className="max-w-xl font-display text-2xl leading-snug text-off">
                                Vamos entender o que está acontecendo na sua
                                empresa?
                            </p>
                            <a
                                href="https://www.linkedin.com/in/julianan-costa/"
                                className="group shrink-0 inline-flex items-center gap-2 rounded-full bg-off px-7 py-3.5 font-semibold text-terracota transition-all duration-300 hover:scale-[1.03] hover:bg-azul hover:text-off"
                            >
                                Quero conversar
                                <ArrowRight
                                    size={18}
                                    className="transition-transform duration-300 group-hover:translate-x-1"
                                />
                            </a>
                        </div>
                    </Reveal>
                </div>
            </section>

            {/* MANIFESTO */}
            <section
                id="manifesto"
                className="section relative overflow-hidden border-y border-azul/10 bg-white/50"
            >
                {/* padronagem lateral com scroll infinito sutil */}
                <div
                    className="pointer-events-none absolute left-0 top-0 hidden h-full w-[200px] select-none lg:block xl:w-[240px]"
                    aria-hidden
                >
                    <div className="animate-pattern-scroll absolute inset-x-0 top-0 h-[202%]">
                        <div className="relative h-1/2 w-full">
                            <Image
                                src="/manifesto.svg"
                                alt=""
                                fill
                                className="object-cover object-top"
                            />
                        </div>
                        <div className="relative h-1/2 w-full">
                            <Image
                                src="/manifesto.svg"
                                alt=""
                                fill
                                className="object-cover object-top"
                            />
                        </div>
                    </div>
                </div>
                <div className="container-site max-w-4xl">
                    <Reveal>
                        <span className="eyebrow">O Manifesto</span>
                        <h2 className="h2 mt-4">
                            Eu acredito que nenhuma estratégia se sustenta sem
                            pessoas.
                        </h2>
                    </Reveal>
                    <Reveal delay={0.1}>
                        <div className="mt-10 space-y-6 text-lg leading-relaxed text-azul/75">
                            <p>
                                E que nenhuma empresa cresce de forma
                                consistente quando se distancia das conexões
                                humanas que sustentam sua cultura, seus
                                resultados e seu propósito.
                            </p>
                            <p>
                                Ao longo dos últimos anos, apoio empresários e
                                lideranças na tomada de decisões sobre pessoas,
                                desenvolvimento de equipes e crescimento
                                organizacional. Porque desenvolver pessoas é
                                também fortalecer relações, alinhar expectativas
                                e construir ambientes onde compromisso e
                                crescimento caminham juntos.
                            </p>
                            <p>
                                Em um cenário em que a tecnologia acelera
                                processos, conecta pessoas, integra dados e
                                amplia possibilidades, usamos ferramentas, IA,
                                metodologias, indicadores e estratégia para a
                                tomada de decisão e o desenvolvimento de novas
                                habilidades. Acreditamos que nenhuma inovação
                                gera resultados sustentáveis sem pessoas
                                engajadas, pertencentes e preparadas para
                                evoluir continuamente.
                            </p>
                            <p>
                                Por isso, atuamos lado a lado de nossos
                                clientes, como parceiros estratégicos. Ouvimos,
                                diagnosticamos, analisamos e desenvolvemos
                                soluções que respeitam a singularidade de cada
                                cultura organizacional.
                            </p>
                            <p>
                                Estruturamos processos, facilitamos estratégias
                                e fortalecemos conexões entre pessoas que
                                colaboram, engajam e celebram resultados em
                                equipe.
                            </p>
                            <p>
                                Desafios podem se transformar em caminhos
                                estruturados quando existe clareza, intenção e
                                desenvolvimento humano. Assim, construímos
                                ambientes onde aprendizagem e desenvolvimento
                                são contínuos, intencionais e conectados à
                                realidade de cada parceiro.
                            </p>
                        </div>
                    </Reveal>
                    <Reveal delay={0.2}>
                        <p className="mt-10 border-l-[3px] border-terracota pl-6 font-display text-2xl leading-snug text-azul md:text-3xl">
                            Porque desenvolver pessoas é compreender, respeitar
                            e desenvolver junto.
                        </p>
                    </Reveal>
                </div>
            </section>

            {/* EMPRESAS QUE CONFIAM */}
            <Parceiros />

            {/* COMO ATUAMOS */}
            <section
                id="como-atuamos"
                className="section relative overflow-hidden bg-azul text-off"
            >
                <div
                    className="pointer-events-none absolute inset-0 opacity-[0.05]"
                    style={{
                        backgroundImage: "url('/padronagem.svg')",
                        backgroundSize: "400px",
                    }}
                />

                <div className="container-site relative">
                    <Reveal>
                        <span className="eyebrow !text-amarelo">
                            Nosso Jeito
                        </span>
                        <h2 className="h2 mt-4 max-w-3xl text-off">
                            Uma consultoria enxuta. <br></br>Uma atuação
                            personalizada.
                        </h2>
                    </Reveal>

                    <div className="mt-14 grid gap-6 md:grid-cols-3">
                        {comoAtuamos.map((c, i) => (
                            <Reveal key={c.t} delay={i * 0.1}>
                                <article className="group h-full rounded-xl2 border border-off/15 bg-off/[0.06] p-8 transition-all duration-500 hover:-translate-y-1 hover:border-amarelo/40 hover:bg-off/[0.1]">
                                    <c.icon
                                        className="text-amarelo"
                                        size={28}
                                        strokeWidth={1.6}
                                    />
                                    <h3 className="mt-5 font-display text-2xl text-off">
                                        {c.t}
                                    </h3>
                                    <p className="mt-3 leading-relaxed text-off/70">
                                        {c.d}
                                    </p>
                                </article>
                            </Reveal>
                        ))}
                    </div>
                </div>
            </section>

            {/* MÉTODO */}
            <section
                id="metodo"
                className="section relative overflow-hidden !pb-32 md:!pb-40"
            >
                <div className="container-site">
                    <Reveal>
                        <div className="max-w-2xl">
                            <span className="eyebrow">Método Costa DH</span>
                            <h2 className="h2 mt-4">
                                Entender. Estruturar. Desenvolver. Acompanhar.
                            </h2>
                        </div>
                    </Reveal>

                    <div className="mt-20 grid gap-x-10 gap-y-14 md:grid-cols-2 lg:grid-cols-4">
                        {metodo.map((m, i) => (
                            <Reveal key={m.n} delay={i * 0.1}>
                                <div className="group">
                                    <div className="relative h-px w-full bg-azul/15">
                                        <span className="absolute left-0 top-0 h-px w-8 bg-terracota transition-all duration-700 group-hover:w-full" />
                                    </div>
                                    <div className="pt-7">
                                        <span className="text-xs font-semibold tracking-[0.3em] text-azul/30">
                                            {m.n}
                                        </span>
                                        <h3 className="mt-4 font-display text-3xl text-azul">
                                            {m.t}
                                        </h3>
                                        <p className="mt-4 text-sm leading-relaxed text-azul/60">
                                            {m.d}
                                        </p>
                                        <p className="mt-6 text-[11px] font-semibold uppercase tracking-widest text-azul/35 transition-colors duration-500 group-hover:text-terracota">
                                            {m.saida}
                                        </p>
                                    </div>
                                </div>
                            </Reveal>
                        ))}
                    </div>

                    <Reveal delay={0.2}>
                        <div className="mt-16 flex flex-wrap items-center justify-between gap-6 rounded-xl2 border-l-[3px] border-terracota bg-white/60 p-8">
                            <p className="max-w-2xl font-display text-xl leading-relaxed text-azul md:text-2xl">
                                Não entregamos apenas uma recomendação. Apoiamos
                                a empresa a transformar a decisão em prática.
                            </p>
                            <a
                                href="https://www.linkedin.com/in/julianan-costa/"
                                className="btn-ghost shrink-0"
                            >
                                Quero entender a experiência{" "}
                                <ArrowRight size={18} />
                            </a>
                        </div>
                    </Reveal>
                </div>
                <div
                    aria-hidden
                    className="pointer-events-none absolute bottom-0 right-0 hidden h-[64px] w-[300px] select-none md:block lg:h-[110px] lg:w-[500px]"
                    style={{
                        backgroundImage:
                            "url('/CostaDH_Modulos-Intercalados-Espacados.svg.svg')",
                        backgroundRepeat: "repeat-x",
                        backgroundSize: "auto 100%",
                        backgroundPosition: "left center",
                    }}
                />
            </section>

            {/* RESULTADOS */}
            <section
                id="resultados"
                className="section relative overflow-hidden"
            >
                <div
                    aria-hidden
                    className="pointer-events-none absolute left-0 top-0 hidden h-[auto] w-[130px] select-none md:block lg:h-[110px] lg:w-[500px]"
                    style={{
                        backgroundImage:
                            "url('/CostaDH_Modulos-Intercalados-Espacados.svg.svg')",
                        backgroundRepeat: "repeat-x",
                        backgroundSize: "auto 100%",
                        backgroundPosition: "right center",
                    }}
                />
                <div className="container-site">
                    <Reveal>
                        <div className="mx-auto max-w-2xl text-center">
                            <span className="eyebrow">Experiência</span>
                            <h2 className="h2 mt-4">
                                Experiência aplicada, não teoria de prateleira.
                            </h2>
                        </div>
                    </Reveal>

                    <div className="mt-16 grid gap-px overflow-hidden rounded-xl2 border border-azul/10 bg-azul/10 md:grid-cols-2 lg:grid-cols-4">
                        {[
                            {
                                n: <Counter to={20} suffix="+" />,
                                t: "anos",
                                l: "de experiência em Psicologia e desenvolvimento humano.",
                                icon: Brain,
                            },
                            {
                                n: <Counter to={6} suffix="+" />,
                                t: "anos",
                                l: "em consultoria estratégica.",
                                icon: TrendingUp,
                            },
                            {
                                n: <Counter to={100} suffix="+" />,
                                t: "líderes apoiados",
                                l: "em programas de desenvolvimento e apoio à gestão.",
                                icon: Users,
                            },
                            {
                                n: <Counter to={100} suffix="%" />,
                                t: "projetos sob medida",
                                l: "para diferentes desafios, segmentos e momentos organizacionais.",
                                icon: Layers,
                            },
                        ].map((r, i) => (
                            <Reveal key={i} delay={i * 0.12}>
                                <div className="group h-full bg-off/80 p-10 text-center transition-colors duration-500 hover:bg-white">
                                    <span className="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-terracota/10 text-terracota transition-transform duration-500 group-hover:scale-110">
                                        <r.icon size={20} />
                                    </span>
                                    <p className="mt-6 font-display text-5xl leading-none text-terracota md:text-6xl">
                                        {r.n}
                                    </p>
                                    <p className="mt-3 text-sm font-semibold uppercase tracking-widest text-azul">
                                        {r.t}
                                    </p>
                                    <p className="mt-4 text-sm leading-relaxed text-azul/60">
                                        {r.l}
                                    </p>
                                </div>
                            </Reveal>
                        ))}
                    </div>

                    <Reveal delay={0.25}>
                        <p className="mx-auto mt-12 max-w-3xl text-center font-display text-xl leading-relaxed text-azul md:text-2xl">
                            Cada projeto começa com uma realidade. Por isso,
                            nenhuma solução é igual à outra.
                        </p>
                    </Reveal>
                </div>
            </section>

            {/* JULIANA */}
            <section
                id="juliana"
                className="section relative overflow-hidden bg-verde text-off"
            >
                <div
                    className="pointer-events-none absolute inset-0 opacity-[0.05]"
                    style={{
                        backgroundImage:
                            "url('/CostaDH_Modulos-Intercalados.svg.svg')",
                        backgroundSize: "400px",
                    }}
                />

                <div className="container-site relative">
                    {/* FOTO + TEXTO */}
                    <div className="grid gap-16 lg:grid-cols-[.85fr_1.15fr] lg:items-start">
                        <Reveal>
                            <div className="relative aspect-[4/5] overflow-hidden rounded-xl2 bg-azul/40">
                                <Image
                                    src="/Gemini_Generated_Image_qeqssjqeqssjqeqs.jpg"
                                    alt="Juliana Costa, psicóloga e estrategista em desenvolvimento humano"
                                    fill
                                    className="object-cover"
                                />
                                <div className="absolute inset-0 bg-gradient-to-t from-verde/70 via-transparent to-transparent" />
                            </div>
                        </Reveal>

                        <Reveal delay={0.15}>
                            <span className="eyebrow !text-amarelo">
                                Quem conduz
                            </span>
                            <h2 className="h2 mt-4 text-off">Juliana Costa</h2>
                            <p className="mt-2 text-sm font-semibold uppercase tracking-[0.2em] text-off/50">
                                Psicóloga · Estrategista em Desenvolvimento
                                Humano e Gestão de Pessoas
                            </p>

                            <div className="mt-8 space-y-5 text-lg leading-relaxed text-white/90">
                                <p className="text-off/70">
                                    Há mais de 20 anos, Juliana atua conectando
                                    Psicologia, desenvolvimento humano e
                                    realidade organizacional.
                                </p>
                                <p className="text-off/70">
                                    À frente da Costa DH, transforma desafios
                                    relacionados a pessoas, liderança e gestão
                                    em estratégias aplicáveis ao negócio.
                                </p>
                                <p className="text-off/70">
                                    Sua atuação combina escuta, experiência
                                    prática, metodologia e visão estratégica,
                                    construindo soluções que fazem sentido para
                                    a realidade de cada empresa.
                                </p>
                                <p className="text-off/70">
                                    Na Costa DH: Recrutamos, diagnosticamos,
                                    treinamos, desenvolvemos, estruturamos e
                                    apoiamos decisões em soluções que conectam
                                    pessoas, gestão e negócio. Cada empresa está
                                    em um momento diferente. Por isso,
                                    entendemos o contexto, identificamos
                                    prioridades e desenhamos a intervenção
                                    necessária para o negócio.
                                </p>
                            </div>
                        </Reveal>
                    </div>

                    {/* CREDENCIAIS — largura total */}
                    <Reveal delay={0.2}>
                        <div className="mt-14 grid auto-rows-fr gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            {credenciais.map((c) => (
                                <div
                                    key={c.t}
                                    className="group flex h-full flex-col rounded-xl2 border border-off/15 bg-off/[0.06] p-6 transition-colors duration-500 hover:border-amarelo/50"
                                >
                                    <p className="flex items-start gap-2 text-sm font-semibold leading-snug text-amarelo">
                                        <Check
                                            size={15}
                                            className="mt-[3px] shrink-0"
                                        />
                                        <span>{c.t}</span>
                                    </p>
                                    <p className="mt-2 pl-[23px] text-xs leading-relaxed text-off/60">
                                        {c.d}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </Reveal>

                    {/* SOLUÇÕES */}
                    <Reveal delay={0.25}>
                        <div className="mt-6 grid auto-rows-fr gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            {solucoes.map(({ icon: Icon, t, d }) => (
                                <div
                                    key={t}
                                    className="group flex h-full flex-col rounded-xl2 border border-off/15 bg-off/[0.06] p-8 transition-colors duration-500 hover:border-amarelo/50"
                                >
                                    <Icon
                                        size={30}
                                        strokeWidth={1.6}
                                        className="text-amarelo"
                                    />
                                    <h3 className="mt-6 font-display text-2xl leading-tight text-off">
                                        {t}
                                    </h3>
                                    <p className="mt-4 text-base leading-relaxed text-off/70">
                                        {d}
                                    </p>
                                </div>
                            ))}

                            {/* CARD CTA */}
                            <a
                                href="https://www.linkedin.com/in/julianan-costa/"
                                className="group flex h-full flex-col justify-center rounded-xl2 bg-azul p-8 transition-transform duration-500 hover:-translate-y-1"
                            >
                                <h3 className="font-display text-2xl leading-tight text-off">
                                    Precisa de algo sob medida?
                                </h3>
                                <p className="mt-4 text-base leading-relaxed text-off/70">
                                    Desenhamos a solução a partir do seu
                                    contexto.
                                </p>
                                <span className="mt-6 inline-flex items-center gap-2 font-semibold text-amarelo">
                                    Conta pra gente
                                    <ArrowRight
                                        size={18}
                                        className="transition-transform group-hover:translate-x-1"
                                    />
                                </span>
                            </a>
                        </div>
                    </Reveal>
                </div>
            </section>

            {/* DEPOIMENTOS */}
            <section
                id="depoimentos"
                className="section relative overflow-hidden bg-white"
            >
                {/* padronagem lateral (mesma linguagem do Manifesto) */}
                <div
                    className="pointer-events-none absolute left-0 top-0 hidden h-full w-[220px] select-none lg:block xl:w-[300px]"
                    aria-hidden
                >
                    <Image
                        src="/Hero.svg"
                        alt=""
                        fill
                        className="-scale-x-100 object-cover object-right-top"
                    />
                </div>

                <div className="container-site relative lg:pl-[260px] xl:pl-[340px]">
                    <Reveal>
                        <span className="eyebrow">Depoimentos</span>
                        <h2 className="h2 mt-4 max-w-3xl">
                            O resultado aparece na rotina.
                        </h2>
                    </Reveal>

                    <div className="mt-12 max-w-[60rem] space-y-10">
                        {[
                            {
                                q: "Juliana sempre foi uma grande parceira no crescimento da SMS Eficaz. É sempre um enorme prazer contar com o seu apoio! Sua contribuição vai muito além dos processos seletivos e contratações. Ela também nos ajudou no desenvolvimento do PDI dos nossos líderes, agregando ainda mais valor à nossa equipe.",
                                a: "Diego Oliveira",
                                tag: "Diretor SMS Eficaz",
                            },
                            {
                                q: "O trabalho consultivo e operacional da Juliana foi fundamental na contratação de pessoas importantíssimas para nosso time. Principalmente no nível gerencial, suas escolhas de perfil e competência nos trouxeram pessoas extremamente adequadas à nossa organização. Indico fortemente.",
                                a: "Oswaldo Redig",
                                tag: "Diretor Geral da Tron Soluções Tecnológicas",
                            },
                        ].map((t, i) => (
                            <Reveal key={t.a} delay={i * 0.1}>
                                <blockquote className="border-l-2 border-terracota/40 pl-6 transition-colors duration-500 hover:border-terracota">
                                    <p className="text-lg leading-relaxed text-azul/75">
                                        “{t.q}”
                                    </p>
                                    <footer className="mt-4 flex flex-wrap items-center gap-3">
                                        <span className="text-sm font-semibold text-azul">
                                            {t.a}
                                        </span>
                                        <span className="rounded-full bg-terracota/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-terracota">
                                            {t.tag}
                                        </span>
                                    </footer>
                                </blockquote>
                            </Reveal>
                        ))}
                    </div>
                </div>
            </section>
            {/* <Termometro /> */}
        </>
    );
}
