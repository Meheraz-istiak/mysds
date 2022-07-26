@extends('layouts.default')

@section('css')
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

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

        <div class="body d-flex py-3">
            <div class="container-xxl">
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0" style="margin-left: 2rem">Accident Analysis List</h3>
                            <div class="col-auto d-flex w-sm-100">
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover table-responsive datatable align-middle mb-0" style="width: 100%">
                                <thead>
                                <tr class="text-nowrap">
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Incident location</th>
                                    <th>Type of accident</th>
                                    <th>Time of accident</th>
                                    <th>Repost to DOSH</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$v_data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $v_data->em_name }}</td>
                                        <td>{{ $v_data->depertment_name }}</td>
                                        <td>{{ $v_data->em_des }}</td>
                                        <td>{{ $v_data->l_of_incident }}</td>
                                        <td>
                                            @if($v_data->t_of_accident==1)
                                                Near miss
                                            @elseif($v_data->t_of_accident==2)
                                                First Aid Injury
                                            @elseif($v_data->t_of_accident==3)
                                                Injury(4 days MC)
                                            @elseif($v_data->t_of_accident==4)
                                                Serious Bodily Injury
                                            @elseif($v_data->t_of_accident==5)
                                                Fatal Injury
                                            @elseif($v_data->t_of_accident==6)
                                                Occupational Diseases
                                            @elseif($v_data->t_of_accident==7)
                                                Occupational Poisoning
                                            @elseif($v_data->t_of_accident==8)
                                                Dangerus Occurrence
                                            @endif
                                        </td>
                                        <td>{{ $v_data->tim_of_incident }}</td>
                                        <td>
                                            @if($v_data->rpt_to_dosh==1)
                                                Yes
                                            @elseif($v_data->rpt_to_dosh==2)
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <i class="fas fa-eye cursor-pointer text-info" title="View Details"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>
    </div>



@endsection


@section('javascript')

    {{--    <!-- Jquery Core Js -->--}}
    {{--    <script src="assets/bundles/libscripts.bundle.js"></script>--}}

    {{--    <!-- Plugin Js-->--}}
    {{--    <script src="assets/bundles/dataTables.bundle.js"></script>--}}

    {{--    <!-- Jquery Page Js -->--}}
    {{--    <script src="assets/js/template.js"></script>--}}

    <script type="text/javascript">

        // function format(d) {
        //     // `d` is the original data object for the row
        //     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        //         '<tr>' +
        //         '<td>Full name:</td>' +
        //         '<td>' + d.employee.em_name + '</td>' +
        //         '</tr>' +
        //         '<tr>' +
        //         '<td>Extension number:</td>' +
        //         '<td>' + d.country.country + '</td>' +
        //         '</tr>' +
        //         '<tr>' +
        //         '<td>Extra info:</td>' +
        //         '<td>And any further details here (images etc)...</td>' +
        //         '</tr>' +
        //         '</table>';
        // }
        $(document).ready(function() {
            $(".datatable").dataTable({
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
                        title: 'Accident Analysis List',
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
                        title: 'Accident Analysis List',
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
                columnDefs: [{targets: [-1, -3], className: "dt-body-center"}],
            });
            {{--var table = $('.datatable').DataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    ajax: {--}}
            {{--        url: "{{ route('create_ispection.datatable') }}",--}}
            {{--        type: 'GET',--}}
            {{--        'headers': {--}}
            {{--            'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
            {{--        }--}}
            {{--    },--}}
            {{--    "columns": [--}}
            {{--        {--}}
            {{--            "className": 'dt-control',--}}
            {{--            "orderable": false,--}}
            {{--            "data": null,--}}
            {{--            "defaultContent": ''--}}
            {{--        },--}}

            {{--        {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},--}}
            {{--        {"data": "country.country"},--}}
            {{--        {"data": "inspection_title"},--}}
            {{--        {"data": "image"},--}}
            {{--        {"data": "employee.em_name"},--}}
            {{--        {"data": "priority"},--}}
            {{--        {"data": "admitdate"},--}}
            {{--        {"data": "targetdate"},--}}

            {{--        {data: 'action', name: 'action', orderable: false, searchable: false}--}}
            {{--    ],--}}
            {{--    language: {--}}
            {{--        paginate: {--}}
            {{--            next: '<i class="bx bx-chevron-right">',--}}
            {{--            previous: '<i class="bx bx-chevron-left">'--}}
            {{--        }--}}
            {{--    }--}}
            {{--});--}}

            // $('.datatable tbody').on('click', 'td.dt-control', function () {
            //     var tr = $(this).closest('tr');
            //     var row = table.row( tr );
            //
            //     if ( row.child.isShown() ) {
            //         // This row is already open - close it
            //         row.child.hide();
            //         tr.removeClass('shown');
            //     }
            //     else {
            //         // Open this row
            //         row.child( format(row.data()) ).show();
            //         tr.addClass('shown');
            //     }
            // } );


        });

    </script>


@endsection


