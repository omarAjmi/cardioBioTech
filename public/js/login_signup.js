
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var inputlg = $('.lg-val .input100');
    var inputrg = $('.rg-val .input100');
    $(".lg-btn").click(function () {
        var check = true;

        for(var i=0; i<inputlg.length; i++) {
            if(validate(inputlg[i]) == false){
                showValidate(inputlg[i]);
                check=false;
            }
        }

        return check;
    });

    $(".rg-btn").click(function () {
        var check = true;

        for (var i = 0; i < inputrg.length; i++) {
            if (validate(inputrg[i]) == false) {
                showValidate(inputrg[i]);
                check = false;
            }
        }

        return check;
    });


    $(".lg-btn").click(function () {
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $(".rg-btn").click(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);