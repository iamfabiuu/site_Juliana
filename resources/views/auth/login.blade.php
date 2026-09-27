@extends('adminlte::auth.login')

@section('auth_body')
    <form action="{{ url('login') }}" method="post">
        @csrf

        {{-- Email --}}
        <div class="input-group mb-3">
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="{{ __('adminlte::adminlte.email') }}"
                   autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Senha --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Linha: link recuperar senha + botão entrar --}}
        <div class="row">
            <div class="col-7 d-flex align-items-center">
                <a href="{{ route('password.request') }}" class="text-sm">
                    <i class="fas fa-key mr-1"></i> Recuperar Senha
                </a>
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
    {{-- rodapé vazio: link de recuperação já está dentro do formulário --}}
@stop
