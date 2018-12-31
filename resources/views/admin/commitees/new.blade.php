@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                Évènnement <strong>{{ $event->abbreviation }}</strong> / Ajouter Membres Aux Comité
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('commitees.addMember', [$event->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label"> Nom et prénom</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="fullname" name="fullname" placeholder=" Nom et prénom" class="form-control" type="text" value="{{ old('fullname') }}">
                                            @if($errors->has('fullname'))
                                                <small class="form-text status--denied">{{ $errors->first('fullname') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label">Titre professionel</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="title" name="title" placeholder="Titre professionel" class="form-control" type="text" value="{{ old('title') }}">
                                            @if($errors->has('title'))
                                                <small class="form-text status--denied">{{ $errors->first('title') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">comité</label>
                                        </div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="commitee" value="scientifique" class="form-check-input">scientifique&nbsp;&nbsp;&nbsp;
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="commitee" value="évaluation" class="form-check-input">évaluation
                                                </label>
                                            </div>
                                            @if($errors->has('commitee'))
                                                <small class="form-text status--denied">{{ $errors->first('commitee') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">

                                            <label for="image" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="image" name="image" class="form-control-file" type="file" value="" accept="image/jpeg,image/png,image/jpg">
                                            @if($errors->has('image'))
                                                <small class="form-text status--denied">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="pull-right" >
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Ajouter
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
            </div>
        </div>
    </div>
@endsection
