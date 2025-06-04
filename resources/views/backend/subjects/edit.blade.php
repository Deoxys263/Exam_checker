<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Edit Subjects')
@section('page_name', 'Edit Subjects')
@php
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.batches') }}">Batches</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.subjects',[$subjects->subject_id]) }}">Subjects</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.batches')}}">
                            <span class='btn btn-secondary'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Batches</span>
                        </a>

                        <a href="{{ route('admin.subjects',[$subjects->subject_id])}}">
                            <span class='btn btn-info'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Subjects</span>
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
                            {{ Form::model($subjects, ['url' => 'admin/subjects/update']) }}
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mt-1 mb-2">
                                                <div class="form-group">
                                                    {{ Form::label('batch_name', 'Subject Name *') }}
                                                    {{ Form::text('subject_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Subject Name']) }}
                                                    {{ Form::hidden('subject_id', null, ['class' => 'form-control', 'required' => true]) }}
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12 text-center mt-1 mb-2">
                                                {{ Form::submit('Save', ['class' => 'btn btn-primary mr-1 mb-1']) }}
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
