@extends('layouts.default')

@section('title')
    Company Profile
@endsection

@section('css')

@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Company Profile</h5>
            {{--            <button type="button" class="btn btn-falcon-default rounded-capsule btn-sm" data-toggle="modal" data-target="#profileModal"> <i class="fas fa-plus"></i> Create</button>--}}
        </div>
        <div class="body d-flex py-3">
            <div class="container-xxl">

                <div class="row g-3">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="card profile-card flex-column mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Profile</h6>
                            </div>
                            <div class="card-body d-flex profile-fulldeatil flex-column">
                                <div class="profile-block text-center w220 mx-auto">
                                    <a href="#">
                                        <img
                                            src="assets/img/team/16.jpg"
                                            alt=""
                                            class="avatar xl rounded img-thumbnail shadow-sm"
                                        />
                                    </a>
                                    <button
                                        class="btn btn-primary"
                                        style="position: absolute; top: 15px; right: 15px"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editprofile"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <div
                                        class="about-info d-flex align-items-center mt-3 justify-content-center flex-column"
                                    >
                                        <span class="text-muted small">USER ID : PXL-0001</span>
                                    </div>
                                </div>
                                <div class="profile-info w-100">
                                    <h6 class="mb-0 mt-2 fw-bold d-block fs-2 text-center">
                                        Company Name
                                    </h6>
                                    <span
                                        class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block"
                                    >Industry Type</span
                                    >
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-mobile"></i>
                                                <span class="ms-2">&nbsp;&nbsp;&nbsp;202-555-0174 </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-envelope"></i>
                                                <span class="ms-2">&nbsp;&nbsp;adrianallan@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-birthday-cake"></i>
                                                <span class="ms-2">&nbsp;&nbsp;19/03/1980</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-address-book"></i>
                                                <span class="ms-2">2734 West Fork Street,EASTON 02334.</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Payment Method</h6>
                            </div>
                            <div class="card-body">
                                <div class="payment-info">
                                    <h5 class="payment-name text-muted">
                                        <i class="icofont-visa-alt fs-3"></i> Visa *******7548
                                    </h5>
                                    <span>Next billing charged $48</span>
                                    <br />
                                    <em class="text-muted">Autopay on July 20, 2021</em>
                                    <a
                                        href="javascript:void(0);"
                                        class="edit-payment-info text-secondary"
                                    >Edit Payment Info</a
                                    >
                                </div>
                                <p class="mt-3">
                                    <a href="javascript:void(0);" class="btn btn-primary">
                                        Add Payment Info</a
                                    >
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5>Notification preferences</h5>
                                <span class="text-muted"
                                >Control all our newsletter and email related
                      notifications to your email</span
                                >
                                <div class="mt-4">
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Newsletter"
                                        />
                                        <label class="form-check-label" for="np-Newsletter"
                                        >Activity Notifications</label
                                        >
                                    </div>
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Notifications"
                                        />
                                        <label class="form-check-label" for="np-Notifications"
                                        >Comment Notifications</label
                                        >
                                    </div>
                                    <div class="form-check form-switch mt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="np-Preferences"
                                            checked=""
                                        />
                                        <label class="form-check-label" for="np-Preferences"
                                        >Email Preferences</label
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Profile Settings</h6>
                            </div>
                            <div class="card-body">
                                <form class="row g-4" method="post" action="{{ route('com_profile.store') }}">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="user_name" class="form-label">User Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus placeholder="User Name">
                                            @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="company_name" class="form-label">Company Name<span class="text-danger">*</span></label>
                                            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus placeholder="Company Name">
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="contact_person" class="form-label">Contact Person
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" required autocomplete="contact_person" autofocus placeholder="Contact Person">
                                            @error('contact_person')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="mobile_number" class="form-label">Mobile Number

                                                <span class="text-danger">*</span></label>
                                            <input id="mobile_number"
                                                   type="text"
                                                   oninput="javascript: if (this.value.length > this.maxLength)
                                                       this.value = this.value.slice(0, this.maxLength);"
                                                   maxlength="11"
                                                   class="form-control @error('mobile_number') is-invalid @enderror"
                                                   name="mobile_number" value="{{ old('mobile_number') }}" required
                                                   autocomplete="mobile_number" autofocus placeholder="Mobile Number">
                                            @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Address
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea
                                                id="address"
                                                class="form-control @error('address')
                                                    is-invalid @enderror" name="address" required
                                                autocomplete="address" autofocus placeholder="Address"
                                                aria-label="With textarea"
                                            >{{ old('address') }}</textarea>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label">Website Url
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">http://</span>
                                            <input id="web_url" type="text" class="form-control @error('web_url') is-invalid @enderror" name="web_url" value="{{ old('web_url') }}" required autocomplete="web_url" autofocus placeholder="Website Url">
                                            @error('web_url')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Country
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="country" id="country">
                                                <option value="">-- Select Country --</option>
                                                @foreach($country as $list)
                                                    <option value="{{$list->id}}">{{$list->country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">State/Province
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="state" id="state">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="city" class="form-label">City
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="City Name">
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="postal_code" class="form-label">Postal Code
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus placeholder="Postal Code">
                                            @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary text-uppercase px-5">
                                            SAVE
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card auth-detailblock">
                            <div
                                class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0"
                            >
                                <h6 class="mb-0 fw-bold">Authentication Details</h6>
                                <button
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#authchange"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >User Name :</label
                                        >
                                        <span><strong>Adrian007</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Login Password :</label
                                        >
                                        <span><strong>Abc*******</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Last Login:</label
                                        >
                                        <span><strong>128.456.89 (Apple) safari</strong></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label col-6 col-sm-5"
                                        >Last Password change:</label
                                        >
                                        <span><strong>3 Month Ago</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    {{ __('You are logged in!') }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <!-- Edit profile-->
        <div
            class="modal fade"
            id="editprofile"
            tabindex="-1"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable"
            >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="expeditLabel1111">
                            Edit Profile
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="deadline-form">
                            <form>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label for="item100" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="item100"
                                            value="Adrian Allan"
                                        />
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="taxtno200" class="form-label"
                                        >Profile</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            id="taxtno200"
                                        />
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" rows="3">
Duis felis ligula, pharetra at nisl sit amet, ullamcorper fringilla mi. Cras luctus metus non enim porttitor sagittis. Sed tristique scelerisque arcu id dignissim. Aenean sed erat ut est commodo tristique ac a metus. Praesent efficitur congue orci. Fusce in mi condimentum mauris maximus sodales. Quisque dictum est augue, vitae cursus quam finibus in. Nulla at tempus enim. Fusce sed mi et nibh laoreet consectetur nec vitae lacus.</textarea
                                        >
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label">Country</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            value="California"
                                        />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="abc1" class="form-label"
                                        >Birthday date</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control w-100"
                                            id="abc1"
                                            value="1980-03-19"
                                        />
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-6">
                                        <label for="mailid" class="form-label">Mail</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="mailid"
                                            value="adrianallan@gmail.com"
                                        />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phoneid" class="form-label">Phone</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phoneid"
                                            value="202-555-0174"
                                        />
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="3">
2734 West Fork Street,EASTON 02334.</textarea
                                        >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Done
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
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
                    url: "{{ route('designation.datatable') }}",
                    type: 'GET',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                "columns": [
                    {"data": 'DT_RowIndex', "name": 'DT_RowIndex'},
                    {"data": "ds_name"},
                    {"data": "ds_rank"},
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
