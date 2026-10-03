// components/ParceirosOrnamentos.tsx
export function OrnamentoTopo() {
    return (
        <svg
            aria-hidden
            viewBox="0 0 200 160"
            className="pointer-events-none absolute -right-6 top-10 hidden w-[180px] select-none md:block lg:w-[220px]"
        >
            {/* chevron azul */}
            <path
                d="M20 110 L120 25 L220 110"
                fill="none"
                stroke="#0E3550"
                strokeWidth="34"
                strokeLinecap="round"
                strokeLinejoin="round"
            />
            {/* círculo verde */}
            <circle cx="125" cy="115" r="40" fill="#8A9A7E" />
        </svg>
    );
}

export function OrnamentoBase() {
    return (
        <svg
            aria-hidden
            viewBox="0 0 160 140"
            className="pointer-events-none absolute -left-6 bottom-6 hidden w-[140px] select-none md:block lg:w-[170px]"
        >
            {/* check verde */}
            <path
                d="M-10 70 L40 115 L130 35"
                fill="none"
                stroke="#8A9A7E"
                strokeWidth="26"
                strokeLinecap="round"
                strokeLinejoin="round"
            />
            {/* círculo amarelo */}
            <circle cx="40" cy="40" r="34" fill="#E0A800" />
        </svg>
    );
}
