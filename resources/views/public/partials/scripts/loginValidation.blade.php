<script>
    $('document').ready(function () {
        $('#myModal').modal('show');
        $("#register_form").hide();
        $("#login_form").show();
        $("#log-pic").show();
        $("#register-pic").hide();
        
        var inputlg = $('.lg-val .input100');
        for(var i=0; i<inputlg.length; i++) {
                showValidate(inputlg[i]);
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