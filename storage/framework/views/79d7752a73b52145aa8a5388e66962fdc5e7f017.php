<?php
use \Illuminate\Support\Str;
?>
<?php $__env->startSection('title','Batches'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row" id="purchased_batches">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-md-12 col-sm-6">
                            <div class="card-body">
                                <span class="h3 home_page_h3">My Tests</span>
                                <a href="<?php echo e(route('student.dashboard')); ?>">
                                    <span class="btn btn-outline-info right-btn">
                                        Back
                                    </span>
                                </a>

                                <hr>
                                <div class="row p-2">
                                    <?php if(isset($purchased_products) && count($purchased_products) > 0 ): ?>
                                         <?php $__currentLoopData = $purchased_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6 col-lg-4 ">
                                                <div class="card mb-3 batches_cards">
                                                    <div class="card-body">
                                                        <p class="card-text"><b><?php echo e((isset($package->product->package_name)?STR::limit($package->product->package_name,25):'---')); ?></b></p>

                                                        <?php if(isset($package->product->batches->batch_name)): ?>

                                                        <p>Batch - <?php echo e($package->product->batches->batch_name); ?> </p>
                                                        <?php endif; ?>
                                                        <a href="<?php echo e(route('student.purchased.list.papers',[$package->product_id,$package->cart_id])); ?>" class="btn btn-sm btn-outline-primary">Start Solving</a>

                                                        <span class="text-danger" id="expiry_date_span">Validity : <?php echo e((isset($package->expiry_date)?date('d/m/Y', strtotime($package->expiry_date)):'')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/orders/batches.blade.php ENDPATH**/ ?>