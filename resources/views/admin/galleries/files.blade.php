@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a class="btn btn-primary pull-right" href="{{ route('galleries.addImagesForm', $gallery->event_id) }}">Ajouter des images</a>
                <div class="row">
                    @if($gallery->album->isEmpty())
                    <div class="alert alert-info"> <strong>Info!</strong> pas de photo dans la gallerie</div>
                    @else                   
                        @foreach ($gallery->album as $image)
                            <div class="col-md-3" style="display: inline-block;">
                                <div class="card">
                                    <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $image->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $image->created_at->toDateString() }}</h5>
                                        <form action="{{ route('gallerys.removeImage',[$image->gallery->event_id, $image->id]) }}" method="post">
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
