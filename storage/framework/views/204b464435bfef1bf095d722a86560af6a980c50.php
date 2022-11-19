
<?php $__env->startSection("content"); ?>
<?php $locale = session()->get('locale'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="pt-5 display-one">
                <?php echo e(__("lang.forum_title")); ?>

            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4><?php echo e(__("lang.forum_list")); ?></h4>
                    <a href="<?php echo e(route('article.create')); ?>" class="btn btn-primary"><?php echo e(__("lang.forum_add_button")); ?></a>
                </div>
                <div class="card-body" >
                    <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <a href="<?php echo e(route('article.show', $article->id)); ?>">
                                <?php if($locale=="en"): ?>
                                    <?php echo e($article->titre_en); ?>

                                <?php else: ?>
                                    <?php echo e($article->titre); ?>

                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="text-danger">Aucun article disponible</li>    
                    <?php endif; ?>
                    </ul>
                </div>

            </div>
                            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\stngm\Desktop\maisonneuve-e1172068\resources\views/article/index.blade.php ENDPATH**/ ?>