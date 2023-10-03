
<?php $__env->startSection('content'); ?>
<div class="row d-flex p-2">
    <div class="d-flex" style="margin: auto;">
    <chat-view :user="<?php echo e(auth()->user()); ?>"/>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat\resources\views/dashboard.blade.php ENDPATH**/ ?>