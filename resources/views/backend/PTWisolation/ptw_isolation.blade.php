@extends('layouts.default')
@section('title')
   || PtW Isolation
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/isolation-multitab.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem">PTW Isolation</h3>
        </div> 

                     <form action="{{route('ptw_isolation.store')}}" method="post" id="msform" enctype="multipart/form-data">
                        @csrf
                                                    <!-- progressbar -->
                                                    <ul id="progressbar">
                                                        <li class="active" id="account"><strong>Isolation Certificate</strong></li>
                                                        <li id="personal"><strong>Isolation Confirmation Declaration</strong></li>
                                                        <li id="payment"><strong>Work Completion Declaration</strong></li>
                                                    </ul>
                                                    <!-- fieldsets -->
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Isolation Certificate</h2>


                                                                <div class="row g-3 align-items-center"> 
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">Isolation Certificate
                                                                            <span class="text-danger">*</span>
                                                                            <sup style="color: red; margin-left: 5px;">*</sup></label>
                                                                        <input name="Isolation_Certificate" type="text" class="form-control" id="lastname" required>
                                                                    </div>
                              
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">Work Request Ref
                                                                            <span class="text-danger">*</span>
                                                                            <sup style="color: red; margin-left: 5px;">*</sup></label>
                                                                        <input name="Request_Ref" type="text" class="form-control" id="lastname" required>
                                                                    </div>
                              
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">PTW Ref
                                                                            <span class="text-danger">*</span>
                                                                            <sup style="color: red; margin-left: 5px;">*</sup></label>
                                                                        <input name="PTW_Ref" type="text" class="form-control" id="lastname" required>
                                                                    </div>
                              
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">Isolation Date
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <input name="Isolation_Date" type="date" class="form-control" id="lastname" required>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">Isolation Time
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <input name="Isolation_Time" type="time" class="form-control" id="lastname" required>
                                                                    </div>
                              
                                                                    <div class="col-md-4">
                                                                        <label for="lastname" class="form-label">LOTO Box
                                                                            <span class="text-danger">*</span>
                                                                         </label>
                                                                        <input name="Loto_Box" type="text" class="form-control" id="lastname" required>
                                                                    </div>
                              
                                                                    <div class="col-sm-6 col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Isolation Detail Table list column headers
                                                                                <span class="text-danger">*</span>
                                                                             </label>
                                                                            <select class="form-control multiple" multiple="multiple" name="Isolation_Detail">
                                                                                <option value="">-- Select Isolation column headers --</option>
                                                                                <option value="RE">Item/Asset</option>
                                                                                <option value="VA">Isolation Type-electrical/mechanical</option>
                                                                                <option value="AL">Description</option>
                                                                                <option value="DZ">Lock #</option>
                                                                                <option value="DZ">Key #</option>
                                                                                <option value="DZ">Tag #</option>
                                                                                <option value="DZ">Isolation Time</option>
                                                                                <option value="DZ">Zero Energy State Test (check box)</option>
                                                                                <option value="DZ"> Isolated By</option>
                                                                                <option value="DZ"> Signature</option>
                                                                            </select>
                                                                          </div>
                                                                    </div>
                              
                                                                </div>
                                                            <!-- <input type="email" name="email" placeholder="Email Id"/>
                                                            <input type="text" name="uname" placeholder="UserName"/>
                                                            <input type="password" name="pwd" placeholder="Password"/>
                                                            <input type="password" name="cpwd" placeholder="Confirm Password"/> -->
                                                        </div>
                                                        <input type="button" name="next" class="next action-button" value="Next Step"/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Isolation Confirmation Declaration</h2>

                                                            <div class="row g-3 align-items-center"> 
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">Isolator Signature
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Isolator_Signature" type="file" class="form-control" id="lastname" required>
                                                                </div>
                            
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">PTW Issuer Signature
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Issuer_Signature" type="file" class="form-control" id="lastname" required>
                                                                </div>
                            
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Contractor Signature
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Contractor_Signature" type="file" class="form-control" id="lastname" required>
                                                                </div>
                            
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Isolation Confirmation Date
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Confirmation_Date" type="date" class="form-control" id="lastname" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Isolation Confirmation Time
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Confirmation_Time" type="time" class="form-control" id="lastname" required>
                                                                </div>

                                                                <div class="col-sm-6 col-md-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Isolation Detail Table list column headers 
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <select class="form-control multiple" style="width: 100%;" multiple="multiple" name="Isolation_Details">
                                                                            <option value="">-- Select Isolation column headers --</option>
                                                                            <option value="RE">Item/Asset</option>
                                                                            <option value="PT">PTW issuer approval (Signature)</option>          
                                                                            <option value="DZ">Lock #</option>
                                                                            <option value="DZ">Key #</option>
                                                                            <option value="DZ">Tag #</option>
                                                                            <option value="DE">Temporary Deisolation time</option>
                                                                            <option value="DZ">Deisolated By (Signature)</option>
                                                                            <option value="AL">Reisolation Time</option>
                                                                            <option value="DZ">Reisolated By (Signature)</option>
                                                                            <option value="DZ"> PTW issuer Ackhowledgment (Signature)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <input type="text" name="fname" placeholder="First Name"/>
                                                            <input type="text" name="lname" placeholder="Last Name"/>
                                                            <input type="text" name="phno" placeholder="Contact No."/>
                                                            <input type="text" name="phno_2" placeholder="Alternate Contact No."/> -->
                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                                        <input type="button" name="next" class="next action-button" value="Next Step"/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title">Payment Information</h2>
                                                            <!-- <div class="radio-group">
                                                                <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                                                <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div>
                                                                <br>
                                                            </div>
                                                            <label class="pay">Card Holder Name*</label>
                                                            <input type="text" name="holdername" placeholder=""/>
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <label class="pay">Card Number*</label>
                                                                    <input type="text" name="cardno" placeholder=""/>
                                                                </div>
                                                                <div class="col-3">
                                                                    <label class="pay">CVC*</label>
                                                                    <input type="password" name="cvcpwd" placeholder="***"/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <label class="pay">Expiry Date*</label>
                                                                </div>
                                                                <div class="col-9">
                                                                    <select class="list-dt" id="month" name="expmonth">
                                                                        <option selected>Month</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                        <option>March</option>
                                                                        <option>April</option>
                                                                        <option>May</option>
                                                                        <option>June</option>
                                                                        <option>July</option>
                                                                        <option>August</option>
                                                                        <option>September</option>
                                                                        <option>October</option>
                                                                        <option>November</option>
                                                                        <option>December</option>
                                                                    </select>
                                                                    <select class="list-dt" id="year" name="expyear">
                                                                        <option selected>Year</option>
                                                                    </select>
                                                                </div>
                                                            </div> -->
                                                            <div class="row g-3 align-items-center"> 
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">Contractor Signature
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Contractor_Signatures" type="file" class="form-control" id="lastname" required>
                                                                </div>
                                
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">PTW Issuer Signature
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="PTW_Issuer" type="file" class="form-control" id="lastname" required>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Contractor Name
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Contractor_Name" type="text" class="form-control" id="lastname" required>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Contractor Signature Date
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input name="Signature_Date" type="date" class="form-control" id="lastname" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">Contractor Signature Time</label>
                                                                    <input name="Signature_Time" type="time" class="form-control" id="lastname" required>
                                                                </div>
                                
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">PTW Issuer Signature Date</label>
                                                                    <input name="Issuer_Date" type="date" class="form-control" id="lastname" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="lastname" class="form-label">PTW Issuer Signature Time
                                                                        <span class="text-danger">*</span>

                                                                    </label>
                                                                    <input name="Issuer_Time" type="time" class="form-control" id="lastname" required>
                                                                </div>
                                
                                
                                
                                                                    <div class="col-sm-6 col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Deisolation Table list column headers
                                                                                <span class="text-danger">*</span>
                                                                             </label>
                                                                            <select class="form-control multiple" multiple="multiple" style="width: 100%;" name="Deisolation_Table">
                                                                            <option value="">-- Select Deisolation column headers --</option>
                                                                            <option value="RE">Item/Asset</option>
                                                                            <option value="VA">Deisolation time</option>
                                                                            <option value="AL">Deisolated By (signature)</option>
                                                                            <option value="DZ">PTW Issuer Acknowledgment (signature)</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                                        

                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-card">
                                                            <h2 class="fs-title text-center">Success !</h2>
                                                            <br><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-3">
                                                                    <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="row justify-content-center">
                                                                <div class="col-7 text-center">
                                                                    <h5>You Have Successfully Signed Up</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                 
                 
                      
              
            <!-- Row end  -->
                   
                
    <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0 ml-3">PTW Offer list</h3>

        </div>

   

        <div class="card-body">
            <table id="myProjectTable" class="table table-hover datatable "
                   style="width:100%">
                <thead>
                  <tr>
                        <th>Sl</th>
                        <th>Isolation_Certificate</th>
                        <th>Loto_Box</th>
                        <th>Isolation_Detail</th>
                        <th>Confirmation_Date</th>
                        <th>Isolation_Details</th>
                        <th>Refarence</th>
                        <th>Action</th>
                                    
                    </tr>
                </thead>
                <tbody>
              


                </tbody>
            </table>
        </div>
 </div>
         


