<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="index.html" class="mb-0 brand-icon">
            <span class="logo-icon">
              <i class="fa fa-book fs-4"></i>
            </span>
            <span class="logo-text">HSE SYSTEM</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li>
                <a class="m-link active" href="{{route('user.dashboard')}}"
                ><i class="icofont-home fs-5"></i> <span>Dashboard</span></a
                >
            </li>



            <li class="collapsed">
                <a class="m-link  active"
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-product"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Company Profile Setup</span>
                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="menu-product">

                    <li>
                        <a class="ms-link" href="{{route('department.index')}}">Department Setup</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('designation.index')}}">Designation Setup</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('employee.index')}}">Employee Setup</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('com_profile.index')}}">Company Profile</a>
                    </li>


                </ul>


            </li>

            <li class="collapsed">
                <a class="m-link  active"
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-safety"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Safety Policy</span>
                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="menu-safety">
                    <li>
                        <a class="ms-link" href="{{ route('safety.index') }}">Safety</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{ route('upload_policy.index') }}">Review/Upload policy</a>
                    </li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link  active"
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-Workplace"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Workplace Inspection</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="menu-Workplace">

                    <li>
                        <a class="ms-link" href="{{route('workinspection.index')}}">Dashboard</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('create_ispection.index')}}">Creat Inspection</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('list_inspection.index')}}">list of Inspection</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('rectified_inspection.index')}}">Rectified Inspection</a>
                    </li>


                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link  active"
                   data-bs-toggle="collapse"
                   data-bs-target="#menu-Accident"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Accident investigation</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="menu-Accident">

                    <li>
                        <a class="ms-link" href="{{route('workinspection.index')}}">Dashboard</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('accident_investigation.index')}}">Accident analysis</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('accident_investigation.acci_list')}}">list of Accident</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('accident_report.index')}}">Accident Report</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('rectified_inspection.index')}}">Rectified Inspection</a>
                    </li>


                </ul>
            </li>





            <li class="collapsed">
                <a class="m-link  active"
                   data-bs-toggle="collapse"
                   data-bs-target="#Safety_Committee"
                   href="#">
                    <i class="icofont-users-alt-2 fs-5"></i>
                    <span>Safety Committee</span>

                    <span
                        class="arrow icofont-rounded-down ms-auto text-end fs-5"
                    ></span
                    ></a>
                <!-- Menu: Sub menu ul -->


                <ul class="sub-menu collapse" id="Safety_Committee">

                    <li>
                        <a class="ms-link" href="{{route('safety_committee.index')}}">Safety Committee</a>
                    </li>
                    <li>
                        <a class="ms-link" href="{{route('meeting.index')}}">Meeting Minutes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="m-link active" href="{{route('safe_work_procedure.index')}}"
                ><i class="icofont-home fs-5"></i> <span>Safe Work Procedure</span></a
                >
            </li>


          <li class="collapsed">
              <a
                class="m-link active"
                data-bs-toggle="collapse"
                data-bs-target="#customers-info"
                href="#"
              >
                <i class="icofont-funky-man fs-5"></i> <span>HIRARC</span>
                <span
                  class="arrow icofont-rounded-down ms-auto text-end fs-5"
                ></span
              ></a>
              <!-- Menu: Sub menu ul -->
              <ul class="sub-menu collapse" id="customers-info">
                <li>
                  <a class="ms-link" href="{{route('hirarc.index')}}">Add Hirarc</a>
                </li>

              </ul>
               <ul class="sub-menu collapse" id="customers-info">
                <li>
                  <a class="ms-link" href="{{route('hirarc.listview')}}">Hirarc List</a>
                </li>

              </ul>

             <ul class="sub-menu collapse" id="customers-info">
                <li>
                  <a class="ms-link" href="{{route('h_hazard.index')}}">Hazard</a>
                </li>

              </ul>

            </li>


        </ul>


        <!-- Menu: menu collepce btn -->
        <button
            type="button"
            class="btn btn-link sidebar-mini-btn text-light"
        >
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
