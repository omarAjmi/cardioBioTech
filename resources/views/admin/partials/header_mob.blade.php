<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner" style="background: white">
                <a class="logo" href="{{ route('welcome') }}" class="pull-left">
                    <h6 ><img src="/img/card_logo.png" style="width: 20%;height: 20%"  />Cardiobiotec
                    </h6>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                       <i class="fas fa-tachometer-alt"></i>Événements</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('admin.events') }}">Tous</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.newEvent') }}">creer nouveau</a>
                        </li>
                    </ul>
                </li>
                  <li>
                    <a href="{{ route('notifs') }}">
                        <i class="fas fa-bullhorn"></i>Notifications</a>
                </li>
                 <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-handshake"></i>Participations</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                         <li>
                            <a href="{{ route('participation.confirmed') }}">Confirmé</a>
                        </li>
                        <li>
                            <a href="{{ route('participation.postponed') }}">En attente</a>
                        </li>
                    </ul>
                </li>
                 <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-picture-o"></i>Galleries</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('galleries') }}">tous</a>
                        </li>
                        <li>
                            <a href="{{ route('galleries.new') }}">creer nouveau</a>
                        </li>
                    </ul>
                </li>
                 <li class="has-sub">
                    <a class="js-arrow" href="#">
                                                <i class="fas fa-users"></i>Commitées</a>

                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ route('commitees') }}">tous</a>
                        </li>
                        <li>
                            <a href="{{ route('commitees.new') }}">creer nouveau</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->