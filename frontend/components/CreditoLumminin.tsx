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
            className="group inline-flex items-center gap-2 text-xs text-azul/70 transition-colors hover:text-terracota"
        >
            <span>Desenvolvido por</span>
            <Image
                src="/logo_branca.svg"
                alt="Lumminin"
                width={84}
                height={20}
                className="h-4 w-auto opacity-70 grayscale transition-all duration-300 group-hover:opacity-100 group-hover:grayscale-0"
            />
        </a>
    );
}
