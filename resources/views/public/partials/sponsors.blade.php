<section class="bg-gray pt100 pb100">
    <div class="container">
        <div class="section_title mb50">
            <h3 class="title">
                Nos partenaires
            </h3>
        </div>
        <div class="brand_carousel owl-carousel">
            @foreach($event->sponsors as $sponsor)
                <div class="brand_item text-center">
                    <img src="{{ $sponsor->path }}" alt="{{ $sponsor->name }}">
                </div>
            @endforeach
        </div>
    </div>
</section>