<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function cad_users()
    {
        return view('users.cad_users');
    }

    public function lista_users(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(50);

        return view('users.list_users', compact('users'));
    }

    public function salvar_user(Request $request)
    {
        $logado = Auth::user();
        $id = $request->input('id');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'password' => [$id ? 'nullable' : 'required', 'string', 'min:8'],
        ]);

        if ($id) {
            $usuario = User::findOrFail($id);
            // Só super admin edita outros; ninguém comum mexe em super admin
            abort_unless($logado->super_admin || $logado->id === $usuario->id, 403);
        } else {
            abort_unless($logado->super_admin, 403);
            $usuario = new User();
        }

        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        if (!empty($data['password'])) {
            $usuario->password = Hash::make($data['password']);
        }

        if ($logado->super_admin) {
            $usuario->status = $request->input('status', 'Desabilitado');
            $usuario->super_admin = $request->boolean('super_admin');
        }

        $usuario->save();

        return redirect()->route('listUsers')->with('success', 'Usuário salvo com sucesso!');
    }

    public function deletar_user(int $id)
    {
        abort_unless(Auth::user()->super_admin && Auth::id() !== $id, 403);
        User::findOrFail($id)->delete();

        return redirect()->route('listUsers')->with('success', 'Usuário deletado.');
    }

    public function visualizar_user(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        // dd($vaga);
        return view('users.edit_users', compact('user'));
    }
}
