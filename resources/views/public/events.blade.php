@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="img/bg/bg-img.png">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="inner_cover_content">
                        <h3>
                            Events
                        </h3>
                    </div>
                </div>
            </div>
    
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('welcome') }}">Home</a> | </li>
                    <li><span>Events</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!--page title section end-->
    
    <div id="galery" style="margin-top: 5%">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- galery owl -->
                <div id="galery-owl" class="owl-carousel owl-theme">
                    <!-- galery item -->
                    <div class="galery-item">
                        <img src="img/bg/galery01.jpg" alt="">
                    </div>
                    <!-- /galery item -->

                    <!-- galery item -->
                    <div class="galery-item ">
                        <video width="800px" height="500px" controls poster="img/giphy.gif">
                            <source width="1800px" height="400px" src="../home/xenomium/Videos/Pluralsight/JavaScript route/01-JavaScript_Getting Started/01-Course Overview.mp4" type="video/mp4" />
                        </video>
                    </div>
                    <!-- /galery item -->
    
                    <!-- galery item -->
                    <div class="galery-item">
                        <img src="img/bg/galery03.jpg" alt="">
                    </div>
                    <!-- /galery item -->
    
                </div>
                <!-- /galery owl -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!--events section -->
    <section class="pt100 pb100">
        <div class="container">
            <!--Carousel Wrapper-->
            <div class="event_info">
                <div class="event_title">
                    Los Angeles Event
                </div>
                <div class="speakers">
                    <strong>Speakers</strong>
                    <span>Maria Smith, Gabriel Hernandez, Michael Williams</span>
                </div>
                <div class="event_date">
                    February 14, 2018
                </div>
            </div>
            <div class="event_word">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus.
                        Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque
                        convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus
                        lectus, at volutpat ligula euismod.
                    </div>
                    <div class="col-md-6 col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus.
                        Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque
                        convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus
                        lectus, at volutpat ligula euismod.
                    </div>
                </div>
            </div>
            <a href="#" class="readmore_btn">read more</a>
        </div>
    </section>
    <!--event section end -->
    @include('public.partials.subscribe')   
@endsection