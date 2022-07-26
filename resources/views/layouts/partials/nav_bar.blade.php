<nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand">

    <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    <a class="navbar-brand mr-1 mr-sm-3" href="index.html">
        <div class="d-flex align-items-center"><img class="mr-2" src="{{ asset('assets/img/illustrations/falcon.png') }}" alt="" width="40" /><span class="text-sans-serif">HSE System</span>
        </div>
    </a>
    <ul class="navbar-nav align-items-center d-none d-lg-block">
        <li class="nav-item">
            <div class="search-box">
                <form class="position-relative" data-toggle="search" data-display="static">

                    <input class="form-control search-input" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>

                </form>

                <button class="close" type="button" data-dismiss="search"><span class="fas fa-times"></span></button>
                <div class="dropdown-menu">
                    <div class="scrollbar perfect-scrollbar py-3" style="height: 24rem;">
                        <h6 class="dropdown-header px-card pt-0 pb-2">Recently Browsed</h6>
                        <a class="dropdown-item fs--1 px-card py-1 hover-primary" href="pages/events.html">
                            <div class="d-flex align-items-center">
                                <span class="fas fa-circle mr-2 text-300 fs--2"></span>

                                <div class="font-weight-normal">Pages <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Events</div>
                            </div>
                        </a>
                        <a class="dropdown-item fs--1 px-card py-1 hover-primary" href="e-commerce/customers.html">
                            <div class="d-flex align-items-center">
                                <span class="fas fa-circle mr-2 text-300 fs--2"></span>

                                <div class="font-weight-normal">E-commerce <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Customers</div>
                            </div>
                        </a>

                        <hr class="border-200" />
                        <h6 class="dropdown-header px-card pt-0 pb-2">Suggested Filter</h6>
                        <a class="dropdown-item px-card py-1 fs-0" href="e-commerce/customers.html">
                            <div class="d-flex align-items-center"><span class="badge font-weight-medium text-decoration-none mr-2 badge-soft-warning">customers:</span>
                                <div class="flex-1 fs--1">All customers list</div>
                            </div>
                        </a>
                        <a class="dropdown-item px-card py-1 fs-0" href="pages/events.html">
                            <div class="d-flex align-items-center"><span class="badge font-weight-medium text-decoration-none mr-2 badge-soft-success">events:</span>
                                <div class="flex-1 fs--1">Latest events in current month</div>
                            </div>
                        </a>
                        <a class="dropdown-item px-card py-1 fs-0" href="e-commerce/product-grid.html">
                            <div class="d-flex align-items-center"><span class="badge font-weight-medium text-decoration-none mr-2 badge-soft-info">products:</span>
                                <div class="flex-1 fs--1">Most popular products</div>
                            </div>
                        </a>

                        <hr class="border-200" />
                        <h6 class="dropdown-header px-card pt-0 pb-2">Files</h6>
                        <a class="dropdown-item px-card py-2" href="#!">
                            <div class="d-flex align-items-center">
                                <div class="file-thumbnail mr-2"><img class="border h-100 w-100 fit-cover rounded-lg" src="{{ asset('assets/img/products/3-thumb.png') }}" alt="" /></div>
                                <div class="flex-1">
                                    <h6 class="mb-0">iPhone</h6>
                                    <p class="fs--2 mb-0"><span class="font-weight-semi-bold">Antony</span><span class="font-weight-medium text-600 ml-2">27 Sep at 10:30 AM</span></p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item px-card py-2" href="#!">
                            <div class="d-flex align-items-center">
                                <div class="file-thumbnail mr-2"><img class="img-fluid" src="{{ asset('assets/img/icons/zip.png') }}" alt="" /></div>
                                <div class="flex-1">
                                    <h6 class="mb-0">Falcon v1.8.2</h6>
                                    <p class="fs--2 mb-0"><span class="font-weight-semi-bold">John</span><span class="font-weight-medium text-600 ml-2">30 Sep at 12:30 PM</span></p>
                                </div>
                            </div>
                        </a>

                        <hr class="border-200" />
                        <h6 class="dropdown-header px-card pt-0 pb-2">Members</h6>
                        <a class="dropdown-item px-card py-2" href="pages/profile.html">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l status-online mr-2">
                                    <img class="rounded-circle" src="{{ asset('assets/img/team/1.jpg') }}" alt="" />

                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0">Anna Karinina</h6>
                                    <p class="fs--2 mb-0">Technext Limited</p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item px-card py-2" href="pages/profile.html">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l mr-2">
                                    <img class="rounded-circle" src="{{ asset('assets/img/team/2.jpg') }}" alt="" />

                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0">Antony Hopkins</h6>
                                    <p class="fs--2 mb-0">Brain Trust</p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item px-card py-2" href="pages/profile.html">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l mr-2">
                                    <img class="rounded-circle" src="{{ asset('assets/img/team/3.jpg') }}" alt="" />

                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0">Emma Watson</h6>
                                    <p class="fs--2 mb-0">Google</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
        <li class="nav-item dropdown dropdown-on-hover">
            <a class="nav-link notification-indicator notification-indicator-primary px-0 icon-indicator" id="navbarDropdownNotification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell fs-4" data-fa-transform="shrink-6"></span></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
                <div class="card card-notification shadow-none" style="max-width: 20rem">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h6 class="card-header-title mb-0">Notifications</h6>
                            </div>
                            <div class="col-auto"><a class="card-link font-weight-normal" href="#">Mark all as read</a></div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush font-weight-normal fs--1">
                        <div class="list-group-title border-bottom">NEW</div>
                        <div class="list-group-item">
                            <a class="notification notification-flush bg-200" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl mr-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/team/1-thumb.png') }}" alt="" />

                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                    <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>Just now</span>

                                </div>
                            </a>

                        </div>
                        <div class="list-group-item">
                            <a class="notification notification-flush bg-200" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl mr-3">
                                        <div class="avatar-name rounded-circle"><span>AB</span></div>
                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                    <span class="notification-time"><span class="mr-1 fab fa-gratipay text-danger"></span>9hr</span>

                                </div>
                            </a>

                        </div>
                        <div class="list-group-title">EARLIER</div>
                        <div class="list-group-item">
                            <a class="notification notification-flush" href="#!">
                                <div class="notification-avatar">
                                    <div class="avatar avatar-2xl mr-3">
                                        <img class="rounded-circle" src="{{ asset('assets/img/icons/weather-sm.jpg') }}" alt="" />

                                    </div>
                                </div>
                                <div class="notification-body">
                                    <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                    <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">🌤️</span>1d</span>

                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="card-footer text-center border-top"><a class="card-link d-block" href="pages/notifications.html">View all</a></div>
                </div>
            </div>

        </li>
        <li class="nav-item dropdown dropdown-on-hover">
            <a class="nav-link pr-0" id="navbarDropdownUser" href="#"
               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('assets/img/team/avatar.png') }}" alt="" />

                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white rounded-soft py-2">
                    <a class="dropdown-item font-weight-bold text-warning" href="#!"><span>{{ Auth::user()->name }}</span></a>
                    <div class="dropdown-divider"></div>
{{--                    <a class="dropdown-item" href="javascript:void(0)">Settings</a>--}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>
</nav>
