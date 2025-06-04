<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'View Details'); ?>
<?php $__env->startSection('page_name', 'student_sheets'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('admin.view.student.sheets')); ?>">Student Uploaded Sheets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Details</li>
                </ol>
            </div>
            
        <div class="col-md-4 text-right">
            <div class="btn-group text-end mt-2">
                <?php if(in_array(Auth::user()->role , $admin_role_id)): ?>
                    <a href="<?php echo e(route('admin.view.student.sheets')); ?>">
                        <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(route('admin.checker.my.checkings')); ?>">
                        <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                    </a>
                <?php endif; ?>

                <a href="<?php echo e(route('admin.show.nextsheet',[$sheet->id])); ?>">
                    <span class='btn btn-success btn125'>  <i class='bx bx-right-arrow-alt' ></i> Next</span>
                </a>

            </div>
        </div>
    </div>
</div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="card">
            <span class="h5 m-3">View Sheet Details</span>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width:200px"><b>Solution No</b></td>
                            <td><?php echo e((isset($sheet->id)?$sheet->id:'--')); ?></td>
                        </tr>
                        <tr>
                            <td><b>Student Name</b></td>
                            <td><?php echo e((isset($sheet->student->student_name)?$sheet->student->student_name:'--')); ?></td>
                        </tr>

                        <tr>
                            <td><b>Checker Name</b></td>
                            <td>
                                <?php if(isset($sheet->checked_by)): ?>
                                    <span class="badge badge-pill bg-success">
                                        <?php echo e((isset($sheet->checker->first_name)?$sheet->checker->first_name:'-').' '.(isset($sheet->checker->last_name)?$sheet->checker->last_name:'-')); ?>

                                    </span>
                                <?php else: ?>
                                    <?php if(in_array(Auth::user()->role , $admin_role_id)): ?>
                                        <select name="checker_id" class="checker_id" data-sheet-id="<?php echo e($sheet->id); ?>">
                                            <?php if(isset($checkers) && count($checkers) > 0): ?>
                                            <option value="">Select Checker</option>
                                                <?php $__currentLoopData = $checkers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($checker->id); ?>"
                                                        <?php if(isset($sheet->checker_id) && $sheet->checker_id == $checker->id): ?>
                                                            selected
                                                        <?php endif; ?>
                                                        ><?php echo e((isset($checker->first_name)?$checker->first_name:'--')); ?>

                                                        <?php echo e((isset($checker->last_name)?$checker->last_name:'--')); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Paper Name</b></td>
                            <td><?php echo e((isset($sheet->filename->paper_name)?$sheet->filename->paper_name:'--')); ?></td>
                        </tr>

                        <tr>
                            <td><b>Subject Name</b></td>
                            <td><?php echo e((isset($sheet->filename->subject->subject_name)?$sheet->filename->subject->subject_name:'--')); ?></td>
                        </tr>

                        <tr>
                            <td><b>Marks</b></td>
                            <td><?php echo e((isset($sheet->filename->marks)?$sheet->filename->marks:'--')); ?></td>
                        </tr>

                        <tr>
                            <td><b>Status</b></td>
                            <td>
                                <?php if($sheet->status): ?>
                                    <?php if($sheet->status=='uploaded'): ?>
                                        <span class="badge badge-pill bg-warning">Pending</span>
                                    <?php elseif($sheet->status=='checked'): ?>
                                        <span class="badge badge-pill bg-success">Checked</span>
                                    <?php elseif($sheet->status=='rejected'): ?>
                                    <span class="badge badge-pill bg-danger">Checked</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                 --
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Score</b></td>
                            <td><?php echo e((isset($sheet->score)?$sheet->score:'--')); ?></td>
                        </tr>

                        <tr>
                            <td><b>Question Paper</b></td>
                            <td>
                                <?php if(isset($sheet->filename->question_paper)): ?>
                                    <a href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$sheet->filename->question_paper)); ?>">Question Paper <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td><b>Answer Sheet</b></td>
                            <td>
                                <?php if(isset($sheet->filename->solution)): ?>
                                    <a href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$sheet->filename->solution)); ?>">Solution <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>


                        <?php if(isset($sheet->status) && $sheet->status == 'checked'): ?>
                            <tr>
                                <td><b>Checked Status</b></td>
                                <td>
                                    <p>Checked By : <?php echo e((isset($sheet->checker->first_name)?$sheet->checker->first_name:'-').' '.(isset($sheet->checker->last_name)?$sheet->checker->last_name:'-')); ?> </p>
                                    <p>Checked On : <?php echo e((isset($sheet->checked_on)?date('d/m/Y h:i:s', strtotime($sheet->checked_on)):'--')); ?> </p>

                                </td>
                        </tr>
                        <?php endif; ?>

                        <?php if(isset($sheet->feedback) && !is_null($sheet->feedback)): ?>
                            <tr>
                                <td> <b>Feedback</b> </td>
                                <td>
                                    <?php
                                     print_r($sheet->feedback);
                                    ?>
                                </td>
                            </tr>
                        <?php endif; ?>


                        <tr>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-info"
                                    target="_new"
                                    href="<?php echo e(asset('public/'.env('STUDENT_SOLUTIONS_UPLOAD_PATH').$sheet->package_id.'/'.$sheet->student_id.'/'.$sheet->solution_file)); ?>">
                                    <i class="fa-solid fa-download"></i>
                                    Student Sheet
                                </a>

                                <a class="btn btn-success" href="<?php echo e(route('admin.upload.checked.sheet',[$sheet->id])); ?>">
                                    <i class="fa-solid fa-upload"></i>
                                    Upload Checked Sheet
                                </a>

                                <?php if(isset($sheet->checked_solution)): ?>
                                    <a class="btn btn-primary" target="_new" href="<?php echo e(asset('public/'.env('CHECKED_SOLUTIONS_UPLOAD_PATH').$sheet->package_id.'/'.$sheet->student_id.'/'.$sheet->checked_solution)); ?>">
                                        <i class="fa-solid fa-download"></i>
                                        View Checked Sheet
                                    </a>
                                <?php endif; ?>

                                <?php if(isset($sheet->status) && $sheet->status == 'uploaded'): ?>
                                    <?php echo Form::open([
                                        'method'=>'post',
                                        'url' => ['admin/student/sheet/reject', $sheet->id],
                                        'style' => 'display:inline'
                                    ]); ?>

                                    <?php echo Form::button('<i class="fa-solid fa-xmark"></i> Reject', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>"return confirm('Are you sure you want to reject this sheet ?')"]); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>

                            </td>
                        </tr>
                    </table>
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
        $(document).on('change','.checker_id',function(){
        let checker_id = $(this).val();
        let sheet_id = $(this).attr('data-sheet-id');
        if(checker_id){
            if(sheet_id){
                let cnf = confirm("are you sure you want to assign this sheet to checker");
                if(cnf){
                    assign_sheet(checker_id,sheet_id);
                    setTimeout(function() {
                        location.reload();
                    }, 4000);
                }
            }else{
                //sheet not found
            }
        }else{
            //please select checker id
        }
    });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/student_sheets/view_details.blade.php ENDPATH**/ ?>