<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Payments'); ?>
<?php $__env->startSection('page_name', 'payments'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Payments</li>
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
                <?php
                    $start_date = null;
                    $end_date = null;

                    if(isset($_GET['from_date']) && $_GET['from_date'] != ""){
                        $start_date = $_GET['from_date'];
                    }

                    if(isset($_GET['to_date']) && $_GET['to_date'] != ""){
                        $end_date = $_GET['to_date'];
                    }
                ?>
                <?php echo e(Form::open(['method'=>'GET'])); ?>

                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                        <label for="">Start Date</label>
                        <?php echo e(Form::text('from_date',$start_date,['class'=>'datep form-control','placeholder'=>'Select Start Date'])); ?>

                    </div>
                    <div class="col-md-4">
                        <label for="">End Date</label>
                        <?php echo e(Form::text('to_date',$end_date,['class'=>'datep form-control','placeholder'=>'Select End Date'])); ?>

                    </div>
                    <div class="col-md-4">
                        <input type="submit" value="Get Data" class='btn btn-sm btn-primary mt-4'>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>

                <div class="table-responsive text-nowrap">
                    <table class="table zero-configuration table-bordered" id="batch_table"
                        style="white-space: nowrap;">
                        <thead>
                            <tr role="row" style="height: 0px;">
                                <th class="text-center sorting_asc"> Sr. No </th>
                                <th class="text-center sorting_asc" aria-controls="amount_table"
                                                    rowspan="1" colspan="1">
                                                    <div class="dataTables_sizing"
                                                        style=" overflow: hidden; text-color:white">Tracking Code</div>
                                </th>
                                <th>Student Name</th>
                                <th>Package Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center sorting_asc">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($payments) && count($payments) > 0): ?>
                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($loop->index + 1); ?></td>
                                        <td><?php echo e((isset($payment->tracking_id)?$payment->tracking_id:'--')); ?></td>
                                        <td><?php echo e((isset($payment->student_name)?$payment->student_name:'--')); ?></td>
                                        <td><?php echo e((isset($payment->missing_payment->missing_package->package->package_name)?$payment->missing_payment->missing_package->package->package_name:'--')); ?></td>
                                        <td><?php echo e((isset($payment->amount)?$payment->amount:'--')); ?></td>
                                        <td><?php echo e((isset($payment->status)?ucfirst($payment->status):'--')); ?></td>
                                        <td><?php echo e((isset($payment->payment_date)?date('d/m/Y h:i:s', strtotime($payment->payment_date)):'--')); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view payments history')): ?>
                                                <a href="<?php echo e(route('admin.payments.details.view',$payment->tracking_id)); ?>" class="btn btn-info btn-sm">View</a>
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
            $('.datep').datepicker({'dateFormat':"dd/mm/yy"});
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/payments/all_payments.blade.php ENDPATH**/ ?>