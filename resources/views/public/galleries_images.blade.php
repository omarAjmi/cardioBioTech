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
                    <li><span>Photos</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!--page title section end-->
    <!-- gallery grid-->
        <section class="pt100 ">
            <div class="container">
                <h1 style="text-align: center;color: #005792">{{ $event->title }}</h1>
                @if($gallery->isNotEmpty())
                    <div class="row">

                        <div id="img-thumbs" class="row">
                            @foreach($gallery as $key => $media)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#" data-image-id="{{ $key }}" data-toggle="modal"
                                       data-file="image" data-title="{{ $media->created_at }}"
                                       data-image="{{ $media->path }}"
                                       data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ $media->path }}"
                                             alt="{{ $media->created_at }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        @if($gallery->first() instanceof App\Image)
                            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span><span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-left"
                                                    id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                            </button>
                                            {{ $gallery->setPath(url()->current())->render() }}

                                            <button type="button" id="show-next-image"
                                                    class="btn btn-secondary float-right"><i
                                                        class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endif
                {{ $gallery->setPath(url()->current())->render() }}
                @else
                    <h3>Pas du médias pour le moment!</h3>
                @endif
            </div>
        </section>
        <!--/gallery grid-->
        @include('public.partials.scripts.galeriesJs')
        <script src="/js/videojs/video.js"></script>
@endsection