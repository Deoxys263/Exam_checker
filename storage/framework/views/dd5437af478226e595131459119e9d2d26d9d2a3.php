<?php $__env->startSection('title','Exam'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .question-list {
        height: 100vh;
        overflow-y: auto;
        background-color: #f8f9fa;
        border-right: 1px solid #dee2e6;
    }

    .question-box {
        padding: 20px;
        height: 100vh;
        overflow-y: auto;
    }

    .question-number {
        cursor: pointer;
        text-align: center;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        margin: 5px;
    }

    .question-number {
        cursor: pointer;
        text-align: center;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        margin: 5px;
        background-color: #d1ecf1;
    }

    .question-number.active {
        background-color: #9293f8 !important;
        color: white;
        font-weight: bold;
    }

    .question-number.solved {
        background-color: #67e840;
        color: white;
        font-weight: bold;
    }

    .mobile-question-numbers {
        display: none;
    }

    .questions_div{
        display:none;
    }
    .questions_div.active{
        display:block;
    }

    @media (max-width: 767.98px) {
        .desktop-question-numbers {
            display: none;
        }

        .mobile-question-numbers {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* margin-top: 20px; */
            margin-top: 100px !important;
            border: 1px solid gray;
            border-radius: 10px;
            background-color: #efefef;
            padding-top:20px;
        }

        .question-box {
            height: auto;
        }
    }

    .mcq-option {
        margin: 10px 0;
    }

    .mcq-option input[type="checkbox"],
    .mcq-option input[type="radio"] {
        display: none;
    }

    .mcq-option label {
        display: block;
        border: 2px solid #ccc;
        border-radius: 6px;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
        font-size: 16px;
    }

    .mcq-option input[type="checkbox"]:checked + label {
        background-color: #d4edda;
        border-color: #28a745;
        color: #155724;
    }

    .mcq-option input[type="radio"]:checked + label {
        background-color: #d1ecf1;
        border-color: #17a2b8;
        color: #0c5460;
    }

    .mcq-option label:hover {
        background-color: #f0f0f0;
    }
    .summary_div{
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-12 mx-2" style="border-radius: 5px;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand">
            <div class="logo-header">
                <img src="<?php echo e(asset('public/assets/img/logo/logo.png')); ?>" alt="Logo" style="width: 200px;">
            </div>
        </a>
        

        <div class="collapse navbar-collapse show" id="navbarSupportedContent">
            <div class="w-75">
                <p class="h4 text-center"><?php echo e((isset($exam_name)?$exam_name:'--')); ?></p>
                <p class="h6 text-center"><?php echo e((isset($subject_name)?$subject_name:'--')); ?></p>
            </div>
            <div class="d-flex ms-auto" style="position: relative;float: right;">
                <p class="online_exam_marks">Marks : <?php echo e((isset($marks)?$marks:0)); ?><br>Time Left <span class="btn btn-secondary btn-sm" id="timer">10:45</span></p>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Question Numbers (Desktop) -->
        <div class="col-md-3 question-list desktop-question-numbers">
            <div class="row">
                <?php if(isset($questions) && count($questions) > 0): ?>
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span id="number_label<?php echo e($question->question_id); ?>" class="question-number <?php echo e($loop->index==0?'active':''); ?>  question_sr_no<?php echo e($loop->index+1); ?>" onclick="loadQuestion(<?php echo e($loop->index +1); ?>)"><?php echo e($loop->index +1); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <hr>
                <p>No of Questions : <span class="sp_no_of_questions"><?php echo e(count($questions)); ?></span></p>
                <p>Solved Questions : <span class="sp_solved_questions"></span></p>
                <p>Remain Questions : <span class="sp_remain_questions"></span></p>
            </div>
        </div>

        <!-- Main Question Area -->
        <div class="col-12 col-md-9 question-box text-center">

            
            <input type="hidden" id='time' value=<?php echo e($time_left_sec); ?>>
            
            <?php if(isset($questions) && count($questions) > 0): ?>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="questions_div mb-5 <?php echo e($loop->index==0?'active':''); ?> question_no_<?php echo e($question->question_id); ?>" id="question<?php echo e($loop->index +1); ?>"
                    >
                        <span>
                            <?php
                                echo isset($question->question) ? strip_tags($question->question, '<p><img>') : '--';
                            ?>
                        </span>

                        <?php
                            $input_type = "radio";
                            if (isset($question->question_type->correct_options) && $question->question_type->correct_options > 1) {
                                $input_type = "checkbox";
                            }
                            $options = isset($question->options) ? $question->options : [];
                        ?>


                        
                        <?php echo e(Form::open(['route'=>'student.mcq.exam.store.exam.details','id'=>'student_exam_form'])); ?>

                        <?php echo e(Form::hidden('student_id',Session('exam_student_id'),[])); ?>

                        <?php echo e(Form::hidden('free_exam_id',Session('free_exam_id'),[])); ?>

                        <?php echo e(Form::hidden('subject_id',Session('subject_id'),[])); ?>

                        <?php echo e(Form::hidden('mcq_exam_id',Session('mcq_exam_id'),[])); ?> 
                        <?php echo e(Form::hidden('is_free_exam',Session('is_free_exam'),[])); ?>

                        <?php echo e(Form::hidden('no_of_questions',count($questions),[])); ?>


                        <?php echo e(Form::close()); ?>

                        

                        <div class="text-start mt-3" style="max-width: 600px; margin: 0 auto;">
                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mcq-option">
                                    <input type="<?php echo e($input_type); ?>"
                                        class="question_option"
                                        id="option<?php echo e($option->option_id); ?>"
                                           name="<?php echo e($input_type === 'radio' ? $question->question_id : $question->question_id . '[]'); ?>"
                                           value="<?php echo e($option->option_id); ?>"
                                           data-question_id="<?php echo e($question->question_id); ?>"
                                           <?php if(isset($solved_answers) && in_array($option->option_id , $solved_answers)): ?>
                                               checked
                                           <?php endif; ?>
                                           >
                                    <label for="option<?php echo e($option->option_id); ?>">
                                        <?php echo strip_tags($option->question_option, '<p><img>'); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="text-center mt-4">
                                <?php if($loop->index != 0): ?>
                                    <span class="btn btn-secondary" onclick="loadQuestion(<?php echo e($loop->index); ?>)">Back</span>
                                <?php endif; ?>

                                <?php if(($loop->index+1) != count($questions)): ?>
                                    <span class="btn btn-info" onclick="loadQuestion(<?php echo e($loop->index+2); ?>)">Next</span>
                                <?php endif; ?>
                                <span class="btn btn-warning btn_clear_selection" data-id="<?php echo e($loop->index+1); ?>" data-question_id="<?php echo e($question->question_id); ?>">Clear Seletion</span>

                                <?php if(($loop->index+1) == count($questions)): ?>
                                    <span class="btn btn-success" id="submit_exam_btn">Submit</span>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="mobile-question-numbers mt-4" id="questionNumbersMobile">
                <div class="row w-100 text-center summary_div">Summary</div>
                <?php if(isset($questions) && count($questions) > 0): ?>
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span id="foot_number_label<?php echo e($question->question_id); ?>"  class="question-number <?php echo e($loop->index==0?'active':''); ?>  question_sr_no<?php echo e($loop->index+1); ?>" onclick="loadQuestion(<?php echo e($loop->index +1); ?>)"><?php echo e($loop->index +1); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="container">
                    <hr>
                    <p>No of Questions : <span class="sp_no_of_questions"><?php echo e(count($questions)); ?></span></p>
                    <p>Solved Questions : <span class="sp_solved_questions"></span></p>
                    <p>Remain Questions : <span class="sp_remain_questions"></span></p>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){

        //initialize summary
        update_summary();

        //run timer for update
        runTime();
        //clear selection
        $('.btn_clear_selection').click(function(){
            let question_no = $(this).attr('data-id');
            let question_id = $(this).attr('data-question_id');
            $('#question' + question_no).find('.question_option').prop('checked', false);
            update_summary();

            storeQuestion(question_id);
            activate_label(question_id,0);
        });

        //update summary on change answer
        $('.question_option').change(function(){
            update_summary();
        });

        //store questions
        $('.question_option').change(function(){
            let question_id = $(this).attr('data-question_id');
            storeQuestion(question_id);
        });

        //submit exam
        $('#submit_exam_btn').click(function(){
            submit_exam_btn();
        });
    });  //end of document ready

    //once the page content loaded then update the details of left side numbers
    $(window).on('load', function() {
        $('.question_option:checked').each(function(index,value){
            let label_qid = $(value).attr('data-question_id');
            $('#number_label'+label_qid).addClass('solved');
            $('#foot_number_label'+label_qid).addClass('solved');
        });
    });

    //change question from number buttons
    function loadQuestion(num){
        //find current active div and hide the current  question
        //$(document).find('.questions_div').has('.active').removeClass('active');
        $(document).find('.questions_div.active').removeClass('active');
        //show required question
        $('#question'+num).addClass('active');

        //update the question number and summary
        update_number(num);

    }



   function update_number(num){
    //update the question number
    //remove the current active class
    $('.question-number').removeClass('active');

    //add the active class to new number
    $('.question_sr_no'+num).addClass('active');
   }

   //update the summary
   function update_summary(){
        let cnt =0;
        let remain = 0;
        let questions_count = "<?php echo e((isset($questions)?count($questions):0)); ?>";
        questions_count = parseInt(questions_count);
        $('.questions_div').each(function(index , value){
            let len = $(value).find('input[type="checkbox"]:checked, input[type="radio"]:checked').length;
            if(len > 0){
                cnt++;
            }
        });

        //update solved questions counter
        $('.sp_solved_questions').html(cnt);
        remain = questions_count-cnt;
        $('.sp_remain_questions').html(remain);

   }


   // Set the date we're counting
        var time = $('#time').val();
        var c = time;
        var t;
        timedCount();

        //exam time functionality
        function timedCount() {

            var hours = parseInt(c / 3600) % 24;
            var minutes = parseInt(c / 60) % 60;
            var seconds = c % 60;

            var result = '<span class="color_red" >' + (hours < 10 ? "0" + hours : hours) + '</span>' + ":" +
                '<span class="color_red" >' + (minutes < 10 ? "0" + minutes : minutes) + '</span>' + ":" +
                '<span class="color_red" >' + (seconds < 10 ? "0" + seconds : seconds) + '</span>';

            // alert(result);
            $('#timer').html(result);

            if (c == 0) {
                 $('#timer').remove();
                //display sweet alert for contine or not
                $.confirm({
                    // theme: 'supervan' // 'material', 'bootstrap'
                    title: 'Exam time has been Ended',
                    content: 'Exam time has been Ended',
                    buttons: {
                        Submit: function() {
                        },
                    }
                });

            }
            c = c - 1;
            t = setTimeout(function() {
                timedCount()
            }, 1000);
            // console.log(t);
        }

        //function randomlu call update timer function
        function runTime() {
            let tm = Math.round(Math.random() * 10000 + 5000);
            t = setTimeout(function() {
                //runTime()
                updateTime(tm);
            }, tm);
        }

        //function for send ajax call to update time
        function updateTime(tm) {
            let student_exam_id = "<?php echo e(session('mcq_exam_id')); ?>";
            //alert(student_exam_id);
            $.ajax({
                url: "<?php echo e(route('student.mcq.exam.update.left.timer')); ?>",
                type: 'post',
                data: {
                    'time': tm,
                    'mcq_exam_id': student_exam_id,
                    '_token': "<?php echo e(csrf_token()); ?>"
                },
                success: function(resp) {
                    //updateTime();
                    runTime();
                    console.log(resp);
                    if (resp == 0) {
                   //     alert('form submit');
                        //   $("#quiz_form").submit();
                    }
                }
            });
        }

        //function to save question response
        function storeQuestion(qid){
           let question_id = qid;
           //mcq exam id contains all details about paid or free exam
           let mcq_exam_id = "<?php echo e(session('mcq_exam_id')); ?>";
           let free_exam_id = "<?php echo e(session('free_exam_id')); ?>";
           let file_id = "<?php echo e(session('file_id')); ?>";
           let is_free = "<?php echo e(session('is_free_exam')); ?>";
           let student_id = "<?php echo e(session('exam_student_id')); ?>";
           let no_of_questions = "<?php echo e((isset($questions)?count($questions):1)); ?>"
           let answer_ids = [];
           $('.question_no_'+question_id).find('.question_option').each(function(){
                if($(this).is(':checked')){
                  answer_ids.push($(this).val());
                }
           });

           //if answer ids length is bigger than 0 means atlest one option is selected
            if(answer_ids.length > 0){
                activate_label(question_id,1);
            }else{
                activate_label(question_id,0);
            }


           if(mcq_exam_id){
            let token = "<?php echo e(csrf_token()); ?>"
                let form_data = {'_token':token,'mcq_exam_id':mcq_exam_id, 'question_id':question_id, answer_ids:answer_ids, 'free_exam_id':free_exam_id,'file_id':file_id,'is_free':is_free,'no_of_questions':no_of_questions};
                $.ajax({
                    url:"<?php echo e(route('student.mcq.exam.store.exam.response')); ?>",
                    data:form_data,
                    type:"post",
                    success:function(response){
                        console.log(response);
                    }
                });

           }
        //
        }

        function activate_label(qid,status){
            if(status == 1){
                $('#number_label'+qid).addClass('solved');
                $('#foot_number_label'+qid).addClass('solved');
            }else{
                $('#number_label'+qid).removeClass('solved');
                $('#foot_number_label'+qid).removeClass('solved');
            }
        }

        function submit_exam_btn(){
            swal({
                title: "Are you sure?",
                text: "do you want to submit this exam?",
                icon: "info",
                buttons: true,
                dangerMode: true,
                })
                .then((willSubmit) => {
                if (willSubmit) {
                    $('#student_exam_form').submit();
                }
                });
        }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.mcq_exam', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/mcq_exam/exam.blade.php ENDPATH**/ ?>