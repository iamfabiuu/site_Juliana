<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Candidato;
use App\Models\Candidatura;
use App\Models\Vagas;
use Illuminate\Http\Request;

class CandidatoController extends Controller
=======
use Illuminate\Http\Request;
use App\Models\Vagas;
use App\Models\Candidato;
use App\Models\Candidatura;

class candidatoController extends Controller
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
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
    public function index_painel(Request $request)
<<<<<<< HEAD
    {
        $candidaturas = Candidatura::join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
        ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id')
        ->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo',
            'candidato.uf', 'candidato.cidade', 'candidatura.created_at as candidatura_criada_em', 'candidatura.status as status_candidatura',
            'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga')
        ->orderBy('candidatura.id', 'DESC')
        ->paginate(50);
        $vagas = Vagas::orderBy('titulo')->get(['id', 'titulo']);

        // dd($candidaturas);
=======
    {   
        $candidaturas = Candidatura::join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
        ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id')
        ->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo', 
        'candidato.uf', 'candidato.cidade', 'candidatura.created_at as candidatura_criada_em', 'candidatura.status as status_candidatura',
        'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga')
        ->orderBy('candidatura.id', 'DESC')
        ->paginate(50);
        $vagas = Vagas::orderBy('titulo')->get(['id', 'titulo']);
        //dd($candidaturas);
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
        return view('painel.index', compact('candidaturas', 'vagas'));
    }

    public function contar_candidatos_vaga(Request $request)
    {
        $vaga_id = $request->vaga_id;
        $total = Candidatura::where('vaga_id', $vaga_id)->count();
        $vaga = Vagas::find($vaga_id);
<<<<<<< HEAD

=======
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
        return response()->json([
            'total' => $total,
            'titulo' => $vaga ? $vaga->titulo : '',
        ]);
    }

    public function index_painel_cand(Request $request)
