<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Create Question'); ?>
<?php $__env->startSection('page_name', 'Create Question'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
    
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="<?php echo e(route('admin.batches')); ?>">
                        <span class='btn btn-info'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Batches</span>
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
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::open(['route' => 'admin.question.store.descriptive','id'=>'descriptive_form'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                        <?php echo e(Form::select('question_type_id',$question_type ,null, ['class' => 'form-control', 'placeholder' => 'Select Question Type','id'=>'question_type'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Marks *')); ?>

                                        <?php echo e(Form::number('marks' ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Marks' ,'id'=>'marks'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                        <?php echo e(Form::select('status',[1=>'Active',0=>'Hidden'] ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status','id'=>'status'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::checkbox('from_textbook',1 ,null, [ 'required' => true, 'placeholder' => 'Select Status'])); ?> From Textbox <br>
                                        <?php echo e(Form::checkbox('below_chapter',1 ,null, [ 'required' => true, 'placeholder' => 'Select Status'])); ?> below Chapter
                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Question *')); ?>

                                        <?php echo e(Form::hidden('topic_id', $topic_id, ['class' => 'form-control', 'required' => true])); ?>

                                        <textarea class="ckeditor form-control" id='ckeditor' name="question" rows=10 cols=10></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Solution *')); ?>

                                        <?php echo e(Form::hidden('topic_id', $topic_id, ['class' => 'form-control', 'required' => true])); ?>

                                        <textarea class="form-control" id='solution' name="solution" rows=10 cols=10></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Hint *')); ?>

                                        <textarea class=" form-control" id='hint' name="hint" rows=10 cols=10></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12 col-12 text-center mt-1 mb-2">
                                    <span class="btn btn-success">Save and Continue</span>
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
<link rel="stylesheet" href="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/themes/default.min.css" id="theme-style" />

		<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/sceditor.min.js"></script>
		<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/icons/monocons.js"></script>
		<script src="<?php echo e(asset('/')); ?>public/assets/vendor/libs/sceditor-3.2.0/minified/formats/bbcode.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
 <script>

$(document).ready(function() {
    //initialize quiz editor in
    var question_box = document.getElementById('ckeditor');
    var question_box_editor =  create_sc_editor(question_box);

    var solution_box = document.getElementById('solution');
    var solution_box_editor =  create_sc_editor(solution_box);

    var hint_box = document.getElementById('hint');
    var hint_box_editor =  create_sc_editor(hint_box);
});




//jqueryy validator
$(document).ready(function(){
  $('#descriptive_form').validate({
    rules: {
        question_type_id: {
        required: true,
      },
      marks:{
        required:true,
        min:1,
      },
      status:{
        required:true,
      },
      from_textbook:{
        required:false,
      },
      below_chapter:{
        required:false,
      },
    },
    messages: {
        question_type_id: {
        required: "Please Select Question Type",
      },
      marks:{
        required:"Please Enter marks for question",
        min:"minimum marks should be 1",
      },
      status:{
        required:"Please Select Status",
      },
      from_textbook:{
      },
      below_chapter:{
        required:false,
      },
    },
    errorElement: 'div',
    submitHandler: function(form) {
            // Serialize the form data
            var formData = $(form).serialize();
console.log(formData);
         //   Send an AJAX request to the server
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('admin.question.store.descriptive')); ?>",
                data: formData,
                success: function(response) {
                    // Display the response from the server
                    if(response == 1){
                        swal("Added!", "Question added successfully!", "success");
                    }else{
                        swal("Failed!", "Failed to add Question!", "error");
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }
  });
});
</script>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/questions/create_descriptive.blade.php ENDPATH**/ ?>