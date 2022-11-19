
<?php $__env->startSection("content"); ?>
    <main>
        <div class="d-flex justify-content-between align-items-center pt-5">
            <h1 class="pt-5"><?php echo app('translator')->get("lang.student_list_title"); ?></h1>
        </div>
        <ul class="py-3">
        <?php $__empty_1 = true; $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li> <a href="<?php echo e(route('etudiant.show', $etudiant->user_id)); ?>"><?php echo e($etudiant->etudiantHasUser->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li class="text-danger">Aucun étudiant</li>
        <?php endif; ?> 
        </ul>  
        <div class="d-flex justify-content-center">    
            <span><?php echo e($etudiants->links()); ?></span>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\stngm\Desktop\maisonneuve-e1172068\resources\views/etudiant/index.blade.php ENDPATH**/ ?>