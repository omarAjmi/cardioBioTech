@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">  

                @if($gallery->album->isEmpty()) 
                   <div class="alert alert-info"> <strong>Info!</strong> pas de photo dans la gallerie</div>
                @else                   
                    @foreach ($gallery->album as $file)
                        <div class="col-md-4" style="display: inline-block;">
                            <div class="card">
                                <img style="max-height: 140px;max-width: 300px;" class="card-img-top" src="/storage{{ $file->path }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ $file->created_at }}</h4>
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