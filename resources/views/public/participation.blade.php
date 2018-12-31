@extends('layouts.public_layout')
@section('content')
    <!--page title section-->
    <section class="inner_cover parallax-window" data-parallax="scroll" style="background: url(/img/bg/img.png)">
        <div class="overlay_dark"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="inner_cover_content">
                        <h3>
                            {{ $participation->event->abbreviation }}
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


    <!--contact section -->
    <section class="pt100 pb100">
        <div class="container">
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
                        @if(!is_null($participation))
                            <p>
                                Vous avez déjà souscrits,  et @if($participation->confirmation)
                                    votre demande est confirmée
                                @else
                                    votre demande est en cours d'être examiner par le comité d'évaluation
                                @endif
                                <br> si vous voulez vous pouvez mettre a jour votre demande de participaion
                            </p>
                        @endif

                    </div>

                    <div class="col-md-6 col-12">
                        <form class="contact_form" method="POST" action="{{ route('events.participationUpdate', [$event->id, $participation->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @if(!is_null($participation))
                                <div class="form-group">
                                    <label for="title" class="form-check-label">Title:</label>
                                    <input type="text" class="form-control @if($errors->first('title'))
                                            is-invalid
@endif" name="title" placeholder="Titre De Participation" value="{{ $participation->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-check-label">Affiliation:</label>
                                    <input type="text" class="form-control
                                                                            @if($errors->first('title'))
                                            is-invalid
@endif" name="affiliation" placeholder="Affiliation" value="{{ $participation->affiliation }}">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="form-check-label">Auteurs:</label>
                                    <input type="text" class="form-control @if($errors->first('authors'))
                                            is-invalid
@endif" name="authors" placeholder="Autheurs" value="{{ $participation->authors }}">
                                </div>
                                <div class="form-group" id="session">
                                    <label for="session" class="form-check-label">Session:</label>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="tisessiontle" class="form-check-label">medicale</label>
                                        @if($participation->session == 'medicale')
                                            <input type="radio" checked value="medicale" class="form-check-label" name="session">
                                        @else
                                            <input type="radio" value="medicale" class="form-check-label" name="session">
                                        @endif
                                    </div>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="session" class="form-check-label">technique </label>
                                        @if($participation->session == 'technique')
                                            <input type="radio" checked value="technique" class="form-check-label" name="session">
                                        @else
                                            <input type="radio" value="technique" class="form-check-label" name="session">
                                        @endif
                                    </div>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="session" class="form-check-label">autre </label>
                                        @if($participation->session == 'autre')
                                            <input type="radio" checked value="autre" class="form-check-label" name="session">
                                        @else
                                            <input type="radio" value="autre" class="form-check-label" name="session">
                                        @endif
                                    </div>
                                </div>
                            @else
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

                                <div class="form-group" id="session">
                                    <label for="session" class="form-check-label">Session:</label>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="tisessiontle" class="form-check-label">medicale</label>
                                        <input type="radio" value="medicale" class="form-check-label" name="session" placeholder="">
                                    </div>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="session" class="form-check-label">technique </label>
                                        <input type="radio" value="technique" class="form-check-label" name="session" placeholder="">
                                    </div>

                                    <div class="form-group col-3 d-inline-block">
                                        <label for="session" class="form-check-label">autre </label>
                                        <input type="radio" value="autre" class="form-check-label" name="session" placeholder="">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="title" class="form-check-label">Fichier D'abstract:*</label>
                                <input type="file" accept="application/pdf,.doc, .docx" class="form-control" name="abstract" placeholder="Format De Participation">
                            </div>

                            <div class="form-group">
                                <label for="title" class="form-check-label">Fichier du participation:</label>
                                <input type="file" accept="application/pdf,.doc, .docx" class="form-control" name="participation" placeholder="Format De Participation">

                                <button class="btn btn-rounded btn-primary" type="submit"><i class="fa fa-plus-circle"></i> Mettre à jour</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact section end -->
    @include('public.partials.subscribe')

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