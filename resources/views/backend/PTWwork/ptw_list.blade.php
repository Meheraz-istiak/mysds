@extends('layouts.default')

@section('title')
    List of Activity
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
    <div class="card mb-3">
        <div
            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
            <h3 class="fw-bold mb-0" style="margin-left: 1rem"> PTW Work List</h3>
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
                    <th>Reference Number</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Ptwwork as $key=>$value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->depertment_name}}</td>
                        <td>{{$value->work_type}}</td>
                        <td>{{$value->work_detalis}}</td>
                        <td>{{$value->Assest_name}}</td>
                        <td>{{$value->reference}}</td>
                        <td>
                            <a href="{{route('ptw_work.edit',$value->id)}}" class=""> <i class="fas fa-edit"></i></a>||

                            <a href="{{route('ptw_work.destroy',$value->id)}}" class=""> <i
                                    class="fas fa-trash cursor-pointer" style="color: darkred"></i></a>


                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
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
        $(document).ready(function () {
            $('#myProjectTable')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [
                        {targets: [-1, -3], className: 'dt-body-left'}
                    ]
                });
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




@endsection


