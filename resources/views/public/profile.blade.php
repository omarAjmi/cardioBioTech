@extends('layouts.public_layout')
@section('content')
    <div id="head-img">
        <img src="/img/bg/profile.jpg">
    </div>
    <!--header end here-->
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center" style="margin-top: -50%" >
                    <img src="/storage/users/avatars/{{ $user->photo }}" class="avatar img-circle img-thumbnail" alt="avatar" style="border: 2px dashed #c7c7c9">
                    <h6>Upload a different photo...</h6>
                    <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input type="file" class="text-center center-block file-upload" name="avatar">
                        <button class="btn btn-lg btn-primary btn-rounded" type="submit">Upload</button>
                    </form>
                </div>
                </hr><br>
            </div><!--/col-3-->
            <div class="col-9 col-sm-9 col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="{{ route('profile.update') }}" method="POST" id="registrationForm">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">                          
                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Nom</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="nom" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Prénom</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="prénom" placeholder="first name" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="form-group">                          
                                <div class="col-xs-6">
                                    <label for="email"><h4>email</h4></label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="address"><h4>Addresse</h4></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Addresse" value="{{ $user->address }}">
                            </div>
                            <div class="col-xs-6">
                                <label for="phone"><h4>Téléphone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Téléphone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <br>
                                    <button class="btn btn-lg btn-primary btn-rounded" type="submit">Save</button>
                                    <button class="btn btn-lg btn-rounded" type="reset"> Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@include('public.partials.subscribe')   
@endsection