
<!--header start here -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('welcome') }}">
            <img src="/img/logo-white.png" alt="Evento" />
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
                    <a class="nav-link " href="{{ route('welcome') }}#speakers">Comité</a>
                </li>
                {{ dd() }}
                @if(!array_search(Route::current()->action['as'], ['profile', 'contact']))
                    @if($event->gallery->album()->isNotEmpty())
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link " href="#">gallerie</a>
                                <div class="dropdown-content">
                                    <a href="{{ route('gallery.images', [$event->id]) }}">Images</a>
                                    <a href="{{ route('gallery.videos', [$event->id]) }}">Videos</a>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link " href="#">Évènements</a>
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
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('members') }}">Qui somme-nous</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link " href="#"><b>{{ Auth::user()->getFullName() }}</b>
                                <img src="{{ Auth::user()->photo }}" alt=" logo" style="height: 30px;width: 30px;border-radius: 50%;">
                            </a>
                            <div class="dropdown-content">
                                <a href="{{ route('profile', [Auth::id()]) }}">profile</a>
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
