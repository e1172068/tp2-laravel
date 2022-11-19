
<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="row justify-content-center">   
        <h1 class="pt-5"><?php echo app('translator')->get("lang.registration_title"); ?></h1>
        <form action="" method="POST" class="py-5">
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
                <label for="name" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_name"); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_adress"); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="adress" name="adress" value="<?php echo e(old('adress')); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_phone"); ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_email"); ?></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="birthdate" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_birthdate"); ?></label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo e(old('birthdate')); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="ville_id" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_city"); ?></label>
                <div class="col-sm-9">
                    <select class="form-select" id="ville_id" name="ville_id" aria-label="Default select example" required>
                        <option selected disabled><?php echo app('translator')->get("lang.city_placeholder"); ?></option>
                        <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($ville->id == old("ville_id")): ?>
                                    <option value="<?php echo e($ville->id); ?>" selected><?php echo e($ville->nom); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($ville->id); ?>"><?php echo e($ville->nom); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_password"); ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label"><?php echo app('translator')->get("lang.form_label_confirm_password"); ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password_confirmation" required>
                </div>
            </div>
            <div class="d-flex justify-content-end py-2 button-container">
                <a type="button" href="<?php echo e(route('etudiant.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get("lang.back"); ?></a>
                <input type="submit"  class="btn btn-primary" value="<?php echo app('translator')->get('lang.submit'); ?>"/>
            </div>
        </form>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\e1172068\Desktop\maisonneuve-e1172068\resources\views/auth/create.blade.php ENDPATH**/ ?>