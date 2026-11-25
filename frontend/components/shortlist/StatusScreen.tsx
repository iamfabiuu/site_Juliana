import type { ReactNode } from "react";

export default function StatusScreen({
    icon,
    title,
    text,
}: {
    icon: ReactNode;
    title: string;
    text?: string;
}) {
    return (
        <div className="grid min-h-screen place-items-center bg-[#ECE5DA] px-6 text-center">
            <div className="max-w-md">
                <div className="mb-4 text-4xl text-[#C98B4B]">{icon}</div>
                <h1 className="font-[family-name:var(--font-serif)] text-4xl text-[#0E3049]">
                    {title}
                </h1>
                {text && (
                    <p className="mt-2 text-sm text-[#0E3049]/70">{text}</p>
                )}
            </div>
        </div>
    );
}
