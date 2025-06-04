<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Add Papers'); ?>
<?php $__env->startSection('page_name', 'Add Papers'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page">Papers</li>

                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create paper files')): ?>
                        <a href="<?php echo e(route('admin.packages.addpaper.file',[$package_id])); ?>">
                            <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Add Paper</span>
                        </a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view packages')): ?>
                        <a href="<?php echo e(route('admin.packages.master',[$batch_id])); ?>">
                            <span class='btn btn-secondary btn125'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
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
                                <th class="text-center sorting_asc" >Paper Name</th>
                                <th>Subject</th>
                                <th>Type</th>
                                <th>Marks</th>
                                <th>Time</th>
                                <th>Files</th>
                                <th class="text-center sorting_asc">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($papers) && count($papers) > 0): ?>
                                <?php $srno = 1; ?>
                                <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="sort_row" data-index="<?php echo e($paper->file_id); ?>">
                                    <td class="text center"><?php echo e(($loop->index+1)); ?></td>
                                    <td><?php echo e((isset($paper->paper_name)?$paper->paper_name:'--')); ?></td>
                                    <td><?php echo e((isset($paper->subject->subject_name)?$paper->subject->subject_name:'--')); ?></td>
                                    <td><?php echo e((isset($paper->type)?$paper->type:'--')); ?></td>
                                    <td><?php echo e((isset($paper->marks)?$paper->marks:'--')); ?></td>
                                    <td><?php echo e((isset($paper->time)?$paper->time:'--')); ?></td>
                                    <td>
                                        <?php if(isset($paper->question_paper)): ?>
                                            <a href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$paper->question_paper)); ?>" target='_new'>Question Paper</a>
                                        <?php endif; ?>
                                        <?php if(isset($paper->solution)): ?>
                                        <br>
                                            <a href="<?php echo e(asset('public/'.env('PACKAGE_PAPERS_PATH').$paper->solution)); ?>" target='_new'>Solution</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update paper files')): ?>
                                        <a href="<?php echo e(route('admin.packages.edit.paper.file',[$paper->file_id])); ?>"><span class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil "></i></span></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete paper files')): ?>
                                        <?php echo Form::open([
                                            'method' => 'get',
                                            'url' => ['admin/products/addpapers/deleteFile', $paper->file_id],
                                            'style' => 'display:inline',
                                            ]); ?>

                                            <?php echo Form::button('<i class="bx bx-trash"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'onclick' => "return confirm('Are you sure you want to Delete this File ?')",
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
<!-- jQuery and jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<!-- DataTables JS -->
<!-- DataTables Buttons JS -->

    <script>
        $(document).ready(function() {
    // Initialize DataTables with export buttons
    var table = $('#batch_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="fas fa-print"></i> Print',
                extend: 'print',
                exportOptions: { columns: [0, 1, 2,4,5,6] },
                title: 'Papers',
                className: 'btn pb-0 pt-0 px-1 text-white font-weight-bold',
            },
            {
                text: '<i class="far fa-file-excel"></i> Excel',
                extend: 'excel',
                exportOptions: { columns: [0, 1, 2,3,4,5,6] },
                title: 'Papers',
                className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
            }
        ]
    });

    // Make tbody sortable using jQuery UI
    $('#batch_table tbody').sortable({
        update: function(event, ui) {
            update_sort_order();
          console.log('update');
        }
    }).disableSelection(); // Prevent text selection during dragging
});

function update_sort_order(){
    let sort_array = [];
    $('.sort_row').each(function(index,val){
        let file_id = $(val).attr('data-index');
        sort_array[index+1] = file_id;
    });
    if(sort_array.length > 0){
        let token = "<?php echo e(csrf_token()); ?>";
        let data_array = {'_token':token,'file_data':sort_array};
        $.ajax({
            "url":"<?php echo e(route('admin.packages.addpaper.sortid')); ?>",
            "type":"POST",
            data:data_array,
            success:function(resp){
                if(resp){
                    swal("Updated!", "Paper Order has been changed", "success");
                }else{
                    swal("Failed!", "Failed to update paper order", "error");
                }
            }
        });
    }
}
</script>
   <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/package/papers.blade.php ENDPATH**/ ?>