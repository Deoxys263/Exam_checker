<?php

?>
<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-8 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3 float-center">Enter Your Message to Reach us</span>
                                <br>
                                <span>Your team contact u soon</span>
                                <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo e(Form::model($student,['route'=>'store.reach-us'])); ?>

                                <div class="row d-flex">
                                    <div class="col-md-5 mt-3">
                                        <label for="">Full Name</label>
                                        <?php echo e(Form::text('student_name',null,['class'=>'form-control','placeholder'=>'Enter Your Name','required'=>true])); ?>

                                        <?php echo e(Form::hidden('student_id', null, ['class'=>'form-control','placeholder'=>'Enter Your Name','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="">Email</label>
                                        <?php echo e(Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Your Email','required'=>true])); ?>

                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="">Mobile No</label>
                                        <?php echo e(Form::text('mobile_no',null,['class'=>'form-control','placeholder'=>'Enter Your Mobile Number','required'=>true])); ?>

                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="">Subject</label>
                                        <?php echo e(Form::text('subject',null,['class'=>'form-control','placeholder'=>'Enter Subject','required'=>true, 'max'=>255])); ?>

                                        <p class='text-right text-info' style='text-align:right'>Max 250 characters</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Message</label>
                                        <?php echo e(Form::textarea('message',null,['class'=>'form-control','placeholder'=>'Enter Your message','rows'=>'4','required'=>true])); ?>

                                        <p class='text-right text-info' style='text-align:right'>Max 1000 characters</p>
                                    </div>

                                    <div class="col-md-12 mt-3 text-center">
                                        <input type="submit" value="Send Message" class='btn btn-primary'>
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/dashboard/contact_us.blade.php ENDPATH**/ ?>