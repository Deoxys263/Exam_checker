<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Backend Menu')
@section('page_name', 'Backend Menu')
@php
    use App\Models\backend\ActionPermission;
    $all_permission = ActionPermission::all();
@endphp
@section('content')
           <!-- Content wrapper -->
           <div class="content-wrapper">
            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Backend Menu</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.backendmenu.create')}}">
                            <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                        </a>
                    </div>
                </div>
                </div>
            </div>

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container mt-2">
                <div class="card">
                    {{--<h5 class="card-header">Bordered Table</h5>--}}
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id='menu_table'>
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(isset($menu) && count($menu))
                            @foreach($menu as $data)
                            <tr>
                                <td>{{ ($loop->index+1) }}</td>
                                <td>  {{$data->menu_name}}  </td>
                                <td>
                                    @if(isset($data->visibility) && $data->visibility == 1)
                                    Active
                                    @else
                                    Not Active
                                    @endif
                                </td>
                                <td>
                                    @if(isset($data->has_submenu) && $data->has_submenu == 1)
                                    <a href="{{route('admin.backend.submenu.index',[$data->backendmenu_id])}}">
                                        <span class="btn btn-secondary">Submenu</span>
                                    </a>
                                    @endif
                                    <a href="{{ url('admin/backend/menu/edit/'.$data->backendmenu_id) }}" class="btn btn-primary"><i class="bx bx-pencil"></i></a>
                                    {!! Form::open([
                                        'method'=>'get',
                                        'url' => ['admin/backend/menu/delete', $data->backendmenu_id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="bx bx-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Delete this Entry ?')"]) !!}
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
