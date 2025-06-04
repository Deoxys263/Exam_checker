<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Student Purchase Report')
@section('page_name', 'Student Purchase Report')
@section('content')
<style>
    li{
        list-style: none;
    }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
    <div class="container m-0">
        <div class="row px-2">
            <div class="col-md-8">
                <ol class="breadcrumb pt-2">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Purchase Report</li>
                </ol>
            </div>
            <div class="col-md-4 text-right">
                <div class="btn-group text-end mt-2">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class='btn btn-secondary btn125'>  <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i> Back </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container mt-2">
        <div class="card">
            <div class="card-body">
                @php
                    $start_date = null;
                    $end_date = null;

                    if(isset($_GET['from_date']) && $_GET['from_date'] != ""){
                        $start_date = $_GET['from_date'];
                    }

                    if(isset($_GET['to_date']) && $_GET['to_date'] != ""){
                        $end_date = $_GET['to_date'];
                    }
                    $selected_package_id = 0;
                    if(isset($_GET['package_id']) && $_GET['package_id'] != ""){
                        $selected_package_id = $_GET['package_id'];
                    }
                    $selected_batch_id = 0;
                    if(isset($_GET['batch_id']) && $_GET['batch_id'] != ""){
                        $selected_batch_id = $_GET['batch_id'];
                    }

                    $selected_student_id = null;
                    if(isset($_GET['student_id']) && $_GET['student_id'] != ''){
                        $selected_student_id = $_GET['student_id'];
                    }

                    $selected_checker_id = null;
                    if(isset($_GET['checker_id']) && $_GET['checker_id'] != ''){
                        $selected_checker_id = $_GET['checker_id'];
                    }

                    $selected_status = null;
                    if(isset($_GET['status']) && $_GET['status'] != ''){
                        $selected_status = $_GET['status'];
                    }
                @endphp
                {{ Form::open(['method'=>'GET']) }}
                <div class="row mt-2 mb-2">
                    <div class="col-md-3">
                        <label for="">Batches</label>
                        {{ Form::select('batch_id',$batches,$selected_batch_id,['class'=>'form-control','placeholder'=>'Select Batch' , 'id'=>'batch_id']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Packages</label>
                        {{ Form::select('package_id',[],null,['class'=>'form-control','placeholder'=>'Select Package' , 'id'=>'package_id']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Student</label>
                        {{ Form::select('student_id',$students, $selected_student_id,['class'=>'form-control','placeholder'=>'Select Student']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Checker</label>
                        {{ Form::select('checker_id',$checkers, $selected_checker_id,['class'=>'form-control','placeholder'=>'Select Checker']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Status</label>
                        {{ Form::select('status',['uploaded'=>'Uploaded','checked'=>'Checked','rejected'=>'Rejected'], $selected_status,['class'=>'form-control','placeholder'=>'Select Status']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">Start Date</label>
                        {{ Form::text('from_date',$start_date,['class'=>'datep form-control','placeholder'=>'Select Start Date']) }}
                    </div>
                    <div class="col-md-3">
                        <label for="">End Date</label>
                        {{ Form::text('to_date',$end_date,['class'=>'datep form-control','placeholder'=>'Select End Date']) }}
                    </div>
                    <div class="col-md-4">
                        <input type="submit" value="Get Data" class='btn btn-sm btn-primary mt-4'>

                    </div>
                </div>
                {{ Form::close() }}
                <div class="table-responsive text-nowrap">
                    <table class="table zero-configuration table-bordered" id="batch_table"
                        style="white-space: nowrap;">
                        <thead>
                            <tr role="row" style="height: 0px;">
                                <th class="text-center sorting_asc"> Sr. No </th>
                                <th class="text-center sorting_asc">Solution No </th>
                                <th>Package Name</th>
                                <th>Paper Name</th>
                                <th>Student Name</th>
                                <th>Checker Name</th>
                                <th>Status</th>
                                <th>Score</th>
                                <th>Uploaded on</th>
                                <th>Checked on</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($submissions) && count($submissions) > 0)
                                @foreach ($submissions as $record)
                                    <tr>
                                        <td>{{ $loop->index + 1}}</td>
                                        <td>SP{{  $record->id }}</td>
                                        <td>{{ (isset($record->package->package_name)?$record->package->package_name:'--') }}</td>
                                        <td>{{ (isset($record->filename->paper_name)?$record->filename->paper_name:'--') }}</td>
                                        <td>{{ (isset($record->student->student_name)?$record->student->student_name:'--') }}</td>
                                        <td>{{ (isset($record->checker->first_name)?$record->checker->first_name:'--') }} {{ (isset($record->checker->last_name)?$record->checker->last_name:'--') }}</td>
                                        <td>{{ (isset($record->status)?ucfirst($record->status):'--') }}</td>
                                        <td>{{ (isset($record->score)?$record->score:'--') }}/{{ (isset($record->marks)?$record->marks:'--') }}</td>
                                        <td>{{ (isset($record->created_at)?date('d/m/Y h:i:s', strtotime($record->created_at)):'--') }}</td>
                                        <td>{{ (isset($record->approved_on)?date('d/m/Y h:i:s', strtotime($record->approved_on)):'--') }}</td>

                                    </tr>
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
        $(document).ready(function() {
        $('.datep').datepicker({'dateFormat':"dd/mm/yy"});

        //selected batch_id
        let batch_id = $('#batch_id').val();

        let selected_package_id = "{{ $selected_package_id }}";
            loadPackages(batch_id,selected_package_id);

        $('#batch_id').change(function(){
            let batch_id = $('#batch_id').val();
            loadPackages(batch_id,selected_package_id);
        });


            $('#batch_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Purchases Report';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7]
                    },
                    title: function(){
                      var printTitle = 'Purchases Report';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],

            });
        });

        function loadPackages(batch_id,package_id=0){
            if(batch_id != "" ){
                let token = "{{ csrf_token() }}";
                let form_data = {'_token':token, 'batch_id':batch_id};
                $.ajax({
                    url:"{{ route('ajax.get.packages.from.batch') }}",
                    data:form_data,
                    type:'post',
                    success:function(resp){
                        $('#package_id').html(resp);
                        if( package_id != 0){

                                $("#package_id option[value='"+package_id+"']").attr('selected',true);


                        }
                    }

                });
            }
            //
        }
    </script>
   @endsection
