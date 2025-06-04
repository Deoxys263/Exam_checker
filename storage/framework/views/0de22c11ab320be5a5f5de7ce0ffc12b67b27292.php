<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Free Exam | Assign Questions'); ?>
<?php $__env->startSection('page_name', 'Edit Desciptive Question'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="<?php echo e(route('admin.free.exams.managequestions',[$free_exam_id])); ?>">
                        <span class='btn btn-info'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Manage Questions</span>
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
                        <?php echo e(Form::open(['route' => ['admin.free.exams.addquestions',$free_exam_id],'id'=>'assign_qurstions_form', 'method'=>'GET'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-4 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('format_name', 'Select Batch *')); ?>

                                        <?php echo e(Form::text('batch_name',(isset($exam->batch->batch_name)?$exam->batch->batch_name:''), ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Batch', 'id'=>'batch_id','readonly'=>true])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('marks', 'Subject *')); ?>

                                        <?php echo e(Form::text('subject_name', (isset($exam->subject->subject_name)?$exam->subject->subject_name:''), ['class' => 'form-control', 'required' => true, 'placeholder' => 'Subject Subject', 'id'=>'subject_id','readonly'=>true])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('marks', 'Chapters *')); ?>

                                        <?php echo e(Form::select('chapter_ids[]',$chapters,(isset($_GET['chapter_ids'])?$_GET['chapter_ids']:null),  ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Chapters','id'=>'chapter_id', 'multiple'=>true])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 text-center mt-1 mb-2">
                                    <input type="submit" value="Get Questions" class='btn btn-success'>
                                    <button type="reset" class="btn btn-dark mr-1 mb-1">Back</button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                        <div class="row">
                            <?php if(isset($questions) && count($questions) > 0): ?>
                                <div class="col-md-12">
                                    <span class="btn btn-info btn-outline-info btn-sm check_all">Check all</span>
                                    <span class="btn btn-warning btn-outline-warning btn-sm uncheck_all">Uncheck all</span>
                                    <span class="btn btn-success btn-outline-success btn-sm save_questions" >Save</span>
                                    <span class="btn btn-secondary btn-outline-secondary btn-sm go_to_down"><i class="menu-icon tf-icons bx bx-down-arrow-alt mx-0"></i></span>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:100px">Sr. No.</th>
                                            <th style="width:100px">status</th>
                                            <th>Question</th>
                                            <th>Chapter Name</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($questions) && count($questions) > 0): ?>
                                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->index+1); ?></td>
                                                    <td>
                                                        <input type="checkbox" class="question_checkbox" value="<?php echo e($question->question_id); ?>"
                                                            <?php if(isset($exam_questions) && in_array($question->question_id , $exam_questions)): ?>
                                                                checked
                                                            <?php endif; ?>
                                                        >
                                                    </td>
                                                    <td>
                                                        <?php print_r(isset($question->question)?strip_tags($question->question,'<p><img>'):'--') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e((isset($question->chapter->chapter_name)?$question->chapter->chapter_name:'--')); ?>

                                                    </td>
                                                    <td><?php echo e((isset($question->type)?$question->type:'')); ?></td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php if(isset($questions) && count($questions) > 0): ?>
                                <div class="col-md-12">
                                    <span class="btn btn-info btn-outline-info btn-sm check_all">Check all</span>
                                    <span class="btn btn-warning btn-outline-warning btn-sm uncheck_all">Uncheck all</span>
                                    <span class="btn btn-success btn-outline-success btn-sm save_questions" >Save</span>
                                    <span class="btn btn-secondary btn-outline-secondary btn-sm go_to_up"><i class="menu-icon tf-icons bx bx-up-arrow-alt mx-0"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
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
 <script>




    //jqueryy initialization
    $(document).ready(function(){



        //CHECK UNCHECK ALL QUESTIONS
        $('.check_all').click(function(){
            let status = 'checked';
            select_unselect_question_checkbox(status);
        });

        $('.uncheck_all').click(function(){
            let status = 'uncheck';
            select_unselect_question_checkbox(status);
        });

        // scroll to bottom
        $('.go_to_down').click(function(){
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 1000);
        });

        //scroll to top
        $('.go_to_up').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        });

        $('.save_questions').click(function(){
            let exam_id = "<?php echo e($free_exam_id); ?>";
            save_questions(exam_id);
        });


    });   //end of document ready



    // check uncheck checkbox
    function select_unselect_question_checkbox(status){
        //-uncheck
        if(status == 'checked'){
            $(document).find('.question_checkbox').attr('checked',true);
        }else{
            $(document).find('.question_checkbox').attr('checked',false);
        }
    }

    function save_questions(exam_id){
        let question_ids = [];
        $(document).find('.question_checkbox:checked').each(function(index,value){
            question_ids.push($(value).val());
        });

        if(question_ids.length > 0){
            let token = "<?php echo e(csrf_token()); ?>";
            let form_data = {'free_exam_id':exam_id,'questions':question_ids,'_token':token};
            $.ajax({
                'url':"<?php echo e(route('admin.free.exams.storequestions')); ?>",
                'type':'POST',
                'data':form_data,
                success:function(resp){
                    if(resp == true){
                        swal("Questions Saved!", "", "success");
                    }else{
                        swal("Failed to assign questions", "", "error");
                    }
                },
                error:function(resp){
                    swal("Failed to assign questions", "", "error");
                }
            });

        }else{
            swal("Warning", "Please Questions", "error");
        }

    }
</script>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/free_exams/assign_questions.blade.php ENDPATH**/ ?>