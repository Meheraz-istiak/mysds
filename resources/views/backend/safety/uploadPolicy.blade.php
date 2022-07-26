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
                            <h3 class="fw-bold py-3 mb-0">Upload Policy</h3>
                        </div>
                    </div>
                </div>
                <!-- Row end  -->
                <div class="row clearfix g-3">
                    <div class="col-lg-4">
                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Upload Policy</h6>
                            </div>

                            <div class="card-body">
                                <form name="supplierForm" id="policyUploadrForm" method="post"
                                      enctype="multipart/form-data"
                                      @if(isset($data->id))
                                      action="{{ route('upload_policy.update', ['id' => $data->id]) }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    @else
                                        action="{{ route('upload_policy.store')}}">
                                    @endif

                                    @csrf
                                    <div class="row g-3 mb-3">

                                        <div class="col-sm-12">
                                        <label >Company Name</label>
                                            <input name="company_name" id="" class="form-control" value="{{ $companies->company_name }}" readonly>


                                            </div>
                                            <input type="hidden" name="company_id" id="" class="form-control" value="{{ $companies->id }}">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="depone" class="form-label">Policy</label>
                                            <input type="file"
                                                   class="form-control"
                                                   id="policy_file"
                                                   name="policyFile"
                                                   accept="application/pdf">
                                        </div>


                                        <div>
                                            {{isset($data->policy_file)?$data->policy_file :''}}</div>
                                        </div>

                                    @if(isset($data->id))
                                        <button type="submit" class="btn btn-primary">
                                            Update Policy
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            Add Policy
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table
                                    id="myProjectTable"
                                    class="table table-hover datatable align-middle mb-0"
                                    style="width: 100%"
                                >
                                    <thead>
                                    <tr>
                                        <th>Sl.</th>

                                        <th>policy File</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- Row End -->
            </div>
        </div>


        @endsection
        @section('script')
            <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>

            <!-- Plugin Js-->
            <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>

            <!-- Jquery Page Js -->
            <script src="{{asset('../js/template.js')}}"></script>
            <script>

                // project data table
                $(document).ready(function () {
                    setTimeout(function () {
                        $('.message').fadeOut('fast');
                    }, 500);
                    $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('upload_policy.datatable') }}",
                            type: 'GET',
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        "columns": [
                            {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},

                            {"data": "view"},
                            // {"data": "status"},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ],
                        language: {
                            paginate: {
                                next: '<i class="bx bx-chevron-right">',
                                previous: '<i class="bx bx-chevron-left">'
                            }
                        }
                    });
                });
            </script>

@endsection
