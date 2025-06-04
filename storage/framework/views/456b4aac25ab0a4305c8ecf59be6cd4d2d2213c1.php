<?php

?>
<?php $__env->startSection('title','Batches'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <h5 class="card-header home_page_h3">
                                        Papers
                                        <a href="<?php echo e(route('student.purchased.batches')); ?>">
                                            <span class="btn btn-outline-info right-btn">
                                            Back
                                            </span>
                                        </a>
                                    </h5>
                                    <div class="table-responsive text-nowrap pb-4">
                                        <table class="table">
                                            <thead class="table">
                                                <tr class="papers_subject_heading">
                                                    <th>Sr. No</th>
                                                    <th>Chapter Name/Paper Name</th>
                                                    <th class='mobile_view_table'>Marks</th>
                                                    <th class='mobile_view_table'>Time</th>
                                                    <th class='mobile_view_table'>Type</th>
                                                    <th class='mobile_view_table'>Status</th>
                                                    <th class='mobile_view_table'>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php if(isset($papers) && count($papers) > 0): ?>
                                                    <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loop->index+1); ?></td>
                                                            <td><?php echo e((isset($paper->paper_name)?$paper->paper_name:'')); ?></td>
                                                            <td class='mobile_view_table'><?php echo e((isset($paper->marks)?$paper->marks:'')); ?></td>
                                                            <td class='mobile_view_table'><?php echo e((isset($paper->time)?$paper->time.'-Mins':'')); ?></td>
                                                            <td class='mobile_view_table'><?php echo e((isset($paper->type)?ucfirst($paper->time):'')); ?></td>
                                                            <td>Not Uploaded</td>
                                                            <td class='mobile_view_table'>
                                                                <a href="<?php echo e(route('student.purchased.details',[$paper->file_id,$cart_id])); ?>"> <span class="btn btn-outline-info btn-sm">Solve</span></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/orders/list_papers.blade.php ENDPATH**/ ?>