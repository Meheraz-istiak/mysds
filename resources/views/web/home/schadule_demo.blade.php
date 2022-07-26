@extends('layouts.auth')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection()

@section('content')

   <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('message')}}
            </div>
        @endif
    </div>

      <div id="main-wrapper" class="page-wrapper">
        <div class="dc-signin theme-two">
          <div class="signin-wrapper">
            <div class="intro-box">
              <div class="intro-content style-dark">
                <img src="images/logo.png" class="logo" alt="DCode" />
                <div class="heading-wrapper">
                  <h2 class="h1">Welcome to <span>Tech & Safety</span></h2>
                </div>
                <div class="text-wrapper">
                  <p>Already Have an account</p>
                </div>
                <div class="btn-wrapper">
                  <a class="btn btn-primary btn-light" href="{{url('/login')}}">Login Now</a>
                </div>
              </div>
            </div>
        
            <div class="form-box">
         <form method="POST" action="{{route('schadule.store')}}" enctype="multipart/form-data" id="schadule">
                 @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="company_name"
                      id="company_name"
                      required="required"
                      placeholder="Enter Company Name"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="industry_type_id"
                      id="industry_type_id"
                      required="required"
                      placeholder="Enter industry Name"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="number_of_employees"
                      id="number_of_employees"
                      required="required"
                      placeholder="Enter number of employees"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="email"
                      class="form-control"
                       name="email_address"
                      id="email_address"
                       required="required"
                      placeholder="Enter Email Address"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                      name="person_incharge"
                      id="person_incharge"
                       required="required"
                      placeholder="Enter person incharge"
                    />
                  </div>
                 
                

                   <div class="form-group col-md-6">
                    <input
                      type="text"
                      class="form-control"
                       name="designation"
                      id="designation"
                       required="required"
                      placeholder="Enter Designation"
                    />
                  </div>

                  <div class="form-group col-md-12">
                    <input
                      type="number"
                      class="form-control"
                       name="contact_no"
                      id="contact_no"
                       required="required"
                      placeholder="Enter contact no"
                    />
                  </div>

                  
               
                  <div class="form-group col-md-6">
                    <label for="">Select Date</label>
                    <input type="date"  placeholder="Enter contact no" class="form-control" required="required" name="meeting_date" />
                  </div>

                  <div class="form-group col-md-6">
                    <label for="">Select Time</label>
                    <input 
                    type="time" 
                    class="form-control" 
                    name="meeting_time"
                    required="required"
                     />
                  </div>
                 
                 
                <div class="form-group" style="margin-left: 12px;">
                  <label
                    ><input type="checkbox" required="required" name="status"  value="0" /> I accept the
                    policy and terms</label
                  >
                </div>
                <div class="form-group" style="margin-top: 51px;">
                  <button type="submit" class="btn btn-primary btn-full">Sign Up</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Page Header -->
      </div>
@endsection()

@section('javascript')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <script src="{{asset('assets/plugin/parsleyjs/js/parsley.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="../js/template.js"></script>
           <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                // project data table
                $(document).ready(function () 
                {
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
              <script>
                Window>addEventListener('show-delete-confirmation',event =>{

                  Swal.fire({
                              title: 'Are you sure?',
                              text: "You won't be able to revert this!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                              if (result.isConfirmed) {
                                Swal.fire(
                                  'Deleted!',
                                  'Your file has been deleted.',
                                  'success'
                                )
                              }
                            })

                });
                
                
              </script>


          
          


@endsection
