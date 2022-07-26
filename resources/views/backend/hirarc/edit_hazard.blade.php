@extends('layouts.default')

@section('title')
    Sequence of Job Edit
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
                        <div class="card-header justify-content-between border-bottom flex-wrap">
                            <h6 class="fw-bold mb-0"> Hirarc Register</h6>
                        </div>
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form method="POST" enctype="multipart/form-data" id="department"

                                          @if(isset($data->id))
                                          action="{{ route('h_hazard.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('h_hazard.store')}}">
                                        @endif
                                        @csrf
                                        <div class="row g-3" style="margin: 0 auto;">
                                            <div class="col-md-6 ">
                                                <div class="form-group " >
                                                    <label class="form-label" >
                                                        Department
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="depertment_id" id="depertment_id" class="form-control" >
                                                        <option value="">Select Department</option>
                                                        @foreach($department as $list)
                                                            <option value="{{ $list->id }}" {{ ($list->id == $data->depertment_id) ? 'selected': ''}} >{{ $list->depertment_name }}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group " >
                                                    <label class="form-label" >
                                                        Job
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="job_activity_id" id="job_activity_id" class="form-control">
                                                        <option value="">Select job</option>
                                                        @foreach($c_job as $list)

                                                            <option value="{{ $list->id }}" {{ ($list->id == $data->job_activity_id) ? 'selected': ''}} >{{ $list->job_activity }}</option>



                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>


                                            <div  id="show_item">
                                                <div class="row"  style="margin: 0 auto;">

                                                    <div class="col-md-6 ">
                                                        <label for="depone" class="form-label"
                                                        >SEQUENCE OF THE JOB
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="sequence_job"
                                                               name="sequence_job[]"
                                                               value="{{isset($data->sequence_job)? $data->sequence_job: ''}}"
                                                        />
                                                    </div>


                                                    <div class="col-md-6 ">
                                                        <label for="depone" class="form-label"
                                                        >HAZARD
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="hazard"
                                                               name="hazard[]"
                                                               value="{{isset($data->hazard)? $data->hazard: ''}}"
                                                        />
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label">Category Hazard
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <!-- <input type="text" class="form-control" required> -->
                                                            <select  name="c_hazard[]" id="c_hazard" class="form-control">
                                                                <option value="">Select Hazard</option>
                                                                <option value="PHYSICAL" {{$data->c_hazard=="PHYSICAL"?'selected':''}}>PHYSICAL/HEALTH</option>
                                                                <option value="CHEMICAL"{{$data->c_hazard=="CHEMICAL"?'selected':''}}>CHEMICAL</option>
                                                                <option value="BIOLOGICAL"{{$data->c_hazard=="BIOLOGICAL"?'selected':''}}>BIOLOGICAL</option>
                                                                <option value="PHYCHOSOCIALe"{{$data->c_hazard=="PHYCHOSOCIALe"?'selected':''}}>PHYCHOSOCIALe</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <label for="depone" class="form-label"
                                                        >Event and Consequences
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="event_consequences"
                                                               name="event_consequences[]"
                                                               value="{{isset($data->event_consequences)? $data->event_consequences: ''}}"
                                                        />
                                                    </div>
                                                </div>
                                                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                                        <h6 class="fw-bold mb-0">RISK EVALUATION </h6>
                                                    </div>

                                            <div class="row"  style="margin: 0 auto;">
                                                    <div class="col-md-3 ">
                                                        <label for="depone" class="form-label"
                                                        >Existing Risk Control (if any)
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="risk_control"
                                                               name="risk_control[]"
                                                               value="{{isset($data->risk_control)? $data->risk_control: ''}}"
                                                        />
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <label for="depone" class="form-label"
                                                        >Justification of Likelihood
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >

                                                        <input type="text"
                                                               style=" border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="j_likelihood"
                                                               name="j_likelihood[]"
                                                               value="{{isset($data->j_likelihood)? $data->j_likelihood: ''}}"
                                                        />
                                                    </div>



                                                    <div class="col-md-2 ">
                                                        <label for="depone" class="form-label"
                                                        >Likelihood (L)
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >

                                                        <input type="text"
                                                               class="form-control"
                                                               style=" border-color:#c0b1b1;"
                                                               id="likelihood_l"
                                                               name="likelihood_l[]"
                                                               min="1"
                                                               max="5"
                                                               onkeyup="caltoprice();"
                                                               value="{{isset($data->likelihood_l)? $data->likelihood_l: ''}}"
                                                        />
                                                    </div>

                                                    <div class="col-md-2 ">
                                                        <label for="depone" class="form-label"
                                                        > Severity (S)
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               class="form-control"
                                                               style=" border-color:#c0b1b1;"
                                                               id="severity_s"
                                                               name="severity_s[]"
                                                               min="1"
                                                               max="5"
                                                               onkeyup="caltoprice();"
                                                               value="{{isset($data->severity_s)? $data->severity_s: ''}}"
                                                        />
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <label for="depone" class="form-label"
                                                        >RMN
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type=""
                                                               class="form-control"
                                                               style=" border-color:#c0b1b1;"
                                                               id="rmn"
                                                               name="rmn[]"
                                                               value="{{isset($data->rmn)? $data->rmn: ''}}"
                                                        />
                                                    </div>
                                            </div>
                                                    <div class="card-header  justify-content-between border-bottom flex-wrap">
                                                        <h6 class="fw-bold mb-0"> RISK CONTROL
                                                            <span class="text-danger">*</span>
                                                        </h6>
                                                    </div>

                                                    <div class="col-md-12 ">
                                                        <label for="depone" class="form-label"
                                                        >Additional Risk Control
                                                            <span class="text-danger">*</span>
                                                        </label
                                                        >
                                                        <input type="text"
                                                               class="form-control"
                                                               style=" border-color:#c0b1b1;"
                                                               id="additional_risk"
                                                               name="additional_risk[]"
                                                               value="{{isset($data->additional_risk)? $data->additional_risk: ''}}"
                                                        />
                                                    </div>

