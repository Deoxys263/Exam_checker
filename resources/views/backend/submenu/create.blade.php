<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Backend Sub Menu')
@section('page_name', 'Backend Sub Menu')
@php
    use App\Models\backend\ActionPermission;
    $all_permission = ActionPermission::all();
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.backendmenu.index') }}">Backend Menu</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.backend.submenu.index',[$id]) }}">Backend Sub Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.backend.submenu.index',[$id])}}">
                            <span class='btn btn-primary'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
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
                    <span class="h5">Create Backend Sub Menu</span>
                        <div class="card-body demo-vertical-spacing demo-only-element">
                            @include('backend.includes.errors')
                            {{Form::open(['url'=>'admin/backend/submenu/store'])}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            {{Form::label('name','Menu Name*')}}
                                            {{Form::text('menu_name',null, ['class'=>'form-control', 'placeholder'=>'Enter Menu Name'])}}
                                            {{Form::hidden('backendmenu_id',$id, ['class'=>'form-control', 'placeholder'=>'Enter Menu Name'])}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            {{Form::label('route_name','Route Name*')}}
                                            {{Form::text('route_name',null, ['class'=>'form-control', 'placeholder'=>'Enter route Name'])}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            {{Form::label('Icon','Icon *')}}
                                            {{Form::text('icon',null, ['class'=>'form-control', 'placeholder'=>'Enter route Name'])}}
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            {{Form::label('Icon','Visibility *')}}<br>
                                            {{Form::radio('visibility', 1, null, [])}}
                                            {{Form::label('Icon','Show')}} <br>
                                            {{Form::radio('visibility', 0, null, [])}}
                                            {{Form::label('Icon','hide')}}
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-12 mb-2 mt-2 ">
                                        {{Form::label('Icon','Permissions *')}}<br>
                                        @if(isset($all_permission) && count($all_permission) > 0)
                                            @foreach($all_permission as $index => $value)
                                                <input type="checkbox" name='permission[]' class='permission_checkbox' value="{{ $value->action_permission_id}}" id=""> <span style='margin-right:10px'>{{ $value->action_permission_name}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-md-12 col-12 text-center">
                                        <input type="submit" value="Create" class='btn btn-primary'>
                                        <input type="reset" value="Reset" class='btn btn-warning'>
                                    </div>
                                </div>
                            </div>
                            {{Form::close()}}
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

