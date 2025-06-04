<?php

?>
<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3">Your Profile</span>
                                <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo e(Form::model($student,['route'=>'student.profile.update'])); ?>

                                <div class="row d-flex">
                                    <div class="col-md-6 mt-3">
                                        <label for="">Full Name</label>
                                        <?php echo e(Form::text('student_name',null,['class'=>'form-control','placeholder'=>'Enter Your Name','required'=>true])); ?>

                                        <?php echo e(Form::hidden('student_id',null,['class'=>'form-control','placeholder'=>'Enter Your Name','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Email</label>
                                        <?php echo e(Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Your Email','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Mobile No</label>
                                        <?php echo e(Form::text('mobile_no',null,['class'=>'form-control','placeholder'=>'Enter Your Mobile Number','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Address</label>
                                        <?php echo e(Form::textarea('address',null,['class'=>'form-control','placeholder'=>'Enter Your Address','rows'=>'2','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Pincode</label>
                                        <?php echo e(Form::text('pin_code',null,['class'=>'form-control','placeholder'=>'Enter Your Pincode','required'=>true])); ?>

                                    </div>

                                    <div class="col-md-12 mt-3 text-center">
                                        <input type="submit" value="Update" class='btn btn-primary'>
                                    </div>
                                </div>
                                    <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3">Update Password</span>
                                <?php echo e(Form::model($student,['route'=>'student.update.password'])); ?>

                                <div class="row d-flex">
                                    <div class="col-md-6 mt-3">
                                        <label for="">New Password</label>
                                        <?php echo e(Form::password('new_password',['class'=>'form-control','placeholder'=>'Enter New Password','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Confirm New Password</label>
                                        <?php echo e(Form::password('confirm_password',['class'=>'form-control','placeholder'=>'Confirm New Password','required'=>true])); ?>

                                    </div>

                                    <div class="col-md-12 mt-3 text-center">
                                        <input type="submit" value="Update Password" class='btn btn-primary'>
                                    </div>
                                </div>
                                    <?php echo e(Form::close()); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/dashboard/profile.blade.php ENDPATH**/ ?>