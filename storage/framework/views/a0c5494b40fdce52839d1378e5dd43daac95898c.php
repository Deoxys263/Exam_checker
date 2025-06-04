<?php

?>
<?php $__env->startSection('title','Paper Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3">Upload Solution</span>
                                <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo e(Form::open(['route'=>'student.upload.solved.sheet', 'files'=>true])); ?>

                                <div class="row d-flex">
                                    <div class="col-md-6 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="">Paper Name</label>
                                            <?php echo e(Form::text('paper_name', (isset($paper_details->paper_name)?$paper_details->paper_name:'--') ,['class'=>'form-control','readonly'=>true])); ?>

                                            <?php echo e(Form::hidden('product_id',$package_id,['class'=>'form-control'])); ?>

                                            <?php echo e(Form::hidden('file_id',$file_id,['class'=>'form-control'])); ?>

                                            <?php echo e(Form::hidden('cart_id',$cart_id,['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Marks</label>
                                            <?php echo e(Form::text('marks',(isset($paper_details->marks)?$paper_details->marks:'--') ,['class'=>'form-control','readonly'=>true])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Marks</label>
                                            <?php echo e(Form::file('student_solution',['class'=>'form-control','Placeholder'=>'Upload you solved sheet'])); ?>

                                            <span class="text-warning">Please upload .PDF file only.</span><br>
                                            <span class="text-warning">Please upload single pdf file.</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 text-center">
                                        <input type="submit" class='btn btn-outline-success' value="Upload For Checking">
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

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/orders/upload.blade.php ENDPATH**/ ?>