{{--                                                    <div class="input-group-append">--}}
{{--                                                        <button type="button" class="btn btn-primary addROw" style="  display: block;--}}
{{--                                                        margin-left: auto;margin-right: 0; margin-top: 10px;">ADD more</button>--}}
{{--                                                    </div>--}}
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 justify-content-end">Submit</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


        @endsection
        @section('javascript')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->


            <script>
                // project data table
                $("#employee_id").on("change", function () {
                    let emp_id = $("#employee_id").val();
                    $.ajax({
                        type: 'get',
                        url: "getempdesignation"+'/'+emp_id,
                        success: function (data) {


                            $('#designation').val(data.ds_name);
                            $('#designation_id').val(data.id);
                        }
                    });
                });

                $(document).ready(function() {
                    $('#myProjectTable')
                        .addClass( 'nowrap' )
                        .dataTable( {
                            responsive: true,
                            columnDefs: [
                                { targets: [-1, -3], className: 'dt-body-right' }
                            ]
                        });
                    $('.deleterow').on('click',function()
                    {
                        var tablename = $(this).closest('table').DataTable();
                        tablename
                            .row( $(this)
                                .parents('tr') )
                            .remove()
                            .draw();

                    } );
                });





                function caltoprice() {
                    var likelihood_l = parseInt($('#likelihood_l').val());
                    var severity_s = parseInt($('#severity_s').val());

                    var total =parseInt((likelihood_l*severity_s));

                    $('#rmn').val(total);
                }

                function caltoprice1() {
                    var likelihood_l1 = parseInt($('#likelihood_l1').val());
                    var severity_S1 = parseInt($('#severity_S1').val());

                    var total =parseInt((likelihood_l1*severity_S1));

                    $('#rmn1').val(total);
                }




            </script>


            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();

                    $("#job_activity_id").on("change", function () {
                        let emp_id = $("#job_activity_id").val();
                        $.ajax({
                            type: 'get',
                            url: "getdesignation"+'/'+emp_id,
                            success: function (data) {
                                $('#designation').val(data.ds_name);
                                $('#designation_id').val(data.id);
                            }
                        });
                    });

                });

            </script>

@endsection


