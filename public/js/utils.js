
var Profile = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        $("#profileForm")[0].submit();
    }
};

var SignUp = {
    check: function (id) {
        if ($.trim($("#" + id)[0].value) == '') {
            $("#" + id)[0].focus();
            $("#" + id + "_alert").show();

            return false;
        };

        return true;
    },
    validate: function () {
        if (SignUp.check("name") == false) {
            return false;
        }
        if (SignUp.check("username") == false) {
            return false;
        }
        if (SignUp.check("email") == false) {
            return false;
        }
        if (SignUp.check("password") == false) {
            return false;
        }
        if ($("#type")[0].value == 2 && SignUp.check("business_type") == false) {
            return false;
        }

        if ($("#type")[0].value == 3 && !$.isNumeric( $("#number_of_invoices")[0].value )) {
            $("#number_of_invoices")[0].focus();
            $("#number_of_invoices_alert").show();
            
            return false;
        }
        else if ($("#type")[0].value == 3 && ($("#number_of_invoices")[0].value < 0 || $("#number_of_invoices")[0].value > 50) ) {
            $("#number_of_invoices")[0].focus();
            $("#number_of_invoices_alert").show();
            
            return false;
            
        }
        if ($("#password")[0].value != $("#repeatPassword")[0].value) {
            $("#repeatPassword")[0].focus();
            $("#repeatPassword_alert").show();

            return false;
        }
        $("#registerForm")[0].submit();
    }
}

$("#type").change(function() {
    var value = $(this).val();
    if (value == 2){
        $("#registerForm .business-type").show();
        $("#registerForm .number-invoices").hide();
    }
    else if(value == 3){
        $("#registerForm .number-invoices").show();
        $("#registerForm .business-type").hide();
    }
    else {
        $("#registerForm .number-invoices").hide();
        $("#registerForm .business-type").hide();
    }
});


$(document).ready(function () {
    $("#registerForm .alert").hide();
    $("div.profile .alert").hide();
    
    if ($("#type")[0].value == 3) {   
        $("#registerForm .number-invoices").show();
        $("#registerForm .business-type").hide();
    }
    else if ($("#type")[0].value == 2){
        $("#registerForm .number-invoices").hide();
        $("#registerForm .business-type").show();        
    }
    else if ($("#type")[0].value == 1){
        $("#registerForm .number-invoices").hide();
        $("#registerForm .business-type").hide();        
    }    
});
