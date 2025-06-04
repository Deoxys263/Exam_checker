<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Chapters'); ?>
<?php $__env->startSection('page_name', 'Chapters'); ?>
<?php $__env->startSection('content'); ?>
   <!-- Content wrapper -->
   <div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Batches</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.batches')); ?>">Subjects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chapters</li>
                  </ol>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create chapter master')): ?>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.chapter.create', [(isset($subject->subject_id)?$subject->subject_id:null)])); ?>">
                            <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="card">
            <span class="h5 m-3"><?php echo e(isset($subject->subject_name) ? 'Subject Name : '.$subject->subject_name : ''); ?></span>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table zero-configuration table-bordered" id="subject_table"style="white-space: nowrap;">
                    <thead>
                        <tr>
                            <th>
                                Action
                            </th>
                            <th> Sr. No </th>
                            
                            <th>
                                <div>Sub Name</div>
                            </th>
                            <th>Chapter Name</th>
                            <th>Weightage</th>
                            <th>Imp Level</th>
                            <th>Status</th>
                            <th>Use For </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($chapters) && count($chapters) > 0): ?>
                            <?php $srno = 1;
                            ?>
                                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view topics')): ?>
                                            <a href="<?php echo e(url('admin/topics/master/' . $data->chapter_id)); ?>"
                                                class="btn btn-success btn-sm m-1"><i class="fas fa-pencil"></i>Topics</a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update chapter master')): ?>
                                                <a href="<?php echo e(url('admin/chapter/edit/' . $data->chapter_id.'/'.$subject_id)); ?>"
                                                        class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil"></i></a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete chapter master')): ?>
                                                <?php echo Form::open([
                                                    'method' => 'get',
                                                    'url' => ['admin/chapter/delete', $data->chapter_id],
                                                    'style' => 'display:inline',
                                                ]); ?>

                                                <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'onclick' => "return confirm('Are you sure you want to Delete this Chapter ?')",
                                                ]); ?>

                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><?php echo e($srno); ?></td>
                                        <td>
                                            <?php if(isset($data->batches->batch_name)): ?>
                                                <?php echo e($data->batches->batch_name); ?>

                                            <?php endif; ?>
                                        </td>
                                        
                                        <td> <?php echo e($data->chapter_name); ?> </td>
                                        <td><?php echo e($data->weightage); ?></td>
                                        <td><?php echo e($data->imp_level); ?></td>
                                        <td>
                                            <?php if($data->status == 1): ?>
                                                Active
                                            <?php else: ?>
                                                Not Active
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            
                                            <?php if(isset($data->used_for->chapter_for)): ?>
                                                <?php echo e($data->used_for->chapter_for); ?>

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
                        columns: [1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Chapters';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Chapters';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],
            });
        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/chapters/index.blade.php ENDPATH**/ ?>