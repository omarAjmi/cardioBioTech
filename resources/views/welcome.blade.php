{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
@extends('layouts.public_layout')
@section('content')
    <!--cover section slider -->
    <section id="home" class="home-cover">
        <div class="cover_slider owl-carousel owl-theme">
            <div class="cover_item" style="background: url('img/bg/background01.jpg');">
                <div class="slider_content">
                    <div class="slider-content-inner">
                        <div class="container">
                            <div class="slider-content-center">
                                <h2 class="cover-title">
                                    Prepare yourself for the
                                </h2>
                                <strong class="cover-xl-text">conference</strong>
                                <p class="cover-date">
                                    12-14 February 2018 - Los Angeles, CA.
                                </p>
                                <a href="#" class=" btn btn-primary btn-rounded">
                                    Buy Tickets Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cover_item" style="background: url('img/bg/background02.jpg');">
                <div class="slider_content">
                    <div class="slider-content-inner">
                        <div class="container">
                            <div class="slider-content-left">
                                <h2 class="cover-title">
                                    Prepare yourself for the
                                </h2>
                                <strong class="cover-xl-text">conference</strong>
                                <p class="cover-date">
                                    12-14 February 2018 - Los Angeles, CA.
                                </p>
                                <a href="#" class=" btn btn-primary btn-rounded">
                                    Buy Tickets Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cover_item" style="background: url('img/bg/galery02.jpg');">
                <div class="slider_content">
                    <div class="slider-content-inner">
                        <div class="container">
                            <div class="slider-content-center">
                                <h2 class="cover-title">
                                    Prepare yourself for the
                                </h2>
                                <strong class="cover-xl-text">conference</strong>
                                <p class="cover-date">
                                    12-14 February 2018 - Los Angeles, CA.
                                </p>
                                <a href="#" class=" btn btn-primary btn-rounded">
                                    Buy Tickets Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_nav">
            <ul class="cover_dots">
                <li class="active" data="0"><span>1</span></li>
                <li data="1"><span>2</span></li>
                <li data="2"><span>3</span></li>
            </ul>
        </div>
    </section>
    <!--cover section slider end -->
    
    <!--event info -->
    <section class="pt100 pb100">
    
        <div class="container">
            <h1 style="text-align: center;color: #005792">Conference OF Blah</h1>
            <div class="row justify-content-center">
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-calendar-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                DATE
                            </h5>
                            <p>
                                12-14 february 2018
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-location-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                location
                            </h5>
                            <p>
                                Los Angeles, CA.
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-person-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                speakers
                            </h5>
                            <p>
                                Natalie James
                                + guests
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-pricetag-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                tikets
                            </h5>
                            <p>
                                $65 early bird
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--event info end -->
    
    
    <!--event countdown -->
    <section class="bg-img pt70 pb70" style="background-image: url('img/bg/bg-img.png');">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h4 class="mb30 text-center color-light">Counter until the big event</h4>
                    <div class="countdown"></div>
                </div>
            </div>
        </div>
    </section>
    <!--event count down end-->
    
    
    <!--about the event -->
    <section class="pt100 pb100">
        <div class="container">
            <div class="section_title">
                <h3 class="title">
                    About the event
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a
                        sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor
                        id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula
                        euismod.
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <p>
                        In rhoncus massa nec sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque
                        convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus
                        lectus, at volutpat ligula euismod quis. Maecenas ornare, ex in malesuada tempus.
                    </p>
                </div>
            </div>
    
            <!--event features-->
            <div class="row justify-content-center mt30">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-mic"></i>
                        <div class="content">
                            <h4>9 Speakers</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-rocket"></i>
                        <div class="content">
                            <h4>8 hrs Marathon</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-bullhorn"></i>
                        <div class="content">
                            <h4>Live Broadcast</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-clock"></i>
                        <div class="content">
                            <h4>Early Bird</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--event features end-->
        </div>
    </section>
    <!--about the event end -->
    
    
    <!--speaker section-->
    <section class="pb100" id="speakers">
        <div class="container">
            <div class="section_title mb50">
                <h3 class="title">
                    our speakers
                </h3>
            </div>
        </div>
        <div class="row justify-content-center no-gutters">
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s1.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Patricia Stone</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s2.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">James Oliver</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s3.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Carla Banks</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s4.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">William Smith</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s5.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Jessica Black</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s6.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Patricia Stone</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s7.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Duncan Stan</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="img/speakers/s8.png" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">Patricia Stone</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--speaker section end -->
    
    
    <!--event calender-->
    <section class="pb100">
        <div class="container">
            <div class="table-responsive">
                <table class="event_calender table">
                    <thead class="event_title">
                        <tr>
                            <th>
                                <i class="ion-ios-calendar-outline"></i>
                                <span>next events calendar</span>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="img/cleander/c1.png" alt="event">
                            </td>
                            <td class="event_date">
                                14
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/cleander/c2.png" alt="event">
                            </td>
                            <td class="event_date">
                                18
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/cleander/c3.png" alt="event">
                            </td>
                            <td class="event_date">
                                22
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--event calender end -->
    
    <!--brands section -->
    <section class="bg-gray pt100 pb100">
        <div class="container">
            <div class="section_title mb50">
                <h3 class="title">
                    our partners
                </h3>
            </div>
            <div class="brand_carousel owl-carousel">
                <div class="brand_item text-center">
                    <img src="img/brands/b1.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="img/brands/b2.png" alt="brand">
                </div>
    
                <div class="brand_item text-center">
                    <img src="img/brands/b3.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="img/brands/b4.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="img/brands/b5.png" alt="brand">
                </div>
            </div>
        </div>
    </section>
    <!--brands section end-->
    
    <!--get tickets section -->
    <section class="bg-img pt100 pb100" style="background-image: url('img/bg/tickets.png');">
        <div class="container">
            <div class="section_title mb30">
                <h3 class="title color-light">
                    GEt your tikets
                </h3>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-9 text-md-left text-center color-light">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus.
                    Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat
                    ligula euismod.
                </div>
                <div class="col-md-3 text-md-right text-center">
                    <a href="#" class="btn btn-primary btn-rounded mt30">buy now</a>
                </div>
            </div>
        </div>
    </section>
    <!--get tickets section end-->    
@endsection
