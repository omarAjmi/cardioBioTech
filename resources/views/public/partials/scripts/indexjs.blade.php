<!-- jquery -->
<script src="/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!--parallax -->
<script src="/js/parallax.min.js"></script>
<!--Counter up -->
<script src="/js/jquery.counterup.min.js"></script>
<!--Counter down -->
<script src="/js/jquery.countdown.min.js"></script>
<!-- WOW JS -->
<script src="/js/wow.min.js"></script>
<!-- Custom js -->
<script src="/js/main.js"></script>



<script src="/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="/js/main.js"></script>
<script>
	var startDate = "@if (!is_null($events)){!! $events->first()->start_date->toDateString() !!} {!! $events->first()->start_date->toTimeString() !!}@endif"
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
</script>
