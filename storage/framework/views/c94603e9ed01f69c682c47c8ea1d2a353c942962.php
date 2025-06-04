<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="<?php echo e(url('/')); ?>" class="app-brand-link ">
                    <span class="app-brand-text demo text-body fw-bolder p-2 h3">Login</span>
                </a>
            </div>
            <!-- /Logo -->
            
            <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form id="formAuthentication" class="mb-3" action="<?php echo e(url('/')); ?>/admin/login" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                        <?php echo e(Form::text('email',null, ['class'=>'form-control','id'=>'email','placeholder'=>'Enter your email'])); ?>

                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        
                    </div>
                    <div class="input-group input-group-merge">

                            <?php echo e(Form::password('password', ['class'=>'form-control'])); ?>

                        
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\checker\resources\views/backend/login.blade.php ENDPATH**/ ?>