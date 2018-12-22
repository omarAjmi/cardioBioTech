@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                            {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        @if ($participations->isnotEmpty())
                            <div class="table-responsive table-responsive-data2 ">
                                <table class="table table-data2" id="table_id">
                                    <div class="card">
                                    <thead class="card-header">
                                        <tr>
                                            <th>Date</th>
                                            <th>titre</th>
                                            <th>Participant</th>
                                            <th>Fichier</th>
                                            <th>affiliation</th>
                                            <th>autheurs</th>
                                            <th>session</th>
                                            <th>status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($participations as $part)
                                            <tr>
                                                <td>{{ $part->created_at->diffForHumans() }}</td>
                                                <td> <span style="word-break: break-word;white-space: pre-line;">{{ $part->title }}</span></td>
                                                <td><a href="{{ route('profile', [$part->participant->id]) }}">{{ $part->participant->getFullName() }}</a>
                                                </td>
                                                <td class="process"><a href="{{ route('participation.download', [
                                                                                                            $part->event_id,
                                                                                                            $part->id
                                                                                                            ]) }}" target="_blank">{{ $part->file_name }}.zip</a>
                                                </td>
                                                <td style="max-width: 50px"><span style="word-break: break-word;white-space: pre-line;">{{ $part->affiliation }}</span></td>
                                                <td style="max-width: 50px"><span style="word-break: break-word;white-space: pre-line;">{{ $part->authors }}</span></td>
                                                <td style="max-width: 50px"><span style="">{{ $part->session }}</span></td>
                                                <td>
                                                    @if ($part->confirmation)
                                                        <span class="status--process">confirmée</span>
                                                    @else
                                                        <span class="status--denied">en attente</span>
                                                    @endif
                                                </td>
                                                <td >
                                                    <div  style="margin-left:  50%">
                                                        @if($part->confirmation)
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="item"style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px"  >
                                                                <i class="zmdi zmdi-delete" ></i>
                                                            </button>
                                                       @else
                                                            <form action="{{ route('participation.confirm',[ $part->event_id,
                                                                                                             $part->id
                                                                                                            ])}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button type="submit" class="item" style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px"  >
                                                                    <i class="zmdi zmdi-check-circle"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('participation.refuse',[ $part->event_id,
                                                                                                             $part->id
                                                                                                            ])}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="item"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px" >
                                                                    <i class="zmdi zmdi-delete" style=""></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </div>
                                </table>
                            </div>
                            @else
                            <div class="alert alert-info"> <strong>Info!</strong>Pas de Participations</div>
                            @endif
                    </div>
                </div>
    
              
            </div>
        </div>
    </div> 
@endsection
