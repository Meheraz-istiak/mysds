@extends('layouts.default')

@section('title')
    || Meeting Report
@endsection

@section('css')
    <style type="text/css">
        .footer_right h4:nth-child(1) {
            border-bottom: dashed;
            padding-bottom: 4.5rem;
        }

        .footer_right {
            text-align: center;
        }

    </style>

@endsection

@section('content')

    <!-- main body area -->
    <div class="card">

        <div class="card-header font-weight-bolder">
            <h2>Meeting Report</h2>
        </div>

        <div class="card-body">

            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-12">
                    <div class="card p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <h3 style="text-align:center;font-weight: bold;font-size: 17px;">MINUTES OF MEETING<br>
                                INAUGURAL SAFETY COMMITTEE MEETING<br>

                            </h3>
                            <div class="info" style="height:100px">

                                <p><span>Date</span>		:<span>{{ $data->meeting_date }}</span></p>
                                <p><span>Time</span>		:<span>{{ $data->time }}</span></p>
                                <p><span> Venue	</span>	: 	<span>{{ $data->venue }}</span></p>
                                <div>
                                    <h5>Present Member</h5>
                                    @foreach ($data2 as $datas)
                                        {{ $datas->p_member}}{{ ','}}
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <h3>INTRODUCTION</h3>
                            <div class="info">
                                <ul>
                                    <li>{!!$data->introduction!!}</li>
                                </ul>
                                <h3>Endorsement	</h3>
                                <div class="info">
                                    <ul>
                                        <li>{!!$data->endorsement!!}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Agenda Type</th>
                                        <th>Agenda</th>
                                        <th >PIC</th>
                                        <th >Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($meetting_details as $datas)
                                        <tr>
                                            <td> {{ $datas->agenda_type}}  </td>
                                            <td> {{ $datas->agenda}}  </td>
                                            <td > {{ $datas->pic}}</td>
                                            <td >{{ $datas->remarks}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-title">

                        </div>
                        <div class="card-body">
                            <h5>Closing</h5>
                            <p>{!!$data->closing!!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="footer_right">
                        <h4>Reviewed and Approved by:</h4>
                        <h4> (Mr. Renato De Oliveira- GM )</h4>
                        <h5>chairman</h5>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="footer_right">
                        <h4>Reviewed and Approved by:</h4>
                        <h4> (Mr. Renato De Oliveira- GM )</h4>
                        <h5>chairman</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('meeting.report-pdf',$data->id) }}">
                        <i class="fas fa-arrow-down"></i> Download</a>
                </div>
            </div>

        </div>
    </div>

@endsection
