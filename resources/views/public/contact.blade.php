@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" style="background: url(/img/bg/img.png)">
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
          
            <div class="row justify-content-center mt100">
                <div class="col-md-6 col-12">
                    <div class="contact_info">
                        <h5>
                            CardioBioTec is here for you
                        </h5>
                        <p>
                           
                            L’Association Médicale CARDIOBIOTEC du Tunisie , a été créée en 7 avril 2013 à l’initiative d’un groupe de médecins de différentes disciplines.
                            <br> <span><b>Contacter nous:</b> </span> 
                        </p><br>
                       <ul style="list-style: none;">
                           <li><i class="fa fa-phone-square" style="color: #005792"></i> (+216)73.10.60.69 / (+216)92.00.44.66</li>
                           <li><i class="fa fa-envelope" style="color: #005792"></i> cardiobiotec@yahoo.fr</li>
                           <li><i class="fa fa-facebook" style="color: #005792"></i> <a href="https://www.facebook.com/pg/Cardiobiotech"> page facebook cardiobiotec</a></li>
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
              
            </div>    
        </div>
    </section>
    <!--contact section end -->
    @include('public.partials.subscribe')   
@endsection