import type { Metadata } from "next";
import { Belleza, Manrope } from "next/font/google";
import "./globals.css";

const belleza = Belleza({
  subsets: ["latin"],
  weight: "400",
  variable: "--font-belleza",
  display: "swap",
});

const manrope = Manrope({
  subsets: ["latin"],
  variable: "--font-manrope",
  display: "swap",
});

const SITE_URL = "https://costadh.com.br";

export const metadata: Metadata = {
  metadataBase: new URL(SITE_URL),
  title: {
    default: "Costa DH | Estratégia que desenvolve pessoas",
    template: "%s | Costa DH",
  },
  description:
    "Consultoria em gestão de pessoas que conecta cultura, liderança e resultado. Diagnóstico, NR-01, treinamentos e performance. Recife/PE e todo o Brasil.",
  applicationName: "Costa DH",
  alternates: { canonical: "/" },
  robots: { index: true, follow: true },
  openGraph: {
    siteName: "Costa DH",
    title: "Costa DH | Estratégia que desenvolve pessoas",
    description: "Cultura, liderança e resultado com método e dados.",
    url: "/",
    locale: "pt_BR",
    type: "website",
    images: [{ url: "/og.png", width: 1200, height: 630, alt: "Costa DH" }],
  },
  twitter: {
    card: "summary_large_image",
    title: "Costa DH | Estratégia que desenvolve pessoas",
    description: "Cultura, liderança e resultado com método e dados.",
    images: ["/og.png"],
  },
};

export const viewport = { themeColor: "#0b3550" };

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html
      lang="pt-BR"
      className={`${belleza.variable} ${manrope.variable}`}
      suppressHydrationWarning
    >
      <body className="min-h-dvh">{children}</body>
    </html>
  );
}
