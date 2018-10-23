@extends('layouts.public_layout')
@section('content')
    <!--cover section slider -->
    <section id="home" class="home-cover">
        @if($events->isNotEmpty())
            <div class="cover_slider owl-carousel owl-theme">
                @foreach ($events->first()->sliders as $slider)
                    <div class="cover_item" style="background: url('/storage/events/{{ $events->first()->abbreviation }}/sliders/{{ $slider->name }}');">
                        <div class="slider_content">
                            <div class="slider-content-inner">
                                <div class="container">
                                    <div class="slider-content-center">
                                        <h2 class="cover-title">
                                            {{ $events->first()->title }}
                                        </h2>
                                        <strong class="cover-xl-text">{{ $events->first()->abbreviation }}</strong>
                                        <p class="cover-date">
                                            @if($date = new Carbon\Carbon($events->first()->created_at))
                                                {{ $date->toDayDateTimeString() }}
                                            @endif
                                        </p>
                                        <a href="{{ route('participation',[$events->first()->id]) }}" class=" btn btn-primary btn-rounded">
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
                    @for ($i = 1; $i <= $events->first()->sliders->count(); $i++)
                        <li data="{{ $i }}"><span>{{ $i+1 }}</span></li>
                    @endfor
                </ul>
            </div>
        @else
            <div class="cover_slider owl-carousel owl-theme">
                <div class="cover_item" style="background: url('img/bg/background01.jpg');">
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
    
    <!--event info -->
    <section class="pt100 pb100">
        <div class="container">
            <h1 style="text-align: center;color: #005792">@if (!is_null($events->first())){{ $events->first()->title }}@endif</h1>
            <div class="row justify-content-center">
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-calendar-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                DATE
                            </h5>
                            <p>
                                @if (!is_null($events->first())){{ $events->first()->start_date->formatLocalized('%A %d %B %Y') }} <br>
                                    @if ($events->first()->start_date->diffInDays($events->first()->end_date) > 0)
                                        ({{ $events->first()->start_date->diffInDays($events->first()->end_date) }}) jours
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-location-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                locale
                            </h5>
                            <p>
                                @if (!is_null($events->first())){{ $events->first()->address->state }}@endif, 
                                @if (!is_null($events->first())){{ $events->first()->address->city }}@endif <br>
                                @if (!is_null($events->first())){{ $events->first()->address->street }}@endif
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-person-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                organisateur
                            </h5>
                            <p>
                                Natalie James
                                + guests
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-pricetag-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                tikets
                            </h5>
                            <p>
                                $65 early bird
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--event info end -->
    
    
    <!--event countdown -->
    <section class="bg-img pt70 pb70" style="background-image: url('img/bg/bg-img.png');">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h4 class="mb30 text-center color-light">Conteur jusqu'au grand événement</h4>
                    <div class="countdown"></div>
        </div>
    </section>
    <!--event count down end-->
    
    
    <!--about the event -->
    <section class="pt100 pb100">
        <div class="container">
            <div class="section_title">
                <h3 class="title">
                    À propos
                </h3>
            </div>
            <div class="row justify-content-center">
                @if($events->isNotEmpty())
                    @foreach ($events->first()->breakLongAbout() as $p)
                        <div class="col-md-6 col-12">
                            {{ $p }}
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                    </div>
                    <div class="col-md-6 col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                    </div>
                @endif
            </div>
    
            <!--event features-->
            <div class="row justify-content-center mt30">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-mic"></i>
                        <div class="content">
                            <h4>9 Speakers</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-rocket"></i>
                        <div class="content">
                            <h4>8 hrs Marathon</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-bullhorn"></i>
                        <div class="content">
                            <h4>Live Broadcast</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="icon_box_one">
                        <i class="lnr lnr-clock"></i>
                        <div class="content">
                            <h4>Early Bird</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec
                                graviante.
                            </p>
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--event features end-->
        </div>
    </section>
    <!--about the event end -->
    
    
    <!--speaker section-->
    <section class="pb100">
        <div class="container" id="speakers">
            <div class="section_title mb50">
                <h3 class="title">
                    Comité
                </h3>
            </div>
        </div>
        <div class="row justify-content-center no-gutters">
            @if($events->isNotEmpty())
                @foreach($events->first()->commitee->members as $member)
                    <div class="col-md-3 col-sm-6">
                        <div class="speaker_box">
                            <div class="speaker_img">
                                <img src="/storage/users/avatars/{{ $member->data->photo }}" alt="speaker name">
                                <div class="info_box">
                                    <h5 class="name">{{ $member->data->getFullName() }}</h5>
                                    {{-- <p class="position">CEO Company</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <!--speaker section end -->
    
    
    <!--event calender-->
    {{-- <section class="pb100">
        <div class="container">
            <div class="table-responsive">
                <table class="event_calender table">
                    <thead class="event_title">
                        <tr>
                            <th>
                                <i class="ion-ios-calendar-outline"></i>
                                <span>next events calendar</span>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="img/cleander/c1.png" alt="event">
                            </td>
                            <td class="event_date">
                                14
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/cleander/c2.png" alt="event">
                            </td>
                            <td class="event_date">
                                18
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/cleander/c3.png" alt="event">
                            </td>
                            <td class="event_date">
                                22
                                <span>February</span>
                            </td>
                            <td>
                                <div class="event_place">
                                    <h5>Conference in Amsterdam</h5>
                                    <h6>08 AM - 04 PM</h6>
                                    <p>Speaker: Daniel Hill</p>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-rounded">Read More</a>
                            </td>
                            <td class="buy_link">
                                <a href="#">buy now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section> --}}
    <!--event calender end -->
    
    <!--brands section -->
    <section class="bg-gray pt100 pb100">
        <div class="container">
            <div class="section_title mb50">
                <h3 class="title">
                    Nos partenaires
                </h3>
            </div>
            <div class="brand_carousel owl-carousel">
                <div class="brand_item text-center">
                    <img src="/img/brands/b1.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="/img/brands/b2.png" alt="brand">
                </div>
    
                <div class="brand_item text-center">
                    <img src="/img/brands/b3.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="/img/brands/b4.png" alt="brand">
                </div>
                <div class="brand_item text-center">
                    <img src="/img/brands/b5.png" alt="brand">
                </div>
            </div>
        </div>
    </section>
    <!--brands section end-->
    @include('public.partials.subscribe')
@endsection
