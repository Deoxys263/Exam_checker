<script>
function assign_sheet(checker_id,sheet_id){
        let csrf = "{{ csrf_token() }}";
        let data_array = {'_token':csrf,'checker_id':checker_id,'sheet_id':sheet_id};
        $.ajax({
            url:"{{ route('ajax.assign.checker.to.sheet') }}",
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
