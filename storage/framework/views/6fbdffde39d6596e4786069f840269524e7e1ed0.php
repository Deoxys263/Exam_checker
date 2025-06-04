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

    <?php echo $__env->make('backend.includes.leftnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <?php echo $__env->make('backend.includes.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <?php echo $__env->yieldContent('content'); ?>
          <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php /**PATH G:\wamp64\www\checker\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>