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
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
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