import Header from "@/components/Header";
import Footer from "@/components/Footer";
import WhatsFloat from "@/components/WhatsFloat";

export default function SiteLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <div className="min-h-dvh flex flex-col">
      <a href="#conteudo" className="sr-only sr-only-focusable">
        Pular para o conteúdo
      </a>
      <Header />
      <main id="conteudo" className="flex-1">
        {children}
      </main>
      <Footer />
      <WhatsFloat />
    </div>
  );
}
