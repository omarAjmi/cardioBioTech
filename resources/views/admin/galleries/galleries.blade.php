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
                @if($galleries->isEmpty())
                <div class="alert alert-info"> <strong>Info!</strong> pas de gallery</div>
                @else
                <div>
                    
                            <div class="table-responsive table-responsive-data2 ">
                                
                                <table class="table table-data2">
                                    <div class="card">
                                    <thead class="card-header">
                                    <tr>
                                        <th>Date</th>
                                        <th>évènnement</th>
                                        <th>totale</th>
                                        <th>Fichies</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $gallery->created_at->diffForHumans() }}</td>
                                            <td>{{ $gallery->event->abbreviation }}</td>
                                            <td>{{ $gallery->album->count() }} images</td>
                                            <td class="process"><a href="{{ route('galleries.files', [$gallery->id]) }}">fichiers</a></td>
                                             <td>
                                                    <div class="table-data-feature">
                                                    
                                                        <a href="">
                                                            <button class="item"  data-original-title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>&nbsp;
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="item"  data-original-title="Delete">
                                                                <i class="zmdi zmdi-delete" style=""></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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