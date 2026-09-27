<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Só autentica usuários habilitados
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password') + ['status' => 'Habilitado'];
    }

    // Mensagem clara quando a conta está desabilitada
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->{$this->username()})->first();

        if ($user && $user->status !== 'Habilitado') {
            throw ValidationException::withMessages([$this->username() => ['Sua conta está desabilitada. Fale com o administrador.']]);
        }

        throw ValidationException::withMessages([$this->username() => [trans('auth.failed')]]);
    }
}
