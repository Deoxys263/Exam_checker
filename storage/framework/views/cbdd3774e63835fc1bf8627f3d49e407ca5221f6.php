<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Free Exams'); ?>
<?php $__env->startSection('page_name', 'free_exams'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container m-0">
            <div class="row px-2">
                <div class="col-md-8">
                    <ol class="breadcrumb pt-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('admin.free.exams')); ?>">Free Exams</a></li>
                    </ol>
                </div>
                <div class="col-md-4 text-right">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create free exams')): ?>
                        <div class="btn-group text-end mt-2">
                            <a href="<?php echo e(route('admin.free.exams.addquestions',[$free_exam_id])); ?>">
                                <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Assign Questions</span>
                            </a>

                            <a href="<?php echo e(route('admin.free.exams')); ?>">
                                <span class='btn btn-secondary btn125'><i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> back</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <p>
                            <b>
                                Test Name :  <?php echo e((isset($exam_details->test_name)?$exam_details->test_name:'--')); ?>

                            </b>
                        </p>

                        <table class="table zero-configuration table-bordered" id="batch_table"
                            > 
                            <thead>
                                <tr role="row" style="height: 0px;">
                                    <th class="text-center sorting_asc"> Sr. No </th>
                                    <th style="width:10%">Question</th>
                                    <th>Chapter</th>
                                    <th>Type</th>
                                    <th class="text-center sorting_asc">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($exam_questions) && count($exam_questions) > 0): ?>
                                    <?php $srno = 1; ?>
                                    <?php $__currentLoopData = $exam_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <tr>
                                            <td class="text-center"><?php echo e($srno); ?></td>

                                            <td style="width:10%">
                                                <?php if(isset($data->question->question)): ?>
                                                    <?php
                                                        print_r(isset($data->question->question)?strip_tags($data->question->question,'<p><img>'):'--')
                                                    ?>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(isset($data->question->chapter->chapter_name)): ?>
                                                    <?php echo e($data->question->chapter->chapter_name); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(isset($data->question->type)): ?>
                                                    <?php echo e($data->question->type); ?>

                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php echo Form::open([
                                                    'method' => 'get',
                                                    'url' => ['admin/free/exams/delete/question', $data->id],
                                                    'style' => 'display:inline',
                                                    ]); ?>

                                                    <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        //'onclick' => "return true", //confirm('Are you sure you want to Delete this Question from exam ?')",
                                                    ]); ?>

                                                <?php echo Form::close(); ?>

                                                
                                            </td>


                                            </tr>
                                            <?php $srno++; ?>
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
            $('#batch_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                    {
                        text: '<i class="fas fa-print"></i> Print',
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2]
                        },
                        title: function(){
                        var printTitle = 'Batches';
                        return printTitle
                    },
                    className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                    },
                    {
                        text: '<i class="far fa-file-excel"></i> Excel',
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2]
                        },
                        title: function(){
                        var printTitle = 'Batches';
                        return printTitle
                        },
                        className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                    },
                ],

            });
        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/free_exams/manage_questions.blade.php ENDPATH**/ ?>