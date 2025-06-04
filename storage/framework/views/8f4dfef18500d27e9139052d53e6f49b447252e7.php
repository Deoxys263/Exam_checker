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
                    <p class='h3 home_page_h3'> Create Your Account</p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>
                    <p></p>
                    
                    <p>Start your journey today</p>
                </div>
            </section>
            <section>
                <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="container pt-4 login_box bg-lavender text-dark ">
                        <div class="row justify-content-center ">
                                <!-- Login Form -->
                                <div id="student_register_form" class="">
                                    <h3 class="text-center p-1 login_h3"><?php echo e(env('APP_NAME')); ?></h3>
                                    <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo e(Form::open(['route'=>'student.register.store'])); ?>

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group ">
                                                    <label for="loginEmail">Full Name</label>
                                                    <?php echo e(Form::text('student_name',null, ['class'=>'form-control','placeholder'=>'Enter Your Full Name'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-align-left">
                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Email</label>
                                                <?php echo e(Form::text('email',null, ['class'=>'form-control','placeholder'=>'Enter Your Email','id'=>'email',"pattern"=>"[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}"])); ?>

                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Mobile No</label>
                                                <?php echo e(Form::text('mobile_no',null, ['class'=>'form-control','placeholder'=>'Enter Your Mobile No'])); ?>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Password</label>
                                                <?php echo e(Form::password('password', ['class'=>'form-control','placeholder'=>'Enter Your Password','id'=>'password'])); ?>

                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Confirm Password</label>
                                                <?php echo e(Form::password('confirm_password', ['class'=>'form-control','placeholder'=>'Enter New Password'])); ?>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Address</label>
                                                <?php echo e(Form::textarea('address', null, ['class'=>'form-control','placeholder'=>'Enter Your Address','rows'=>'3', 'id'=>'address'])); ?>

                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="loginEmail">Pincode</label>
                                                <?php echo e(Form::text('pincode', null, ['class'=>'form-control','placeholder'=>'Enter Your Pin Code'])); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-block main_btn">Register</button>
                                        </div>
                                    <?php echo e(Form::close()); ?>

                                    <p class="text-center mt-3">
                                        have an account? <a href="#" id="showRegister">Login here</a>

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/home/register.blade.php ENDPATH**/ ?>