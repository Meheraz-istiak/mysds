<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Title -->
    <title>SDS SEARCH</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front/img/core-img/favicon.ico') }}"/>

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}"/>

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset("front/css/responsive.css" )}}"/>

    <style type="text/css">
        .w-5{
            width: .80rem;
        }
        .flex.justify-between.flex-1.sm\:hidden {
            display: none;
        }

    </style>
</head>

<body class="light-version">
<!-- Preloader -->
<!-- <div id="preloader">
    <div class="preload-content">
        <div id="dream-load"></div>
    </div>
</div> -->

<!-- ##### Header Area Start ##### -->
<header class="header-area fadeInDown" data-wow-delay="0.2s">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="dreamNav">
                <!-- Logo -->
                <a class="nav-brand" href="#"
                ><img src="{{asset('front/img/core-img/logo.png')}}" alt="logo"/> MYSDS ONLINE
                </a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
              <span class="navbarToggler"
              ><span></span><span></span><span></span
                  ></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap">
                            <span class="top"></span><span class="bottom"></span>
                        </div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li>
                                <a href="{{route('index')}}">Home</a>
                                <!-- <ul class="dropdown">
                                                    <li><a href="index-demo-1.html" class="w-text">Home style 1</a></li>
                                                    <li><a href="index-demo-2.html" class="w-text">Home style 2</a></li>
                                                    <li><a href="index-demo-3.html" class="w-text">Home style 3</a></li>
                                                </ul> -->
                            </li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li>
                                <a href="#blog">Blog</a>
                                <!-- <ul class="dropdown">
                                  <li>
                                    <a href="index-blog.html" class="w-text">Blog Posts</a>
                                  </li>
                                  <li>
                                    <a href="index-blog-with-sidebar.html" class="w-text"
                                      >Sidebar Blog
                                    </a>
                                  </li>
                                  <li>
                                    <a href="index-single-blog.html" class="w-text"
                                      >Blog Details</a
                                    >
                                  </li>
                                </ul> -->
                            </li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>

                        <!-- Button -->
                        <a href="{{route('sdsSearch')}}" class="btn login-btn ml-50">
                            <i class="fa fa-search" aria-hidden="true"></i>SDS Search
                        </a>
                        <a href="{{ route('login') }}" class="btn login-btn ml-50">Log in</a>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Welcome Area Start ##### -->
<div
    class="breadcumb-area clearfix dzsparallaxer auto-init"
    data-options='{direction: "normal"}'
>
    <div
        class="divimage dzsparallaxer--target"
        style="
          width: 101%;
          height: 130%;
          background-image: url(img/bg-img/bg-2.jpg);
        "
    ></div>
    <!-- breadcumb content -->
    <div class="breadcumb-content">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                        <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">
                            SDS Search
                        </h2>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Welcome Area End ##### -->

<!-- ######## Search Area  Start ######## -->
<section class="blog-area section-padding-100-0">
    <div class="container">
        <div class="card sds_card">
            <input
                type="text"
                name="sds_search"
                id="sds_search"
                class="sds_search"
                placeholder="Search SDS By Chemical name"
            />
        </div>
    </div>
</section>
<!-- ######## Search Area  End ######## -->

