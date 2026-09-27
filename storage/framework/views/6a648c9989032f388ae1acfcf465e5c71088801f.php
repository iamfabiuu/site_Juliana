<?php $__env->startSection('title', 'AdminLTE'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark">Área Administrativa</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dhcosta\resources\views/home.blade.php ENDPATH**/ ?>