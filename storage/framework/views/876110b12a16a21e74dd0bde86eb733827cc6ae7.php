<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Topic'); ?>
<?php $__env->startSection('page_name', 'Edit Topic'); ?>
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
                            <?php echo e(Form::model($topic,['route' => 'admin.topics.update'])); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mt-1 mb-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('batch_name', 'Topic Name *')); ?>

                                                    <?php echo e(Form::text('topic_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Topic Name'])); ?>

                                                    <?php echo e(Form::hidden('chapter_id', $topic->chapter_id, ['class' => 'form-control', 'required' => true])); ?>

                                                    <?php echo e(Form::hidden('topic_id', $topic->topic_id, ['class' => 'form-control', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mt-1 mb-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                                    <?php echo e(Form::select('status',[1=>'Active',0=>'Hidden'] ,null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12 text-center mt-1 mb-2">
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


    });


</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/topics/edit.blade.php ENDPATH**/ ?>