@extends('layouts.default')

@section('title')
    Create Job
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
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Create Job</h5>
            {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
        </div>
        <div class="card-body">
            <div class="row ">

                <form method="POST" enctype="multipart/form-data" id="department"

                      @if(isset($data->id))
                      action="{{ route('c_job.update', ['id' => $data->id]) }}">
                    <input name="_method" type="hidden" value="PUT">
                    @else
                        action="{{ route('c_job.store')}}">
                    @endif
                    @csrf
                    <div class="row g-3" style="margin: 0 auto;">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label class="form-label">
                                    Department
                                    <span class="text-danger">*</span>
                                </label>

                                <!-- <input type="text" class="form-control" required> -->


                                <select name="depertment_id" id="depertment_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($department as $list)

                                        <option value="{{$list->id}}">

                                            {{isset($list->id)? $list->depertment_name: ''}} </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="company_id" id="company_id" class="form-control" value="">


                    <div class="row g-3" style="margin: 0 auto;">
                        <div class="col-md-6">
                            <label for="depone" class="form-label"
                            >JOB ACTIVITY
                                <span class="text-danger">*</span>
                            </label
                            >
                            <input type="text"
                                   class="form-control"
                                   id="job_activity"
                                   name="job_activity[]"
                                   value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                            />
                        </div>

                        <div class="col-md-4">
                            <label for="depone" class="form-label">
                                Picture
                                <span class="text-danger">*</span>
                            </label
                            >
                            <input type="file"

                                   class="form-control"
                                   accept="image/png, image/jpeg,image/jpg"
                                   id="imagefile"
                                   name="imagefile[]"
                                   value="{{isset($data->imagefile)? $data->imagefile: ''}}"
                            />


                        </div>

                        <div id="show_item"></div>

                        <div class=" col-md-2 mt-4" >
                            <button type="button" class=" btn-primary addROw">Add more
                            </button>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>




                <div class="card mb-3">
                    <div
                        class="card-header  justify-content-between border-bottom ">
                        <h3 class="fw-bold mb-0"> Activity List</h3>

                    </div>
                    <div class="card-body">
                        <table id="m" class="table table-hover datatable align-middle mb-0"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Depertment</th>
                                <th>Job_activity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->depertment_name}}</td>
                                    <td>{{$value->job_activity}}</td>
                                    <td>
                                        <img height="50px" width="40px"
                                             src="{{asset('/image/jobimage/' . $value->image)}}"
                                             alt="not found">
                                    </td>
                                    <td>
                                        <a href="{{route('c_job.edit',$value->id)}}" class="">
                                            <i class="fas fa-edit cursor-pointer"></i>
                                        </a>||
                                        <a href="{{route('c_job.destroy',$value->id)}}"
                                           class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash cursor-pointer"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                @endsection
@section('javascript')
                    {{--    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>--}}

                    {{--    <!-- Plugin Js-->--}}
                    {{--    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>--}}

                    {{--    <!-- Jquery Page Js -->--}}
                    {{--    <script src="{{asset('../js/template.js')}}"></script>--}}
                    <script>
                        // project data table
                        $("#employee_id").on("change", function () {
                            let emp_id = $("#employee_id").val();
                            $.ajax({
                                type: 'get',
                                url: "getempdesignation" + '/' + emp_id,
                                success: function (data) {


                                    $('#designation').val(data.ds_name);
                                    $('#designation_id').val(data.id);
                                }
                            });
                        });

                        $(document).ready(function () {
                            $(".datatable").dataTable({
                                responsive: true,
                                dom: 'lBfrtip<"actions">',
                                buttons: [
                                    // {
                                    //     extend: 'copyHtml5',
                                    //     title: 'Job Data',
                                    //     exportOptions: {
                                    //         columns: ':visible'
                                    //     },
                                    // },
                                    // {
                                    //     extend: 'csvHtml5',
                                    //     title: 'Job Data',
                                    //     exportOptions: {
                                    //         columns: ':visible'
                                    //     },
                                    // },
                                    {
                                        extend: 'excelHtml5',
                                        title: 'Accident Analysis List',
                                        text: '<i class="fa-solid fa-file-excel"></i> Excel',
                                        className: "btn btn-primary btn-sm btn-rounded",
                                        exportOptions: {
                                            columns: ':visible'
                                        },
                                    },
                                    // {
                                    //     extend: 'pdfHtml5',
                                    //     orientation: 'landscape',
                                    //     pageSize: 'LEGAL',
                                    //     title: 'Department Data',
                                    //     customize : function(doc){
                                    //         let colCount = new Array();
                                    //         $('.datatable').find('tbody tr:first-child td').each(function(){
                                    //             if($(this).attr('colspan')){
                                    //                 for(let i=1;i<=$(this).attr('colspan');$i++){
                                    //                     colCount.push('*');
                                    //                 }
                                    //             }else{ colCount.push('*'); }
                                    //         });
                                    //         doc.content[1].table.widths = colCount;
                                    //
                                    //         // let arr2 = $('.img-fluid').map(function(){
                                    //         //     return this.src;
                                    //         // }).get();
                                    //         //
                                    //         // for (let i = 0, c = 1; i < arr2.length; i++, c++) {
                                    //         //     doc.content[1].table.body[c][0] = {
                                    //         //         image: arr2[i],
                                    //         //         width: 100
                                    //         //     }
                                    //         // }
                                    //     },
                                    //     exportOptions: {
                                    //         columns: ':visible'
                                    //     },
                                    // },
                                    {
                                        extend: 'print',
                                        title: 'Accident Analysis List',
                                        alignment: "center",
                                        header: true,
                                        text: '<i class="fa-solid fa-print"></i> Print',
                                        className: "btn btn-success btn-sm btn-rounded",
                                        exportOptions: {
                                            columns: ':visible',
                                            alignment: "center",
                                        },
                                        // customize: function(doc) {
                                        //     console.log(doc)
                                        // }
                                    },
                                    {
                                        extend: 'colvis',
                                        className: "btn btn-info btn-sm btn-rounded",
                                    }
                                ],
                                columnDefs: [
                                    {targets: '_all', className: "dt-body-center"},
                                    {targets: '_all', className: "dt-head-center"}
                                ],
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

                        $(".addROw").click(function () {
                            // e.preventDefault();
                            $("#show_item").append(`
                   <div class="row "  style="margin: 0 auto;">
                     <div class="col-md-6 ">
                        <label for="depone" class="form-label">
                        </label>
                        <input type="text"

                               class="form-control"
                               id="job_activity"
                               name="job_activity[]"
                               value="{{isset($data->job_activity)? $data->job_activity: ''}}"
                        />
                    </div>
                         <div class="col-md-4">
                             <label for="formFileMultiple" class="form-label">
                             </label>
                              <input
                                class="form-control"

                                type="file"
                                id="imagefile"
                                name="imagefile[]"
                              />
                            </div>
                       <div class="">
                       <button type="button" class="btn btn-danger rmvROw" style="  display: block;
                        margin-left: auto;margin-right: 0;margin-top: 10px;">Remove</button>
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


                        function caltoprice() {
                            var likelihood_l = parseInt($('#likelihood_l').val());
                            var severity_s = parseInt($('#severity_s').val());

                            var total = parseInt((likelihood_l + severity_s));

                            $('#rmn').val(total);
                        }

                        function caltoprice1() {
                            var likelihood_l1 = parseInt($('#likelihood_l1').val());
                            var severity_S1 = parseInt($('#severity_S1').val());

                            var total = parseInt((likelihood_l1 + severity_S1));

                            $('#rmn1').val(total);
                        }


                    </script>

@endsection


