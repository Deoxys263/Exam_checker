<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Roles')
@section('page_name', 'Roles')
@section('content')
           <!-- Content wrapper -->
           <div class="content-wrapper">

            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.roles.create')}}">
                            <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                        </a>
                    </div>
                </div>
                </div>
            </div>

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container mt-2">
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id='menu_table'>
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(isset($roles) && count($roles))
                            @foreach($roles as $data)

                            <tr>
                                <td>{{ ($loop->index+1) }}</td>
                                <td>  {{$data->name}}  </td>
                                <td>
                                    <a href="{{ url('admin/roles/edit/'.$data->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-pencil"></i></a>
                                    {!! Form::open([
                                        'method'=>'get',
                                        'url' => ['admin/roles/delete', $data->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="bx bx-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Are you sure you want to Delete this Role ?')"]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#menu_table').DataTable();
    });
</script>
   @endsection
