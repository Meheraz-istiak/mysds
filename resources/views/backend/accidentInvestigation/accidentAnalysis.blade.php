@extends('layouts.default')

@section('title')
    Accident Analysis
@endsection

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
        div#items {
            border-top: 1px dashed #000;
            margin: 2rem 0 2rem 8px;
            padding-top: 2rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('content')
    <div class="card">
        <div class="card-header"> <h3>Accident Information</h3></div>
        <div class="card-body">
            <form class="mt-3" method="POST" action="{{route('accident_investigation.store')}}">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Injured Person
                                Depertment </label>
                            <select class="form-control"
                                    aria-label="Default select example"
                                    id="em_dept" name="em_dept">
                                <option value="">-- Select Depertment --</option>
                                @foreach($dep as $list)
                                    <option value="{{$list->id}}">{{$list->depertment_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="employee_name" class="form-label"> Injured Person Name </label>
                            <select name="em_name" id="employee_list" autofocus
                                    class="form-control col-md-12">
                                <option>Select Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="employee_designation" class="form-label">Employee Designation </label>
                            <input class="form-control" aria-label="Default select example" readonly
                                   name="em_des" id="employee_designation">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Location of Incident </label>
                            <input class="form-control" type="text" name="l_of_incident">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Type of Accident </label>
                            <select class="form-control" name="t_of_accident">
                                <option selected>-- Select --</option>
                                <option value="1">Near Miss</option>
                                <option value="2">First Aid Injury</option>
                                <option value="3">Injury(4 Days MC)</option>
                                <option value="4">Serious Bodily Injury</option>
                                <option value="5">Fatal Injury</option>
                                <option value="6">Occupational Diseases</option>
                                <option value="7">Occupational Poisoning</option>
                                <option value="8">Dangerous Occurrence</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tim_of_incident" class="form-label">Time Of Incident</label>
                            <input type="time" class="form-control" id="tim_of_incident" name="tim_of_incident" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="rpt_to_dosh">Report to DOSH </label>
                            <select class="form-control" name="rpt_to_dosh">
                                <option selected>-- Select --</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="st_of_invesg">Status of Investigation Report</label>
                            <textarea id="st_of_invesg" class="form-control" name="st_of_invesg"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="outcom_of_investg">Outcome of Investigation</label>
                            <textarea id="outcom_of_investg" name="outcom_of_investg"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="summ_of_incident">Summary of Incident</label>
                            <textarea id="summ_of_incident" name="summ_of_incident"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">MC ANALYSIS</label>
                    <div class="input-group">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Start Date Of MC</label>
                                <input type="date" class="form-control" name="start_dateMC[]" id="s_date[]" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">End Date Of MC</label>
                            <input type="date" class="form-control"
                                   name="end_dateMC[]" id="e_date[]" required>
                        </div>
                        <div class="col-md-4">
                            <label for="postcode1" class="form-label">Total
                                Duration</label>
                            <input type="number"  class="form-control"
                                   name="total_duration[]" id="output[]" onclick="calculateDays()" value=""
                                   required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Type of Notification
                                : </label>
                            <input class="form-control" name="typ_of_notif[]"
                                   type="text">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Type of Records
                                : </label>
                            <input class="form-control" name="typ_of_record[]"
                                   type="text">
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-plus-circle fa-2x text-success addROw cursor-pointer mt-4" title="Add More"></i>
                        </div>
                    </div>
                </div>
                <div id="show_item">
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-4 px-5 text-uppercase">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#em_dept').on('change', function () {
                let emDepartment = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'get',
                    url:"get-em-name"+'/'+emDepartment,
                    data: {emDepartment:emDepartment},
                    success: function (data) {
                        $('#employee_list').html(data);
                    }
                });
            });
            $('#employee_list').on('change', function () {
                let emp_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'get',
                    url:"get-emp_designation"+'/'+emp_id,
                    data: {emp_id:emp_id},
                    success: function (data) {

                        $('#employee_designation').val(data[0].department);
                    }
                });
            });
            $('#summ_of_incident').summernote({
                placeholder: 'Describe Incident',
                tabsize: 2,
                height: 100
            });
            $('#outcom_of_investg').summernote({
                placeholder: 'Describe Incident',
                tabsize: 2,
                height: 100
            });
            $('#st_of_invesg').summernote({
                placeholder: 'Describe Incident',
                tabsize: 2,
                height: 100
            });
            $(".addROw ").click(function (e) {
                e.preventDefault();
                $("#show_item").append(`
                                                <div class="row">
                                                <div class="row g-3 align-items-center" id="items">
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="form-label">Start Date Of MC</label>
                                                    <input type="date" class="form-control" name="start_dateMC[]" id="s_date[]"  required>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="form-label">End Date Of MC</label>
                                                    <input type="date" class="form-control" name="end_dateMC[]" id="e_date[]" required>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="postcode1" class="form-label">Total Duration</label>
                                                    <input type="number"  class="form-control" name="total_duration[]" id="output[]" onclick="calculateDays()" value="" required>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="form-label">Type of Notification : </label>
                                                    <input class="form-control" name="typ_of_notif[] type="text">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="form-label">Type of Records : </label>
                                                    <input class="form-control" name="typ_of_record[]" type="text">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <i class="fas fa-trash-alt fa-2x text-danger rmvROw cursor-pointer mt-3" title="Remove"></i>
                                                </div>
                                                </div>`);
                $(document).on('click', '.rmvROw', function (e) {
                    e.preventDefault();
                    let row_item = $(this).parent().parent();
                    $(row_item).remove();
                });
            });
        });
        function calculateDays() {

            var d1 = document.getElementById("s_date[]").value;
            var d2 = document.getElementById("e_date[]").value;
            const dateOne = new Date(d1);
            const dateTwo = new Date(d2);
            const time = Math.abs(dateTwo - dateOne);
            const days = Math.ceil(time / (1000 * 60 * 60 * 24));
            var Myelement = document.getElementById("output[]");
            Myelement.value = days;
        }
        $('#em_dept').on('change', function () {
            let emDepartment = $(this).val();
            if( ((emDepartment !== undefined) || (emDepartment != null)) && emDepartment) {
                $.ajax({
                    url: "get-em-name"+'/'+emDepartment,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        if (data) {
                            $('#employee_name').empty();
                            $('#employee_name').append('<option hidden>Choose Employee</option>');
                            $.each(data, function (key, emp) {
                                $('select[name="employee_name"]').append('<option value="' + key + '">' +emp.em_name + '</option>');
                            });
                        } else {
                            $('#employee_name').empty();
                        }
                    }
                });
            } else {
                $('#employee_name').empty();
            }
        });

        $('#em_dept').on('change', function () {
            let emDepartment = $(this).val();
            if( ((emDepartment !== undefined) || (emDepartment != null)) && emDepartment) {
                $.ajax({
                    url: "get-em-name"+'/'+emDepartment,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (data) {
                        console.log(data)
                        if (data) {
                            $('#employee_name').empty();
                            $('#employee_name').append('<option hidden>Choose Employee</option>');
                            $.each(data, function (key, emp) {
                                $('select[name="employee_name"]').append('<option value="' + key + '">' +emp.em_name + '</option>');
                            });
                        } else {
                            $('#employee_name').empty();
                        }
                    }
                });
            } else {
                $('#employee_name').empty();
            }
        });
    </script>
@endsection
