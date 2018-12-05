<section class="pt100 pb100">
    <div class="container">
        <div class="section_title">
            <h3 class="title">
                À propos
            </h3>
        </div>
        <div class="row justify-content-center">
            @if(!is_null($event->about))
                @foreach ($event->breakLongAbout() as $p)
                    <div class="col-md-6 col-12">
                        <p>{{ $p }}</p> <br>
                    </div>
                @endforeach
            @else
                <div class="col-md-6 col-12">
                    <p>Non disponible</p>
                </div>
            @endif
        </div>
    </div>
</section>