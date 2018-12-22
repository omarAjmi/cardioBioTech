@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-2 row pull-right">
                    <a class="btn btn-primary" href="{{ route('galleries.addImagesForm', $gallery->event_id) }}">Ajouter des images</a>
                    <a class="btn btn-primary" href="{{ route('galleries.addVideosForm', $gallery->event_id) }}">Ajouter Un video&nbsp&nbsp;&nbsp;&nbsp;</a>
                </div>
                <div class="row">
                    @if($gallery->album()->isEmpty())
                    <div class="alert alert-info"> <strong>Info!</strong> pas de photo dans la gallerie</div>
                    @else
                        {{--{{ dd($gallery->album) }}--}}
                        @foreach ($gallery->album() as $media)
                            <div class="col-md-3" style="display: inline-block;">
                                <div class="card">
                                    @if($media instanceof \App\Image)
                                        <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $media->path }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $media->created_at->toDateString() }}</h5>
                                            <form action="{{ route('galleries.removeImage',[$media->gallery->event_id, $media->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="item pull-right"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%" >
                                                    <i class="zmdi zmdi-delete" style=""></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $media->thumbnail }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $media->title }}</h5>
                                            <form action="{{ route('galleries.removeVideo',[$media->gallery->event_id, $media->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="item pull-right"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%" >
                                                    <i class="zmdi zmdi-delete" style=""></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
