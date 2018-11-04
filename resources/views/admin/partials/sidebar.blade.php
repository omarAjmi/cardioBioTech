<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ route('admin') }}">
            <h3 style= " font-family: Times New Roman; font-style: normal;"><img src="/img/card_logo.png" alt="Cool Admin" style="width: 30%" />
            Cardiobiotec</h3>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Événements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('commitees') }}">tous</a>
                        </li>
                        <li>
                            <a href="{{ route('commitees.new') }}">creer nouveau</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
