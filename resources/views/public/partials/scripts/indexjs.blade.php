<!-- jquery -->
<script src="/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="/js/popper.js"></script>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/parallax.min.js"></script>

<script src="/js/aos.js"></script>




<!--Counter up -->
<script src="/js/jquery.counterup.min.js"></script>
<!--Counter down -->
<script src="/js/jquery.countdown.min.js"></script>
<!-- WOW JS -->
<script src="/js/wow.min.js"></script>
<script src="/js/main_slider.js"></script>
<!-- Custom js -->
<script src="/js/main.js"></script>


<!--parallax -->

<script src="/js/select2.min.js"></script> 
<!--===============================================================================================-->
<script src="/js/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->

<script src="/js/main.js"></script>
<script>
@if($events->isNotEmpty())
    var startDate = "@if (!is_null($events)){!! $events->first()->start_date->toDateString() !!}-{!! $events->first()->start_date->toTimeString() !!}@endif"
@endif	
 $('.counter').counterUp({
        delay: 5,
        time: 3000
    });
$(".countdown")
        .countdown(startDate, function(event) {
            $(this).html(
                event.strftime('<div>%w <span>Semaines</span></div>  <div>%D <span>Jours</span></div>  <div>%H<span>Heures</span></div> <div>%M<span>Minutes</span></div> <div>%S<span>Secondes</span></div>')
            );
        });
</script>
<script>
    $("#create").click(function () {
        $("#register_form").show();
        $("#login_form").hide();
        $("#log-pic").hide();
        $("#register-pic").show();

    });


    $("#create2").click(function () {
        $("#register_form").hide();
        $("#login_form").show();
        $("#log-pic").show();
        $("#register-pic").hide();
    });

    @if(Session::has('outdated'))
        $('document').ready(function () {
            $('#outDatedModal').modal('show');
        })
    @endif

    @if(Session::has('registerfail'))
        $('document').ready(function () {
            $('#myModal').modal('show');
            $("#register_form").show();
            $("#login_form").hide();
            $("#log-pic").hide();
            $("#register-pic").show();
        })
    @elseif($errors->count() > 0 and Session::get('previous') == route('welcome'))
        $('document').ready(function () {
            $('#myModal').modal('show');
            $("#register_form").hide();
            $("#login_form").show();
            $("#log-pic").show();
            $("#register-pic").hide();
        })
    @endif

    @if(Session::has('partSuccess'))
        $('document').ready(function () {
            $('#staticModal').modal('show');
        })
    @elseif(Session::has('partFail'))
        $('document').ready(function () {
            $('#staticModal').modal('show');
        })
    @endif
</script>
<script type="text/javascript">

    jQuery(document).ready(function ($) {
    $('.galery-item').on('click', function () {
    $('.owl-carousel').trigger('stop.owl.autoplay');

   
    var carousel = $('.owl-carousel').data('owl.carousel');
    carousel.settings.autoplay = false; //don't know if both are necessary
    carousel.options.autoplay = false;
    $('.owl-carousel').trigger('refresh.owl.carousel');
});
});
</script>
