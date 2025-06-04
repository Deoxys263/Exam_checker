<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Payment Details'); ?>
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
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.payments.history')); ?>">All Payments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment Details</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="<?php echo e(route('admin.payments.history')); ?>">
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
                <span class="h3">Invoice Details</span>
                <hr>
                <div class="row g-2">
                    <div class="col-md-6">Status :
                        <?php if(isset($payment->status) && strtolower($payment->status == 'completed')): ?>
                            <span class="badge badge-pill bg-success"><?php echo e($payment->status); ?></span>
                        <?php else: ?>
                            <span class="badge badge-pill bg-warning"><?php echo e($payment->status); ?></span>
                        <?php endif; ?>
                        </div>
                    <div class="col-md-6">Date : <?php echo e((isset($payment->payment_date)?date('d/m/Y h:i:s a',strtotime($payment->payment_date)):'-')); ?> </div>

                    <div class="col-md-6">Transaction Id : <?php echo e((isset($payment->tracking_id)?$payment->tracking_id:'--')); ?></div>
                    <div class="col-md-6">Payment Method : --</div>

                    <div class="col-md-6">Invoice No : <?php echo e((isset($payment->invoice_number)?env('APP_SHORTNAME').$payment->invoice_number:'--')); ?></div>
                </div>

                <div class="row">
                    <div class="col-md-6">Student Name : <?php echo e((isset($payment->student_details->student_name)?$payment->student_details->student_name:'--')); ?>

                        <br>
                        Address : <?php echo e((isset($payment->student_details->address)?$payment->student_details->address:'--')); ?><br>
                        Mobile No : <?php echo e((isset($payment->student_details->mobile_no)?$payment->student_details->mobile_no:'--')); ?><br>
                        Email : <?php echo e((isset($payment->student_details->email)?$payment->student_details->email:'--')); ?> <br>
                    </div>
                </div>
                <div class="table-responsive">
                    <br><br><br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:75%">Batch Name</th>
                                <th style="width:25%">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e((isset($payment->missing_payment->missing_package->package->package_name)?$payment->missing_payment->missing_package->package->package_name:'--')); ?></td>
                                <td style="text-align:right"><?php echo e((isset($payment->amount)?$payment->amount:'')); ?></td>
                            </tr>
                            <tr class="d-none">
                                <td>Discount(-)</td>
                                <td></td>
                            </tr>

                            <tr class="d-none">
                                <td>Sub Total</td>
                                <td></td>
                            </tr>

                            <tr class="d-none">
                                <td >GST</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td style="text-align:right"><b>Total</b></td>
                                <td style="text-align:right"><b><?php echo e((isset($payment->amount)?$payment->amount:'')); ?></b></td>
                            </tr>
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

        });
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/payments/payment_details.blade.php ENDPATH**/ ?>