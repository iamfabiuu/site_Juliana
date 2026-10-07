"use client";
import Link from "next/link";
import { useEffect, useState } from "react";
import { Menu, X, LogIn, Briefcase } from "lucide-react";
import Image from "next/image";

const nav = [
    { label: "Soluções", href: "#solucoes" },
    { label: "Método", href: "#metodo" },
    { label: "Resultados", href: "#resultados" },
    { label: "Juliana", href: "#juliana" },
    { label: "Termômetro", href: "#termometro" },
];

export default function Header() {
    const [scrolled, setScrolled] = useState(false);
    const [open, setOpen] = useState(false);

    useEffect(() => {
        const onScroll = () => setScrolled(window.scrollY > 24);
        window.addEventListener("scroll", onScroll, { passive: true });
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

    // trava o scroll do body com o menu mobile aberto
    useEffect(() => {
        document.body.style.overflow = open ? "hidden" : "";
        return () => {
            document.body.style.overflow = "";
        };
    }, [open]);

    return (
        <header
            className={`fixed inset-x-0 top-0 z-50 transition-all duration-300 ${
                scrolled ? "bg-off/90 backdrop-blur-md shadow-sm py-3" : "py-6"
            }`}
        >
            <div className="container-site flex items-center justify-between gap-8">
                <Link
                    href="/"
                    aria-label="Costa DH — página inicial"
                    className="logo-wrap shrink-0 transition-opacity duration-300 hover:opacity-80"
                >
                    <Image
                        src="/logo_sec_corrida.svg"
                        alt="Costa DH"
                        width={160}
                        height={40}
                        priority
                        className="h-9 w-auto md:h-10"
                    />
                </Link>

                <nav className="hidden lg:flex flex-1 items-center justify-end gap-6">
                    {nav.map((i) => (
                        <a
                            key={i.href}
                            href={i.href}
                            className="whitespace-nowrap text-sm font-medium text-azul/80 hover:text-terracota transition-colors"
                        >
                            {i.label}
                        </a>
                    ))}

                    <span
                        className="mx-1 h-5 w-px shrink-0 bg-azul/15"
                        aria-hidden
                    />

                    <Link
                        href="/vagas"
                        className="inline-flex shrink-0 items-center gap-2 whitespace-nowrap rounded-full border border-azul/20 px-4 py-2 text-sm font-medium leading-none text-azul transition-colors hover:border-terracota hover:text-terracota"
                    >
                        <Briefcase className="h-4 w-4" />
                        Oportunidades
                    </Link>

                    <a
                        href="https://www.api.costadh.com.br/login"
                        className="inline-flex shrink-0 items-center gap-2 whitespace-nowrap text-sm font-semibold leading-none text-azul transition-colors hover:text-terracota"
                    >
                        <LogIn className="h-4 w-4" />
                        Login
                    </a>

                    <a
                        href="#contato"
                        className="btn-primary shrink-0 whitespace-nowrap !px-7 !py-3 !text-sm !leading-none"
                    >
                        Agendar diagnóstico
                    </a>
                </nav>

                <button
                    className="lg:hidden text-azul"
                    onClick={() => setOpen(!open)}
                    aria-label={open ? "Fechar menu" : "Abrir menu"}
                    aria-expanded={open}
                >
                    {open ? <X /> : <Menu />}
                </button>
            </div>

            {open && (
                <nav className="lg:hidden bg-off border-t border-azul/10 mt-3 px-6 py-6 flex flex-col gap-5">
                    {nav.map((i) => (
                        <a
                            key={i.href}
                            href={i.href}
                            onClick={() => setOpen(false)}
                            className="font-medium text-azul"
                        >
                            {i.label}
                        </a>
                    ))}

                    <hr className="border-azul/10" />

                    <Link
                        href="/vagas"
                        onClick={() => setOpen(false)}
                        className="inline-flex items-center gap-2 font-medium text-azul"
                    >
                        <Briefcase className="h-4 w-4" /> Oportunidades
                    </Link>
                    <Link
                        href="/login"
                        onClick={() => setOpen(false)}
                        className="inline-flex items-center gap-2 font-semibold text-azul"
                    >
                        <LogIn className="h-4 w-4" /> Login
                    </Link>

                    <a
                        href="#contato"
                        onClick={() => setOpen(false)}
                        className="btn-primary w-full justify-center whitespace-nowrap !py-3 !leading-none"
                    >
                        Agendar diagnóstico
                    </a>
                </nav>
            )}
        </header>
    );
}
