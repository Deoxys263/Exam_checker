<?php
//use Session;
?>
<?php if(Session::has('success')): ?>
<div class="bs-toast toast fade show bg-success mx-3 mt-2" role="alert" aria-live="assertive" aria-atomic="true" style='position:absolute; float-right; right:0;'>
    <div class="toast-header p-0">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body p-3">
        <?php echo e(Session::get('success')); ?>

    </div>
</div>
<script>
    const myTimeout = setTimeout(HideAlert, 8000);
function HideAlert() {
    $('.toast').hide('slow');
}
</script>
<?php endif; ?>


<?php if(Session::has('info')): ?>

<div class="bs-toast toast fade show bg-info mx-3 mt-2" role="alert" aria-live="assertive" aria-atomic="true" style='position:absolute; float-right; right:0;'>
    <div class="toast-header p-0">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body p-3">
        <?php echo e(Session::get('info')); ?>

    </div>
</div>
<script>
    const myTimeout = setTimeout(HideAlert, 8000);
function HideAlert() {
    $('.toast').hide('slow');
}
</script>
<?php endif; ?>


<?php if(Session::has('warning')): ?>
<div class="bs-toast toast fade show bg-warning mx-3 mt-2" role="alert" aria-live="assertive" aria-atomic="true" style='position:absolute; float-right; right:0;'>
    <div class="toast-header p-0">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body p-3">
        <?php echo e(Session::get('warning')); ?>

    </div>
</div>
<script>
    const myTimeout = setTimeout(HideAlert, 8000);
function HideAlert() {
    $('.toast').hide('slow');
}
</script>
<?php endif; ?>


<?php if(Session::has('error')): ?>
<div class="bs-toast toast fade show bg-error mx-3 mt-2" role="alert" aria-live="assertive" aria-atomic="true" style='position:absolute; float-right; right:0;'>
    <div class="toast-header p-0">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body p-3">
        <?php echo e(Session::get('error')); ?>

    </div>
</div>
<script>
    const myTimeout = setTimeout(HideAlert, 8000);
function HideAlert() {
    $('.toast').hide('slow');
}
</script>
<?php endif; ?>

<?php if(Session::has('message')): ?>
<div class="bs-toast toast fade show bg-error mx-3 mt-2" role="alert" aria-live="assertive" aria-atomic="true" style='position:absolute; float-right; right:0;'>
    <div class="toast-header p-0">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body p-3">
        <?php echo e(Session::get('message')); ?>

    </div>
    <script>
        const myTimeout = setTimeout(HideAlert, 8000);
    function HideAlert() {
        $('.toast').hide('slow');
    }
    </script>
</div>

<?php endif; ?>


<?php /**PATH C:\wamp64\www\exam_system\resources\views/backend/includes/alerts.blade.php ENDPATH**/ ?>