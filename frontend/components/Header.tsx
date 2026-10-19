"use client";
import Link from "next/link";
import { useEffect, useState } from "react";
import { Menu, X, LogIn } from "lucide-react";
import Image from "next/image";

const LOGIN_URL = "https://www.api.costadh.com.br/login";

const nav = [
    { label: "Soluções", href: "#solucoes" },
    { label: "Método", href: "#metodo" },
    { label: "Resultados", href: "#resultados" },
    { label: "Juliana", href: "#juliana" },
    { label: "Termômetro", href: "#termometro" },
    { label: "Carreiras", href: "/vagas" },
];

const linkClass =
    "whitespace-nowrap text-sm font-medium text-azul/80 transition-colors hover:text-terracota";

function NavLink({
    href,
    label,
    className = linkClass,
    onClick,
}: {
    href: string;
    label: string;
    className?: string;
    onClick?: () => void;
}) {
    return href.startsWith("/") ? (
        <Link href={href} className={className} onClick={onClick}>
            {label}
        </Link>
    ) : (
        <a href={href} className={className} onClick={onClick}>
            {label}
        </a>
    );
}

export default function Header() {
    const [scrolled, setScrolled] = useState(false);
    const [open, setOpen] = useState(false);

    useEffect(() => {
        const onScroll = () => setScrolled(window.scrollY > 24);
        window.addEventListener("scroll", onScroll, { passive: true });
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

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
            <div className="container-site flex items-center justify-between lg:grid lg:grid-cols-[auto_1fr_auto] lg:gap-12">
                {/* Marca com mais presença */}
                <Link
                    href="/"
                    aria-label="Costa DH — página inicial"
                    className="shrink-0 transition-opacity duration-300 hover:opacity-80"
                >
                    <Image
                        src="/logo_sec_corrida.svg"
                        alt="Costa DH"
                        width={200}
                        height={50}
                        priority
                        className={`w-auto transition-all duration-300 ${
                            scrolled ? "h-10 md:h-11" : "h-11 md:h-14"
                        }`}
                    />
                </Link>

                {/* Navegação centralizada */}
                <nav className="hidden lg:flex items-center justify-center gap-8 xl:gap-10">
                    {nav.map((i) => (
                        <NavLink key={i.href} {...i} />
                    ))}
                </nav>

                {/* Ações */}
                <div className="hidden lg:flex items-center gap-6">
                    <a
                        href={LOGIN_URL}
                        className={`${linkClass} inline-flex items-center gap-2 font-semibold text-azul`}
                    >
                        <LogIn className="h-4 w-4" /> Login
                    </a>
                    <a href="#contato" className={linkClass}>
                        Agendar diagnóstico
                    </a>
                </div>

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
                        <NavLink
                            key={i.href}
                            {...i}
                            className="font-medium text-azul"
                            onClick={() => setOpen(false)}
                        />
                    ))}
                    <hr className="border-azul/10" />
                    <a
                        href={LOGIN_URL}
                        className="inline-flex items-center gap-2 font-semibold text-azul"
                    >
                        <LogIn className="h-4 w-4" /> Login
                    </a>
                    <a
                        href="#contato"
                        onClick={() => setOpen(false)}
                        className="font-medium text-azul"
                    >
                        Agendar diagnóstico
                    </a>
                </nav>
            )}
        </header>
    );
}
