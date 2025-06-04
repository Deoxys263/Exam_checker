<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Batches'); ?>
<?php $__env->startSection('page_name', 'Batches'); ?>
<?php $__env->startSection('content'); ?>
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Batches
                        </div>
                    <div class="col-md-4 text-right">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create batch master')): ?>
                        <div class="btn-group text-end mt-2">
                            <a href="<?php echo e(route('admin.batches.create')); ?>">
                                <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                            </a>
                        </div>
                        <?php endif; ?>
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
                                                                style=" overflow: hidden; text-color:white">Batch Name</div>
                                                        </th>
                                                        <th>Status</th>
                                                        <th class="text-center sorting_asc">
                                                            Action
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($batches) && count($batches) > 0): ?>
                                                        <?php $srno = 1; ?>
                                                        <?php $__currentLoopData = $batches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo e($srno); ?></td>
                                                                <td>
                                                                    <?php if(isset($data->batch_name)): ?>
                                                                        <?php echo e($data->batch_name); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($data->status) && $data->status == 1): ?>
                                                                        <span class='text-success'>Active</span>
                                                                    <?php else: ?>
                                                                        <span class='text-secondary'>Not Active</span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view subjects')): ?>
                                                                        <a href="<?php echo e(url('/')); ?>/admin/subjects/<?php echo e($data->batch_id); ?>"  class="btn btn-info btn-sm m-1">
                                                                            <i class="fas fa-book"></i> Subjects
                                                                        </a>
                                                                    <?php endif; ?>

                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view subjects')): ?>
                                                                        <a href="<?php echo e(url('admin/batches/edit/' . $data->batch_id)); ?>"
                                                                            class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil "></i></a>
                                                                    <?php endif; ?>

                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete batch master')): ?>
                                                                        <?php echo Form::open([
                                                                            'method' => 'get',
                                                                            'url' => ['admin/batches/delete', $data->batch_id],
                                                                            'style' => 'display:inline',
                                                                            ]); ?>

                                                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'onclick' => "return confirm('Are you sure you want to Delete this Batch ?')",
                                                                            ]); ?>

                                                                        <?php echo Form::close(); ?>

                                                                    <?php endif; ?>

                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view packages')): ?>
                                                                            <a href="<?php echo e(route('admin.packages.master',[$data->batch_id])); ?>"><span class="btn btn-success btn-sm">Packages</span></a>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/batch/index.blade.php ENDPATH**/ ?>