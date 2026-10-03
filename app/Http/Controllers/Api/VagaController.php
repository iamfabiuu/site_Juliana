<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidato;
use App\Models\Candidatura;
use App\Models\Vagas;
use App\Support\HtmlLimpo; // ← NOVO
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VagaController extends Controller
{
    private array $campos = ['id', 'slug', 'titulo', 'area', 'nivel', 'cidade', 'uf', 'descricao'];

    public function index()
    {
        $vagas = Vagas::where('status', 'habilitada')
            ->orderByDesc('id')
            ->paginate(10, $this->campos);

        // ← NOVO: limpa o HTML de cada vaga
        $vagas->getCollection()->transform(function ($vaga) {
            $vaga->descricao = HtmlLimpo::limpar($vaga->descricao);

            return $vaga;
        });

        return $vagas;
    }

    public function show($id)
    {
        $vaga = Vagas::where('status', 'habilitada')->findOrFail($id, $this->campos);
        $vaga->descricao = HtmlLimpo::limpar($vaga->descricao); // ← NOVO

        return $vaga;
    }

    public function candidatar(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email:rfc|max:255',
            'telefone' => 'nullable|string|max:20',
            'uf' => 'required|string|size:2',
            'cidade' => 'required|string|max:120',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
            'vaga_id' => 'nullable|integer|exists:vagas,id',
            'concordo' => 'accepted',
        ]);

        $vagaId = $data['vaga_id'] ?? null;
        if ($vagaId && !Vagas::where('id', $vagaId)->where('status', 'habilitada')->exists()) {
            return response()->json(['message' => 'Vaga indisponível.'], 422);
        }

        $arquivo = $request->file('arquivo');
        $path = $arquivo->storeAs('curriculos', Str::uuid().'.'.$arquivo->extension(), 'local');

        $candidato = Candidato::firstOrNew(['email' => strtolower($data['email'])]);
        $antigo = $candidato->curriculo;

        $candidato->fill([
            'nome' => $data['nome'],
            'telefone' => $data['telefone'] ?? null,
            'uf' => strtoupper($data['uf']),
            'cidade' => $data['cidade'],
            'curriculo' => $path,
            'consentimento_em' => now(),
            'consentimento_ip' => $request->ip(),
        ])->save();

        if ($antigo && $antigo !== $path) {
            Storage::disk('local')->delete($antigo);
        }

        if ($vagaId) {
            Candidatura::firstOrCreate(['candidato_id' => $candidato->id, 'vaga_id' => $vagaId]);
        }

        return response()->json([
            'message' => $vagaId ? 'Candidatura realizada com sucesso!' : 'Cadastro efetuado com sucesso!',
        ], 201);
    }
}
