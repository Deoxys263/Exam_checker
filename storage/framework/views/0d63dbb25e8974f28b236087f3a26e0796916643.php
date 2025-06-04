<?php

?>
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-info">Welcome <b><?php echo e(Auth::user()->student_name); ?></b></h5>
                                <p class="mb-4">
                                    <li style='list-style:none'>Mobile No :  <span class='text-info'><?php echo e(Auth::user()->mobile_no); ?></span></li>
                                    <li style='list-style:none'>Email ID: <span class='text-info'> <?php echo e(Auth::user()->email); ?></span></li>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?php echo e(asset('public/assets/img/illustrations/man-with-laptop-light.png')); ?>"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Batches Orderd-->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Batches Purchased</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        2
                    </div>
                </div>
            </div>
            <!--/ Batches Orderd -->

            
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Solved Papers</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        2
                    </div>
                </div>
            </div>
            

            
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Papers Under checking</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        2
                    </div>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Papers Under checking</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        2
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/dashboard/dashboard.blade.php ENDPATH**/ ?>