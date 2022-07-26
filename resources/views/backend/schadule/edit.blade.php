@extends('layouts.default')
@section('title')
   Schedule Demo Edit
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">Schedule Demo Edit</h3>
      </div>
      <div class="card-body">
           <div class="row align-item-center">
                 <div class="col-md-12">
                     <form method="POST" action="{{route('i_schadule.update',$data->id)}}" enctype="multipart/form-data" id="schadule">
                       @csrf
               
                <div class="row">
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="company_name"
                      id="company_name"
                      value="{{isset($data1->company_name1) ? $data1->company_name1:''}}"
                      placeholder="Enter Company Name"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="industry_type_id"
                      id="industry_type_id"

                      value="{{isset($data1->industry_type_id) ? $data1->industry_type_id:''}}" 
                      
                    />
                      

                  </div>

                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="number_of_employees"
                      id="number_of_employees"
                      value="{{isset($data1->number_of_employees) ? $data1->number_of_employees:''}}" 
                      placeholder="Enter number of employees"
                    />
                  </div>

                  <div class="form-group col-md-6">
                    <input
                      type="email"
                      class="form-control"
                       name="email_address"
                      id="email_address"
                      value="{{isset($data1->email_address) ? $data1->email_address:''}}" 
                      placeholder="Enter Email Address"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="person_incharge"
                      id="person_incharge"
                      value="{{isset($data1->person_incharge) ? $data1->person_incharge:''}}" 
                      placeholder="Enter person incharge"
                    />
                  </div>
                 
                

                   <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                       name="designation"
                      id="designation"
                      value="{{isset($data1->designation) ? $data1->designation:''}}" 
                      placeholder="Enter Designation"
                    />
                  </div>

                    <div class="form-group col-md-6">
                    <input
                      type="number"
                      class="form-control"
                       name="contact_no"
                      id="contact_no"
                      value="{{isset($data1->contact_no) ? $data1->contact_no:''}}" 
                      placeholder="Enter contact no"
                    />
                  </div>

                  
               
                  <div class="form-group col-md-6">
                    <label for="">Select Date</label>
                    <input type="date" class="form-control" name="meeting_date"
                     value="{{isset($data1->meeting_date) ? $data1->meeting_date:''}}" 
                     />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Select Time</label>
                    <input type="time" class="form-control" name="meeting_time"
                      value="{{isset($data1->meeting_time) ? $data1->meeting_time:''}}"   
                     />
                  </div>
                 
             <input type="hidden" name="schedule_id" id="schedule_id" class="form-control" value="(data1->id)">
              <div class="col-md-3 mt-2">
                    <label><strong>Status<span class="span">*</span></strong></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="radio" name="status"
                                   value="1"
                                   @if(isset($data1->status) && $data1->status == "1") checked @endif
                                   required id="active_y" checked
                            />
                            <label class="form-check-label"
                                   for="active_y">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                   required id="active_n" value="0"
                                   @if(isset($data1->status) && $data1->status == "0") checked @endif
                            />
                            <label class="form-check-label"
                                   for="active_n">In-Active</label>
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>
                     <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-full">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      
      
@endsection()

   @section('javascript')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script>

                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);

                 
                });
            </script>

@endsection