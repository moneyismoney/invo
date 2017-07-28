
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
//    alert ('test alert333!');
    $("#registerForm .alert").hide();
    $("div.profile .alert").hide();
    $("#registerForm .number-invoices").hide();
    $("#registerForm .business-type").hide();
});
