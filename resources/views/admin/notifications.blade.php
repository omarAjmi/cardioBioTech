@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                        You successfully read this important alert.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Participant</th>
                                        <th>Notification</th>
                                        <th>Fichier</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notif)
                                        <tr>
                                            <td>{{ $notif->created_at->diffForHumans() }}</td>
                                            <td>{{ $notif->participation->participant->getFullName() }}</td>
                                            <td>{{ $notif->context }}</td>
                                            <td class="process"><a href="{{ route('participation.download', [$notif->participation->id]) }}" target="_blank">{{ $notif->participation->file }}</a></td>
                                            @if ($notif->seen)
                                                <td><i class="fa fa-eye"></i></td>
                                            @else
                                                <td><i class="fa fa-eye-slash"></i></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="{{ route('welcome') }}">Cardio Bio Tech</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection