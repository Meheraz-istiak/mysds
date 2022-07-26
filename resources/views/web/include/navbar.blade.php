<header id="master-head" class="navbar menu-absolute menu-center">
    <div class="container">
        <div id="main-logo" class="logo-container">
            <a class="logo" href="index.html">
                <img src="{{asset('frontend/images/logo.png')}}" class="logo-dark" alt="TECHnSAFETY" />
                <img src="{{asset('frontend/images/logo.png')}}" class="logo-light" alt="TECHnSAFETY" />
            </a>
        </div>
        <div class="menu-toggle-btn">
            <!-- Mobile menu toggle-->
            <a class="navbar-toggle">
                <div class="burger-lines"></div>
            </a>
            <!-- End mobile menu toggle-->
        </div>
        <div id="navigation" class="nav navbar-nav navbar-main">
            <ul id="main-menu" class="menu-primary">
                <li class="menu-item active">
                    <a href="">Home</a>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#">About Us</a>
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#">About Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Our Services</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Careers</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Job Details</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item menu-item-has-children mega-menu">
                    <a href="#">Feature</a>
                    <ul class="sub-menu mega-menu-inner">
                        <li class="menu-item col-title">
                            <a href="#">Layouts</a>
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="index.html">Standard Software</a>
                                </li>
                                <li class="menu-item">
                                    <a href="index.html">CRM software</a>
                                </li>
                                <li class="menu-item">
                                    <a href="index.html">Security Software</a>
                                </li>
                                <li class="menu-item">
                                    <a href="index.html">Payment Software</a>
                                </li>
                                <li class="menu-item">
                                    <a href="index.html">HSE Systems</a>
                                </li>
                                <li class="menu-item">
                                    <a href="index.html">Digital Marketing</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item col-title">
                            <a href="#">Inner Pages</a>
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="#">About Us</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Services</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Contact Us</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">404 (Not Found)</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Coming Soon</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Login/Register</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item col-title">
                            <a href="#">Elements</a>
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="#">Content Boxes</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Pricing Tables</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Quotes Carousel</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Counters & Countdown</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Tabs & Accordions</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item col-title">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="#">Blog Grid (3 Col)</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Blog Grid (2 Col)</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Blog with Sidebar</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="index.html">Price</a>
                </li>
                <li class="menu-item">
                    <a href="index.html">Contact</a>
                </li>
            </ul>
        </div>
        <div class="navbar-right">
            <div class="menu-button">
                <a href="" target="_blank" style="margin-right: 10px">
                    <div class="btn btn-secondary">Schudule a Demo</div>
                </a>
            </div>
            <div class="menu-button">
                <a href="{{route('login')}}" target="_blank">
                    <div class="btn btn-primary">Log in</div>
                </a>
            </div>
        </div>
    </div>
</header>
