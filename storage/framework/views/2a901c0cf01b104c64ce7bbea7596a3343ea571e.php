<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'Payment Confirmation'); ?>
<?php $__env->startSection('page_name', 'HSC Test Series'); ?>

<?php $__env->startSection('content'); ?>
<style>

</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">

        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row">
            <section class='hero_section'>
                <div class="col-12 text-center">
                    <p class='h3 home_page_h3'> <?php echo e((isset($cart->package->package_name)?$cart->package->package_name:'')); ?></p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>
                    <p>Maharashtra State Board (12th Science)</p>
                </div>
            </section>
            <section>
                <div class="row">
                    
                        <div class="container pt-4  bg-lavender text-dark ">
                            <div class="row justify-content-center pb-2">
                                <div class="col-md-2 col-sm-3" id="confirmation_page_image">
                                    <img src="<?php echo e(asset('public/'.env('PACKAGE_IMAGE_PATH').$cart->package->image)); ?>" alt="Image" class='rounded img-thumbnail img-responsive mx-1' >
                                </div>
                                <div class="col-md-10 col-sm-8" id="">
                                    <p class="h5">
                                        Name : <?php echo e((isset($cart->package->package_name)?$cart->package->package_name:'')); ?>

                                    </p>
                                    <span>
                                       Price: <?php echo e((isset($cart->package->price)?$cart->package->price:'0')); ?>

                                    </span>
                                    <hr>
                                    <a href="<?php echo e(route('initiate.payment')); ?>"><span class="btn btn-success">Pay Now</span></a>
                                </div>

                            </div>
                        </div>
                    

                </div>
            </section>
        </div>
        <!--/ Layout Demo -->
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      
      <!-- Overlay -->
      

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>
$(document).ready(function() {
}); //end of document.ready
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/cart/confirmation.blade.php ENDPATH**/ ?>