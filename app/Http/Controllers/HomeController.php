<?php

namespace App\Http\Controllers;

use App\Mail\EnvioDocumentosMail;
use App\Mail\EnvioMateriaisMail;
use App\Models\DocumentoEnvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    private const DISK = 'local'; // privado, fora do /public

    public function __construct()
    {
        $this->middleware('auth')->except(['visualizarPublico', 'baixarArquivo', 'baixarCurriculo']);
    }

    public function index()
    {
        return view('home');
    }

    public function envio_resultados()
    {
        return view('painel.envio_resultados');
    }

    public function envio_materiais()
    {
        return view('painel.envio_materiais');
    }

    public function disparar_documentos(Request $request)
    {
        $envio = $this->criarEnvio($request, 'resultado');
        $this->enviarEmails($envio, fn ($link) => new EnvioDocumentosMail($envio, $link));

        return back()->with('success', 'ShortList disparado com sucesso!');
    }

    public function disparar_materiais(Request $request)
    {
        $envio = $this->criarEnvio($request, 'material_diverso');
        $this->enviarEmails($envio, fn ($link) => new EnvioMateriaisMail($envio, $link, $envio->assunto_email));

        return back()->with('success', 'E-mail de materiais diversos disparado com sucesso!');
    }

    private function criarEnvio(Request $request, string $tipo): DocumentoEnvio
    {
        $data = $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'email_cliente' => ['required', 'string', function ($attr, $value, $fail) {
                foreach (array_map('trim', explode(',', $value)) as $e) {
                    if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
                        $fail("E-mail inválido: {$e}");
                    }
                }
            }],
            'assunto_email' => 'nullable|string|max:255',
            'mensagem_email' => 'nullable|string|max:5000',
            'planilha' => 'nullable|file|mimes:xlsx,xls|max:10240',
            'curriculos' => 'nullable|array|max:50',
            'curriculos.*.nome' => 'nullable|string|max:255',
            'curriculos.*.tipo' => 'nullable|string|max:50',
            'curriculos.*.arquivo' => 'required_with:curriculos|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $envio = DocumentoEnvio::create([
            'nome_cliente' => $data['nome_cliente'],
            'email_cliente' => $data['email_cliente'],
            'mensagem_email' => $data['mensagem_email'] ?? null,
            'assunto_email' => $tipo === 'material_diverso' ? ($data['assunto_email'] ?? 'Envio de Materiais Diversos') : null,
            'planilha_path' => $request->file('planilha')?->store('documentos/planilhas', self::DISK),
            'identificador_publico' => Str::random(48), // imprevisível
            'tipo_envio' => $tipo,
        ]);

        foreach ($data['curriculos'] ?? [] as $c) {
            $envio->curriculos()->create([
                'nome_curriculo' => $c['nome'] ?: 'Currículo',
                'arquivo_path' => $c['arquivo']->store('documentos/curriculos', self::DISK),
                'tipo' => $c['tipo'] ?? 'outro',
            ]);
        }

        return $envio;
    }

    private function enviarEmails(DocumentoEnvio $envio, \Closure $mailable): void
    {
        $link = route('documentos.publico', $envio->identificador_publico);
        foreach (array_map('trim', explode(',', $envio->email_cliente)) as $email) {
            Mail::to($email)->queue($mailable($link)); // assíncrono
        }
    }

    public function visualizarPublico(string $identificador)
    {
        $envio = DocumentoEnvio::where('identificador_publico', $identificador)->firstOrFail();
        $curriculos = $envio->curriculos;

        return view('site.view_documentos_exclusivo', compact('envio', 'curriculos'));
    }

    // Download sempre amarrado ao token: sem IDOR
    public function baixarArquivo(string $identificador)
    {
        $envio = DocumentoEnvio::where('identificador_publico', $identificador)->firstOrFail();
        abort_unless($envio->planilha_path && Storage::disk(self::DISK)->exists($envio->planilha_path), 404);

        return Storage::disk(self::DISK)->download($envio->planilha_path);
    }

    public function baixarCurriculo(string $identificador, int $curriculo)
    {
        $envio = DocumentoEnvio::where('identificador_publico', $identificador)->firstOrFail();
        $cv = $envio->curriculos()->findOrFail($curriculo); // só se pertencer ao envio

        return Storage::disk(self::DISK)->download($cv->arquivo_path, Str::slug($cv->nome_curriculo).'.'.pathinfo($cv->arquivo_path, PATHINFO_EXTENSION));
    }

    public function listarEnvios()
    {
        return response()->json(['data' => DocumentoEnvio::latest()->take(50)
            ->get(['id', 'nome_cliente', 'email_cliente', 'tipo_envio', 'created_at'])]);
    }

    public function listarEnviosMateriais()
    {
        return response()->json(['data' => DocumentoEnvio::where('tipo_envio', 'material_diverso')->latest()->take(50)
            ->get(['id', 'nome_cliente', 'email_cliente', 'assunto_email', 'created_at'])]);
    }
}
