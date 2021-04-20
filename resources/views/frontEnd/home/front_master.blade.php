<style>
    .footer-list ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 50px;
    }
    .footer-list ul li{
        display: block;
        margin-bottom: 10px;
        cursor: pointer;
    }
    .f_title {
        margin-bottom: 40px;
    }
    .f_title h4{
        color: #415094;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 0px;
    }
</style>

<?php
    $links = App\SmCustomLink::find(1);

    $social_icons = App\SmSocialMediaIcon::where('status', 1)->get();

    $setting = App\SmGeneralSettings::find(1);
    if (isset($setting->copyright_text)) {
        $copyright_text = $setting->copyright_text;
    } else {
        $copyright_text = 'Copyright © 2020All rights reserved ';
    }
    if (isset($setting->logo)) {
        $logo = $setting->logo;
    } else {
        $logo = 'public/uploads/settings/logo.png';
    }
    if (isset($setting->site_title) && !empty($setting->site_title)) {
        $site_title = $setting->site_title;
    } else {
        $site_title = 'AlphaHub Edu ERP';
    }

    if (isset($setting->favicon)) {
        $favicon = $setting->favicon;
    } else {
        $favicon = 'public/backEnd/img/favicon.png';
    }


    $permisions = App\SmFrontendPersmission::where([['parent_id', 1], ['is_published', 1]])->get();
    $per = [];
    foreach ($permisions as $permision) {
        $per[$permision->name] = 1;
    }

    $ttl_rtl = $setting->ttl_rtl;
    $active_style = App\SmStyle::where('is_active', 1)->first();
