<script>
    $('document').ready(function () {
        $('#myModal').modal('show');
        $("#register_form").show();
        $("#login_form").hide();
        $("#log-pic").hide();
        $("#register-pic").show();
        
        var inputrg = $('.rg-val .input100');
        for (var i = 0; i < inputrg.length; i++) {
                showValidate(inputrg[i]);
        }
    })

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
</script>