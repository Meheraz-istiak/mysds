@extends('layouts.default')

@section('title')
    Hirarc
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


                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="mb-0">Create Hazard</h5>
                            {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
                        </div>
                        <hr>
                        
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form method="POST" enctype="multipart/form-data" id="department"

                                          @if(isset($data->id))
                                          action="{{ route('hirarc.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('hirarc.store')}}">
                                        @endif
                                        @csrf
                                        <div class="row " style="margin: 0 auto;">
                                            <div class="col-md-4 ">
                                                <div class="form-group ">
                                                    <label class="form-label">
                                                        Department
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="depertment_id" id="depertment_id"
                                                            class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($department as $list)

                                                            <option value="{{$list->id}}">

                                                                {{isset($list->id)? $list->depertment_name: ''}} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 ">
                                                <div class="form-group">
                                                    <label for="process" class="form-label"> process</label>
                                                    <input id="process" type="text"
                                                           class="form-control @error('process') is-invalid @enderror"
                                                           name="process" value="{{ old('process') }}" required
                                                           autocomplete="process" autofocus placeholder="process ">
                                                    @error('process')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-2 ">
                                                <div class="form-group">
                                                    <label for="validationCustom0001">Location
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <input style=" border-color:#c0b1b1;"
                                                               type="text"
                                                               class="form-control"
                                                               id="validationCustom0001"
                                                               name="location"
                                                               placeholder="Enter Location"
                                                               value="{{isset($data->location)? $data->location: ''}}"

                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="last_assessment" class="form-label">Last Assessment
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="last_assessment"
                                                    name="last_assessment"
                                                    value="{{isset($data->last_assessment)? $data->last_assessment: ''}}"
                                                    required
                                                />
                                            </div>


                                            <div class="col-md-2">
                                                <label for="assessment_date" class="form-label">Assessment Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="assessment_date"
                                                    name="assessment_date"
                                                    value="{{isset($data->assessment_date)? $data->assessment_date: ''}}"

                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">RM Assessor</h5>
                                            {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
                                        </div>
                                        <hr>


                                        <div class="row" style="margin: 0 auto;">
                                            <div class="col-md-4">
                                                <label for="depone" class="form-label"
                                                >RM Assessor
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_assessor" id="rm_assessor" class="form-control">
                                                    <option value="">Select One
                                                    </option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">
                                                            {{$list->em_name}}
                                                            {{isset($list->id)? $list->rm_assessor: ''}}

                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 ">
                                                <label for="depone" class="form-label"
                                                >Team Member 1
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member1" id="rm_member1" required class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="depone" class="form-label"
                                                >Team Member 2
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member2"required id="rm_member2" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-2">
                                                <label for="depone" class="form-label"
                                                >Team Member 3
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member3" id="rm_member3"  required class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}}


                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="depone" class="form-label"
                                                >Team Member 4
                                                    <span class="text-danger">*</span>
                                                </label
                                                >
                                                <select name="rm_member4" id="rm_member4" required class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{$list->id}}">{{$list->em_name}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">Approved By</h5>
                                            {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
                                        </div>
                                        <hr>

                                    <!--  <div class="col-md-4 mb-6">
                                            <label for="depone" class="form-label"
                                            >Signature
                                            <span class="text-danger">*</span>
                                            </label
                                            >
                                            <input type="file"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="Signature"
                                                   name="Signature"
                                                   value="{{isset($data->Signature)? $data->Signature: ''}}"
                                            />
                                        </div> -->
                                        <div class="row" style="margin: 0 auto;">


                                            <div class="col-md-3 ">
                                                <label for="employee_id" class="form-label"
                                                >Employee Name
                                                    <span class="text-danger">*</span>
                                                </label
                                                >

                                                <select
                                                    name="employee_id" id="employee_id" class="form-control"
                                                >
                                                    <option value="">Select One</option>
                                                    @foreach($l_employee as $list)
                                                        <option value="{{$list->id}}">{{$list->em_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-3">
                                                <label for="designation_id" class="form-label"
                                                >Designation
                                                    <span class="text-danger">*</span>
                                                </label
                                                >

                                                <div class="col-lg-12">

                                                    <input name="designation" id="designation" class="form-control"
                                                           readonly>

                                                </div>

                                                <input type="hidden" name="designation_id" id="designation_id"
                                                       class="form-control">

                                            </div>


                                            <div class="col-md-3">
                                                <label for="admitdate" class="form-label">Date
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="date"
                                                    name="date"
                                                    value="{{isset($data->date)? $data->date: ''}}"
                                                    required
                                                />
                                            </div>


                                            <div class="col-md-3">
                                                <label for="admitdate" class="form-label">Reference no
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="reference_no"
                                                    name="reference_no"
                                                    value="{{$reference_no}}"
                                                    readonly
                                                    value="{{isset($data->reference_no)? $data->reference_no: ''}}"
                                                    required
                                                />
                                            </div>

                                            <input type="hidden" name="company_id" id="" class="form-control" value="">


                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md 10"></div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary ">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>




        @endsection

        @section('javascript')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script>
                // project data table
                $("#employee_id").on("change", function () {
                    let emp_id = $("#employee_id").val();

                    $.ajax({
                        type: 'get',
                        url: "getempdesignation" + '/' + emp_id,
                        success: function (data) {


                            $('#designation').val(data.ds_name);
                            $('#designation_id').val(data.id);
                        }
                    });
                });

                $(document).ready(function () {

                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);


                    $('#myProjectTable')
                        .addClass('nowrap')
                        .dataTable({
                            responsive: true,
                            columnDefs: [
                                {targets: [-1, -3], className: 'dt-body-right'}
                            ]
                        });
                    $('.deleterow').on('click', function () {
                        var tablename = $(this).closest('table').DataTable();
                        tablename
                            .row($(this)
                                .parents('tr'))
                            .remove()
                            .draw();

                    });
                });

                $(".addROw").click(function () {
                    // e.preventDefault();
                    $("#show_item").prepend(`

                                           <div class="row">


                                         <div class="col-md-6 mb-6">
                                            <label for="depone" class="form-label"
                                            >

                                            </label
                                            >
                                            <input type="text"
                                                   style=" border-color:#c0b1b1;"
                                                   class="form-control"
                                                   id="job_activity"
                                                   name="job_activity[]"
                                                   value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                                            />
                                        </div>

                                             <div class="col-md-6 mb-6">
                                                  <label for="formFileMultiple" class="form-label">


                                                 </label
                                                  >
                                                  <input
                                                    class="form-control"
                                                    style=" border-color:#c0b1b1;"
                                                    type="file"
                                                    id="imagefile"
                                                    name="imagefile[]"



                                                  />
                                                </div>





                                           <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger rmvROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0;margin-top: 10px;">Remove</button>
                                        </div>

                                        </div>
                                                </div>`
                    );
                    $(document).on('click', '.rmvROw', function (e) {
                        e.preventDefault();
                        let row_item = $(this).parent().parent();
                        $(row_item).remove();
                    });
                });


                function caltoprice() {
                    var likelihood_l = parseInt($('#likelihood_l').val());
                    var severity_s = parseInt($('#severity_s').val());

                    var total = parseInt((likelihood_l + severity_s));

                    $('#rmn').val(total);
                }

                function caltoprice1() {
                    var likelihood_l1 = parseInt($('#likelihood_l1').val());
                    var severity_S1 = parseInt($('#severity_S1').val());

                    var total = parseInt((likelihood_l1 + severity_S1));

                    $('#rmn1').val(total);
                }


            </script>

@endsection


