@extends('layouts.default')

@section('title')
   Schedule Demo List
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

    <div class="row no-gutters">
        <div class="col-lg-12 pr-lg-2">
            <div class="card h-100 bg-gradient" style="font-family: monospace, Sans-serif">
                <div style="border-color: rgba(255, 255, 255, 0.15) !important" class="card-footer text-left bg-transparent border-bottom text-white font-weight-bolder d-flex justify-content-between">
                    <strong>Dashboard</strong>
                    <strong><span class="fa fa-user fs--1"></span> <span style="display: flex; margin-top: -1.4rem; margin-left: 1.5rem;">Logged In As {{ Auth::user()->name }}</span></strong>
                </div>
                <div class="card-body p-3 ">
                    <table class="table table-dashboard data-table text-white">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Designation</th>
                            <th>Email </th>
                            <th>person in charge </th>
                            <th>Meeting date</th>

                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Schedule as $key=>$value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->designation}}</td>
                                <td>{{$value->email_address}}</td>
                                <td>{{$value->person_incharge	}}</td>
                                <td>{{$value->meeting_date}}</td>

                                <td>

                                    <a href="{{route('i_schadule.edit',$value->id)}}"> <button class="btn btn-primary" data-toggle="modal" data-target="#add">Details</button></a>


                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
