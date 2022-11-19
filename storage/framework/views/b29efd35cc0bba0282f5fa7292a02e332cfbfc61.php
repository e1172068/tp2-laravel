
<?php $__env->startSection('content'); ?>
<?php $locale = session()->get('locale'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="<?php echo e(route('article.index')); ?>" class="btn btn-outline-primary btn-sm">Retourner</a>
                <?php if($locale=="en"): ?>
                    <h4 class="display-one mt-5"><?php echo e($article->titre_en); ?></h4>
                    <hr>
                    <p><?php echo $article->contenu_en; ?></p>
                    <hr>           
                    <p><?php echo e($article->articleHasUser->name); ?></p>
                <?php else: ?>
                    <h4 class="display-one mt-5"><?php echo e($article->titre); ?></h4>
                    <hr>
                    <p><?php echo $article->contenu; ?></p>
                    <hr>           
                    <p><?php echo e($article->articleHasUser->name); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="<?php echo e(route('article.edit', $article->id)); ?>" class="btn btn-primary">Mettre a jour</a>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Effacer
                </button>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="<?php echo e(route('article.edit', $article->id )); ?>" method="post">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation suppression article <?php echo e($article->id); ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sur de vouloir effacer cet article? Cette action est irréversible.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Confirmer suppression</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\e1172068\Desktop\maisonneuve-e1172068\resources\views/article/show.blade.php ENDPATH**/ ?>