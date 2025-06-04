<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'My Sheets'); ?>
<?php $__env->startSection('page_name', 'My Sheets'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Sheets</li>
                </ol>
            </div>
        <div class="col-md-4 text-right">
            <div class="btn-group text-end mt-2">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                </a>
            </div>
        </div>
    </div>
</div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="card">
            <span class="h5 m-3">My Sheets</span>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table zero-configuration table-bordered" id="student_solutions_table" style="white-space: nowrap;">
                            <thead>
                                <th>Sr. No</th>
                                <th>Sheet No</th>
                                <th>Date</th>
                                <th>Student Name</th>
                                <th>Package Name</th>
                                <th>Subject</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php if(isset($all_sheets) && count($all_sheets) > 0): ?>
                                    <?php $__currentLoopData = $all_sheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sheet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->index+1); ?></td>
                                            <td><?php echo e($sheet->id); ?></td>
                                            <td><?php echo e((isset($sheet->created_at)?date('d/m/Y',strtotime($sheet->created_at)):null)); ?></td>
                                            <td><?php echo e((isset($sheet->student->student_name)?$sheet->student->student_name:'--')); ?></td>
                                            <td><?php echo e((isset($sheet->package->package_name)?$sheet->package->package_name:'--')); ?></td>
                                            <td><?php echo e((isset($sheet->filename->subject->subject_name)?$sheet->filename->subject->subject_name:'--')); ?></td>
                                            <td><?php echo e((isset($sheet->status)?$sheet->status:'')); ?></td>
                                            <td><?php echo e((isset($sheet->score)?$sheet->score:'--')); ?> / <?php echo e((isset($sheet->marks)?$sheet->marks:'--')); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.view.student.sheet.details',[$sheet->id])); ?>" class="btn btn-sm btn-success"><i class='bx bx-file-find'></i></a>
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
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
        <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#student_solutions_table').DataTable();

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/student_sheets/my_sheets.blade.php ENDPATH**/ ?>