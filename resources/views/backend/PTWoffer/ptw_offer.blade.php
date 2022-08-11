@extends('layouts.default')

@section('title')
    || PTW Offer
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Offer</h3>
        </div>
            <form method="POST" action="{{route('ptw_offer.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Work Request ref#
                                <span class="text-danger">*</span>
                            </label>
                            <input name="reference"

                                   type="text"
                                   value="{{$reference_no}}"

                                   class="form-control" id="workRequesRef" readonly required>
                        </div>
                        <div class="col-md-6">
                            <label for="conName&Id" class="form-label">Select Contractor to offer PTW
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Contractor_offer">
                                <label for="" class="form-label"></label>
                                <option value>---Choose----</option>
                                <option value="repearing">repearing</option>
                                <option value="maintainence">maintainence</option>
                                <option value="repearing">repearing</option>
                                <option value="maintainence">maintainence</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="ptwType" class="form-label">Primary PTW Type
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Primary_PTW">
                                <option value>---Choose----</option>
                                <option value="Cold Work">Cold Work</option>
                                <option value="Hot Work">Hot Work</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="sePermitType" class="form-label">Secondary Permit Type
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" name="Secondary_Permit">
                                <option value>---Choose----</option>
                                <option value="Working at Height">Working at Height</option>
                                <option value="High Voltate Electricity">High Voltate Electricity</option>
                                <option value="High Rist Chemicals">High Rist Chemicals</option>
                                <option value="Confined Space Entry">Confined Space Entry</option>
                                <option value="None">None</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="PermitValidity" class="form-label">Permit Validity
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Permit_Validity">
                                <option value>---Choose----</option>
                                <option value="12 Hours (Cold Work)">12 Hours (Cold Work)</option>
                                <option value="8 Hours (Hot Works)">8 Hours (Hot Works)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="department-type" class="form-label"> Department
                                <span class="text-danger">*</span>
                            </label>

                            <select class=" form-control" name="department_id" id="department_id">
                                @foreach($department as $list)

                                    <option value="{{$list->id}}">

                                        {{isset($list->id)? $list->depertment_name: ''}} </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Requested Work Start Date
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="workdate" id="workdate" required>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Main Work Area 
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Work_Area">
                                <option value>---Choose----</option>
                                <option value="Area 1">Area 1</option>
                                <option value="Area 2">Area 2</option>
                                <option value="Area 3">Area 3</option>
                                <option value="Area 4">Area 4</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Area Authority-Main Work Area
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Area_Authority">
                                <option value>---Choose----</option>
                                <option value="Area Authority A">Area Authority A</option>
                                <option value="Area Authority B">Area Authority B</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Work Type
                                <span class="text-danger">*</span>
                             </label>

                            <select class=" form-control" name="Work_Type">
                                <option value>---Choose----</option>
                                <option value="daily">daily</option>
                                <option value="weekly">weekly</option>
                                <option value="monthly">monthly</option>
                                <option value="when required">when required</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Would the work affect any other area?
                                    <span class="text-danger">*</span>
                                </label>
                                <br>
                                <label class="fancy-radio" style="margin-right: 30px;">
                                    <input type="radio" name="other_area" value="1" required
                                           data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                    <span><i></i>Yes</span>
                                </label>
                                <label class="fancy-radio" style="margin-right: 30px;">
                                    <input type="radio" name="other_area" value="2" data-parsley-multiple="gender">
                                    <span><i></i>No</span>
                                </label>
                                <label class="fancy-radio" style="margin-right: 30px;">
                                    <input type="radio" name="other_area" value="3" data-parsley-multiple="gender">
                                    <span><i></i>May be</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="addnote" class="form-label">Work details
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="Work_details" class="form-control" id="addnote" rows="3"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Asset
                                <span class="text-danger">*</span>
                            </label>
                            <select class=" form-control" name="Asset">
                                <option value>---Choose----</option>
                                <option value="Attending">Attending</option>
                                <option value="Not Attend">Not Attend</option>
                                <option value="select date">select date</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Isolation Procedure 
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="Isolation_Procedure" id="firstname" required>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Would the work affect any other area?
                                    <span class="text-danger">*</span>
                                </label>
                                <br/>
                                <label class="fancy-radio" style="margin-right: 30px;">
                                    <input type="radio" name="work_affect" value="0" required
                                           data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                    <span><i></i>Yes- include in assign contractor list</span>
                                </label>
                                <label class="fancy-radio" style="margin-right: 30px;">
                                    <input type="radio" name="work_affect" value="1" data-parsley-multiple="gender">
                                    <span><i></i>No-remove from assign contractor list & submit form</span>
                                </label>
                                <p id="error-radio"></p>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" style="padding: 10px 40px;">submit</button>
                </div>

            </form>
    </div><!-- Row end  -->
    <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0 ml-3">PTW Offer list</h3>

        </div>
        <div class="card-body">
            <table id="myProjectTable" class="table table-hover datatable align-middle mb-0 "
                   style="width:100%">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Contractor offer</th>
                    <th>Primary PTW</th>
                    <th>Secondary Permit</th>
                    <th>workdate</th>
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
    <!-- Jquery Page Js -->
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
                    url: "{{ route('ptw_offer.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "Contractor_offer"},
                    {"data": "Primary_PTW"},
                    {"data": "Secondary_Permit"},
                    {"data": "workdate"},
                    {"data": "reference"},
                    
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



