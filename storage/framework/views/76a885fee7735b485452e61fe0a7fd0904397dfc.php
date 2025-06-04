<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Backend Menu'); ?>
<?php $__env->startSection('page_name', 'Edit Backend Menu '); ?>
<?php
    use App\Models\backend\ActionPermission;
    $all_permission = ActionPermission::all();
?>
<?php $__env->startSection('content'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">

            
            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.backendmenu.index')); ?>">Backend Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.backendmenu.index')); ?>">
                            <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
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
                    <span class="h5">Create Backend Menu</span>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(Form::model($submenu,['url'=>'admin/backend/submenu/update'])); ?>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name','Menu Name*')); ?>

                                            <?php echo e(Form::text('menu_name',null, ['class'=>'form-control', 'placeholder'=>'Enter Menu Name'])); ?>

                                            <?php echo e(Form::hidden('sub_menu_id',null, ['class'=>'form-control', 'placeholder'=>'Enter Menu Name'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('route_name','Route Name*')); ?>

                                            <?php echo e(Form::text('route_name',null, ['class'=>'form-control', 'placeholder'=>'Enter route Name'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Icon','Icon *')); ?>

                                            <?php echo e(Form::text('icon',null, ['class'=>'form-control', 'placeholder'=>'Enter route Name'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Icon','Visibility *')); ?><br>
                                            <?php echo e(Form::radio('visibility', 1, null, [])); ?>

                                            <?php echo e(Form::label('Icon','Show')); ?> <br>
                                            <?php echo e(Form::radio('visibility', 0, null, [])); ?>

                                            <?php echo e(Form::label('Icon','hide')); ?>

                                        </div>
                                    </div>

                                    <?php
                                        //dd($submenu->permission_ids);
                                        $permission_id_array = (isset($submenu->permission_ids)?explode(',',$submenu->permission_ids):null);
                                    ?>
                                    <div class="col-md-8 col-12 mb-2 mt-2 ">
                                        <?php echo e(Form::label('Icon','Permissions *')); ?><br>
                                        <?php if((isset($all_permission) && count($all_permission) > 0)): ?>
                                            <?php $__currentLoopData = $all_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="checkbox" name='permission[]' class='permission_checkbox' value="<?php echo e($value->action_permission_id); ?>" id=""
                                                    <?php if(isset($permission_id_array)): ?>
                                                        <?php if(in_array(  $value->action_permission_id, $permission_id_array)): ?>
                                                            checked
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                >
                                                 <span style='margin-right:10px'><?php echo e($value->action_permission_name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 col-12 text-center">
                                        <input type="submit" value="Update" class='btn btn-primary'>
                                        <input type="reset" value="Reset" class='btn btn-warning'>
                                    </div>
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


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/submenu/edit.blade.php ENDPATH**/ ?>