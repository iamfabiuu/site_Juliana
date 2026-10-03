@extends('adminlte::page')

@section('title', 'Painel Candidatos')

@section('content_header')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="m-0 text-dark">Painel</h1>

    {{-- Contador de candidatos por vaga --}}
    <div class="row align-items-center mt-3 mb-1">
        <div class="col-md-4">
            <select id="selectVagaContador" class="form-control">
                <option value="">-- Selecione uma vaga para contar candidatos --</option>
                @foreach($vagas as $vaga)
                    <option value="{{ $vaga->id }}">{{ $vaga->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <div id="cardContadorVaga" style="display:none; background: linear-gradient(135deg, #e8f4f8, #d0e8f2); border-left: 4px solid #6094aa; border-radius: 8px; padding: 12px 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
                <div style="font-size: 0.8em; color: #6094aa; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Candidatos inscritos</div>
                <div style="font-size: 0.75em; color: #888; margin-bottom: 4px;" id="cardVagaTitulo"></div>
                <div style="font-size: 2em; font-weight: 700; color: #1d3e66;" id="cardVagaTotal">0</div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('selectVagaContador').addEventListener('change', function () {
        const vagaId = this.value;
        const card = document.getElementById('cardContadorVaga');
        if (!vagaId) { card.style.display = 'none'; return; }
        fetch('{{ route('contarCandidatosVaga') }}?vaga_id=' + vagaId, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            document.getElementById('cardVagaTitulo').textContent = data.titulo;
            document.getElementById('cardVagaTotal').textContent = data.total;
            card.style.display = 'block';
        });
    });
    </script>

@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <section class="content">
               <div class="row">
                    <div class="col-md-3">
                        <!-- FILTROS LATERAIS -->
                        <form action="{{ route('indexPainelFiltro') }}" method="GET">
                            @csrf
                        <a href="{{ route('indexPainel') }}" style="width: 45%; float: left; margin-right: 1%;"  class="btn btn-default btn-block mb-3">Limpar</a>    
                        <input type="submit" style="width: 45%;"  class="btn btn-primary btn-block mb-3" value="Filtrar">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filtros por Vaga</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        </div>
                        </div>
                        <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a  class="nav-link">
                                      
                                    <label for="area">Título vaga:</label>
                                    <input type="text" class="form-control" id="titulo_vaga" name="titulo_vaga" value="{{ isset($_GET['titulo_vaga']) ? $_GET['titulo_vaga'] : '' }}" />
                                </a>
                         </li>   
                        <li class="nav-item active">
                        <a  class="nav-link">
                        
                        <label for="estado">Estado:</label>
                                    <select class="form-control" id="uf" name="uf">
                                        <option value="">- Estado -</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                            <label for="titulo">Cidade:</label>
                                <select class="form-control" id="cidade" name="cidade">
                                    <option value="">- SELECIONE -</option>
                                </select>
                        
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link">
                        <i class="fas fa-filter"></i> 
                        <label for="area">Área Profissional: </label>      
                                    <select id="area" name="area" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="administrativo">Administrativo</option>
                                        <option value="atendimento">Atendimento/Recepção</option>
                                        <option value="auditoria">Auditoria</option>
                                        <option value="comunicacao">Comunicação</option>
                                        <option value="contabil">Contábil/Finanças</option>
                                        <option value="comercial">Comercial/Vendas</option>
                                        <option value="comercio-exterior">Comércio Exterior (Importação, Exportação)</option>
                                        <option value="design">Design</option>
                                        <option value="educacao">Educação/Ensino</option>
                                        <option value="ecommerce">E-commerce</option>
                                        <option value="engenharias">Engenharias (Civil, Produção, etc)</option>
                                        <option value="juridica">Jurídica</option>
                                        <option value="informatica">Informática/TI</option>
                                        <option value="industrial">Industrial/Produção</option>
                                        <option value="logistica">Logística</option>
                                        <option value="marketing">Marketing/Merchandising</option>
                                        <option value="manutencao">Manutenção</option>
                                        <option value="meio-ambiente">Meio Ambiente</option>
                                        <option value="moda">Moda</option>
                                        <option value="qualidade">Qualidade</option>
                                        <option value="recursos-humanos">Recursos Humanos</option>
                                        <option value="servico-social">Serviço Social</option>
                                        <option value="tv">TV (Cinema, Vídeo)</option>
                                        <option value="telemarketing">Telemarketing</option>
                                        <option value="seguranca-trabalho">Segurança do Trabalho</option>
                                    </select>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link">
                        <i class="fas fa-filter"></i>
                        <label for="nivel">Nível Hierárquico: </label>      
                                    <select id="nivel" name="nivel" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="operacional">Operacional</option>
                                        <option value="estagiario">Estagiário</option>
                                        <option value="auxiliar">Auxiliar</option>
                                        <option value="assistente">Assistente</option>
                                        <option value="analista">Analista</option>
                                        <option value="trainee">Trainee</option>
                                        <option value="encarregado">Encarregado/Líder</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="coordenador">Coordenador</option>
                                        <option value="consultor">Consultor/Especialista</option>
                                        <option value="gerente">Gerente</option>
                                        <option value="diretor">Diretor</option>
                                        <option value="proprietario">Proprietário</option>
                                    </select> 
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link">
                        <i class="fas fa-filter"></i>
                        <label for="area">Escolaridade</label>      
                                    <select id="escolaridade" name="escolaridade" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="Ensino fundamental (1º grau)">Ensino fundamental (1º grau)</option>
                                        <option value="Ensino médio (2º grau)">Ensino médio (2º grau)</option>
                                        <option value="Curso profissionalizante (qualificação)">Curso profissionalizante (qualificação)</option>
                                        <option value="Nível Técnico">Nível Técnico</option>
                                        <option value="Ensino superior">Ensino superior</option>
                                        <option value="Pós-graduação (especialização/ MBA)">Pós-graduação (especialização/ MBA)</option>
                                        <option value="Pós-graduação (Mestrado/ Doutorado)">Pós-graduação (Mestrado/ Doutorado)</option>
                                    </select>
                        
                        </a>
                        </li>
                        <li class="nav-item">
                        <a  class="nav-link">
                        <i class="fas fa-filter"></i>
                        <label for="tipo_contrato">Tipo de contrato</label>      
                                    <select id="tipo_contrato" name="tipo_contrato" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="autonomo">Autônomo</option>
                                        <option value="cooperado">Cooperado</option>
                                        <option value="efetivo">Efetivo (CLT)</option>
                                        <option value="estagio">Estágio</option>
                                        <option value="jovem-aprendiz">Jovem Aprendiz</option>
                                        <option value="prestador-de-servicos">Prestador de serviços (PJ)</option>
                                        <option value="Trainee">Trainee</option>
                                    </select>
                        </a>
                        </li>
                        </ul>
                        </div>
                        
                        </div>
                        
                        <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Filtros por Candidato</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        </div>
                        </div>
                        <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                         <li class="nav-item">
                                <a  class="nav-link">
                                    
                                    <label for="area">Nome candidato:</label>
                                    <input type="text" class="form-control" id="nome_candidato" name="nome_candidato" value="{{ isset($_GET['nome_candidato']) ? $_GET['nome_candidato'] : '' }}" />
                                </a>
                         </li>    
                        <li class="nav-item">
                        <a class="nav-link">
                            <label for="uf_candidato">Estado:</label>
                            <select class="form-control" id="uf_candidato" name="uf_candidato">
                                <option value="">- Estado -</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                    <label for="cidade_candidato">Cidade:</label>
                        <select class="form-control" id="cidade_candidato" name="cidade_candidato">
                            <option value="">- SELECIONE -</option>
                        </select>
                        </a>
                        </li>
                        </ul>
                        </div>
                        
                        </div>
                        </form>
                    </div>
                
                <div class="col-md-9">
                <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">Candidaturas</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Data Início">
                <input type="text" class="form-control" placeholder="Data Fim">
                <div class="input-group-append">
                <div class="btn btn-primary">
                <i class="fas fa-search"></i>
                </div>
                </div>
                </div>
                </div>
                
                </div>
                
                <div class="card-body p-0">
                <div class="mailbox-controls">
                
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm">
                <i class="far fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-reply"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-share"></i>
                </button>
                </div>
                
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                    pg: {{ $candidaturas->currentPage() }} - {{ $candidaturas->perPage() }}/ {{ $candidaturas->total() }}
                <div class="btn-group">
                
                <button type="button" class="btn btn-default btn-sm">
                <a href="{{ $candidaturas->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                </button>
                
                <button type="button" class="btn btn-default btn-sm">
                <a href="{{ $candidaturas->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                </button>
                </div>
                
                </div>
                
                </div>
                <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                <tbody>

                @foreach ($candidaturas as $candidatura) 
                <tr>
                <td>
                <div class="icheck-primary">
                <input type="checkbox" value="" id="check1">
                <label for="check1"></label>
                </div>
                </td>
                <td class="mailbox-star">
                 <?php if($candidatura->status_candidatura == "Não Analisado"){ ?>   
                    <span class="badge badge-warning">Não Analisado</span></td>
                 <?php }elseif($candidatura->status_candidatura == "Em Análise"){ ?>
                    <span class="badge badge-info">Em Análise</span></td>
                 <?php }elseif($candidatura->status_candidatura == "Selecionado"){ ?>
                    <span class="badge badge-success">Selecionado</span></td>
                 <?php }elseif($candidatura->status_candidatura == "Não Selecionado"){?>
                    <span class="badge badge-danger">Não Selecionado</span></td>
                 <?php } ?>   
                <td style="display: none;" class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                <td class="mailbox-name"><a href="{{ route('detalheCandidato') }}/{{$candidatura->id_candidato}}">{{$candidatura->nome}}</a></td>
                <td class="mailbox-subject"><b>{{$candidatura->titulo_vaga}}</b> - {{$candidatura->cidade_vaga}}, {{$candidatura->uf_vaga}}
                </td>
                <td class="mailbox-attachment">
                    <a 
                        href="{{ asset($candidatura->curriculo) }}" 
                        download="{{ Str::slug($candidatura->nome, '_') }}_curriculo.pdf"
                    >
                        <i class="fas fa-paperclip"></i>
                    </a>
                </td>
                <td class="mailbox-date">{{ $candidatura->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
                
                </tbody>
                </table>
                
                </div>
                
                </div>
                
                <div class="card-footer p-0">
                <div class="mailbox-controls">
                
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm">
                <i class="far fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-reply"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-share"></i>
                </button>
                </div>
                
                <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                    pg: {{ $candidaturas->currentPage() }} - {{ $candidaturas->perPage() }}/ tot: {{ $candidaturas->total() }}
                <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                        <a href="{{ $candidaturas->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        </button>
                        
                        <button type="button" class="btn btn-default btn-sm">
                        <a href="{{ $candidaturas->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                        </button>
                </div>
                
                </div>
                
                </div>
                </div>
                </div>
                
                </div>
                
                </div>
                
                </section>
                    
               
        </div>
    </div>
    <script src="http://localhost/jcdesenvolve/public/vendor/jquery/jquery.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var valorParaSelecionar = "{{ isset($_GET['uf']) ? $_GET['uf'] : '' }}"; 
                $("#uf").val(valorParaSelecionar);
            var valorParaSelecionar = "{{ isset($_GET['cidade']) ? $_GET['cidade'] : '' }}"; 
                $("#cidade").val(valorParaSelecionar);
            var valorParaSelecionar = "{{ isset($_GET['area']) ? $_GET['area'] : '' }}"; 
                $("#area").val(valorParaSelecionar);
            var valorParaSelecionar = "{{ isset($_GET['nivel']) ? $_GET['nivel'] : '' }}"; 
                $("#nivel").val(valorParaSelecionar);
            var valorParaSelecionar = "{{ isset($_GET['escolaridade']) ? $_GET['escolaridade'] : '' }}"; 
                $("#escolaridade").val(valorParaSelecionar);
            var valorParaSelecionar = "{{ isset($_GET['tipo_contrato']) ? $_GET['tipo_contrato'] : '' }}"; 
                $("#tipo_contrato").val(valorParaSelecionar);        

            if("{{ isset($_GET['uf']) ? $_GET['uf'] : '' }}" != ""){
                    // carrega as cidades
                    const estadoSelecionado = "{{ isset($_GET['uf']) ? $_GET['uf'] : '' }}";
                    const cidadeSelect = document.getElementById('cidade');
                    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`)
                        .then(response => response.json())
                        .then(data => {
                            cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                            data.forEach(cidade => {
                                var selecionado = "";
                                if(cidade.nome == "{{ isset($_GET['cidade']) ? $_GET['cidade'] : '' }}"){ selecionado = "selected";}
                                cidadeSelect.innerHTML += `<option value="${cidade.nome}" `+selecionado+`>${cidade.nome}</option>`;
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao buscar cidades:', error);
                        });
                       
                }




            

            $('#area2').select2(); // Inicialize o Select2
            $ ( ".js-example-theme-single" ). select2 ({ 
            tema : "clássico" });
            
        });
        </script> 
        <script>
            // Event listener para mudança de estado
            document.getElementById('uf').addEventListener('change', function() {
                const estadoSelecionado = this.value;
                const cidadeSelect = document.getElementById('cidade');
            
                // Limpar opções anteriores
                cidadeSelect.innerHTML = '<option value="">Carregando cidades...</option>';
            
                // Fazer requisição para obter cidades do estado selecionado
                if (estadoSelecionado !== '') {
                    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`)
                        .then(response => response.json())
                        .then(data => {
                            cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                            data.forEach(cidade => {
                                cidadeSelect.innerHTML += `<option value="${cidade.nome}">${cidade.nome}</option>`;
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao buscar cidades:', error);
                        });
                }
            });
            </script>   
@stop
