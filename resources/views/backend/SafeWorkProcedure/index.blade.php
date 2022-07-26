@extends('layouts.default')

@section('title')
    || Safe Work Procedure
@endsection

@section('css')

@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Safe Work Procedure </h5>

        </div>
        <div class="row clearfix g-3">
            <div class="col-lg-12">
                <div class="card">
                    <div
                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                    >
                        {{--                                <h6 class="mb-0 fw-bold"></h6>--}}
                    </div>

                    <div class="card-body">
                         <form  name="supplierForm" id="supplierForm" method="post" enctype="multipart/form-data"

                           @if(isset($data->id))
                          action="{{ route('safe_work_procedure.update', ['id'=>$data->id]) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @else
                            action="{{route('safe_work_procedure.store')}}">
                        @endif

                        @csrf

                        <div class="row">

<div class="col-md-4">
   <label >Company Name</label>
                            <input name="company_name" id="" class="form-control" value="{{ $companies->company_name }}" readonly>



                            <input type="hidden" name="company_id" id="" class="form-control" value="{{ $companies->id }}">
</div>


</div>
<div class="row">
                        <div class="col-md-6">

                            <input type="hidden"  name="swork_id">

                                <label><strong>Department Name<small> (Safe Work procedure For)</small> <span
                                            class="span">*</span></strong></label>
                                            <select name="dep_id" id="" required class="form-control">
                                                <option value="">Select</option>
                                                @foreach($data1 as $list)
                                                <option value="{{$list->id }}"
                                                    @if (isset($data->id))
                                                        {{($list->id ==$data->dep_id) ? 'selected':''}}
                                                    @endif
                                                  >
                                                  {{ $list->depertment_name}}
                                                @endforeach
                                            </select>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Work Tittle<small> (Safe Work procedure For)</small> <span
                                            class="span">*</span></strong></label>
                                <input type="text"
                                       class="form-control inpcol"
                                       id="work_title"
                                       name="work_title"
                                       placeholder="Work Title"
                                       autocomplete="off" value="{{ old('work_title',isset($data->work_title) ? $data->work_title:'')}} ">
                                <span class="text-danger" id="name-error"></span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>Before Work
                                    <span class="text-danger">*</span>
                                </strong></label>
                                <textarea class="form-control" name="before_work" id="before_work"
                                          placeholder="Please Enter Before Work Procedure">{{ old('before_work', isset($data->before_work_rules) ? $data->before_work_rules:'')}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Before Work Image</strong></label>
                                <input type="file" class="form-control" name="before_work_image" id="before_work_image"
                                       placeholder="Please Enter Before Work Procedure Image" >
                                       @if (isset($data->id))
                                       <img src="/image/SafetyWorkProcedure/beforeWork/{{$data->before_work_image }}" alt="activity_img" style="width: 30%;">
                                       @endif
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>During Work</strong></label>
                                <textarea class="form-control" name="during_work" id="during_work"
                                          placeholder="Please Enter During Work Procedure">{{ old('during_work',isset($data->during_work_rules) ? $data->during_work_rules:'')  }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>During Work Image</strong></label>
                                <input type="file" class="form-control" name="during_work_image" id="during_work_image"
                                       placeholder="Please Enter During Work Procedure Image">
                                      @if (isset($data->id))
                                      <img src="/image/SafetyWorkProcedure/duringWork/{{$data-> during_work_image}}" alt="activity_img" style="width: 30%;">
                                      @endif
                                    </div>
                            </div>


                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>After Work</strong></label>
                                <textarea class="form-control" name="after_work" id="after_work"
                                          placeholder="Please Enter After Work Procedure">{{ old('after_work',isset($data->after_work_rules)?$data->after_work_rules:'') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>After Work Image</strong></label>
                                <input type="file" class="form-control" name="after_work_image" id="after_work_image"
                                       placeholder="Please Enter After Work Procedure Image">
                                       @if (isset($data->id))
                                       <img src="/image/SafetyWorkProcedure/afterWork/{{$data->after_work_image }}" alt="activity_img" style="width: 30%;">
                                       @endif
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label><strong>Potential Hazard</strong></label>
                                <textarea class="form-control" name="potential_hazard" id="potential_hazard"
                                          placeholder="Please Enter Potential Hazard">{{  old('potential_hazard',isset($data->potential_hazard) ? $data->potential_hazard:'')}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Potential Hazard Image</strong></label>
                                <input type="file" class="form-control" name="potential_hazard_image" id="potential_hazard_image"
                                       placeholder="Please Enter Potential Hazard Image">
                                       @if (isset($data->id))
                                       <img src="/image/SafetyWorkProcedure/potentialHazard/{{$data->potential_hazard_image }}" alt="activity_img" style="width: 30%;">
                                       @endif
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">

                                <h5>PPE</h5>
                                <div id="checkboxes">
                                    @foreach ($ppe as $pp)
                                    <label>
                                        <input type="checkbox" name="ppe_name[]" value="{{ $pp->ppeName  }}" @if (isset($data->id))
                                        @foreach ($c_data as $v)
                                        {{ ($pp->ppeName==$v->ppe) ? 'checked':''}}
                                        @endforeach
                                        @endif  />{{ $pp->ppeName }}</label>
                                    @endforeach
                            </div>
                          </div>

                            <div class="col-md-6">
                                <label><strong>Remarks</strong></label>
                                <textarea type="text" class="form-control" name="remarks" id="remarks"
                                          placeholder="Please Enter Remarks">{{ old('remarks',isset($data->remarks) ? $data->remarks:'') }}</textarea>
                            </div>

                        </div>
                        <div class="row mb-4 mt-4">

                            <div class="d-flex justify-content-end pe-4">
                                @if(isset($data->id))
                                <input type="hidden" name="swork_id" value="{{$data->id}}" >
                                <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                   update
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary shadow mr-1 me-1 mb-1 point-e">
                                    Save
                                </button>
                                <button type="reset" class="btn btn-outline shadow mb-1 btn-danger cursor-auto">
                                    Clear
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

</div>
</div>

      <div class="row">
        <div class="col-lg-12">
                <div class="card">
                  <h5 class="card-header bg-info-light"><b>Safe Work Procedure Data</b></h5>
                    <div class="card-body">
                       <table class="table table-sm datatable mdl-data-table">
                                        <thead>
                                         <tr>
                                          <th>SL</th>
                                           <th>Work Tittle</th>
                                             <th>After Work</th>
                                               <th> Remarks</th>
                                               <th>Action</th>
                                         </tr>
                                         @foreach ($values as $key=>$value)
                                         <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$value->work_title}}</td>
                                        <td>{!!$value->after_work_rules!!}</td>
                                        <td>{{$value->remarks }}</td>
                                        {{-- <td>{{ $value->ppe->ppeName }}</td> --}}
                                        <td>
                                            <a href="{{ route('safe_work_procedure.details',['id'=>$value->id]) }}"><button type="button" class="bg bg-info">
                                               View Details </button>
                                            </a>
                                            <a href="{{ route('safe_work_procedure.edit',['id'=>$value->id]) }}"><button type="button" class="bg bg-info">
                                               Edit </button>
                                            <a href="{{ route('safe_work_procedure.destroy',['id'=>$value->id]) }}"><button type="button" class="bg bg-danger">
                                               Delete </button>
                                            </a>
                                        </td>
                                        </tr>
                                         @endforeach

                                       </thead>
                                      <tbody>

                                       </tbody>
                                  </table>
                    </div>
                </div>
            </div>
          </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#before_work').summernote();
        });
        $(document).ready(function() {
            $('#after_work').summernote();
        });
        $(document).ready(function() {
            $('#potential_hazard').summernote();
        });
        $(document).ready(function() {
            $('#during_work').summernote();
        });
    </script>

@endsection
