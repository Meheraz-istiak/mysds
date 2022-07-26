@extends('layouts.default')

@section('title')
    Create Job Edit
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
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h6 class="fw-bold mb-0" style="padding-left: 1rem">Create Job</h6>
                        </div>
                        <div class="card-body">
                            <div class="row align-item-center">
                                <div class="col-md-12">
                                    <form method="POST" enctype="multipart/form-data" id="department"

                                          @if(isset($data->id))
                                          action="{{ route('c_job.update', ['id' => $data->id]) }}">
                                        <input name="_method" type="hidden" value="PUT">
                                        @else
                                            action="{{ route('c_job.store')}}">
                                        @endif
                                        @csrf
                                        <div class="row g-3" style="margin: 0 auto;">
                                            <div class="col-md-4 ">
                                                <div class="form-group " >
                                                    <label class="form-label" >
                                                        Department
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="depertment_id" id="depertment_id" class="form-control">
                                                        <option value="">Select Department</option>
                                                        @foreach($department as $list)

                                                            <option value="{{ $list->id }}" {{ ($list->id == $data->depertment_id) ? 'selected': ''}} >{{ $list->depertment_name }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            <input type="hidden" name="company_id" id="company_id" class="form-control" value="">

                                            <div  id="show_item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="depone" class="form-label"
                                                        >JOB ACTIVITY</label
                                                        >
                                                        <input type="text"
                                                               style="border-color:#c0b1b1;"
                                                               class="form-control"
                                                               id="job_activity"
                                                               name="job_activity"
                                                               value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                                                        />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="formFileMultiple" class="form-label">
                                                            Picture</label
                                                        >
                                                        <input
                                                            class="form-control"
                                                            style=" border-color:#c0b1b1;"
                                                            type="file"
                                                            accept="image/png, image/jpeg,image/jpg"
                                                            id="imagefile"
                                                            name="imagefile"
{{--                                                            multiple--}}
{{--                                                            required--}}
                                                        />
                                                        @if(isset($data->id))
                                                            <img src="/image/jobimage/{{ $data->image }}" width="10%">@endif

                                                    </div>


                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-10"></div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary ">Update</button>
                                            </div>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


        @endsection
        @section('script')
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
                    $('.deleterow').on('click',function(){
                        var tablename = $(this).closest('table').DataTable();
                        tablename
                            .row( $(this)
                                .parents('tr') )
                            .remove()
                            .draw();

                    } );
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
                                                   value="{{isset($data->id)? '':''}}"
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
                    $(document).on('click', '.addROw', function (e) {
                        e.preventDefault();
                        $('#job_activity').trigger("reset");
                    });
                });



                function caltoprice() {
                    var likelihood_l = parseInt($('#likelihood_l').val());
                    var severity_s = parseInt($('#severity_s').val());

                    var total =parseInt((likelihood_l+severity_s));

                    $('#rmn').val(total);
                }

                function caltoprice1() {
                    var likelihood_l1 = parseInt($('#likelihood_l1').val());
                    var severity_S1 = parseInt($('#severity_S1').val());

                    var total =parseInt((likelihood_l1+severity_S1));

                    $('#rmn1').val(total);
                }



            </script>

@endsection


