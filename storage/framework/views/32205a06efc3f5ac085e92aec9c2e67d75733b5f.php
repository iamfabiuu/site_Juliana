<?php $__env->startSection('title', 'Painel Candidatos'); ?>

<?php $__env->startSection('content_header'); ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
<?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger">
<?php echo e(session('error')); ?>

</div>
<?php endif; ?>
    <h1 class="m-0 text-dark">Painel - Perfil</h1>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <section class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">
                
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('site/images/do-utilizador.png')); ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo e($candidato->nome); ?></h3>
                <p class="text-muted text-center"><?php echo e($candidato->email); ?></p>
                <p class="text-muted text-center"><?php echo e($candidato->telefone); ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                
                <li class="list-group-item">
                <b>Área Profissional</b> <a class="float-right"><?php if($candidato->area == null or $candidato->area == ''){ echo "...";}else{ echo $candidato->area; } ?></a>
                </li>
                <li class="list-group-item">
                <b>Escolaridade</b> <a class="float-right"><?php if($candidato->escolaridade == null or $candidato->escolaridade == ''){ echo "...";}else{ echo $candidato->escolaridade; } ?></a>
                </li>
                <li class="list-group-item">
                <b>Curriculo</b> <a class="float-right" href="<?php echo e(asset('/')); ?><?php echo e($candidato->curriculo); ?>" target="_blank"><i class="fas fa-paperclip"></i></a>
                </li>
                </ul>
                <a href="#" style="display: none;" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                
                </div>
                
                
                <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Sobre</h3>
                </div>
                
                <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                <p class="text-muted"><?php echo e($candidato->cidade); ?> - <?php echo e($candidato->uf); ?></p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Formação</strong>
                <p class="text-muted">
                    <?php echo e($candidato->formacao_academica); ?>

                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Cursos e Habilidades</strong>
                <p class="text-muted">
                <span class="tag tag-danger"><?php echo e($candidato->cursos_habilidades); ?></span>
               
                </p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Observações</strong>
                <p class="text-muted"><?php echo e($candidato->obs); ?></p>
                <hr>
                <strong><i class="fa fa-share-alt"></i> Redes Sociais</strong>
                <p class="text-muted">
                    <?php echo e($candidato->linkedin); ?>

                </p>
               
                </div>
                
                </div>
                
                </div>
                
                <div class="col-md-9">
                <div class="card">
                <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Em vagas</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar Dados</a></li>
                </ul>
                </div>
                <div class="card-body">
                <div class="tab-content">
                
                <div class="active tab-pane" id="timeline">
                
                <div class="timeline timeline-inverse">
                <?php $__currentLoopData = $candidatura_candidato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <div class="time-label">
                <span class="bg-success">
                <?php echo e($candidatura->created_at->diffForHumans()); ?>

                </span>
                </div>
                
                
                <div>
                <i class="fas fa-check-circle bg-info"></i>
                <div class="timeline-item">
                <span class="time"><i class="far fa-clock"> </i> <?php echo e($candidatura->updated_at->diffForHumans()); ?></span>
                <h3 class="timeline-header"><a href="#">Se candidatou a vaga: </a> <strong> <?php echo e($candidatura->titulo_vaga); ?> </strong> | 
                    <?php echo e($candidatura->uf_vaga); ?> - <?php echo e($candidatura->cidade_vaga); ?>  
                 <?php 
                     $estilo_status = ""; $naoAnalisado = ""; $emAnalise = ""; $selecionado = ""; $naoSelecionado = "";
                     if($candidatura->status_candidatura == "Não Analisado"){ $estilo_status = "warning"; $naoAnalisado = "selected"; 
                    }elseif($candidatura->status_candidatura == "Em Análise"){ $estilo_status = "info"; $emAnalise = "selected";
                    }elseif($candidatura->status_candidatura == "Selecionado"){ $estilo_status = "success"; $selecionado = "selected";
                    }elseif($candidatura->status_candidatura == "Não Selecionado"){ $estilo_status = "danger"; $naoSelecionado = "selected"; }
                     ?>
                    <span class="badge badge-<?php echo e($estilo_status); ?>" style="float: right;"><?php echo e($candidatura->status_candidatura); ?></span>    
                </h3>
                <form action="<?php echo e(route('evoluirCandidatoVaga')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_candidatura" id="id_candidatura" value="<?php echo e($candidatura->id_candidatura); ?>"/>
                    <div class="timeline-body" style="padding: 2%;">
                    
                        Evolução sobre o candidato na vaga:
                        <textarea class="form-control" rows="3" id="observacoes" name="observacoes" placeholder="Digite ..." ><?php echo e($candidatura->observacoes); ?></textarea>
                       
                </div>
                <div class="timeline-footer" style="padding: 2%;">
                    <div class="form-group">
                        Status:
                        <select class="form-control" id="status" name="status">
                        <option value="Não Analisado" <?php echo e($naoAnalisado); ?>>Não Analisado</option>
                        <option value="Em Análise" <?php echo e($emAnalise); ?>>Em Análise</option>
                        <option value="Selecionado" <?php echo e($selecionado); ?>>Selecionado</option>
                        <option value="Não Selecionado" <?php echo e($naoSelecionado); ?>>Não Selecionado</option>
                        </select>
                    </div>                    
                <input type="submit" class="btn btn-primary btn-sm" value="Alterar Status Candidato">
                </div>
                </form>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
        
                <div>
                <i class="far fa-clock bg-gray"></i>
                </div>
                </div>
                </div>
                <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="<?php echo e(route('dadosCandidatoVaga')); ?>" method="POST">
                    <?php echo csrf_field(); ?> 
                    <input type="hidden" name="id_candidato" id="id_candidato" value="<?php echo e($candidato->id); ?>"/> 
                <h5 style="color: #007bff;"> <strong>Dados Pessoais </strong> </h5> <br>      
                <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Nome Completo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($candidato->nome); ?>">
                </div>
                </div>
                <div class="form-group row" style="display: none;">
                    <label for="inputName2" class="col-sm-2 col-form-label">Genero</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sexo" name="sexo">
                            <option> - SELECIONE - </option>
                            <option value="Feminino" <?php echo e($naoAnalisado); ?>>Feminino</option>
                            <option value="Masculino" <?php echo e($emAnalise); ?>>Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputName2" class="col-sm-2 col-form-label">Data Nasc.</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" >
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e($candidato->email); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Contato</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo e($candidato->telefone); ?>" placeholder="(81) 994655555">
                    </div>
                </div>
                
                <hr> <h5 style="color: #007bff;"><strong>Currículo </strong></h5> <br>
                <div class="form-group row">
                    
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
                <div class="form-group row">
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
                <div class="form-group row">
                    <label for="formacao_academica" class="col-sm-2 col-form-label">Formação Acadêmica</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="formacao_academica" name="formacao_academica" placeholder="Escreva sobre a formação..."><?php echo e($candidato->formacao_academica); ?>

                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">Experiências </label>
                <div class="col-sm-10">
                <textarea class="form-control" id="experiencias" name="experiencias" placeholder="Escreva sobre a experiência do candidato..."><?php echo e($candidato->experiencias); ?>

                </textarea>
                </div>
                </div>
                <div class="form-group row">
                <label for="habilidades" class="col-sm-2 col-form-label">Cursos e Habilidades</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="cursos_habilidades" id="cursos_habilidades" value="<?php echo e($candidato->cursos_habilidades); ?>" placeholder="Informe os cursos e habilidades...">
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Obs. do perfil</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="obs" name="obs" placeholder="Digite... "><?php echo e($candidato->obs); ?>

                    </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="linkedin" class="col-sm-2 col-form-label">Redes Sociais</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo e($candidato->linkedin); ?>" placeholder=" http://linkedin...">
                    </div>
                </div>
                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10" style="display: none;">
                <div class="checkbox">
                <label>
                <input type="checkbox" > I agree to the <a href="#">terms and conditions</a>
                </label>
                </div>
                </div>
                </div>
                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
                </div>
                </form>
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
            var valorParaSelecionar = "<?php echo e($candidato->area); ?>"; 
            $("#area").val(valorParaSelecionar);

            var valorParaSelecionar = "<?php echo e($candidato->escolaridade); ?>"; 
            $("#escolaridade").val(valorParaSelecionar);
           

         });
    </script> 
         
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dhcosta\resources\views/painel/detalhe.blade.php ENDPATH**/ ?>