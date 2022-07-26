@extends('layouts.default')

@section('title')
    Hirarc View
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success message">
                <p>{{ $message }}</p>
            </div>
        @endif


                                    <div class="card p-xl-5 p-lg-4 p-0">
                                        <div class="card-header">
                                            <h3 style="text-align: center;">HIRARC - ST Regis</h1>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-3 pb-3 border-bottom">
                                                Department: {{$data1->depertment_name}}
                                                <strong>



                                        </strong>
                                                <span class="float-end"> <strong>Reference No:</strong>{{ $data1->Reference_no}}</span>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                    <h6 class="mb-3 col-md-3"><strong>Process:</strong> <span>{{ $data1->process}}</span>
                                                    </h6>
                                                    <p class="col-md-3"><strong>location:</strong><span>{{$data1->location}}</span></p>
                                                    <p class="col-md-3"><strong>Review Date:</strong><span>{{$data1->date}}</span></p>
                                                    <p class="col-md-3"><strong>Last Assesment Date</strong><span>{{$data1->assessment_date}}</span></p>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="row">
                                                          <h6 class=" col-md-3"><strong>RM Assessor:</strong> <span  style="text-align: right;">{{$data1->m2}}</span>
                                                          </h6>
                                                          <p class="col-md-2"><strong>RM Team 1  :</strong><span style="text-align: right;">{{$data1->m3}}</span></p>
                                                          <p class="col-md-2"><strong>RM Team 2  :</strong><span style="text-align: right;">{{$data1->m4}}</span></p>
                                                          <p class="col-md-2"><strong>RM Team 3  :</strong><span style="text-align: right;">{{$data1->m5}}</span></p>
                                                          <p class="col-md-3"><strong>RM Team 4  :</strong><span style="text-align: right;">{{$data1->m6}}</span></p>
                                                    </div>

                                                </div>
                                            </div> <!-- Row end  -->

                                        </div>
                                    </div>


    </div>


        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('assets/js/template.js')}}"></script>

    <script>
      // project data table
      $(document).ready(function () {
        $(".myProjectTable")
          .addClass("nowrap")
          .dataTable({
            responsive: false,
            columnDefs: [{ targets: [-1, -3], className: "dt-body-left" }],
          });
        $(".deleterow").on("click", function () {
          var tablename = $(this).closest("table").DataTable();
          tablename.row($(this).parents("tr")).remove().draw();
        });
      });


     // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);
                    $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('hirarc.datatable') }}",
                            type: 'GET',
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        "columns": [
                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                            {"data": "depertment_id"},
                            {"data": "reference_no"},
                            {"data": "phone"},
                            {"data": "depertment_image"},
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
                });

                 </script>


@endsection
