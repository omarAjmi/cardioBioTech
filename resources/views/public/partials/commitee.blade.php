@if($scientificCommitee->isNotEmpty())
<!--scientific commitee-->
    <section class="pb100">
        <div class="container" id="speakers">
            <div class="section_title mb50">
                <h3 class="title">
                    Comité Scientifique
                </h3>
            </div>
        </div>
        <div class="row justify-content-center no-gutters">
            @foreach($scientificCommitee as $member)
                <div class="col-md-3 col-sm-6">
                    <div class="speaker_box">
                        <div class="speaker_img">
                            <img src="{{ $member->image }}" alt="speaker name">
                            <div class="info_box">
                                <h5 class="name">{{ $member->fullname }}</h5>
                                <p class="position">{{ $member->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
<!--scientific commitee-->
@endif

@if($evaluationCommitee->isNotEmpty())
    <!--evaluation commitee-->
    <section class="pb100">
        <div class="container" id="speakers">
            <div class="section_title mb50">
                <h3 class="title">
                    Comité D'évaluation
                </h3>
            </div>
        </div>
        <div class="row justify-content-center no-gutters">
            @foreach($evaluationCommitee as $member)
                <div class="col-md-3 col-sm-6">
                    <div class="speaker_box">
                        <div class="speaker_img">
                            <img src="{{ $member->image }}" alt="speaker name">
                            <div class="info_box">
                                <h5 class="name">{{ $member->fullname }}</h5>
                                <p class="position">{{ $member->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--evaluation commitee-->
@endif