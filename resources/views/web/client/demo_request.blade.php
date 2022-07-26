<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Tech & Safety</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="App and Saas Landing Template"/>
    <meta
            name="keywords"
            content="Application, Clean, Saas, Dashboard, Bootstrap4, Software Landing, HTML5 Template"
    />
    <meta content="sacredthemes" name="author"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="frontend/images/favicon.ico"/>
    <!-- WOW Animation -->
    <link href="frontend/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap css -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Slick Slider -->
    <link href="frontend/css/slick.css" rel="stylesheet" type="text/css"/>
    <!-- Icons -->
    <link
            href="frontend/css/materialdesignicons.min.css"
            rel="stylesheet"
            type="text/css"
    />
    <link href="frontend/css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="frontend/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Main css File -->
    <link href="frontend/css/style.css"
          rel="stylesheet"
          type="text/css"
          id="theme-default"
    />
    <link href="frontend/css/rtl-style.css"
          rel="stylesheet"
          type="text/css"
          id="rtl-theme-default"
          disabled="disabled"
    />
    <link href="frontend/css/colors/default-color.css"
          rel="stylesheet"
          type="text/css"
          id="theme-color"
    />
</head>
<body>
<!-- box-wrapper -->
<div class="box-wrapper">
    <div id="main-wrapper" class="page-wrapper">
        <div class="dc-signin theme-two">
            <div class="signin-wrapper">
                <div class="intro-box">
                    <div class="intro-content style-dark">
                        <img src="frontend/images/logo.png" class="logo" alt="DCode"/>
                        <div class="heading-wrapper">
                            <h2 class="h1">Welcome to <span>Tech & Safety</span></h2>
                        </div>
                        <div class="text-wrapper">
                            <p>Already Have an account</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-primary btn-light" href="{{url('login')}}">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="form-box">
                    <form action="{{route('schedule-demo-request.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">

                                <x-action.input-field type="text"
                                                      field="company_name"
                                                      placeholder="Enter Company Name"
                                                      required="true"/>

                                <x-action.validation-error-message field="company_name"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select id="industry_type_id" name="industry_type_id" class="form-control">
                                    <option value="">Select Inudstry Type</option>
                                    @foreach($industryTypes as $industryType)
                                        <option value="{{$industryType->id}}">{{$industryType->name}}</option>
                                    @endforeach
                                </select>

                                <x-action.validation-error-message field="industry_type_id"/>
                            </div>


                            <div class="form-group col-md-12">
                                <x-action.input-field type="email"
                                                      field="email_address"
                                                      placeholder="Enter Email Address"
                                                      required="true"/>

                                <x-action.validation-error-message field="email_address"/>
                            </div>


                            <div class="form-group col-md-6">
                                <x-action.input-field type="number"
                                                      field="contact_no"
                                                      placeholder="Enter Contact No"
                                                      required="true"/>

                                <x-action.validation-error-message field="contact_no"/>
                            </div>
                            <div class="form-group col-md-6">
                                <select id="industry_type_id" name="number_of_employees" class="form-control">
                                    <option value="">Select Employee Size</option>
                                    @foreach($employee_size as $index => $employee)
                                        <option value="{{$index}}">{{$employee}}</option>
                                    @endforeach
                                </select>

                                <x-action.validation-error-message field="number_of_employees"/>
                            </div>


                            <div class="form-group col-md-6">
                                <x-action.input-field type="text"
                                                      field="person_incharge"
                                                      placeholder="Enter Incharge Name"
                                                      required="true"/>

                                <x-action.validation-error-message field="person_incharge"/>
                            </div>
                            <div class="form-group col-md-6">
                                <x-action.input-field type="text"
                                                      field="designation"
                                                      placeholder="Enter Designation"
                                                      required="true"/>

                                <x-action.validation-error-message field="designation"/>
                            </div>


                            <div class="form-group col-md-6">
                                <x-action.input-field type="date"
                                                      field="meeting_date"
                                                      placeholder="Enter Meeting Date"
                                                      title="Meeting Date"
                                                      required="true"/>

                                <x-action.validation-error-message field="meeting_date"/>
                            </div>
                            <div class="form-group col-md-6">
                                <x-action.input-field type="time"
                                                      field="meeting_time"
                                                      placeholder="Enter Meeting Time"
                                                      title="Meeting Time"
                                                      required="true"/>

                                <x-action.validation-error-message field="meeting_time"/>
                            </div>

                        </div>
                        <div class="form-group text-center">
                            <label
                            ><input type="checkbox" required="required" id="policyAnsTerm"/> I accept the
                                policy and terms</label
                            >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-full">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page Header -->
    </div>
    <!-- Main Wrapper -->
</div>
<!-- box-wrapper -->
<!-- javascript -->
<script src="frontend/js/jquery.min.js"></script>
<script src="frontend/js/jquery-migrate.min.js"></script>
<script src="frontend/js/bootstrap.bundle.min.js"></script>
<script src="frontend/js/jquery.easing.min.js"></script>
<script src="frontend/js/scrollspy.min.js"></script>
<script src="frontend/js/appear.js"></script>
<!-- WOW Animation -->
<script src="frontend/js/wow.min.js"></script>
<!-- Slick Slider -->
<script src="frontend/js/slick.min.js"></script>
<!-- Main Js -->
<script src="frontend/js/dcode.js"></script>

<script></script>
</body>

<!-- Mirrored from dcode.sacredthemes.net/layouts/page-signin-two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jan 2022 19:23:05 GMT -->
</html>
