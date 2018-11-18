@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    @if($gallery->album->isEmpty()) 
                    <div class="alert alert-info"> <strong>Info!</strong> pas de photo dans la gallerie</div>
                    @else                   
                        @foreach ($gallery->album as $image)
                            <div class="col-md-3" style="display: inline-block;">
                                <div class="card">
                                    <img style="max-height: 140px;max-width: 300px;" class="card-img-top" src="/storage{{ $image->path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $image->created_at }}</h5>
                                        <form action="{{ route('gallerys.removeImage',['gallery_id'=>$image->gallery_id, 'image_id'=>$image->id]) }}" method="post">
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