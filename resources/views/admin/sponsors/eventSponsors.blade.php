@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a class="btn btn-primary pull-right" href="{{ route('sponsors.addSponsorForm', $event->id) }}">Ajouter un sponsor</a>
                <div class="row">
                    @if($event->sponsors->isEmpty())
                        <div class="alert alert-info"> <strong>Info!</strong> pas des sponsors pour cette évènnement</div>
                    @else
                        @foreach ($event->sponsors as $sponsor)
                            <div class="col-md-3" style="display: inline-block;">
                                <div class="card">
                                    <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $sponsor->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $sponsor->name }}</h5>
                                        <form action="{{ route('sponsors.removeSponsor',[$sponsor->event_id, $sponsor->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="item pull-right"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%" >
                                                <i class="zmdi zmdi-delete" style=""></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection