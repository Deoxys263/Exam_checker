<?php

?>
<?php $__env->startSection('title','Contact Requests'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3">Contact us Requests</span>
                                <div class="col-md-12 text-end mb-2 mt-1">
                                    <a href="<?php echo e(route('student.reach-us')); ?>" class="btn btn-primary">New Request</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Date.</th>
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($contact_requests) && count($contact_requests) > 0 ): ?>
                                                <?php $__currentLoopData = $contact_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->index+1); ?></td>
                                                        <td><?php echo e(date('d/m/Y', strtotime($data->created_at))); ?></td>
                                                        <td><?php echo e((isset($data->subject)?$data->subject:'--')); ?></td>
                                                        <td>
                                                            <?php if(isset($data->status)): ?>
                                                                <?php if($data->status == 'open'): ?>
                                                                    <span class="badge badge-pill bg-warning">Open</span>
                                                                    <?php elseif($data->status == 'closed'): ?>
                                                                    <span class="badge badge-pill bg-success">Closed</span>
                                                                    <?php else: ?>
                                                                    <span class="badge badge-pill bg-danger">Rejected</span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <span class="btn btn-sm btn-success view_details_btn" data-id="<?php echo e($data->id); ?>">View</span>
                                                            <?php if($data->status == 'open'): ?>
                                                                <a  href="<?php echo e(route('student.reach-us.delete',$data->id)); ?>" onlick="return confirm('are you sure you want to delete this request')" class="btn btn-sm btn-danger">Delete</a>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="subject_of_req">View Details</span></h5>
                    <button type="button" class="close btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-3 pt-1">
                    <table class="w-100">
                        <tr>
                            <td class="text-left">
                                <p class="text-left date_of_req"></p>
                            </td>
                            <td class="text-right">
                                <p class="text-right status_of_req"></p>
                            </td>
                        </tr>
                    </table>
                    <hr>
                   <p ><b>Message </b>:</p>
                   <p id="request-content"></p>
                   <p class='reply d-none'>
                    <hr>
                   </p>
                   <p class="reply_para d-none"></p>
                   <table class="w-100">
                    <tr>
                        <td class="text-left">
                            <p class="text-left reply_by d-none"></p>
                        </td>
                        <td class="text-right">
                            <p class="text-right reply_date d-none"></p>
                        </td>
                    </tr>
                </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        $('.view_details_btn').click(function(){
             let id = $(this).attr('data-id');//load.reach.us.req
             let token = "<?php echo e(csrf_token()); ?>";
             let data_array = {'_token':token, 'id':id};
             console.log(data_array);
             $.ajax({
                url : "<?php echo e(route('load.reach.us.req')); ?>",
                type : "POST",
                data : data_array,
                success:function(resp){
                    let object = JSON.parse(resp);
                    if(object == 0){

                    }else{
                        if(object.subject){
                            console.log(object.subject);
                            $('#subject_of_req').html(object.subject);
                        }

                        if(object.message){
                            $('#request-content').html(object.message);
                        }
                        if(object.created_at){
                            $('.date_of_req').html(`<b>Date</b> : `+created_at_DDMMYYY(object.created_at));
                        }

                        if(object.status){
                            if(object.status == 'open'){
                                $('.status_of_req').html(`<b>Status</b> : <span class="badge badge-pill bg-warning">Open</span>`);
                            }else if(object.status == 'closed'){
                                $('.status_of_req').html(`<b>Status</b> : <span class="badge badge-pill bg-success">Closed</span>`);
                            }else{
                                $('.status_of_req').html(`<b>Status</b> : <span class="badge badge-pill bg-danger">${object.status }</span>`);
                            }
                        }

                        if(object.reply){
                            $('.reply_para').removeClass('d-none').html('<b>Reply </b>: '+object.reply);
                        }
                        if(object.attended_by.first_name){
                            $('.reply_by').removeClass('d-none').html(`<b>Replied By</b> : ${object.attended_by.first_name} ${object.attended_by.last_name}`);
                        }
                        if(object.reply_on){
                            $('.reply_date').removeClass('d-none').html('<b>Replied on</b> :'+object.reply_on);
                        }

                    }
                }
             });
            $('#detailsModal').modal('show');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/dashboard/contact_us_index.blade.php ENDPATH**/ ?>