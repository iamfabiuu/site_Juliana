"use client";
import { useEffect, useState } from "react";
import { MessageCircle, X } from "lucide-react";

const NUMERO = "5581996092328";
const MSG =
    "Olá! Vim pelo site e quero falar sobre gestão de pessoas na minha empresa.";

export default function WhatsFloat() {
    const [visivel, setVisivel] = useState(false);
    const [aberto, setAberto] = useState(false);

    useEffect(() => {
        const onScroll = () => setVisivel(window.scrollY > 400);
        onScroll();
        window.addEventListener("scroll", onScroll, { passive: true });
        return () => window.removeEventListener("scroll", onScroll);
    }, []);

    useEffect(() => {
        if (!visivel) return;
        const t = setTimeout(() => setAberto(true), 1200);
        return () => clearTimeout(t);
    }, [visivel]);

    const link = `https://wa.me/${NUMERO}?text=${encodeURIComponent(MSG)}`;

    return (
        <div
            className={`fixed bottom-6 right-6 z-50 flex items-end gap-3 transition-all duration-500 ${
                visivel
                    ? "translate-y-0 opacity-100"
                    : "pointer-events-none translate-y-6 opacity-0"
            }`}
        >
            {/* balão */}
            <div
                className={`relative mb-1 max-w-[220px] rounded-xl2 border border-azul/10 bg-off px-4 py-3 shadow-[0_16px_40px_-16px_rgba(11,53,80,.35)] transition-all duration-500 ${
                    aberto
                        ? "scale-100 opacity-100"
                        : "pointer-events-none scale-90 opacity-0"
                }`}
            >
                <button
                    onClick={() => setAberto(false)}
                    aria-label="Fechar mensagem"
                    className="absolute -right-2 -top-2 flex h-6 w-6 items-center justify-center rounded-full border border-azul/10 bg-off text-azul/50 transition-colors hover:text-terracota"
                >
                    <X size={12} />
                </button>
                <p className="text-xs leading-relaxed text-azul/75">
                    <strong className="font-semibold text-azul">
                        Ficou com alguma dúvida?
                    </strong>{" "}
                    <br /> Fala com a gente.
                </p>
            </div>

            {/* botão */}
            <a
                href={link}
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Falar no WhatsApp"
                onClick={() => setAberto(false)}
                className="group relative flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-verde text-off shadow-[0_12px_32px_-8px_rgba(135,153,127,.7)] transition-all duration-300 hover:scale-105 hover:bg-terracota"
            >
                <span className="absolute inset-0 animate-ping rounded-full bg-verde/40 group-hover:hidden" />
                <MessageCircle size={24} className="relative" />
            </a>
        </div>
    );
}
