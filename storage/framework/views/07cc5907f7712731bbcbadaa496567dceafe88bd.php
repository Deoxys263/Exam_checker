<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Quick Question Papers'); ?>
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

                        <?php echo e(Form::open(['route' => 'admin.quick.questionpapers.generate','id'=>'quick_question_form'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">

                                
                                <div class="col-md-4 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('format_name', 'Select Batch *')); ?>

                                        <?php echo e(Form::select('batch_id',$batches, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Batch', 'id'=>'batch_id'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('marks', 'Subject *')); ?>

                                        <?php echo e(Form::select('subject_id', [],null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Subject Subject', 'id'=>'subject_id'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('marks', 'Chapters *')); ?>

                                        <?php echo e(Form::select('chapter_ids[]',[], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Chapters','id'=>'chapter_id', 'multiple'=>true])); ?>

                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('marks', 'Marks *')); ?>

                                        <?php echo e(Form::select('marks', [40=>'40 Marks'],null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'marks'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 text-center mt-1 mb-2">
                                    <input type="submit" value="Generate" class='btn btn-success'>
                                    <button type="reset" class="btn btn-dark mr-1 mb-1">Back</button>
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
 <script>




//jqueryy validator
$(document).ready(function(){
    $('#batch_id').change(function(){
        getSubjects();
    });

    $('#subject_id').change(function(){
        getChapters();
    });
});

function getSubjects(){
    let batch_id = $('#batch_id').val();
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

    function getChapters(){
        let subject_id = $('#subject_id').val();
        if(subject_id != ''){
            let token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
            'url' : "<?php echo e(route('ajax.get.chapters.from.subject_id')); ?>",
            'type' : 'POST',
            'data' : {'_token':token, 'id':subject_id},
            success:function(resp){
                $('#chapter_id').html(resp);
            }
        });
        }
    }
</script>

   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/question_papers/quick_question_paper_index.blade.php ENDPATH**/ ?>