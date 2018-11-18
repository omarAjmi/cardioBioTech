<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>Cardio Bio Tech - Association Madicale Tunisienne</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.css">
    
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/ionicons.min.css">

    <link rel="stylesheet" href="/css/font-awesome.min.css">


    <link href="/css/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/hamburgers.min.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/icomoon.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>

  <!--header start here -->
  <header class="header navbar fixed-top navbar-expand-md">
      <div class="container">
          <a class="navbar-brand logo" href="{{ route('welcome') }}">
              <img src="/img/logo-white.png" alt="Cardio" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false"
                  aria-label="Toggle navigation">
              <span class="lnr lnr-text-align-right"></span>
          </button>
          <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
              <ul class=" nav navbar-nav menu">
                  <li class="nav-item">
                      <a class="nav-link active" href="{{ route('welcome') }}">Accueil</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link " href="{{ route('current') }}">Nouveautés</a>
                  </li>
                  <li class="nav-item">
                      <div class="dropdown">
                          @if ($events->isNotEmpty())
                              <a class="nav-link " href="{{ route('event', [$events->first()->id]) }} ">Évènements</a>
                          @else
                              <a class="nav-link " href="#">Évènements</a>
                          @endif
                          <div class="dropdown-content">
                              @foreach ($events as $event)
                                  <a href="{{ route('event', [$event->id]) }}">{{ $event->abbreviation }}</a>
                              @endforeach
                          </div>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link " href="{{ route('contact') }}">Contactez nous</a>
                  </li>
                  @if (Auth::check())
                      <li class="nav-item">
                          <div class="dropdown">
                              <a class="nav-link " href="events.html"><b>{{ Auth::user()->getFullName() }}</b>
                                  <img src="/storage{{ Auth::user()->photo }}" alt=" logo" style="height: 30px;width: 30px;border-radius: 50%;">
                              </a>
                              <div class="dropdown-content">
                                  <a href="{{ route('profile', Auth::id()) }}">profile</a>
                                  @if (Auth::user()->admin)
                                      <a href="{{ route('admin') }}">Site Admin</a>
                                  @endif
                                  <a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                      Se Déconnecter
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </div>
                      </li>
                  @else
                      <li class="nav-item">
                          <a class="nav-link " href="#" data-toggle="modal" data-target="#myModal">Se connecter</a>
                      </li>
                  @endif
              </ul>
          </div>
      </div>
  </header>

<!--header end here-->

<!--cover section slider -->
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background: url('/img/bg/background01.jpg');">
             <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                             L’Association Médicale CARDIOBIOTEC du Tunisie
                            </h2>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_item" style="background: url('/img/bg/background02.jpg');">
              <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                             L’Association Médicale CARDIOBIOTEC du Tunisie
                            </h2>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cover_item" style="background: url('/img/bg/galery02.jpg');">
              <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <h2 class="cover-title">
                             L’Association Médicale CARDIOBIOTEC du Tunisie
                            </h2>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cover_nav">
        <ul class="cover_dots">
            <li class="active" data="0"><span>1</span></li>
            <li  data="1"><span>2</span></li>
            <li  data="2"><span>3</span></li>
        </ul>
    </div>
