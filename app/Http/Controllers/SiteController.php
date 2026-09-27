<?php

namespace App\Http\Controllers;

use App\Models\Candidato as ModelsCandidato;
use App\Models\Candidatura;
use App\Models\Vagas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function form_cadastro()
    {
        return view('site.form_curriculo');
    }

    public function privacidade()
    {
        return view('site.detalhe_privacidade');
    }

    public function index_site()
    {
        $vagas = Vagas::where('status', 'habilitada')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('site.index', compact('vagas'));
    }

    public function form_cadastro_vaga(Request $request)
    {
        // Aceita slug ("12-analista") ou id puro ("12")
        $vaga = Vagas::where('status', 'habilitada')
            ->where(function ($q) use ($request) {
                $q->where('slug', $request->id)
                  ->orWhere('id', (int) $request->id);
            })
            ->firstOrFail();

        return view('site.form_vaga', compact('vaga'));
    }

    public function salvar_candidatura(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email:rfc|max:255',
            'telefone' => 'nullable|string|max:20',
            'uf' => 'required|string|size:2',
            'cidade' => 'required|string|max:120',
            'arquivo' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
            'vaga_id' => 'nullable',
            'concordo' => 'accepted',
        ]);

        $vagaId = ($request->filled('vaga_id') && $request->vaga_id !== 'false')
            ? (int) $request->vaga_id
            : null;

        if ($vagaId) {
            $vagaValida = Vagas::where('id', $vagaId)->where('status', 'habilitada')->exists();
            if (!$vagaValida) {
                return back()->withInput()->with('error', 'Esta vaga não está mais disponível.');
            }
        }

        // Disco privado + nome aleatório + extensão detectada pelo conteúdo
        $arquivo = $request->file('arquivo');
        $path = $arquivo->storeAs('curriculos', Str::uuid().'.'.$arquivo->extension(), 'local');

        $candidato = ModelsCandidato::firstOrNew(['email' => strtolower($data['email'])]);
        $antigo = $candidato->curriculo;

        $candidato->fill([
            'nome' => $data['nome'],
            'telefone' => $data['telefone'] ?? null,
            'uf' => strtoupper($data['uf']),
            'cidade' => $data['cidade'],
            'curriculo' => $path,
            'consentimento_em' => now(),
            'consentimento_ip' => $request->ip(),
        ]);

        if (!$candidato->save()) {
            Storage::disk('local')->delete($path);

            return back()->withInput()->with('error', 'Não foi possível concluir o processo, tente novamente mais tarde.');
        }

        // Remove o currículo antigo (novo padrão no disco privado ou legado em public/)
        if ($antigo && $antigo !== $path) {
            if (Str::startsWith($antigo, 'uploads/')) {
                @unlink(public_path($antigo));
            } else {
                Storage::disk('local')->delete($antigo);
            }
        }

        if ($vagaId) {
            Candidatura::firstOrCreate([
                'candidato_id' => $candidato->id,
                'vaga_id' => $vagaId,
            ]);
        }

        return back()->with(
            'success',
            $vagaId ? 'Olá, candidatura realizada com sucesso!' : 'Cadastro efetuado com sucesso!'
        );
    }
}
