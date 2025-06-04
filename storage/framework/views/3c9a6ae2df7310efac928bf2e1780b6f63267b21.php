<?php

?>
<?php $__env->startSection('title','Exam Instructions'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-4 order-0 text-center">
                <h1 class="main_text">Instructions</h1>
                <br>
                <i class="fa-solid fa-computer fa-7x"></i>
                <hr>
                <?php echo isset($exam_details->instructions)?$exam_details->instructions:'--'; ?>


                <?php echo e(Form::open(['route'=>'student.store.exam.confirmation', 'method'=>'post'])); ?>

                <input type="checkbox" class="mx-2" name="confirm_start_exam" id="confirmation_checkbox" style="height:15px" required><label>I read all the instructions</label>
                <br>
                <input type="submit" id="confirmation_button" class="btn btn-primary m-2 disabled" value="Start My Exam">
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            EnableStartExamButton();
            $('#confirmation_checkbox').change(function(){
                EnableStartExamButton();
            });
        });

        function EnableStartExamButton(){
            if($('#confirmation_checkbox').is(':checked')){
                $('#confirmation_button').removeClass('disabled');
            }else{
                $('#confirmation_button').addClass('disabled');
            }
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.mcq_exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/mcq_exam/instructions.blade.php ENDPATH**/ ?>