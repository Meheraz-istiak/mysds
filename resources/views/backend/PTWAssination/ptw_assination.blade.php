@extends('layouts.default')
@section('title')
   || PtW Assination
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Personal Assination</h3>
        </div>

          <form method="POST" enctype="multipart/form-data" action="{{route('ptw_assination.store')}}">
            @csrf
            <div class="card-body">

                                        <div class="row g-3 align-items-center">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">PTW Issuer Work Area
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="PTW_Issuer">
                                                    <option value="">-- Select Area --</option>
                                                    <option value="Work Area A">Work Area A</option>
                                                    <option value="Work Area B">Work Area B</option>
                                                    <option value="Work Area C">Work Area C</option>
                                                    <option value="Work Area D">Work Area D</option>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <label for="lastname" class="form-label">PTW Issuer Phone Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Issuer_Phone" type="text" class="form-control" id="pnoneNo" required>
                                          </div>


                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">PTW Supervisor
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="PTW_Supervisor">
                                                    <option value="">-- Select Supervisor --</option>
                                                    <option value="Supervisor Name A">Supervisor Name A</option>
                                                    <option value="Supervisor Name B">Supervisor Name B</option>
                                                    <option value="Supervisor Name C">Supervisor Name C</option>
                                                    <option value="Supervisor Name D">Supervisor Name D</option>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <label for="lastname" class="form-label">PTW Supervisor Phone Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Supervisor_Phone" type="text" class="form-control" id="phoneNo" required>
                                          </div>
                                          
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Health & Safety Advisor
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="Safety_Advisor">
                                                    <option value="">-- Select Advisor --</option>
                                                    <option value="Advisor A">Advisor A</option>
                                                    <option value="Advisor B">Advisor B</option>
                                                    <option value="Advisor C">Advisor C</option>
                                                    <option value="Advisor D">Advisor D</option>
                                                </select>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                            <label for="lastname" class="form-label">Health & Safety Advisor Phone number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Advisor_Phone" type="text" class="form-control" id="phoneNo" required>
                                          </div>
                                        </div>
                                        
                                        
                                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                       
                              


                                </div>
                            </form>
                  
                    </div><!-- Row end  -->



<div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0 ml-4">PTW Assination list</h3>

     </div>

                    <div class="card-body">
                            <table id="myProjectTable" class="table table-hover "
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>PTW Issuer</th>
                                    <th>Phone Number</th>
                                    <th>PTW Supervisor</th>
                                    <th>Safety Advisor</th>
                                    
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
                    url: "{{ route('ptw_assination.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "PTW_Issuer"},
                    {"data": "Issuer_Phone"},
                    {"data": "PTW_Supervisor"},
                    {"data": "Safety_Advisor"},
                    
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



                               