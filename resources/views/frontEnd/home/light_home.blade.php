@extends('frontEnd.home.front_master')

@push('css')
    <link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css"/>
@endpush

@section('main_content')
<?php
    $css= "background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(".url($homePage->image).") no-repeat center;    background-size: cover;";
?>

 <style type="text/css">
     .client .events-item .card .card-body .date {
        max-width: 90px !important; 
     }
 </style>

  @if(isset($per["Image Banner"]))
    <!--================ Home Banner Area =================-->
    <section class="container box-1420">
        <div class="home-banner-area" style="{{$css}}">
            <div class="banner-inner">
                <div class="banner-content">
                    <h5>{{$homePage->title}}</h5>
                    <h2>{{$homePage->long_title}}</h2>
                    <p>{{$homePage->short_description}}</p>
                    <a class="primary-btn fix-gr-bg semi-large" href="{{$homePage->link_url}}">{{$homePage->link_label}}</a>
                </div>
            </div>
        </div>
    </section>
    @endif


    <!--================ End Home Banner Area =================-->

   

    <!--================ Product Area =================-->
    <section class="events-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <h3 class="title">Upcoming Events</h3>
                        </div>
                        <div class="col-lg-6 col-md-5 text-md-right text-left mb-30-lg">
                            <a href="#" class="primary-btn small fix-gr-bg">Browse All</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--================ End Products Area =================-->


@endsection
