@extends('layouts.public_layout')
@section('content')
<section class="pt100 pb100" style="height:564px;">
    <div class="container" style="margin-top:6%;margin-left:30%;">
        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Adresse E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @elseif(Session::has('resetSucc'))
                        {{ 'email a été envoyé, s\'il vous plaît vérifier votre boîte de réception' }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection