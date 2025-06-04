<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Create Roles')
@section('page_name', 'Create Roles')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles') }}">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.roles')}}">
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
                            {{Form::open(['url'=>'admin/roles/store'])}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-2 mt-2">
                                        <div class="form-group">
                                            {{Form::label('name','Role Name*')}}
                                            {{Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Enter Role Name'])}}
                                        </div>
                                    </div>

                                    @php
                                        $menu = BackendMenu::where('visibility',1)->get();
                                        if(isset($menu) && count($menu) > 0){
                                            foreach ($menu as $key => $value){
                                                if(isset($value->has_submenu) && $value->has_submenu ==1){
                                                    @endphp
                                                    <div class="col-md-12 m-2 p-1" style='border:1px solid gray'>
                                                        <h4><u>
                                                          <input type="checkbox" name="menu_id[{{$value->backendmenu_id}}]" value="{{ $value->backendmenu_id}}">  {{$value->menu_name}}
                                                            </u>
                                                            </h4>
                                                        <div class="col-md-12">
                                                            @php
                                                                $submenu = BackendSubMenu::where('backendmenu_id',$value->backendmenu_id)->where('visibility',1)->get();
                                                                if(isset($submenu) && count($submenu) > 0 ){
                                                                   foreach ($submenu as $key => $sub) {
                                                                       $all_permissions = Permission::where('sub_menu_id',$sub->sub_menu_id)->where('menu_id',$value->backendmenu_id)->get();
                                                                       @endphp
                                                                            <div class="col-md-12 m-2">
                                                                            <h5 class='mt-4'> <input type="checkbox" name="sub_menu_id[{{$sub->sub_menu_id}}]" value="{{ $sub->sub_menu_id}}"> {{$sub->menu_name}}</h5>
                                                                            @if(isset($all_permissions) && count($all_permissions) > 0)
                                                                            <div class='mx-3'>
                                                                                @foreach($all_permissions as $key=>$permission)
                                                                                {{ Form::checkbox('permissions['.$permission->id.']',$permission->id, NULL, ['class'=>'']) }} <span style='margin-right:40px'>{{ $permission->name}}</span>
                                                                                @endforeach
                                                                                </div>
                                                                            @endif
                                                                            </div>

                                                                        @php
                                                                   }
                                                                }
                                                            @endphp
                                                        </div>
                                                        </div>
                                                    @php
                                            }else {
                                                $all_permissions = Permission::where('menu_id',$value->backendmenu_id)->whereNULL('sub_menu_id')->get();
                                                @endphp
                                                <div class="col-md-12 m-2 p-1" style='border:1px solid gray'>
                                                   <h4> <input type="checkbox" name="menu_id[{{ $value->backendmenu_id}}]" value="{{ $value->backendmenu_id}}">  <u>{{$value->menu_name}}</u></h4>
                                                   @if(isset($all_permissions) && count($all_permissions) > 0)
                                                   <div class='mx-3'>
                                                    @foreach($all_permissions as $key=>$permission)
                                                    {{ Form::checkbox('permissions['.$permission->id.']',$permission->id, NULL, ['class'=>'']) }} <span style='margin-right:40px'>{{ $permission->name}}</span>
                                                    @endforeach
                                                    </div>
                                                   @endif
                                                </div>

                                                @php
                                            }
                                        }
                                    }
                                    @endphp
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
