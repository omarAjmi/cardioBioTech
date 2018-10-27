@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($commitee->members as $member)
                        <div class="col-md-3" style="display: inline-block;">
                            <div class="card">
                                <img style="max-height: 140px;max-width: 300px;" class="card-img-top" src="/storage/users/avatars/{{ $member->data->photo }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ $member->data->getFullName() }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
