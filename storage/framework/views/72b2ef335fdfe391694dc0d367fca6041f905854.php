<?php
use \Illuminate\Support\Str;
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
                                <h3 class="h3 home_page_h3">Paper Details
                                <a href="<?php echo e(route('student.purchased.list.papers',[$package_id,$cart_id])); ?>">
                                    <span class="btn btn-outline-info right-btn">
                                    Back
                                    </span>
                                </a>
                            </h3>
                                <div class="row p-2">
                                    <div class="col-md-5 col-sm-12 ">
                                        <div class="card mb-3 p-2 batches_cards">
                                            <div class='table-responsive'>
                                            <table class='table-bordered w-100'>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?php echo e((isset($paper_file->paper_name)?STR::limit($paper_file->paper_name,25):'--')); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Subject</td>
                                                    <td><?php echo e((isset($paper_file->subject->subject_name)?$paper_file->subject->subject_name:'--')); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Marks</td>
                                                    <td><?php echo e((isset($paper_file->marks)?$paper_file->marks:0)); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Time</td>
                                                    <td><?php echo e((isset($paper_file->time)?$paper_file->time.' -Mins':'--')); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Download</td>
                                                    <td>
                                                        <?php echo Form::open([
                                                            'method' => 'get',
                                                            'url' => ['student/download/question/paper', $package_id,$file_id,$cart_id],
                                                            'style' => 'display:inline',
                                                        ]); ?>

                                                        <?php echo Form::button('Question Paper', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-outline-success btn-sm m-1',
                                                        ]); ?>

                                                        <?php echo Form::close(); ?>


                                                        <?php echo Form::open([
                                                            'method' => 'get',
                                                            'url' => ['student/download/solution/file', $package_id,$file_id,$cart_id],
                                                            'style' => 'display:inline',
                                                        ]); ?>

                                                        <?php echo Form::button('Solution', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-outline-info btn-sm m-1',
                                                        ]); ?>

                                                        <?php echo Form::close(); ?>


                                                        <a href="<?php echo e(route('student.upload.solved.sheet.page',[$package_id,$file_id,$cart_id])); ?>"><span class="btn btn-outline-warning btn-sm m-1">Upload Solved Sheet</span></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Downloaded On</td>
                                                    <td><?php echo e((isset($download_log->created_at)?date('d/m/Y h:i:s a', strtotime($download_log->created_at)):'--')); ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="card mb-3 p-2 batches_cards">
                                            <div class='table-responsive'>
                                                <table class='table-bordered w-100'>
                                                    <tr>
                                                        <th>Uploaded on</th>
                                                        <th>Status</th>
                                                        <th>Checked By</th>
                                                        <th>Checked on</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php if(isset($transaction)): ?>
                                                        <tr>
                                                            <td>
                                                               <?php echo e((isset($transaction->created_at)?date('d/m/Y h:i:s', strtotime($transaction->created_at)):'')); ?>

                                                            </td>
                                                            <td><?php echo e((isset($transaction->status)?$transaction->status:'--')); ?></td>
                                                            <td>Checked By</td>
                                                            <td>Checked on</td>
                                                            <td>
                                                                <a href="" class="btn btn-sm btn-success" ><i class="fa-solid fa-eye"></i></a>
                                                                <a href="" class="btn btn-sm btn-info" ><i class="fa-solid fa-check-to-slot"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/orders/paper_details.blade.php ENDPATH**/ ?>