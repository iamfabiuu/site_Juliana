@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="m-0 text-dark">Usuários</h1>
    
@stop

@section('content')

    <div class="row">
        <div class="col-12">
           
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Criar Usuário</h3>
                        </div>
                        
                        
                        <form action="{{ route('salvarUser') }}" method="POST">
                            @csrf    
                        <div class="card-body">
                            <div class="form-group">
                            <label for="name">Nome Usuário:</label>
                            <input type="text" class="form-control" id="name" name="name"  value="" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="titulo">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email"  value="" required>
                                 </div>
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Senha:</label>
                                        <input type="password" class="form-control" id="password" name="password"  value="" required >
                                    </div>

                            </div>   
                            
                            <div class="row"> 
                              
                        </div>
                      
                        

                        <div class="form-check" style="display: none;">
                            <input class="form-check-input" type="checkbox" id="status" name="status" value="Habilitado" checked  >
                            <label class="fform-check-label" for="habilitado">Habilitado</label>
                        </div>

                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="super_admin" name="super_admin" value="1"
                                    {{ Auth::user()->super_admin ? '' : 'disabled' }}>
                                <label class="form-check-label font-weight-bold" for="super_admin">
                                    Super Administrador
                                    @if(!Auth::user()->super_admin)
                                        <small class="text-muted">(apenas um Super Administrador pode definir este campo)</small>
                                    @endif
                                </label>
                            </div>
                        </div>
                        
                        
                        </div>
                        
                        <div class="card-footer">
                            <button type="button" class="btn btn-default" onclick="history.back()">Voltar</button>
                        <button type="submit" class="btn btn-info">Cadastrar</button>
                        </div>
                        </form>
                        </div>
               
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
       
@stop
