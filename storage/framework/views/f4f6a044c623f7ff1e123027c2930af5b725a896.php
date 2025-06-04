<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Free Test Exams'); ?>
<?php $__env->startSection('page_name', 'Free Test Exams'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .toggle-form {
        display: none;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">

        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row ">
            <section>
                <div class="row d-none">
                    <div class="col-md-4 ">
                        <div class="container pt-4 login_box bg-lavender text-dark ">
                            <div class="row justify-content-center pb-2">

                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section  class='start_now' id="products_page">
                <div class="row mt-2 g-3 text-dark">
                    <span class="h4 text-center">Start Now</span>
                    <div class="row p-0 ">
                        <?php if(isset($free_exams) && count($free_exams) > 0): ?>
                            <?php $__currentLoopData = $free_exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="col-12 col-sm-6 col-lg-4 col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class='text-center'>
                                                <span class="h5"><?php echo e((isset($exam->test_name)?$exam->test_name:'')); ?></span><br>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="col-md-12 image-box-listing p-0">
                                                <ul style="list-style:none">
                                                    <li>
                                                        <b>Batch</b> : <?php echo e((isset($exam->batch->batch_name)?$exam->batch->batch_name:'')); ?>

                                                    </li>
                                                    <li>
                                                        <b>Subject</b> : <?php echo e((isset($exam->subject->subject_name)?$exam->subject->subject_name:'')); ?>

                                                    </li>
                                                    <li>
                                                        <b>Time</b> : <?php echo e((isset($exam->time)?$exam->time:'')); ?>

                                                    </li>
                                                    <li>
                                                        <b>Expiry Date</b> : <?php echo e((isset($exam->expiry_date)? date('d/m/Y',strtotime($exam->expiry_date)):'--')); ?>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class='px-2 mb-3'>
                                                <div class="container text-center button_section">
                                                    <?php if(isset(Auth::user()->student_id)): ?>
                                                    <?php echo Form::open([
                                                        'method' => 'get',
                                                        'url' => ['student/validate/free/exam/details', $exam->id],
                                                        'style' => 'display:inline',
                                                        ]); ?>


                                                        <?php echo Form::button('Start Solving', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-sm btn-outline-success',
                                                        ]); ?>


                                                        <?php echo Form::close(); ?>

                                                        <a href="" class=""></a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('student.login')); ?>" class="btn btn-sm btn-outline-info"> Login before continue</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>




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
        <!-- / Layout page -->
      
      <!-- Overlay -->
      

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>
$(document).ready(function() {
}); //end of document.ready
</script>
<script>
    $(document).ready(function() {

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/products/free_exams_listing.blade.php ENDPATH**/ ?>