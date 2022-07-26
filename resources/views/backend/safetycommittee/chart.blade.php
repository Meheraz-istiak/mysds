@extends('layouts.default')



@section('title')

    Safety Committee Chart

@endsection



@section('css')

    <style type="text/css">

        /*----------------genealogy-scroll----------*/



        .genealogy-scroll::-webkit-scrollbar {

            width: 5px;

            height: 8px;

        }

        .genealogy-scroll::-webkit-scrollbar-track {

            border-radius: 10px;

            background-color: #e4e4e4;

        }

        .genealogy-scroll::-webkit-scrollbar-thumb {

            background: #212121;

            border-radius: 10px;

            transition: 0.5s;

        }

        .genealogy-scroll::-webkit-scrollbar-thumb:hover {

            background: #d5b14c;

            transition: 0.5s;

        }





        /*----------------genealogy-tree----------*/

        .genealogy-body{

            white-space: nowrap;

            overflow-y: hidden;

            padding: 50px;

            min-height: 500px;

            padding-top: 10px;

            text-align: center;

        }

        .genealogy-tree{

            display: inline-block;

        }

        .genealogy-tree ul {

            padding-top: 20px;

            position: relative;

            padding-left: 0px;

            display: flex;

            justify-content: center;

        }

        .genealogy-tree li {

            float: left; text-align: center;

            list-style-type: none;

            position: relative;

            padding: 20px 5px 0 5px;

        }

        .genealogy-tree li::before, .genealogy-tree li::after{

            content: '';

            position: absolute;

            top: 0;

            right: 50%;

            border-top: 2px solid #ccc;

            width: 50%;

            height: 18px;

        }

        .genealogy-tree li::after{

            right: auto; left: 50%;

            border-left: 2px solid #ccc;

        }

        .genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {

            display: none;

        }

        .genealogy-tree li:only-child{

            padding-top: 0;

        }

        .genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{

            border: 0 none;

        }

        .genealogy-tree li:last-child::before{

            border-right: 2px solid #ccc;

            border-radius: 0 5px 0 0;

            -webkit-border-radius: 0 5px 0 0;

            -moz-border-radius: 0 5px 0 0;

        }

        .genealogy-tree li:first-child::after{

            border-radius: 5px 0 0 0;

            -webkit-border-radius: 5px 0 0 0;

            -moz-border-radius: 5px 0 0 0;

        }

        .genealogy-tree ul ul::before{

            content: '';

            position: absolute; top: 0; left: 50%;

            border-left: 2px solid #ccc;

            width: 0; height: 20px;

        }

        .genealogy-tree li a{

            text-decoration: none;

            color: #666;

            font-family: arial, verdana, tahoma;

            font-size: 11px;

            display: inline-block;

            border-radius: 5px;

            -webkit-border-radius: 5px;

            -moz-border-radius: 5px;

        }



        .genealogy-tree li a:hover+ul li::after,

        .genealogy-tree li a:hover+ul li::before,

        .genealogy-tree li a:hover+ul::before,

        .genealogy-tree li a:hover+ul ul::before{

            border-color:  #fbba00;

        }



        /*--------------memeber-card-design----------*/

        .member-view-box{

            padding:0px 20px;

            text-align: center;

            border-radius: 4px;

            position: relative;

        }

        .member-image{

            width: 60px;

            position: relative;

        }

        .member-image img{

            width: 60px;

            height: 60px;

            border-radius: 6px;

            background-color :#000;

            z-index: 1;

        }



        .member-details span {

            font-size: .81rem;

            font-weight: bolder;

            margin-left: -1rem;

        }

    </style>

@endsection



@section('content')



    <!-- main body area -->

    <div class="card">

        <div class="card-header border-lg-dashed-bottom">
            <div class="card-title">
                Safety Committee Chart
            </div>
        </div>

        <div class="card-body">
            <div class="body genealogy-body genealogy-scroll">

                <div class="genealogy-tree">

                    <ul>

                        <li>

                            <a href="javascript:void(0);">

                                <div class="member-view-box">

                                    @foreach($chairman as $list)

                                        <div class="member-image">

                                            <img src="{{ asset('uploads/l_employees/'.$list->em_profile) }}" alt="Member">

                                            <div class="member-details">

                                                <span>{{ $list->em_name }}</span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </a>

                            <ul class="active">

                                <li>

                                    <a href="javascript:void(0);">

                                        <div class="member-view-box">

                                            <div class="member-image">

                                                {{--                                            <img src="{{ asset('uploads/l_employees/'.$list->em_profile) }}" alt="Member">--}}

                                                <div class="member-details">

                                                    <span>SECRETARY</span>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <ul >

                                        @foreach($secretary as $sec_list)

                                            <li>

                                                <a href="javascript:void(0);">

                                                    <div class="member-view-box">

                                                        <div class="member-image">

                                                            <img src="{{ asset('uploads/l_employees/'.$sec_list->em_profile) }}" alt="Member">

                                                            <div class="member-details">

                                                                <span>{{ $sec_list->em_name }}</span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </a>

                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                                <li>

                                    <a href="javascript:void(0);">

                                        <div class="member-view-box">

                                            <div class="member-image">

                                                {{--                                            <img src="{{ asset('uploads/l_employees/'.$list->em_profile) }}" alt="Member">--}}

                                                <div class="member-details">

                                                    <span class="text-wrap" style="font-size: 10px">EMPLOYEE REPRESENTATIVE</span>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <ul >

                                        @foreach($employee_representative as $emRep_list)

                                            <li>

                                                <a href="javascript:void(0);">

                                                    <div class="member-view-box">

                                                        <div class="member-image">

                                                            <img src="{{ asset('uploads/l_employees/'.$emRep_list->em_profile) }}" alt="Member">

                                                            <div class="member-details">

                                                                <span>{{ $emRep_list->em_name }}</span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </a>

                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                                <li>

                                    <a href="javascript:void(0);">

                                        <div class="member-view-box">

                                            <div class="member-image">

                                                {{--                                            <img src="{{ asset('uploads/l_employees/'.$list->em_profile) }}" alt="Member">--}}

                                                <div class="member-details">

                                                    <span class="text-wrap" style="font-size: 10px">MANAGEMENT/EMPLOYER REPRESENTATIVE</span>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <ul >

                                        @foreach($management_representative as $manRep_list)

                                            <li>

                                                <a href="javascript:void(0);">

                                                    <div class="member-view-box">

                                                        <div class="member-image">

                                                            <img src="{{ asset('uploads/l_employees/'.$manRep_list->em_profile) }}" alt="Member">

                                                            <div class="member-details">

                                                                <span>{{ $manRep_list->em_name }}</span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </a>

                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>

            </div>
        </div>

    </div>





@endsection



@section('javascript')

  <script type="text/javascript">

      $(function () {

          $('.genealogy-tree ul').hide();

          $('.genealogy-tree>ul').show();

          $('.genealogy-tree ul.active').show();

          $('.genealogy-tree li').on('click', function (e) {

              var children = $(this).find('> ul');

              if (children.is(":visible")) children.hide('fast').removeClass('active');

              else children.show('fast').addClass('active');

              e.stopPropagation();

          });

      });

  $(document).ready(function(){

  });

  </script>

  @endsection



