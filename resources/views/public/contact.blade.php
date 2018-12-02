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
                            Association de Médecine et de Biotechnologie
                        </h5>
                        <p>

                            Association de Médecine et de Biotechnologie. Siège Faculté de Médecine Monastir , a été créée en 7 avril 2013 à l’initiative d’un groupe de médecins de différentes disciplines.
                            <br> <span><b>Contacter nous:</b> </span> 
                        </p><br>
                       <ul class="list-contact" style="list-style: none;">
                           <li><i class="fa fa-phone-square" style="color: #005792"></i> &nbsp;(+216)73.10.60.69 / (+216)92.00.44.66</li>
                           <li><a style="color:#005792;" href="mailto:cardiobiotec@yahoo.fr"><i class="fa fa-envelope" style="color: #005792"></i> &nbsp;cardiobiotec@yahoo.fr</a></li>
                           <li><i class="fa fa-facebook" style="color: #005792"></i> <a style="color:#005792;" href="https://www.facebook.com/pg/Cardiobiotech"> &nbsp;page facebook cardiobiotec</a></li>
                       </ul>
    
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="contact_form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nom et prénom">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Adresse email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Sujet">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" cols="4" rows="4" placeholder="Massage"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-rounded btn-primary">Envoyer</button>
                        </div>
                    </div>
                </div>
              
            </div>    
        </div>
    </section>
    <!--contact section end -->
    @include('public.partials.subscribe')   
@endsection