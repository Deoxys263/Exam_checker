<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Edit Internal Users'); ?>
<?php $__env->startSection('page_name', 'Edit Internal Users'); ?>
<?php
    use App\Models\backend\ActionPermission;
    use App\Models\backend\BackendMenu;
    use App\Models\backend\BackendSubMenu;
    use Spatie\Permission\Models\Permission;
?>
<?php $__env->startSection('content'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">

            
            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users')); ?>">Internal Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.users')); ?>">
                            <span class='btn btn-secondary'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
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
                            <?php echo e(Form::model($user,['url' => 'admin/user/update'])); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <?php echo e(Form::label('fullname', 'First Name *')); ?>

                                                    <?php echo e(Form::hidden('id', NULL, ['class' => 'form-control'])); ?>

                                                    <?php echo e(Form::text('first_name', NULL, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <?php echo e(Form::label('fullname', 'Last Name *')); ?>

                                                    <?php echo e(Form::text('last_name', NULL, ['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <?php echo e(Form::label('email', 'Email *')); ?>

                                                    <?php echo e(Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => true,'pattern'=>"[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}"])); ?>


                                                </div>
                                            </div>

                                            

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    <?php echo e(Form::label('role_id', 'Role *')); ?>

                                                    <?php echo e(Form::select('role',$role,NULL,['class'=>'form-control', 'id'=>'role_id', 'placeholder'=>'Select status', 'required'=>true])); ?>

                                                </div>
                                            </div>

                                            <div class="col md-12 center">
                                                <br>
                                                <center>
                                                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

                                                    <button type="reset" class="btn btn-secondary mr-1 mb-1">Reset</button>
                                                </center>
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

        <div class="container-xxl flex-grow-1 container mt-2">
            <!-- Layout Demo -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(Form::open(['url' => 'admin/user/status'])); ?>

                                <?php echo csrf_field(); ?>
                                <div class="form-body">
                                    <div class="col-12">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <?php echo e(Form::label('fullname', 'Status *')); ?>

                                                <?php echo e(Form::hidden('id', $user->id, ['class' => 'form-control'])); ?>

                                                <?php echo Form::select('status',['0'=>'Inactive', '1'=> 'Active'] , $user->status, ['class' => 'form-control']); ?>

                                            </div>

                                            <div class="col-md-6 col-12 pt-2">
                                                <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
        </div>

        <div class="container-xxl flex-grow-1 container mt-2">
            <!-- Layout Demo -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <?php echo $__env->make('backend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(Form::open(['route' => 'admin.user.setpassword'])); ?>

                                <?php echo csrf_field(); ?>
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-2 mt-2">
                                            <div class="form-group">
                                                <?php echo e(Form::label('first_name', 'New Passwors *')); ?>

                                                <?php echo e(Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'required' => true])); ?>

                                                <?php echo e(Form::hidden('id', $user->id, ['class' => 'form-control'])); ?>

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 mb-2 mt-2">
                                            <div class="form-group">
                                                <?php echo e(Form::label('first_name', 'Confirm Password *')); ?>

                                                <?php echo e(Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'required' => true])); ?>

                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center col-12 pt-2">
                                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

                                            
                                        </div>
                                    </div>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/internal_users/edit.blade.php ENDPATH**/ ?>