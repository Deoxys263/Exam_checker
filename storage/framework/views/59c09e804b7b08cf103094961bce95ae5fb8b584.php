<!DOCTYPE html>

<!-- beautify ignore:start -->
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>
        <?php echo $__env->yieldContent('title','Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro'); ?> </title>

    <meta name="description" content="" />



    <?php echo $__env->make('backend.includes.login_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
            <?php echo $__env->yieldContent('content'); ?>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <?php echo $__env->make('backend.includes.dash_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  </body>
</html>
<?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/layouts/login.blade.php ENDPATH**/ ?>