@php $page_title="All about AlphaHub"; @endphp
@extends('frontEnd.home.front_master')
@push('css')
    <link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css"/>
@endpush
@section('main_content')

    <!--================ Home Banner Area =================-->
    <section class="container box-1420">
        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url({{$about->image != ""? $about->image : '../img/client/common-banner1.jpg'}}) no-repeat center;" >
            <div class="banner-inner">
                <div class="banner-content">
                    <h2>{{$about->title}}</h2>
                    <p>{{$about->description}}</p>
                    <a class="primary-btn fix-gr-bg semi-large" href="{{$about->button_url}}">{{$about->button_text}}</a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Facts Area =================-->
    <section class="fact-area section-gap">
        <div class="container">
            <div class="row">
   
                
                <div class="col-lg-4 mt-20-lg">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>Users</h3>
                                    <p class="mb-0">Total Users</p>
                                </div>
                                <h1 class="gradient-color2">
                                    @if(isset($totalUsers))
                                        {{count($totalUsers)}}
                                    @endif
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mt-20-lg">
                    <a href="#" class="d-block">
                        <div class="white-box single-summery">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>Faculty</h3>
                                    <p class="mb-0">Total Teachers count</p>
                                </div>
                                <h1 class="gradient-color2">
                                    @if(isset($totalTeachers))
                                        {{count($totalTeachers)}}
                                    @endif</h1>
                                </h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Facts Area =================-->

    
    <!--================ Start About Us Area =================-->
    <section class="info-area section-gap-bottom">
        <div class="container">				
            <div class="single-info row mt-40 align-items-center">
                <div class="col-lg-6 col-md-12 text-center pr-lg-0 info-left">
                    <div class="info-thumb">
                        <img src="{{asset($about->main_image)}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 pl-lg-0 info-rigth">
                    <div class="info-content">
                        <h2>{{$about->main_title}}</h2>
                        <p>
                            {{$about->main_description}}
                        </p>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Us Area =================-->

  @endsection

