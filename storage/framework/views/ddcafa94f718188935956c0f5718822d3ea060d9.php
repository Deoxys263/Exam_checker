<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Student Purchase Report'); ?>
<?php $__env->startSection('page_name', 'Student Purchase Report'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Purchase Report</li>
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
                    $selected_package_id = 0;
                    if(isset($_GET['package_id']) && $_GET['package_id'] != ""){
                        $selected_package_id = $_GET['package_id'];
                    }
                    $selected_batch_id = 0;
                    if(isset($_GET['batch_id']) && $_GET['batch_id'] != ""){
                        $selected_batch_id = $_GET['batch_id'];
                    }

                    $selected_student_id = null;
                    if(isset($_GET['student_id']) && $_GET['student_id'] != ''){
                        $selected_student_id = $_GET['student_id'];
                    }
                ?>
                <?php echo e(Form::open(['method'=>'GET'])); ?>

                <div class="row mt-2 mb-2">
                    <div class="col-md-3">
                        <label for="">Batches</label>
                        <?php echo e(Form::select('batch_id',$batches,$selected_batch_id,['class'=>'form-control','placeholder'=>'Select Batch' , 'id'=>'batch_id'])); ?>

                    </div>
                    <div class="col-md-3">
                        <label for="">Packages</label>
                        <?php echo e(Form::select('package_id',[],null,['class'=>'form-control','placeholder'=>'Select Package' , 'id'=>'package_id'])); ?>

                    </div>
                    <div class="col-md-3">
                        <label for="">Student</label>
                        <?php echo e(Form::select('student_id',$students, $selected_student_id,['class'=>'form-control','placeholder'=>'Select Student'])); ?>

                    </div>
                    <div class="col-md-3">
                        <label for="">Start Date</label>
                        <?php echo e(Form::text('from_date',$start_date,['class'=>'datep form-control','placeholder'=>'Select Start Date'])); ?>

                    </div>
                    <div class="col-md-3">
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
                                <th>Transaction ID</th>
                                <th>Student Name</th>
                                <th>Package Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($purchases) && count($purchases) > 0): ?>
                                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->index + 1); ?></td>
                                        <td><?php echo e($purchase->tracking_code); ?></td>
                                        <td><?php echo e((isset($purchase->transaction_id)?$purchase->transaction_id:'--')); ?></td>
                                        <td><?php echo e((isset($purchase->student->student_name)?$purchase->student->student_name:'--')); ?></td>
                                        <td><?php echo e((isset($purchase->product->package_name)?$purchase->product->package_name:'--')); ?></td>
                                        <td><?php echo e((isset($purchase->amount)?$purchase->amount:'--')); ?></td>
                                        <td><?php echo e((isset($purchase->status)?ucfirst($purchase->status):'--')); ?></td>
                                        <td><?php echo e((isset($purchase->created_at)?date('d/m/Y h:i:s', strtotime($purchase->created_at)):'--')); ?></td>

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

        //selected batch_id
        let batch_id = $('#batch_id').val();

        let selected_package_id = "<?php echo e($selected_package_id); ?>";
            loadPackages(batch_id,selected_package_id);

        $('#batch_id').change(function(){
            let batch_id = $('#batch_id').val();
            loadPackages(batch_id,selected_package_id);
        });


            $('#batch_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Purchases Report';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Purchases Report';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],

            });
        });

        function loadPackages(batch_id,package_id=0){
            if(batch_id != "" ){
                let token = "<?php echo e(csrf_token()); ?>";
                let form_data = {'_token':token, 'batch_id':batch_id};
                $.ajax({
                    url:"<?php echo e(route('ajax.get.packages.from.batch')); ?>",
                    data:form_data,
                    type:'post',
                    success:function(resp){
                        $('#package_id').html(resp);
                        if( package_id != 0){

                                $("#package_id option[value='"+package_id+"']").attr('selected',true);


                        }
                    }

                });
            }
            //
        }
    </script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/reports/student_purchases.blade.php ENDPATH**/ ?>