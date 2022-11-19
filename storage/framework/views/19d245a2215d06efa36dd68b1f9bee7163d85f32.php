
<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5"><?php echo e(__("lang.forum_edit_title")); ?></h1>
        <form method="POST" class="py-5">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
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
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr" type="button" role="tab" aria-controls="fr" aria-selected="true"><?php echo e(__("lang.fr")); ?></button>
                    <button class="nav-link" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button" role="tab" aria-controls="en" aria-selected="false"><?php echo e(__("lang.en")); ?></button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                    <div class="row mb-3">
                        <label for="titre" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_title"); ?> (fr)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titre" name="titre" value="<?php echo e($article->titre); ?>" novalidate>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contenu" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_content"); ?> (fr)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="contenu" name="contenu" novalidate><?php echo e($article->contenu); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                <div class="row mb-3">
                    <div class="row mb-3">
                        <label for="titre_en" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_title"); ?> (en)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titre_en" name="titre_en" value="<?php echo e($article->titre_en); ?>" novalidate>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="contenu_en" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_content"); ?> (en)</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="contenu_en" name="contenu_en" novalidate><?php echo e($article->contenu_en); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="<?php echo e(route('article.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get("lang.back"); ?></a>
                <input type="submit"  class="btn btn-primary" value="<?php echo app('translator')->get('lang.submit'); ?>"/>
            </div>
        </form>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\e1172068\Desktop\maisonneuve-e1172068\resources\views/article/edit.blade.php ENDPATH**/ ?>