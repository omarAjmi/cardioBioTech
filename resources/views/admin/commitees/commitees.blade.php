@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Succée</span>
                        {{ Storage::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                @if($commitees->isEmpty())
                <div class="alert alert-info"> <strong>Info!</strong> pas de commitees</div>
                @else
                <div class="">
        
                            <div class="table-responsive table-responsive-data2 ">
                                
                                <table class="table table-data2">
                                    <div class="card">
                                    <thead class="card-header">
                                    <tr>
                                        <th>Date</th>
                                        <th>évènnement</th>
                                        <th>totale</th>
                                        <th>membres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commitees as $com)
                                        <tr>
                                            <td>{{ $com->created_at->diffForHumans() }}</td>
                                            <td>{{ $com->event->abbreviation }}</td>
                                            <td>{{ $com->members->count() }}</td>
                                            <td><a href="{{ route('commitees.members', [$com->id]) }}">membres</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                @endif
            </div>
        </div>
    </div> 
@endsection