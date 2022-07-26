@extends('layouts.frontend')
@section('title')
    Home
@endsection()

@section('content')
    <div id="main-wrapper" class="page-wrapper">
        <div class="page-header section-padding full-height dc-five">
            <div class="container">
                <x-action.response-message/>
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="image-wrapper">
                            <img src="images/default-color/erp-system-img.png" alt=""/>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-6">
                        <div
                                class="heading-wrapper with-separator wow fadeInLeft"
                                data-wow-delay="0.2s"
                        >
                            <h1>
                                TechNSafety is easy-to-use safety management software.
                                <span>HSE Systems</span>
                            </h1>
                        </div>
                        <div class="text-wrapper wow fadeInLeft" data-wow-delay="0.4s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean sodales dictum viverra. Nam gravida dignissim eros.
                                Vivamus congue erat ante, volutpat dictum neque dignissim
                                eget.
                            </p>
                        </div>
                        <div class="btn-wrapper wow fadeInUp" data-wow-delay="0.4s">
                            <a class="btn btn-primary" href="{{route('schedule-demo-request.index')}}">Schedule a Demo</a>
                            <a class="btn btn-outline-primary" href="#"
                            ><i class="fas fa-play-circle"></i>Watch Video</a
                            >
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Page Header -->
        <div class="features-section section-padding">
            <div class="container">
                <div
                        class="row clearfix align-items-center justify-content-between"
                >
                    <div class="col-lg-5">
                        <div class="heading-wrapper with-separator">
                            <h2 class="h1">Why <span>TECHnSAFETY HSE</span> Systems?</h2>
                        </div>
                        <!-- End Heading -->
                        <div class="text-wrapper">
                            <p class="lead-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean sodales dictum viverra.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean sodales dictum viverra. Nam gravida dignissim eros.
                                Vivamus congue erat ante, volutpat dictum neque dignissim
                                eget.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean sodales dictum viverra. Nam gravida dignissim eros.
                                Vivamus congue erat ante, volutpat dictum neque dignissim
                                eget
                            </p>
                        </div>
                        <div class="d-lg-none d-xl-block empty-space-30"></div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-6">
                        <div class="row inner-row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="features-block theme-one wow fadeInUp">
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img
                                                    class="normal"
                                                    src="images/default-color/icon-2.svg"
                                                    alt=""
                                            />
                                            <img
                                                    class="hover"
                                                    src="images/default-color/icon-2-light.svg"
                                                    alt=""
                                            />
                                        </div>
                                        <div class="text">
                                            <h4>Easy to implement and use</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Aenean sodales
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div
                                        class="features-block theme-one wow fadeInUp"
                                        data-wow-delay="0.2s"
                                >
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img
                                                    class="normal"
                                                    src="images/default-color/icon-24.svg"
                                                    alt=""
                                            />
                                            <img
                                                    class="hover"
                                                    src="images/default-color/icon-24-light.svg"
                                                    alt=""
                                            />
                                        </div>
                                        <div class="text">
                                            <h4>Provides Custom Dashboards</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Aenean sodales
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div
                                        class="features-block theme-one wow fadeInUp"
                                        data-wow-delay="0.2s"
                                >
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img
                                                    class="normal"
                                                    src="images/default-color/icon-4.svg"
                                                    alt=""
                                            />
                                            <img
                                                    class="hover"
                                                    src="images/default-color/icon-4-light.svg"
                                                    alt=""
                                            />
                                        </div>
                                        <div class="text">
                                            <h4>Access data anywhere anytime</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Aenean sodales
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div
                                        class="features-block theme-one wow fadeInUp"
                                        data-wow-delay="0.4s"
                                >
                                    <div class="inner-box">
                                        <div class="icon">
                                            <img
                                                    class="normal"
                                                    src="images/default-color/icon-25.svg"
                                                    alt=""
                                            />
                                            <img
                                                    class="hover"
                                                    src="images/default-color/icon-25-light.svg"
                                                    alt=""
                                            />
                                        </div>
                                        <div class="text">
                                            <h4>A cost-effective solution</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Aenean sodales
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Call to Action Section -->
        <div class="cta-section section-padding style-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="call-to-action-content i-text-center">
                            <h2 class="h2">
                                Are you interested in TechNSafety HSE System
                                <span class="special-fonts">We are happy to help you.</span>
                            </h2>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-5">
                        <div class="call-to-action-btn text-right i-text-center">
                            <a href="#" class="btn btn-primary btn-light btn-large"
                            >Schudule a Demo Now!</a
                            >
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Call to Action Section -->
        <!-- Features Section -->
        <div class="section-padding border-top">
            <div class="container">
                <div class="row clearfix align-items-center">
                    <div class="col-lg-6">
                        <div class="image-wrapper">
                            <img
                                    src="images/default-color/erp-mobileapp-features.png"
                                    alt=""
                            />
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-6">
                        <div class="heading-wrapper with-separator">
                            <h2 class="h1">App fledged with <span>features</span></h2>
                        </div>
                        <!-- End Heading -->
                        <div class="text-wrapper">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean sodales dictum viverra. Nam gravida dignissim eros.
                                Vivamus congue erat ante, volutpat dictum neque dignissim
                                eget.
                            </p>
                            <ul class="list-style-one two-col">
                                <li><strong>School Calendar</strong></li>
                                <li><strong>Attendance Report</strong></li>
                                <li><strong>Notice-board</strong></li>
                                <li><strong>Exam Report</strong></li>
                                <li><strong>Notifications</strong></li>
                                <li><strong>Library</strong></li>
                                <li><strong>Institution Fees</strong></li>
                                <li><strong>Gallery</strong></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <div
                class="benefits-section section-padding style-dark dark-bg gradient-heading-bg"
        >
            <div class="container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-8">
                        <div class="heading-wrapper text-center">
                            <h2 class="h1">
                                <span>Benefits</span> of TECHnSAFETY HSE Software
                            </h2>
                            <div class="lead-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis finibus mi id elit gravida, quis tincidunt purus
                                    fringilla. Aenean convallis a neque non pellentesque.
                                </p>
                            </div>
                        </div>
                        <!-- End Heading -->
                        <div class="empty-space-60 clearfix"></div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Technology Integration</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div
                                class="features-block theme-two wow fadeInUp"
                                data-wow-delay="0.2s"
                        >
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Flexibility</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div
                                class="features-block theme-two wow fadeInUp"
                                data-wow-delay="0.4s"
                        >
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Paperless Administration</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="features-block theme-two wow fadeInUp">
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Productivity</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div
                                class="features-block theme-two wow fadeInUp"
                                data-wow-delay="0.2s"
                        >
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Performance</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-md-6">
                        <div
                                class="features-block theme-two wow fadeInUp"
                                data-wow-delay="0.4s"
                        >
                            <div class="inner-box">
                                <div class="text">
                                    <h4>Information Accessibility</h4>
                                    <p>
                                        Pellentesque at libero sed tellus fringilla volutpat.
                                        Nullam vulputate velit id augue commodo scelerisque.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Benefits Section -->
        <div class="module-section section-padding">
            <div class="container">
                <div class="row clearfix justify-content-center">
                    <div class="col-lg-8">
                        <div class="heading-wrapper with-separator text-center">
                            <h2 class="h1">
                                TECHnSAFETY Provides <span>Premium Modules</span>
                            </h2>
                            <div class="lead-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Vivamus congue erat ante, volutpat dictum neque dignissim
                                    eget.
                                </p>
                            </div>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-1.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Fee Collection</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.2s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-2.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Library</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.4s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-3.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Human Resource</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.6s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-4.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Academic</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.8s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-5.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Examination</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="1s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-6.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Student Info</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="features-block theme-three wow fadeInUp">
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-7.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Expenses</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.2s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-8.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Attendance</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.4s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-9.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Inventory</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.6s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-10.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Communicate</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="0.8s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-11.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Home work</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div
                                class="features-block theme-three wow fadeInUp"
                                data-wow-delay="1s"
                        >
                            <div class="inner-box">
                                <div class="icon">
                                    <img class="normal" src="images/st-icon-12.svg" alt=""/>
                                </div>
                                <div class="text">
                                    <h4>Upload Content</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- About Section -->
        <div class="screenshot-section section-padding">
            <div class="container">
                <div class="row justify-content-center clearfix style-dark">
                    <div class="col-lg-8">
                        <div class="heading-wrapper text-center">
                            <h2 class="h1">Software Screen Shots</h2>
                            <div class="lead-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis finibus mi id elit gravida, quis tincidunt purus
                                    fringilla. Aenean convallis a neque non pellentesque.
                                </p>
                            </div>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="ss-wrapper">
                            <img
                                    class="laptop-img-bg"
                                    src="images/laptop-screen.png"
                                    alt=""
                            />
                            <div class="screenshot-slider text-center">
                                <div class="item">
                                    <img src="images/ss-1.jpg" alt=""/>
                                </div>
                                <div class="item">
                                    <img src="images/ss-2.jpg" alt=""/>
                                </div>
                                <div class="item">
                                    <img src="images/ss-3.jpg" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- screenshot Section -->
        <div class="pricing-section section-padding light-bg">
            <div class="container">
                <div class="row justify-content-center clearfix">
                    <div class="col-lg-8">
                        <div class="heading-wrapper text-center with-separator">
                            <h2 class="h1">Pricing Plans</h2>
                            <div class="lead-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis finibus mi id elit gravida, quis tincidunt purus
                                    fringilla. Aenean convallis a neque non pellentesque.
                                </p>
                            </div>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row pricing-plans-one clearfix">
                    <div class="col-lg-4 col-12">
                        <div class="price-card text-center wow fadeInLeft">
                            <div class="card-header">
                                <h3 class="card-title">Package One</h3>
                                <div class="plan-cost-wrapper">
                                    <div class="plan-cost">
                                        <span class="plan-cost-prefix">$</span>15
                                    </div>
                                    <div class="plan-validity">per month</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Donec lorem nunc, semper sed metus at, lacinia viverra
                                        leo.
                                    </p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>1 Month Support Service</li>
                                    <li>Singal User license</li>
                                </ul>
                                <a href="#" class="btn btn-secondary">Purchase Now</a>
                            </div>
                        </div>
                        <!-- End Price card -->
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-12">
                        <div class="price-card popular text-center wow fadeInUp">
                            <div class="card-header">
                                <h3 class="card-title">Package two</h3>
                                <div class="plan-cost-wrapper">
                                    <div class="plan-cost">
                                        <span class="plan-cost-prefix">$</span>30
                                    </div>
                                    <div class="plan-validity">per month</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Donec lorem nunc, semper sed metus at, lacinia viverra
                                        leo.
                                    </p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>1 Year Support Service</li>
                                    <li>3 Users license</li>
                                </ul>
                                <a href="#" class="btn btn-primary">Purchase Now</a>
                            </div>
                        </div>
                        <!-- End Price card -->
                    </div>
                    <!-- End Col -->
                    <div class="col-lg-4 col-12">
                        <div class="price-card text-center wow fadeInRight">
                            <div class="card-header">
                                <h3 class="card-title">Package Three</h3>
                                <div class="plan-cost-wrapper">
                                    <div class="plan-cost">
                                        <span class="plan-cost-prefix">$</span>50
                                    </div>
                                    <div class="plan-validity">per month</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="desc">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Donec lorem nunc, semper sed metus at, lacinia viverra
                                        leo.
                                    </p>
                                </div>
                                <ul class="pricing-feature-list">
                                    <li>Easy Customizable</li>
                                    <li>1 Year Support Service</li>
                                    <li>10 Users license</li>
                                </ul>
                                <a href="#" class="btn btn-secondary">Purchase Now</a>
                            </div>
                        </div>
                        <!-- End Price card -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Pricing Section -->
        <!-- Module Section -->
        <div class="testimonial-section style-two section-padding">
            <div class="container">
                <div class="row clearfix style-dark">
                    <div class="col-lg-8">
                        <div class="heading-wrapper">
                            <h2 class="h1">Happy Clients <span>Feedback</span></h2>
                            <div class="lead-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Duis finibus mi id elit gravida, quis tincidunt purus
                                    fringilla. Aenean convallis a neque non pellentesque.
                                </p>
                            </div>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="client-testimonial theme-two">
                            <div class="testimonial-slider">
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Cum et essent similique. Inani propriae menandri sed
                                            in. Pericula expetendis has no, quo populo forensibus
                                            contentiones et, nibh error in per. Vis in tritani
                                            debitis delicatissimi, error omnesque invenire usu ex,
                                            qui illud nonumes ad.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Andy Sant</h5>
                                            <p>Founder Coinpool</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            It's all good. I am really satisfied with software.
                                            Pericula expetendis has no, quo populo forensibus
                                            contentiones et, nibh error in per. Vis in tritani
                                            debitis delicatissimi, error omnesque invenire usu ex,
                                            qui illud nonumes ad.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Dan Kaul</h5>
                                            <p>IT Consultant</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Pericula expetendis has no, quo populo forensibus
                                            contentiones et, nibh error in per. Vis in tritani
                                            debitis delicatissimi, error omnesque invenire usu ex,
                                            qui illud nonumes ad. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Aenean sodales dictum
                                            viverra.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Saru Matt</h5>
                                            <p>Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Maecenas in lacus consectetur, fermentum nisi
                                            vel, aliquet erat. In hac habitasse platea dictumst.
                                            Orci varius natoque penatibus et magnis dis parturient
                                            montes.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Yommi Pat</h5>
                                            <p>Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-text">
                                        <blockquote>
                                            Nam rutrum, eros nec consequat eleifend, quam est
                                            sodales mauris, eget dignissim lacus sem at erat.
                                            Vivamus eget semper nibh. Nullam dignissim lectus
                                            metus, eget dapibus massa vehicula et.
                                        </blockquote>
                                        <div class="client-info">
                                            <h5>Shreyn S</h5>
                                            <p>Data Science Enthusiastic</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Testimonial Slider -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- Testimonial Section -->
        <div class="companies-section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="companies-logo grid-view">
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-1.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-2.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-3.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-4.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-5.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-4.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-6.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-5.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-2.png" alt=""/>
                                </div>
                            </div>
                            <div class="item">
                                <div class="logo-wrapper">
                                    <img src="images/company-logo-7.png" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- companies Section -->
    </div>
@endsection()