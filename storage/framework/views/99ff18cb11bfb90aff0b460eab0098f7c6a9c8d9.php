<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Create Chapter'); ?>
<?php $__env->startSection('page_name', 'Create Chapters'); ?>
<?php

?>
<?php $__env->startSection('content'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">

            
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
                        <a href="<?php echo e(route('admin.chapter.master',[(isset($subject_id)?$subject_id:null)])); ?>">
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
                      <h3 class='px-5'><?php echo e((isset($batches->batch_name)?$batches->batch_name:'')); ?>  <?php echo e((isset($subject->subject_name)?' - '.$subject->subject_name:'')); ?></h3>
                        <hr>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(Form::open(['url' => 'admin/chapter/store'])); ?>

                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <div class="row">

                                    
                                    <?php if(isset($subject_id) && !is_null($subject_id)): ?>
                                    <?php echo e(Form::hidden('batch_id',$batches->batch_id,['class'=>'form-control'])); ?>

                                    <?php echo e(Form::hidden('subject_id',$subject_id,['class'=>'form-control'])); ?>

                                    <?php else: ?>
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Batch Name *')); ?>

                                            <?php echo e(Form::select('batch_id', $batches, null, ['id'=>'batch_id','class' => 'form-control', 'required' => true, 'placeholder' => 'Select Batch'])); ?>

                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Subject Name *')); ?>

                                            <?php echo e(Form::select('subject_id', [], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Subject','id'=>'subject_id'])); ?>

                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Chapter Name *')); ?>

                                            <?php echo e(Form::text('chapter_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Chapter Name'])); ?>

                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Weightage ')); ?>

                                            <?php echo e(Form::text('weightage', null, ['class' => 'form-control',  'placeholder' => 'Enter Weightage'])); ?>

                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'IMP Level *')); ?>

                                            <?php echo e(Form::text('imp_level', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter IMP Level'])); ?>

                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                            <?php echo e(Form::select('status',[0=>'Hidden',1=>'Active'], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status'])); ?>

                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('batch_name', 'Chapter For *')); ?>

                                            <?php echo e(Form::select('use_for',$chapter_for, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Batch Name'])); ?>

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
<script>
    $(document).ready(function(){
        //load subjects when batch id chnages
        $('#batch_id').change(function(){
            var id = $(this).val();

            if(id != ''){
        var token = "<?php echo e(csrf_token()); ?>";
        $.ajax({
            'url' : "<?php echo e(route('ajax.get.subjects.from.batch_id')); ?>",
            'type' : 'POST',
            'data' : {'_token':token, 'id':id},
            success:function(resp){
                $('#subject_id').html(resp);
            }
        });
        }


    });
});


</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/chapters/create.blade.php ENDPATH**/ ?>