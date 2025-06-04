<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'HSC Test Series'); ?>
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
                    <p class='h3 home_page_h3'> <?php echo e((isset($package->package_name)?$package->package_name:'')); ?></p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>
                    <p>Maharashtra State Board (12th Science)</p>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="container pt-4 login_box bg-lavender text-dark ">
                            <div class="row justify-content-center pb-2">
                                <!-- Login Form -->
                                <div id="" class="">
                                    <img src="<?php echo e(asset('public/'.env('PACKAGE_IMAGE_PATH').$package->image)); ?>" alt="Image" class='rounded img-thumbnail img-responsive mx-1' style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 align-item-center home_slider_parent  text-dark ">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><?php echo e((isset($package->package_name)?$package->package_name:'')); ?></td>
                            </tr>
                            <tr>
                                <td>Checking availability</td>
                                <td>
                                    <?php if(isset($package->checking_availability)): ?>
                                        Yes
                                    <?php else: ?>
                                        No
                                    <?php endif; ?>
                                </td>
                            </tr>
                            
                            <?php if(isset($package->price)): ?>
                            <tr>
                                
                                <td>Price : </td>
                                <td>
                                    <span><?php echo e($package->price); ?></span>
                                    
                                    
                                    
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-sm-12 mx-2 text-center align-item-center">
                                <span class="btn btn-success">Buy Now</span>
                            </div>
                        </div>
                        <div class='package_desciption_box mt-3'>
                            <div class="spacer_parent">
                                <div class="spacer_line"></div>
                            </div>
                            <div class="col-md-12 text-center">
                               <span class="h4 home_page_h3">Description</span>
                            </div>
                            <?php if(isset($package->full_description)): ?>
                                <?php
                                    print_r($package->full_description);
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </section>

            <section class='hero_section bg-lavenders text-dark'>
                <div class="container mt-2" style='padding:0px !important'>
                    <div class="row justify-content-center">
                        <span class="h3 text-center">Practice exams are available for...</span>
                        <div class="col-md-3 col-sm-4 mb-4 ">
                            <div class="card text-center bg-lavender">
                                <span class="h4 pt-3 home_page_h3">
                                    Physics
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 mb-4 ">
                            <div class="card text-center bg-lavender">
                                <span class="h4 pt-3 home_page_h3">
                                    Chemistry
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 mb-4">
                            <div class="card text-center bg-lavender">
                                <span class="h4 pt-3 home_page_h3">
                                Biology
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 mb-4 ">
                            <div class="card text-center bg-lavender">
                                <span class="h4 pt-3 home_page_h3 ">
                                    Mathematics
                                </span>
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
<script>
    $(document).ready(function() {

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/home/view_package.blade.php ENDPATH**/ ?>