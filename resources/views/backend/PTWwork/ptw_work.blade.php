@extends('layouts.default')

@section('title')
   || PTW Work 
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Work Request</h3>
        </div>

        <form method="POST" action="{{ route('ptw_work.store')}}" enctype="multipart/form-data">


            @csrf
            <div class="card-body">

                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="firstname" class="form-label">Work Request ref#
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control"
                               name="reference"
                               id="reference"
                               value="{{$reference_no}}"
                               required readonly
                               style="background-color: white;">
                    </div>

                    <div class="col-md-4">
                        <label for="department-type" class="form-label"> Department
                            <span class="text-danger">*</span>
                        </label>

                        <select class=" form-control" name="depertment_id" id="depertment_id">
                            @foreach($department as $list)

                                <option value="{{$list->id}}">

                                    {{isset($list->id)? $list->depertment_name: ''}} </option>

                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-4">
                        <label for="work-type" class="form-label">Work type
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control" name="work_type" id="work_type">
                            <option value>---Work type----</option>
                            <option value="name">name</option>
                            <option value="contact number">contact number</option>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="work-details" class="form-label">Work details
                            <span class="text-danger">*</span>
                        </label>
                        <textarea
                            name="work_detalis"

                            class="form-control" id="work_detalis" rows="3">

                                            </textarea>
                    </div>


                    <div class="col-md-12">
                        <label for="work-area" class="form-label">Main Work Area
                            <span class="text-danger">*</span>
                         </label>
                        <select class="form-control" name="work_area" id="work_area">
                            <option value>---Main Work Area----</option>
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

                                <input type="radio" value="yes" onclick="javascript:yesnoCheck();" name="yesno"
                                       id="yesCheck">

                                <span><i></i>Yes</span>

                            </label>


                            <label class="fancy-radio" style="margin-right: 30px;">
                                <input type="radio" value="no" onclick="javascript:yesnoCheck();" name="yesno"
                                       id="noCheck">
                                <span><i></i>No</span>

                            </label>

                            <label class="fancy-radio" style="margin-right: 30px;">

                                <input type="radio" value="maybe" onclick="javascript:yesnoCheck();" name="yesno"
                                       id="maybeCheck">

                                <span><i></i>May be</span>

                            </label>
                            <p id="error-radio"></p>
                        </div>

                    </div>


                    <div class="col-md-6" id="ifYes">

                        <label for="effected" class="form-label">other effected area
                            <span class="text-danger">*</span>
                        </label>
                        <select class=" form-control" name="effected_area">
                            <option value>---other effected area----</option>
                            <option value="Attending">Attending</option>
                            <option value="Not Attend">Not Attend</option>
                            <option value="select date">select date</option>
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="firstname"

                               class="form-label">Asset that requires work. (If applicable)
                               <span class="text-danger">*</span>
                           </label>
                    </div>

                    <div class="col-md-6">
                        <input
                            name="Assest_name"

                            type="text" class="form-control" id="assest-name" placeholder="Assest Name" required>
                    </div>


                    <div class="col-md-6">
                        <input name="Assest_id"

                               type="text" class="form-control" id="assest-id" placeholder="Assest ID" required>
                    </div>


                    <div class="col-md-4">
                        <label for="firstname" class="form-label">Work Start Date
                            <span class="text-danger">*</span>
                        </label>
                        <select class=" form-control" name="start_date">
                            <option value>---Work Start Date----</option>
                            <option value="Attending">Attending</option>
                            <option value="Not Attend">Not Attend</option>
                            <option value="select date">select date</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="preferredContractor" class="form-label">Preferred Contractor
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control" name="creferred_contractor">
                            <option value>---Preferred Contractor----</option>
                            <option value="Attending">Attending</option>
                            <option value="Not Attend">Not Attend</option>
                            <option value="select date">select date</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="firstname" class="form-label">Upload Asset Isolation Procedure
                            <span class="text-danger">*</span>
                        </label>
                        <input name="Isolation_file" type="file" class="form-control" id="Asset-upload" required>
                    </div>
                </div>


                <button type="text" class="btn btn-primary" style="padding: 10px 40px; margin-top: 10px;">submit
                </button>
                <button type="text" class="btn btn-primary" style="padding: 10px 40px; margin-top: 10px;">clear
                    form
                </button>

            </div>

        </form>
    </div>


     <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0" style="margin-left: 1rem"> PTW Work List</h3>
        </div>

        
        <div class="card-body">
            <table id="myProjectTable" class="table table-hover "
                   style="width:100%">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Depertment</th>
                    <th>work type</th>
                    <th>work_detalis</th>
                    <th>Assest_name</th>
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
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
               
                ajax: {
                    url: "{{ route('ptw_work.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "depertment_name"},
                    {"data": "work_type"},
                    {"data": "work_detalis"},
                    {"data": "Assest_name"},
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

    <script>

        function yesnoCheck() {
            if (document.getElementById("yesCheck").checked) {
                document.getElementById("ifYes").style.visibility = "visible";

            } else if (document.getElementById("maybeCheck").checked) {
                document.getElementById("ifYes").style.visibility = "visible";

            } else document.getElementById("ifYes").style.visibility = "hidden";


        }


    </script>





@endsection



