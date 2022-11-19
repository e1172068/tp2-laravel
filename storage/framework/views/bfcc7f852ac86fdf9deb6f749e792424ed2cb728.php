
<?php $__env->startSection("content"); ?>
<?php $locale = session()->get('locale'); ?>
    <main>
        <div class="pt-5 d-flex justify-content-between align-items-center">
            <h1><?php echo e(__("lang.document_list_title")); ?></h1>
            <a href="<?php echo e(route('document.create')); ?>" class="btn btn-primary"><?php echo e(__("lang.document_add")); ?></a>
        </div>
        <table class="py-3 table">
        <thead>
            <tr>
                <th><?php echo e(__("lang.th_title")); ?></th>
                <th><?php echo e(__("lang.th_uploaded_by")); ?></th>
                <th><?php echo e(__("lang.th_link")); ?></th>
                <th><?php echo e(__("lang.th_action")); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($locale == "en" ? $document->titre_en : $document->titre); ?></td>
                    <td><?php echo e($document->documentHasUser->name); ?></td>
                    <td>
                        <a class="btn btn-link btn-sm" target="_blank" href="<?php echo e(Storage::url($document->document_path)); ?>">
                            <i class="fa-solid fa-file-arrow-down"></i>
                        </a>
                    </td>
                    <?php if(auth()->user()->id === $document->documentHasUser->id): ?>
                    <td class="d-flex no-wrap">
                        <a class="btn btn-link btn-sm" href="<?php echo e(route('document.edit', $document->id)); ?>"><i class="fa-solid fa-file-pen"></i></a>
                        <form action="<?php echo e(route('document.destroy', $document->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field("DELETE"); ?>
                            <button type="submit" class="btn btn-link btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <?php else: ?>
                    <td><?php echo e(__("lang.not_available")); ?></td>
                    <?php endif; ?>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="text-danger"><?php echo e(__("lang.document_none")); ?></li>
            <?php endif; ?> 
        </tbody>
        </table>  
        <div class="d-flex justify-content-center">    
            <span><?php echo e($documents->links()); ?></span>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\stngm\Desktop\maisonneuve-e1172068\resources\views/document/index.blade.php ENDPATH**/ ?>