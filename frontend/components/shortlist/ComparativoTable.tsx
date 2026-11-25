import type { Shortlist } from "@/lib/shortlist";

export default function ComparativoTable({ data }: { data: Shortlist }) {
    return (
        <div className="overflow-x-auto rounded-2xl border border-[#0E3049]/15 shadow-sm">
            <table className="w-full min-w-[900px] border-collapse text-[11px]">
                <thead>
                    <tr>
                        <th
                            colSpan={data.candidatos.length + 1}
                            className="bg-[#0E3049] py-4 text-sm font-extrabold uppercase tracking-wide text-white"
                        >
                            {data.vaga_titulo}
                        </th>
                    </tr>
                    <tr className="bg-[#C98B4B] text-left text-white">
                        <th className="w-36 p-3 font-bold uppercase">
                            Candidatas
                        </th>
                        {data.candidatos.map((c) => (
                            <th
                                key={c.id}
                                className="border-l border-white/30 p-3 font-bold uppercase"
                            >
                                {c.nome}
                            </th>
                        ))}
                    </tr>
                </thead>
                <tbody>
                    {data.criterios.map((cr) => (
                        <tr
                            key={cr.chave}
                            className="border-t border-[#0E3049]/10 align-top"
                        >
                            <td className="bg-[#F7F3EE] p-3 font-bold uppercase text-[#0E3049]/70">
                                {cr.label}
                            </td>
                            {data.candidatos.map((c) => (
                                <td
                                    key={c.id}
                                    className="whitespace-pre-line border-l border-[#0E3049]/10 p-3 leading-relaxed text-[#0E3049]"
                                >
                                    {c.respostas[cr.chave] ?? "—"}
                                </td>
                            ))}
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
