@extends('layouts.default')

@section('title')
    Inspection List
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

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="fw-bold mb-0">WorkPlace Inspection List</h3>
                            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#expadd"><a href="{{route('create_ispection.index')}}"><i class="fas fa-plus"></i> Add Workplace Inspection</a>
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover datatable align-middle mb-0"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>LOCATION</th>
                                    <th>PICTURE</th>
                                    <th>PIC</th>
                                    <th>PRIORITY</th>
                                    <th>TARGET DATE</th>
                                    <th>Admit DATE</th>
                                    <th>Action</th>
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


    </div>
    </div>



@endsection

@section('javascript')
    <script>
        // project data table
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);
            $(document).ready(function() {
                let table = $('.datatable').DataTable({
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
                            title: 'Recent Inspection List Data',
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
                            title: 'Recent Inspection List Data',
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
                        url: "{{ route('create_ispection.datatable') }}",
                        type: 'GET',
                        'headers': {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    "columns": [


                        {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                        {"data": "country.country"},
                        {"data": "image"},
                        {"data": "employee.em_name"},
                        {"data": "priority"},
                        {"data": "admitdate"},
                        {"data": "targetdate"},

                        // {"data": "status"},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    language: {
                        paginate: {
                            next: '<i class="bx bx-chevron-right">',
                            previous: '<i class="bx bx-chevron-left">'
                        }
                    }
                });

                // $('.datatable tbody').on('click', 'td.dt-control', function () {
                //     let tr = $(this).closest('tr');
                //     let row = table.row( tr );
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
        });
    </script>

@endsection
