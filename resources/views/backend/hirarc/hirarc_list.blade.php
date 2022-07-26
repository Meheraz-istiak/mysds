@extends('layouts.default')

@section('title')
    List of Activity
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

    <div>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>


                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0" style="margin-left: 1rem">HIRARC By Department</h3>

                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover datatable"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Depertment</th>
                                    <th>Location</th>
                                    <th>process</th>
                                    <th>designation</th>
                                    <th>RM_Assessor</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->depertment_name}}</td>
                                        <td>{{$value->location}}</td>
                                        <td>{{$value->process}}</td>
                                        <td>{{$value->ds_name}}</td>
                                        <td>{{$value->rm}}</td>
                                        <td>
                                            <a href="{{route('hirarc.edit',$value->id)}}" class="" > <i class="fas fa-edit"></i></a>||

                                            <a href="{{route('hirarc.destroy',$value->id)}}" class="" > <i class="fas fa-trash" style="color: darkred"></i></a>||

                                            <a href="{{route('hirarc.view',$value->id)}}" class="" > <i class="fas fa-eye" style="color: green"></i></a>

                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0" style="margin-left: 1rem">Sequence of job List</h3>

                        </div>
                        <div class="card-body">
                            <table id="m" class="table table-hover  align-middle mb-0"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Depertment</th>
                                    <th>Job_activity</th>
                                    <th>Sequence job</th>
                                    <th>hazard</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data1 as $key=>$value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->depertment_name}}</td>
                                        <td>{{$value->job_activity}}</td>
                                        <td>{{$value->sequence_job}}<br>

                                        </td>
                                        <td>{{$value->hazard}}<br>
                                        </td>
                                        <td>
                                            <a href="{{route('h_hazard.edit',$value->id)}}" class="" >
                                                <i class="fa fa-edit"></i>
                                            </a>||
                                            <a href="{{route('h_hazard.destroy',$value->id)}}"
                                               class="" >
                                                <i class="fas fa-trash" style="color: darkred"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>





@endsection


@section('script')

    {{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>--}}

    <!-- Jquery Core Js -->
    {{--    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>--}}

    {{--    <!-- Plugin Js-->--}}
    {{--    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>--}}

    {{--    <!-- Jquery Page Js -->--}}
    {{--    <script src="{{asset('assets/js/template.js')}}"></script>--}}

    <script>
        // project data table
        $(document).ready(function () {
            $("#myProjectTable").dataTable({
                responsive: true,
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
                        title: 'HIRARC By Department',
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
                        title: 'HIRARC By Department',
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
                columnDefs: [{targets: '_all', className: "dt-body-left"}],
            });
            $("#m").dataTable({
                responsive: true,
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
                        title: 'Sequence of job List',
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
                        title: 'Sequence of job List',
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
                columnDefs: [{targets: '_all', className: "dt-body-left"}],
            });
            $(".deleterow").on("click", function () {
                let tablename = $(this).closest("table").DataTable();
                tablename.row($(this).parents("tr")).remove().draw();
            });
            // $("#myProjectTable")
            //     .addClass("nowrap")
            //     .dataTable({
            //         responsive: true,
            //         columnDefs: [{ targets: [-1, -3], className: "dt-body-left" }],
            //     });
            // $(".deleterow").on("click", function () {
            //     let tablename = $(this).closest("table").DataTable();
            //     tablename.row($(this).parents("tr")).remove().draw();
            // });
        });


        $(document).ready(function () {
            // $("#m")
            //     .addClass("nowrap")
            //     .dataTable({
            //         responsive: true,
            //         columnDefs: [{ targets: [-1, -3], className: "dt-body-left" }],
            //     });

        });


        // $(document).ready(function() {
        //     $('.datatable').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: "{{ route('hirarc.datatable') }}",
        //             type: 'GET',
        //             'headers': {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             }
        //         },
        //         "columns": [


        //             {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
        //                     {"data": "depertment_id"},
        //                     {"data": "location"},
        //                     {"data": "rm_assessor"},
        //                     // {"data": "job_a.job_activity"},
        //                     // {"data": "job_activity"},
        //                     // {"data": "job_activity"},
        //                     // {"data": "job_activity"},

        //                     // {"data": "image"},



        //             {data: 'action', name: 'action', orderable: false, searchable: false}
        //         ],
        //         language: {
        //             paginate: {
        //                 next: '<i class="bx bx-chevron-right">',
        //                 previous: '<i class="bx bx-chevron-left">'
        //             }
        //         }
        //     });




        // });

    </script>


@endsection


