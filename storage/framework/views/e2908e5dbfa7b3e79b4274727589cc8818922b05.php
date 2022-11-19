
<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="row justify-content-center">
        
        <h1>Formulaire de modification d'étudiant</h1>
        <form action="" method="POST" class="py-5">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
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
                <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo e($etudiant->nom); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo e($etudiant->adresse); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Téléphone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($etudiant->phone); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Courriel</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo e($etudiant->email); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="date_naissance" class="col-sm-3 col-form-label">Date de naissance</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo e($etudiant->date_naissance); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="ville_id" class="col-sm-3 col-form-label">Ville</label>
                <div class="col-sm-9">
                    <select class="form-select" id="ville_id" name="ville_id" aria-label="Default select example">
                        <option selected disabled>Sélectionner votre ville</option>
                        <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ville->id == $etudiant->ville_id): ?>
                                <option value="<?php echo e($ville->id); ?>" selected><?php echo e($ville->nom); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($ville->id); ?>"><?php echo e($ville->nom); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="<?php echo e(route('etudiant.index')); ?>" class="btn btn-secondary">Retour</a>
                <input type="submit"  class="btn btn-primary" value="Soumettre"/>
            </div>
        </form>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\e1172068\Desktop\maisonneuve-e1172068\resources\views/etudiant/edit.blade.php ENDPATH**/ ?>