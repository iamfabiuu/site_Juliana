const API = process.env.NEXT_PUBLIC_API_URL ?? 'http://localhost:8000/api';

export type Status = 'aprovado' | 'recusado' | 'pendente';

export interface Criterio { chave: string; label: string }

export interface Candidato {
  id: number;
  nome: string;
  curriculo_url?: string;
  status?: Status;
  respostas: Record<string, string>;
}

export interface Shortlist {
  vaga_titulo: string;
  cliente_nome: string;
  mensagem?: string;
  data_envio: string;
  planilha_url?: string;
  criterios: Criterio[];
  candidatos: Candidato[];
}

export class ApiError extends Error {
  constructor(message: string, public status: number) { super(message); }
}

async function request<T>(path: string, init: RequestInit = {}): Promise<T> {
  const res = await fetch(`${API}${path}`, {
    ...init,
    headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
    cache: 'no-store',
  });
  if (!res.ok) {
    const body = await res.json().catch(() => ({}));
    throw new ApiError(body.message ?? 'Erro inesperado', res.status);
  }
  return res.json();
}

export const getShortlist = (token: string) => request<Shortlist>(`/shortlist/${token}`);

export const registrarAcao = (token: string, id: number, acao: Status, comentario = '') =>
  request(`/shortlist/${token}/acoes`, {
    method: 'POST',
    body: JSON.stringify({ shortlist_candidato_id: id, acao, comentario }),
  });
