<!--footer start -->
<div class="copyright_footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <p>
                    Copyright &copy;
                    <script>document.write(new Date().getFullYear());</script> Tous droits reservés | Association de Médecine et de Biotechnologie.
                </p>
            </div>
            <div class="col-12 col-md-6 ">
                <ul class="footer_menu ">
                    <li>
                        <a href="{{ route('welcome') }}">Accueil</a>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}#speakers">Comité</a>
                    </li>
                    <li>
                        @if (!is_null($events->first()))
                            <a href="{{ route('event', [$events->first()->id]) }}">Événements</a>
                        @else
                            <a href="#">Événements</a>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contactez nous</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--footer end -->
<!-- modal static -->
    <div class="modal fade" id="outDatedModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Désolé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        {{ Session::get('outdated') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal static -->
