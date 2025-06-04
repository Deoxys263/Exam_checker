<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Create Student'); ?>
<?php $__env->startSection('page_name', 'Create Student'); ?>

<?php $__env->startSection('content'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">

            
            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.student.index')); ?>">Studets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.student.index')); ?>">
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
                            <?php echo e(Form::open(['route' => 'admin.student.store'])); ?>

                                    <?php echo csrf_field(); ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('first_name', 'Student Name *')); ?>

                                                    <?php echo e(Form::text('student_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Student Name', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('email', 'Email *')); ?>

                                                    <?php echo e(Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => true, 'pattern' => '[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}'])); ?>

                                                    
                                                    <?php echo e(Form::hidden('account_status', 1, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('last_name', 'Mobile No *')); ?>

                                                    <?php echo e(Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Mobile No', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('last_name', 'Address *')); ?>

                                                    <?php echo e(Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required' => true, 'rows'=>2])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('last_name', 'Pincode *')); ?>

                                                    <?php echo e(Form::text('pincode', null, ['class' => 'form-control', 'placeholder' => 'Pincode', 'required' => true])); ?>

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('password', 'Create Password *')); ?>

                                                    <input type='password' name='password' class='form-control'
                                                        placeholder='Create Your Password' required='true'>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('password', 'Confirm Password *')); ?>

                                                    <input type='password' name='confirm_password' class='form-control'
                                                        placeholder='Confirm your Password' required='true'>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-12 text-center mt-2">
                                            <?php echo e(Form::submit('Create', ['class' => 'btn btn-primary mr-1 mb-1'])); ?>

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/students/create.blade.php ENDPATH**/ ?>