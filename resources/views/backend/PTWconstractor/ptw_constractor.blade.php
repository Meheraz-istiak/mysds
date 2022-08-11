@extends('layouts.default')
@section('title')
    || PtW Constractor
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
                    <h3 class="fw-bold mb-0" style="margin-left: 1rem">PtW Constractor</h3>
                </div>

                     <div class="card-body">
                                <div class="row align-item-center">
                                   <div class="col-md-12">

                                <form action="{{route('ptw_constractor.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4 col-md-6">
                                            <label for="lastname" class="form-label">Contractor ID
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Contractor_ID" type="text" class="form-control" id="contractorid" required>
                                        </div>

                                        <div class="col-sm-4 col-md-6">
                                            <label for="lastname" class="form-label">Contractor Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Contractor_Name" type="text" class="form-control" id="contractorname" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="admitdate" class="form-label">Confirm Work Start Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Start_Date" type="date" class="form-control w-100" id="startdate" required>  
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirmtime" class="form-label">Confirm Work Start Time
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="Start_Time" type="time" class="form-control w-100" id="startime" required>  
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <label for="admitdate" class="form-label">Expected Work End Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="End_Date" type="date" class="form-control w-100" id="enddate" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="confirmtime" class="form-label">Expected Work End Time
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="End_Time" type="time" class="form-control w-100" id="endtime" required>  
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <label for="addnote" class="form-label">Planned work flow
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea  name="work_flow" class="form-control" placeholder="List Down Work Flow" id="addnote" rows="3"></textarea> 
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Isolation Required?
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input name="Isolation_Required" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="1"> <!--checked=""-->
                                                        <label class="form-check-label" for="exampleRadios11">
                                                        Yes
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input name="Isolation_Required" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios22" value="0">
                                                        <label class="form-check-label" for="exampleRadios22">
                                                        No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <label for="formFileMultiple" class="form-label">SWP / JSA
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="SWP" class="form-control" type="file" id="formFileMultiple" multiple required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="firstname" class="form-label">PPE Required
                                                <span class="text-danger">*</span>
                                            </label>
                                        
                                            <select class=" form-control" name="PPE_Required">
                                                <option value >---PPE Required----</option>  
                                                <option value="Attending">Attending </option>
                                                <option value="Not Attend">Not Attend</option>
                                                <option value="select date">select date</option>     
                                            </select>
                                        </div>
 

                                        
                                      

                                         <div  class="col-md-12" id="show_item">
                                             <div class="row">

                                          
                                        <div class="col-md-4">
                                            <label for="lastname" class="form-label">List of workers -pre-fill from ptw offer
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="ptw_name[]" type="text" class="form-control " placeholder="Name" id="ptw_name" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input name="ptw_phone[]" type="number" class="form-control" placeholder="Phone No" id="ptw_phone" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input name="ptw_id[]" type="text" class="form-control" placeholder="Id" id="ptw_id" required>
                                        </div>

                                     
                                                 <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary addROw" style="  display: block;
                                                        margin-left: auto;margin-right: 0; margin-top: 10px; margin-left:15px">ADD more</button>
                                                </div>

                                            </div>
                                        </div>


                                       
                                        <div class="col-md-6">
                                            <label for="lastname" class="form-label">List of Tools & Equipment -pre-fill from ptw offer
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="ptw_offer" type="text" class="form-control" id="lastname" required>
                                           
                                            
                                        </div>
                                    </div>
                                    
                                   
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        
                                </form> 
                          </div>
                     </div>
                       
                        
                    </div>
                </div><!-- Row end  -->

       

<div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0" style="margin-left: 1rem"> PTW Constractor List</h3>
        </div>


        <div class="card-body">
            <table id="myProjectTable" class="table table-hover "
                   style="width:100%">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Depertment</th>
                    <th>work type</th>
                    <th>work_detalis</th>
                    <th>Assest_name</th>
                    <th>Phone Number</th>
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
                    url: "{{ route('ptw_constractor.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "Contractor_Name"},
                    {"data": "Start_Date"},
                    {"data": "work_flow"},
                    {"data": "PPE_Required"},
                    {"data": "ptw_phone"},
                    
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

<!--        <script>
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-left' }
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
    </script> -->
          
     
           <script>
              $(".addROw").click(function () {
                                            // e.preventDefault();
                                            $("#show_item").prepend(`

                                           <div class="row">

                                          
                                         <div class="col-md-4">
                                            <label for="lastname" class="form-label">List of workers -pre-fill from ptw offer</label>
                                            <input name="ptw_name[]" type="text" class="form-control " placeholder="Name" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input name="ptw_phone[]" type="number" class="form-control" placeholder="Phone No" id="lastname" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label></label>
                                            <input name="ptw_id[]" type="text" class="form-control" placeholder="Id" id="lastname" required>
                                        </div>


                                          


                                           <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger rmvROw" style="  display: block;
                                                        margin-left: auto;margin-right: ;margin-top: 10px; margin-left:15px">Remove</button>
                                        </div>
                                            
                                        </div>
                                                </div>`

                                                );
                                            $(document).on('click', '.rmvROw', function (e) {
                                                e.preventDefault();
                                                let row_item = $(this).parent().parent();
                                                $(row_item).remove();
                                            });
                                        });


           </script>


        
 @endsection



                               