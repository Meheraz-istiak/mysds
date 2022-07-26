@extends('layouts.default')

@section('title')

 || Edit PtW details
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

   <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
    <!-- Body: Body -->
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
                        <form method="POST" action="{{route('ptw_details.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                               
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4 col-md-4">
                                            <label for="lastname" class="form-label">Primary PTW Type</label>
                                            <input 

                                            value="{{isset($Ptw_details->Primary_PTW)? $Ptw_details->Primary_PTW: ''}}"
                                            name="Primary_PTW" type="text" class="form-control" id="lastname" required>
                                        </div>

                                        <div class="col-sm-4 col-md-4">
                                            <label for="lastname" class="form-label">Secondary PTW Type</label>
                                            <input 
                                            value="{{isset($Ptw_details->Secondary_PTW)? $Ptw_details->Secondary_PTW: ''}}"
                                            name="Secondary_PTW" type="text" class="form-control" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="lastname" class="form-label">PTW Ref #</label>
                                            <input 
                                            value="{{isset($Ptw_details->PTW_Ref)? $Ptw_details->PTW_Ref: ''}}"
                                            name="PTW_Ref" value="{{$reference_no}}" type="text" class="form-control" id="lastname" required readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="lastname" class="form-label">Permit Duration</label>
                                            <input 
                                            value="{{isset($Ptw_details->Permit_Duration)? $Ptw_details->Permit_Duration: ''}}"
                                            name="Permit_Duration" type="number" class="form-control" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Isolation Required?</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input 
                                                        

                                                        name="Isolation_Required" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="0"
                                                        {{ ($Ptw_details->Isolation_Required=="0")? "checked" : "" }}
                                                        > <!--checked=""-->
                                                        <label class="form-check-label" for="exampleRadios11">
                                                        Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input 

                                                         name="Isolation_Required"class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios22"

                                                          value="1"

                                                          {{ ($Ptw_details->Isolation_Required=="1")? "checked" : "" }}
                                                          >
                                                        <label class="form-check-label" for="exampleRadios22">
                                                        No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="admitdate" class="form-label">Work Start Date</label>
                                            <input 
                                            value="{{isset($Ptw_details->Start_Date)? $Ptw_details->Start_Date: ''}}"
                                             name="Start_Date" type="date" class="form-control w-100" id="admitdate" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="admitdate" class="form-label">Expected Work End Date</label>
                                            <input 
                                            value="{{isset($Ptw_details->End_Date)? $Ptw_details->End_Date: ''}}"
                                             name="End_Date" type="date" class="form-control w-100" id="admitdate" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="formFileMultiple" class="form-label">SWP / JSA</label>

                                            <input 
                                            value="{{isset($Ptw_details->SWP)? $Ptw_details->SWP: ''}}"
                                            name="SWP" class="form-control" type="file" id="formFileMultiple" multiple required>

                                               @if(isset($Ptw_details->id))
                                                  <img src="/ptw/SWP/{{ $Ptw_details->SWP}}" width="10%">@endif
                                        </div>


                                        <div class="col-md-4">
                                            <label for="addnote" class="form-label">Planned work flow</label>
                                            <textarea name="work_flow" class="form-control" placeholder="List Down Work Flow" id="addnote" rows="3">{{isset($Ptw_details->work_flow)? $Ptw_details->work_flow: ''}}"</textarea> 
                                        </div> 


                                      

                                           
                                                <div class="col-md-12">
                                                    <div id="inputFormRow">

                                                         <label for="lastname" class="form-label">List of Tools & Equipment -pre-fill from ptw offer</label>
                                                        <div class="input-group mb-3">
                                                           
                                                            <input type="text" name="Equipment_pre_fill[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <button style="margin-left: 10px;" id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="newRow"></div>
                                                    <button  id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                </div>

                                        <div class="col-md-4">
                                            <label for="lastname" class="form-label">List of workers -pre-fill from ptw offer</label>
                                            <input
                                             value="{{isset($Ptw_details->workers_pre_fill)? $Ptw_details->workers_pre_fill: ''}}"
                                             name="workers_pre_fill" type="text" class="form-control " placeholder="Name" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input
                                             value="{{isset($Ptw_details->phone_no)? $Ptw_details->phone_no: ''}}"
                                             name="phone_no" type="number" class="form-control" placeholder="Phone No" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input 
                                              value="{{isset($Ptw_details->ptw_id)? $Ptw_details->ptw_id: ''}}"
                                              name="ptw_id" type="text" class="form-control" placeholder="Id" id="lastname" required>
                                        </div>


                                        <div class="col-sm-6 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">PPE REQUIRED </label>
                                                <select class="form-control multiple" multiple="multiple" name="ppe_required[]">
                                                    <option value="">-- Select PPE Required --</option>
                                                    <option value="Respirator"{{$Ptw_details->ppe_required=="Respirator"?'selected':''}}>Respirator</option>
                                                    <option value="Safety Glasses"{{$Ptw_details->ppe_required=="Safety Glasses"?'selected':''}}>Safety Glasses</option>
                                                    <option value="Safety Shoes"{{$Ptw_details->ppe_required=="Safety Shoes"?'selected':''}}>Safety Shoes</option>
                                                    <option value="Knitted Gloves"{{$Ptw_details->ppe_required=="Knitted Gloves"?'selected':''}}>Knitted Gloves</option>
                                                    <option value="Safety Harness"{{$Ptw_details->ppe_required=="Safety Harness"?'selected':''}}>Safety Harness</option>
                                                    <option value="Nitrile Glove"{{$Ptw_details->ppe_required=="Nitrile Glove"?'selected':''}}>Nitrile Glove</option>
                                                    <option value="OTHERS"{{$Ptw_details->ppe_required=="OTHERS"?'selected':''}}>OTHERS</option>
                                                </select>
                                              </div>
                                          </div>
                                    </div>
                                    
		                                    
		                             <button type="submit" class="btn btn-primary mt-4">Submit</button>    
		                            </div>
                           
                            </form>
                        </div>
                        
                    </div>
                </div><!-- Row end  -->

            </div>
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
          
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>     
		<script>
		    $(function() {
		        // initialize after multiselect
		        $('#basic-form').parsley();
		    });
		</script>
			<script>
			    $(document).ready(function() {
			    $('.multiple').select2();
			    });
			</script>


        
 @endsection



