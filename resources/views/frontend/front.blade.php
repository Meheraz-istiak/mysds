
{{--    @if (Route::has('login'))--}}
{{--        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--            @auth--}}
{{--                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
{{--                @endif--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    @endif--}}
    <!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Title -->
    <title>MYSDS ONLINE</title>

    <!-- Favicon -->
    {{--    <link rel="icon" href="img/core-img/favicon.ico" />--}}
    <link rel="icon"href="{{ asset('front/img/core-img/favicon.ico') }}" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset("front/css/responsive.css" )}}"/>

    <!-- Font awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
        .modal-backdrop {
            z-index: 100000 !important;
        }

        .modal {
            z-index: 100001 !important;
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
                ><img src="{{asset('front/img/core-img/logo.png')}}" alt="logo" /> MYSDS ONLINE
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
                                <a href="#home">Home</a>
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

<section class="hero-section fuel relative" id="home">
    <!-- Hero Content -->
    <div class="hero-section-content">
        <div class="container">
            <div class="row">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="welcome-content text-left">
                        <h1 class="bold wow fadeInUp d-blue" data-wow-delay="0.2s">
                            Leading the paradigm shift to
                            <span class="b-blue">Chemical Management in Malaysia</span>
                        </h1>
                        <p class="wow fadeInUp b-text" data-wow-delay="0.3s">
                            With over 1000 SDS from Malaysia and Counting we aim to be
                            able to support you with our chemical management services and
                            safety solutions.
                        </p>

                        <div class="dream-btn-group fadeInUp" data-wow-delay="0.4s">

                            <a href="{{route('schadule.index')}}" class="btn dream-btn mr-3">Schudule a Demo</a>
                            <a href="#" class="btn dream-btn mr-3">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<div class="clearfix"></div>
<!-- ##### About Us Area Start ##### -->
<section class="about-us-area section-padding-0-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-3 col-md-12">
                <div class="col-xs-12">
                    <div class="article special box-shadow">
                        <img src="{{asset('front/img/icons/s1.png')}}" class="mb-10" alt="" />
                        <h3 class="article__title">SDS Authoring & Register</h3>
                        <!-- <p>
                          Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit
                        </p> -->
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="article special box-shadow">
                        <img src="{{asset('front/img/icons/s2.png')}}" class="mb-10" alt="" />
                        <h3 class="article__title">SDS Training</h3>
                        <!-- <p>
                          Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit
                        </p> -->
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 col-md-12">
                <div class="col-xs-12">
                    <div class="article special box-shadow mts-50">
                        <img src="{{asset('front/img/icons/s3.png')}}" class="mb-10" alt="" />
                        <h3 class="article__title">SDS Search</h3>
                        <!-- <p>
                          Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit
                        </p> -->
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="article special box-shadow">
                        <img src="{{asset('front/img/icons/s4.png')}}" class="mb-10" alt="" />
                        <h3 class="article__title">Chemical Inventory</h3>
                        <!-- <p>
                          Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit
                        </p> -->
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 offset-lg-0 col-md-10 offset-md-1">
                <div class="who-we-contant mt-s">
                    <div class="promo-section">
                        <h3 class="special-head">Learn More About Us!</h3>
                    </div>
                    <h4 class="bl-text fadeInUp" data-wow-delay="0.3s">
                        We Are The Trusted Experts We Keep Things Simple
                    </h4>
                    <p class="fadeInUp" data-wow-delay="0.4s">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at
                        dictum risus, non suscipit arcu. Quisque aliquam posuere tortor,
                        sit amet convallis nunc scelerisque in.
                    </p>
                    <p class="fadeInUp" data-wow-delay="0.5s">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
                        quo laboriosam, dolorum ducimus aliquam consequuntur!
                    </p>
                    <a
                        class="btn dream-btn green-btn mt-30 fadeInUp"
                        data-wow-delay="0.6s"
                        href="#"
                    >Read More</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### About Us Area End ##### -->

<!-- ##### Our Services Area Start ##### -->
<section
    class="our_services_area section-padding-0-0 relative hex-pat-1"
    id="services"
>
    <div class="container">
        <div class="section-heading text-center">
            <span>Our Services</span>
            <h2 class="d-blue bold fadeInUp" data-wow-delay="0.3s">
                Our Core Services
            </h2>
            <!-- <p class="fadeInUp" data-wow-delay="0.4s">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
              accumsan nisi Ut ut felis congue nisl hendrerit commodo.
            </p> -->
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.2s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv1.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s1.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">Chemical Inventory</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.2s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv2.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s2.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">SDS Search</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.2s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv3.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s3.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">SDS REQUEST AND AUTHORING</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.4s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv4.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s4.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">ChemAI</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.4s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv5.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s5.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">
                            THE CORRECT WAY OF CHEMICAL DISPOSAL
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Content -->
                <div
                    class="service_single_content v2 text-center wow fadeInUp"
                    data-wow-delay="0.4s"
                >
                    <div class="service_img">
                        <img src="{{asset('front/img/services/serv6.jpg')}}" alt="" />
                    </div>
                    <div class="serv_icon">
                        <img src="{{asset('front/img/icons/s6.png')}}" alt="" />
                    </div>
                    <div class="service-content">
                        <h6 class="d-blue bold">SDS TRAINING</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="contact_us_area section-padding-100-0" id="contact">
    <div class="container">
        <div
            class="call-us-sec"
            style="border-radius: 30px; margin-bottom: 50px; background: #2d7ddc"
        >
            <div class="row align-items-center">
                <div class="col-12 col-lg-9">
                    <div class="text-left">
                        <h3 class="g-text fadeInUp" data-wow-delay="0.3s">
                            Requesting for a new SDS or contact us for further support
                        </h3>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <a
                        class="btn dream-btn more-btn fadeInUp mt-s"
                        data-wow-delay="0.6s"
                        href="#"
                    >Request Now</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### FAQ & Timeline Area Start ##### -->
<div class="faq-timeline-area section-padding-100-85" id="faq">
    <div class="container">
        <div class="section-heading text-center">
            <span>Important questions</span>
            <h2 class="d-blue bold fadeInUp" data-wow-delay="0.3s">
                Frequently Questions
            </h2>
            <p class="fadeInUp" data-wow-delay="0.4s">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
                accumsan nisi Ut ut felis congue nisl hendrerit commodo.
            </p>
        </div>
        <div class="row align-items-center">
            <div
                class="col-12 col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-sm-10 offset-sm-1"
            >
                <div
                    class="welcome-meter about-sec-wrapper wow fadeInUp"
                    data-wow-delay="0.4s"
                >
                    <img src="{{asset('front/img/core-img/about-sec.jpg')}}" class="about-i" alt="" />
                    <div class="article special width-50 box-shadow">
                        <div class="form-head">
                            <div class="form-head-icon">
                                <img src="{{asset('front/img/icons/info1.png')}}" alt="" />
                            </div>
                            <div class="form-head-info">
                                <h6 class="w-text">8:00 a.m to 6:00 p.m.(CST)</h6>
                                <p class="g-text">Monday through Friday</p>
                            </div>
                        </div>
                        <div class="form-head">
                            <div class="form-head-icon">
                                <img src="{{asset('front/img/icons/info2.png')}}" alt="" />
                            </div>
                            <div class="form-head-info">
                                <h6 class="w-text">support@domain.com</h6>
                                <p class="g-text">Monday through Friday</p>
                            </div>
                        </div>
                        <div class="form-head mb-0">
                            <div class="form-head-icon">
                                <img src="{{asset('front/img/icons/info3.png')}}" alt="" />
                            </div>
                            <div class="form-head-info">
                                <h6 class="w-text">(080) 5388-273-284</h6>
                                <p class="g-text">8:00 a.m to 6:00 p.m</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-12">
                <div class="dream-faq-area mt-s">
                    <dl style="margin-bottom: 0">
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.2s">
                            What are the objectives of this Laboratory?
                        </dt>
                        <dd class="fadeInUp" data-wow-delay="0.3s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolore omnis quaerat nostrum, pariatur ipsam sunt accusamus
                                enim necessitatibus est fugiat, assumenda dolorem, deleniti
                                corrupti cupiditate ipsum, dolorum voluptatum esse error?
                            </p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.3s">
                            What is the best features and services we deiver?
                        </dt>
                        <dd>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolore omnis quaerat nostrum, pariatur ipsam sunt accusamus
                                enim necessitatibus est fugiat, assumenda dolorem, deleniti
                                corrupti cupiditate ipsum, dolorum voluptatum esse error?
                            </p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.4s">
                            Why this app important to me?
                        </dt>
                        <dd>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolore omnis quaerat nostrum, pariatur ipsam sunt accusamus
                                enim necessitatibus est fugiat, assumenda dolorem, deleniti
                                corrupti cupiditate ipsum, dolorum voluptatum esse error?
                            </p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.5s">
                            how may I take part in and purchase this Software?
                        </dt>
                        <dd>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolore omnis quaerat nostrum, pariatur ipsam sunt accusamus
                                enim necessitatibus est fugiat, assumenda dolorem, deleniti
                                corrupti cupiditate ipsum, dolorum voluptatum esse error?
                            </p>
                        </dd>
                        <!-- Single FAQ Area -->
                        <dt class="wave fadeInUp" data-wow-delay="0.3s">
                            What is the best features and services we deiver?
                        </dt>
                        <dd>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Dolore omnis quaerat nostrum, pariatur ipsam sunt accusamus
                                enim necessitatibus est fugiat, assumenda dolorem, deleniti
                                corrupti cupiditate ipsum, dolorum voluptatum esse error?
                            </p>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### FAQ & Timeline Area End ##### -->

<!-- ##### blog Area Start ##### -->
<div class="blog section-padding-100-50">
    <div class="container">
        <div class="section-heading text-center">
            <span>Our Latest News</span>
            <h2 class="d-blue bold fadeInUp" data-wow-delay="0.3s">
                Our Blog Posts
            </h2>
            <p class="fadeInUp" data-wow-delay="0.4s">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
                accumsan nisi Ut ut felis congue nisl hendrerit commodo.
            </p>
        </div>
        <div class="row align-items-center">
            <!-- Single Blog Post -->
            <div class="col-12 col-md-4 col-sm-6">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Post Thumbnail -->
                    <div class="blog_thumbnail">
                        <img src="{{asset('front/img/services/blog1.jpg')}}" alt="" />
                    </div>
                    <!-- Post Content -->
                    <div class="blog-content">
                        <div class="post-meta">
                            <p>
                                By <a href="#" class="post-author">Admin</a>
                                <a href="#">Apr 10, 2020</a>
                                <a href="#" class="post-comments">7 comments</a>
                            </p>
                        </div>
                        <a href="index-single-blog.html" class="post-title">
                            <h4>RESEARCH & VERIFY OF A PHYSICS LABORATORY</h4>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, consec tetur adipisicing elit.
                            Accusamus fugiat at vitae, ratione sapiente repellat.
                        </p>
                        <a
                            href="index-single-blog.html"
                            class="btn dream-btn green-btn mt-0"
                        >Read Details</a
                        >
                    </div>
                </div>
            </div>
            <!-- Single Blog Post -->
            <div class="col-12 col-md-4 col-sm-6">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="0.4s">
                    <!-- Post Thumbnail -->
                    <div class="blog_thumbnail">
                        <img src="{{asset('front/img/services/blog2.jpg')}}" alt="" />
                    </div>
                    <!-- Post Content -->
                    <div class="blog-content">
                        <div class="post-meta">
                            <p>
                                By <a href="#" class="post-author">Admin</a>
                                <a href="#">Apr 10, 2020</a>
                                <a href="#" class="post-comments">7 comments</a>
                            </p>
                        </div>
                        <a href="index-single-blog.html" class="post-title">
                            <h4>RESEARCH & VERIFY OF A PHYSICS LABORATORY</h4>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, consec tetur adipisicing elit.
                            Accusamus fugiat at vitae, ratione sapiente repellat.
                        </p>
                        <a
                            href="index-single-blog.html"
                            class="btn dream-btn green-btn mt-0"
                        >Read Details</a
                        >
                    </div>
                </div>
            </div>
            <!-- Single Blog Post -->
            <div class="col-12 col-md-4 col-sm-6">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="0.6s">
                    <!-- Post Thumbnail -->
                    <div class="blog_thumbnail">
                        <img src="{{asset('front/img/services/blog3.jpg')}}" alt="" />
                    </div>
                    <!-- Post Content -->
                    <div class="blog-content">
                        <div class="post-meta">
                            <p>
                                By <a href="#" class="post-author">Admin</a>
                                <a href="#">Apr 10, 2020</a>
                                <a href="#" class="post-comments">7 comments</a>
                            </p>
                        </div>
                        <a href="index-single-blog.html" class="post-title">
                            <h4>RESEARCH & VERIFY OF A PHYSICS LABORATORY</h4>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, consec tetur adipisicing elit.
                            Accusamus fugiat at vitae, ratione sapiente repellat.
                        </p>
                        <a
                            href="index-single-blog.html"
                            class="btn dream-btn green-btn mt-0"
                        >Read Details</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### FAQ & Timeline Area End ##### -->

<!-- ##### pricing Area start ##### -->
<section
    class="pricing section-padding-100-70"
    style="background: #edf6fd"
    id="pricing"
>
    <div class="container">
        <div class="section-heading text-center">
            <span>Our Pricing</span>
            <h2 class="d-blue bold fadeInUp" data-wow-delay="0.3s">
                Our Pricing Plans
            </h2>
            <p class="fadeInUp" data-wow-delay="0.4s">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
                accumsan nisi Ut ut felis congue nisl hendrerit commodo.
            </p>
        </div>
        <div class="row no-gutters">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div
                    class="single_price_table_content text-center wow fadeInUp"
                    data-wow-delay="0.2s"
                >
                    <div class="price_table_text">
                        <h5>Basic Blood Profile</h5>
                        <h1>$39.99</h1>
                        <p>Per Month</p>
                    </div>
                    <div class="table_text_details">
                        <p>Fasting Required</p>
                        <p>Report available</p>
                        <p>Unlimited Checkups</p>
                        <p>Receive Report by Email</p>
                        <p>Delivered Same Day</p>
                    </div>
                    <div class="table_btn mt-50">
                        <a href="#" class="btn dream-btn green-btn">Start</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div
                    class="single_price_table_content active text-center wow fadeIn"
                    data-wow-delay="0.3s"
                >
                    <div class="price_table_text">
                        <h5>Platinum Health Check</h5>
                        <h1>$69.99</h1>
                        <p>Per Month</p>
                    </div>
                    <div class="table_text_details">
                        <p>Fasting Required</p>
                        <p>Report available</p>
                        <p>Unlimited Checkups</p>
                        <p>Receive Report by Email</p>
                        <p>Delivered Same Day</p>
                    </div>
                    <div class="table_btn mt-50">
                        <a href="#" class="btn dream-btn green-btn">Start</a>
                    </div>
                </div>
            </div>
            <!-- Single Table -->
            <div class="col-lg-4 col-md-6">
                <div
                    class="single_price_table_content text-center wow fadeInUp"
                    data-wow-delay="0.4s"
                >
                    <div class="price_table_text">
                        <h5>Gold Health Check</h5>
                        <h1>$84.99</h1>
                        <p>Per Month</p>
                    </div>
                    <div class="table_text_details">
                        <p>Fasting Required</p>
                        <p>Report available</p>
                        <p>Unlimited Checkups</p>
                        <p>Receive Report by Email</p>
                        <p>Delivered Same Day</p>
                    </div>
                    <div class="table_btn mt-50">
                        <a href="#" class="btn dream-btn green-btn">Start</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### pricing Area End ##### -->

<div class="footer-bg">
    <!-- ##### Testimonial Area Start ##### -->
    <section
        class="clients_testimonials_area bg-img section-padding-100-0"
        id="test"
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <span>What Clients Say</span>
                        <h2
                            class="d-blue bold bl-text wow fadeInUp"
                            data-wow-delay="0.3s"
                        >
                            Loved By Our Clients
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay="0.4s">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                            quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cotainer-fluid">
            <div
                class="row justify-content-center wow fadeInUp"
                data-wow-delay="0.4s"
            >
                <div class="col-12 col-md-10 col-xs-10 offset-xs-1">
                    <div class="client_slides owl-carousel">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Image -->
                            <div class="testimonial_image">
                                <img src="{{asset('front/img/test-img/1.jpg')}}" alt="" />
                            </div>
                            <!-- Testimonial Feedback Text -->
                            <div class="testimonial-description">
                                <div class="testimonial_text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Officiis magni, quisquam, accusantium dolores
                                        atque, doloribus odit minus maiores sunt mollitia
                                        consequatur, soluta quasi.
                                    </p>
                                </div>

                                <!-- Admin Text -->
                                <div class="admin_text">
                                    <h5>Sunny Khan</h5>
                                    <p>Head of Design, Company CEO</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Image -->
                            <div class="testimonial_image">
                                <img src="{{asset('front/img/test-img/2.jpg')}}" alt="" />
                            </div>
                            <!-- Testimonial Feedback Text  -->
                            <div class="testimonial-description">
                                <div class="testimonial_text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Error nostrum adipisci porro quisquam. Rem, earum,
                                        tenetur? Architecto et, earum repudiandae.
                                    </p>
                                </div>

                                <!-- Admin Text -->
                                <div class="admin_text">
                                    <h5>Ajoy Das</h5>
                                    <p>Head of Idea, Company CEO</p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Image -->
                            <div class="testimonial_image">
                                <img src="{{asset('front/img/test-img/3.jpg')}}" alt="" />
                            </div>
                            <!-- Testimonial Feedback Text  -->
                            <div class="testimonial-description">
                                <div class="testimonial_text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Et delectus, nam repudiandae repellat id placeat
                                        molestias consequuntur, laudantium dolorem nesciunt sit.
                                    </p>
                                </div>
                                <!-- Admin Text -->
                                <div class="admin_text">
                                    <h5>Jebin Khan</h5>
                                    <p>Head of Marketing, Company CEO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

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
                                    ><img src="{{asset('front/img/core-img/logo.png')}}" alt="logo" /> MYSDS
                                        ONLINE
                                    </a>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Velit ducimus voluptatibus neque illo id repellat
                                    quisquam? Autem expedita earum quae laborum ipsum ad.
                                </p>
                            </div>
                            <!-- Social Icon -->
                            <div
                                class="footer-social-info fadeInUp"
                                data-wow-delay="0.4s"
                            >
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
                        <div
                            class="contact_info_area d-sm-flex justify-content-between"
                        >
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
                        <div
                            class="contact_info_area d-sm-flex justify-content-between"
                        >
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
                        <div
                            class="contact_info_area d-sm-flex justify-content-between"
                        >
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
    <!-- ##### Footer Area End ##### -->
    <!-- Modal-->
    <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel">Modal Title</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('schadule.store')}}" id="schadule">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="company_name"
                                    id="company_name"
                                    required="required"
                                    placeholder="Enter Company Name"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="industry_type_id"
                                    id="industry_type_id"
                                    required="required"
                                    placeholder="Enter industry Name"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="number_of_employees"
                                    id="number_of_employees"
                                    required="required"
                                    placeholder="Enter number of employees"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email_address"
                                    id="email_address"
                                    required="required"
                                    placeholder="Enter Email Address"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="person_incharge"
                                    id="person_incharge"
                                    required="required"
                                    placeholder="Enter person incharge"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="designation"
                                    id="designation"
                                    required="required"
                                    placeholder="Enter Designation"
                                />
                            </div>

                            <div class="form-group col-md-12">
                                <input
                                    type="number"
                                    class="form-control"
                                    name="contact_no"
                                    id="contact_no"
                                    required="required"
                                    placeholder="Enter contact no"
                                />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Select Date</label>
                                <input type="date"  placeholder="Enter contact no" class="form-control" required="required" name="meeting_date" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Select Time</label>
                                <input
                                    type="time"
                                    class="form-control"
                                    name="meeting_time"
                                    required="required"
                                />
                            </div>


                            <div class="form-group" style="margin-left: 12px;">
                                <label
                                ><input type="checkbox" required="required" name="status"  value="0" /> I accept the
                                    policy and terms</label
                                >
                            </div>
                            <div class="form-group" style="margin-top: 51px;">
                                <button type="submit" class="btn btn-primary btn-full">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ########## All JS ########## -->
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
        // $('#schedule').on('click', function () {
        //     $('#scheduleModal').modal('show');
        // })
    })
</script>
</body>
</html>

