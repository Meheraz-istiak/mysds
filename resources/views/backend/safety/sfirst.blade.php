@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        .inpcol {
            outline: 1px solid #5b998d;
        }
        .span {
            content: '*';
            color: red;
        }
        .toast-top-center {
            top: 2rem;
            left: 0%;
            margin: 0 0 0 0;
        }
    </style>
    <!-- Body: Body -->
@endsection

@section('content')
    <!-- sidebar -->
    @include('dashboards.users.partial.sidebar')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Header -->
        @include('dashboards.users.partial.header')

        @if ($message = Session::get('success'))
            <div class="alert alert-success message">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="bg bg-primary p-2" style="color:white;text-align:center">
                    <h4> Select Your Company Name for Generate/Show</h4>
                </div>
                <div>
                    <h3 class="bg bg-success p-2" style="color:white;text-align:center">Select Your Company</h3>
                    <form action="{{ route('safety.index') }}" >
                     <div>
                        <select name="company_name" id="" class="form-control">
                            @foreach ($companies as  $company)
                            <option value="{{   $company->company_name }}">{{  $company->company_name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="submit">
                     </div>
                    </form>
                  </div>
            </div>
            <div class="col-md-2"></div>
        </div>

  @endsection




