<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Subjects'); ?>
<?php $__env->startSection('page_name', 'Subjects'); ?>
<?php $__env->startSection('content'); ?>
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
                              </ol>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create subjects')): ?>
                                    <?php if(isset($batch->batch_id)): ?>
                                        <a href="<?php echo e(route('admin.subjects.create', [$batch->batch_id])); ?>">
                                            <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                                        </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                    <a href="<?php echo e(route('admin.batches')); ?>">
                                        <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container mt-2">
                    <div class="card">
                        <span class="h5 m-3"><?php echo e(isset($batch->batch_name) ? $batch->batch_name : ''); ?></span>
                        <div class="card-body">
                          <div class="table-responsive text-nowrap">
                            <table class="table zero-configuration table-bordered" id="subject_table"
                                                style="white-space: nowrap;">
                                                <thead>
                                                    <tr>
                                                        <th> Sr. No </th>

                                                        <th>
                                                            <div>Subject Name</div>
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($subjects) && count($subjects) > 0): ?>
                                                        <?php $srno = 1; ?>
                                                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo e($srno); ?></td>
                                                                <td>
                                                                    <?php if(isset($data->subject_name)): ?>
                                                                        <?php echo e($data->subject_name); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view chapter master')): ?>
                                                                    <a href="<?php echo e(route('admin.chapter.master',$data->subject_id)); ?>" class='btn btn-sm btn-success'>Chapters</a>
                                                                    <?php endif; ?>

                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update subjects')): ?>
                                                                        <a href="<?php echo e(url('admin/subjects/edit/' . $data->subject_id)); ?>"
                                                                            class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil"></i></a>
                                                                    <?php endif; ?>

                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete subjects')): ?>
                                                                        <?php echo Form::open([
                                                                            'method' => 'get',
                                                                            'url' => ['admin/subjects/delete', $data->subject_id],
                                                                            'style' => 'display:inline',
                                                                        ]); ?>

                                                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'onclick' => "return confirm('Are you sure you want to Delete this Subject ?')",
                                                                            ]); ?>

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
        $(document).ready(function() {
            $('#subject_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1]
                    },
                    title: function(){
                      var printTitle = 'Subjects';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1]
                    },
                    title: function(){
                      var printTitle = 'Subjects';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],
            });
        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/subjects/index.blade.php ENDPATH**/ ?>