@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header ">
                                Évènnement <strong>{{ $event->abbreviation }}</strong> / Ajouter Un Sponsor
                            </div>
                            <form action="{{ route('sponsors.addSponsor', [$event->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="card-body card-block ">

                                    <div class="row form-group">
                                        <div class="col col-md-3">

                                            <label for="title" class=" form-control-label"> Sélectionnez le logo du sponsor</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="sponsors" name="sponsors[]" class="form-control-file"
                                                   type="file" value="{{ old('sponsors[]') }}" accept="image/jpeg,image/png,image/jpg">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($errors->any('sponsors.'.$i))
                                                    <small class="form-text status--denied">{{ $errors->first('sponsors.'.$i) }}</small>
                                                    @break
                                                @endif
                                            @endfor
                                            @if ($errors->any('sponsors'))
                                                <small class="form-text status--denied">{{ $errors->first('sponsors') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">

                                            <label for="title" class=" form-control-label"> Sélectionnez le logo du sponsor</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="name" name="name" class="form-control" type="text" value="{{ old('name') }}">
                                            @if ($errors->any('name'))
                                                <small class="form-text status--denied">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div  class="pull-right" style="padding-bottom:  2%;padding-right: 2%">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-dot-circle-o"></i> Ajouter
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
@endsection