@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header ">
                                Évènnement <strong>{{ $event->abbreviation }}</strong> / Ajouter Des Images
                            </div>
                             <form action="{{ route('galleries.addImages', [$event->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                            <div class="card-body card-block ">
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            
                                              <label for="title" class=" form-control-label"> Sélectionnez les images d'événement</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="files" name="files[]" multiple="" class="form-control-file"
                                                type="file" value="{{ old('files[]') }}" accept="image/jpeg,image/png,image/jpg">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($errors->any('files.'.$i))
                                                    <small class="form-text status--denied">{{ $errors->first('files.'.$i) }}</small>
                                                    @break
                                                @endif
                                            @endfor
                                            @if ($errors->any('files'))
                                                <small class="form-text status--denied">{{ $errors->first('files') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                     </div>
                                     <hr>
                                    <div  class="pull-right" style="padding-bottom:  2%;padding-right: 2%">
                                        <div>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Creer une Gallerie
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="zmdi zmdi-ban"></i> Annuler
                                        </button>
                                    </div>
                                    </div>
                                </form>
                           
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
