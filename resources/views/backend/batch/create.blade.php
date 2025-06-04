<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Create Batches')
@section('page_name', 'Create Batches')
@php

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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                          </ol>
                    </div>
                <div class="col-md-4 text-right">
                    <div class="btn-group text-end mt-2">
                        <a href="{{ route('admin.batches')}}">
                            <span class='btn btn-secondary btn115'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back</span>
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
                            {{ Form::open(['url' => 'admin/batches/store']) }}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mt-1 mb-2">
                                        <div class="form-group">
                                            {{ Form::label('batch_name', 'Batch Name *') }}
                                            {{ Form::text('batch_name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Batch Name']) }}
                                            {{ Form::hidden('status',1)}}
                                        </div>
                                    </div>




                                    <div class="col-md-6 col-12 mt-4 mb-2">
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
