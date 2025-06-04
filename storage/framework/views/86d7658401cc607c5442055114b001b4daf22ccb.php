<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Students'); ?>
<?php $__env->startSection('page_name', 'Students'); ?>
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
                            <li class="breadcrumb-item active" aria-current="page">Students</li>
                          </ol>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create external users')): ?>
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                <a href="<?php echo e(route('admin.student.create')); ?>">
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
                        <div class="row d-flex">
                            <?php echo e(Form::open(['route'=>'admin.student.index','method'=>'get'])); ?>

                            <div class="col-md-6">
                                <?php echo e(Form::select('filter',['all'=>'all','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027'],null,['class'=>'form-control'])); ?>

                            </div>
                            <div class="col-md-6 p-1"><input type="submit" class="btn btn-success" value="Get Records"></div>
                            <?php echo e(Form::close()); ?>

                        </div>
                      <div class="table-responsive text-nowrap">
                        <table class="table zero-configuration" id="tbl-datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Sr. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Registered on</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($students) && count($students) > 0): ?>
                                    <?php $srno = 1; ?>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($srno); ?></td>
                                            <td><?php echo e((isset($student->student_name)?$student->student_name:'')); ?></td>
                                            <td><?php echo e($student->email); ?></td>
                                            <td><?php echo e((isset($student->mobile_no)?$student->mobile_no:'')); ?></td>
                                            <td>
                                                <?php echo e(date('d/m/Y', strtotime($student->created_at))); ?>

                                            </td>
                                            <td>
                                                <?php if(isset($student->status) && $student->status == 1): ?>
                                                    Active
                                                    <?php else: ?>
                                                    Not Active
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update external users')): ?>
                                                    <a href="<?php echo e(url('admin/student/edit/' . $student->student_id)); ?>"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i>
                                                    </a>
                                                <?php endif; ?>


                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete external users')): ?>
                                                    <?php echo Form::open([
                                                        'method'=>'get',
                                                        'url' => ['admin/student/delete', $student->student_id],
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/students/index.blade.php ENDPATH**/ ?>