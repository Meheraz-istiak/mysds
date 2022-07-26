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
                                <h3 class="fw-bold mb-0">Safety Committee List</h3>
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
                                    <i class="fas fa-plus-circle"></i> Add Safety Committee
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="card-content">

                        @php

                            $count = $management_representative->count();

                            $count_emp_rep = $employee_representative->count();

                            $count_chairman = $chairman->count();

                            $count_secretary = $secretary->count();

                        @endphp

                        @if($count_chairman !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $chairman[0]->designation }} </h1>

                        @endif

                        <div id="chairman"></div>

                        @if($count_secretary !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $secretary[0]->designation }} </h1>

                        @endif

                        <div id="secretary"></div>

                        @if($count_emp_rep !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $employee_representative[0]->designation }} </h1>

                        @endif

                        <div id="employee_representative"></div>

                        @if($count !== 0)

                            <h1 class="mb-4 mt-4 committee-designation"> {{ $management_representative[0]->designation }} </h1>

                        @endif

                        <div id="management_representative"></div>

                    </div>

                </div>

                <!-- Add Committee Modal-->

                <div class="modal fade" id="expAdd" tabindex="-1" role="dialog" aria-labelledby="expAddModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Safety Commity Member</h5>
                                <button class="close close-btn" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="#" id="committee" enctype="multipart/form-data">

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

                                                <option id="ch" value="Chairman">Chairman</option>

                                                <option id="sec" value="Secretary">Secretary</option>

                                                <option value="EMPLOYEE REPRESENTATIVE">EMPLOYEE REPRESENTATIVE</option>

                                                <option value="MANAGEMENT/EMPLOYER REPRESENTATIVE">

                                                    MANAGEMENT/EMPLOYER REPRESENTATIVE

                                                </option>

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
                                <form method="post" action="#" id="edit_committee_form" enctype="multipart/form-data">

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

                                                <option value="Chairman">Chairman</option>

                                                <option value="Secretary">Secretary</option>

                                                <option value="EMPLOYEE REPRESENTATIVE">EMPLOYEE REPRESENTATIVE</option>

                                                <option value="MANAGEMENT/EMPLOYER REPRESENTATIVE">

                                                    MANAGEMENT/EMPLOYER REPRESENTATIVE

                                                </option>

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



            $.get('/safety_committee/getData', function (data) {

                console.log(data);

                if (data.chairman[0].designation === 'Chairman')

                {

                    $('#ch').css('display', 'none');

                }

                if (data.secretary[0].designation === 'Secretary')

                {

                    $('#sec').css('display', 'none');

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

                    type:'POST',

                    url: "{{ route('safety_committee.store') }}",

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

            let committeeData = $.get('{{ route('safety_committee.getData') }}',function(data){

                let chairman = data.chairman

                let secretary = data.secretary

                let employee_representative = data.employee_representative

                let management_representative = data.management_representative

                let res='';

                let sec_res='';

                let emp_representative_res='';

                let management_representative_res='';

                $.each (chairman, function (key, value) {



                    res +=

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



                });

                $.each (secretary, function (key, value) {

                    // console.log(value)

                    sec_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a style=\"margin-right:1rem\" href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        "> Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +
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
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +



                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                              Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                });

                $.each (employee_representative, function (key, value) {

                    // console.log(value)

                    emp_representative_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +
                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +
                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +



                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                          Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                });

                $.each (management_representative, function (key, value) {

                    // console.log(value)

                    management_representative_res +=

                        "                            <div class=\"card\" style=\"width: 70%; margin: 0 auto\">\n" +

                        "                                <div class=\"card-header d-flex justify-content-end\">\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"send-mail\" data-id=\""+value.id+"\"\n" +
                        ">Send Mail <i class=\"fas fa-paper-plane\"></i></a>\n" +
                        "                                    <a href=\"javascript:void(0)\"\n" +

                        "                                       id=\"edit\" data-id=\""+value.id+"\"\n" +

                        "                                       data-bs-toggle=\"modal\"\n" +

                        "                                       data-bs-target=\"#edit_committee\"> <i class=\"fas fa-edit\"></i></a>\n" +

                        "                                </div>\n" +

                        "                                <div class=\"row\" style=\"padding: 20px 0px\">\n" +

                        "                                    <div class=\"left\" style=\"float: left; width: 40%\">\n" +

                        "                                        <img class=\"committee-img\"\n" +

                        "                                             src=\"{{ asset('uploads/l_employees') }}"+'/'+"" +value.em_profile+"\"\n" +

                        "                                             alt=\"\"\n" +

                        "                                             height=\"150px\"/>\n" +

                        "                                    </div>\n" +

                        "                                    <div class=\"right committee-info-div\">\n" +

                        "                                        <h4 style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                        <h3 class=\"committee-name\">\n" +

                        "                                            Name: "+value.em_name+"\n" +

                        "                                        </h3>\n" +



                        "                                        <p style=\"text-align: right; margin-right: 20px\">\n" +

                        "                                             Designation: "+value.ds_name+" \n" +

                        "                                        </p>\n" +

                        "                                    </div>\n" +

                        "                                </div>\n" +

                        "                            </div>"



                });

                $('#chairman').html(res);

                $('#secretary').html(sec_res);

                $('#employee_representative').html(emp_representative_res);

                $('#management_representative').html(management_representative_res);

            });

            $('#edit_committee_form').on('submit',function(e) {

                e.preventDefault();

                // let id = $(this).data('id');

                let id = $('#edit_committee_form').find('input[name="id"]').val();

                // let committeData = committeeData.responseJSON;


                let formData = new FormData(this);

                $.ajax({

                    type:'POST',

                    url: "/safety_committee/update"+'/'+ id,

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

                $.post('/safety_committee/edit'+'/'+ id,{ id:id }, function (data) {

                    console.log(committeeData);

                    // $('#designation option:not(:selected)').remove();

                    // $('select[readonly] option:not(:selected)').prop('disabled', true);

                    $('#edit_designation').css('pointer-events', 'none');



                    $('#edit_committee').find('input[name="id"]').val(data.safety_committee.id);

                    $('#edit_committee').find('select[name="employee_id"]').val(data.safety_committee.employee_id);

                    $('#edit_committee').find('select[name="designation"]').val(data.safety_committee.designation);

                    $('#edit_committee').find('#old_committee_pic').attr('src', "{{ asset('uploads/safetyCommittee') }}"+ '/' + data.safety_committee.photo);

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