</section>
<!--cover section slider end -->

    <section class="ftco-services">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4  nav-link-wrap" >
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
              <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true" style="background: #167ce9;"><span class="mr-3 flaticon-cardiogram"></span> CARDIOBIOTEC </a>
              <img src="/img/card.png" style="width: 100%;height: 100%">
             
            </div>
          </div>
          <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content" id="v-pills-tabContent" style="">

              <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                <span class="icon mb-3  flaticon-cardiogram row"><h2 class="mb-4" style="padding-top:5%;padding-left: 5%">CARDIOBIOTEC </h2></span>
                
                <p>L’Association Médicale CARDIOBIOTEC du Tunisie , a été créée en 7 avril 2013  à l’initiative d’un groupe de médecins de différentes disciplines.</p>
                <p>
                  <b>OBJECTIFS</b><br>

                    Développer et avancer la recherche dans le domaine de l’éthique médicale.
                   <br> Assurer la formation médicale continue (FMC).
                     <br> Nouer des relations dans le milieu de la formation médicale.
                     <br> Défendre l’honneur et les règles des métiers d’ordre médical ainsi que les droits de l’Homme.
                    
                </p>
               <p>
                 <b>ACTIVITÉS ET RÉALISATIONS</b><br>

                    Participation et organisation de Congrès Médicaux à l’échelle nationale et internationale.
                     <br> 
                    Organisation de séminaires et colloques régionaux et nationaux de Formation Médicale Continue (FMC).
                   
               </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section-2 img" style="background-image: url(/img/bg_3.jpg);">
        <div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>

                                </div>

                                <h2><i class="fa fa-envelope" ></i> Adresse mail</h2>
                                <h6>cardiobiotec@yahoo.fr</h6>
                            </a>
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2><i class="fa fa-phone"></i> Telephone</h2>
                                <h6>(+216)73.10.60.69</h6>
                                <h6>(+216)92.00.44.66</h6>
                            </a>
                            <a href="https://www.facebook.com/pg/Cardiobiotech/about/?ref=page_internal" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2><i class="fa fa-facebook"></i> Page Facebook </h2>
                                <h6>Cardiobiotec</h6>
                            </a>
                            <a href="https://m.me/Cardiobiotech" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2><img src="/img/messenger.png"> Messanger</h2>
                                <h6>contacter nous on messanger</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Experienced Doctors</h2>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="block-2">
                <div class="flipper">
                  <div class="front" style="background-image: url(/img/doctor-1.jpg);">
                    <div class="box">
                      <h2>Aldin Powell</h2>
                      <p>Neurologist</p>
                    </div>
                  </div>
                  <div class="back">
                    <!-- back content -->
                    <blockquote>
                      <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex">
                      <div class="image mr-3 align-self-center">
                        <div class="img" style="background-image: url(/img/doctor-1.jpg);"></div>
                      </div>
                      <div class="name align-self-center">Aldin Powell <span class="position">Neurologist</span></div>
                    </div>
                  </div>
                </div>
              </div> <!-- .flip-container -->
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="block-2">
                <div class="flipper">
                  <div class="front" style="background-image: url(/img/doctor-2.jpg);">
                    <div class="box">
                      <h2>Aldin Powell</h2>
                      <p>Pediatrician</p>
                    </div>
                  </div>
                  <div class="back">
                    <!-- back content -->
                    <blockquote>
                      <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex">
                      <div class="image mr-3 align-self-center">
                        <div class="img" style="background-image: url(/img/doctor-2.jpg);"></div>
                      </div>
                      <div class="name align-self-center">Aldin Powell <span class="position">Pediatrician</span></div>
                    </div>
                  </div>
                </div>
              </div> <!-- .flip-container -->
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="block-2">
                <div class="flipper">
                  <div class="front" style="background-image: url(img/doctor-3.jpg);">
                    <div class="box">
                      <h2>Aldin Powell</h2>
                      <p>Ophthalmologist</p>
                    </div>
                  </div>
                  <div class="back">
                    <!-- back content -->
                    <blockquote>
                      <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex">
                      <div class="image mr-3 align-self-center">
                        <div class="img" style="background-image: url(img/doctor-3.jpg);"></div>
                      </div>
                      <div class="name align-self-center">Aldin Powell <span class="position">Ophthalmologist</span></div>
                    </div>
                  </div>
                </div>
              </div> <!-- .flip-container -->
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="block-2">
                <div class="flipper">
                  <div class="front" style="background-image: url(img/doctor-4.jpg);">
                    <div class="box">
                      <h2>Aldin Powell</h2>
                      <p>Pulmonologist</p>
                    </div>
                  </div>
                  <div class="back">
                    <!-- back content -->
                    <blockquote>
                      <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex">
                      <div class="image mr-3 align-self-center">
                        <div class="img" style="background-image: url(img/doctor-4.jpg);"></div>
                      </div>
                      <div class="name align-self-center">Aldin Powell <span class="position">Pulmonologist</span></div>
                    </div>
                  </div>
                </div>
              </div> <!-- .flip-container -->
            </div>
        </div>
        </div>
    </section>



    
        
        <section class="ftco-section-parallax">
      <section class="bg-img pt70 pb70" style="background-image: url('/img/bg/img.png');">
    <div class="overlay_dark"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h4 class="mb30 text-center color-light">Compteur jusqu'au grand événement</h4>
                <div class="countdown"></div>
            </div>
        </div>
    </div>
</section>
    </section>

<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p>
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> Tous droits reservés | Cardio Bio Tech
                </p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu ">
                    <li>
                        <a href="{{ route('welcome') }}">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}#speakers">Comité</a>
                    </li>
                    <li>
                        @if ($events->isNotEmpty())
                            <a href="{{ route('event', [$events->first()->id]) }}">Événements</a>
                        @else
                            <a href="#">Événements</a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('current') }}">Nouveatés</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--footer end -->
