@extends('layouts.default')

@section('title')
   || PTW Work Request Edit
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Offer Edit</h3>
      </div>
            <form method="POST" action="{{ route('ptw_work.update',$data->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">

                @csrf
                <div class="card-body">

                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <label for="firstname" class="form-label">Work Request ref#</label>
                            <input type="text"
                                   class="form-control"
                                   name="reference"
                                   id="reference"
                                   value="{{isset($Ptwwork->reference)? $Ptwwork->reference: ''}}"


                                   value="{{$reference_no}}"
                                   required readonly
                                   style="background-color: white;">
                        </div>

                        <div class="col-md-4">
                            <label for="department-type" class="form-label"> Department</label>

                            <select class=" form-control" name="depertment_id" id="depertment_id">
                                @foreach($department as $list)

                                    <option value="{{$list->id}}">

                                        {{isset($list->id)? $list->depertment_name: ''}} </option>

                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-4">
                            <label for="work-type" class="form-label">Work type</label>
                            <select class="form-control" name="work_type" id="work_type">
                                <option value>---Work type----</option>
                                <option value="name" {{$Ptwwork->work_type=="name"?'selected':''}}>name</option>
                                <option value="contact number" {{$Ptwwork->work_type=="contact number"?'selected':''}}>
                                    contact number
                                </option>
                            </select>
                        </div>


                        <div class="col-md-12">
                            <label for="work-details" class="form-label">Work details</label>
                            <textarea
                                name="work_detalis"

                                class="form-control" id="work_detalis" rows="3">{{isset($Ptwwork->work_detalis)? $Ptwwork->work_detalis: ''}}"

                                            </textarea>
                        </div>


                        <div class="col-md-12">
                            <label for="work-area" class="form-label">Main Work Area </label>
                            <select class="form-control" name="work_area" id="work_area">
                                <option value>---Main Work Area----</option>
                                <option value="daily"{{$Ptwwork->work_area=="daily"?'selected':''}}>daily</option>
                                <option value="weekly"{{$Ptwwork->work_area=="weekly"?'selected':''}}>weekly</option>
                                <option value="monthly"{{$Ptwwork->work_area=="monthly"?'selected':''}}>monthly</option>
                                <option value="when required"{{$Ptwwork->work_area=="when required"?'selected':''}}>when
                                    required
                                </option>
                            </select>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Would the work affect any other area?</label>
                                <br>

                                <label class="fancy-radio" id="yesCheck" style="margin-right: 30px;">
                                    <input onclick="javascript:yesnoCheck();" name="work_affect" type="radio"

                                           value="male" required data-parsley-errors-container="#error-radio"

                                           data-parsley-multiple="gender"
                                        {{ ($Ptwwork->work_affect=="male")? "checked" : "" }}

                                    >

                                    <span><i></i>Yes</span>
                                </label>

                                <label class="checkbox" id="noCheck" style="margin-right: 30px;">

                                    <input name="work_affect" onclick="javascript:yesnoCheck();" type="radio"
                                           value="female"

                                           data-parsley-multiple="gender"
                                        {{ ($Ptwwork->work_affect=="female")? "checked" : "" }}
                                    ><span><i></i>No</span>

                                </label>

                                <label class="fancy-radio" id="yesCheck" style="margin-right: 30px;">

                                    <input onclick="javascript:yesnoCheck();" name="work_affect" type="radio" value="

                                          females" data-parsley-multiple="gender"
                                        {{ ($Ptwwork->work_affect=="females")? "checked" : "" }}


                                    >

                                    <span><i></i>May be</span>

                                </label>
                                <p id="error-radio"></p>
                            </div>

                        </div>


                        <div class="col-md-6" id="ifYes">
                            <label for="effected" class="form-label">other effected area</label>
                            <select class=" form-control" name="effected_area">
                                <option value>---other effected area----</option>
                                <option value="Attending" {{$Ptwwork->effected_area=="Attending"?'selected':''}}>
                                    Attending
                                </option>
                                <option value="Not Attend"{{$Ptwwork->effected_area=="Not Attend"?'selected':''}}>Not
                                    Attend
                                </option>
                                <option value="select date"{{$Ptwwork->effected_area=="select date"?'selected':''}}>
                                    select date
                                </option>
                            </select>
                        </div>


                        <div class="col-md-12">
                            <label for="firstname"

                                   class="form-label">Asset that requires work. (If applicable)</label>
                        </div>

                        <div class="col-md-6">
                            <input
                                name="Assest_name"
                                value="{{isset($Ptwwork->Assest_name)? $Ptwwork->Assest_name: ''}}"
                                type="text" class="form-control" id="assest-name" placeholder="Assest Name" required>
                        </div>


                        <div class="col-md-6">
                            <input name="Assest_id"
                                   value="{{isset($Ptwwork->Assest_id)? $Ptwwork->Assest_id: ''}}"
                                   type="text" class="form-control" id="assest-id" placeholder="Assest ID" required>
                        </div>


                        <div class="col-md-4">
                            <label for="firstname" class="form-label">Work Start Date</label>
                            <select class=" form-control" name="start_date">
                                <option value>---Work Start Date----</option>
                                <option value="Attending"{{$Ptwwork->start_date=="Attending"?'selected':''}}>Attending
                                </option>
                                <option value="Not Attend"{{$Ptwwork->start_date=="Not Attend"?'selected':''}}>Not
                                    Attend
                                </option>
                                <option value="select date"{{$Ptwwork->start_date=="select date"?'selected':''}}>select
                                    date
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="preferredContractor" class="form-label">Preferred Contractor</label>
                            <select class="form-control" name="creferred_contractor">
                                <option value>---Preferred Contractor----</option>
                                <option value="Attending"{{$Ptwwork->creferred_contractor=="Attending"?'selected':''}}>
                                    Attending
                                </option>
                                <option
                                    value="Not Attend"{{$Ptwwork->creferred_contractor=="Not Attend"?'selected':''}}>Not
                                    Attend
                                </option>
                                <option
                                    value="select date"{{$Ptwwork->creferred_contractor=="select date"?'selected':''}}>
                                    select date
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="firstname" class="form-label">Upload Asset Isolation Procedure</label>
                            <input
                               value="{{isset($Ptwwork->Isolation_file)? $Ptwwork->Isolation_file: ''}}"
                             name="Isolation_file" type="file" class="form-control" id="Asset-upload" required>
                             @if(isset($Ptwwork->id))
                                        <img src="/ptw/work/{{ $Ptwwork->Isolation_file }}" width="10%">@endif
                        </div>
                    </div>


                    <button type="text" class="btn btn-primary mt-4" >Update</button>
                    <button type="text" class="btn btn-primary mt-4">Reset</button>

                </div>

            </form>
        </div>


    








@endsection

@section('javascript')
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        function yesnoCheck() {
            if (document.getElementById("yesCheck").checked) {
                document.getElementById("ifYes").style.visibility = "visible";

            } else document.getElementById("ifYes").style.visibility = "hidden";

        }


    </script>





@endsection



