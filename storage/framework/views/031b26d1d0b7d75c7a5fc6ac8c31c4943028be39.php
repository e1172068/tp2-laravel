
<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5"><?php echo e(__("lang.document_add")); ?></h1>
        <form action="" method="POST" class="py-5" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session("success")); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="titre" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_title"); ?> (fr)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="titre" name="titre" value="<?php echo e(old('titre')); ?>" novalidate>
                </div>
            </div>
            <div class="row mb-3">
                <label for="titre_en" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_title"); ?> (en)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="titre_en" name="titre_en" value="<?php echo e(old('titre_en')); ?>" novalidate>
                </div>
            </div>
            <div class="row mb-3">
                <label for="document" class="col-sm-3 col-form-label"><?php echo e(__("lang.form_label_file")); ?></label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="document" name="document" value="<?php echo e(old('file')); ?>" required accept=".pdf,.doc,.zip">
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="<?php echo e(route('document.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get("lang.back"); ?></a>
                <input type="submit"  class="btn btn-primary" value="<?php echo app('translator')->get('lang.submit'); ?>"/>
            </div>
        </form>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\stngm\Desktop\maisonneuve-e1172068\resources\views/document/create.blade.php ENDPATH**/ ?>