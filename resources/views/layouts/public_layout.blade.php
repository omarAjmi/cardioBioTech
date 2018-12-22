<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta name="Description" CONTENT="Association de Médecine et de Biotechnologie. Siège Faculté de Médecine Monastir.">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34="/>
    <!-- ========== Title ========== -->
    <title>
        @if(empty($title))
            Association de Médecine et de Biotechnologie. Siège Faculté de Médecine Monastir.
        @else
            {{ $title }}
        @endif
    </title>
    @include('public.partials.styles.indexst')

</head>
<body>
    @include('public.partials.header')
    @yield('content')
    @include('public.partials.footer')
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
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label for="remember">Se souvenir de moi</label>
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
                                        <a class="txt2" href="{{ route('password.request') }}">
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
    @include('public.partials.scripts.indexjs')
</body>
</html>
