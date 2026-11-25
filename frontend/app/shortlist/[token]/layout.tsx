export default function Layout({ children }: { children: React.ReactNode }) {
    return (
        <>
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link
                rel="preconnect"
                href="https://fonts.gstatic.com"
                crossOrigin=""
            />
            <link
                rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Manrope:wght@400;500;600;700;800&display=swap"
            />
            <div
                style={
                    {
                        "--font-serif": '"Cormorant Garamond", Georgia, serif',
                        "--font-sans": '"Manrope", system-ui, sans-serif',
                    } as React.CSSProperties
                }
                className="font-[family-name:var(--font-sans)]"
            >
                {children}
            </div>
        </>
    );
}
