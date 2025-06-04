<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Edit Internal Users')
@section('page_name', 'Edit Internal Users')
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
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            {{ Form::model($user,['url' => 'admin/user/update']) }}
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    {{ Form::label('fullname', 'First Name *') }}
                                                    {{ Form::hidden('id', NULL, ['class' => 'form-control']) }}
                                                    {{ Form::text('first_name', NULL, ['class' => 'form-control', 'placeholder' => 'Enter First Name', 'required' => true]) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    {{ Form::label('fullname', 'Last Name *') }}
                                                    {{ Form::text('last_name', NULL, ['class' => 'form-control', 'placeholder' => 'Enter Last Name', 'required' => true]) }}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    {{ Form::label('email', 'Email *') }}
                                                    {{ Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => true,'pattern'=>"[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}"]) }}

                                                </div>
                                            </div>

                                            {{-- input for role --}}

                                            <div class="col-md-6 col-12">
                                                <div class="form-label-group">
                                                    {{ Form::label('role_id', 'Role *') }}
                                                    {{ Form::select('role',$role,NULL,['class'=>'form-control', 'id'=>'role_id', 'placeholder'=>'Select status', 'required'=>true])}}
                                                </div>
                                            </div>

                                            <div class="col md-12 center">
                                                <br>
                                                <center>
                                                    {{ Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1']) }}
                                                    <button type="reset" class="btn btn-secondary mr-1 mb-1">Reset</button>
                                                </center>
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

        <div class="container-xxl flex-grow-1 container mt-2">
            <!-- Layout Demo -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @include('backend.includes.errors')
                            {{ Form::open(['url' => 'admin/user/status']) }}
                                @csrf
                                <div class="form-body">
                                    <div class="col-12">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                {{ Form::label('fullname', 'Status *') }}
                                                {{ Form::hidden('id', $user->id, ['class' => 'form-control']) }}
                                                {!! Form::select('status',['0'=>'Inactive', '1'=> 'Active'] , $user->status, ['class' => 'form-control']) !!}
                                            </div>

                                            <div class="col-md-6 col-12 pt-2">
                                                {{ Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1']) }}
                                                {{--  <button type="reset" class="btn btn-secondary mr-1 mb-1">Reset</button>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
        </div>

        <div class="container-xxl flex-grow-1 container mt-2">
            <!-- Layout Demo -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @include('backend.includes.errors')
                            {{ Form::open(['route' => 'admin.user.setpassword']) }}
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12 mb-2 mt-2">
                                            <div class="form-group">
                                                {{ Form::label('first_name', 'New Passwors *') }}
                                                {{ Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'required' => true]) }}
                                                {{ Form::hidden('id', $user->id, ['class' => 'form-control']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 mb-2 mt-2">
                                            <div class="form-group">
                                                {{ Form::label('first_name', 'Confirm Password *') }}
                                                {{ Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'required' => true]) }}
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center col-12 pt-2">
                                            {{ Form::submit('Update', ['class' => 'btn btn-primary mr-1 mb-1']) }}
                                            {{--  <button type="reset" class="btn btn-secondary mr-1 mb-1">Reset</button>  --}}
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
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
