@extends('layouts.admin_layout')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-2 row pull-right">
                    <a class="btn btn-primary" href="{{ route('galleries.addImagesForm', $gallery->event_id) }}">Ajouter des images</a>
                    <a class="btn btn-primary" href="{{ route('galleries.addVideosForm', $gallery->event_id) }}">Ajouter Un video&nbsp&nbsp;&nbsp;&nbsp;</a>
                </div>
                <div id="image-box" class="row">
                    @if($album->isEmpty())
                    <div class="alert alert-info"> <strong>Info!</strong> pas de photos dans la gallerie</div>
                    @else
                        @foreach ($album as $media)
                            <div class="col-md-3" style="display: inline-block;">
                                <div class="card">
                                    @if($media instanceof \App\Image)
                                        <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $media->path }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $media->created_at->toDateString() }}</h5>
                                            <form action="{{ route('galleries.removeImage',[$media->gallery->event_id, $media->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="item pull-right"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%" >
                                                    <i class="zmdi zmdi-delete" style=""></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <img style="height: 150px;max-width: 250px;" class="card-img-top" src="{{ $media->thumbnail }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $media->title }}</h5>
                                            <form action="{{ route('galleries.removeVideo',[$media->gallery->event_id, $media->id]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="item pull-right"  style="border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%" >
                                                    <i class="zmdi zmdi-delete" style=""></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="load-more">
            <button id="load-more" class="btn btn-primary" onclick="return loadMore({!! $gallery->event_id !!});">Voir plus</button>
        </div>
    </div>
    <script>
        function loadMore(gallery) {
            let actual_count = $("#image-box img").length;
            $.ajax({
                type: "get",
                async: true,
                url: '/event/'+gallery+'/gallerie/load_more/count/'+actual_count,
                dataType: 'json',
                success: function (response) {
                    if(response.length === 0) {
                        $("#load-more").addClass("fade");
                    } else {
                        const _csrf = "<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">";
                        $.each(response, function (key, data) {
                            console.log(key, data);
                            if(data.type == 'image') {
                                $('#image-box').append($("<div class=\"col-md-3\" style=\"display: inline-block;\">\n" +
                                    "                                <div class=\"card\">" +
                                    "<img style=\"height: 150px;max-width: 250px;\" class=\"card-img-top\" src=\""+data.path+"\" alt=\"Card image cap\">\n" +
                                    "                                        <div class=\"card-body\">\n" +
                                    "                                            <h5 class=\"card-title mb-3\">"+data.created_at+"</h5>\n" +
                                    "                                            <form action=\"/admin/events/"+gallery+"/gallerie/remove_image/"+data.id+"\" method=\"post\">\n" +
                                    "                                                "+_csrf+"\n" +
                                    "                                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">\n" +
                                    "                                                <button type=\"submit\" class=\"item pull-right\"  style=\"border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%\" >\n" +
                                    "                                                    <i class=\"zmdi zmdi-delete\" style=\"\"></i>\n" +
                                    "                                                </button>\n" +
                                    "                                            </form>\n" +
                                    "                                        </div></div></div>"));
                            } else {
                                $('#image-box').append($("<div class=\"col-md-3\" style=\"display: inline-block;\">\n" +
                                    "                                <div class=\"card\">" +
                                    "<img style=\"height: 150px;max-width: 250px;\" class=\"card-img-top\" src=\""+data.thumbnail+"\" alt=\"Card image cap\">\n" +
                                    "                                        <div class=\"card-body\">\n" +
                                    "                                            <h5 class=\"card-title mb-3\">"+data.created_at+"</h5>\n" +
                                    "                                            <form action=\"/admin/events/"+gallery+"/gallerie/remove_video/"+data.id+"\" method=\"post\">\n" +
                                    "                                                "+_csrf+"\n" +
                                    "                                                <input type=\"hidden\" name=\"_method\" value=\"DELETE\">\n" +
                                    "                                                <button type=\"submit\" class=\"item pull-right\"  style=\"border-radius: 50%;background: #E5E5E5;width: 30px;height: 30px;margin-top: -13%\" >\n" +
                                    "                                                    <i class=\"zmdi zmdi-delete\" style=\"\"></i>\n" +
                                    "                                                </button>\n" +
                                    "                                            </form>\n" +
                                    "                                        </div></div></div>"));
                            }
                        });
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    </script>
@endsection