<!-- ##### Blog Area Start ##### -->
<section class="blog-area section-padding-100-0">
    {{--    <div class="container mb-100">--}}
    {{--        <h1 style="color: #2fbda9">Search Result For: *************</h1>--}}
    {{--        <hr />--}}
    {{--    </div>--}}
    <div class="container">
        <!-- Single Blog Post -->
        <div id="sds-search">
            {{--            @foreach($data as $value)--}}
            {{--                <div class="col-12 col-sm-12 mb-20">--}}
            {{--                    <div class="single-blog-area wow fadeInUp" data-wow-delay="0.2s">--}}
            {{--                        <!-- Post Thumbnail -->--}}
            {{--                        <!-- Post Content -->--}}
            {{--                        <div class="blog-content">--}}
            {{--                            <div class="col-md-12 post-meta">--}}
            {{--                                <div class="row">--}}
            {{--                                    <p class="col-md-5 text-left">--}}
            {{--                                        language <a href="#" class="post-author">English</a>--}}
            {{--                                    </p>--}}
            {{--                                    <p class="col-md-5 text-left">--}}
            {{--                                        Revision date: <span>01-01-2020</span>--}}
            {{--                                    </p>--}}
            {{--                                    <button class="col-md-2 btn btn-danger">Danger</button>--}}
            {{--                                </div>--}}
            {{--                                <div class="row mt-4"></div>--}}
            {{--                            </div>--}}
            {{--                            <h4>--}}
            {{--                                Product Name:--}}
            {{--                                <span>{{$value->chemical}}</span>--}}
            {{--                            </h4>--}}
            {{--                            <div class="row">--}}
            {{--                                <div class="info col-md-8">--}}
            {{--                                    <p class="text-left ml-80">--}}
            {{--                                        Product Code: <span>{{$value->product_code}}</span>--}}
            {{--                                    </p>--}}
            {{--                                    <p class="text-left ml-80">--}}
            {{--                                        Product Code: <span>{{$value->product_indentifier}}</span>--}}
            {{--                                    </p>--}}
            {{--                                    <p class="text-left ml-80">Manufacture: <span>{{$value->manufacture}}</span></p>--}}
            {{--                                </div>--}}
            {{--                                <div class="pictro col-md-4">--}}
            {{--                                    <img--}}
            {{--                                        class="h_pic"--}}
            {{--                                        src="{{asset('image/chemical/chemicalimage/'.$value->che_image)}}"--}}
            {{--                                        alt="hazard_pic"--}}
            {{--                                    />--}}
            {{--                                    <img--}}
            {{--                                        class="h_pic"--}}
            {{--                                        src="{{asset('image/hazard/'.$value->hazard_image)}}"--}}
            {{--                                        alt="hazard_pic"--}}
            {{--                                    />--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <a href="#" class="btn dream-btn mt-15">View SDS</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            @endforeach--}}
        </div>


        <div class="row">
            <div class="col-12 section-padding-0-100">
                <div class="dream-pagination wow fadeInUp" data-wow-delay="0.2s">

{{--                    <nav>--}}
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            {!! $data->links() !!}--}}
{{--                        </ul>--}}
{{--                    </nav>--}}

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Blog Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img">
    <!-- ##### Contact Area Start ##### -->
    <div class="contact_us_area section-padding-100-0" id="contact">
        <div class="container">
            <div class="call-us-sec">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-9">
                        <div class="text-left">
                            <h3 class="g-text fadeInUp" data-wow-delay="0.3s">
                                Get Your Quote or Call: (080) 5388-273-284
                            </h3>
                            <h2 class="bold w-text mb-0">
                                Are You Ready? Book Appointment Now!
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a
                            class="btn dream-btn more-btn fadeInUp mt-s"
                            data-wow-delay="0.6s"
                            href="#"
                        >Schudule Now</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area End ##### -->

    <div class="footer-content-area spec">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="footer-copywrite-info">
                        <!-- Copywrite -->
                        <div class="copywrite_text fadeInUp" data-wow-delay="0.2s">
                            <div class="footer-logo">
                                <a href="#"
                                ><img src="{{asset('front/img/core-img/logo.png')}}" alt="logo"/> MYSDS
                                    ONLINE
                                </a>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Velit ducimus voluptatibus neque illo id repellat quisquam?
                                Autem expedita earum quae laborum ipsum ad.
                            </p>
                        </div>
                        <!-- Social Icon -->
                        <div class="footer-social-info fadeInUp" data-wow-delay="0.4s">
                            <a href="#"
                            ><i class="fa fa-facebook" aria-hidden="true"></i
                                ></a>
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i
                                ></a>
                            <a href="#"
                            ><i class="fa fa-google-plus" aria-hidden="true"></i
                                ></a>
                            <a href="#"
                            ><i class="fa fa-instagram" aria-hidden="true"></i
                                ></a>
                            <a href="#"
                            ><i class="fa fa-linkedin" aria-hidden="true"></i
                                ></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="contact_info_area d-sm-flex justify-content-between">
                        <!-- Content Info -->
                        <div
                            class="contact_info mt-x text-center fadeInUp"
                            data-wow-delay="0.3s"
                        >
                            <h5>PRIVACY & TOS</h5>
                            <a href="#"><p>Advertiser Agreement</p></a>
                            <a href="#"><p>Acceptable Use Policy</p></a>
                            <a href="#"><p>Privacy Policy</p></a>
                            <a href="#"><p>Technology Privacy</p></a>
                            <a href="#"><p>Developer Agreement</p></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2 col-md-6">
                    <!-- Content Info -->
                    <div class="contact_info_area d-sm-flex justify-content-between">
                        <div
                            class="contact_info mt-s text-center fadeInUp"
                            data-wow-delay="0.2s"
                        >
                            <h5>NAVIGATE</h5>
                            <a href="#"><p>Advertisers</p></a>
                            <a href="#"><p>Developers</p></a>
                            <a href="#"><p>Resources</p></a>
                            <a href="#"><p>Company</p></a>
                            <a href="#"><p>Connect</p></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="contact_info_area d-sm-flex justify-content-between">
                        <!-- Content Info -->
                        <div
                            class="contact_info mt-s text-center fadeInUp"
                            data-wow-delay="0.4s"
                        >
                            <h5>CONTACT US</h5>
                            <p>Mailing Address:xx00 E. Union Ave</p>
                            <p>Silangor</p>
                            <p>+88 01828066845</p>
                            <p>support@yourdomain.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery js -->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('front/js/plugins.js')}}"></script>
