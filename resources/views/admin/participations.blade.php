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
                        @if ($participations->isnotEmpty())
                        <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($participations as $part)
                                            <tr>
                                                <td>{{ $part->created_at->diffForHumans() }}</td>
                                                <td>{{ $part->participant->getFullName() }}</td>
                                                <td class="process"><a href="{{ route('participation.download', [$part->id]) }}" target="_blank">{{ $part->file }}</a></td>
                                                <td><a href="{{ route('participation.confirm', [$part->id]) }}" class="btn btn-success">confirmer</a></td>
                                                <td><a href="{{ route('participation.refuse', [$part->id]) }}" class="btn btn-danger">refuser</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <h3>Pas des Participation confirmées</h3>
                            @endif
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection