@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                Évènnement <strong>{{ $event->abbreviation }}</strong> / Ajouter Membres Aux Commitée
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('commitees.addMember', [$events->first()->id]) }}" method="post" class="form-horizontal">
                                    @csrf
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="member_search" class=" form-control-label">Sélectionnez un membre a ajouter</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="member" id="member" class="form-control" style="height: 100%" >
                                                @if ($members->isNotEmpty())
                                                    <option selected disabled>choisissez un membre</option>
                                                    @foreach ($members as $member)
                                                        <option value="{{ $member->id }}">{{ $member->getFullName() }}</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled>Aucun member pour le moment</option>
                                                @endif                                                
                                            </select>
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