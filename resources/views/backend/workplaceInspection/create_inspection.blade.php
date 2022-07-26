@extends('layouts.default')

@section('title')
    Create Inspection
@endsection

@section('css')

@endsection

@section('content')
    <!-- sidebar -->



    <div class="body d-flex py-3">
        <div class="container-xxl">
            <!-- Row end  -->
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold ml-2">Create Inspection</h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">

                            <form id="basic-form" method="post" enctype="multipart/form-data"
                                  @if(isset($data->id))
                                  action="{{ route('create_ispection.update', ['id' => $data->id]) }}">
                                <input name="_method" type="hidden" value="PUT">
                                @else
                                    action="{{ route('create_ispection.store') }}" novalidate>
                                @endif
                                @csrf


                                <div class="row " style="margin: 0 auto;">


                                    <div class="col-md-4">

                                        <label for="item" class="form-label"
                                        >Inspection
                                            <span class="text-danger">*</span>
                                        </label
                                        >
                                        <input
                                            value="{{isset($data->inspection_title) ? $data->inspection_title:''}}"
                                            type="text" class="form-control" id="inspection_title"
                                            name="inspection_title"/>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">Location
                                            <span class="text-danger">*</span>
                                        </label>
                                        <!-- <input type="text" class="form-control" required> -->
                                        <select class="form-control" name="location" id="location">
                                            <option value="">---Choose---</option>
                                            @foreach($department as $list)

                                                <option
                                                    value="{{$list->id}}"{{isset($data->location) && $data->location == $list->id ? 'selected': ''}}>{{$list->depertment_name}}


                                                </option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">PIC
                                                <span class="text-danger">*</span>
                                            </label>
                                            <!-- <input type="text" class="form-control" required> -->
                                            <select name="pic" id="pic" class="form-control">
                                                <option value="">---Choose---</option>
                                                @foreach($emp as $list)
                                                    <option
                                                        value="{{$list->id}}" {{isset($data->pic) && $data->pic == $list->id ? 'selected' : '' }}>{{$list->em_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">UNSAFE ACT/UNSAFE
                                                CONDITION/HAZARDS/ISSUES
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control"
                                                      name="unsafe"
                                                      rows="5"
                                                      cols="30"
                                                      value="{{isset($data->unsafe) ? $data->unsafe:''}}"
                                                      required>{{isset($data->unsafe) ? $data->unsafe:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="text">CORRECTIVE ACTIONS TO BE
                                                TAKEN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea
                                                class="form-control"
                                                rows="5"
                                                cols="30"
                                                name="text"
                                                value="{{isset($data->text) ? $data->text:''}}"
                                                required> {{isset($data->text) ? $data->text:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Justification
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea
                                                class="form-control"
                                                name="Justification"
                                                rows="5"
                                                cols="30"
                                                value="{{isset($data->Justification) ? $data->Justification:''}}"
                                                required>{{isset($data->Justification) ? $data->Justification:''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="admitdate" class="form-label">DATE IDENTIFIED
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="date"
                                            class="form-control w-100"
                                            id="admitdate"
                                            name="admitdate"
                                            value="{{isset($data->admitdate) ? $data->admitdate:''}}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="targetdate" class="form-label">TARGET DATE
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="date"
                                            class="form-control w-100"
                                            id="targetdate"
                                            name="targetdate"
                                            value="{{isset($data->targetdate) ? $data->targetdate:''}}"

                                            required
                                        />
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   style="margin-bottom: 20px;">PRIORITY
                                                <span class="text-danger">*</span>
                                            </label>
                                            <br/>
                                            <label class="fancy-radio" for="urgent">
                                                <input type="radio" name="priority" id="urgent"
                                                       value="0" @if((isset($data->priority) == 0) or  old('priority')== 0) {{"checked"}} @endif>

                                                <span
                                                    style="padding: 10px 10px; border-radius: 10px;  color: #ee1010; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px;"><i></i>Urgent</span>
                                            </label>

                                            <label class="fancy-radio" for="1_or_2_days">


                                                <input type="radio" name="priority" id="1_or_2_days"
                                                       value="1" @if((isset($data->priority) == 1) or  old('priority')== 1) {{"checked"}} @endif>

                                                <span
                                                    style="padding: 10px 10px; border-radius: 10px;  color: #d2fd12; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px"><i></i>1 or 2 days</span>
                                            </label>


                                            <label class="fancy-radio" for="1_week_more">


                                                <input type="radio" name="priority" id="1_week_more"
                                                       value="2" @if((isset($data->priority)== 2) or  old('priority')== 2) {{"checked"}} @endif>

                                                <span
                                                    style="padding: 10px 10px; border-radius: 10px;  color: #9510ee; box-shadow: 0px 0px 5px 0px #315948; font-size: 20px; font-weight: bold;margin-right: 20px"><i></i>1 week/more </span>
                                            </label>
                                            <p id="error-radio"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image" class="form-label">
                                            Inspection Picture
                                            <span class="text-danger">*</span>
                                        </label
                                        >
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="image"
                                            name="image"
                                            value="{{isset($data->image) ? $data->image:''}}"


                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3 justify-content-end mt-2">
                                        @if(isset($data->id))
                                            <button type="submit" class="btn btn-primary"
                                            >Update

                                            </button>

                                        @else

                                            <button type="submit" class="btn btn-primary"
                                            >
                                                Submit
                                            </button>
                                        @endif


                                        <a href="{{route('list_inspection.index')}}"
                                           class="btn btn-danger  "
                                        > Back</a>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="../js/template.js"></script>

    <script>
        // project data table
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);

            $('.deleterow').on('click', function () {
                var tablename = $(this).closest('table').DataTable();
                tablename
                    .row($(this)
                        .parents('tr'))
                    .remove()
                    .draw();

            });
        });
    </script>
    <script>
        $(function () {
            // initialize after multiselect
            $("#basic-form").parsley();
        });
    </script>
@endsection