<!-- modal static -->
    <div class="modal fade" id="outDatedModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Désolé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        {{ Session::get('outdated') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal static -->
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  
 <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center">Bienvenue</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100">
                                <div class="login100-pic js-tilt" id="log-pic" data-tilt>
                                    <img src="/img/img-01.png" alt="IMG">
                                </div>

                                <form class="login100-form validate-login-form" id="login_form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <span class="login100-form-title">
                                        Se Connecter
                                    </span>

                                    <div class="wrap-input100 validate-input lg-val"
                                        @if ($errors->has('email'))
                                            data-validate="Informations d'identification non trouvées"
                                        @else 
                                            data-validate="Un email valide est requis: ex@abc.xyz"
                                        @endif
                                    >
                                        <input class="input100 {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input lg-val"
                                        @if ($errors->has('email'))
                                            data-validate="Informations d'identification non trouvées"
                                        @else 
                                            data-validate="Mot de passe est requis"
                                        @endif
                                    >
                                        <input class="input100" type="password" name="password" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn lg-btn" type="submit">
                                            Se connecter
                                        </button>
                                    </div>

                                    <div class="text-center p-t-12">
                                        <span class="txt1">
                                            Oublié:
                                        </span>
                                        <a class="txt2" href="#">
                                            login / Mot de passe?
                                        </a>
                                    </div>

                                    <div class="text-center p-t-136">
                                        <a class="txt2" id="create" href="#">
                                            S'inscrire
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>

                                <div class="login100-pic js-tilt" id="register-pic" data-tilt style="display:none;margin-left: 5%">
                                    <img src="/img/img-01.png" alt="IMG">
                                </div>
                                <form class="login100-form validate-register-form" id="register_form" style="display:none" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <span class="login100-form-title">
                                        S'inscrire
                                    </span>
                                    <div class="wrap-input100 validate-input rg-val" 
                                        @if (Session::has('registerfail') and $errors->has('email'))
                                            data-validate="{{ $errors->first('email') }}"
                                        @else 
                                            data-validate="Un email valide est requis: ex@abc.xyz"
                                        @endif
                                    >
                                        <input class="input100" type="email" name="email" placeholder="Email"  value="{{ old('email') }}" >
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input rg-val"
                                        @if (Session::has('registerfail') and $errors->has('last_name'))
                                            data-validate="{{ $errors->first('last_name') }}"
                                        @else 
                                            data-validate="Nom est requis"
                                        @endif
                                    >
                                        <input class="input100" type="text" name="last_name" placeholder="Nom" value="{{ old('last_name') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>



                                    <div class="wrap-input100 validate-input rg-val"
                                        @if (Session::has('registerfail') and $errors->has('first_name'))
                                            data-validate="{{ $errors->first('first_name') }}"
                                        @else 
                                            data-validate="Prénom est requis"
                                        @endif
                                    >
                                        <input class="input100" type="text" name="first_name" placeholder="Prénom" value="{{ old('first_name') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input rg-val"
                                        @if (Session::has('registerfail') and $errors->has('password'))
                                            data-validate="{{ $errors->first('password') }}"
                                        @else 
                                            data-validate="Mot de passe est requis"
                                        @endif
                                    >
                                        <input class="input100" type="password" name="password" placeholder="Mot de passe">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input rg-val"
                                        @if (Session::has('registerfail') and $errors->has('password_confirmation'))
                                            data-validate="{{ $errors->first('password_confirmation') }}"
                                        @else 
                                            data-validate="Confirmer mot de passe"
                                        @endif
                                    >
                                        <input class="input100" type="password" name="password_confirmation" placeholder="Confirmer">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn rg-btn" type="submit">
                                            S'inscrire
                                        </button>
                                    </div>

                                    <div class="text-center p-t-136">
                                        <a class="txt2" id="create2" href="#">
                                            Se connecter
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


  
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <!--slick carousel -->
   <script src="/js/owl.carousel.min.js"></script>
   <script src="/js/wow.min.js"></script>
   <!--parallax -->

  <script src="/js/jquery.countdown.min.js"></script>  
  <script src="/js/jquery.counterup.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>
  <script src="/js/jquery.waypoints.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>

  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>

  <script src="/js/scrollax.min.js"></script>

  <script src="/js/main.js"></script>
    <script src="/js/login_signup.js"></script>

<!--===============================================================================================-->
    <script src="/js/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

  <script>
    $("#create").click(function () {
        $("#register_form").show();
        $("#login_form").hide();
        $("#log-pic").hide();
        $("#register-pic").show();
    });
    $("#create2").click(function () {
        $("#register_form").hide();
        $("#login_form").show();
        $("#log-pic").show();
        $("#register-pic").hide();
    });
    @if(Session::has('outdated'))
        $('document').ready(function () {
            $('#outDatedModal').modal('show');
        })
    @endif
    
</script>
@if(Session::has('registerfail'))
        @include('public.partials.scripts.registerValidation')
@elseif($errors->count() > 0)
    @include('public.partials.scripts.loginValidation')
@endif

<script src="/admin_site/vendor/animsition/animsition.min.js"></script>


<!-- Main JS-->
<script src="/admin_site/js/main.js"></script>
<script>
    var startDate = "@if($events->isNotEmpty()){!! $events->first()->start_date->toDateString() !!}-{!! $events->first()->start_date->toTimeString() !!}@else{!! now() !!}@endif"

</script>
<script src="/js/main2.js"></script>
  </body>
</html>
