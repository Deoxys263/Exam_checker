<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Profile')
@section('page_name', 'Profile')
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
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.dashboard')}}">
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
                            {!! Form::model($details, [
                                'method' => 'POST',
                                'url' => ['admin/updateprofile'],
                                'class' => 'form'
                                ]) !!}
                                <div class="form-body">
                                  <div class="row">
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                      <div class="form-group">
                                        {{ Form::hidden('id', $details->id) }}
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
                                        {{ Form::label('mobile_no', 'Mobile *') }}
                                        {{ Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Mobile Number', 'required' => true]) }}
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                      <div class="form-group">
                                        {{ Form::label('email', 'Email *') }}
                                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'readonly' => 'readonly']) }}
                                      </div>
                                    </div>
                                    <div class="col-md-12  text-center mt-2">
                                      {{ Form::submit('Update', array('class' => 'btn btn-primary mr-1')) }}
                                      <input type="reset" value="Reset" class='btn btn-secondary'>
                                    </div>
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
