<?php $__env->startSection('title', 'AdminLTE'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <h1 class="m-0 text-dark">VAGAS</h1>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
           
                    <div class="card card-info">
                        <div class="card-header">
                        <h3 class="card-title">Incluir Nova vaga</h3>
                        </div>
                        
                        
                        <form action="<?php echo e(route('salvarVaga')); ?>" method="POST">
                            <?php echo csrf_field(); ?>    
                        <div class="card-body">
                            <div class="form-group">
                            <label for="titulo">Título da Vaga:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Informe o título...">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
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
                                    
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="titulo">Cidade:</label>
                                        <select class="form-control" id="cidade" name="cidade">
                                            <option value="">- SELECIONE -</option>
                                          </select>    
                                    </div>

                            </div>

                            <div class="form-group">
                                <label for="summernote">Descrição :</label>
                                <textarea id="descricao" name="descricao" ></textarea>
                            </div>
                            <div class="row"> 
                            <div class="form-group col-md-6" >
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
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="area">Nível Hierárquico: </label>      
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
                            </div>  
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6" >
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
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="area">Tempo experiência: </label>      
                                    <select id="tempo_experiencia" name="tempo_experiencia" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="Sem experiência">Sem experiência</option>
                                        <option value="Menos de 1 ano">Menos de 1 ano</option>
                                        <option value="Entre 1 a 3 anos">Entre 1 a 3 anos</option>
                                        <option value="Entre 3 e 5 anos">Entre 3 e 5 anos</option>
                                        <option value="Mais de 5 anos">Mais de 5 anos</option>
                                    </select>    
                            </div>
                        
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="area">Tipo de contrato</label>      
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
                            </div>
                            <div class="form-group col-md-6" >
                                <label for="area">Jornada: </label>      
                                    <select id="jornada" name="jornada" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="Parcial Manhã">Parcial Manhã</option>
                                        <option value="Parcial Tarde">Parcial Tarde</option>
                                        <option value="Parcial Noite">Parcial Noite</option>
                                        <option value="Período Integral">Período Integral</option>
                                    </select>    
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="area">Necessidade especial</label>      
                                    <select id="necessidade_especial" name="necessidade_especial" class="form-control" >
                                        <option value=""> -- SELECIONE -- </option>
                                        <option value="auditiva">Auditiva</option>
                                        <option value="fisica">Física</option>
                                        <option value="deficit-mental">Deficit Mental</option>
                                        <option value="psicosocial">Psicosocial</option>
                                        <option value="reabilitacao">Reabilitação</option>
                                        <option value="visual">Visual</option>
                                    </select>    
                            </div>
                            <div class="form-group col-md-6" >
                                  
                            </div>
                        
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="status" name="status" value="habilitada" checked>
                            <label class="fform-check-label" for="habilitada">Habilitada</label>
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
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    
    <script>
        $(document).ready(function() {
            $('#descricao').summernote({
                height: 250, // Altura desejada em pixels
                minHeight: 250 // Altura mínima desejada em pixels
            });

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/costad77/public_html/resources/views/vagas/cad_vagas.blade.php ENDPATH**/ ?>