@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" style="background-image: url(/img/bg/img.png)" >
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
                    <li><a href="{{ route('welcome') }}">Acceuil</a> | </li>
                    <li><span>Événements</span></li>
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
                    @if ($event->gallery->album->isNotEmpty())

                        @foreach ($event->gallery->album as $image)
                            <!-- galery item -->
                            <div class="galery-item">
                                <img src="{{ $image->path }}" >
                            </div>
                            <!-- /galery item -->
                        @endforeach
                    @else

                        @foreach ($event->sliders as $slider)
                            <!-- galery item -->
                            <div class="galery-item" >
                                <img src="{{ $slider->name }}"  >
                            </div>
                            <!-- /galery item -->
                        @endforeach
                    @endif
    
                </div>
                <!-- /galery owl -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!--event info -->
    <section class="pt100 ">
        <div class="container">
            <h1 style="text-align: center;color: #005792">{{ $event->title }}</h1>
            <div class="row justify-content-center">
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-calendar-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                DATE
                            </h5>
                            <p>
                                {{ $event->start_date->format('l j F Y H:i:s') }}
                                    @if ($event->start_date->diffInDays($event->end_date) > 0)
                                        ({{ $event->start_date->diffInDays($event->end_date) }}) jours
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
                            <p class="row justify-content-center">
                                {{ $events->first()->address->state }}, 
                                {{ $events->first()->address->city }} <br>
                                {{ $events->first()->address->street }}
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-person-outline"></i>
                        <div class="content">
                            <h5 class="box_title">
                                Organisateur
                            </h5>
                            <p class="row justify-content-center">
                                {{ $events->first()->organiser }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--events section -->

          
    <section class="pt100 pb100">
        <div class="container">
            <div class="section_title">
                <h3 class="title">
                    À propos
                </h3>
            </div>
            <div >
                <div class="row justify-content-center">
                    @foreach ($event->breakLongAbout() as $p)
                        <div class="col-md-6 col-12">
                            <p>{{ $p }}</p> <br>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
            @if ($event->dead_line > now())
                <div class="container">
                    <div class="section_title">
                        <h3 class="title">
                        Participation
                        </h3>
                    </div>      
                    <div >
                        <div class="row justify-content-center" id="participation">      
                            <div class="col-md-6 col-12">
                                <p>
                                    pour la participation, merci de télécharger <i style="color: dodgerblue" class="fa fa-download"></i>
                                    <a href="{{ route('downloadFileEvent', ['id'=>$event->id,'filename'=>$event->getProgramFileName()]) }}">
                                        <b><u>ce fichier</u></b>
                                    </a> formel, de lui fournir avec les données nécessaires puis de le renvoyer à l’aide de ce formulaire.
                                </p>
                                    @if(!is_null($participation))
                                    <p>
                                        Vous avez déjà souscrits,  et @if($participation->confirmation)
                                                                            votre demande est confirmée
                                                                      @else
                                                                            votre demande est en cours d'être examiner par le comité organisateur
                                                                      @endif
                                        <br> si vous voulez vous pouvez mettre a jour votre demande de participaion
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <form class="contact_form" method="POST" action="{{ route('events.participate', [$event->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @if(!is_null($participation))
                                        <div class="form-group">
                                            <input type="text" class="form-control @if($errors->first('title'))
                                                is-invalid
@endif" name="title" placeholder="Titre De Participation" value="{{ $participation->title }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control
                                                                                    @if($errors->first('title'))
                                                is-invalid
@endif" name="affiliation" placeholder="Affiliation" value="{{ $participation->affiliation }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control @if($errors->first('authors'))
                                                is-invalid
@endif" name="authors" placeholder="Autheurs" value="{{ $participation->authors }}">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <input type="text" class="form-control
                                                                                @if($errors->first('title'))
                                                                                    is-invalid
                                                                                @endif" name="title" placeholder="Titre De Participation">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control
                                                                                    @if($errors->first('affiliation'))
                                                                                        is-invalid
                                                                                    @endif" name="affiliation" placeholder="Affiliation">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control @if($errors->first('authors'))
                                                                                        is-invalid
                                                                                    @endif" name="authors" placeholder="Autheurs">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="file" accept="application/pdf" class="form-control" name="participation" placeholder="Format De Participation">
                                    
                                        <button class="btn btn-rounded btn-primary " type="submit"><i class="fa fa-plus-circle"></i> Déposer</button>
                                    </div>

                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>   
    <!--event section end -->

    @if(Session::has('partSuccess'))
        <div class="modal fade show" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" style="display: block; padding-left: 15px;">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Succès</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            {{ Session::get('partSuccess') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Session::has('partFail'))
        <div class="modal fade show" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" style="display: block; padding-left: 15px;">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Violation a eu lieu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            @if(Session::get('partFail')==='*')
                                Fichier requis doit être de type pdf ou docx
                            @else
                                {{ Session::get('partFail') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- @include('public.partials.subscribe')    --}}
@endsection
