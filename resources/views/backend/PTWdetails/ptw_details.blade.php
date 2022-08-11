@extends('layouts.default')

@section('title')
   || PTW Details
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
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('message')}}
            </div>
        @endif
    </div>
    <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Details</h3>
        </div>
        <div class="card mb-3">
            <form method="POST" action="{{route('ptw_details.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row g-3 align-items-center">
                        <div class="col-sm-4 col-md-4">
                            <label for="lastname" class="form-label">Primary PTW Type
                                <span class="text-danger">*</span>
                            </label>
                            <input name="Primary_PTW" type="text" class="form-control" id="lastname" required>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <label for="lastname" class="form-label">Secondary PTW Type
                                <span class="text-danger">*</span>
                            </label>
                            <input name="Secondary_PTW" type="text" class="form-control" id="lastname" required>
                        </div>

                        <div class="col-md-4">
                            <label for="lastname" class="form-label">PTW Ref #
                                <span class="text-danger">*</span>

                            </label>
                            <input name="PTW_Ref" value="{{$reference_no}}" type="text" class="form-control"
                                   id="lastname" required readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="lastname" class="form-label">Permit Duration
                                <span class="text-danger">*</span>
                            </label>
                            <input name="Permit_Duration" type="number" class="form-control" id="lastname" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Isolation Required?
                                <span class="text-danger">*</span>
                            </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input name="Isolation_Required" class="form-check-input" type="radio"
                                               name="exampleRadios" id="exampleRadios11" value="0"> <!--checked=""-->
                                        <label class="form-check-label" for="exampleRadios11">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input name="Isolation_Required" class="form-check-input" type="radio"
                                               name="exampleRadios" id="exampleRadios22" value="1">
                                        <label class="form-check-label" for="exampleRadios22">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="admitdate" class="form-label">Work Start Date
                                <span class="text-danger">*</span>
                            </label>
                            <input name="Start_Date" type="date" class="form-control w-100" id="admitdate" required>
                        </div>

                        <div class="col-md-4">
                            <label for="admitdate" class="form-label">Expected Work End Date
                                <span class="text-danger">*</span>
                            </label>
                            <input name="End_Date" type="date" class="form-control w-100" id="admitdate" required>
                        </div>

                        <div class="col-md-4">
                            <label for="formFileMultiple" class="form-label">SWP / JSA
                                <span class="text-danger">*</span>
                            </label>
                            <input name="SWP" class="form-control" type="file" id="formFileMultiple" multiple required>
                        </div>


                        <div class="col-md-4">
                            <label for="addnote" class="form-label">Planned work flow
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="work_flow" class="form-control" placeholder="List Down Work Flow"
                                      id="addnote" rows="3"></textarea>
                        </div>


                        <div class="col-md-12">
                            <div id="inputFormRow">

                                <label for="lastname" class="form-label">List of Tools & Equipment -pre-fill from ptw
                                    offer
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-3">

                                    <input type="text" name="Equipment_pre_fill[]" class="form-control m-input"
                                           placeholder="Enter title" autocomplete="off">
                                    <div class="input-group-append">
                                        <button style="margin-left: 10px;" id="removeRow" type="button"
                                                class="btn btn-danger">Remove
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow"></div>
                            <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                        </div>

                        <div class="col-md-4">
                            <label for="lastname" class="form-label">List of workers -pre-fill from ptw offer
                                <span class="text-danger">*</span>
                            </label>
                            <input name="workers_pre_fill" type="text" class="form-control " placeholder="Name"
                                   id="lastname" required>
                        </div>

                        <div class="col-md-4">
                            <label></label>
                            <input name="phone_no" type="text" class="form-control" placeholder="Phone No" id="lastname"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label></label>
                            <input name="ptw_id" type="text" class="form-control" placeholder="Id" id="lastname"
                                   required>
                        </div>


                        <div class="col-sm-6 col-md-12">
                            <div class="form-group">
                                <label class="form-label">PPE REQUIRED 
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control multiple" multiple="multiple" name="ppe_required[]">
                                    <option value="">-- Select PPE Required --</option>
                                    <option value="RE">Respirator</option>
                                    <option value="VA">Safety Glasses</option>
                                    <option value="AL">Safety Shoes</option>
                                    <option value="DZ">Knitted Gloves</option>
                                    <option value="DZ">Safety Harness</option>
                                    <option value="DZ">Nitrile Glove</option>
                                    <option value="DZ">OTHERS</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </div>

            </form>
        </div>

    </div>



                <div class="card mb-3">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0 ml-4">PTW Details list</h3>

                    </div>
                    <div class="card-body">
                        <table id="myProjectTable" class="table table-hover "
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Primary PTW</th>
                                <th>Secondary PTW</th>
                                <th>Permit Duration</th>
                                <th>work flow</th>
                                <th>phone Number</th>
                                <th>Photo</th>
                                <th>Reference Number</th>

                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                          


                            </tbody>
                        </table>
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
            $('#myProjectTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Department Data',
                        text:      '<i class="fa-solid fa-file-excel"></i> Excel',
                        className: "btn btn-primary btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible'
                        },
                    },

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
                   
                ],
               
                ajax: {
                    url: "{{ route('ptw_details.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "Primary_PTW"},
                    {"data": "Secondary_PTW"},
                    {"data": "Permit_Duration"},
                    {"data": "work_flow"},
                    {"data": "phone_no"},
                    {"data": "SWP"},
                    {"data": "PTW_Ref"},
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


                        <script type="text/javascript">
                            // add row
                            $("#addRow").click(function () {
                                var html = '';
                                html += '<div id="inputFormRow">';
                                html += '<div class="input-group mb-3">';
                                html += '<input type="text" name="Equipment_pre_fill[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
                                html += '<div class="input-group-append">';
                                html += '<button style="margin-left: 10px;" id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                                html += '</div>';
                                html += '</div>';

                                $('#newRow').append(html);
                            });

                            // remove row
                            $(document).on('click', '#removeRow', function () {
                                $(this).closest('#inputFormRow').remove();
                            });
                        </script>


                       



                    


                        <!-- select2 multi dropdown -->
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(function () {
                                // initialize after multiselect
                                $('#basic-form').parsley();
                            });
                        </script>
                        <script>
                            $(document).ready(function () {
                                $('.multiple').select2();
                            });
                        </script>



@endsection



