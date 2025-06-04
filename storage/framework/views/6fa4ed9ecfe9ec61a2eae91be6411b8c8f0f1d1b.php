<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit MCQ Question'); ?>
<?php $__env->startSection('page_name', 'Edit MCQ Question'); ?>
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
                                <?php echo e(Form::model($question, ['route' => 'admin.question.store.mcq', 'id' => 'mcq_form'])); ?>

                                <?php echo csrf_field(); ?>
                                <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Question Type *')); ?>

                                            <?php echo e(Form::select('question_type_id', $question_type, null, ['class' => 'form-control', 'placeholder' => 'Select Question Type', 'id' => 'question_type'])); ?>

                                            <?php echo e(form::hidden('question_id', null,['class'=>'form-control','id'=>'question_id'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Marks *')); ?>

                                            <?php echo e(Form::number('marks', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Marks', 'id' => 'marks'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                            <?php echo e(Form::select('status', [1 => 'Active', 0 => 'Hidden'], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status', 'id' => 'status'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::checkbox('from_textbook', 1, null, ['required' => true, 'id' => 'from_textbox'])); ?> From Textbox <br>
                                            <?php echo e(Form::checkbox('below_chapter', 1, null, ['required' => true, 'id' => 'below_chapter'])); ?> below Chapter
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <p>Options : <span id='no_of_options'></span></p>
                                        <?php echo e(Form::hidden('no_of_options_count', null, ['id' => 'no_of_options_count'])); ?>

                                        <p>Correct Options : <span id='no_of_correct_answers'></span></p>
                                        <?php echo e(Form::hidden('no_of_correct_answers_count', null, ['id' => 'no_of_correct_answers_count'])); ?>

                                    </div>
                                    <div class="col-md-12 col-12 mt-1 mb-2 question_box">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Question *')); ?>

                                            <textarea class="ckeditor form-control" id='ckeditor' name="question" rows=10 cols=10><?php echo e(isset($question->question) ? $question->question : ''); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12 mt-1 mb-2" id='all_options'>
                                        <?php if(isset($question->options) && count($question->options)): ?>
                                            <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $input_type = 'radio';
                                                    $unique_code = rand(99, 999999) . date('is');
                                                    if ($question_type_details->type_name == 'mcq') {
                                                        $input_type = 'radio';
                                                    } else {
                                                        $input_type = 'checkbox';
                                                    }
                                                ?>
                                                    <div class='col-md-12 d-flex option_div option_outer_div_<?php echo e($unique_code); ?>' >
                                                        <span class="btn btn-info btn-sm mx-2 edit_modal" style="padding: 5px !important;height: 25px;" id='<?php echo e($unique_code); ?>'>
                                                            <i class="fas fa-pencil"></i></span>

                                                        <span class="btn btn-danger btn-sm mx-2 delete_option_btn" style="padding: 0px !important;height: 25px;" data-id="<?php echo e($unique_code); ?>">
                                                            <i class="bx bx-trash"></i></span>
                                                            <div class="w-100 d-flex">
                                                                <div class='col-md-1'><input type="<?php echo e($input_type); ?>" name='option' class='option question_option checkbox<?php echo e($unique_code); ?>' id="<?php echo e($unique_code); ?>"
                                                                    <?php if(isset($option->is_answer) && $option->is_answer == 1): ?>
                                                                    checked
                                                                    <?php endif; ?>
                                                                    >
                                                                </div>
                                                                <div class='col-md-10 option_content content_<?php echo e($unique_code); ?>' data-id='<?php echo e($unique_code); ?>' data-option_id="<?php echo e($option->option_id); ?>">
                                                                    <?php print_r($option->question_option) ?>
                                                                </div>
                                                                <input type="hidden" class="option_input<?php echo e($unique_code); ?>" value="<?php echo e($option->option_id); ?>">
                                                            </div>
                                                        </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </div>

                                        <div class="col-md-12 col-12 mt-1 mb-2">
                                            <div class="form-group solution_box">
                                                <span class="btn btn-primary" id='btn_add_option'>Add Option</span>
                                                <?php echo e(Form::label('batch_name', 'Solution *')); ?>

                                                <textarea class="form-control" id='solution' name="solution" rows=10 cols=10></textarea>
                                            </div>
                                        </div>



                                        <div class="col-md-12 col-12 mt-1 mb-2" id='hint_box'>
                                            <div class="form-group">
                                                <?php echo e(Form::label('batch_name', 'Hint *')); ?>

                                                <textarea class=" form-control" id='hint' name="hint" rows=10 cols=10><?php echo e(isset($question->hint) ? $question->hint : ''); ?></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-12 text-center mt-1 mb-2">
                                            <span class="btn btn-success save_mcq_btn">Save and Continue</span>
                                            
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


            
            <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="editor_form_modal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="mySmallModalLabel">Edit question</h5>
                      <button type="button" class="close" onclick="close_modal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <label for="Edit Question"></label>
                     <textarea class="form-control" id='edit_option' name="edit_option" rows=10 cols=10></textarea>
                    </div>
                    <div class="modal-footer">
                        <span class="btn btn-primary save_current_changes_option">Save Changes</span>
                        <button type="button" onclick="close_modal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
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

                 let question_type = $('#question_type');
                 show_answer_form(question_type);

                 $('#question_type').change(function() {
                     var obj = $(this);
                     show_answer_form(obj);
                     remove_all_options();
                 });

                 //show modal on edit button click


                 //append options
                 $('#btn_add_option').click(function() {
                     let allowed_questions = $('#no_of_options_count').val();
                     let no_of_answers = $('#no_of_correct_answers_count').val();
                     let option_count = $('#all_options').find('.question_option').length;
                     if (option_count < allowed_questions) {
                         var sceditorContent = $(".solution_box").find('iframe').contents().find('html').html();
                         //console.log($(sceditorContent).find('p'));
                         console.log(sceditorContent);
                         let question_type = 'radio';
                         if (no_of_answers > 1) {
                             question_type = 'checkbox';
                         }
                         uniqueTimeString = Date.now().toString();
                         htm =
                             `<div class='col-md-12 d-flex option_div option_outer_div_${uniqueTimeString}'><div class='col-md-1'><input type="${question_type}" name='option' class='option question_option checkbox${uniqueTimeString}' id="${uniqueTimeString}"></div><div class='col-md-10 option_content content_${uniqueTimeString}' data-id='${uniqueTimeString}' data-option_id="0">${sceditorContent}</div></div>`;
                         $('#all_options').append(htm);
                     } else {
                         alert('maximum allowd questions are ' + allowed_questions);
                     }
                     //all_options
                 });

                 //save form data
                 $('.save_mcq_btn').click(function() {
                     store_form_data();
                 });

                 //delete option
                 $(document).on('click','.delete_option_btn',function(){
                    let id = $(this).attr('data-id');
                    remove_option(id);
                 });


                 //initialize quiz editor in
                 var question_box = document.getElementById('ckeditor');
                 var question_box_editor = create_sc_editor(question_box);

                 var solution_box = document.getElementById('solution');
                 var solution_box_editor = create_sc_editor(solution_box);

                 var hint_box = document.getElementById('hint');
                 var hint_box_editor = create_sc_editor(hint_box);

                 // var edit_box = document.getElementById('edit_option');
                 // var edit_box_editor = create_sc_editor(edit_box);

                 $('.edit_modal').click(function() {
                     let id = $(this).attr('id');
                     removeEditor($('#edit_option')[0]);
                     $('#edit_option').text($('.content_' + id).html());
                      var edit_box = document.getElementById('edit_option');
                      var edit_box_editor = create_sc_editor(edit_box);
                        $('.save_current_changes_option').attr('data-unique-id',id);
                     $('.bd-example-modal-lg').modal('show');
                 });

             });


             function removeEditor(element) {
                var editorInstance = sceditor.instance(element);
                if (editorInstance) {
                    editorInstance.destroy();
                    console.log('SCEditor instance removed for element:', element);
                }
            }

             //jqueryy validator
             $(document).ready(function() {
                 $('#descriptive_form').validate({
                     rules: {
                         question_type_id: {
                             required: true,
                         },
                         marks: {
                             required: true,
                             min: 1,
                         },
                         status: {
                             required: true,
                         },
                         from_textbook: {
                             required: false,
                         },
                         below_chapter: {
                             required: false,
                         },
                     },
                     messages: {
                         question_type_id: {
                             required: "Please Select Question Type",
                         },
                         marks: {
                             required: "Please Enter marks for question",
                             min: "minimum marks should be 1",
                         },
                         status: {
                             required: "Please Select Status",
                         },
                         from_textbook: {},
                         below_chapter: {
                             required: false,
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
                                 if (response == 1) {
                                     swal("Added!", "Question added successfully!", "success");
                                 } else {
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



             function show_answer_form(obj) {
                 var question_type = $(obj).val();
                 if (question_type != '') {
                     var token = "<?php echo e(csrf_token()); ?>";
                     var send_data = {
                         '_token': token,
                         'question_type_id': question_type
                     };
                     //send ajax for get full details of questions
                     $.ajax({
                         "url": "<?php echo e(url('ajax/questions/type/details')); ?>",
                         "type": "POST",
                         "data": send_data,
                         success: function(resp) {
                             console.log(resp);
                             var response = JSON.parse(resp);
                             console.log(response);
                             if (response.options) {
                                 $('#no_of_options').html(response.options);
                                 $('#no_of_options_count').val(response.options);

                             }

                             if (response.correct_options) {
                                 $('#no_of_correct_answers').html(response.correct_options);
                                 $('#no_of_correct_answers_count').val(response.correct_options);

                             }
                         }
                     });
                 }
             } //end of function

             function store_form_data() {
                 var question_sceditorContent = $(".question_box").find('iframe').contents().find('html').html();
                 let question = question_sceditorContent;

                 var hint_sceditorContent = $("#hint_box").find('iframe').contents().find('html').html();
                 let hint = hint_sceditorContent;

                 let question_type = $('#question_type').val();
                 let marks = $('#marks').val();
                 let status = $('#status').val();
                 let from_textbox = 0;
                 let from_chapter = 0;
                 let no_of_options = $('#no_of_options_count').val();
                 let no_of_answers = $('#no_of_correct_answers_count').val();
                 let topic_id = $('#topic_id').val();

                 let options_array = [];
                 let answer_array = [];

                 if ($('#from_textbox').is(':checked')) {
                     from_textbox = 1;
                 }

                 if ($('#below_chapter').is(':checked')) {
                     from_chapter = 1;
                 }

                 //find all questions
                 let all_options = $('.question_option');
                 let selected_ansers = [];
                 let opt_counter = 0;
                 let all_selections = $('#all_options').find('.option').each(function(key, value) {
                     if ($(value).is(':checked')) {
                         // selected_ansers.push($(value).attr('id'));
                         selected_ansers.push(opt_counter);
                     }
                     opt_counter++;
                 });

                 if (all_options < no_of_options) {
                     alert('please create ' + no_of_options + ' options');
                 }

                 //check selected answer
                 if (selected_ansers.length < no_of_answers) {
                     alert('please select only ' + no_of_answers + ' options');
                 }

                 let all_options_div = $('#all_options').find('.option_content');
                 $(all_options_div).each(function(key, value) {
                     let unique_id = $(value).attr('data-id');
                     let option_id =  $(value).attr('data-option_id');
                     // let content = $(value).find('.content_'+unique_id).html();
                     let content = $(value).html();
                     if(option_id != 0 && option_id != "0"){
                        console.log(option_id);
                        options_array[option_id]=content;
                     }else{
                        options_array[key]=content;
                     }
                    // options_array.push(content);
                 });

                 let token = "<?php echo e(csrf_token()); ?>";
                 let question_id = $('#question_id').val();
                 let data_array = {
                     '_token': token,
                     'question_id':question_id,
                     'question_type_id': question_type,
                     'topic_id': topic_id,
                     'marks': marks,
                     'status': status,
                     'from_textbox': from_textbox,
                     'below_chapter': from_chapter,
                     'no_of_options': no_of_options,
                     'no_of_answers': no_of_answers,
                     'question': question,
                     'options': options_array,
                     'answers': selected_ansers,
                     'hint': hint
                 };

                 $.ajax({
                     url: "<?php echo e(url('/')); ?>/admin/question/mcq/update",
                     type: "POST",
                     data: data_array,
                     success: function(resp) {
                        if(resp == 1){
                        swal("updated!", "Question update successfully!", "success");
                    }else{
                        swal("Failed!", "Failed to update Question!", "error");
                    }                     }
                 });
             }

             function close_modal(){
                $('.bd-example-modal-lg').modal('hide');
             }

             //update current option
             $('.save_current_changes_option').click(function(){
                let id = $(this).attr('data-unique-id');
                var sceditorContent = $("#editor_form_modal").find('iframe').contents().find('html').html();
                $('.content_'+id).html(sceditorContent);
                //close modal
                close_modal();

             });

             function remove_option(id){
                let conf=confirm('do you want to delete this option');
                if(conf){
                    $('.option_outer_div_'+id).remove();
                }
             }

             function remove_all_options(){
                $('#all_options').html('');
             }
         </script>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/questions/edit_mcq_question.blade.php ENDPATH**/ ?>