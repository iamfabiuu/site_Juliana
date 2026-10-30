<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Candidatura;
use App\Models\Vagas;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* =========================================================
     |  Helpers
     ========================================================= */

    // Colunas comuns das listagens de candidaturas (evita repetição)
    private function colunasCandidatura(array $extras = []): array
    {
        return array_merge([
            'candidatura.id as id_candidatura',
            'candidatura.created_at',
            'candidato.id as id_candidato',
            'candidato.nome',
            'candidato.email',
            'candidato.telefone',
            'candidato.curriculo',
            'candidato.sexo',
            'candidato.uf',
            'candidato.cidade',
            'candidatura.created_at as candidatura_criada_em',
            'candidatura.status as status_candidatura',
            'vagas.titulo as titulo_vaga',
            'vagas.area as area_vaga',
            'vagas.nivel as nivel_vaga',
            'vagas.uf as uf_vaga',
            'vagas.cidade as cidade_vaga',
        ], $extras);
    }

    private function queryCandidaturas()
    {
        return Candidatura::join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
            ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id');
    }

    // Lista de candidatos sem GROUP BY (compatível com ONLY_FULL_GROUP_BY)
    // Mantém o alias "id_candidatura" para não quebrar a view
    private function queryCandidatos()
    {
        return Candidato::query()
            ->select('candidato.*')
            ->selectSub(
                Candidatura::selectRaw('MAX(id)')->whereColumn('candidatura.candidato_id', 'candidato.id'),
                'id_candidatura'
            );
    }

    /* =========================================================
     |  Painel Candidatos (candidaturas)
     ========================================================= */

    public function index_painel(Request $request)
    {
        $candidaturas = $this->queryCandidaturas()
            ->select($this->colunasCandidatura())
            ->orderByDesc('candidatura.id')
            ->paginate(50);

        $vagas = Vagas::orderBy('titulo')->get(['id', 'titulo']);

        return view('painel.index', compact('candidaturas', 'vagas'));
    }

    public function index_painel_filtro(Request $request)
    {
        $cand = $this->queryCandidaturas()->select($this->colunasCandidatura());

        if ($request->filled('nome_candidato')) {
            // Com nome informado, só esse filtro é aplicado
            $cand->where('candidato.nome', 'like', '%'.$request->nome_candidato.'%');
        } else {
            if ($request->filled('titulo_vaga')) {
                $cand->where('vagas.titulo', 'like', '%'.$request->titulo_vaga.'%');
            }

            $filtrosExatos = [
                'uf' => 'vagas.uf',
                'cidade' => 'vagas.cidade',
                'area' => 'vagas.area',
                'nivel' => 'vagas.nivel',
                'escolaridade' => 'vagas.escolaridade',
                'tipo_contrato' => 'vagas.tipo_contrato',
                'uf_candidato' => 'candidato.uf',
                'cidade_candidato' => 'candidato.cidade',
            ];

            foreach ($filtrosExatos as $campo => $coluna) {
                if ($request->filled($campo)) {
                    $cand->where($coluna, $request->input($campo));
                }
            }
        }

        $candidaturas = $cand->orderByDesc('candidatura.id')
            ->paginate(50)
            ->withQueryString(); // mantém filtros na paginação

        $vagas = Vagas::orderBy('titulo')->get(['id', 'titulo']);

        return view('painel.index', compact('candidaturas', 'vagas'));
    }

    public function contar_candidatos_vaga(Request $request)
    {
        $vaga = Vagas::find($request->vaga_id);

        return response()->json([
            'total' => Candidatura::where('vaga_id', $request->vaga_id)->count(),
            'titulo' => $vaga->titulo ?? '',
        ]);
    }

    /* =========================================================
     |  Currículos (todos os candidatos)
     ========================================================= */

    public function index_painel_cand(Request $request)
    {
        $candidatos = $this->queryCandidatos()
            ->orderByDesc('candidato.created_at')
            ->paginate(50);

        return view('painel.curriculos', compact('candidatos'));
    }

    public function index_painel_cand_filtro(Request $request)
    {
        $cand = $this->queryCandidatos();

        if ($request->filled('nome_candidato')) {
            $cand->where('candidato.nome', 'like', '%'.$request->nome_candidato.'%');
        }

        if ($request->filled(['data_inicio', 'data_fim'])) {
            $cand->whereBetween('candidato.created_at', [
                $request->data_inicio.' 00:00:00',
                $request->data_fim.' 23:59:59',
            ]);
        }

        if ($request->filled('uf')) {
            $cand->where('candidato.uf', $request->uf);
        }
        if ($request->filled('cidade')) {
            $cand->where('candidato.cidade', $request->cidade);
        }

        $candidatos = $cand->orderByDesc('candidato.created_at')
            ->paginate(50)
            ->withQueryString();

        return view('painel.curriculos', compact('candidatos'));
    }

    /* =========================================================
     |  Detalhe e edição
     ========================================================= */

    public function detalhe_candidato(Request $request)
    {
        $candidato = Candidato::findOrFail($request->id);

        $candidatura_candidato = $this->queryCandidaturas()
            ->select($this->colunasCandidatura([
                'candidatura.updated_at',
                'candidatura.observacoes',
            ]))
            ->where('candidatura.candidato_id', $candidato->id)
            ->orderByDesc('candidatura.id')
            ->get();

        return view('painel.detalhe', compact('candidato', 'candidatura_candidato'));
    }

    public function evoluir_candidato_vaga(Request $request)
    {
        $candidatura = Candidatura::findOrFail($request->id_candidatura);

        // Só os campos permitidos (evita mass assignment)
        $candidatura->fill($request->only(['status', 'observacoes']));

        return $candidatura->save()
            ? back()->with('success', 'Evolução registrada com sucesso!')
            : back()->with('error', 'Não foi possível atualizar as informações, tente novamente mais tarde!');
    }

    public function dados_candidato_vaga(Request $request)
    {
        $candidato = Candidato::findOrFail($request->id_candidato);

        $dados = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:candidato,email,'.$candidato->id,
            'telefone' => 'nullable|string|max:20',
            'sexo' => 'nullable|string|max:20',
            'uf' => 'nullable|string|size:2',
            'cidade' => 'nullable|string|max:120',
        ]);

        $candidato->fill($dados);

        return $candidato->save()
            ? back()->with('success', 'Dados do Candidato alterados com sucesso!')
            : back()->with('error', 'Não foi possível atualizar os dados do candidato!');
    }
}
