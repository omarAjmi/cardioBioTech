@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <a class="btn btn-primary pull-right" href="{{ route('commitees.addMember', $commitee->event_id) }}">Ajouter un membre</a>
                <div class="row">
                    @if($commitee->members->isEmpty())
                        <div class="alert alert-info"> <strong>Info!</strong> Pas de membres pour le moment</div>
                    @else
                        @foreach ($commitee->members as $member)
                        <div class="col-md-3" style="display: inline-block;">
                            <div class="card">
                                <img style="max-height: 140px;max-width: 300px;" class="card-img-top" src="{{ $member->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ $member->fullname }}</h5>
                                    <form action="{{ route('commitees.removeMember',[
                                        'id'=> $member->commitee_id,
                                        'member_id'=>$member->id]) }}" method="post">
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
