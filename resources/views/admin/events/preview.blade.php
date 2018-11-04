@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong>modifier L' Évènement</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('admin.createEvent') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label"> Titre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="title" name="title" placeholder="titre" class="form-control" type="text" @if(old('title'))
                                                                                value="{{ old('title') }}"
                                                                                @else
                                                                                value="{{ $event->title }}"
                                                                            @endif>
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
                                            <input id="abbreviation" name="abbreviation" placeholder="abbreviation" class="form-control" type="text" @if(old('abbreviation'))
                                                            value="{{ old('abbreviation') }}"
                                                        @else
                                                            value="{{ $event->abbreviation }}"
                                                        @endif>
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
                                                type="file" @if(old('program'))
                                                                value="{{ old('program') }}"
                                                            @else
                                                                value="{{ $event->program }}"
                                                            @endif>
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
                                            <textarea name="about" id="about" rows="9" placeholder="introduction qui apparaîtra sur la page d'accueil publique..." class="form-control">{{ $event->about }}</textarea>
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
                                                type="file" @if(old('sliders[]'))
                                                                value="{{ old('sliders[]') }}"
                                                            @endif>
                                            @if ($errors->has('sliders'))
                                                <small class="form-text status--denied">{{ $errors->first('sliders') }}</small>
                                            @else                                                
                                                 <small class="form-text text-muted"> 4 images aux plus</small>
                                            @endif                                           
                                        </div>
                                    </div>
                                      <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Gouvernerat :</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="state" placeholder="Governorat" class="form-control" type="text" @if(old('state'))
                                                                                                                            value="{{ old('state') }}"
                                                                                                                        @else
                                                                                                                            value="{{ $event->address->state }}"
                                                                                                                        @endif>
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
                                              <input name="city" placeholder="Ville" class="form-control" type="text" @if(old('city'))
                                                                                                                 @endif>
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
                                            <input name="street" placeholder="Rue" class="form-control" type="text" @if(old('street'))
                                                                                                                        value="{{ old('street') }}"
                                                                                                                    @else
                                                                                                                        value="{{ $event->address->street }}"
                                                                                                                    @endif>
                                            @if ($errors->has('street'))
                                                <small class="form-text status--denied">{{ $errors->first('street') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label"> Date finale des <br> propositions</label>
                                        </div>
                                        <div class=" col-12 col-md-9 
                                         " >
                                           <div class="input-group " id="datetimepicker1">
                                            <input name="final_date" type='text' id="date" class="form-control" @if(old('final_date'))
                                                                                                        value="{{ old('final_date') }}"
                                                                                                    @else
                                                                                                        value="{{ $event->final_date }}"
                                                                                                    @endif/>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                            </div>
                                             @if ($errors->has('final_date'))
                                            <small class="form-text status--denied">{{ $errors->first('final_date') }}</small>
                                        @endif
                                        </div>
                                       
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="start_date" class=" form-control-label"> De</label>
                                        </div>
                                        <div class="col-4 col-md-4 "  >
                                            <div class="input-group " id="datetimepicker2">
                                             <input name="start_date" type='text' class="form-control" @if(old('start_date'))
                                                                                                        value="{{ old('start_date') }}"
                                                                                                    @else
                                                                                                        value="{{ $event->start_date }}"
                                                                                                    @endif>
                                            <span class="input-group-addon">
                                                <span class="fas fa-calendar-alt"></span>
                                            </span>
                                            </div>
                                             @if ($errors->has('start_date'))
                                            <small class="form-text status--denied">{{ $errors->first('start_date') }}</small>
                                        @endif
                                        
                                        </div>
                                       
                                        <div class="col-1">
                                           <label>A</label> 
                                        </div>
                                        <div class="col-4 col-md-4">
                                            <div class="input-group " id="datetimepicker3">
                                             <input name="end_date" type='text' class="form-control" @if(old('end_date'))
                                                                                                        value="{{ old('end_date') }}"
                                                                                                    @else
                                                                                                        value="{{ $event->end_date }}"
                                                                                                    @endif>
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
                                   
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Mettre a jour l'evenement
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