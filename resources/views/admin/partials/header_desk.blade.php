<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            @if ($notifs->isNotEmpty())
                                <span class="quantity">{{ $notifs->count() }}</span>
                            @endif
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Vous avez {{ $notifs->count() }} Notifications</p>
                                </div>
                                @if ($notifs->isNotEmpty())
                                    @foreach ($notifs as $notif)
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <a href="{{ route('notifs') }}">
                                                <script>
                                                    function notifSeen(id) {
                                                        $.ajax({
                                                                url: "{!! route('notif.seen', [$notif->id]) !!}",
                                                                type: "GET",
                                                                success: null
                                                            });
                                                    }
                                                </script>
                                                <div class="content">
                                                    <p>{{ $notif->context }}</p>
                                                    <span class="date">{{ $notif->created_at->toDayDateTimeString() }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="/storage/users/avatars/{{ Auth::user()->photo }}" alt="avatar" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="/storage/users/avatars/{{ Auth::user()->photo }}" alt="avatar" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('profile') }}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>

</script>
<!-- END HEADER DESKTOP-->