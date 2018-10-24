@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Évènements</h3>
                        
                        @if ($events->isEmpty())
                            <h4>Pas encore des évènnement</h4>
                        @else
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th>abbreviation</th>
                                            <th>titre</th>
                                            <th>programme</th>
                                            <th>début</th>
                                            <th>fin</th>
                                            <th>etat</th>
                                            <th>options</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                      
                                        @foreach ($events as $event)
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $event->abbreviation }}</td>
                                                <td>
                                                    <span class="block-email">{{ $event->title }}</span>
                                                </td>
                                                <td class="desc"><a href="{{ route('admin.downloadFileEvent', [
                                                    'id'=>$event->id,
                                                    'filename'=>$event->program_file
                                                    ]) }}">{{ $event->program_file }}<a>
                                                        
                                                    </td>
                                                <td>{{ $event->start_date ->toDayDateTimeString()}}</td>
                                                <td>{{ $event->end_date->toDayDateTimeString() }}</td>
                                                @if ($event->start_date<now())
                                                    <td>
                                                        <span class="status--denied">dépasser</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="status--process">en attente</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                        <a href="{{ route('admin.previewEvent', [$event->id]) }}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <form action="{{ route('admin.deleteEvent', [$event->id]) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
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