?>

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if(isset ($ttl_rtl ) && $ttl_rtl ==1) dir="rtl" class="rtl" @endif >

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="AlphaHub - we bring learning to people!!"/>
    <link rel="icon" href="{{asset($favicon)}}" type="image/png"/>
    <title>{{ isset($page_title)? $page_title:$site_title }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- Bootstrap CSS -->
    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/bootstrap.min.css"/>
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap.css"/>
    @endif


    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/jquery-ui.css"/>


    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/owl.carousel.min.css"/>
    <!-- main css -->


    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/style.css"/>
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/{{@$active_style->path_main_style}}"/>
    @endif

    {{-- <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/toastr.min.css" /> --}}
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.min.css">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.print.css">


    <link rel="stylesheet" href="{{asset('public/')}}/frontend/css/AlphaHub.css"/>
    @stack('css')
</head>

<body class="client light">

<!--================ Start Header Menu Area =================-->
<header class="header-area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box-1420">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand" href="{{url('/')}}/home">
                    <img class="w-75" src="{{asset($logo)}}" alt="AlphaHub Logo" style="max-width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        @if(App\SmGeneralSettings::isModule('Saas')== FALSE)
                            <li class="nav-item  {{Request::path() == '/' ||  Request::path() == 'home'? 'active':''}} "><a
                                        class="nav-link" href="{{url('/')}}/home">Home</a></li>
                            <li class="nav-item {{Request::path() == 'about'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/about">About</a>
                       </li>
                            <!--<li class="nav-item {{Request::path() == 'course'? 'active':''}}"><a class="nav-link"-->
                            <!--                                                                    href="{{url('/')}}/course">Course</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item {{Request::path() == 'news-page'? 'active':''}}"><a class="nav-link"-->
                            <!--                                                                        href="{{url('/')}}/news-page">News</a>-->
                            <!--</li>-->
                            <li class="nav-item {{Request::path() == 'contact'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/contact">Contact</a>
                            </li>
                            @if (Auth::user() =="")
                            <li class="nav-item {{Request::path() == 'login'? 'active':''}}"><a class="nav-link"
                                                                                                href="{{url('/')}}/login">Login</a>
                            </li>
                            @endif

                            @if(App\SmGeneralSettings::isModule('ParentRegistration')== TRUE)
                                @php $is_registration_permission = DB::table('sm_registration_settings')->where('registration_permission',1)->first(); @endphp 
                                @if($is_registration_permission && $is_registration_permission->position==1)
                                    <li class="nav-item"><a class="nav-link"   href="{{url('/parentregistration/registration')}}">Student Registration</a></li>
                                @endif
                            @endif
                            @else

                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('/login')}}" target="_blank" >Demo</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Support">Support</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Price">Price</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="{{url('/')}}#Contact">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/login')}}" target="_blank" >LOGIN</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/parentregistration/registration')}}" target="_blank" >Student Signup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/institution-register-new')}}" target="_blank" >School Signup</a>
                                </li>
                        @endif

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav mr-auto search-bar">
                            <li class="">
                            </li>
                        </ul>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->
@yield('main_content')

<!--================Footer Area =================-->
<footer class="footer_area section-gap-top">
    <div class="container">
        <div class="row footer_inner">

            @php
                                $custom_link=App\SmCustomLink::find(1);
                            @endphp
                            @if ($custom_link!='')
                                
                            
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="f_title">
                                    <h4>{{ $custom_link->title1 }}</h4>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                                @if(App\SmGeneralSettings::isModule('ParentRegistration')== TRUE)
                                                    @php $is_registration_permission = DB::table('sm_registration_settings')->where('registration_permission',1)->first(); @endphp 
                                                    @if($is_registration_permission && $is_registration_permission->position==2)
                                                        <li><a  href="{{url('/parentregistration/registration')}}">Student Registration</a></li>
                                                    @endif
                                                @endif
                                                @if ($custom_link->link_href1!='')
                                                  <li><a href="{{ $custom_link->link_href1 }}">{{ $custom_link->link_label1 }} </a></li>
                                                  
                                                @endif
                                                @if ($custom_link->link_href5!='')
                                                <li><a href="{{ $custom_link->link_href5 }}">{{ $custom_link->link_label5 }}</a></li>
                                                @endif
                                                @if ($custom_link->link_href9!='')
                                                    <li><a href="{{ $custom_link->link_href9 }}">{{ $custom_link->link_label9 }}</a></li>
                                                
                                                @endif
                                                @if ($custom_link->link_href13!='')
                                                      <li><a href="{{ $custom_link->link_href13 }}">{{ $custom_link->link_label13 }} </a></li>
                                                @endif
                                               
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="f_title">
                                        <h4>{{ $custom_link->title2 }}</h4>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
c

                                                    @if ($custom_link->link_href2!='')
                                                    <li><a href="{{ $custom_link->link_href2}}">{{ $custom_link->link_label2}}</a></li>
                                                
                                                @endif
                                                @if ($custom_link->link_href6!='')
                                                <li><a href="{{ url($custom_link->link_href6) }}">{{ $custom_link->link_label6 }}</a></li>
                                      
                                                @endif
                                                @if ($custom_link->link_href10!='')
                                                <li><a href="{{ $custom_link->link_href10 }}">{{ $custom_link->link_label10 }}</a></li>
                                      
                                                @endif
                                                @if ($custom_link->link_href14!='')
                                                <li><a href="{{ $custom_link->link_href14 }}">{{ $custom_link->link_label14 }}</a></li>
                                           
                                               @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="f_title">
                                        <h4>{{ $custom_link->title3 }}</h4>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                             @if ($custom_link->link_href3!='')
                                                    <li><a href="{{ $custom_link->link_href3}}">{{ $custom_link->link_label3}}</a></li>
                                               @endif
                                                    @if ($custom_link->link_href7!='')
                                                        <li><a href="{{ $custom_link->link_href7 }}">{{ $custom_link->link_label7 }}</a></li>
                                                    @endif
                                                    @if ($custom_link->link_href11!='')
                                                        <li><a href="{{ $custom_link->link_href11 }}">{{ $custom_link->link_label11 }}</a></li>
                                                    @endif
                                                    @if ($custom_link->link_href15!='')
                                                        <li><a href="{{ $custom_link->link_href15 }}">{{ $custom_link->link_label15 }}</a></li>
                                                    @endif
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget">
                                    <div class="f_title">
                                        <h4>{{ $custom_link->title4 }}</h4>
                                    </div>
                                    <div class="footer-list">
                                        <nav>
                                            <ul>
                                             @if ($custom_link->link_href4!='')
                                                    <li><a href="{{ $custom_link->link_href4}}">{{ $custom_link->link_label4}}</a></li>
                                               @endif
                                                    @if ($custom_link->link_href8!='')
                                                        <li><a href="{{ $custom_link->link_href8 }}">{{ $custom_link->link_label8 }}</a></li>
                                                    @endif
                                                    @if ($custom_link->link_href12!='')
                                                        <li><a href="{{ $custom_link->link_href12 }}">{{ $custom_link->link_label12 }}</a></li>
                                                    @endif
                                                    @if ($custom_link->link_href16!='')
                                                        <li><a href="{{ $custom_link->link_href16 }}">{{ $custom_link->link_label16 }}</a></li>
                                                    @endif
                                               
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            @endif
            

            {{-- @if(isset($per["Custom Links"]))
                @php
                    $url[1]=[1,2,3,4];
                    $url[2]=[5,6,7,8];
                    $url[3]=[9,10,11,12];
                    $url[4]=[13,14,15,16];
                    for($i=1; $i<=4; $i++){
                     $title ='title'.$i ;
                @endphp
                <div class="col-lg-3 col-sm-6">
                    <aside class="f_widget ab_widget">
                        <div class="f_title">
                            <h4>{{$links!=""?$links->$title:''}}</h4>
                        </div>
                        <ul>
                            @php
                                foreach($url[$i] as $j){
                                    $link_label ='link_label'.$j ;
                                    $link_href ='link_href'.$j ;
                            @endphp
                            <li>
                                <a href="{{$links !="" ? $links->$link_href:''}}"
                                   style="color: #828bb2"> {{$links !="" ? $links->$link_label:''}} </a>
                            </li>
                            @php } @endphp
                        </ul>
                    </aside>
                </div>
                @php } @endphp
            @endif --}}

        </div>
        <div class="row single-footer-widget">
            <div class="col-lg-8 col-md-9">
                <div class="copy_right_text">
                    <p>{!! $copyright_text !!}</p>
                </div>
            </div>

            @if(isset($per["Social Icons"]))
                <div class="col-lg-4 col-md-3">
                    <div class="social_widget">

                        @foreach($social_icons as $social_icon)
                            @if (@$social_icon->url != "")
                                <a href="{{@$social_icon->url}}"><i class="{{$social_icon->icon}}"></i></a>
                            @endif
                        @endforeach
                        

                        {{-- <a href="{{@$links->facebook_url}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{@$links->twitter_url}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{@$links->dribble_url}}"><i class="fa fa-dribbble"></i></a>
                        <a href="{{@$links->linkedin_url}}"><i class="fa fa-linkedin"></i></a> --}}


                    </div>
                </div>
            @endif
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<script src="{{asset('public/backEnd/')}}/vendors/js/jquery-3.2.1.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/jquery-ui.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/popper.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/bootstrap.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/nice-select.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/jquery.magnific-popup.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/raphael-min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/morris.min.js">
</script>
<script src="{{asset('public/backEnd/')}}/vendors/js/owl.carousel.min.js"></script>
{{-- <script src="{{asset('public/backEnd/')}}/vendors/js/toastr.min.js"></script> --}}
<script src="{{asset('public/backEnd/')}}/vendors/js/moment.min.js"></script>
<script src="{{asset('public/backEnd/')}}/vendors/js/print/bootstrap-datetimepicker.min.js"></script>
<script src="{{asset('public/backEnd/')}}/vendors/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="{{asset('public/backEnd/')}}/js/gmap3.min.js"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwzmSafhk_bBIdIy7MjwVIAVU1MgUmXY4"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDs3mrTgrYd6_hJS50x4Sha1lPtS2T-_JA"></script>
<script src="{{asset('public/backEnd/')}}/js/main.js"></script>
<script src="{{asset('public/backEnd/')}}/js/custom.js"></script>
<script src="{{asset('public/backEnd/')}}/js/developer.js"></script>

@yield('script')

</body>
</html>

