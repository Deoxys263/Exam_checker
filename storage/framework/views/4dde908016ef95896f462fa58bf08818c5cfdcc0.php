<!-- beautify ignore:start -->

<?php $__env->startSection('title', 'HSC Test Series'); ?>
<?php $__env->startSection('page_name', 'HSC Test Series'); ?>
<?php
use App\Models\frontend\StudentActivity;
    $activity = array();
    if(auth()->check())
    {
        $activity = StudentActivity::where('student_id',Auth::user()->student_id)->take(5)->get();
    }

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
        <div class="row">
            <section class='hero_section'>
                <div class="col-12 text-center">
                    <p class='h3 home_page_h3'> 12<sup>th</sup>-Science Practice Exams(Maharashtra State Board)</p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                    </div>
                    <p></p>
                    <p>महाराष्ट्र राज्य मंडळाच्या बारावी सायन्सच्या विद्यार्थ्यांना अभ्यासात प्राविण्य मिळावे यासाठी सराव परीक्षा.</p>
                    <p>Comprehensive practice exams designed for Maharashtra State Board 12th Science students to excel in their studies.</p>
                </div>
            </section>
            <section>
                <div class="row">
                <div class="col-md-4 ">
                    <div class="container pt-4 login_box bg-lavender text-dark ">
                        <div class="row justify-content-center pb-2">
                            <?php if(Auth()->check()): ?>
                            <span class="h3 text-center home_page_h3">Activity</span>
                            <div class='student_activity_content'>
                                <?php if(isset($activity) && count( $activity) > 0): ?>
                                   <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <table>
                                       <tr style='margin-bottom:10px'>
                                           <td><span class='home_page_h3'><?php echo e(date('d/m/Y', strtotime($act->created_at))); ?></span></td>
                                           <td><span><?php echo e((isset($act->activity_string)?$act->activity_string:'')); ?></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                     </table>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <span class="activity-text">No Activity Found</span>
                                <?php endif; ?>
                            </div>
                            <?php else: ?>

                                <!-- Login Form -->
                                <div id="loginForm" class="">
                                    <h3 class="text-center p-1 login_h3">Login</h3>
                                    <?php echo $__env->make('frontend.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <form action="<?php echo e(route('student.login.action')); ?>" method="Post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group mt-2">
                                            <label for="loginEmail">Email address</label>
                                            <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Enter email">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="loginPassword">Password</label>
                                            <input type="password" class="form-control" name='password' id="loginPassword" placeholder="Password">
                                        </div>
                                        <div class="col-md-12 text-center mt-2">
                                            <button type="submit" class="btn btn-primary btn-block main_btn">Login</button>
                                        </div>
                                    </form>
                                    <p class="text-center mt-3">
                                        Don't have an account? <a href="<?php echo e(route('student.register')); ?>" id="showRegister">Register here</a>

                                        <br><br>
                                       <a href="" class='mt-2'> Forgot Password?</a><br>
                                       <a href="" class='mt-2'> Verify Your Email </a>
                                    </p>
                                </div>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>

                <div class="col-md-8 align-item-center home_slider_parent  text-dark ">
                    <div class="owl-carousel owl-theme home_page_image_slider">
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">

                        </div>
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">

                        </div>
                        <div class="item">
                            <img src="<?php echo e(asset('public/assets/img/static/woman-with-marker.jpg')); ?>" alt="">

                        </div>
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

            <section class=''>
                <div class="row bg-lavender g-3 text-dark how-solve-section ">
                    <p class='h3 home_page_h3 text-center'> How to solve </p>
                    <div class="spacer_parent">
                        <div class="spacer_line"></div>
                        <div class="container d-flex how_to_solve_container">
                            <div class="col-md-6 how_to_solve_image order-md-1">
                                <div class="home_image_box image-responsive text-center">
                                    <img src="<?php echo e(asset('public/assets/img/static/examsheet.jpg')); ?>" class=" image-thumbnail m-2" alt="" style="max-width:400px;max-height:400px">
                                </div>
                            </div>
                            <div class="col-md-6 how_to_solve_text order-md-2">

                                <span class="exam_modes pt-2">
                                    <li><b>Online Mode</b></li>
                                    <span class="w-100">Download Papers Online , solve on book or sheet and upload for checking (in pdf file)</span>
                                    <br>
                                    <br>
                                    <li><b>Offline Mode</b></li>
                                    <span class="w-100">Get papers from post, solve on book or sheet and send back for checking by post(return envelope included)</span>
                                    <br>
                                    <br>
                                    <li><b>Mixed Mode</b></li>
                                    <span class="w-100">Get papers from post, solve on book or sheet and upload for checking (in pdf file)</span>
                                    <br>
                                    <br>
                                    <li><b>MCQ Online exams</b></li>
                                    <span class="w-100">Online MCQ exams</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section  class='start_now'>
                <div class="row mt-2 g-3 text-dark">
                    <span class="h4 text-center">Start Now</span>
                    <div class="row p-0 justify-content-center">
                        <?php if(isset($packages) && count($packages) > 0): ?>
                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class='text-center'>
                                            <span class="h5"><?php echo e((isset($package->package_name)?$package->package_name:'')); ?></span><br>
                                            <span class="h6 main_text text-center">Maharashtra State Board</span>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?php echo e(asset('public/'.env('PACKAGE_IMAGE_PATH').$package->image)); ?>" alt="Image" class='rounded img-thumbnail img-responsive mx-1' style="width: 100%;">
                                        <div class='px-2 mb-3'>

                                                <p>
                                                    <table>
                                                        <?php if(isset($package->is_online)): ?>
                                                        
                                                        <?php endif; ?>
                                                        <?php if(isset($package->price)): ?>
                                                        <tr>
                                                            <td>Price : </td>
                                                            <td>
                                                               <?php if(isset($package->discounted_amount)): ?>
                                                                
                                                                <span><?php echo e($package->price); ?></span>
                                                                
                                                               <?php else: ?>
                                                               
                                                               <?php endif; ?>
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
                                            <div class="container text-center">
                                                <a href="<?php echo e(route('view.package.details',[$package->package_slug])); ?>"><span class="btn btn-info btn-sm">View More</span></a>
                                                <span class="btn btn-success btn-sm">Start Now</span>
                                                <?php if(isset($package->is_online)): ?>
                                                    <span class="btn btn-warning btn-sm">Buy Online</span>
                                                    <span class="btn btn-warning btn-sm">Buy Offline</span>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/home/index.blade.php ENDPATH**/ ?>