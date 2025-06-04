<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Package Master'); ?>
<?php $__env->startSection('page_name', 'products'); ?>
<?php $__env->startSection('content'); ?>
<style>
    li{
        list-style: none;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Packages</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create packages')): ?>
                        <a href="<?php echo e(route('admin.packages.create',[$batch_id])); ?>">
                            <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                        </a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view batch master')): ?>
                        <a href="<?php echo e(route('admin.batches')); ?>">
                            <span class='btn btn-secondary btn125'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table zero-configuration table-bordered" id="batch_table"
                        style="white-space: nowrap;">
                        <thead>
                            <tr role="row" style="height: 0px;">
                                <th class="text-center sorting_asc"> Sr. No </th>
                                <th class="text-center sorting_asc" aria-controls="amount_table"
                                                    rowspan="1" colspan="1">
                                                    <div class="dataTables_sizing"
                                                        style=" overflow: hidden; text-color:white">Package Name</div>
                                </th>
                                <th>Price</th>
                                <th>Disc Amt</th>
                                <th>Status</th>
                                <th>Checking</th>
                                <th>Type</th>
                                <th class="text-center sorting_asc">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($packages) && count($packages) > 0): ?>
                                <?php $srno = 1; ?>
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text center"><?php echo e(($loop->index+1)); ?></td>
                                    <td><?php echo e((isset($package->package_name)?$package->package_name:'')); ?></td>
                                    <td><?php echo e((isset($package->price)?$package->price:'')); ?></td>
                                    <td><?php echo e((isset($package->discounted_amount)?$package->discounted_amount:'')); ?></td>
                                    <td>
                                        <?php if(isset($package->status) && $package->status == 1): ?>
                                            <span class="badge rounded-pill bg-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge rounded-pill bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if(isset($package->checking_availability) && $package->checking_availability == 1): ?>
                                            available
                                            <?php else: ?>
                                            <span class="text-danger">NA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if(isset($package->is_online) && $package->is_online == 1): ?>
                                        <li>Online</li>
                                        <?php endif; ?>
                                        <?php if(isset($package->is_offline) && $package->is_offline == 1): ?>
                                            <li>is Offline</li>
                                        <?php endif; ?>
                                        <?php if(isset($package->is_hybrid) && $package->is_hybrid == 1): ?>
                                            <li>Hybrid</li>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view paper files')): ?>
                                            <a href="<?php echo e(route('admin.packages.addpapers',[$package->package_id])); ?>"><span class="btn btn-success btn-sm m-1"><i class="fas fa-plus"></i></span></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update packages')): ?>
                                            <a href="<?php echo e(route('admin.packages.edit',[$package->package_id])); ?>"><span class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil "></i></span></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete packages')): ?>
                                        <?php echo Form::open([
                                            'method' => 'get',
                                            'url' => ['admin/products/delete', $package->package_id],
                                            'style' => 'display:inline',
                                            ]); ?>

                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'onclick' => "return confirm('Are you sure you want to Delete this Package ?')",
                                            ]); ?>

                                        <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
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
        $(document).ready(function() {
            $('#batch_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2]
                    },
                    title: function(){
                      var printTitle = 'Batches';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2]
                    },
                    title: function(){
                      var printTitle = 'Batches';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],

            });
        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/package/index.blade.php ENDPATH**/ ?>