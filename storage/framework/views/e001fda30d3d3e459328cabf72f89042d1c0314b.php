

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Documentos de <?php echo e($envio->nome_cliente); ?></h3>

    <p><strong>Email:</strong> <?php echo e($envio->email_cliente); ?></p>

    <?php if($envio->mensagem_email): ?>
        <div class="alert alert-info">
            <strong>Mensagem:</strong> <?php echo e($envio->mensagem_email); ?>

        </div>
    <?php endif; ?>

    <?php if($envio->planilha_path): ?>
        <p>
            <strong>Planilha:</strong> 
            <a href="<?php echo e(route('documentos.download', $envio->planilha_path)); ?>" class="btn btn-sm btn-success">
                Download Planilha
            </a>
        </p>
    <?php endif; ?>

    <h5>Currículos</h5>
    <ul class="list-group">
        <?php $__currentLoopData = $curriculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curriculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo e($curriculo->nome_curriculo); ?>

                <a href="<?php echo e(route('documentos.download', $curriculo->arquivo_path)); ?>" 
                   class="btn btn-sm btn-primary">Download</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dhcosta\resources\views/site/documentos_publico.blade.php ENDPATH**/ ?>