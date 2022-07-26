@extends('layouts.default')

@section('title')
    Safety Policy Template
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"/>
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
        .card-style {
            box-shadow: 0px 0px 5px 0px #ccc;
            background-image: url('assets/images/bg-2.png');
            background-size: 100% 100%;
        }

    </style>
    <!-- Body: Body -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        </div>

        <div class="card-body">

            <div class="row ">
                <div class="col-md-6 ">
                    <div class="card card-style p-xl-5 p-lg-4 p-0 mb-4">
                        <div class="card-body">
                            <div class="mb-3 pb-3 border-bottom text-center">
                                <h3><b> SAFETY & HEALTH POLICY</b></h3>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div>
                                        <h6>
                                            <strong>GCH RETAIL (M) SDN BHD</strong> is
                                            committed to continual improvement in health,
                                            safety and welfare of all its employees,
                                            customers, contractors and visitors and those
                                            under its influence in the neighborhood and
                                            community at large.
                                        </h6>
                                    </div>
                                    <div class="mid">
                                        <p>
                                            In fulfilling this commitment, we as far as
                                            reasonably practicable, ensure;
                                        </p>
                                        <ul>
                                            <li>
                                                A safe and healthy working environment to
                                                prevent injuries, disabilities, ill health and
                                                diseases.
                                            </li>
                                            <li>
                                                Employee awareness by providing information,
                                                instruction, training, supervision, and
                                                adequate personal protective equipment.
                                            </li>
                                            <li>
                                                Strong rapport with authorities and the local
                                                community in promoting safety and health.
                                            </li>
                                            <li>
                                                All applicable safety and health legislative
                                                requirements, regulations, and code of
                                                practice are complied.
                                            </li>
                                            <li>
                                                Continuous improvement for the safety of our
                                                work environment by investing in our people
                                                and our facilities.
                                            </li>
                                            <li>
                                                A safety culture to achieve an accident-free
                                                work environment.
                                            </li>
                                        </ul>

                                        <p style="text-align: center">Tag Line Here</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Miss Vimala</h6>
                                    <p class="text-muted">Chief Executive Officer</p>
                                </div>
                            </div>
                            <!-- Row end  -->
                        </div>
                        <div class="card-footer">
                            <a class="d-flex justify-content-end text-decoration-none" href="{{ route('safety.policy-index') }}">
                                <button type="button" class="btn btn-primary btn-lg my-1">
                                    <i class="fas fa-paper-plane"></i> Use This Template
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="card card-style p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <div class="mb-3 pb-3 border-bottom text-center">
                                <h3><b> SAFETY & HEALTH POLICY</b></h3>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div>
                                        <h6>
                                            <strong>GCH RETAIL (M) SDN BHD</strong> is
                                            committed to continual improvement in health,
                                            safety and welfare of all its employees,
                                            customers, contractors and visitors and those
                                            under its influence in the neighborhood and
                                            community at large.
                                        </h6>
                                    </div>
                                    <div class="mid">
                                        <p>
                                            In fulfilling this commitment, we as far as
                                            reasonably practicable, ensure;
                                        </p>
                                        <ul>
                                            <li>
                                                A safe and healthy working environment to
                                                prevent injuries, disabilities, ill health and
                                                diseases.
                                            </li>
                                            <li>
                                                Employee awareness by providing information,
                                                instruction, training, supervision, and
                                                adequate personal protective equipment.
                                            </li>
                                            <li>
                                                Strong rapport with authorities and the local
                                                community in promoting safety and health.
                                            </li>
                                            <li>
                                                All applicable safety and health legislative
                                                requirements, regulations, and code of
                                                practice are complied.
                                            </li>
                                            <li>
                                                Continuous improvement for the safety of our
                                                work environment by investing in our people
                                                and our facilities.
                                            </li>
                                            <li>
                                                A safety culture to achieve an accident-free
                                                work environment.
                                            </li>
                                        </ul>

                                        <p style="text-align: center">Tag Line Here</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Miss Vimala</h6>
                                    <p class="text-muted">Chief Executive Officer</p>
                                </div>
                            </div>
                            <!-- Row end  -->
                        </div>
                        <div class="card-footer">
                            <a class="d-flex justify-content-end use" href="{{ route('safety.policy-index') }}">
                                <button type="button" class="btn btn-primary btn-lg my-1">
                                    <i class="fas fa-paper-plane"></i> Use This Template
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card card-style p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <div class="mb-3 pb-3 border-bottom text-center">
                                <h3><b> SAFETY & HEALTH POLICY</b></h3>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div>
                                        <h6>
                                            <strong>GCH RETAIL (M) SDN BHD</strong> is
                                            committed to continual improvement in health,
                                            safety and welfare of all its employees,
                                            customers, contractors and visitors and those
                                            under its influence in the neighborhood and
                                            community at large.
                                        </h6>
                                    </div>
                                    <div class="mid">
                                        <p>
                                            In fulfilling this commitment, we as far as
                                            reasonably practicable, ensure;
                                        </p>
                                        <ul>
                                            <li>
                                                A safe and healthy working environment to
                                                prevent injuries, disabilities, ill health and
                                                diseases.
                                            </li>
                                            <li>
                                                Employee awareness by providing information,
                                                instruction, training, supervision, and
                                                adequate personal protective equipment.
                                            </li>
                                            <li>
                                                Strong rapport with authorities and the local
                                                community in promoting safety and health.
                                            </li>
                                            <li>
                                                All applicable safety and health legislative
                                                requirements, regulations, and code of
                                                practice are complied.
                                            </li>
                                            <li>
                                                Continuous improvement for the safety of our
                                                work environment by investing in our people
                                                and our facilities.
                                            </li>
                                            <li>
                                                A safety culture to achieve an accident-free
                                                work environment.
                                            </li>
                                        </ul>

                                        <p style="text-align: center">Tag Line Here</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Miss Vimala</h6>
                                    <p class="text-muted">Chief Executive Officer</p>
                                </div>
                            </div>
                            <!-- Row end  -->
                        </div>
                    </div>
                    <div class="col-lg-12 text-end">

                        <a href="{{ route('safety.policy-index') }}">
                            <button type="button" class="btn btn-primary btn-lg my-1">
                                <i class="fas fa-paper-plane"></i> Use This Template
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card card-style p-xl-5 p-lg-4 p-0">
                        <div class="card-body">
                            <div class="mb-3 pb-3 border-bottom text-center">
                                <h3><b> SAFETY & HEALTH POLICY</b></h3>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div>
                                        <h6>
                                            <strong>GCH RETAIL (M) SDN BHD</strong> is
                                            committed to continual improvement in health,
                                            safety and welfare of all its employees,
                                            customers, contractors and visitors and those
                                            under its influence in the neighborhood and
                                            community at large.
                                        </h6>
                                    </div>
                                    <div class="mid">
                                        <p>
                                            In fulfilling this commitment, we as far as
                                            reasonably practicable, ensure;
                                        </p>
                                        <ul>
                                            <li>
                                                A safe and healthy working environment to
                                                prevent injuries, disabilities, ill health and
                                                diseases.
                                            </li>
                                            <li>
                                                Employee awareness by providing information,
                                                instruction, training, supervision, and
                                                adequate personal protective equipment.
                                            </li>
                                            <li>
                                                Strong rapport with authorities and the local
                                                community in promoting safety and health.
                                            </li>
                                            <li>
                                                All applicable safety and health legislative
                                                requirements, regulations, and code of
                                                practice are complied.
                                            </li>
                                            <li>
                                                Continuous improvement for the safety of our
                                                work environment by investing in our people
                                                and our facilities.
                                            </li>
                                            <li>
                                                A safety culture to achieve an accident-free
                                                work environment.
                                            </li>
                                        </ul>

                                        <p style="text-align: center">Tag Line Here</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Miss Vimala</h6>
                                    <p class="text-muted">Chief Executive Officer</p>
                                </div>
                            </div>
                            <!-- Row end  -->
                        </div>
                    </div>
                    <div class="col-lg-12 text-end">
                        <a class="text-decoration-none" href="{{ route('safety.policy-index') }}">
                            <button type="button" class="btn btn-primary btn-lg my-1">
                                <i class="fas fa-paper-plane"></i> Use This Template
                            </button>
                        </a>
                    </div>
                </div>
                <!-- Row end  -->
            </div>

        </div>
    </div>
@endsection
