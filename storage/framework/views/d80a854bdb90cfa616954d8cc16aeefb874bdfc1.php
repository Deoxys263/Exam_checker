<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Free Exams'); ?>
<?php $__env->startSection('page_name', 'free_exams'); ?>
<?php $__env->startSection('content'); ?>
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Free Exams</li>
                            </ol>
                        </div>
                        <div class="col-md-4 text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create free exams')): ?>
                                <div class="btn-group text-end mt-2">
                                    <a href="<?php echo e(route('admin.free.exam.create')); ?>">
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
                                                        <th>Exam Name</th>
                                                        <th>Batch Name</th>
                                                        <th>Subject Name</th>
                                                        <th>Marks</th>
                                                        <th>Time</th>
                                                        <th>Expiry Date</th>
                                                        <th>Status</th>
                                                        <th class="text-center sorting_asc">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(isset($exams) && count($exams) > 0): ?>
                                                        <?php $srno = 1; ?>
                                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                            <tr>
                                                                <td class="text-center"><?php echo e($srno); ?></td>
                                                                <td>
                                                                    <?php if(isset($data->test_name)): ?>
                                                                        <?php echo e($data->test_name); ?>

                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if(isset($data->batch->batch_name)): ?>
                                                                        <?php echo e($data->batch->batch_name); ?>

                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if(isset($data->subject->subject_name)): ?>
                                                                        <?php echo e($data->subject->subject_name); ?>

                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if(isset($data->marks)): ?>
                                                                        <?php echo e($data->marks); ?>

                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if(isset($data->time)): ?>
                                                                        <?php echo e($data->time); ?>

                                                                    <?php endif; ?>
                                                                </td>

                                                                <td>
                                                                    <?php if(isset($data->expiry_date)): ?>
                                                                        <?php echo e(date('d/m/Y', strtotime($data->expiry_date))); ?>

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


                                                                    <a href="<?php echo e(route('admin.free.exams.managequestions',[$data->id])); ?>" class="btn btn-primary btn-sm">Add Questions</a>
                                                                    <a href="<?php echo e(route('admin.free.exam.edit',[$data->id])); ?>" class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i></a>




                                                                        <?php echo Form::open([
                                                                            'method' => 'get',
                                                                            'url' => ['admin/free/exams/delete', $data->id],
                                                                            'style' => 'display:inline',
                                                                            ]); ?>

                                                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'onclick' => "return confirm('Are you sure you want to Delete this Exam ?')",
                                                                            ]); ?>

                                                                        <?php echo Form::close(); ?>


                                                                    

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/free_exams/free_exam_index.blade.php ENDPATH**/ ?>