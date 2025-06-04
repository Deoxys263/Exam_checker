@if(isset($errors) && count($errors) > 0)
<div class="col-md-10">
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
                {{$error}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endforeach
</div>
@endif
