
<?php $__env->startSection("content"); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo e(session("success")); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
Salut <?php echo e($name); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\e1172068\Desktop\maisonneuve-e1172068\resources\views/etudiant/dashboard.blade.php ENDPATH**/ ?>