<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Request'); ?>
<?php $__env->startSection('page_name', 'Edit Package'); ?>
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('all.contact-us.requests')); ?>">Contact us requests</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view contact us requests')): ?>
                        <a href="<?php echo e(route('all.contact-us.requests')); ?>">
                            <span class='btn btn-secondary btn115'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </div>
            
        <div class="container-xxl flex-grow-1 container mt-2">
          <!-- Layout Demo -->
          <div class="row">
            <div class="col-12">
                <div class="card p-2">
                  <span class="h4 p-2">Edit Contact-us Request</span>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::model($contactus,['route' => 'all.contact-us.request.update'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Student Name *')); ?>

                                        <?php echo e(Form::text('student_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Student Name','readonly'=>true])); ?>

                                        <?php echo e(Form::hidden('id',null,['class'=>'form-control'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Email *')); ?>

                                        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Email','readonly'=>true])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Mobile No *')); ?>

                                        <?php echo e(Form::text('mobile_no', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Mobile No','readonly'=>true])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Subject *')); ?>

                                        <?php echo e(Form::textarea('subject', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Subject','rows'=>2,'readonly'=>true])); ?>

                                    </div>
                                </div>


                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Message *')); ?>

                                        <?php echo e(Form::textarea('message', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Message','rows'=>2,'readonly'=>true])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Status')); ?>

                                        <?php echo e(Form::select('status', ['open'=>'open','closed'=>'closed','rejected'=>'rejected'], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Closed'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-12 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Reply *')); ?>

                                        <?php echo e(Form::textarea('reply', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Reply','rows'=>2])); ?>

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
    });
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/contact_us/edit.blade.php ENDPATH**/ ?>