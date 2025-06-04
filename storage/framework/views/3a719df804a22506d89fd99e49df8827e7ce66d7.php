<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'HSC Test Series'); ?>
<?php $__env->startSection('page_name', 'HSC Test Series'); ?>
<?php $__env->startSection('content'); ?>
<style>


</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">

        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row">
            <section class='hero_section'>
                <div class="col-12 text-center">
                    <p class='h3 home_page_h3'> Login into your account</p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>
                    <p></p>
                    
                    
                </div>
            </section>
            <section>
                <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8 text-center">
                    <div class="container pt-4 login_box bg-lavender text-dark ">
                        <div class="row justify-content-center ">
                                <!-- Login Form -->
                                <div id="student_register_form" class="">
                                    <br>
                                    <h3 class="text-center p-1 login_h3"><?php echo e(env('APP_NAME')); ?></h3>
                                    <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo e(Form::open(['route'=>'student.login.action'])); ?>


                                        <div class="row text-align-left">
                                            <div class="col-md-12 ">
                                                <label for="loginEmail">Email</label>
                                                <?php echo e(Form::text('email',null, ['class'=>'form-control','placeholder'=>'Enter Your Email.','id'=>'email',"pattern"=>"[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}"])); ?>

                                            </div>

                                            <div class="col-md-12 ">
                                                <label for="loginEmail">Password</label>
                                                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'Enter Your Password.'])); ?>

                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-block main_btn">Login</button>
                                        </div>
                                    <?php echo e(Form::close()); ?>

                                    <p class="text-center mt-3">
                                        Need an account? <a href="<?php echo e(route('student.register')); ?>" id="showRegister">Click here</a>

                                        <br><br>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
        <!--/ Layout Demo -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
          <!-- Content wrapper -->
        </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>
$(document).ready(function() {
}); //end of document.ready
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/home/login.blade.php ENDPATH**/ ?>