
<?php $__env->startSection("content"); ?>
    <div class="row">
        <h1 class="pt-5"><?php echo e(__("lang.student_detail")); ?></h2>
        <dl>
            <dt><?php echo e(__("lang.form_label_name")); ?></dt>
            <dd><?php echo e($etudiant->etudiantHasUser->name); ?></dd>
            <dt><?php echo e(__("lang.form_label_adress")); ?></dt>
            <dd><?php echo e($etudiant->adresse); ?></dd>
            <dt><?php echo e(__("lang.form_label_phone")); ?></dt>
            <dd><?php echo e($etudiant->phone); ?></dd>
            <dt><?php echo e(__("lang.form_label_email")); ?></dt>
            <dd><?php echo e($etudiant->etudiantHasUser->email); ?></dd>
            <dt><?php echo e(__("lang.form_label_birthdate")); ?></dt>
            <dd><?php echo e($etudiant->birthdate); ?></dd>
            <dt><?php echo e(__("lang.form_label_city")); ?></dt>
            <dd><?php echo e($nomVille); ?></dd>
        </dl>
    </div>
    <?php if($currentUserId == $etudiant->user_id): ?>
        <a href="<?php echo e(route('auth.edit')); ?>" class="btn btn-primary"><?php echo e(__("lang.edit")); ?></a>
        <a href="<?php echo e(route('auth.destroy')); ?>" class="btn btn-danger"><?php echo e(__("lang.delete")); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\stngm\Desktop\maisonneuve-e1172068\resources\views/etudiant/show.blade.php ENDPATH**/ ?>