<<<<<<< HEAD
    {
=======
    {   
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
        $candidatos = Candidato::LeftJoin('candidatura', 'candidatura.candidato_id', '=', 'candidato.id')
        ->select('candidato.*', 'candidatura.id as id_candidatura')
       // ->whereNull('candidatura.id')
        ->orderBy('candidato.created_at', 'DESC')
        ->groupBy('candidato.id')
        ->paginate(50);
<<<<<<< HEAD

        // dd($candidatos);
=======
       // dd($candidatos);
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
        return view('painel.curriculos', compact('candidatos'));
    }

    public function index_painel_filtro(Request $request)
<<<<<<< HEAD
    {
        // dd($request->all());
        $cand = Candidatura::query();

        $cand->join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
         ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id');

        $cand->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo',
            'candidato.uf', 'candidato.cidade', 'candidatura.created_at as candidatura_criada_em', 'candidatura.status as status_candidatura',
            'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga');

        if ($request->filled('nome_candidato')) {
            // Quando o nome do candidato é informado, apenas esse filtro é aplicado
            $cand->where('candidato.nome', 'like', '%'.$request->nome_candidato.'%');
        } else {
            if ($request->filled('titulo_vaga')) {
                $cand->where('vagas.titulo', 'like', '%'.$request->titulo_vaga.'%');
=======
    {   
       //dd($request->all());
       $cand = Candidatura::query();

       $cand->join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
        ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id');

      $cand->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo', 
      'candidato.uf', 'candidato.cidade', 'candidatura.created_at as candidatura_criada_em', 'candidatura.status as status_candidatura',
      'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga');
      
        if ($request->filled('nome_candidato')) {
            // Quando o nome do candidato é informado, apenas esse filtro é aplicado
            $cand->where('candidato.nome', 'like', '%' . $request->nome_candidato . '%');
        } else {
            if ($request->filled('titulo_vaga')) {
                $cand->where('vagas.titulo', 'like', '%' . $request->titulo_vaga . '%');
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
            }
            if ($request->filled('uf')) {
                $cand->where('vagas.uf', '=', $request->uf);
            }
            if ($request->filled('cidade')) {
                $cand->where('vagas.cidade', '=', $request->cidade);
            }
            if ($request->filled('area')) {
                $cand->where('vagas.area', '=', $request->area);
            }
            if ($request->filled('nivel')) {
                $cand->where('vagas.nivel', '=', $request->nivel);
            }
            if ($request->filled('escolaridade')) {
                $cand->where('vagas.escolaridade', '=', $request->escolaridade);
            }
            if ($request->filled('tipo_contrato')) {
                $cand->where('vagas.tipo_contrato', '=', $request->tipo_contrato);
            }
            if ($request->filled('uf_candidato')) {
                $cand->where('candidato.uf', '=', $request->uf_candidato);
            }
            if ($request->filled('cidade_candidato')) {
                $cand->where('candidato.cidade', '=', $request->cidade_candidato);
            }
        }

        $candidaturas = $cand->orderBy('candidatura.id', 'DESC')->paginate(50);
        $vagas = Vagas::orderBy('titulo')->get(['id', 'titulo']);
<<<<<<< HEAD

        // dd($candidaturas);
        return view('painel.index', compact('candidaturas', 'vagas'));
        // ->withInput($request->all());
    }

    public function index_painel_cand_filtro(Request $request)
    {
        $cand = Candidato::query();

        $cand->LeftJoin('candidatura', 'candidatura.candidato_id', '=', 'candidato.id');

        $cand->select('candidato.*', 'candidatura.id as id_candidatura');

        if ($request->filled('nome_candidato')) {
            $cand->where('candidato.nome', 'like', '%'.$request->nome_candidato.'%');
=======
        //dd($candidaturas);
        return view('painel.index', compact('candidaturas', 'vagas'));
        //->withInput($request->all());
    }

    public function index_painel_cand_filtro(Request $request)
    {   
       
       $cand = Candidato::query();

       $cand->LeftJoin('candidatura', 'candidatura.candidato_id', '=', 'candidato.id');

       $cand->select('candidato.*', 'candidatura.id as id_candidatura');
      
        if ($request->filled('nome_candidato')) {
            $cand->where('candidato.nome', 'like', '%' . $request->nome_candidato . '%');
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
        }
        if ($request->filled('data_inicio') and $request->filled('data_fim')) {
            $cand->whereBetween('candidato.created_at', [$request->data_inicio.' 00:00', $request->data_fim.' 23:59']);
        }
        /*
        if ($request->filled('area')) {
            $cand->where('vagas.area', '=', $request->area);
        }
        if ($request->filled('nivel')) {
            $cand->where('vagas.nivel', '=', $request->nivel);
        }
        if ($request->filled('escolaridade')) {
            $cand->where('vagas.escolaridade', '=', $request->escolaridade);
        }
        if ($request->filled('tipo_contrato')) {
            $cand->where('vagas.tipo_contrato', '=', $request->tipo_contrato);
        }
        */
        if ($request->filled('uf')) {
            $cand->where('candidato.uf', '=', $request->uf);
        }
        if ($request->filled('cidade')) {
            $cand->where('candidato.cidade', '=', $request->cidade);
        }

        $candidatos = $cand->orderBy('candidato.created_at', 'DESC')
        ->groupBy('candidato.id')
        ->paginate(50);
<<<<<<< HEAD

        // dd($candidaturas);
        return view('painel.curriculos', compact('candidatos'));
    }

    public function detalhe_candidato(Request $request)
    {
        $candidatura_candidato = Candidatura::join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
        ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id')
        ->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo',
            'candidato.uf', 'candidato.cidade', 'candidatura.updated_at', 'candidatura.status as status_candidatura', 'candidatura.observacoes',
            'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga')
        ->where('candidatura.candidato_id', $request->id)
        ->orderBy('candidatura.id', 'DESC')
        ->get();
        // dd($candidatura_candidato);
        $candidato = Candidato::where('id', $request->id)
        ->first();

        // dd($candidato);
        return view('painel.detalhe', compact('candidato'), compact('candidatura_candidato'));
    }

    public function evoluir_candidato_vaga(Request $request)
    {
        $dados = $request->all();

        $candidatura_up = Candidatura::findOrFail($request->id_candidatura);
        $candidatura_up->fill($dados);
        if ($candidatura_up->save()) {
            return redirect()->back()->with('success', 'Evolução registrada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não foi possível atualizar as informações, tente novamente mais tarde!');
        }
    }

    public function dados_candidato_vaga(Request $request)
    {
        $dados = $request->all();
        // dd($request->id_candidato);
        $candidato = Candidato::findOrFail($request->id_candidato);

        $candidato->fill($dados);
        if ($candidato->save()) {
            return redirect()->back()->with('success', 'Dados do Candidato alterados com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não foi possível atualizar os dados do candidato!');
        }
    }
=======
        //dd($candidaturas);
        return view('painel.curriculos', compact('candidatos'));
        
    }

    public function detalhe_candidato(Request $request)
    {   
        $candidatura_candidato = Candidatura::join('candidato', 'candidato.id', '=', 'candidatura.candidato_id')
        ->join('vagas', 'vagas.id', '=', 'candidatura.vaga_id')
        ->select('candidatura.id as id_candidatura', 'candidatura.created_at', 'candidato.id as id_candidato', 'candidato.nome', 'candidato.email', 'candidato.telefone', 'candidato.curriculo', 'candidato.sexo', 
        'candidato.uf', 'candidato.cidade', 'candidatura.updated_at', 'candidatura.status as status_candidatura', 'candidatura.observacoes',
        'vagas.titulo as titulo_vaga', 'vagas.area as area_vaga', 'vagas.nivel as nivel_vaga', 'vagas.uf as uf_vaga', 'vagas.cidade as cidade_vaga')
        ->where('candidatura.candidato_id', $request->id)
        ->orderBy('candidatura.id', 'DESC')
        ->get();
        //dd($candidatura_candidato);
        $candidato = Candidato::where('id', $request->id)
        ->first();

        
       // dd($candidato);
        return view('painel.detalhe', compact('candidato'), compact('candidatura_candidato'));
    }

    public function evoluir_candidato_vaga(Request $request){

        $dados = $request->all();
        
        $candidatura_up = Candidatura::findOrFail($request->id_candidatura);
          $candidatura_up->fill($dados); 
          if($candidatura_up->save()){
            return redirect()->back()->with('success', 'Evolução registrada com sucesso!');
          }else{
            return redirect()->back()->with('error', 'Não foi possível atualizar as informações, tente novamente mais tarde!');
          }
    }

    public function dados_candidato_vaga(Request $request){
        
        $dados = $request->all();
       // dd($request->id_candidato);
        $candidato = Candidato::findOrFail($request->id_candidato);
       
        $candidato->fill($dados); 
          if($candidato->save()){
            return redirect()->back()->with('success', 'Dados do Candidato alterados com sucesso!');
          }else{
            return redirect()->back()->with('error', 'Não foi possível atualizar os dados do candidato!');
          }
    }


    

    
>>>>>>> 3a719d2fe0be1dc1cd524cf3c07d2ce278755ec6
}
