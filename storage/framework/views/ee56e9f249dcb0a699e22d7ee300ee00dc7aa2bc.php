<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title',env('APP_NAME')); ?></title>
    <?php echo $__env->make('backend.includes.login_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    
    <!--  Main wrapper -->
    <div class="">
        <!--  Header Start -->
        

      <!--  Header End -->
        <div class="body-wrapper-inner d-flex justify-content-center">
        <div class="container-fluid mx-auto pt-5 mt-5" style="max-width: 600px;">
            <?php echo $__env->yieldContent('content'); ?>

            </div>
      </div>
    </div>
  </div>
  <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH G:\wamp64\www\checker\resources\views/backend/layouts/login.blade.php ENDPATH**/ ?>