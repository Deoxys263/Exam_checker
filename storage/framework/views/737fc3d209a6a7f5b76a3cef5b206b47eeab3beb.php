<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Internal Users'); ?>
<?php $__env->startSection('page_name', 'Internal Users'); ?>
<?php
use Spatie\Permission\Models\Role;
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
                            <li class="breadcrumb-item active" aria-current="page">Intenal Users</li>
                          </ol>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create internal users')): ?>
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                <a href="<?php echo e(route('admin.create')); ?>">
                                    <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container mt-2">
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table zero-configuration" id="tbl-datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Sr. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($adminusers) && count($adminusers) > 0): ?>
                                    <?php $srno = 1; ?>
                                    <?php $__currentLoopData = $adminusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($srno); ?></td>
                                            <td><?php echo e((isset($users->first_name)?$users->first_name:'').' '.(isset($users->last_name)?$users->last_name:'')); ?></td>
                                            <td><?php echo e($users->email); ?></td>
                                            <td><?php echo e((isset($users->mobile_no)?$users->mobile_no:'')); ?></td>
                                            <td>
                                                <?php echo e((isset($users->admin_role->name)?$users->admin_role->name:'')); ?>

                                            </td>
                                            <td>
                                                <?php if(isset($users->status) && $users->status == 1): ?>
                                                    Active
                                                    <?php else: ?>
                                                    Not Active
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update internal users')): ?>
                                                    <a href="<?php echo e(url('admin/user/edit/' . $users->id)); ?>"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i>
                                                    </a>
                                                <?php endif; ?>


                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete internal users')): ?>
                                                <?php echo Form::open([
                                                    'method'=>'get',
                                                    'url' => ['admin/user/delete', $users->id],
                                                    'style' => 'display:inline'
                                                    ]); ?>

                                                <?php echo Form::button('<i class="bx bx-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Are you sure you want to Delete this User ?')"]); ?>

                                                <?php echo Form::close(); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                        <?php $srno++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        $('#menu_table').DataTable();
    });
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/internal_users/index.blade.php ENDPATH**/ ?>