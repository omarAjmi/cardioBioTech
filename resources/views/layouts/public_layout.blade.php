<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Evento -Event Html Template">
    <meta name="keywords" content="Evento , Event , Html, Template">
    <meta name="author" content="ColorLib">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title>Welcome</title>    
    @include('public.partials.styles.indexst')

</head>
<body>
    {{--<div class="loader">--}}
        {{--<div class="loader-outter"></div>--}}
        {{--<div class="loader-inner"></div>--}}
    {{--</div>--}}
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

                                <form class="login100-form validate-form" id="login_form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <span class="login100-form-title">
                                        Se Connecter
                                    </span>

                                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                        <input class="input100 {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                                        <input class="input100" type="password" name="password" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn" type="submit">
                                            Login
                                        </button>
                                    </div>

                                    <div class="text-center p-t-12">
                                        <span class="txt1">
                                            Forgot
                                        </span>
                                        <a class="txt2" href="#">
                                            Username / Password?
                                        </a>
                                    </div>

                                    <div class="text-center p-t-136">
                                        <a class="txt2" id="create" href="#">
                                            Create your Account
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>

                                <div class="login100-pic js-tilt" id="register-pic" data-tilt style="display:none;margin-left: 5%">
                                    <img src="/img/signup.png" width="90%" height="90%" alt="IMG">
                                </div>
                                <form class="login100-form validate-form" id="register_form" style="display:none" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <span class="login100-form-title">
                                        Member register
                                    </span>

                                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                        <input class="input100" type="email" name="email" placeholder="Email"  value="{{ old('email') }}" >
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </div>



                                    <div class="wrap-input100 validate-input" data-validate="First name is required">
                                        <input class="input100" type="text" name="first_name" placeholder="first name" value="{{ old('first_name') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate="Last name is required">
                                        <input class="input100" type="text" name="last_name" placeholder="first name" value="{{ old('last_name') }}">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                                        <input class="input100" type="password" name="password" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                                        <input class="input100" type="password" name="password_confirmation" placeholder="Password">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    <div class="container-login100-form-btn">
                                        <button class="login100-form-btn" type="submit">
                                            Register
                                        </button>
                                    </div>

                                    <div class="text-center p-t-12">
                                        <span class="txt1">
                                            Forgot
                                        </span>
                                        <a class="txt2" href="#">
                                            Username / Password?
                                        </a>
                                    </div>

                                    <div class="text-center p-t-136">
                                        <a class="txt2" id="create2" href="#">
                                            back to login
                                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @include('public.partials.scripts.indexjs')
</body>
</html>
