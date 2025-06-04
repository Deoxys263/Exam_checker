<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Create Internal Users')
@section('page_name', 'Create Internal Users')
@php
    use App\Models\backend\ActionPermission;
    use App\Models\backend\BackendMenu;
    use App\Models\backend\BackendSubMenu;
    use Spatie\Permission\Models\Permission;
@endphp
@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">

            {{--Breadcurmb--}}
            <div class="container m-0">
                <div class="row px-2">
                    <div class="col-md-8">
                        <ol class="breadcrumb pt-2">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Internal Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.users')}}">
                            <span class='btn btn-secondary'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
                        </a>
                    </div>
                </div>
                </div>
            </div>
            {{--Breadcurmb--}}


            <div class="container-xxl flex-grow-1 container mt-2">
              <!-- Layout Demo -->
              <div class="row">
                <div class="col-12">
                  <div class="card p-2">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @include('backend.includes.errors')
                            {{ Form::open(['url' => 'admin/user/store']) }}
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('first_name', 'First Name *') }}
                                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('last_name', 'Last Name *') }}
                                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'required' => true]) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('email', 'Email *') }}
                                                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => true, 'pattern' => '[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}']) }}
                                                    {{-- Hidden PassWord field    --}}
                                                    {{ Form::hidden('status', 1, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required' => true]) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('password', 'Create Password *') }}
                                                    <input type='password' name='password' class='form-control'
                                                        placeholder='Create Your Password' required='true'>
                                                    {{-- Hidden PassWord field    --}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('password', 'Confirm Password *') }}
                                                    <input type='password' name='confirm_password' class='form-control'
                                                        placeholder='Confirm your Password' required='true'>
                                                </div>
                                            </div>

                                            {{-- input for role  --}}
                                            <div class="col-md-6 col-12 mb-2 mt-2">
                                                <div class="form-group">
                                                    {{ Form::label('role_id', 'Role *') }}
                                                       {{ Form::select('role',$role,NULL,['class'=>'form-control', 'id'=>'role_id', 'placeholder'=>'Select Role', 'required'=>true])}}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-12 text-center mt-2">
                                            {{ Form::submit('Create', ['class' => 'btn btn-primary mr-1 mb-1']) }}
                                            <button type="reset" class="btn btn-dark mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                        </div>
                    </div>
                </div>
              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){


    });


</script>
   @endsection
