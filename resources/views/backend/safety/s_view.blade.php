@extends('layouts.app')
@section('style')
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

        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
              <div class="row align-items-center">
                <div class="border-0 mb-4">
                  <div
                    class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap"
                  >
                    <h3 class="fw-bold mb-0 py-3 pb-2">Safety Ploicy Template</h3>
                  </div>
                </div>
              </div>
              <!-- Row end  -->

              <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                  <div class="row justify-content-center"   >
                   @if (isset($data->id))
                  <div class="container">
                      <div class="row">
                          <div class="col-md-8" >
                              <form action="{{ route('safety.update', ['id' => $data->id]) }}"   enctype="multipart/form-data" method="POST">

                                  @csrf
                                  <input name="_method" type="hidden" value="PUT">

                                  <div class="form-group">
                                      <label >Title</label>
                                      <textarea name="title" id="" cols="115" >{{ old('title',isset($data->title)?$data->title:'') }}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label >Commitment</label>
                                      <textarea id="summernote" name="commitment" >{{ old('commitment',isset($data->commitment) ? $data->commitment:'') }}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label >Tagline</label>
                                      <select
                                          name="tagline"
                                          id="depertment"
                                          class="col-md-12"
                                          style=" padding: 10px; border-radius: 3px; border-color: var(--border-color);">
                                            <option >Select Tagline</option>
                                      <option value="SAFETY AND HEALTH IS EVERYONE'S BUSINESS">
                                          SAFETY AND HEALTH IS EVERYONE'S BUSINESS
                                      </option>
                                      <option value="Zero injuries does not indicate the presence
                                                of safety.">
                                          Zero injuries does not indicate the presence
                                          of safety.
                                      </option>
                                      <option value="Never take safety for granted.">
                                          Never take safety for granted.
                                      </option>
                                      <option value="Safety first, to last in life.">
                                          Safety first, to last in life.
                                      </option>
                                      </select>
                                  </div>

                                  <button type="submit" class="btn btn-primary">Click For Modify</button>
                              </form>
                          </div>
                      </div>
                  </div>
                       @else
                       @foreach ($safetys as  $safety)
                    <div class="col-lg-6 col-md-12"
                  ">
                      <div
                        class="card p-xl-5 p-lg-4 p-0"

                      >
                        <div class="card-body" >
                          <div class="mb-3 pb-3 border-bottom text-center" >
                            <h3><b> SAFETY & HEALTH POLICY</b></h3>
                          </div>

                          <div class="row mb-4">

                            <div class="col-sm-12">

                              <div>
                                <h6>
                                 {{ $safety->title}}

                                </h6>
                              </div>
                              <div class="mid">
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
                                    <p> {!!$safety->commitment!!} </p>
                                <ul>
                                  <li>
                                    {{ $safety->tagline}}
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>

                          <!-- Row end  -->
                          <div class="row">
                            <div class="col-lg-6">
                              <h6> {{ $safety->employee->em_name}}</h6>
                              <p class="text-muted">{{  $safety->designation->ds_name }}</p>
                            </div>
                            <div class="col-lg-6">
                              <p>{{ $safety->company->company_name }}</p>
                              <p>{{ $safety->created_at->format('Y:M:D') }}</p>
                            </div>
                          </div>
                          <!-- Row end  -->
                        </div>
                      </div>
                      <div class="col-lg-12 text-end mt-2">
                        <a href="{{route('upload_policy.index')}}"> <button
                                type="button"
                                class="btn btn-dark btn-lg my-1" >
                                <i class="fa fa-print"></i> Upload
                            </button></a>
                        <a href="{{ route('safety.download',$safety->id) }}">
                            <button type="button" class="btn btn-primary btn-lg my-1">
                                <i class="fa fa-paper-plane-o"></i> Download
                              </button>
                        </a>
                        <a href="{{ route('safety.modify',$safety->id) }}">
                            <button type="button" class="btn btn-info btn-lg my-1">
                                <i class="fa fa-paper-plane-o"></i>Modify
                              </button>
                        </a>
                        <a href="{{ route('safety.destroy',$safety->id) }}">
                            <button type="button" class="btn btn-danger btn-lg my-1">
                              <i class="fa fa-paper-plane-o"></i>Delete </button>
                        </a>
                      </div>

                    </div>
                    @endforeach
                   @endif
                  </div>
                  <!-- Row end  -->
                </div>
              </div>
              <!-- Row end  -->
            </div>
          </div>
        @endsection
@section('script')
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote();
                });</script>

@endsection
