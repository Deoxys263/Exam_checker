<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Paper File'); ?>
<?php $__env->startSection('page_name', 'Edit Paper File'); ?>

<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                    <li class="breadcrumb-item active" aria-current="page">packages</li>
                    <li class="breadcrumb-item active" aria-current="page">Papers</li>
                    <li class="breadcrumb-item active" aria-current="page">create</li>
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
                  <span class="h4 p-2">Update Paper in <b><?php echo e((isset($paper_file->package->package_name)?$paper_file->package->package_name:'')); ?></b></span>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::model($paper_file,['route' => 'admin.packages.update.paper.file','files'=>'true'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Paper Name *')); ?>

                                        <?php echo e(Form::text('paper_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Paper Name'])); ?>

                                        <?php echo e(Form::hidden('file_id',null,['class'=>'form-control'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Subject *')); ?>

                                        <?php echo e(Form::select('subject_id', $subjects, null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Subject'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Type *')); ?>

                                        <?php echo e(Form::select('type', ['written'=>'Written','mcq'=>'MCQ'], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Type'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Marks *')); ?>

                                        <?php echo e(Form::number('marks',null,['class'=>'form-control','required'=>true,'placeholder'=>'Enter Your Marks'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-4 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Time *')); ?>

                                        <?php echo e(Form::number('time',null,['class'=>'form-control','required'=>true,'placeholder'=>'Enter Time of Exam'])); ?>

                                        <span class="info">Time should in minutes</span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Status *')); ?>

                                        <?php echo e(Form::select('status', [0=>'Inactive',1=>'Active'], null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Question Paper *')); ?>

                                        <?php echo e(Form::file('question_paper', ['class' => 'form-control',  'placeholder' => 'Select Question Paper'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Solution File *')); ?>

                                        <?php echo e(Form::file('solution', ['class' => 'form-control',  'placeholder' => 'Select Question Paper'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-12 p-2" >
                                    <span class="h4 w-100">Files</span>
                                    <br>
                                    <?php if(isset($paper_file->question_paper)): ?>
                                            <a class='h5 text-primary' href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$paper_file->question_paper)); ?>" target='_new'>Question Paper</a>
                                        <?php endif; ?>
                                        <?php if(isset($paper_file->solution)): ?>
                                        <br>
                                            <a class='h5 text-primary' href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$paper_file->solution)); ?>" target='_new'>Solution</a>
                                        <?php endif; ?>
                                </div>


                                <div class="col-md-12 col-12 mt-4 mb-2 text-center">
                                        <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/package/edit_file.blade.php ENDPATH**/ ?>