<!-- Parallax js -->
<script src="{{asset('front/js/dzsparallaxer.js')}}"></script>

<script src="{{asset('front/js/jquery.syotimer.min.js')}}"></script>

<!-- script js -->
<script src="{{asset('front/js/script.js')}}"></script>


<script type="text/javascript">

    $(document).ready(function () {

        $('#sds-search').append('<h3 class="text-center text-warning">Please search by a <b style="color: #012296;">Chemical Name</b></h3>');
        $('#sds_search').on('keyup', function () {
            let searchQuery = $(this).val();
            // alert(searchQuery);
            // console.log(searchQuery);
            $.ajax({
                type: 'get',
                url: '/sds-search-result/',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuery: searchQuery
                },
                success: function (res) {
                    let sdsSearchResult = '';
                    $('#sds-search').html('');
                    // console.log(res);
                    if (res == '') {
                        $('#sds-search').html('');
                        $('#sds-search').append('<h3 class="text-center text-warning">No Data Found!</h3>');
                    } else {
                        $.each(res, function (index, value) {

                            sdsSearchResult = '<div class="col-12 col-sm-12 mb-20">\n' +
                                '                    <div class="single-blog-area wow fadeInUp" >\n' +
                                '                        <!-- Post Thumbnail -->\n' +
                                '                        <!-- Post Content -->\n' +
                                '                        <div class="blog-content">\n' +
                                '                            <div class="col-md-12 post-meta">\n' +
                                '                                <div class="row">\n' +
                                '                                    <p class="col-md-5 text-left">\n' +
                                '                                        language <a href="#" class="post-author">English</a>\n' +
                                '                                    </p>\n' +
                                '                                    <p class="col-md-5 text-left">\n' +
                                '                                        Revision date: <span>01-01-2020</span>\n' +
                                '                                    </p>\n' +
                                '                                    <button class="col-md-2 btn btn-danger">Danger</button>\n' +
                                '                                </div>\n' +
                                '                                <div class="row mt-4"></div>\n' +
                                '                            </div>\n' +
                                '                            <h4>\n' +
                                '                                Product Name:\n' +
                                '                                <span>' + value.chemical + '</span>\n' +
                                '                            </h4>\n' +
                                '                            <div class="row">\n' +
                                '                                <div class="info col-md-8">\n' +
                                '                                    <p class="text-left ml-80">\n' +
                                '                                        Product Code: <span>' + value.product_code + '</span>\n' +
                                '                                    </p>\n' +
                                '                                    <p class="text-left ml-80">\n' +
                                '                                        Product Code: <span>' + value.product_indentifier + '</span>\n' +
                                '                                    </p>\n' +
                                '                                    <p class="text-left ml-80">Manufacture: <span>' + value.chemical + '</span></p>\n' +
                                '                                </div>\n' +
                                '                                <div class="pictro col-md-4">\n' +
                                '                                    <img\n' +
                                '                                        class="h_pic"\n' +
                                '                                        src="image/chemical/chemicalimage/' + value.che_image + '"\n' +
                                '                                        alt="hazard_pic"\n' +
                                '                                    />\n' +
                                '                                    <img\n' +
                                '                                        class="h_pic"\n' +
                                '                                        src="image/hazard/' + value.hazard_image + '"\n' +
                                '                                        alt="hazard_pic"\n' +
                                '                                    />\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                            <a href="#" class="btn dream-btn mt-15">View SDS</a>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>';
                            $('#sds-search').append(sdsSearchResult);

                        })

                    }
                }
            });

        });

    })

</script>

</body>

</html>
