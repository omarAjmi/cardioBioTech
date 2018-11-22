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
                @foreach ($events as $event)
                    <li class=" has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-folder"></i>{{ $event->abbreviation }}</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('participations', $event->id) }}"><i class="fas fa-handshake"></i>Participations</a>
                            </li>
                            <li>
                                <a href="{{ route('galleries.preview', $event->id) }}"><i class="fas fa-picture-o"></i>Gallerie</a>
                            </li>
                            <li>
                                <a href="{{ route('commitees.preview', $event->id) }}"><i class="fas fa-users"></i>Comité</a>
                            </li>
                        </ul>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
