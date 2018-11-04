@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong>Créer nouvel</strong> Évènement
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('admin.createEvent') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                           <label for="title" class=" form-control-label"> Titre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="title" name="title" placeholder="titre" class="form-control" type="text" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <small class="form-text  status--denied">{{ $errors->first('title') }}</small>
                                            @else
                                                <small class="form-text text-muted"> Titre officiel d'événement</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label"> Abbreviation</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="abbreviation" name="abbreviation" placeholder="abbreviation" class="form-control" type="text" value="{{ old('abbreviation') }}">
                                            @if ($errors->has('abbreviation'))
                                            <small class="form-text status--denied"> {{ $errors->first('abbreviation') }}</small>
                                            @else
                                            <small class="form-text text-muted"> Abbreviation d'événement</small>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="program" class=" form-control-label">Fichier du programme</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="program" name="program" class="form-control-file"
                                                type="file" value="{{ old('program') }}">
                                            <small class="form-text text-muted"></small>
                                            @if ($errors->has('program'))
                                                <small class="form-text status--denied">{{ $errors->first('program') }}</small>
                                            @else
                                                <small class="form-text text-muted"> fichier doit être de type (pdf, docx, text)</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="about   " class=" form-control-label">A propos</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="about" id="about" rows="9" placeholder="introduction qui apparaîtra sur la page d'accueil publique..." class="form-control">{{ old('about') }}</textarea>
                                            @if ($errors->has('about'))
                                                <small class="form-text status--denied">{{ $errors->first('about') }}</small>
                                            @else                                                
                                                <small class="form-text text-muted"> S'affichera aux page publique</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Sélectionnez les curseurs d'événement(images)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="sliders" name="sliders[]" multiple="" class="form-control-file"
                                                type="file" value="{{ old('sliders[]') }}">
                                            @if ($errors->has('sliders'))
                                                <small class="form-text status--denied">{{ $errors->first('sliders') }}</small>
                                            @endif                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Gouvernerat :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="state" placeholder="Governorat" class="form-control" type="text" value="{{ old('state') }}">
                                             @if ($errors->has('state'))
                                                <small class="form-text status--denied">{{ $errors->first('state') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Ville :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="city" placeholder="Ville" class="form-control" type="text" value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <small class="form-text status--denied">{{ $errors->first('city') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Rue :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="street" placeholder="Rue" class="form-control" type="text" value="{{ old('street') }}">
                                            @if ($errors->has('street'))
                                                <small class="form-text status--denied">{{ $errors->first('street') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="dead_line" class=" form-control-label"> Date finale des <br> propositions</label>
                                        </div>
                                        <div class=" col-12 col-md-9 
                                         " >
                                           <div class="input-group " id="datetimepicker1">
                                            <input name="dead_line" type='text' id="date" class="form-control" value="{{ old('dead_line') }}"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                            </div>
                                             @if ($errors->has('dead_line'))
                                            <small class="form-text status--denied">{{ $errors->first('dead_line') }}</small>
                                        @endif
                                        </div>
                                       
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-9 col-md-3">
                                            <label for="start_date" class=" form-control-label"> De</label>
                                        </div>
                                        <div class="col-9 col-md-4 "  >
                                            <div class="input-group " id="datetimepicker2">
                                            <input name="start_date" type='text' id="date" class="form-control" value="{{ old('start_date') }}"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                            </div>
                                             @if ($errors->has('start_date'))
                                            <small class="form-text status--denied">{{ $errors->first('start_date') }}</small>
                                        @endif
                                        
                                        </div>
                                       
                                        <div class="col">
                                           <label>A</label> 
                                        </div>
                                        <div class="col-9 col-md-4">
                                            <div class="input-group " id="datetimepicker3">
                                            <input name="end_date" type='text' id="date" class="form-control"value="{{ old('end_date') }}"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                            </div>
                                             @if ($errors->has('end_date'))
                                            <small class="form-text status--denied">{{ $errors->first('end_date') }}</small>
                                        @endif
                                        </div>
                                       
                                    </div>
                                    <br>
                                    <hr>
                                    <div class=" pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Créer un evenement
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="zmdi zmdi-ban"></i> Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="{{ route('welcome') }}">Cardio Bio Tech</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
