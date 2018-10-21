<!--footer start -->
<footer>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 col-12">
                <div class="footer_box">
                    <div class="footer_header">
                        <div class="footer_logo">
                            <img src="/img/logo.png" alt="evento">
                        </div>
                    </div>
                    <div class="footer_box_body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida
                            tempus. Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus
                            lectus, at volutpat ligula euismod.
                        </p>
                        <ul class="footer_social">
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
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title">
                            instagram
                        </h4>
                    </div>
                    <div class="footer_box_body">
                        <ul class="instagram_list">
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c1.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c2.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c3.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c3.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c2.png" alt="instagram">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/img/cleander/c1.png" alt="instagram">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="footer_box">
                    <div class="footer_header">
                        <h4 class="footer_title">
                            subscribe to our newsletter
                        </h4>
                    </div>
                    <div class="footer_box_body">
                        <div class="newsletter_form">
                            <input type="email" class="form-control" placeholder="E-Mail here">
                            <button class="btn btn-rounded btn-block btn-primary">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p>
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> All rights reserved | Cardio Bio Tech
                </p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu">
                    <li>
                        <a href="{{ route('welcome') }}">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}#speakers">Comité</a>
                    </li>
                    <li>
                        <a href="{{ route('event', [$events->first()->id]) }}">Événements</a>
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--footer end -->