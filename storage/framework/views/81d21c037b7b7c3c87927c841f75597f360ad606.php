<?php $__env->startSection('title', 'Painel Candidatos'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <h1 class="m-0 text-dark">Currículos</h1>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <section class="content">
               <div class="row">
                    <div class="col-md-3">
                        <!-- FILTROS LATERAIS -->
                        <form action="<?php echo e(route('indexPainelCandFiltro')); ?>" method="GET" name="form_filtro" id="form_filtro">
                            <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('indexPainelCand')); ?>" style="width: 45%; float: left; margin-right: 1%;"  class="btn btn-default btn-block mb-3">Limpar</a>    
                        <input type="submit" style="width: 45%;"  class="btn btn-primary btn-block mb-3" value="Filtrar">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filtros: </h3>
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
                                      
                                    <label for="area">Nome :</label>
                                    <input type="text" class="form-control" id="nome_candidato" name="nome_candidato" value="<?php echo e(isset($_GET['nome_candidato']) ? $_GET['nome_candidato'] : ''); ?>" />
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
                        <li class="nav-item" style="display: none;">
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
                        <li class="nav-item" style="display: none;">
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
                        <li class="nav-item" style="display: none;">
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
                        <li class="nav-item" style="display: none;">
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
                        
                        
                        
                    </div>
                
                <div class="col-md-9">
                <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title">Currículos Cadastrados</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm">
                   De  <input type="date" class="form-control" placeholder="Data Início" id="data_inicio" name="data_inicio" value="<?php echo e(isset($_GET['data_inicio']) ? $_GET['data_inicio'] : ''); ?>" style="margin-left: 5px; margin-right: 10px; ">
                   Até <input type="date" class="form-control" placeholder="Data Fim" id="data_fim" name="data_fim" value="<?php echo e(isset($_GET['data_fim']) ? $_GET['data_fim'] : ''); ?>" style="margin-left: 5px;">
                <div class="input-group-append">
                <div class="btn btn-primary">
                <i class="fas fa-search" onclick="enviaForm()"></i>
                </div>
                </div>
                </div>
                </div>
            </form>
                </div>
                
                <div class="card-body p-0">
                <div class="mailbox-controls">
                
                <div class="btn-group">
                </div>
                
                <a href="<?php echo e(route('indexPainelCand')); ?>" type="button" class="btn btn-default btn-sm">
                <i class="fas fa-sync-alt"></i>
                </a>
                <div class="float-right">
                    pg: <?php echo e($candidatos->currentPage()); ?> - <?php echo e($candidatos->perPage()); ?>/ <?php echo e($candidatos->total()); ?>

                <div class="btn-group">
                
                <button type="button" class="btn btn-default btn-sm">
                <a href="<?php echo e($candidatos->previousPageUrl()); ?>"><i class="fas fa-chevron-left"></i></a>
                </button>
                
                <button type="button" class="btn btn-default btn-sm">
                <a href="<?php echo e($candidatos->nextPageUrl()); ?>"><i class="fas fa-chevron-right"></i></a>
                </button>
                </div>
                
                </div>
                
                </div>
                <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                <tbody>
                    <?php // dd($candidatos);?>
                <?php $__currentLoopData = $candidatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr>
                
                <td class="mailbox-star">
                    <span class="badge badge-info"><?php if($candidato->id_candidatura != null){ echo "É candidato"; } ?></span>
                </td>
                <td style="display: none;" class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                <td class="mailbox-name"><?php echo e($candidato->nome); ?></td>
                <td class="mailbox-subject"><b><?php echo e($candidato->email); ?></b>, <?php echo e($candidato->telefone); ?> - <?php echo e($candidato->cidade); ?> / <?php echo e($candidato->uf); ?>

                </td>
                <td class="mailbox-attachment"><a target="_blank" href="<?php echo e(asset('/')); ?><?php echo e($candidato->curriculo); ?>"><i class="fas fa-paperclip"></i></a></td>
                <td class="mailbox-date"><?php echo e($candidato->created_at->diffForHumans()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </tbody>
                </table>
                
                </div>
                
                </div>
                
                <div class="card-footer p-0">
                <div class="mailbox-controls">
                
                <div class="float-right">
                    pg: <?php echo e($candidatos->currentPage()); ?> - <?php echo e($candidatos->perPage()); ?>/ tot: <?php echo e($candidatos->total()); ?>

                <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                        <a href="<?php echo e($candidatos->previousPageUrl()); ?>"><i class="fas fa-chevron-left"></i></a>
                        </button>
                        
                        <button type="button" class="btn btn-default btn-sm">
                        <a href="<?php echo e($candidatos->nextPageUrl()); ?>"><i class="fas fa-chevron-right"></i></a>
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
            var valorParaSelecionar = "<?php echo e(isset($_GET['uf']) ? $_GET['uf'] : ''); ?>"; 
                $("#uf").val(valorParaSelecionar);
            var valorParaSelecionar = "<?php echo e(isset($_GET['cidade']) ? $_GET['cidade'] : ''); ?>"; 
                $("#cidade").val(valorParaSelecionar);
            var valorParaSelecionar = "<?php echo e(isset($_GET['area']) ? $_GET['area'] : ''); ?>"; 
                $("#area").val(valorParaSelecionar);
            var valorParaSelecionar = "<?php echo e(isset($_GET['nivel']) ? $_GET['nivel'] : ''); ?>"; 
                $("#nivel").val(valorParaSelecionar);
            var valorParaSelecionar = "<?php echo e(isset($_GET['escolaridade']) ? $_GET['escolaridade'] : ''); ?>"; 
                $("#escolaridade").val(valorParaSelecionar);
            var valorParaSelecionar = "<?php echo e(isset($_GET['tipo_contrato']) ? $_GET['tipo_contrato'] : ''); ?>"; 
                $("#tipo_contrato").val(valorParaSelecionar);        

            if("<?php echo e(isset($_GET['uf']) ? $_GET['uf'] : ''); ?>" != ""){
                    // carrega as cidades
                    const estadoSelecionado = "<?php echo e(isset($_GET['uf']) ? $_GET['uf'] : ''); ?>";
                    const cidadeSelect = document.getElementById('cidade');
                    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/municipios`)
                        .then(response => response.json())
                        .then(data => {
                            cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                            data.forEach(cidade => {
                                var selecionado = "";
                                if(cidade.nome == "<?php echo e(isset($_GET['cidade']) ? $_GET['cidade'] : ''); ?>"){ selecionado = "selected";}
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

            function enviaForm(){
                $('#form_filtro').submit();
            }
            </script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/costad77/public_html/resources/views/painel/curriculos.blade.php ENDPATH**/ ?>