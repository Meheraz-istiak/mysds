@extends('layouts.default')

@section('title')
    Rectified Workplace Inspection
@endsection

@section('css')
    <style>
        div#myProjectTable_length {
            position: absolute;
        }
        div.dt-buttons {
            position: absolute;
            margin-left: 11rem;
        }
        button.dt-button {
            font-size: .78rem;
        }
    </style>
@endsection

@section('content')
    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->


        <div class="body d-flex py-3">
            <div class="container-xxl">
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold ml-2">Rectified Workplace Inspection</h3>
                        </div>
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form id="basic-form" method="post" enctype="multipart/form-data"
                                          @if(isset($data->id))
                                          action="{{ route('rectified_inspection.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('rectified_inspection.store') }}" novalidate>
                                        @endif


                                        @csrf

                                        <div class="row g-3 " style="margin: 0 auto;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label"> Find Inspection</label>
                                                    <!-- <input type="text" class="form-control" required> -->
                                                    <select
                                                        name="find_inspection"
                                                        id="find_inspection"
                                                        class="form-control">

                                                        <option value="" >choose</option>
                                                        @foreach($cri as $list)

                                                            <option value="{{$list->id}}" {{isset($data->find_inspection) && $data->find_inspection == $list->id ? 'selected' : '' }}>{{$list->inspection_title}}</option>

                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="date_rectified" class="form-label">DATE RECTIFIED </label>
                                                <input
                                                    type="date"
                                                    class="form-control w-100"
                                                    id="date_rectified"
                                                    name="date_rectified"
                                                    value="{{isset($data->date_rectified) ? $data->date_rectified:''}}"
                                                    required
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="formFileMultiple" class="form-label">
                                                    TASK RECTIFIED WITH PICTURE</label
                                                >
                                                <input
                                                    class="form-control"
                                                    type="file"
                                                    id="r_image"
                                                    name="r_image"
                                                    accept="image/*"
                                                    value="{{isset($data->r_image) ? $data->r_image:''}}"
                                                    multiple


                                                />
                                                @if(isset($data->id))
                                                    <img src="/image/rec_inspection/{{ $data->r_image }}" width="10%">@endif
                                            </div>
                                           <div class="col-md-10"></div>

                                            <div class="col-md-2">
                                                @if(isset($data->id))
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                @else
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                @endif

                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table
                                id="myProjectTable"
                                class="table table-hover datatable align-middle mb-0"
                                style="width: 100%"
                            >
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <th>Inspection</th>
                                    <th>Image</th>
                                    <th>date_rectified</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @endsection

        @section('javascript')

            {{--  <!-- Jquery Core Js -->--}}
            {{--    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>--}}

            {{--    <!-- Plugin Js-->--}}
            {{--    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>--}}

            {{--    <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>--}}



            {{--    <!-- Jquery Page Js -->--}}
            {{--    <script src="{{asset('assets/js/template.js')}}"></script>--}}

            <script>



                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);

                    var table = $('.datatable').DataTable({

                        processing: true,
                        serverSide: true,
                        dom: 'lBfrtip<"actions">',
                        buttons: [

                            {
                                extend: 'excelHtml5',
                                title: 'Recent Inspection List Data',
                                text:      '<i class="fa-solid fa-file-excel"></i> Excel',
                                className: "btn btn-primary btn-sm btn-rounded",
                                exportOptions: {
                                    columns: ':visible'
                                },
                            },

                            {
                                extend: 'print',
                                title: 'Recent Inspection List Data',
                                alignment: "center",
                                header: true,
                                text:  '<i class="fa-solid fa-print"></i> Print',
                                className: "btn btn-success btn-sm btn-rounded",
                                exportOptions: {
                                    columns: ':visible',
                                    alignment: "center",
                                },

                            },
                            {
                                extend: 'colvis',
                                className: "btn btn-info btn-sm btn-rounded",
                            }
                        ],
                        ajax: {
                            url: "{{ route('rectified_inspection.datatable') }}",
                            type: 'GET',
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        "columns": [

                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                            {"data": "find_insp.inspection_title"},
                            {"data": "r_image"},

                            {"data": "date_rectified"},


                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ],
                        language: {
                            paginate: {
                                next: '<i class="bx bx-chevron-right">',
                                previous: '<i class="bx bx-chevron-left">'
                            }
                        }
                    });


                });
            </script>




@endsection
