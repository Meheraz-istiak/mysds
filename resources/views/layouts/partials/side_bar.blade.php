<nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip"
                    data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div>
        <a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><span class="text-sans-serif">Hse System</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content perfect-scrollbar scrollbar">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('home')) ? 'active':'' }}" href="{{ route('home') }}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-laptop"></span></span>
                            <span class="nav-link-text">Dashboard</span>
                        </div>
                    </a>
                </li>
            </ul>
            {{--            @can('company_profile')--}}

            <ul class="navbar-nav flex-column">
                <li>
                    <a class="nav-link"
                       href="{{route('i_schadule.index')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-home"></span></span>
                            <span class="nav-link-text">Schedule Demo</span>
                        </div>
                    </a>
                </li>
            </ul>


        <ul class="navbar-nav flex-column">
                <li>
                    <a class="nav-link"
                       href="{{route('demo.index')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-home"></span></span>
                            <span class="nav-link-text"> Demo</span>
                        </div>
                    </a>
                </li>
            </ul>


            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#companyprofile"
                                        data-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="companyprofile">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span class="nav-link-text"> Company Profile</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="companyprofile" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('department.index') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Department Setup</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('designation.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Designation Setup</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('employee.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Employee Setup</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('com_profile.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Company Profile</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav flex-column">
                <li>
                    <a class="nav-link {{ (request()->is('policy/view') or request()->is('upload-policy')) ? 'active':'' }}"
                       href="{{route('safety.policy-view')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-home"></span></span>
                            <span class="nav-link-text">Safety Policy</span>
                        </div>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('safety_committee') or request()->is('safety_committee/chart') or request()->is('list-inspection') or request()->is('rectified-inspection')) ? 'active':'' }}">
                    <a class="nav-link dropdown-indicator" href="#committee" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="committee">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-users"></span></span>
                            <span class="nav-link-text">Safety Committee</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('safety_committee') or request()->is('safety_committee/chart') or request()->is('view-meeting')) ? 'show':'' }}"
                        id="committee" data-parent="#navbarVerticalCollapse">
                        {{--                        @can('create_role')--}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('safety_committee')) ? 'active':'' }}"
                               href="{{route('safety_committee.index')}}"> Safety Committee</a>
                        </li>
                        {{--                        @endcan--}}
                        {{--                        @can('create_permission')--}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('safety_committee/chart')) ? 'active':'' }}"
                               href="{{route('safety_committee.chart')}}">
                                Safety Committee Chart
                            </a>
                        </li>
                        {{--                        @endcan--}}
                        {{--                        @can('create_permission')--}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('view-meeting')) ? 'active':'' }}"
                               href="{{route('meeting.index')}}">
                                Meeting Minutes
                            </a>
                        </li>
                        {{--                        @endcan--}}
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{route('safe_work_procedure.index')}}" role="button"
                                        aria-expanded="false" aria-controls="companyprofile">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span
                                class="nav-link-text">Safe Work Procedure</span>
                        </div>
                    </a>

                </li>
            </ul>
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ (request()->is('accident-investigation') or request()->is('list-accident') or request()->is('accident-report')) ? 'active':'' }}">
                    <a class="nav-link dropdown-indicator" href="#accident" data-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="accident">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span
                                class="nav-link-text"> Accident investigation</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('accident-investigation') or request()->is('list-accident') or request()->is('accident-report')) ? 'show':'' }}"
                        id="accident" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('accident-investigation')) ? 'active':'' }}"
                               href="{{route('accident_investigation.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Accident analysis</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('list-accident')) ? 'active':'' }}"
                               href="{{route('accident_investigation.acci_list')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> list of Accident</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('accident-report')) ? 'active':'' }}"
                               href="{{route('accident_report.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Accident Report</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#winsp" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="winsp">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span
                                class="nav-link-text">Workplace Inspection</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="winsp" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('workinspection.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('create_ispection.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text"> Create Inspection</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('list_inspection.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">Inspection List</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('rectified_inspection.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">Rectified Inspection</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>


            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#hirarc" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="hirarc">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span class="nav-link-text">Hirarc</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="hirarc" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('hirarc.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">Add Hirarc</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('c_job.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text"> Create Job</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('c_job.listview')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">List of Activity</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('hirarc.listview')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">Hirarc List</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('h_hazard.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">Sequence of Job Entry</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#PTW" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="hirarc">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span class="nav-link-text">PTW</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="PTW" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_work.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">PTW Work</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_work.listview')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text"> PTW Work list</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_offer.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">PTW offer</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_details.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">PTW Details</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_constractor.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">PTW constractor</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_assination.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span class="nav-link-text">PTW Parsonal assination</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ptw_isolation.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">PTW Isolation</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

              <ul class="navbar-nav flex-column">
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#ERP" data-toggle="collapse"
                                        role="button" aria-expanded="false" aria-controls="hirarc">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-cog"></span></span><span class="nav-link-text">ERP</span>
                        </div>
                    </a>
                    
                    <ul class="nav collapse" id="ERP" data-parent="#navbarVerticalCollapse">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('erp.chart')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">ERT Chart</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('erp.index')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-user"></span></span><span
                                        class="nav-link-text">ERT List</span>
                                </div>
                            </a>
                        </li>
                     
                    </ul>
                </li>
            </ul>

{{--            <ul class="navbar-nav flex-column">--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('i_schadule.index')}}">--}}
{{--                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span--}}
{{--                                    class="fas fa-user"></span></span><span class="nav-link-text">Schedule Demo</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--            </ul>--}}

            <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2">
            </div>

            @can('management')
                <ul class="navbar-nav flex-column">
                    <li class="nav-item {{ (request()->is('role') or request()->is('permission')) ? 'active':'' }}"><a
                            class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="home">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fa fa-cogs"></span></span>
                                <span class="nav-link-text">Management</span>
                            </div>
                        </a>
                        <ul class="nav collapse {{ (request()->is('role') or request()->is('permission')) ? 'show':'' }}"
                            id="home" data-parent="#navbarVerticalCollapse">
                            @can('create_role')
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('role')) ? 'active':'' }}"
                                       href="{{ route('role.index') }}"> Roles</a>
                                </li>
                            @endcan
                            @can('create_permission')
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('permission')) ? 'active':'' }}"
                                       href="{{ route('permission.index') }}">
                                        Permissions
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                </ul>
            @endcan

            @can('create_user')
                <ul class="navbar-nav flex-column">
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#userManagement"
                                            data-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="userManagement">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        class="fas fa-cog"></span></span><span
                                    class="nav-link-text"> User Management</span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="userManagement" data-parent="#navbarVerticalCollapse">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-user"></span></span><span class="nav-link-text"> User Create</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.profile') }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-user"></span></span><span class="nav-link-text"> User Profile</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endcan





            {{--            @endcan--}}


            {{--            <div class="navbar-vertical-divider">--}}
            {{--                <hr class="navbar-vertical-hr my-2" />--}}
            {{--            </div>--}}
            {{--            <ul class="navbar-nav flex-column">--}}
            {{--                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#documentation" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="documentation">--}}
            {{--                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-cog"></span></span><span class="nav-link-text">Settings</span>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                    <ul class="nav collapse" id="documentation" data-parent="#navbarVerticalCollapse">--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link" href="documentation/getting-started.html">--}}
            {{--                                <div class="d-flex align-items-center" style="font-size: .75rem;">--}}
            {{--                                    <span class="nav-link-icon"><span class="fas fa-images"></span></span><span class="nav-link-text">Change Profile Photo</span>--}}
            {{--                                </div>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link" href="documentation/getting-started.html">--}}
            {{--                                <div class="d-flex align-items-center" style="font-size: .75rem;">--}}
            {{--                                    <span class="nav-link-icon">--}}
            {{--                                        <span class="fas fa-lock"></span></span><span class="nav-link-text">Change Password</span>--}}
            {{--                                </div>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </li>--}}
            {{--            </ul>--}}
        </div>
    </div>
</nav>
