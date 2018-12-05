<section class="pb100">
    <div class="container" id="speakers">
        <div class="section_title mb50">
            <h3 class="title">
                Comité
            </h3>
        </div>
    </div>
    <div class="row justify-content-center no-gutters">
        @foreach($event->commitee->members as $member)
            <div class="col-md-3 col-sm-6">
                <div class="speaker_box">
                    <div class="speaker_img">
                        <img src="{{ $member->data->photo }}" alt="speaker name">
                        <div class="info_box">
                            <h5 class="name">{{ $member->data->getFullName() }}</h5>
                            <p class="position">CEO Company</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>