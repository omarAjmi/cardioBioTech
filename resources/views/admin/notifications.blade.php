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
                 @if ($notifications->isEmpty())
                            <div class="alert alert-info"> <strong>Info!</strong> pas de notification</div>
                        @else
                <div class="">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-responsive table-responsive-data2 card">
                            <table class="table table-data2" id="table_id">
                                <thead class="card-header">
                                        <th>Date</th>
                                        <th>Participant</th>
                                        <th>Notification</th>
                                        <th>Fichier</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notif)
                                        <tr>
                                            <td>{{ $notif->created_at->toDateTimeString() }}</td>
                                            <td>{{ $notif->participation->participant->getFullName() }}</td>
                                            <td>{{ $notif->context }}</td>
                                            <td class="process"><a href="{{ route('participation.download', [
                                                                                                $notif->participation->id,
                                                                                                $notif->participation->event_id
                                                                                                ]) }}" target="_blank">{{ $notif->participation->file }}</a></td>
                                            @if ($notif->seen)
                                                <td><i class="fa fa-eye"></i>&nbsp;

                                              </td>

                                            @else
                                                <td><i class="fa fa-eye-slash"></i></td>
                                            @endif
                                            <td>
                                                @if ($notif->seen)
                                               
                                                    <button class="item"  style="border-radius: 50%;background: #cecece;width: 30px;height: 30px"
                                                    disabled >
                                                      <i class="zmdi zmdi-eye"></i>

                                                    </button>
                                               
                                                @else
                                                    <form action="{{ route('notif.makeSeen', $notif->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button class="item"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px" >
                                                        <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                    </form>
                                               
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $notifications->setPath(url()->current())->render() }}
                    </div>
                </div>
                @endif
               
            </div>
        </div>
    </div>
@endsection
