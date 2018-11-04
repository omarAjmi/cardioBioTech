<!--get tickets section -->
    <section class="bg-img pt100 pb100" style="background-image: url('/img/bg/tickets.png');">
        <div class="container">
            <div class="section_title mb30">
                <h3 class="title color-light">
                    Prendre part
                </h3>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-9 text-md-left text-center color-light">
                    Nous avons le plaisir de vous inviter au notre prochain congrès pour faire partie de notre héritage toujours croissant.
                </div>
                <div class="col-md-3 text-md-right text-center">
                    @if ($events->isNotEmpty())
                        <a href="{{ route('event',[$events->first()->id]) }}" class="btn btn-primary btn-rounded mt30">S'inscrire</a>
                    @else
                        <a href="#" class="btn btn-primary btn-rounded mt30">S'inscrire</a>
                    @endif    
                </div>
            </div>
        </div>
    </section>
    <!--get tickets section end-->