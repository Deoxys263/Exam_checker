<!-- beautify ignore:start -->
@extends('backend.layouts.app')
@section('title', 'Subjects')
@section('page_name', 'Subjects')
@section('content')
               <!-- Content wrapper -->
               <div class="content-wrapper">

                <div class="container m-0">
                    <div class="row px-2">
                        <div class="col-md-8">
                            <ol class="breadcrumb pt-2">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.batches') }}">Batches</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
                              </ol>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="btn-group text-end mt-2">
                                @can('create subjects')
                                    @if (isset($batch->batch_id))
                                        <a href="{{ route('admin.subjects.create', [$batch->batch_id]) }}">
                                            <span class='btn btn-primary btn125'>  <i class="menu-icon tf-icons bx bx-plus"></i> Create</span>
                                        </a>
                                @endif
                                @endcan
                                    <a href="{{ route('admin.batches') }}">
                                        <span class='btn btn-primary btn125'>  <i class='bx bx-left-arrow-alt' ></i> Back</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container mt-2">
                    <div class="card">
                        <span class="h5 m-3">{{ isset($batch->batch_name) ? $batch->batch_name : '' }}</span>
                        <div class="card-body">
                          <div class="table-responsive text-nowrap">
                            <table class="table zero-configuration table-bordered" id="subject_table"
                                                style="white-space: nowrap;">
                                                <thead>
                                                    <tr>
                                                        <th> Sr. No </th>

                                                        <th>
                                                            <div>Subject Name</div>
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($subjects) && count($subjects) > 0)
                                                        @php $srno = 1; @endphp
                                                        @foreach ($subjects as $data)
                                                            <tr>
                                                                <td class="text-center">{{ $srno }}</td>
                                                                <td>
                                                                    @if (isset($data->subject_name))
                                                                        {{ $data->subject_name }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @can('view chapter master')
                                                                    <a href="{{ route('admin.chapter.master',$data->subject_id)}}" class='btn btn-sm btn-success'>Chapters</a>
                                                                    @endcan

                                                                    @can('update subjects')
                                                                        <a href="{{ url('admin/subjects/edit/' . $data->subject_id) }}"
                                                                            class="btn btn-primary btn-sm m-1"><i class="fas fa-pencil"></i></a>
                                                                    @endcan

                                                                    @can('delete subjects')
                                                                        {!! Form::open([
                                                                            'method' => 'get',
                                                                            'url' => ['admin/subjects/delete', $data->subject_id],
                                                                            'style' => 'display:inline',
                                                                        ]) !!}
                                                                            {!! Form::button('<i class="bx bx-trash"></i>', [
                                                                                'type' => 'submit',
                                                                                'class' => 'btn btn-danger btn-sm',
                                                                                'onclick' => "return confirm('Are you sure you want to Delete this Subject ?')",
                                                                            ]) !!}
                                                                            {!! Form::close() !!}
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
            $('#subject_table').DataTable({
                dom: 'Bfrtip', // 'B' stands for Buttons
                buttons: [
                {
                    text: '<i class="fas fa-print"></i> Print',
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1]
                    },
                    title: function(){
                      var printTitle = 'Subjects';
                      return printTitle
                  },
                  className: 'btn  pb-0 pt-0 px-1 text-white font-weight-bold',
                },
                {
                    text: '<i class="far fa-file-excel"></i> Excel',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1]
                    },
                    title: function(){
                      var printTitle = 'Subjects';
                      return printTitle
                    },
                    className: 'btn btn-success text-white font-weight-bold pb-0 pt-0 px-1',
                },
        ],
            });
        });
    </script>
   @endsection
