@extends('layouts.admin_layout')
@section('content')
@if (Session::has('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Succés</span>
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($commitee->members as $member)
                        <div class="col-md-3" style="display: inline-block;">
                            <div class="card">
                                <img style="max-height: 140px;max-width: 300px;" class="card-img-top" src="/storage{{ $member->data->photo }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ $member->data->getFullName() }}</h5>
                                    <form action="{{ route('commitees.removeMember',['commitee_id'=>$member->commitee->id, 'member_id'=>$member->data->id]) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
@endsection
