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
                                    {{-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="category" class=" form-control-label"> Catégorie</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="category" id="category" class="form-control">
                                                <option value="0">choisissez catégorie d'évènement</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div> --}}
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
                                            <textarea name="about" id="about" rows="9" placeholder="introduction qui apparaîtra sur la page d'accueil publique..." class="form-control"></textarea>
                                            @if ($errors->has('about'))
                                                <small class="form-text status--denied">{{ $errors->first('about') }}</small>
                                            @else                                                
                                                <small class="form-text text-muted"> S'affichera aux page publique</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Sélectionnez les curseurs d'événement</label>
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
                                        <div class="col-4">
                                            <input name="state" placeholder="Governorat" class="form-control" type="text" value="{{ old('state') }}">
                                             @if ($errors->has('state'))
                                                <small class="form-text status--denied">{{ $errors->first('state') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <input name="city" placeholder="Ville" class="form-control" type="text" value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <small class="form-text status--denied">{{ $errors->first('city') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <input name="street" placeholder="Rue" class="form-control" type="text" value="{{ old('street') }}">
                                            @if ($errors->has('street'))
                                                <small class="form-text status--denied">{{ $errors->first('street') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-1">
                                            <label for="start_date" class=" form-control-label"> De</label>
                                        </div>
                                        <div class="col-4 input-group date" id="datetimepicker1">
                                            <input name="start_date" type='text' class="form-control" value="{{ old('start_date') }}"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                        </div>
                                        @if ($errors->has('start_date'))
                                            <small class="form-text status--denied">{{ $errors->first('start_date') }}</small>
                                        @endif
                                        <div class="col-1">
                                            
                                        </div>
                                        <div class="col col-md-1">
                                            <label for="end_date" class=" form-control-label"> À</label>
                                        </div>
                                        <div class="col-4 input-group date" id="datetimepicker1">
                                            <input name="end_date" type='text' class="form-control"value="{{ old('end_date') }}"/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                        </div>
                                        @if ($errors->has('end_date'))
                                            <small class="form-text status--denied">{{ $errors->first('end_date') }}</small>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="zmdi zmdi-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection