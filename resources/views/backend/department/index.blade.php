@extends('layouts.default')

@section('title')
    Department
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
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Department Setup</h5>
{{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
        </div>
        <div class="row clearfix g-3">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                    </div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="department"

                              @if(isset($data->id))
                              action="{{ route('department.update', ['id' => $data->id]) }}">
                            <input name="_method" type="hidden" value="PUT">
                            @else
                                action="{{ route('department.store')}}">
                            @endif
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-sm-12">
                                    <label for="depone" class="form-label"
                                    >Depertment Name
                                        <span class="text-danger">*</span>
                                    </label
                                    >
                                    <input type="text"
                                           class="form-control"
                                           name="department_name"
                                           id="dept_name"
                                           value="{{isset($data->depertment_name) ? $data->depertment_name:''}}"
                                    />
                                </div>
                                <div class="col-sm-12">
                                    <label for="depone" class="form-label"
                                    >Depertment Location
                                        <span class="text-danger">*</span>
                                    </label
                                    >
                                    <input type="text"
                                           class="form-control"
                                           name="dept_loc"
                                           id="dept_loc"
                                           value="{{isset($data->depertment_location) ? $data->depertment_location:''}}"
                                    />
                                </div>
                                <div class="col-sm-12">
                                    <label for="deptwophone" class="form-label"
                                    >Phone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="dept_phone"
                                        name="dept_phone"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"
                                        value="{{isset($data->phone) ? $data->phone:''}}"
                                    />
                                </div>
                                <div class="col-sm-12">
                                    <label for="fileimg" class="form-label"
                                    >Depertment Image
                                        <span class="text-danger">*</span>
                                    </label
                                    >
                                    <input
                                        type="File"
                                        class="form-control"
                                        id="depertment_image"
                                        name="depertment_image"
                                        accept="image/png, image/jpeg,image/jpg"
                                        value="{{isset($data->depertment_image) ? $data->depertment_image:''}}"
                                    />
                                    @if(isset($data->id))
                                        <img src="/image/Department/{{ $data->depertment_image }}" width="10%">@endif
                                </div>
                            </div>
                            @if(isset($data->id))
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
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
                                <th>Department Name</th>
                                <th>Location</th>
                                {{--                                        <th>status</th>--}}
                                <th>Phone</th>
                                <th>Image</th>
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
        <!-- Row End -->
    </div>
@endsection

@section('javascript')
    <script>
        // project data table
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);
            $('#myProjectTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    // {
                    //     extend: 'copyHtml5',
                    //     title: 'Job Data',
                    //     exportOptions: {
                    //         columns: ':visible'
                    //     },
                    // },
                    // {
                    //     extend: 'csvHtml5',
                    //     title: 'Job Data',
                    //     exportOptions: {
                    //         columns: ':visible'
                    //     },
                    // },
                    {
                        extend: 'excelHtml5',
                        title: 'Department Data',
                        text:      '<i class="fa-solid fa-file-excel"></i> Excel',
                        className: "btn btn-primary btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     orientation: 'landscape',
                    //     pageSize: 'LEGAL',
                    //     title: 'Department Data',
                    //     customize : function(doc){
                    //         let colCount = new Array();
                    //         $('.datatable').find('tbody tr:first-child td').each(function(){
                    //             if($(this).attr('colspan')){
                    //                 for(let i=1;i<=$(this).attr('colspan');$i++){
                    //                     colCount.push('*');
                    //                 }
                    //             }else{ colCount.push('*'); }
                    //         });
                    //         doc.content[1].table.widths = colCount;
                    //
                    //         // let arr2 = $('.img-fluid').map(function(){
                    //         //     return this.src;
                    //         // }).get();
                    //         //
                    //         // for (let i = 0, c = 1; i < arr2.length; i++, c++) {
                    //         //     doc.content[1].table.body[c][0] = {
                    //         //         image: arr2[i],
                    //         //         width: 100
                    //         //     }
                    //         // }
                    //     },
                    //     exportOptions: {
                    //         columns: ':visible'
                    //     },
                    // },
                    {
                        extend: 'print',
                        title: 'Department Data',
                        alignment: "center",
                        header: true,
                        text:  '<i class="fa-solid fa-print"></i> Print',
                        className: "btn btn-success btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible',
                            alignment: "center",
                        },
                        // customize: function(doc) {
                        //     console.log(doc)
                        // }
                    },
                    {
                        extend: 'colvis',
                        className: "btn btn-info btn-sm btn-rounded",
                    }
                ],
                ajax: {
                    url: "{{ route('department.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "depertment_name"},
                    {"data": "depertment_location"},
                    {"data": "phone"},
                    {"data": "depertment_image"},
                    // {"data": "status"},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>',
                        previous: '<i class="fa-solid fa-chevron-left"></i>'
                    }
                }
            });
        });
    </script>

@endsection
