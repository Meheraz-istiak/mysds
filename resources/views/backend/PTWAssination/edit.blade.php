@extends('layouts.default')

@section('title')
   Edit PtW Assination
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Personal Assination</h3>
        </div>
          <div class="card-body">
                            <div class="row align-item-center">
                               <div class="col-md-12">
                 <form method="POST" enctype="multipart/form-data" action="

                        {{route('ptw_assination.update',$data->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="row g-3 align-items-center">
                          <div class=" col-md-6">
                            <div class="form-group">
                                <label class="form-label">PTW Issuer Work Area</label>
                                <select class="form-control" name="PTW_Issuer">
                                    <option value="">-- Select Area --</option>
                                    <option value="Work Area A"{{$PtwAssination->PTW_Issuer=="Work Area A"?'selected':''}}>Work Area A</option>
                                    <option value="Work Area B"{{$PtwAssination->PTW_Issuer=="Work Area B"?'selected':''}}>Work Area B</option>
                                    <option value="Work Area C"{{$PtwAssination->PTW_Issuer=="Work Area C"?'selected':''}}>Work Area C</option>
                                    <option value="Work Area D"{{$PtwAssination->PTW_Issuer=="Work Area D"?'selected':''}}>Work Area D</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="lastname" class="form-label">PTW Issuer Phone Number</label>
                            <input 
                            value="{{isset($PtwAssination->Issuer_Phone)? $PtwAssination->Issuer_Phone: ''}}"
                            name="Issuer_Phone" type="text" class="form-control" id="pnoneNo" required>
                          </div>


                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">PTW Supervisor</label>
                                <select class="form-control" name="PTW_Supervisor">
                                    <option value="">-- Select Supervisor --</option>
                                    <option value="Supervisor Name A"{{$PtwAssination->PTW_Supervisor=="Supervisor Name A"?'selected':''}}>Supervisor Name A</option>
                                    <option value="Supervisor Name B"{{$PtwAssination->PTW_Supervisor=="Supervisor Name B"?'selected':''}}>Supervisor Name B</option>
                                    <option value="Supervisor Name C"{{$PtwAssination->PTW_Supervisor=="Supervisor Name C"?'selected':''}}>Supervisor Name C</option>
                                    <option value="Supervisor Name D"{{$PtwAssination->PTW_Supervisor=="Supervisor Name D"?'selected':''}}>Supervisor Name D</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="lastname" class="form-label">PTW Supervisor Phone Number</label>
                            <input
                             value="{{isset($PtwAssination->Supervisor_Phone)? $PtwAssination->Supervisor_Phone: ''}}"
                             name="Supervisor_Phone" type="text" class="form-control" id="phoneNo" required>
                          </div>
                          
                          <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Health & Safety Advisor</label>
                                <select class="form-control" name="Safety_Advisor">
                                    <option value="">-- Select Advisor --</option>
                                    <option value="Advisor A"{{$PtwAssination->Safety_Advisor=="Advisor A"?'selected':''}}>Advisor A</option>
                                    <option value="Advisor B"{{$PtwAssination->Safety_Advisor=="Advisor B"?'selected':''}}>Advisor B</option>
                                    <option value="Advisor C"{{$PtwAssination->Safety_Advisor=="Advisor C"?'selected':''}}>Advisor C</option>
                                    <option value="Advisor D"{{$PtwAssination->Safety_Advisor=="Advisor D"?'selected':''}}>Advisor D</option>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="lastname" class="form-label">Health & Safety Advisor Phone number</label>
                            <input
                            value="{{isset($PtwAssination->Advisor_Phone)? $PtwAssination->Advisor_Phone: ''}}" 
                            name="Advisor_Phone" type="text" class="form-control" id="phoneNo" required>
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



                               