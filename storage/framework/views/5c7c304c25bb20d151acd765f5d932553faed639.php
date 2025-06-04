<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Create Free Exam'); ?>
<?php $__env->startSection('page_name', 'Create Free Exam'); ?>
<?php

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />

<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.free.exams')); ?>">Free Exams</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="<?php echo e(route('admin.batches')); ?>">
                        <span class='btn btn-secondary btn115'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
                    </a>
                </div>
            </div>
            </div>
        </div>
            
        <div class="container-xxl flex-grow-1 container mt-2">
          <!-- Layout Demo -->
          <div class="row">
            <div class="col-12">
                <div class="card p-2">
                  <span class="h4 p-2">Add New Free Exam</span>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::open(['route' => 'admin.free.exam.store','files'=>'true'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Batch Name *')); ?>

                                        <?php echo e(Form::select('batch_id', $batches, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Batch', 'id'=>'batch_id'])); ?>

                                    </div>
                                </div>


                                 
                                 <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Subject Name *')); ?>

                                        <?php echo e(Form::select('subject_id', [], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Subject','id'=>'subject_id'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Exam Name *')); ?>

                                        <?php echo e(Form::text('test_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Exam Name'])); ?>

                                    </div>
                                </div>

                                
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Type *')); ?>

                                        <?php echo e(Form::select('type',$question_type,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Question Type'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Expiry Date *')); ?>

                                        <?php echo e(Form::text('expiry_date', null, ['class' => 'form-control date', 'required' => true, 'placeholder' => 'Enter Negation'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Marks *')); ?>

                                        <?php echo e(Form::text('marks', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Marks'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'No of Questions *')); ?>

                                        <?php echo e(Form::text('no_of_questions', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter NO of Questions'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Negation *')); ?>

                                        <?php echo e(Form::text('negation', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Negation'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                        <?php echo e(Form::select('status',[1=>'Active',0=>'Not Active'],null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'No of Attempts *')); ?>

                                        <?php echo e(Form::text('no_of_attempts', null, ['class' => 'form-control ', 'required' => true, 'placeholder' => 'No of Attempts'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Time *')); ?>

                                        <?php echo e(Form::text('time', null, ['class' => 'form-control ', 'required' => true, 'placeholder' => 'No of Attempts'])); ?>

                                    </div>
                                </div>


                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Description *')); ?>

                                       <?php echo e(Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3, 'style'=>'resize:none','id'=>'description'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Instructions *')); ?>

                                       <?php echo e(Form::textarea('instructions', null, ['class'=>'form-control', 'rows'=>10, 'style'=>'resize:none','id'=>'instructions'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-12 col-12 mt-4 mb-2 text-center">
                                        <?php echo e(Form::submit('Save', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

                                        <button type="reset" class="btn btn-dark mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Layout Demo -->
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
</div>
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
    $(document).ready(function(){
        var full_description = document.getElementById('description');
        var full_description_box =  create_sc_editor(full_description);

        var instructions = document.getElementById('instructions');
        var instructions_box =  create_sc_editor(instructions);

        $('.date').datepicker({'dateFormat':'dd/mm/yy'});



        let batch_id = $('#batch_id').val();
        getSubjects(batch_id);

        $('#batch_id').change(function(){
            batch_id = $(this).val();
            getSubjects(batch_id);
        });

    });



    function getSubjects(batch_id)
    {
        if(batch_id != ''){
            let token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                'url' : "<?php echo e(route('ajax.get.subjects.from.batch_id')); ?>",
                'type' : 'POST',
                'data' : {'_token':token, 'id':batch_id},
                success:function(resp){
                    $('#subject_id').html(resp);
                }
            });
        }
    }
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/free_exams/create.blade.php ENDPATH**/ ?>