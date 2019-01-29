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
    <!--event info -->
    <section class="pt100 ">
        <div class="container">
            <h1 style="text-align: center;color: #005792">{{ $event->title }}</h1>
            <div class="row justify-content-center">
                <div class="col-6 col-md-3  ">
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

                <div class="col-6 col-md-3  ">
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

                <div class="col-6 col-md-3  ">
                    <div class="icon_box_two">
                        <i class="ion-ios-person-outline"></i>
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
                                    {{ $event->start_date->format('l j F Y H:i:s') }}<br>
                                @endif

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--events section -->

    <!--about the event -->
    @include('public.partials.about')
    <!--about the event end -->
    <!--speaker section-->
    @if($event->commitee->members->isNotEmpty())
        @include('public.partials.commitee')
    @endif
    <!--flyer section end -->
    @include('public.partials.flyer')
    <!--flyer section end -->
    @if ($event->dead_line > now())
        <div class="container ">
            <div class="section_title">
                <h3 class="title">
                    Participation
                </h3>
            </div>
            <div >
                <div class="row justify-content-center" id="participation">
                    <div class="col-md-5 col-12">
                        <p>
                            pour la participation, merci  consulter <i style="color: dodgerblue" class="fa fa-download"></i>
                            <a href="{{ route('downloadFileEvent', ['id'=>$event->id,'filename'=>$event->getProgramFileName()]) }}">
                                <b><u>ce fichier</u></b>
                            </a> de règlement , puis remplissez ce formulaire avec les données requises en conséquence.
                        </p>
                        @if($participations->isNotEmpty())
                            <p>
                                Vous avez déjà souscrits,
                                <br> si vous voulez vous pouvez mettre a jour vos demandes de participaion <a style="color: dodgerblue"
                                                                                                              href="#participations"><b><u>ci dessous</u></b> </a>
                            </p>
                        @endif

                    </div>

                    <div class=" col-md-6 col-12">
                        <form class="contact_form" method="POST" action="{{ route('events.participate', [$event->id]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="form-check-label">Titre:</label>
                                <input type="text" class="form-control
                                                                    @if($errors->first('title'))
                                        is-invalid
@endif" name="title" placeholder="Titre De Participation">
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-check-label">Affiliation:</label>
                                <input type="text" class="form-control
                                                                        @if($errors->first('affiliation'))
                                        is-invalid
@endif" name="affiliation" placeholder="Affiliation">
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-check-label">Auteurs:</label>
                                <input type="text" class="form-control @if($errors->first('authors'))
                                        is-invalid
@endif" name="authors" placeholder="Auteurs">
                            </div>

                            <label for="session" class="form-check-label">Session:</label>
                            <div  class="form-group" id="session">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" value="cardiopathie ischémique" class="form-check-label" name="session" placeholder=""></td>
                                            <td>
                                                <label for="session" class="form-check-label">cardiopathie ischémique &nbsp; &nbsp;</label>
                                            </td>
                                            <td><input type="radio" value="techcardiopathie congénitale et pédiatrique nique" class="form-check-label" name="session" placeholder=""></td>
                                            <td>
                                                <label for="session" class="form-check-label">cardiopathie congénitale et pédiatrique </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><input type="radio" value="valvuloplastie" class="form-check-label" name="session" placeholder=""></td>
                                            <td>
                                                <label for="session" class="form-check-label">valvuloplastie </label>
                                            </td>
                                            <td><input type="radio" value="autre" class="form-check-label" name="session" placeholder=""></td>
                                            <td>
                                                <label for="session" class="form-check-label">Autre </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <label for="title" class="form-check-label">Fichier D'abstract:*</label>
                                <input type="file" accept="application/pdf,.doc, .docx" class="form-control" name="abstract" placeholder="Format De Participation">
                            </div>

                            <div class="form-group">
                                <label for="title" class="form-check-label">Fichier du participation:</label>
                                <input type="file" accept="application/pdf,.doc, .docx" class="form-control" name="participation" placeholder="Format De Participation">

                                <button class="btn btn-rounded btn-primary" type="submit"><i class="fa fa-plus-circle"></i> Déposer</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--event section end -->

    @if($event->participations->isNotEmpty())
        <section class="pb100">
            <div class="container">
                <div class="section_title">
                    <h3 class="title">
                        participations acceptés
                    </h3>
                </div>
                <div class="table-responsive" style="overflow-x: scroll; max-height: 200px;">
                    <table class="event_calender table ">
                        <thead class="event_title">
                        <tr>
                            <th>titre</th>
                            <th>session</th>
                            <th>auteurs</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participations as $participation)
                            @if($participation->confirmation)
                                <tr>
                                    <td>
                                        <p>{{ $participation->title }}</p>
                                    </td>
                                    <td>
                                        <div class="event_place">
                                            <p>{{ $participation->session }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ $participation->authors }}</p>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    @if($participations->isNotEmpty())
        <section class="pb100" id="participations">
            <div class="container">
                <div class="section_title">
                    <h3 class="title">
                        vos demandes de participation
                    </h3>
                </div>
                <div class="table-responsive">
                    <table class="event_calender table">
                        <thead class="event_title">
                        <tr>
                            <th>titre</th>
                            <th>date</th>
                            <th>session</th>
                            <th>auteurs</th>
                            <th>affiliation</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participations as $participation)
                            <tr>
                                <td>
                                    <p>{{ $participation->title }}</p>
                                </td>
                                <td class="event_date">
                                    {{ $participation->created_at->day}}
                                    <span>{{ $participation->created_at->month}}</span>
                                    <span>{{ $participation->created_at->year}}</span>
                                </td>
                                <td>
                                    <div class="event_place">
                                        <p>{{ $participation->session }}</p>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $participation->authors }}</p>
                                </td>
                                <td class="buy_link">
                                    <p>{{ $participation->affiliation }}</p>
                                </td>

                                <td class="buy_link">
                                    <a href="{{ route('events.participation.edit', [$event->id, $participation->id]) }}">mettre à jour</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    <!--sponsors section end -->
    @if($event->sponsors->isNotEmpty())
        @include('public.partials.sponsors')
    @endif
    <!--sponsors section end-->

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
@endsection
