@extends('layouts.default')

@section('title')
    Safety Policy
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
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

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">

        <div class="body d-flex py-3">
            <div class="container-xxl">

                <!-- Row end  -->

                <div class="row g-3 mb-xl-3">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8" style="margin: 0 auto">
                        <div
                            class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-1 row-cols-xxl-1 row-deck g-3">
                            <div class="card" style="
                  padding: 20px;
                  background: rgb(41, 128, 200);
                  color: #fff;
                  font-size: 20px;
                  font-weight: 800;
                  font-family: 'Times New Roman', Times, serif;
                ">
                                <p>
                                    OSHA's mission is to ensure that employees work in a safe
                                    and healthful environment by setting and enforcing
                                    standards, and by providing training, outreach, education
                                    and assistance. Employers must comply with all applicable
                                    OSHA standards
                                </p>
                            </div>
                            @if (isset($safetys->company_id))
                            @elseif (isset($updata->company_id))
                            @else
                                {{--                            <div class="alert alert-primary" role="alert">--}}
                                {{--                                <p style="font-size: 18px">Have you any existing safety policy, if you have uploaded it or if you have not, just--}}
                                {{--                                    generated it. its easy and just take a few clicks</p>--}}
                                {{--                              </div>--}}

                                <span class="text-center mt-2">
                                    <a href="{{ route('upload_policy.index') }}">
                                        <button class="btn btn-primary btn-lg">
                                            <i class="fas fa-file-upload"></i> Upload
                                        </button>
                                    </a>
                                    <a href="{{ route('safety.template') }}">
                                        <button class="ms-5 btn btn-primary btn-lg">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Generate
                                        </button>
                                    </a>
                                <span>
                            @endif
                                    @if (isset($safetys->company_id))
                                        <div class="col-md-6">
                                    <div class="card profile-card mt-5" style="box-shadow: 0px 0px 5px 2px #1f9163">
                                        <div
                                            class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                            <h6 class="mb-0 fw-bold"
                                                style="text-align: center !important; color: #315948">
                                                Next Rewiew Date Of Safety Ploicy
                                            </h6>
                                        </div>
                                        <div class="card-body d-flex profile-fulldeatil flex-column">
                                            <div class="profile-block text-center w220 mx-auto">
                                                <div
                                                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                                    <strong class="text-muted">
                                                        {{ $newDateTime->format('d:m:Y') }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="profile-info w-100">
                                                <h6 class="mb-0 mt-2 fw-bold d-block fs-6 text-center">
                                                    {{ $data->em_name }}
                                                </h6>
                                                <span
                                                    class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">Chairman,
                                                    Safety Committee</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @elseif (isset($updata->company_id))
                                        @php
                                            $created1 = new Carbon\Carbon($updata->created_at);
                                            $datetime1 = new DateTime($created1);
                                            $newDateTime1 = $created1->addYears(2);
                                        @endphp
                                        <div class="col">
                                    <div class="card profile-card mt-5" style="box-shadow: 0px 0px 5px 2px #1f9163">
                                        <div
                                            class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                            <h6 class="mb-0 fw-bold"
                                                style="text-align: center !important; color: #315948">
                                                Next Rewiew Date Of Safety Ploicy
                                            </h6>
                                        </div>
                                        <div class="card-body d-flex profile-fulldeatil flex-column">
                                            <div class="profile-block text-center w220 mx-auto">
                                                <div
                                                    class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                                    <strong class="text-muted">
                                                        {{ $newDateTime1->format('d:m:Y') }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="profile-info w-100">
                                                <h6 class="mb-0 mt-2 fw-bold d-block fs-6 text-center">
                                                    {{ $data->em_name }}
                                                </h6>
                                                <span
                                                    class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">Chairman,
                                                    Safety Committee</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>

                    </div>
                    @if (isset($safetys->company_id))
                        <div class="col-md-6 ">
                            <div class="card card-style p-xl-5 p-lg-4 p-0">
                                <div class="card-body">
                                    <div class="mb-3 pb-3 border-bottom text-center">
                                        <h3><b> SAFETY & HEALTH POLICY</b></h3>
                                    </div>
                                    <div>
                                        <h6>
                                            <strong>{{ $safetys->company->company_name }}</strong> is
                                            committed to continual improvement in health,
                                            safety and welfare of all its employees,
                                            customers, contractors and visitors and those
                                            under its influence in the neighborhood and
                                            community at large.
                                        </h6>
                                    </div>
                                    <div class="mid">
                                        <p>Our Commitment</p>
                                        <p> {!! $safetys->commitment !!} </p>

                                        <ul>
                                            <li>
                                                {{ $safetys->tagline }}
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h6> {{ $safetys->employee->em_name }}</h6>
                                    <p class="text-muted" style="margin: 0px">{{ $safetys->designation->ds_name }}
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p>{{ $safetys->company->company_name }}</p>
                                    {{-- @dd($safetys->employee->em_signature ); --}}
                                    {{-- <img src="{{ asset('uploads/emp_signature/'. $safetys->employee->em_signature )}}" alt="n" style="width: 100%; height:500px"> --}}


                                    <p style="margin: 0px">{{ $safetys->created_at->format('d:m:Y') }}
                                    </p>
                                    <img src="/uploads/emp_signature/{{ $safetys->employee->em_signature }}" alt="not"
                                         height="50px" width="50px">
                                </div>

                            </div>

                            <!-- Row end  -->

                            <!-- Row end  -->
                            <div>

                                <a href="{{ route('safety.download', $safetys->id) }}">
                                    <button type="button" class="btn btn-primary btn-lg my-1">
                                        <i class="fa fa-paper-plane-o"></i> Download
                                    </button>
                                </a>
                                {{-- <a href="{{ route('safety.modify',$safetys->id) }}">
                        <button type="button" class="btn btn-info btn-lg my-1">
                            <i class="fa fa-paper-plane-o"></i>Modify
                          </button>
                    </a> --}}
                                <a href="{{ route('safety.destroy', $safetys->id) }}">
                                    <button type="button" class="btn btn-danger btn-lg my-1">
                                        <i class="fa fa-paper-plane-o"></i>Delete </button>
                                </a>
                            </div>

                        </div>
                    @endif
                    @if (isset($updata->company_id))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-title">
                                        Safety Policy
                                    </div>
                                    <div class="card-body">
                                        {{-- {{$updata->policy_file}} --}}
                                        {{-- <embed src="{{ asset('policy/file/')}}.{{ $updata->policy_file}}" width="600" height="500" alt="pdf" /> --}}

                                        <iframe src="{{ URL::to('/') }}/policy/file/{{ $updata->policy_file }}"
                                                width="100%" height="600"></iframe>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('safety.updelete', $updata->id) }}">
                                            <button>Delete</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Row end  -->
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: "{{ route('safety.data-get') }}",
                success: function (data)
                {
                    if (data.rule.length !== 0)
                    {
                        console.log('Hello!')
                    }else{
                        swal({
                            title: 'Have you any existing safety policy, if you have uploaded it or if you have not, just generate it. its easy and just take a few clicks',
                            width: 700,
                            height: 200,
                            padding: 20,
                            background: '#fff'
                            // background: '#fff url(https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg)'
                        })
                    }
                }
            });
        });
    </script>
@endsection
