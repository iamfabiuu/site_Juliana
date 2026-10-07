import Image from "next/image";

const LINK =
    "https://lumminin.com.br?utm_source=costadh&utm_medium=footer&utm_campaign=credito";

export default function CreditoLumminin() {
    return (
        <a
            href={LINK}
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Site desenvolvido por Lumminin"
            className="group inline-flex items-center gap-2 text-xs text-off/50 transition-colors hover:text-off"
        >
            <span>Desenvolvido por</span>
            <Image
                src="/logo_branca.svg"
                alt="Lumminin"
                width={84}
                height={20}
                className="h-4 w-auto opacity-60 brightness-0 invert transition-all duration-300 group-hover:opacity-100 group-hover:brightness-100 group-hover:invert-0"
            />
        </a>
    );
}
