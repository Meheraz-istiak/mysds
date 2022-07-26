@extends('layouts.default')
@section('title')
    Meeting
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
        div#tr1 {
            overflow: auto;
            margin-left: 1.3rem;
            margin-right: 1.3rem;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-center font-weight-bolder bg-success text-white pt-3 pb-3 shadow-bottom rounded-capsule">
                    Meeting Minutes
                </div>
            </div>
            <div class="card-body">
                <form method="post"  enctype="multipart/form-data" @if(isset($data->id))
                action="{{ route('meeting.meeting-update', ['id' => $data->id]) }}">
                    <input name="_method" type="hidden" value="PUT">
                    @else
                        action="{{ route('meeting.store') }}">
                    @endif
                    @csrf
                    <input type="hidden" name="meeting_id">
                    <input type="hidden" name="company_id" id="" class="form-control" value="{{ $user->company_id }}">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label >Company Name</label>
                                <input name="company_name" id="" class="form-control" value="{{ $companies->company_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Enter Meeting Date</label>
                                <input type="date"  name="meeting_date" class="form-control" value="{{isset($data->meeting_date) ? $data->meeting_date:''}}">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Enter Meeting Time</label>
                                <input type="time"  name="time" class="form-control"  value="{{isset($data->time) ? $data->time:''}}">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="form-label">Enter Meeting Venue</label>
                                <input type="text" placeholder="Enter Meeting Venue" name="venue" class="form-control" value="{{isset($data->venue) ? $data->venue:''}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Check Present Member</label>
                            <div id="checkboxes">
                                @foreach ($values as $value)
                                    <input type="checkbox" name="p_member[]" value="{{ $value-> em_name }}"
                                    @if (isset($data->id))
                                        @foreach ($data2 as $dat)
                                            {{ $value->em_name == $dat->p_member ? 'checked' : '' }}
                                            @endforeach
                                        @endif /><span style="margin:0px 10px;font-size:17px;font-weight:700">
                                {{ $value->em_name }}--{{ $value->designation}}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"> Meeting introduction</label>
                                <textarea name="introduction"  cols="80"  id="summernote"  class="form-control">
                       {{ (isset($data->introduction)?$data->introduction:'') }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </label>
                                <textarea name="endorsement" id="summernote1" cols="80" class="form-control">{{isset($data->endorsement) ? $data->endorsement:''}}</textarea>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <thead>
                            <tr>
                                <th>Agenda Type</th>
                                <th>Agenda</th>
                                <th>Pic</th>
                                <th>Remarks</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($data->id))
                                {{--                            @dd($data1)--}}
                                @foreach ($data1 as $dats)
                                    <tr id="tr">
                                        <td><select type="text" name="agenda_type_id[]" id="agenda_type_update"  class="form-control agenda_type_add" >
                                                <option {{ ($dats->agenda_type_id == 1) ? 'selected':'' }} value="1">Others</option>
                                                <option {{ ($dats->agenda_type_id == 2) ? 'selected':'' }} value="2">Incedence</option>
                                                <option {{ ($dats->agenda_type_id == 3) ? 'selected':'' }} value="3">Work Inspection</option>
                                            </select>
                                        </td>
                                        <td id="agenda_other">
                                            <input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control"  value="{{ isset($dats->agenda) ? $dats->agenda:''}}">
                                        </td>
                                        <td style="display: none" id="incedence">
                                            <select class="form-control"  type="text" name="incdence_no[]">
                                                <option value="">---Choose---</option>
                                                @foreach($accidence as $list)
                                                    <option {{old('inc_number') == $list->inc_number ? 'selected' : ''}} value="{{$list->inc_number}}">{{$list->inc_number}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="display: none" id="inspection">
                                            <select name="inspection[]" class="form-control inspection">
                                                <option value="">---Choose---</option>
                                                @foreach($inspection as $list)
                                                    <option {{old('id') == $list->id ? 'selected' : ''}} value="{{$list->id}}">{{$list->inspection_title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="pic[]" placeholder="Enter pic" class="form-control"  value="{{ isset($dats->pic) ? $dats->pic:''}}"  />
                                        </td>
                                        <td><input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control"  value="{{ isset($dats->remarks) ? $dats->remarks:''}}"  />
                                        </td>
                                        <td>
                                            <i class="fas fa-plus-circle fa-2x cursor-pointer" name="add" id="add_btn" title="Add More"></i></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr id="tr">
                                    <td><select type="text" name="agenda_type_id[]"  id="agenda_type" class="form-control agenda_type" >
                                            <option value="1">Others</option>
                                            <option value="2">Incedence</option>
                                            <option value="3">Work Inspection</option>
                                        </select>
                                    </td>
                                    <td class="agenda_other">
                                        <input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control "  >
                                    </td>
                                    <td style="display: none" class="incedence">
                                        <select type="text" name="incdence_no[]" class="form-control " >
                                            <option value="">---Choose---</option>
                                            @foreach($accidence as $list)
                                                <option value="{{$list->inc_number}}">{{$list->inc_number}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="display: none" class="inspection"><select type="text" name="inspection[]" class="form-control " >
                                            <option value="">---Choose---</option>
                                            @foreach($inspection as $list)
                                                <option value="{{$list->id}}">{{$list->inspection_title}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="pic[]" placeholder="Enter pic" class="form-control"  />
                                    </td>
                                    <td>
                                        <input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control"   />
                                    </td>
                                    <td>
                                        <i class="fas fa-plus-circle fa-2x cursor-pointer" name="add" id="add_btn" title="Add More"></i>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="row" id="tr1">
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">CLOSING</label>
                                <textarea name="closing" id="summernote2">{{ isset($data->closing) ? $data->closing:''}}</textarea>
                            </div>
                        </div>
                        @if (isset($data->id))
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info btn-sm rounded-capsule">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        @else
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-sm rounded-capsule">
                                    <i class="fas fa-save"></i> Submit
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        @if (isset($data->id))
        @else
            <div class="card mt-3 mb-3">
                <div class="card-header">
                    <h1 class=" text-center">Meeting Report</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dataTable data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Venue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($s_values as $key => $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->meeting_date }}</td>
                                    <td>{{ $v->time }}</td>
                                    <td>{{ $v->venue }}</td>
                                    <td>
                                        <a class="btn btn-sm" href="{{ route('meeting.report', $v->id )}}">
                                            <i class="fas fa-eye text-info"></i> view Details
                                        </a>
                                        <a href="{{ route('meeting.delete',$v->id) }}">
                                            <i class="fas fa-trash text-danger"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @endif


    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
        $(document).ready(function() {
            $('#summernote2').summernote();
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function(){
            // let rand = Random();
            $(document).on('click', '#edit_data', function () {
                let agenda_type = $('#agenda_type_update').val();
                let pa = $(this).parent().parent().parent();

                if (agenda_type == 1) {
                    $(pa).find("#agenda_other").css("display", "block");
                    $(pa).find("#incedence").css("display", "none");
                    $(pa).find("#inspection").css("display", "none");
                }else if(agenda_type == 2){
                    $(pa).find("#agenda_other").css("display", "none");
                    $(pa).find("#incedence").css("display", "block");
                    $(pa).find("#inspection").css("display", "none");
                }else{
                    $(pa).find("#agenda_other").css("display", "none");
                    $(pa).find("#incedence").css("display", "none");
                    $(pa).find("#inspection").css("display", "block");

                }
            });
            $(document).on('change', '.agenda_type_add', function () {
                let agenda_type = $(this).val();
                let pa = $(this).parent().parent().parent();
                $.ajax({
                    url: "{{ route('meeting.getData') }}",
                    type: "POST",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (dataResult) {
                        let accidence = dataResult.accidence
                        let inspection = dataResult.inspection
                        let accidence_res = '';
                        let inspection_res = '';
                        console.log(dataResult.inspection)
                        $.each(accidence, function (key, val) {
                            // console.log(val)
                            // $('.incedenceo1').append('');
                            accidence_res += '<option value="'+val.id+'">'+val.inc_number+'</option>'
                        });
                        $.each(inspection, function (key, val) {
                            // console.log(val)
                            // $('.inspectiono1').append('');
                            inspection_res += '<option value="'+val.id+'">'+val.inspection_title+'</option>'
                        });

                        $('.incedenceo1').html(accidence_res);
                        $('.inspectiono1').html(inspection_res);
                    }
                });

                if (agenda_type == 1) {
                    $(pa).find("#agenda_other1").css("display", "block");
                    $(pa).find("#incedence1").css("display", "none");
                    $(pa).find("#inspection1").css("display", "none");
                    $(pa).find("#agenda_other").css("display", "block");
                    $(pa).find("#incedence").css("display", "none");
                    $(pa).find("#inspection").css("display", "none");
                    // $(".agenda_other1").css("display", "block");
                    // $(".incedence1").css("display", "none");
                    // $(".inspection1").css("display", "none");
                }else if(agenda_type == 2){
                    $(pa).find("#agenda_other1").css("display", "none");
                    $(pa).find("#incedence1").css("display", "block");
                    $(pa).find("#inspection1").css("display", "none");
                    $(pa).find("#agenda_other").css("display", "none");
                    $(pa).find("#incedence").css("display", "block");
                    $(pa).find("#inspection").css("display", "none");
                    // $(".agenda_other1").css("display", "none");
                    // $(".inspection1").css("display", "none");
                    // $(".incedence1").css("display", "block");
                }else{
                    $(pa).find("#agenda_other1").css("display", "none");
                    $(pa).find("#incedence1").css("display", "none");
                    $(pa).find("#inspection1").css("display", "block");
                    $(pa).find("#agenda_other").css("display", "none");
                    $(pa).find("#incedence").css("display", "none");
                    $(pa).find("#inspection").css("display", "block");
                    // $(".agenda_other1").css("display", "none");
                    // $(".incedence1").css("display", "none");
                    // $(".inspection1").css("display", "block");

                }
            });

            function Random() {
                return Math.floor(Math.random() * 100);
            }

            // function randomValue() {
            //     document.getElementById('tb').value = Random();
            // }

            // $("#add_btn").on('click',function () {
            //     // console.log(rand);
            //     let html=' ';
            //     html+=''
            //     html+='<tr>';
            //     html+='<td><select type="text" name="agenda_type_id[]"  class="form-control agenda_type_add" ><option value="1">Others</option><option value="2">Incedence</option><option value="3">Work Inspection</option></select></td>';
            //     html+='<td class="agenda_other1"><input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control "  >';
            //     html+='<td style="display: none" class="incedence1"><select type="text" name="incdence_no[]"  class="form-control incedenceo1" ><option value="">---Choose---</option></select></td>';
            //     html+='<td style="display: none" class="inspection1"><select type="text" name="inspection_no[]"  class="form-control inspectiono1" ><option value="">---Choose---</option></select></td>';
            //     html+='<td><input type="text" name="pic[]" class="form-control"/></td>';
            //     html+='<td><input type="text" name="remarks[]" class="form-control"/></td>';
            //     html+='<td><button type="button" class="btn btn-primary" id="remove" >Remove</button></td>';
            //     html+='</tr>';
            //     $('tbody').append(html);
            // })
            $('#add_btn').click(function () {
                $('#tr1').append('<td class="tdcl" colspan="5"><div class="row mt-1"><div class="col-md-2"><select type="text" name="agenda_type_id[]"  class="form-control agenda_type_add" ><option value="1">Others</option><option value="2">Incedence</option><option value="3">Work Inspection</option></select></div>\n' +
                    '<div class="col-md-3" id="agenda_other1"><input type="text" name="agenda[]" placeholder="Enter agenda" class="form-control"  value="{{ isset($dats->agenda) ? $dats->agenda:null}}"></div>\n' +
                    '<div style="display: none" class="col-md-3 incdence" id="incedence1"><select type="text" name="incdence_no[]" class="form-control"><option value="">---Choose---</option>@foreach($accidence as $list)<option value="{{$list->inc_number}}">{{$list->inc_number}}</option>@endforeach</select></div>\n' +
                    '<div style="display: none" class="col-md-3 inspection" id="inspection1"><select name="inspection[]" id="inspection" class="form-control"><option value="">---Choose---</option>@foreach($inspection as $list)<option value="{{$list->id}}">{{$list->inspection_title}}</option>@endforeach</select></div>\n' +
                    '<div class="col-md-3"><input type="text" name="pic[]" placeholder="Enter pic" class="form-control"  value="{{ isset($dats->pic) ? $dats->pic:null}}"  /></div>\n' +
                    '<div class="col-md-3"><input type="text" name="remarks[]" placeholder="Enter Remarks" class="form-control"  value="{{ isset($dats->remarks) ? $dats->remarks:null}}"  /></div>' +
                    '<div class="col-md-1"><i class="fas fa-ban fa-2x text-danger cursor-pointer" title="Remove" id="remove"></i></div></td>');
            });
        });
        $(document).on('click','#remove',function(){
            $(this).closest('tr').remove();
        });
        $(document).on('click','#remove',function(){
            $(this).closest('td').remove();
        });



        $(document).on('change', '.agenda_type', function () {
            let agenda_type = $(this).val();
            let pa = $(this).parent().parent().parent();

            if (agenda_type == 1) {
                $(pa).find(".agenda_other").css("display", "block");
                $(pa).find(".incedence").css("display", "none");
                $(pa).find(".inspection").css("display", "none");
                // $(".agenda_other1").css("display", "block");
                // $(".incedence1").css("display", "none");
                // $(".inspection1").css("display", "none");
            }else if(agenda_type == 2){
                $(pa).find(".agenda_other").css("display", "none");
                $(pa).find(".incedence").css("display", "block");
                $(pa).find(".inspection").css("display", "none");
                // $(".agenda_other1").css("display", "none");
                // $(".inspection1").css("display", "none");
                // $(".incedence1").css("display", "block");
            }else{
                $(pa).find(".agenda_other").css("display", "none");
                $(pa).find(".incedence").css("display", "none");
                $(pa).find(".inspection").css("display", "block");
                // $(".agenda_other1").css("display", "none");
                // $(".incedence1").css("display", "none");
                // $(".inspection1").css("display", "block");

            }

            // if (agenda_type == 1) {
            //     $(".agenda_other").css("display", "block");
            //     $(".incedence").css("display", "none");
            //     $(".inspection").css("display", "none");
            // }else if(agenda_type == 2){
            //     $(".agenda_other").css("display", "none");
            //     $(".inspection").css("display", "none");
            //     $(".incedence").css("display", "block");
            // }else{
            //     $(".agenda_other").css("display", "none");
            //     $(".incedence").css("display", "none");
            //     $(".inspection").css("display", "block");
            //
            // }
        });

    </script>
    <!-- Row End -->
    </div>
@endsection
