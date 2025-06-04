<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Update Password')
@section('page_name', 'Update Password')
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
                            <li class="breadcrumb-item active" aria-current="page">Update Password</li>
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
                                {{ Form::open(['url' => 'admin/password/update']) }}
                                @csrf
                                <div class="form-body">
                                  <div class="row">
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                      <div class="form-group">
                                        <label>Current Password *</label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                      <div class="form-group">
                                        {{ Form::label('new_password', 'New Password *') }}
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                      <div class="form-group">
                                        {{ Form::label('new_password_confirmation', 'Confirm New Password *') }}
                                        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Enter New Password again" required>
                                      </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                      {{ Form::submit('Update', array('class' => 'btn btn-primary mr-1')) }}
                                      <input type="reset" value="Reset" class='btn btn-secondary'>
                                    </div>
                                  </div>
                                </div>
                              {{ form::close() }}
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
