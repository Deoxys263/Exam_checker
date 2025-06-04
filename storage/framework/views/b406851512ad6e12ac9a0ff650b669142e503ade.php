<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'HSC Test Series'); ?>
<?php $__env->startSection('page_name', 'HSC Test Series'); ?>
<?php
use App\Models\backend\packages;
$packages = Packages::where('status', 1)->orderBy('package_id', 'desc')->get();

?>
<?php $__env->startSection('content'); ?>
<style>
    .toggle-form {
        display: none;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    
    <div class="container m-0">
        <div class="row px-2">

        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container mt-2">
        <!-- Layout Demo -->
        <div class="row ">
            <section>
                <div class="row d-none">
                    <div class="col-md-4 ">
                        <div class="container pt-4 login_box bg-lavender text-dark ">
                            <div class="row justify-content-center pb-2">

                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section  class='start_now' id="products_page">
                <div class="row mt-2 g-3 text-dark">
                    <span class="h4 text-center">Start Now</span>
                    <div class="row p-0 ">
                        <?php if(isset($packages) && count($packages) > 0): ?>
                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="col-12 col-sm-6 col-lg-3 col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class='text-center'>
                                                <span class="h5"><?php echo e((isset($package->package_name)?$package->package_name:'')); ?></span><br>
                                                <span class="h6 main_text text-center">Maharashtra State Board</span>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="col-md-12 image-box-listing p-0">
                                                <img src="<?php echo e(asset('public/'.env('PACKAGE_IMAGE_PATH').$package->image)); ?>" alt="Image" class='rounded img-thumbnail img-responsive mx-1' style="width: 100%;">
                                            </div>
                                            <div class='px-2 mb-3'>
                                                <p>
                                                    <table>
                                                        
                                                        <?php if(isset($package->price)): ?>
                                                            <tr>
                                                                <td>Price : </td>
                                                                <td>
                                                                    <span><?php echo e($package->price); ?></span>
                                                                    
                                                                
                                                                
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        </table>
                                                    </p>
                                                <p>
                                                    <?php if(isset($package->checking_availability)): ?>
                                                        Papers Checking Available
                                                        <?php else: ?>
                                                        Papers Checking Not Available
                                                    <?php endif; ?>
                                                </p>
                                                <p>
                                                    <?php if(isset($package->short_description)): ?>
                                                        <hr>
                                                            <?php echo e($package->short_description); ?>

                                                        <hr>
                                                    <?php endif; ?>
                                                </p>
                                                <div class="container text-center button_section">
                                                    <a href="<?php echo e(route('view.package.details',[$package->package_slug])); ?>"><span class="btn btn-info btn-sm mt-1">View More</span></a>
                                                    
                                                    <a href="<?php echo e(route('student.addtocart', [$package->package_id])); ?>" class="btn btn-warning btn-sm mt-1">Buy Now</a>
                                                    <?php if(isset($package->is_online)): ?>
                                                        <span class="btn btn-warning btn-sm mt-1 d-none">Buy Offline</span>
                                                    <?php endif; ?>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                        

                        

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/products/index.blade.php ENDPATH**/ ?>