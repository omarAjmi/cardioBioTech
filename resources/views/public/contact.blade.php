@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="/img/bg/bg-img.png">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="inner_cover_content">
                        <h3>
                            Contactez nous
                        </h3>
                    </div>
                </div>
            </div>
    
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('welcome') }}">Acceuil</a> | </li>
                    <li><span>Contact</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!--page title section end-->
    
    
    <!--contact section -->
    <section class="pt100 pb100">
        <div class="container">
            <img src="/img/logo-dark.png" alt="evento">
            <div class="row justify-content-center mt100">
                <div class="col-md-6 col-12">
                    <div class="contact_info">
                        <h5>
                            Evento is here for you
                        </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus.
                            Integer iaculis in lacus a sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque
                            convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus
                            lectus, at volutpat ligula euismod.
                        </p>
                        <ul class="social_list">
                            <li>
                                <a href="#"><i class="ion-social-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>
    
                        <ul class="icon_list pt50">
                            <li>
                                <i class="ion-location"></i>
                                <span>
                                    Rosia Road , No234/56<br />
                                    Gibraltar , UK
                                </span>
                            </li>
                            <li>
                                <i class="ion-ios-telephone"></i>
                                <span>
                                    +5463 834 53 2245
                                </span>
                            </li>
                            <li>
                                <i class="ion-email-unread"></i>
                                <span>
                                    contact@evento.com
                                </span>
                            </li>
    
                            <li>
                                <i class="ion-planet"></i>
                                <span>
                                    www.colorlib.com
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="contact_form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" cols="4" rows="4" placeholder="massage"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-rounded btn-primary">send massage</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt70">
                    <!--map -->
                    <div id="map" data-lon="24.036176" data-lat="57.039986" class="map"></div>
                    <!--map end-->
                </div>
            </div>    
        </div>
    </section>
    <!--contact section end -->
    @include('public.partials.subscribe')   
@endsection