<script>

function created_at_DDMMYYY(dateString) {
    let date = new Date(dateString);
    let day = String(date.getDate()).padStart(2, '0'); // Ensure 2 digits
    let month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    let year = date.getFullYear();
    return `${day}/${month}/${year}`;
}
</script>
<?php /**PATH C:\wamp64\www\exam_system\resources\views/frontend/includes/functions.blade.php ENDPATH**/ ?>