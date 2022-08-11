@extends('layouts.default')

@section('title')

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style type="text/css">
        #send-mail, #edit{
            margin-right:1rem;
            font-weight: bolder;
            display: inline-block;
            color: #000;
            text-decoration: none;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
        }
        #send-mail:after, #edit:after{
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #000;
            transition: width .6s;
        }
        #send-mail:hover::after, #edit:hover::after{
            width: 100%;
            /*border-bottom: 2px solid brown;*/
        }
    </style>
@endsection

@section('content')



    <!-- main body area -->

    <div class="main px-lg-4 px-md-4">
        <div class="body d-flex py-3">
            <div class="container-xxl" id="contant">
                <div class="card">
                    <div class="card-header
                    py-3 no-bg bg-transparent
                    border-bottom flex-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="fw-bold mb-0">ERP List</h3>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-info btn-sm" href="{{ route('committee.index') }}">
                                    <i class="fas fa-eye"></i> View Appointment
                                </a>
                            </div>
                            <div class="col-md-3">
                                <button type="button"
                                        id="modal-btn"
                                        class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#expAdd">
                                    <i class="fas fa-plus-circle"></i>Add ERP
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="card-content">

                        @php

                            $count_Manager =  $Security_Manager->count();

                            $count_emergency_manager =  $emergency_manager->count();

                            $count_incident_manager =  $incident_manager->count();

                            $count_search_rescue_team =  $search_rescue_team->count();

                            $count_medic_team =  $medic_team->count();

                            $count_area_warden =  $area_warden->count();

                            $count_traffic_control =  $traffic_control->count();
                            

                        @endphp

                       

                        

                        @if($count_Manager !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $Security_Manager[0]->designation }} </h1>

                        @endif

                        <div id="Security_Manager"></div>



                        @if($count_emergency_manager !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $emergency_manager[0]->designation }} </h1>

                        @endif

                        <div id="emergency_manager"></div>

                        @if($count_incident_manager !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $incident_manager[0]->designation }} </h1>

                        @endif

                        <div id="incident_manager"></div>


                       @if($count_search_rescue_team !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $search_rescue_team[0]->designation }} </h1>

                        @endif

                        <div id="search_rescue_team"></div>



                        @if($count_medic_team !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $medic_team[0]->designation }} </h1>

                        @endif

                        <div id="medic_team"></div>

                        @if($count_area_warden !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $area_warden[0]->designation }} </h1>

                        @endif

                        <div id="area_warden"></div>


                        @if($count_traffic_control !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $traffic_control[0]->designation }} </h1>

                        @endif

                        <div id="traffic_control"></div>

                    </div>

                </div>

                <!-- Add Committee Modal-->

                <div class="modal fade" id="expAdd" tabindex="-1" role="dialog" aria-labelledby="expAddModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add ERP Member</h5>
                                <button class="close close-btn" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('erp.store')}}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row g-3 mb-3">

                                        <div class="col-sm-6">

                                            <label for="item" class="form-label">Employee

                                                <span class="text-danger">*</span>

                                            </label>

                                            <select

                                                name="employee_id"

                                                id="employee_id" autofocus

                                                class="form-control col-md-12">

                                                <option value="">Select Employee</option>

                                                @foreach($employees as $list)

                                                    <option value="{{ $list->id }}">{{ $list->em_name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-sm-6">

                                            <label class="form-label">Select Position

                                                <span class="text-danger">*</span>

                                            </label>

                                            <select name="designation"

                                                    id="designation" class="form-control col-md-12">

                                                <option value="">Select Position</option>

                                                <option id="ch" value="Emergency Manager">Emergency Manager</option>

                                                <option id="in" value="Incident Manager">Incident Manager</option>

                                                <option id="sec" value="Security Manager">Security Manager</option>

                                                <option id="srt" value="Search Rescue Team">Search Rescue Team</option>


                                                <option id="mt" value="Medic Team">Medic Team</option>

                                                <option id="aw" value="Area Warden">Area Warden</option>

                                                <option id="tc" value="Traffic Control">Traffic Control</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="btn-modal"></div>

                                    <div class="row">

                                        <div class="col-sm-12 d-flex justify-content-end">

                                            <div class="btn-group">

                                                <button type="button"

                                                        class="btn btn-secondary" data-bs-dismiss="modal">

                                                    <i class="icofont-ui-close"></i> Close

                                                </button>

                                                <button type="submit" id="create-btn" class="btn btn-primary">

                                                    <i class="icofont-save"></i> Save</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Committee-->

                <div class="modal fade" id="edit_committee" tabindex="-1" role="dialog" aria-labelledby="edit_committeeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Safety Commity Member</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST"   id="edit_committee_form" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" id="edit_form_id">

                                    <div class="row g-3 mb-3">

                                        <div class="col-sm-6">

                                            <label for="item" class="form-label">Employee

                                                <span class="text-danger">*</span>

                                            </label>

                                            <select

                                                name="employee_id"

                                                id="employee_id" autofocus

                                                class="form-control col-md-12">

                                                <option value="">Select Employee</option>

                                                @foreach($employees as $list)

                                                    <option value="{{ $list->id }}">{{ $list->em_name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-sm-6">

                                            <label class="form-label">Select Position

                                                <span class="text-danger">*</span>

                                            </label>

                                            <select name="designation"

                                                    id="edit_designation" readonly class="form-control col-md-12">

                                                <option value="">Select Position</option>

                                                <option value="Emergency Manager">Emergency Manager</option>

                                                <option  value="Incident Manager">Incident Manager</option>

                                                <option  value="Security Manager">Security Manager</option>

                                                <option value="Search Rescue Team">Search Rescue Team</option>


                                                <option value="Medic Team">Medic Team</option>

                                                <option value="Area Warden">Area Warden</option>

                                                <option value="Traffic Control">Traffic Control</option>
                                            </select>

                                        </div>

                                    </div>



                                    <div class="btn-modal"></div>

                                    <div class="row">

                                        <div class="col-sm-12 d-flex justify-content-end">

                                            <div class="btn-group">

                                                <button type="button"

                                                        class="btn btn-secondary" data-bs-dismiss="modal">

                                                    <i class="icofont-ui-close"></i> Close

                                                </button>

                                                <button type="submit" class="btn btn-primary">

                                                    <i class="icofont-save"></i> Save</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

        $("#expadd").on('shown.bs.modal', function () {

            $(this).find('#employees').focus();

        });

        $(document).ready(function (e) {

            $(document).on('click', '.close-btn', function(id){
                $('#expAdd').modal('hide');
            });



            $.get('/ERP/getData', function (data) {

                console.log(data.traffic_contro);

                if (data.emergency_manager[0].designation === 'Emergency Manager')

                {

                    $('#ch').css('display', 'none');

                }

                if (data.Security_Manager[0].designation === 'Security Manager')

                {

                    $('#sec').css('display', 'none');

                }

                if (data.incident_manager[0].designation === 'Incident Manager')

                {

                    $('#in').css('display', 'none');

                }


               if (data.search_rescue_team[0].designation === 'Search Rescue Team')

                {

                    $('#srt').css('display', 'none');

                }

                if (data.medic_team[0].designation === 'Medic Team')

                {

                    $('#mt').css('display', 'none');

                }

                if (data.area_warden[0].designation === 'Area Warden')

                {

                    $('#aw').css('display', 'none');

                }

                if (data.traffic_control[0].designation === 'Traffic Control')

                {

                    $('#tc').css('display', 'none');

                }

            }, 'json');



            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('#committee').on('submit',function(e) {

                e.preventDefault();

                let formData = new FormData(this);



                $.ajax({

                    method:"POST",

                    url: "{{ route('erp.store') }}",

                    data: formData,

                    cache:false,

                    contentType: false,

                    processData: false,

                    success: (data) => {

                        this.reset();

                        $('#expadd').modal('hide');

                        let msg = 'Committee Successfully Inserted !!';

                        window.location.reload();

                        toastr.success(msg);

                    },

                    error: function(data){

                        let msg = 'Something Went Wrong !!';

                        toastr.error(msg);

                        console.log(data);

                    }

                });

            });

            let committeeData = $.get('{{ route('erp.getData') }}',function(data){

                let Security_Manager = data.Security_Manager

                let emergency_manager = data.emergency_manager

                let incident_manager = data.incident_manager

                let search_rescue_team = data.search_rescue_team

                let medic_team = data.medic_team

                let area_warden = data.area_warden

                let traffic_control = data.traffic_control

                

                let Security_Manager_res='';

                let emergency_manager_res='';

                let incident_manager_res='';

                let search_rescue_team_res='';

                let medic_team_res='';

                let area_warden_res='';

                let traffic_control_res='';


                 $.each (traffic_control, function (key, value)
                 {

                    traffic_control_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );


                $.each (area_warden, function (key, value)
                 {

                    area_warden_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );


                $.each (medic_team, function (key, value)
                 {

                    medic_team_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );


                $.each (search_rescue_team, function (key, value)
                 {

                    search_rescue_team_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );


                $.each (incident_manager, function (key, value)
                 {

                    incident_manager_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );


                $.each (emergency_manager, function (key, value)
                 {

                    emergency_manager_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );

                $.each (Security_Manager, function (key, value)
                 {

                     


                    Security_Manager_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +

                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> Edit <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px; \">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +


                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                            Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                }
                );

                
                 $('#Security_Manager').html(Security_Manager_res);

                $('#emergency_manager').html(emergency_manager_res);

                $('#incident_manager').html(incident_manager_res);

                $('#search_rescue_team').html(search_rescue_team_res);

                $('#medic_team').html(medic_team_res);

                $('#area_warden').html(area_warden_res);

                $('#traffic_control').html(traffic_control_res);
                

            });

            $('#edit_committee_form').on('submit',function(e) {

                e.preventDefault();

                // let id = $(this).data('id');

                let id = $('#edit_committee_form').find('input[name="id"]').val();

                // let committeData = committeeData.responseJSON;


                let formData = new FormData(this);

                $.ajax({

                    type:'POST',

                    url: "/ERP/update/"+''+ id,

                    data: formData,

                    cache:false,

                    contentType: false,

                    processData: false,

                    success: (data) => {

                        // this.reset();

                        $('#edit_committee').modal('hide');

                        let msg = 'Committee Successfully Updated !!';

                        window.location.reload();

                        toastr.success(msg);

                    },

                    error: function(data){

                        let msg = 'Something Went Wrong !!';

                        toastr.error(msg);

                        console.log(data);

                    }

                });

            });

            $(document).on('click', '#edit', function(e){

                e.preventDefault();

                let id = $(this).data('id');

                // console.log(id);

                $('#edit_committee').find('form')[0].reset();

                $('#edit_committee').find('span.error-text').text('');

                $.post('/ERP/edit'+'/'+ id,{ id:id }, function (data) {

                    console.log(committeeData);

                    // $('#designation option:not(:selected)').remove();

                    // $('select[readonly] option:not(:selected)').prop('disabled', true);

                    $('#edit_designation').css('pointer-events', 'none');



                    $('#edit_committee').find('input[name="id"]').val(data.erp.id);

                    $('#edit_committee').find('select[name="employee_id"]').val(data.erp.employee_id);

                    $('#edit_committee').find('select[name="designation"]').val(data.erp.designation);

                    $('#edit_committee').find('#old_committee_pic').attr('src', "{{ asset('uploads/safetyCommittee') }}"+ '/' + data.erp.photo);

                    // $('#expadd').modal('show');

                }, 'json');

            });

        });

        function readURL(input) {

            $("#new_committee_pic_div").fadeOut(5000).attr("style", "display:none");

            if (input.files && input.files[0]) {

                $("#new_committee_pic_div").fadeIn(2000).attr("style", "display:block");



                let reader = new FileReader();

                reader.onload = function (e) {

                    $('#new_committee_pic').attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

        }

        $(document).on('click', '#send-mail', function () {
            let id = $(this).data('id');
            swal(
                'Success',
                'Mail Send <b style="color:green;">Successfully</b>!',
                'success'
            )
            $.ajax({
                url: "/mail-sending"+'/'+id,
                type: "POST",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success: function (data) {
                }
            });
        });

    </script>

@endsection
