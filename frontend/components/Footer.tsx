// Footer.tsx
import Image from "next/image";
import Link from "next/link";

const NAV = [
  ["Soluções", "#solucoes"],
  ["Como atuamos", "#como-atuamos"],
  ["Método Costa DH", "#metodo"],
  ["Sobre a Juliana", "#juliana"],
  ["Conteúdos", "#manifesto"],
  ["Contato", "#contato"],
] as const;

export default function Footer() {
  return (
    <footer className="bg-azul text-off/70 pt-16 pb-8 border-t border-off/10">
      <div className="container-site grid gap-10 md:grid-cols-4">
        <div className="md:col-span-2">
          <Link
            href="/"
            aria-label="Costa DH — página inicial"
            className="inline-block"
          >
            <Image
              src="/logo_sec_corrida.svg"
              alt="Costa DH"
              width={200}
              height={50}
              className="h-11 w-auto brightness-0 invert opacity-90 transition-opacity hover:opacity-100"
            />
          </Link>

          <p className="mt-5 font-display text-xl leading-snug text-off">
            Estratégia que desenvolve pessoas.
          </p>

          <p className="mt-3 max-w-sm text-sm leading-relaxed">
            Consultoria em gestão de pessoas, liderança e desenvolvimento
            organizacional. Soluções personalizadas para os desafios de cada
            negócio.
          </p>

          <a
            href="https://wa.me/5581999999999"
            target="_blank"
            rel="noopener noreferrer"
            className="mt-5 inline-block text-sm font-semibold text-amarelo hover:underline"
          >
            Conta pra gente →
          </a>
        </div>

        <nav aria-label="Navegação do site" className="text-sm">
          <p className="mb-3 font-semibold text-off">Navegar</p>
          <ul className="space-y-3">
            {NAV.map(([label, href]) => (
              <li key={href}>
                <a
                  href={href}
                  className="block !opacity-100 text-off/70 no-underline transition-colors hover:text-amarelo"
                >
                  {label}
                </a>
              </li>
            ))}
          </ul>
        </nav>

        <nav aria-label="Institucional" className="text-sm">
          <p className="mb-3 font-semibold text-off">Institucional</p>
          <ul className="space-y-3">
            <li>
              <Link
                href="/sobre"
                className="block !opacity-100 text-off/70 no-underline transition-colors hover:text-amarelo"
              >
                Sobre a Costa DH
              </Link>
            </li>
            <li>
              <Link
                href="/carreiras"
                className="block !opacity-100 text-off/70 no-underline transition-colors hover:text-amarelo"
              >
                Trabalhe conosco
              </Link>
            </li>
            <li>
              <Link
                href="/privacidade"
                className="block !opacity-100 text-off/70 no-underline transition-colors hover:text-amarelo"
              >
                Política de privacidade
              </Link>
            </li>
            <li>
              <a
                href="https://br.linkedin.com/company/costadesenvolvimentohumano"
                target="_blank"
                rel="noopener noreferrer"
                className="block !opacity-100 text-off/70 no-underline transition-colors hover:text-amarelo"
              >
                LinkedIn ↗
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <div className="container-site mt-12 flex flex-col gap-2 border-t border-off/10 pt-6 text-xs sm:flex-row sm:items-center sm:justify-between">
        <p>
          © {new Date().getFullYear()} Costa Desenvolvimento Humano. Todos os
          direitos reservados.
        </p>
        <p className="text-off/50">
          Pessoas no centro. Estratégia que desenvolve pessoas.
        </p>
      </div>
    </footer>
  );
}
