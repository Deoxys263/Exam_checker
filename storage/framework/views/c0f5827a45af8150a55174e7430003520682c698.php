<?php if(isset($errors) && count($errors) > 0): ?>
<div class="col-md-10">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
                <?php echo e($error); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php /**PATH G:\wamp64\www\checker\resources\views/backend/includes/errors.blade.php ENDPATH**/ ?>