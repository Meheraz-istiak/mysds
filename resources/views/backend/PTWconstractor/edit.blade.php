@extends('layouts.default')
@section('title')
  || Edit PtW Constractor
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
                    <h3 class="fw-bold mb-0" style="margin-left: 1rem">PtW Constractor Edit</h3>
                </div>
                <div class="card-body">
                            <div class="row align-item-center">
                               <div class="col-md-12">

                    <form action="{{route('ptw_constractor.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 align-items-center">
                                <div class="col-sm-4 col-md-6">
                                    <label for="lastname" class="form-label">Contractor ID</label>
                                    <input 
                                     value="{{isset($PtwConstractor->Contractor_ID)? $PtwConstractor->Contractor_ID: ''}}"
                                    name="Contractor_ID" type="text" class="form-control" id="contractorid" required>
                                </div>

                                <div class="col-sm-4 col-md-6">
                                    <label for="lastname" class="form-label">Contractor Name</label>
                                    <input 
                                    value="{{isset($PtwConstractor->Contractor_Name)? $PtwConstractor->Contractor_Name: ''}}"

                                    name="Contractor_Name" type="text" class="form-control" id="contractorname" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="admitdate" class="form-label">Confirm Work Start Date</label>
                                    <input 
                                    value="{{isset($PtwConstractor->Start_Date)? $PtwConstractor->Start_Date: ''}}"

                                    name="Start_Date" type="date" class="form-control w-100" id="startdate" required>  
                                </div>

                                <div class="col-md-6">
                                    <label for="confirmtime" class="form-label">Confirm Work Start Time</label>
                                    <input 
                                    value="{{isset($PtwConstractor->Start_Time)? $PtwConstractor->Start_Time: ''}}"

                                    name="Start_Time" type="time" class="form-control w-100" id="startime" required>  
                                </div>

                                

                                <div class="col-md-6">
                                    <label for="admitdate" class="form-label">Expected Work End Date</label>
                                    <input
                                    value="{{isset($PtwConstractor->End_Date)? $PtwConstractor->End_Date: ''}}"


                                     name="End_Date" type="date" class="form-control w-100" id="enddate" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="confirmtime" class="form-label">Expected Work End Time</label>
                                    <input 

                                   value="{{isset($PtwConstractor->End_Time)? $PtwConstractor->End_Time: ''}}"

                                    name="End_Time" type="time" class="form-control w-100" id="endtime" required>  
                                </div>

                                
                                <div class="col-md-6">
                                    <label for="addnote" class="form-label">Planned work flow</label>
                                    <textarea  name="work_flow" class="form-control" placeholder="List Down Work Flow" id="addnote" rows="3">{{isset($PtwConstractor->work_flow)? $PtwConstractor->work_flow: ''}}"
                                    </textarea> 
                                </div>

                               


                                 <div class="col-md-4">
                                            <label class="form-label">Isolation Required?</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input 
                                                        

                                                        name="Isolation_Required" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="0"
                                                        {{ ($PtwConstractor->Isolation_Required=="0")? "checked" : "" }}
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

                                                          {{ ($PtwConstractor->Isolation_Required=="1")? "checked" : "" }}
                                                          >
                                                        <label class="form-check-label" for="exampleRadios22">
                                                        No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                
                                <div class="col-md-6">
                                    <label for="formFileMultiple" class="form-label">SWP / JSA</label>
                                    <input 

                                    value="{{isset($PtwConstractor->SWP)? $PtwConstractor->SWP: ''}}"

                                    name="SWP" class="form-control" type="file" id="formFileMultiple" multiple required>

                                     @if(isset($PtwConstractor->id))
                                                  <img src="/ptw/Constractor/{{ $PtwConstractor->SWP}}" width="10%">@endif
                                </div>

                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">PPE Required</label>
                                
                                    <select class=" form-control" name="PPE_Required">
                                        <option value >---PPE Required----</option>  
                                        <option value="Attending" {{$PtwConstractor->PPE_Required=="Attending"?'selected':''}}>Attending </option>
                                        <option value="Not Attend"{{$PtwConstractor->PPE_Required=="Not Attend"?'selected':''}}>Not Attend</option>
                                        <option value="select date"{{$PtwConstractor->PPE_Required=="select date"?'selected':''}}>select date</option>     
                                    </select>
                                </div>


                                
                              

                                 <div class="col-md-12" id="show_item">
                                     <div class="row">

                                  
                                <div class="col-md-4">
                                    <label for="lastname" class="form-label">List of workers -pre-fill from ptw offer</label>
                                    <input 
                                    value="{{isset($PtwConstractor->ptw_name)? $PtwConstractor->ptw_name: ''}}"

                                    name="ptw_name[]" type="text" class="form-control " placeholder="Name" id="ptw_name" required>
                                </div>

                                <div class="col-md-4">
                                    <label></label>
                                    <input 
                                    value="{{isset($PtwConstractor->ptw_phone)? $PtwConstractor->ptw_phone: ''}}"

                                    name="ptw_phone[]" type="number" class="form-control" placeholder="Phone No" id="ptw_phone" required>
                                </div>

                                <div class="col-md-4">
                                    <label></label>
                                    <input 
                                    value="{{isset($PtwConstractor->ptw_id)? $PtwConstractor->ptw_id: ''}}"
                                    name="ptw_id[]" type="text" class="form-control" placeholder="Id" id="ptw_id" required>
                                </div>

                             
                                         

                                    </div>
                                </div>


                               
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">List of Tools & Equipment -pre-fill from ptw offer</label>
                                    <input 

                                   value="{{isset($PtwConstractor->ptw_offer)? $PtwConstractor->ptw_offer: ''}}"

                                    name="ptw_offer" type="text" class="form-control" id="lastname" required>
                                   
                                    
                                </div>
                            </div>
                            
                           
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                
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


           </script>


        
 @endsection



                               