<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'QP Format'); ?>
<?php $__env->startSection('page_name', 'qp_format'); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('admin.view.student.sheets')); ?>">Student Uploaded Sheets</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(route('admin.view.student.sheet.details',[$id])); ?>">View Details</a> View Details</li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Sheet</li>
                </ol>
            </div>
        <div class="col-md-4 text-right">
            <div class="btn-group text-end mt-2">
                <a href="<?php echo e(route('admin.view.student.sheets')); ?>">
                    <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                </a>
            </div>
        </div>
    </div>
</div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card p-2">
                  <span class="h4 p-2">Upload Checked Sheet</span>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::open(['route' => 'admin.store.checked.sheet','files'=>'true'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Student Name *')); ?>

                                        <?php echo e(Form::text('student_name', (isset($sheet->student->student_name)?$sheet->student->student_name:'--'), ['class' => 'form-control', 'placeholder' => 'Enter Student Name','disabled'=>true])); ?>

                                        <?php echo e(Form::hidden('id',$id,['class'=>'form-control'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Paper Name *')); ?>

                                        <?php echo e(Form::text('paper_name', (isset($sheet->filename->paper_name)?$sheet->filename->paper_name:'--') , ['class' => 'form-control', 'placeholder' => 'Enter Paper Name','disabled'=>true])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Subject Name *')); ?>

                                        <?php echo e(Form::text('subject_name', (isset($sheet->filename->subject->subject_name)?$sheet->filename->subject->subject_name:'--') , ['class' => 'form-control',  'placeholder' => 'Enter Subject Name','disabled'=>true])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Marks *')); ?>

                                        <?php echo e(Form::text('max_mark', $max_marks , ['class' => 'form-control',  'placeholder' => 'Marks','disabled'=>true])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Score *')); ?>

                                        <?php echo e(Form::text('score', null,  ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Score', 'max'=>$max_marks, 'min'=>0])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Checked Sheet *')); ?>

                                        <?php echo e(Form::file('solution',  ['class' => 'form-control', 'required' => true, 'placeholder' => 'Upload Checked Pdf Sheet'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Feedback')); ?>

                                        <?php echo e(Form::textarea('feedback', null,  ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Feedback', 'id'=>'feedback'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2 text-center">
                                    <input type="submit" class="btn btn-success" value="Upload">
                                </div>


                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

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
<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/sceditor.min.js"></script>
		<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/icons/monocons.js"></script>
		<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/formats/bbcode.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
<script>
    $(document).ready(function() {
        var full_description = document.getElementById('feedback');
        var full_description_box =  create_sc_editor(full_description);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/student_sheets/upload_checked_sheet.blade.php ENDPATH**/ ?>