@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="/img/bg/bg-img.png">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="inner_cover_content">
                        <h3>
                            Participer
                        </h3>
                    </div>
                </div>
            </div>
    
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('welcome') }}">Acceuil</a> | </li>
                    <li><span>Participation</span></li>
                </ul>
            </div>
        </div>
    </section>
    <!--page title section end-->
    
    <div id="galery" style="margin-top: 5%">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- galery owl -->
                <div id="galery-owl" class="owl-carousel owl-theme">
                        @foreach ($event->sliders as $slider)
                            <!-- galery item -->
                            <div class="galery-item">
                                <img src="/storage{{ $event->storage.'sliders/'.$slider->name }}" alt="">
                            </div>
                            <!-- /galery item -->
                        @endforeach
    
                </div>
                <!-- /galery owl -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!--events section -->
    <section class="pt100 pb100">
        <div class="container">
            <!--Carousel Wrapper-->
            <div class="event_info">
                <div class="event_title">
                    {{ $event->address->state }}, {{ $event->address->state }} <br> {{ $event->address->state }}
                </div>
                <div class="speakers">
                    <strong>Speakers</strong>
                    <span>
                        @foreach ($event->participants as $p)
                            {{ $p->first_name.' '.$p->last_name }} ,
                        @endforeach
                    </span>
                </div>
                <div class="event_date">
                    {{ $event->start_date->toDayDateTimeString() }}
                </div>
            </div>
            <div class="event_word">
                <div class="row justify-content-center">
                    @foreach ($event->breakLongAbout() as $p)
                        <div class="col-md-6 col-12">
                            {{ $p }}
                        </div>
                    @endforeach
                    <div class="col-md-6 col-12"></div>
                </div>
            </div>
            <div class="row justify-content-center mt100">
                <div class="col-md-6 col-12">
                    <div class="contact_info">
                        <h5>
                            Participation
                        </h5>
                        <p>
                            pour la participation, merci de télécharger <a href="{{ route('admin.downloadFileEvent', ['id'=>$event->id,'filename'=>$event->program_file]) }}"><b><u>cette fichier</u></b></a> formelle, de lui fournir les données nécessaires puis de le renvoyer à l’aide de ce formulaire.
                        </p>
                        <div class="col-md-6 col-12">
                            <form class="contact_form" method="POST" action="{{ route('events.participate', [$event->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input class="btn btn-rounded btn-primary" name="participation" type="file" class="form-control" placeholder="Format De Participation">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-rounded btn-success" type="submit">Déposer</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('public.partials.subscribe')
@endsection