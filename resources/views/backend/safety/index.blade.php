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

        <div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                        >
                            <h3 class="fw-bold mb-0">Safety Policy</h3>
                        </div>
                    </div>
                </div>

                <!-- Row end  -->

                <div class="row g-3 mb-xl-3">
                    <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8"
                        style="margin: 0 auto"
                    >
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 row-deck g-3"
                        >
                            <div
                                class="card"
                                style="
              padding: 20px;
              background: rgb(41, 128, 200);
              color: #fff;
              font-size: 20px;
              font-weight: 800;
              font-family: 'Times New Roman', Times, serif;
            "
                            >
                                <p>
                                    OSHA's mission is to ensure that employees work in a safe
                                    and healthful environment by setting and enforcing
                                    standards, and by providing training, outreach, education
                                    and assistance. Employers must comply with all applicable
                                    OSHA standards
                                </p>
                            </div>
                            <div class="col">
                                <div
                                    class="card profile-card mt-5"
                                    style="box-shadow: 0px 0px 5px 2px #1f9163"
                                >
                                    <div
                                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                                    >
                                        <h6
                                            class="mb-0 fw-bold"
                                            style="text-align: center !important; color: #315948"
                                        >
                                            Next Rewiew Date Of Safety Ploicy
                                        </h6>
                                    </div>
                                    <div
                                        class="card-body d-flex profile-fulldeatil flex-column"
                                    >
                                        <div class="profile-block text-center w220 mx-auto">
                                            <div
                                                class="about-info d-flex align-items-center mt-3 justify-content-center flex-column"
                                            >
                                                <strong class="text-muted">12-12-2022</strong>
                                            </div>
                                        </div>
                                        <div class="profile-info w-100">
                                            <h6
                                                class="mb-0 mt-2 fw-bold d-block fs-6 text-center"
                                            >
                                                Joan Dyer
                                            </h6>
                                            <span
                                                class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"
                                            >Chairman, Safety Committee</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="row g-3 mb-xl-3 mt-3">
                        <div
                            class="col-xxl-10 col-xl-10 col-lg-12 col-md-12"
                            style="margin: 0 auto"
                        >
                            <div
                                class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck g-3"
                            >


                                <div class="col-mt-5">
                                    <div
                                        class="card"
                                        style="box-shadow: 0px 0px 5px 2px #1f9163"
                                    >
                                        <div class="card-body">

                                            <div class="justify-content-start text-center">
                                                <h2
                                                    style="
                text-align: center !important;
                color: #315948;
              "
                                                >
                                                    Already Have Exesting Safety Policy view and Download
                                                </h2>
                                                <br />
                                                <a href="{{ route('safety.policy-view') }}">
                                                    <button type="button" class="btn btn-primary">
                                                        Download
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col mt-5">

                                    <div
                                        class="card"
                                        style="box-shadow: 0px 0px 5px 2px #1f9163"
                                    >
                                        <div class="card-body">

                                            <div class="justify-content-start text-center">
                                                <h2
                                                    style="
                text-align: center !important;
                color: #315948;
              "
                                                >
                                                    Don't Have any Safety Policy, Its Easy to Generate
                                                </h2>
                                                <br />
                                                <a href="{{ route('safety.template') }}"><button type="button" class="btn btn-success">
                                                        Generate Now
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
