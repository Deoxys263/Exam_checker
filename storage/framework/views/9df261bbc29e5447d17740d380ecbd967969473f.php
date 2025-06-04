<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Backend Menu'); ?>
<?php $__env->startSection('page_name', 'Backend Menu'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Backend Menu</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.backendmenu.create')); ?>">
                            <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                        </a>
                    </div>
                </div>
                </div>
            </div>

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container mt-2">
                <div class="card">
                    
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id='menu_table'>
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($menu) && count($menu)): ?>
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($loop->index+1)); ?></td>
                                <td>  <?php echo e($data->menu_name); ?>  </td>
                                <td>
                                    <?php if(isset($data->visibility) && $data->visibility == 1): ?>
                                    Active
                                    <?php else: ?>
                                    Not Active
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(isset($data->has_submenu) && $data->has_submenu == 1): ?>
                                    <a href="<?php echo e(route('admin.backend.submenu.index',[$data->backendmenu_id])); ?>">
                                        <span class="btn btn-secondary">Submenu</span>
                                    </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(url('admin/backend/menu/edit/'.$data->backendmenu_id)); ?>" class="btn btn-primary"><i class="bx bx-pencil"></i></a>
                                    <?php echo Form::open([
                                        'method'=>'get',
                                        'url' => ['admin/backend/menu/delete', $data->backendmenu_id],
                                        'style' => 'display:inline'
                                        ]); ?>

                                            <?php echo Form::button('<i class="bx bx-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Delete this Entry ?')"]); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/menubar/index.blade.php ENDPATH**/ ?>