@endsection

 @section('javascript')
        <!-- Jquery Core Js -->
    

    <!-- Jquery Page Js -->
    

    <!--======Multitab links=======-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


       <script>
        // project data table
        $(document).ready(function () {
            setTimeout(function () {
                $('.message').fadeOut('fast');
            }, 500);
            $('#myProjectTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Department Data',
                        text:      '<i class="fa-solid fa-file-excel"></i> Excel',
                        className: "btn btn-primary btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible'
                        },
                    },

                     {
                        extend: 'print',
                        title: 'Department Data',
                        alignment: "center",
                        header: true,
                        text:  '<i class="fa-solid fa-print"></i> Print',
                        className: "btn btn-success btn-sm btn-rounded",
                        exportOptions: {
                            columns: ':visible',
                            alignment: "center",
                        },
                        // customize: function(doc) {
                        //     console.log(doc)
                        // }
                    },
                   
                ],
               
                ajax: {
                    url: "{{ route('ptw_isolation.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "Isolation_Certificate"},
                    {"data": "Loto_Box"},
                    {"data": "Isolation_Detail"},
                    {"data": "Confirmation_Date"},
                    {"data": "Isolation_Details"},
                    {"data": "Request_Ref"},
                    
                    // {"data": "status"},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>',
                        previous: '<i class="fa-solid fa-chevron-left"></i>'
                    }
                }
            });
        });
    </script>


    <script>
        $(document).ready(function(){
    
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        
        $(".next").click(function(){
            
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            
            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            
            //show the next fieldset
            next_fs.show(); 
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
        
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                }, 
                duration: 600
            });
        });
        
        $(".previous").click(function(){
            
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            
            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            
            //show the previous fieldset
            previous_fs.show();
        
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
        
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                }, 
                duration: 600
            });
        });
        
        $('.radio-group .radio').click(function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
        
        $(".submit").click(function(){
            return false;
        })
            
        });
    </script>

    <!--======Multitab links end =======-->

    <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            $('.deleterow').on('click',function(){
            var tablename = $(this).closest('table').DataTable();  
            tablename
                    .row( $(this)
                    .parents('tr') )
                    .remove()
                    .draw();

            } );
        });
    </script>

    <!-- select2 multi dropdown -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
        <!--===1==--> 
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



                               