<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagas;
use Illuminate\Support\Str;

class VagaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function cad_vagas()
    {
        return view('vagas.cad_vagas');
    }

    public function lista_vagas(Request $request)
    {
        $vagas = Vagas::orderBy('id', 'DESC')->paginate(50);
        return view('vagas.list_vagas', compact('vagas'));
    }

    public function salvar_vaga(Request $request){
    $dados = $request->all(); // Pega todos os campos do request
    
    if(isset($dados['id'])){

        if(!isset($dados['status'])){
            $dados['status'] = "desabilitada";
        }
        //dd($dados);
        // Redireciona para alguma rota após salvar
        $dados['slug'] =  $dados['id'] . '-' . Str::slug($dados['titulo']);
        $vaga = Vagas::findOrFail($dados['id']);
        $vaga->fill($dados); 
        $vaga->save();
        return redirect()->route('listVagas')->with('success', 'Vaga alterada com sucesso!');
    }else{
    
        // Salva os dados no banco usando o método create() do model
        $proximoId = Vagas::max('id') + 1;
        $dados['slug'] =  $proximoId . '-' . Str::slug($dados['titulo']);
        
        Vagas::create($dados);

        // Redireciona para alguma rota após salvar
        return redirect()->route('cadVagas')->with('success', 'Vaga cadastrada com sucesso!');
    }    
    }

    
    public function visualizar_vaga(Request $request)
    {
        $vaga = Vagas::where('id', $request->id)->first();
        //dd($vaga);
        return view('vagas.edit_vagas', compact('vaga'));
    }

    
}
