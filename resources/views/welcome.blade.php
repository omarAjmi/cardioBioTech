@extends('layouts.public_layout')
@section('content')
    <!--cover section slider -->
    <section id="home" class="home-cover">
        @if($events->isNotEmpty())
            <div class="cover_slider owl-carousel owl-theme">
                @foreach ($event->sliders as $slider)
                    <div class="cover_item" style="background: url('{{ $slider->name }}');">
                        <div class="slider_content">
                            <div class="slider-content-inner">
                                <div class="container">
                                    <div class="slider-content-center">
                                        <h2 class="cover-title">
                                            {{ $event->title }}
                                        </h2>
                                        <strong class="cover-xl-text">{{ $event->abbreviation }}</strong>
                                        <p class="cover-date">
                                            {{ $event->start_date->format('l j F Y H:i:s') }}
                                        </p>
                                        <a href="{{ route('event',[$event->id]) }}" class=" btn btn-primary btn-rounded">
                                            prendre part
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="cover_nav">
                <ul class="cover_dots">
                    <li class="active" data="0"><span>1</span></li>
                    @for ($i = 1; $i <= $event->sliders->count(); $i++)
                        <li data="{{ $i }}"><span>{{ $i+1 }}</span></li>
                    @endfor
                </ul>
            </div>
        @else
            <div class="cover_slider owl-carousel owl-theme">
                <div class="cover_item" style="background: url('/img/bg/background01.jpg');">
                    <div class="slider_content">
                        <div class="slider-content-inner">
                            <div class="container">
                                <div class="slider-content-center">
                                    <h2 class="cover-title">
                                        Prepare yourself for the
                                    </h2>
                                    <strong class="cover-xl-text">conference</strong>
                                    <p class="cover-date">
                                        12-14 February 2018 - Los Angeles, CA.
                                    </p>
                                    <a href="#" class=" btn btn-primary btn-rounded">
                                        Buy Tickets Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cover_nav">
                <ul class="cover_dots">
                    <li class="active" data="0"><span>1</span></li>
                    <li data="1"><span>2</span></li>
                    <li data="2"><span>3</span></li>
                </ul>
            </div>
        @endif
    </section>
    <!--cover section slider end -->

    @if(is_null($event))
        <h5>Pas des évènnements actuellèment</h5>
    @else
        <!--event info -->
        <section class="pt100 pb100">
            <div class="container">
                <h1 style="text-align: center;color: #005792">@if (!is_null($event)){{ $event->title }}@endif</h1>
                <div class="row justify-content-center">
                    <div class="col-md-3  ">
                        <div class="icon_box_two">
                            <i class="ion-ios-calendar-outline"></i>
                            <div class="content">
                                <h6 class="box_title">
                                    DATE
                                </h6>
                                <p class="row justify-content-center">
                                    @if (!is_null($event))
                                        {{ $event->start_date->format('l j F Y H:i:s') }}
                                        @if ($event->start_date->diffInDays($event->end_date) > 0)
                                            ({{ $event->start_date->diffInDays($event->end_date) }}) jours
                                        @endif
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3  ">
                        <div class="icon_box_two">
                            <i class="ion-ios-location-outline"></i>
                            <div class="content">
                                <h6 class="box_title">
                                    locale
                                </h6>
                                <p class="row justify-content-center">
                                    @if (!is_null($event))
                                        {{ $event->address->state }},
                                        {{ $event->address->city }} <br>
                                        {{ $event->address->street }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3  ">
                        <div class="icon_box_two">
                            <i class="ion-ios-person-outline"></i>
                            <div class="content">
                                <h6 class="box_title">
                                    Organisateur
                                </h6>
                                <p class="row justify-content-center">
                                    @if (!is_null($event)){{ $event->organiser }}@endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3  ">
                        <div class="icon_box_two">
                            <i class="ion-ios-calendar-outline"></i>
                            <div class="content">
                                <h6 class="box_title">
                                    dernière date des participations
                                </h6>
                                <p class="row justify-content-center">
                                    @if (!is_null($event))
                                        {{ $event->dead_line->format('l j F Y H:i:s') }}<br>
                                    @endif

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--event info end -->


        <!--event countdown -->
        @if(!is_null($event))
            <section class="bg-img pt70 pb70" style="background-image: url('/img/bg/img.png');">
                <div class="overlay_dark"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10">
                            <h4 class="mb30 text-center color-light">Compteur jusqu'au grand événement</h4>
                            <div class="countdown"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!--event count down end-->

        <!--about the event -->
        @if(!is_null($event))
            @include('public.partials.about')
        @endif
        <!--about the event end -->
        <!--speaker section-->
        @if(!is_null($event) and $event->commitee->members->isNotEmpty())
            @include('public.partials.commitee')
        @endif
        <!--flyer section end -->
        @if(!is_null($event))
            @include('public.partials.flyer')
        @endif
        <!--flyer section end -->
        @if(!is_null($event) and $event->sponsors->isNotEmpty())
            @include('public.partials.sponsors')
        @endif
        <!--flyer section end-->
        @include('public.partials.subscribe')
    @endif
@endsection