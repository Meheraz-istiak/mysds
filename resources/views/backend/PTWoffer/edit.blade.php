@extends('layouts.default')

@section('title')
   || PTW Offer Edit
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
        <form method="post" action="{{route('ptw_offer.update',$data->id)}}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

            @csrf
            <div class="card-body">

                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Work Request ref#</label>
                        <input name="reference"

                               type="text"

                               value="{{isset($Ptwoffer->reference)? $Ptwoffer->reference: ''}}"

                               value="{{$reference_no}}"


                               class="form-control" id="workRequesRef" readonly required>
                    </div>
                    <div class="col-md-6">
                        <label for="conName&Id" class="form-label">Select Contractor to offer PTW</label>
                        <select class=" form-control" name="Contractor_offer">
                            <label for="" class="form-label"></label>
                            <option value>---Choose----</option>
                            <option value="repearing" {{$Ptwoffer->Contractor_offer=="repearing"?'selected':''}}>
                                repearing
                            </option>
                            <option value="maintainence"{{$Ptwoffer->Contractor_offer=="maintainence"?'selected':''}}>
                                maintainence
                            </option>
                            <option value="repearing"{{$Ptwoffer->Contractor_offer=="repearing"?'selected':''}}>
                                repearing
                            </option>
                            <option value="maintainence"{{$Ptwoffer->Contractor_offer=="maintainence"?'selected':''}}>
                                maintainence
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="ptwType" class="form-label">Primary PTW Type</label>
                        <select class=" form-control" name="Primary_PTW">
                            <option value>---Choose----</option>
                            <option value="Cold Work" {{$Ptwoffer->Primary_PTW=="Cold Work"?'selected':''}}>Cold Work
                            </option>
                            <option value="Hot Work"{{$Ptwoffer->Primary_PTW=="Hot Work"?'selected':''}}>Hot Work
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="sePermitType" class="form-label">Secondary Permit Type</label>
                        <select class="form-control" name="Secondary_Permit">
                            <option value>---Choose----</option>
                            <option
                                value="Working at Height"{{$Ptwoffer->Secondary_Permit=="Working at Height"?'selected':''}}>
                                Working at Height
                            </option>
                            <option
                                value="High Voltate Electricity"{{$Ptwoffer->Secondary_Permit=="High Voltate Electricity"?'selected':''}}>
                                High Voltate Electricity
                            </option>
                            <option
                                value="High Rist Chemicals"{{$Ptwoffer->Secondary_Permit=="High Rist Chemicals"?'selected':''}}>
                                High Rist Chemicals
                            </option>
                            <option
                                value="Confined Space Entry"{{$Ptwoffer->Secondary_Permit=="Confined Space Entry"?'selected':''}}>
                                Confined Space Entry
                            </option>
                            <option value="None"{{$Ptwoffer->Secondary_Permit=="None"?'selected':''}}>None</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="PermitValidity" class="form-label">Permit Validity</label>
                        <select class=" form-control" name="Permit_Validity">
                            <option value>---Choose----</option>
                            <option
                                value="12 Hours (Cold Work)"{{$Ptwoffer->Permit_Validity=="12 Hours (Cold Work)"?'selected':''}}>
                                12 Hours (Cold Work)
                            </option>
                            <option
                                value="8 Hours (Hot Works)"{{$Ptwoffer->Permit_Validity=="8 Hours (Hot Works)"?'selected':''}}>
                                8 Hours (Hot Works)
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="department-type" class="form-label"> Department</label>

                        <select class=" form-control" name="department_id" id="department_id">
                            @foreach($department as $list)

                                <option value="{{$list->id}}">

                                    {{isset($list->id)? $list->depertment_name: ''}} </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Requested Work Start Date</label>
                        <input
                            value="{{isset($Ptwoffer->workdate)? $Ptwoffer->workdate: ''}}"
                            type="text" class="form-control" name="workdate" id="workdate" required>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Main Work Area </label>
                        <select class=" form-control" name="Work_Area">
                            <option value>---Choose----</option>
                            <option value="Area 1"{{$Ptwoffer->Work_Area=="Area 1"?'selected':''}}>Area 1</option>
                            <option value="Area 2"{{$Ptwoffer->Work_Area=="Area 2"?'selected':''}}>Area 2</option>
                            <option value="Area 3"{{$Ptwoffer->Work_Area=="Area 3"?'selected':''}}>Area 3</option>
                            <option value="Area 4"{{$Ptwoffer->Work_Area=="Area 4"?'selected':''}}>Area 4</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Area Authority-Main Work Area</label>
                        <select class=" form-control" name="Area_Authority">
                            <option value>---Choose----</option>
                            <option
                                value="Area Authority A"{{$Ptwoffer->Area_Authority=="Area Authority A"?'selected':''}}>
                                Area Authority A
                            </option>
                            <option
                                value="Area Authority B"{{$Ptwoffer->Area_Authority=="Area Authority B"?'selected':''}}>
                                Area Authority B
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Work Type </label>

                        <select class=" form-control" name="Work_Type">
                            <option value>---Choose----</option>
                            <option value="daily"{{$Ptwoffer->Work_Type=="daily"?'selected':''}}>daily</option>
                            <option value="weekly"{{$Ptwoffer->Work_Type=="weekly"?'selected':''}}>weekly</option>
                            <option value="monthly"{{$Ptwoffer->Work_Type=="monthly"?'selected':''}}>monthly</option>
                            <option value="when required"{{$Ptwoffer->Work_Type=="when required"?'selected':''}}>when
                                required
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Would the work affect any other area?</label>
                            <br>
                            <label class="fancy-radio">
                                <input type="radio"

                                       name="other_area"
                                       value="1"
                                       required data-parsley-errors-container="#error-radio"
                                       data-parsley-multiple="gender"
                                    {{ ($Ptwoffer->other_area=="1")? "checked" : "" }}
                                >
                                <span><i></i>Yes</span>
                            </label>
                            <label class="fancy-radio" style="margin-right: 30px;">
                                <input
                                    type="radio"
                                    name="other_area"
                                    value="2" data-parsley-multiple="gender"
                                    {{ ($Ptwoffer->other_area=="2")? "checked" : "" }}
                                >
                                <span><i></i>No</span>
                            </label>
                            <label class="fancy-radio" style="margin-right: 30px;">
                                <input
                                    type="radio"
                                    name="other_area"
                                    value="3"
                                    data-parsley-multiple="gender"
                                    {{ ($Ptwoffer->other_area=="3")? "checked" : "" }}
                                >
                                <span><i></i>May be</span>
                            </label>
                            <p id="error-radio"></p>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="addnote" class="form-label">Work details</label>
                        <textarea name="Work_details" class="form-control" id="addnote" rows="3">{{isset($Ptwoffer->Work_details)? $Ptwoffer->Work_details: ''}}"</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Asset</label>
                        <select class=" form-control" name="Asset">
                            <option value>---Choose----</option>
                            <option value="Attending"{{$Ptwoffer->Asset=="Attending"?'selected':''}}>Attending</option>
                            <option value="Not Attend"{{$Ptwoffer->Asset=="Not Attend"?'selected':''}}>Not Attend
                            </option>
                            <option value="select date"{{$Ptwoffer->Asset=="select date"?'selected':''}}>select date
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Isolation Procedure </label>
                        <input type="file"
                               value="{{isset($Ptwoffer->Isolation_Procedure)? $Ptwoffer->Isolation_Procedure: ''}}"
                               class="form-control" name="Isolation_Procedure" id="firstname" required>
                                @if(isset($Ptwoffer->id))
                                        <img src="/ptw/offer/{{ $Ptwoffer->Isolation_Procedure }}" width="10%">@endif
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Would the work affect any other area?</label>
                            <br/>
                            <label class="fancy-radio" style="margin-right: 30px;">
                                <input type="radio" name="work_affect" value="0" required
                                       data-parsley-errors-container="#error-radio" data-parsley-multiple="gender"
                                    {{ ($Ptwoffer->work_affect=="0")? "checked" : "" }}
                                >
                                <span><i></i>Yes- include in assign contractor list</span>
                            </label>
                            <label class="fancy-radio" style="margin-right: 30px;">
                                <input type="radio" name="work_affect" value="1" data-parsley-multiple="gender"
                                    {{ ($Ptwoffer->work_affect=="1")? "checked" : "" }}

                                >
                                <span><i></i>No-remove from assign contractor list & submit form</span>
                            </label>
                            <p id="error-radio"></p>
                        </div>
                    </div>
                </div>


                <button type="text" class="btn btn-primary" style="padding: 10px 40px;">Update</button>
            </div>

        </form>
    </div><!-- Row end  -->







@endsection

@section('javascript')
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <!-- Jquery Page Js -->


    <script>


    </script>



@endsection



