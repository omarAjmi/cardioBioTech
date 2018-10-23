@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong>Créer nouvel</strong> Gallerie
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('galleries.create') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="category" class=" form-control-label"> Événnement</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="category" id="category" class="form-control">
                                                <option disabled>choisissez un évènement</option>
                                                @foreach ($events as $event)
                                                    <option value="{{ $event->id }}">{{ $event->abbreviation }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="sliders" class=" form-control-label">Sélectionnez les images d'événement</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="files" name="files[]" multiple="" class="form-control-file"
                                                type="file" value="{{ old('files[]') }}">
                                            @if ($errors->has('sliders'))
                                                <small class="form-text status--denied">{{ $errors->first('files') }}</small>
                                            @endif                                           
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Creer
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
    {{-- @if ($errors->any())
        {{ dd($errors) }}
    @endif --}}
@endsection