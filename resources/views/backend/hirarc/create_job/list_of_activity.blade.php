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
            <h3 class="fw-bold mb-0" style="margin-left: 1rem"> Activity List</h3>
        </div>

        <div class="col-md-4">
            <div class="form-group ">
                <label class="form-label">
                    Department
                    <span class="text-danger">*</span>
                </label>

                <select name="depertment_id" id="depertment_id" class="form-control"
                >
                    <option value="">Select Department</option>
                    @foreach($department as $list)


                        <option value="{{$list->depertment_name}}">

                            {{isset($list->id)? $list->depertment_name: ''}} </option>

                    @endforeach
                </select>
            </div>
        </div>


        <div class="card-body">

            <table id="dataTableDraw" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                <thead class="bg-table">
                <tr>
                    <th class="sort">Sl</th>
                    <th class="sort">Depertment</th>
                    <th class="sort">Job Activity</th>
                    <th class="sort">Sequence</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('javascript')

    <script>


        $(document).ready(function () {

            setTimeout(function () {
                $('table').DataTable({
                    "bServerSide": true,
                    "bDestroy": true,
                    processing: true,
                    responsive: true,
                    ordering: true,
                    ajax: "{{ route('c_job.datatable') }}",
                    columns: [
                        {data: 'DT_RowIndex', "name": 'DT_RowIndex'},
                        {data: 'department.depertment_name'},
                        {data: 'job_activity'},
                        {data: 'sequence_job'},
                        // {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                });
            }, 500);


            $("#depertment_id").on("change", function () {
                $('#dataTableDraw').DataTable().search(
                    $('#depertment_id').val()
                ).draw();
            });

        });

    </script>

@endsection


