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
                        <div class="card-header justify-content-between border-bottom flex-wrap">
                            <h6 class="fw-bold mb-0">Create Hirarc</h6>
                        </div>
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
                                        <div class="row g-3" style="margin: 0 auto;">
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <!-- <input type="text" class="form-control" required> -->


                                                    <select name="depertment_id" id="depertment_id" class="form-control" >
                                                        <option value="">Select Department</option>
                                                        @foreach($department as $list)

                                                            <option value="{{ $list->id }}" {{ ($list->id == $data->depertment_id) ? 'selected': ''}} >{{ $list->depertment_name }}</option>

                                                    @endforeach


                                                    <!--  @foreach($data3 as $list)
                                                        @if (old('category') == $list->id)
                                                            <option value="{{ $list->id }}" selected>{{ $list->depertment_name }}</option>
                                            @else
                                                            <option value="{{ $list->id }}">{{ $list->depertment_name }}</option>
                                            @endif
                                                    @endforeach -->
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="validationCustom0001">Process</label>
                                                    <div class="input-group">
                                                        <input  style=" border-color:#c0b1b1;" type="text" class="form-control"
                                                                id="validationCustom0001"
                                                                name="process"
                                                                value="{{isset($data->process)? $data->process: ''}}"
                                                                placeholder="Enter Process"  required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="validationCustom0001">Location</label>
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
                                                <label for="last_assessment" class="form-label">Last Assessment</label>
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
                                                <label for="assessment_date" class="form-label">Assessment Date* </label>
                                                <input
                                                    type="date"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="assessment_date"
                                                    name="assessment_date"
                                                    value="{{isset($data->assessment_date)? $data->assessment_date: ''}}"

                                                    required
                                                />
                                            </div >
                                            <div class="card-header d-flex justify-content-between">
                                                <h5 class="mb-0">RM Assessor</h5>
                                                {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
                                            </div>
                                            <hr>

                                            <div class="row" style="margin: 0 auto;">
                                            <div class="col-md-4">
                                                <label for="depone" class="form-label">RM Assessor</label>
                                                <select  name="rm_assessor" id="rm_assessor" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee Name</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->rm_assessor) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 1</label
                                                >
                                                <select   name="rm_member1" id="rm_member1" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->rm_member1) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2 mb-6">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 2</label
                                                >
                                                <select   name="rm_member2" id="rm_member2" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color); border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->rm_member2) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-2">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 3</label
                                                >
                                                <select   name="rm_member3" id="rm_member3" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color);border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->rm_member3) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="depone" class="form-label"
                                                >RM Team Member 4</label
                                                >
                                                <select   name="rm_member4" id="rm_member4" class="col-md-12" style="padding: 10px; border-radius: 3px; border-color: var(--border-color);border-color:#c0b1b1;">
                                                    <option value="">Select Employee</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->rm_member4) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                            <div class="card-header d-flex justify-content-between">
                                                <h5 class="mb-0">Approved by</h5>
                                                {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
                                            </div>
<hr>
                                     <div class="row" style="margin: 0 auto;">


                                            <div class="col-md-3 mb-6">
                                                <label for="employee_id" class="form-label"
                                                >Name </label
                                                >

                                                <select
                                                    name="employee_id" id="employee_id" class="form-control">
                                                    <option value="">Select Employee Name</option>
                                                    @foreach($l_employee as $list)

                                                        <option value="{{ $list->id }}" {{ ($list->id == $data->employee_id) ? 'selected': ''}} >{{ $list->em_name }}</option>

                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-md-3 mb-6">
                                                <label for="designation_id" class="form-label"
                                                >Designation</label
                                                >
                                                <input name="designation"  readonly id="designation" class="form-control"value="{{$data->ds_name}}" >
                                                <input type="hidden" name="designation_id"  readonly id="designation_id" class="form-control"value="{{$data->id}}" >

                                            </div>


                                         <input type="hidden"  name="designation_id" id="designation_id" class="form-control"value="{{$data->designation_id}}" >

                                            <div class="col-md-3 mb-6">
                                                <label for="admitdate" class="form-label">Date</label>
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

                                            <div class="col-md-3 mb-6">
                                                <label for="admitdate" class="form-label">Reference no</label>
                                                <input
                                                    type="text"
                                                    style=" border-color:#c0b1b1;"
                                                    class="form-control w-100"
                                                    id="reference_no"
                                                    name="reference_no"
                                                    value="{{isset($data->reference_no)? $data->reference_no: ''}}"
                                                    required
                                                />
                                            </div>

                                     </div>



                                        </div>
                                        <div class="row">
                                            <div class="col-md-10"></div>
                                            <div class="col-md-2">
                                                <input type="hidden" name="hirarc_id" value="{{$data->id}}" >

                                                <button type="submit" class="btn btn-primary ">update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


        @endsection
        @section('javascript')

            <script>

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

            </script>

@endsection


