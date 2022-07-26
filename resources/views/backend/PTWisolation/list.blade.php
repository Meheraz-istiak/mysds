@extends('layouts.default')

@section('css')
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

    </style>
@endsection

@section('content')
    <!-- sidebar -->
    

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->

 <div class="body d-flex py-3">
      <div class="container-xxl">
                <!-- Row end  -->
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">PTW work list</h3>
                         
                        </div>
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover "
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
                                    @foreach($Isolation as $key=>$value)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->Isolation_Certificate}}</td>
                                        <td>{{$value->Loto_Box}}</td>
                                        <td>{{$value->Isolation_Detail}}</td>
                                        <td>{{$value->Confirmation_Date}}</td>
                                        <td>{{$value->Isolation_Details}}</td>
                                        <td>{{$value->Request_Ref}}</td>
                                      
                                        <td>
                                            <a href="{{route('ptw_isolation.edit',$value->id)}}" class="" > <i class="fas fa-edit"></i></a>||

                                            <a href="{{route('ptw_isolation.destroy',$value->id)}}" class="" > <i class="fas fa-trash cursor-pointer"style="color: darkred" ></i></a>

                                            

                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>


@endsection

@section('javascript')

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="{{asset('assets/js/template.js')}}"></script>

        <script>
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
    </script>


    

@endsection


