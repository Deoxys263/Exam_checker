<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Package'); ?>
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.packages.master',[$batch_id])); ?>">Package</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="<?php echo e(route('admin.packages.master',[$batch_id])); ?>">
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
                  <span class="h4 p-2">Edit Package</span>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo e(Form::model($package,['route' => 'admin.packages.update','files'=>'true'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Package Name *')); ?>

                                        <?php echo e(Form::text('package_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Package Name'])); ?>

                                        <?php echo e(Form::hidden('package_id',null,['class'=>'form-control'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Price *')); ?>

                                        <?php echo e(Form::text('price', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Price'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Discounted Amount *')); ?>

                                        <?php echo e(Form::text('discounted_amount', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Discounted Amount'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Online Price *')); ?>

                                        <?php echo e(Form::text('online_price', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Online Price'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Image *')); ?>

                                        <?php echo e(Form::select('status',[1=>'Active',0=>'Not Active'],null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Select Status'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'is checking available *')); ?>

                                        <input type="checkbox" name="checking_availability" id="" value="1">
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'is online *')); ?>

                                        <input type="checkbox" name="is_online" id="" value="1" <?php if(isset($package->is_online) && $package->is_online == 1): ?> checked <?php endif; ?>>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'is offline *')); ?>

                                        <input type="checkbox" name="is_offline" id="" value="1" <?php if(isset($package->is_offline) && $package->is_offline == 1): ?> checked <?php endif; ?>>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'is hybrid *')); ?>

                                        <input type="checkbox" name="is_hybrid" id="" value="1" <?php if(isset($package->is_hybrid) && $package->is_hybrid == 1): ?> checked <?php endif; ?>>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Image *')); ?>

                                        <?php echo e(Form::file('image', ['class' => 'form-control', 'placeholder' => 'Select Image'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Short Description *')); ?>

                                       <?php echo e(Form::textarea('short_description', null, ['class'=>'form-control', 'rows'=>3, 'style'=>'resize:none'])); ?>

                                    </div>
                                </div>

                                <div class="col-md-11 col-12 mt-1 mb-2">
                                    <div class="form-group">
                                        <?php echo e(Form::label('batch_name', 'Full Description *')); ?>

                                       <?php echo e(Form::textarea('full_description', null, ['class'=>'form-control', 'rows'=>10, 'style'=>'resize:none','id'=>'full_description'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if(isset($package->image)): ?>
                                        <img src="<?php echo e(asset('public/'.env('PACKAGE_IMAGE_PATH').$package->image)); ?>" alt="" style='height:100px;width:100px'>
                                    <?php endif; ?>
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
        var full_description = document.getElementById('full_description');
        var full_description_box =  create_sc_editor(full_description);

    });
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/package/edit.blade.php ENDPATH**/ ?>