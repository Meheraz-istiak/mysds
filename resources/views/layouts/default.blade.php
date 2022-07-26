<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Mysds @yield('title')</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    @include('layouts.partials.favicon')


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    @include('layouts.partials.style')

</head>


<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">


    <div class="container-fluid" data-layout="container">
        @include('layouts.partials.side_bar')
        <div class="content">
            @include('layouts.partials.nav_bar')
            @if(!Route::is('home'))
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                    </ol>
                </nav>
            @endif
            @include('backend.partials.alert')
              @yield('content')
{{--            @include('layouts.partials.footer')--}}
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
            <div class="modal-dialog mt-6" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header px-5 text-white position-relative modal-shape-header">
                        <div class="position-relative z-index-1">
                            <div>
                                <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
{{--                                <p class="fs--1 mb-0">Please create your free Falcon account</p>--}}
                            </div>
                        </div>
                        <button class="close text-white position-absolute t-0 r-0 mt-1 mr-1" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body py-4 px-5">
                        <form>
                            <div class="form-group">
                                <label for="modal-auth-name">Name</label>
                                <input class="form-control" type="text" id="modal-auth-name" />
                            </div>
                            <div class="form-group">
                                <label for="modal-auth-email">Email address</label>
                                <input class="form-control" type="email" id="modal-auth-email" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="modal-auth-password">Password</label>
                                    <input class="form-control" type="password" id="modal-auth-password" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="modal-auth-confirm-password">Confirm Password</label>
                                    <input class="form-control" type="password" id="modal-auth-confirm-password" />
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="modal-auth-register-checkbox" />
                                <label class="custom-control-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Register</button>
                            </div>
                        </form>
                        <div class="w-100 position-relative mt-5">
                            <hr class="text-300" />
                            <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row no-gutters">
                                <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                                <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
@include('layouts.partials.scripts')

</body>

</html>
