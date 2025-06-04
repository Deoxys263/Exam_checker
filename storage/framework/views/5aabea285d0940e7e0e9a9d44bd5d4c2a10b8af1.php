<?php

?>
<?php $__env->startSection('title','Solved Sheets'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <h5 class="card-header home_page_h3">
                                        Solved Sheets
                                        <a href="<?php echo e(route('student.dashboard')); ?>">
                                            <span class="btn btn-outline-info right-btn">
                                            Back
                                            </span>
                                        </a>
                                    </h5>
                                    <div class="table-responsive pb-4 mx-2">
                                        <table class="table" id="uploads_table">
                                            <thead class="table">
                                                <tr class="papers_subject_heading">
                                                    <th>Sr. No</th>
                                                    <th>Chapter Name / Paper Name</th>
                                                    <th class='mobile_view_table'>Marks</th>
                                                    <th class='mobile_view_table'>Status</th>
                                                    <th class='mobile_view_table'>Checked By</th>
                                                    <th class='mobile_view_table'>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php if(isset($all_sheets) && count($all_sheets) > 0): ?>
                                                    <?php $__currentLoopData = $all_sheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>

                                                            <td><?php echo e($loop->index+1); ?></td>
                                                            <td><?php echo e((isset($paper->package->package_name)?$paper->package->package_name:'')); ?></td>
                                                            <td class='mobile_view_table'> <?php echo e((isset($paper->score)?$paper->score:'--')); ?> /  <?php echo e((isset($paper->marks)?$paper->marks:'')); ?></td>
                                                            <td class='mobile_view_table'><?php echo e((isset($paper->status)?ucfirst($paper->status):'')); ?></td>
                                                            <td>
                                                                <?php echo e((isset($paper->checker->first_name)?$paper->checker->first_name:'-').' '.(isset($paper->checker->last_name)?$paper->checker->last_name:'-')); ?>

                                                            </td>
                                                            <td class='mobile_view_table'>
                                                                <?php if($paper->solution_file): ?>
                                                                    <a class="btn btn-warning btn-sm" href="<?php echo e(asset('public/'.env('STUDENT_SOLUTIONS_UPLOAD_PATH').$paper->package_id.'/'.$paper->student_id.'/'.$paper->solution_file)); ?>" target="_new"><i class="bx bx-download "></i>Solved Sheet</a>
                                                                <?php endif; ?>
                                                                <br>
                                                                <?php if($paper->checked_solution): ?>
                                                                    <a class="btn btn-success btn-sm mt-2" href="<?php echo e(asset('public/'.env('CHECKED_SOLUTIONS_UPLOAD_PATH').$paper->package_id.'/'.$paper->student_id.'/'.$paper->checked_solution)); ?>" target="_new"><i class="bx bx-download "></i>Checked Sheet</a>
                                                                <?php endif; ?>

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
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        $('#uploads_table').DataTable();
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/orders/solved_papers_list.blade.php ENDPATH**/ ?>