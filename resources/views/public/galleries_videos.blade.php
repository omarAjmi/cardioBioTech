@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" style="background-image: url(/img/bg/img.png)">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="inner_cover_content">
                        <h3>
                            {{ $event->abbreviation }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('welcome') }}">Acceuil</a> |</li>
                    <li><span>gallerie</span></li> |</li>
                    <li><span>Vidéos</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!--page title section end-->

    <section class="pt100 ">
        <div class="container">
            <h1 style="text-align: center;color: #005792">{{ $event->title }}</h1>
            @if($gallery->isNotEmpty())
                <div class="row">
                    <div style="display:none; left: 10%" class="html5gallery" data-skin="darkness" data-width="800" data-height="480">

                        @foreach($gallery as $media)
                            {{--<!-- Add images to Gallery -->
                            <a href="{{ $media->thumbnail }}"><img src="{{ $media->thumbnail }}" alt="{{ $media->title }}"></a>--}}
                            <!-- Add videos to Gallery -->
                            <a href="{{ $media->path }}"><img src="{{ $media->thumbnail }}" alt="{{ $media->title }}"></a>
                        @endforeach
                        {{--<!-- Add Youtube video to Gallery -->
                        <a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>

                        <!-- Add Vimeo video to Gallery -->
                        <a href="https://player.vimeo.com/video/1084537?title=0&amp;byline=0&amp;portrait=0"><img src="images/Big_Buck_Bunny.jpg" alt="Vimeo Video"></a>--}}

                    </div>
                </div>
            @else
                <h3>Pas du médias pour le moment!</h3>
            @endif
        </div>
    </section>
    <script type="text/javascript" src="/html5gallery/html5gallery.js"></script>
@endsection