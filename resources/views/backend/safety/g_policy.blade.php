@extends('layouts.default')

@section('title')
    Safety Ploicy Template
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet"/>
    <style>
        .inpcol{
            outline: 1px solid #5b998d;
        }
        .span{
            content: '*';
            color: red;
        }
        .toast-top-center {
            top: 2rem;
            left: 0%;
            margin: 0 0 0 0;
        }
        .card-style{
            box-shadow: 0px 0px 5px 0px #ccc;
            background-image: url('assets/images/bg-2.png');
            background-size: 100% 100%;
        }
        /* .select-editable select:focus, .select-editable input:focus {outline:none;} */
    </style>
    <!-- Body: Body -->
@endsection
@section('content')

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <!-- Row end  -->

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-12">
                                <div
                                    class="card card-style p-xl-5 p-lg-4 p-0">
                                    <div class="card-body">
                                        <div class="mb-3 pb-3 border-bottom text-center">
                                            <h3><b> SAFETY & HEALTH POLICY</b></h3>
                                        </div>

                                        @if ( Session::has('success') )
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <strong style="text-align: center;font-size:20px">{{ Session::get('success') }}</strong>
                                            </div>
                                        @endif

                                        <form action="{{ route('safety.store') }}"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <ul class="bg bg-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>

                                            {{-- <div class="form-group">
                                              <label >Title</label>
                                              <textarea name="title" id="" cols="65" rows="">{{ old('title') }}</textarea>
                                            </div> --}}

                                            <div class="form-group">
                                                <label >Commitment</label>
                                                <textarea id="summernote" class="form-control" name="commitment" value="{{ old('commitment') }}"></textarea>
                                            </div>

                                            <div class="form-group" >
                                                <label for="">Tagline</label>
                                                <select onchange="this.nextElementSibling.value=this.value"  name="tagline" class="select2 form-control">
                                                    <option value="">Select The Tagline</option>
                                                    <option value="Zero injuries does not indicate the presence of safety.">
                                                        Zero injuries does not indicate the presence of safety.
                                                    </option>
                                                    <option value="Zero injuries does not indicate the presence of safety.">
                                                        Zero injuries does not indicate the presence of safety.
                                                    </option>
                                                    <option value="Never take safety for granted.">
                                                        Never take safety for granted.
                                                    </option>
                                                    <option value="Safety first, to last in life.">
                                                        Safety first, to last in life.
                                                    </option>
                                                    <option value="SAFETY AND HEALTH IS EVERYONE'S BUSINESS">SAFETY AND HEALTH IS EVERYONE'S BUSINESS</option>
                                                </select>
{{--                                                <input type="text" name="tagline" value="" class="form-control">--}}
                                            </div>



                                            <div class="form-group">
                                                <label >Company Name</label>
                                                <input name="company_name" id="" class="form-control" value="{{ $companies->company_name }}" readonly>


                                            </div>
                                            <input type="hidden" name="company_id" id="" class="form-control" value="{{ $companies->id }}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h6>Employee</h6>
                                                    <select name="employee_id" id="employee_id" class="form-control mb-2" >
                                                        <option value="">--Select--</option>
                                                        @foreach ($employees as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->em_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Designation</h6>
                                                    <input name="designation" id="designation" class="form-control" readonly>

                                                </div>

                                                <input type="hidden"  name="designation_id" id="designation_id" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </form>
                                    </div>
                                    <script>
                                        $('#flash-overlay-modal').modal();
                                    </script>
                                    <script>
                                        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
                                    </script>
                                </div>
                                <!-- Row end  -->

                                <!-- Row end  -->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Row end  -->
            </div>
        </div>

        <!-- Row end  -->
    </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

    <!-- Jquery Page Js -->
    <script src="{{asset('../js/template.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $("#employee_id").on("change", function () {
                let emp_id = $("#employee_id").val();
                $.ajax({
                    type: 'get',
                    url: "getdesignation"+'/'+emp_id,
                    success: function (data)
                    {
                        $('#designation').val(data.ds_name);
                        $('#designation_id').val(data.id);
                    }
                });
            });
        });
    </script>
@endsection
