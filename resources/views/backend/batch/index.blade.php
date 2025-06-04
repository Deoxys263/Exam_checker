<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Batches')
@section('page_name', 'Batches')
@section('content')
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Batches
                        </div>
                    <div class="col-md-4 text-right">
                        @can('create batch master')
                        <div class="btn-group text-end mt-2">
                            <a href="{{ route('admin.batches.create') }}">
                                <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                            </a>
                        </div>
                        @endcan
                    </div>
                    </div>
                </div>

                <!-- Content -->

                <div class="container-xxl flex-grow-1 container mt-2">
                    <div class="card">
                        <div class="card-body">
                          <div class="table-responsive text-nowrap">
                            <table class="table zero-configuration table-bordered" id="batch_table"
                                                style="white-space: nowrap;">
                                                <thead>
                                                    <tr role="row" style="height: 0px;">
                                                        <th class="text-center sorting_asc"> Sr. No </th>

                                                        <th class="text-center sorting_asc" aria-controls="amount_table"
                                                            rowspan="1" colspan="1">
                                                            <div class="dataTables_sizing"
                                                                style=" overflow: hidden; text-color:white">Batch Name</div>
                                                        </th>
                                                        <th>Status</th>
                                                        <th class="text-center sorting_asc">
                                                            Action
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($batches) && count($batches) > 0)
                                                        @php $srno = 1; @endphp
                                                        @foreach ($batches as $data)
                                                            <tr>
                                                                <td class="text-center">{{ $srno }}</td>
                                                                <td>
                                                                    @if (isset($data->batch_name))
                                                                        {{ $data->batch_name }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (isset($data->status) && $data->status == 1)
                                                                        <span class='text-success'>Active</span>
                                                                    @else
                                                                        <span class='text-secondary'>Not Active</span>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @can('view subjects')
                                                                        <a href="{{ url('/') }}/admin/subjects/{{ $data->batch_id }}"  class="btn btn-info btn-sm m-1">
                                                                            <i class="fas fa-book"></i> Subjects
                                                                        </a>
                                                                    @endcan

                                                                    @can('view subjects')
                                                                        <a href="{{ url('admin/batches/edit/' . $data->batch_id) }}"
                                                                            class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil "></i></a>
                                                                    @endcan

                                                                    @can('delete batch master')
                                                                        {!! Form::open([
                                                                            'method' => 'get',
                                                                            'url' => ['admin/batches/delete', $data->batch_id],
                                                                            'style' => 'display:inline',
                                                                            ]) !!}
                                                                            {!! Form::button('<i class="bx bx-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'onclick' => "return confirm('Are you sure you want to Delete this Batch ?')",
                                                                            ]) !!}
                                                                        {!! Form::close() !!}
                                                                    @endcan

                                                                    @can('view packages')
                                                                            <a href="{{ route('admin.packages.master',[$data->batch_id])}}"><span class="btn btn-success btn-sm">Packages</span></a>
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
        $(document).ready(function() {
            $('#batch_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2]
                    },
                    title: function(){
                      var printTitle = 'Batches';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2]
                    },
                    title: function(){
                      var printTitle = 'Batches';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],

            });
        });
    </script>
   @endsection
