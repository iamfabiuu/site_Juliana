<?php $__env->startSection('title', 'COSTA DH'); ?>

<?php $__env->startSection('content_header'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <h1 class="m-0 text-dark">USUÁRIOS</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
           
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Usuários cadastrados</h3>
                <div class="card-tools">
                    <a class="btn btn-info btn-sm" href="cad-users">
                        <i class="fas fa-plus-">
                        </i>
                        Novo Usuário
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
                    
                    <th style="width: 25%">
                    Nome
                    </th>
                    <th style="width: 15%">
                        Email
                    </th>
                    <th style="width: 8%; display: none;" class="text-center">
                    Status
                    </th>
                    <th style="width: 20%; min-width: 100px;">
                    </th>
                    </tr>
                    </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <tr>
                
                <td>
                    <a>
                        <?php echo e($user->name); ?>

                    </a>
                    <br>
                    <small>
                    Criado em <?php echo e(DateTime::createFromFormat('Y-m-d H:i:s',$user->created_at)->format('d/m/Y H:i')); ?>

                    </small>
                </td>
                <td>
                    <a>
                        <?php echo e($user->email); ?>

                    </a>
                    
                </td>

                <td class="project-state" style="display: none;">
                <?php if($user->status == "Habilitado") { ?>    
                <span class="badge badge-success"><?php echo e($user->status); ?></span>
                <?php }else{ ?>
                    <span class="badge badge-danger">Desabilitado</span>
                <?php } ?>    
                </td>
                <td class="project-actions text-right">
                   
                    <a class="btn btn-info btn-sm" href="<?php echo e(route('visualizarUser')); ?>/<?php echo e($user->id); ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                        </a>
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('deletarUser')); ?>/<?php echo e($user->id); ?>" >
                    <i class="fas fa-trash">
                    </i>
                    Deletar
                </a>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
                <?php echo e($users->links()); ?> <!-- Exibir links de paginação -->
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/costad77/public_html/resources/views/users/list_users.blade.php ENDPATH**/ ?>