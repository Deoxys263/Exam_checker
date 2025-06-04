<script>
function assign_sheet(checker_id,sheet_id){
        let csrf = "<?php echo e(csrf_token()); ?>";
        let data_array = {'_token':csrf,'checker_id':checker_id,'sheet_id':sheet_id};
        $.ajax({
            url:"<?php echo e(route('ajax.assign.checker.to.sheet')); ?>",
            type:"POST",
            'data':data_array,
            success:function(resp){
                let response = JSON.parse(resp);
                if(response.status == true){
                    swal("Assigned", response.msg, "success");
                }
                else{
                    swal("Failed", response.msg, "error");
                }
            }
        });
    }
</script>
<?php /**PATH G:\wamp64\www\exam_system\resources\views/backend/includes/functions.blade.php ENDPATH**/ ?>