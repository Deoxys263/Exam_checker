<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Internal Users')
@section('page_name', 'Internal Users')
@php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
@endphp
@section('content')
           <!-- Content wrapper -->
           <div class="content-wrapper">

            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Intenal Users</li>
                          </ol>
                    </div>
                    @can('create internal users')
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                <a href="{{ route('admin.create')}}">
                                    <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                                </a>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container mt-2">
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table zero-configuration" id="tbl-datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Sr. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($adminusers) && count($adminusers) > 0)
                                    @php $srno = 1; @endphp
                                    @foreach ($adminusers as $users)
                                        <tr>
                                            <td class="text-center">{{ $srno }}</td>
                                            <td>{{ (isset($users->first_name)?$users->first_name:'').' '.(isset($users->last_name)?$users->last_name:'') }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ (isset($users->mobile_no)?$users->mobile_no:'')}}</td>
                                            <td>
                                                {{ (isset($users->admin_role->name)?$users->admin_role->name:'')}}
                                            </td>
                                            <td>
                                                @if(isset($users->status) && $users->status == 1)
                                                    Active
                                                    @else
                                                    Not Active
                                                @endif
                                            </td>
                                            <td>
                                                @can('update internal users')
                                                    <a href="{{ url('admin/user/edit/' . $users->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-pencil"></i>
                                                    </a>
                                                @endcan


                                                @can('delete internal users')
                                                {!! Form::open([
                                                    'method'=>'get',
                                                    'url' => ['admin/user/delete', $users->id],
                                                    'style' => 'display:inline'
                                                    ]) !!}
                                                {!! Form::button('<i class="bx bx-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Are you sure you want to Delete this User ?')"]) !!}
                                                {!! Form::close() !!}
                                                            @endcan
                                                        </td>
                                                    </tr>
                                        @php $srno++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
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
