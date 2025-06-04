<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'All Requests'); ?>
<?php $__env->startSection('page_name', 'all_requests'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Contact Us Requests</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <span class='btn btn-secondary btn125'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back </span>
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
                    <table class="table zero-configuration table-bordered" id="batch_table"
                        style="white-space: nowrap;">
                        <thead>
                            <tr role="row" style="height: 0px;">
                                <th class="text-center sorting_asc"> Sr. No </th>
                                <th>Student Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Attended Details</th>
                                <th class="text-center sorting_asc">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($contactus) && count($contactus) > 0): ?>
                                <?php $__currentLoopData = $contactus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text center"><?php echo e(($loop->index+1)); ?></td>
                                    <td><?php echo e((isset($contact->student_name)?$contact->student_name:'')); ?></td>
                                    <td><?php echo e((isset($contact->mobile_no)?$contact->mobile_no:'')); ?></td>
                                    <td><?php echo e((isset($contact->email)?$contact->email:'')); ?></td>
                                    <td><?php echo e((isset($contact->created_at)?date('d/m/Y',strtotime($contact->created_at)):'')); ?></td>
                                    <td>
                                        <?php if(isset($contact->status) && $contact->status == 'open'): ?>
                                            <span class="badge badge-pill bg-warning">Open</span>
                                        <?php elseif(isset($contact->status) && $contact->status == 'closed'): ?>
                                            <span class="badge badge-pill bg-success">Closed</span>
                                        <?php elseif(isset($contact->status) && $contact->status == 'rejected'): ?>
                                            <span class="badge badge-pill bg-danger">Rejected</span>
                                        <?php else: ?>
                                            <span class="badge badge-pill bg-secondary"><?php echo e($contact->status); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if(isset($contact->attended_by->first_name)): ?>
                                            Attended By : <?php echo e($contact->attended_by->first_name); ?> <?php echo e((isset($contact->attended_by->last_name)?$contact->attended_by->last_name:'--')); ?>

                                        <?php endif; ?>

                                        <?php if(isset($contact->reply_on)): ?>
                                            <br>Date : <?php echo e($contact->reply_on); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update contact us requests')): ?>
                                            <a href="<?php echo e(route('backend.contact-us.request.edit',[$contact->id])); ?>"><span class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil "></i></span></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete contact us requests')): ?>
                                        <?php echo Form::open([
                                            'method' => 'get',
                                            'url' => ['admin/contact-us/request/delete', $contact->id],
                                            'style' => 'display:inline',
                                            ]); ?>

                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'onclick' => "return confirm('Are you sure you want to Delete this Request ?')",
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/contact_us/index.blade.php ENDPATH**/ ?>