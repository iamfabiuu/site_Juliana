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
           
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Vagas cadastradas</h3>
                <div class="card-tools">
                    <a class="btn btn-info btn-sm" href="cad-vagas">
                        <i class="fas fa-plus-">
                        </i>
                        Nova Vaga
                    </a>
                    
                    <button style="display: none;" type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    
                </div>
                </div>
                <div class="card-body p-0" style="display: block;">
                
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                    <th style="width: 1%">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </th>
                    <th style="width: 25%">
                    Título
                    </th>
                    <th style="width: 15%">
                        Localização
                    </th>
                    <th style="width: 15%">
                    Área
                    </th>
                    <th style="width: 15%">
                    Nível
                    </th>
                    <th style="width: 20%">
                    Escolaridade
                    </th>
                    <th style="width: 8%" class="text-center">
                    Status
                    </th>
                    <th style="width: 20%; min-width: 100px;">
                    </th>
                    </tr>
                    </thead>
                <tbody>
                    <?php $__currentLoopData = $vagas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <tr>
                <td>
                    <span class="copy-link" data-link="<?php echo e(route('formCadastroVaga')); ?>/<?php echo e($vaga->slug); ?>"><i class="far fa-copy"></i></span>
                </td>
                <td>
                    <a>
                        <?php echo e($vaga->titulo); ?>

                    </a>
                    <br>
                    <small>
                    Criado em <?php echo e(DateTime::createFromFormat('Y-m-d H:i:s',$vaga->created_at)->format('d/m/Y H:i')); ?>

                    </small>
                </td>
                <td>
                    <a>
                        <?php echo e($vaga->uf); ?>

                    </a>
                    <br>
                    <small>
                        <i class="fa fa-map-marker" style="color: #8ebaca;"></i> <?php echo e($vaga->cidade); ?>

                    </small>
                </td>

                <td>
                <a>
                    <?php echo e($vaga->area); ?>

                </a>
                </td>
                <td>
                    <a>
                    <?php echo e($vaga->nivel); ?>

                    </a>
                </td>
                <td>
                    <a>
                        <?php echo e($vaga->escolaridade); ?>

                    </a>
                </td>
                <td class="project-state">
                <?php if($vaga->status == "habilitada") { ?>    
                <span class="badge badge-success"><?php echo e($vaga->status); ?></span>
                <?php }else{ ?>
                    <span class="badge badge-danger">desabilitada</span>
                <?php } ?>    
                </td>
                <td class="project-actions text-right">
                    
                    <a class="btn btn-primary btn-sm" href="#" style="display: none;">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('visualizarVaga')); ?>/<?php echo e($vaga->id); ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                        </a>
                <a class="btn btn-danger btn-sm" href="#" style="display: none;">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                </a>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <?php echo e($vagas->links()); ?> <!-- Exibir links de paginação -->
                </div>
                
                </div>
               
        </div>
    </div>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        $(document).ready(function() {
            new ClipboardJS('.copy-link', {
                text: function(trigger) {
                    return $(trigger).data('link');
                }
            });
    
            $('.copy-link').click(function() {
                var icon = $(this).find('i');
                icon.removeClass('far fa-copy').addClass('fas fa-check');
                setTimeout(function() {
                    icon.removeClass('fas fa-check').addClass('far fa-copy');
                }, 2000);
            });
        });
    </script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dhcosta\resources\views/vagas/list_vagas.blade.php ENDPATH**/ ?>