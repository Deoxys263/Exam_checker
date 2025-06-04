<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <div class="card card-default">
        <div class="card-header">
            Laravel - Razorpay Payment Gateway Integration
        </div>
        <div class="card-body text-center">
            <form action="<?php echo e(route('razorpay.payment.store')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="<?php echo e(env('RAZORPAY_CLIENT_KEY')); ?>"
                        data-amount="10000"
                        data-buttontext="Pay 100 INR"
                        data-name="GeekyAnts official"
                        data-description="Razorpay payment"
                        data-image="/images/logo-icon.png"
                        data-prefill.name="ABC"
                        data-prefill.email="abc@gmail.com"
                        data-theme.color="#ff7529">
                </script>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH G:\wamp64\www\exam_system\resources\views/frontend/sample_payment/payment_form.blade.php ENDPATH**/ ?>