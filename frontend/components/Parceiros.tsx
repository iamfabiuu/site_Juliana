import Image from "next/image";
import Reveal from "./Reveal";
import { OrnamentoTopo, OrnamentoBase } from "./ParceirosOrnamentos";

const parceiros = [
    { nome: "Tron", src: "/01.png" },
    { nome: "Sesc Fecomércio Senac", src: "/02.png" },
    { nome: "Práxis Inter", src: "/03.png" },
    { nome: "SMS Eficaz", src: "/04.png" },
    { nome: "Marfim", src: "/05.png" },
    { nome: "HWT", src: "/06.png" },
    { nome: "Movimento", src: "/07.png" },
    { nome: "Docile", src: "/08.png" },
    { nome: "Netiun", src: "/09.png" },
    { nome: "Parceiro 10", src: "/10.png" },
    { nome: "Parceiro 11", src: "/11.png" },
    { nome: "Parceiro 12", src: "/12.png" },
    { nome: "Parceiro 13", src: "/13.png" },
    { nome: "Parceiro 14", src: "/14.png" },
    { nome: "Parceiro 15", src: "/15.png" },
    { nome: "Parceiro 16", src: "/16.png" },
];

function Logo({ nome, src }: { nome: string; src: string }) {
    return (
        <div className="flex h-16 w-[170px] shrink-0 items-center justify-center px-5">
            <Image
                src={src}
                alt={nome}
                width={150}
                height={48}
                className="max-h-12 w-auto object-contain opacity-40 grayscale transition-all duration-500 hover:opacity-100 hover:grayscale-0"
            />
        </div>
    );
}

export default function Parceiros() {
    return (
        <section
            id="parceiros"
            className="relative overflow-hidden border-y border-azul/10 py-20 md:py-24"
        >
            {/* ornamento canto superior direito */}
            <div
                aria-hidden
                className="pointer-events-none absolute -right-4 top-10 -z-10 hidden w-[160px] select-none md:block lg:w-[200px]"
            >
                <Image
                    src="/superior_direito.svg"
                    alt=""
                    width={200}
                    height={160}
                    className="h-auto w-full"
                />
            </div>

            {/* ornamento canto inferior esquerdo */}
            <div
                aria-hidden
                className="pointer-events-none absolute -left-4 bottom-6 -z-10 hidden w-[130px] select-none md:block lg:w-[160px]"
            >
                <Image
                    src="/inferior_esquerdo.svg"
                    alt=""
                    width={160}
                    height={140}
                    className="h-auto w-full"
                />
            </div>

            <div className="container-site relative">
                <Reveal>
                    <div className="mx-auto max-w-xl text-center">
                        <span className="eyebrow">Empresas que confiam</span>
                        <h2 className="mt-4 font-display text-3xl leading-snug text-azul md:text-4xl">
                            Da indústria ao varejo, da saúde aos serviços.
                        </h2>
                        <p className="mx-auto mt-5 max-w-lg text-sm leading-relaxed text-azul/55">
                            Projetos conduzidos junto a organizações de portes e
                            culturas diferentes, todas com o mesmo ponto de
                            partida: escutar antes de propor.
                        </p>
                    </div>
                </Reveal>
            </div>

            {/* marquee */}
            <Reveal delay={0.15}>
                <div className="group relative mt-14">
                    <div className="pointer-events-none absolute inset-y-0 left-0 z-10 w-20 bg-gradient-to-r from-white to-transparent md:w-32" />
                    <div className="pointer-events-none absolute inset-y-0 right-0 z-10 w-20 bg-gradient-to-l from-white to-transparent md:w-32" />

                    <div className="overflow-hidden">
                        <div className="flex w-max animate-marquee items-center group-hover:[animation-play-state:paused] motion-reduce:animate-none">
                            {[...parceiros, ...parceiros].map((p, i) => (
                                <Logo key={`${p.nome}-${i}`} {...p} />
                            ))}
                        </div>
                    </div>
                </div>
            </Reveal>

            <div className="container-site relative">
                <Reveal delay={0.25}>
                    <div className="mt-14 flex flex-col items-center gap-3 border-t border-azul/10 pt-10 text-center sm:flex-row sm:justify-center sm:gap-6">
                        <p className="text-sm text-azul/55">
                            Sua empresa pode ser a próxima nessa lista.
                        </p>
                        <a
                            href="#contato"
                            className="text-sm font-semibold text-terracota underline-offset-4 transition-colors hover:underline"
                        >
                            Vamos conversar →
                        </a>
                    </div>
                </Reveal>
            </div>
        </section>
    );
}
