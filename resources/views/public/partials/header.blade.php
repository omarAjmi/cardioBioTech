<!--header start here -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('welcome') }}">
            <img src="img/logo.png" alt="Evento" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('welcome') }}#speakers">Speakers</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link " href="{{ route('events') }}">Events</a>
                        <div class="dropdown-content">
                            <a href="events.html">Link 1</a>
                            <a href="events.html">Link 2</a>
                            <a href="events.html">Link 3</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="news.html">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('contact') }}">Contact</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link " href="events.html"><b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b></a>
                            <div class="dropdown-content">
                                <a href="events.html">profile</a>
                                @if (Auth::user()->admin)
                                    <a href="{{ route('admin') }}">Admin Site</a>
                                @endif
                                <a href="{{ route('logout') }}">logout</a>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link " href="#" data-toggle="modal" data-target="#myModal">Login</a>
                    </li>
                @endif
                </ul>
        </div>
    </div>
</header>
<!--header end here-->