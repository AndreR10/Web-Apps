$(function () {
    $("#errorRestaurantName").hide();
    $("#errorAddress").hide();
    $("#errorCity").hide();
    $("#errorZip").hide();
    $("#errorFirstname").hide();
    $("#errorLastname").hide();
    $("#errorPhone").hide();
    $("#errorEmail").hide();
    $("#errorKitchen").hide();
    $("#errorPassword").hide();
    $("#errorConfirmPassword").hide();

    var errorRestaurant = false;
    var errorAddress = false;
    var errorCity = false;
    var errorZip = false;
    var errorFirstname = false;
    var errorLastname = false;
    //var errorPhone = false;
    var errorKitchen = false;
    var errorEmail = false;
    var errorPassword = false;
    var errorConfirmPassword = false;


    $('#inputrestaurantName').focusout(function () {
        checkRestaurant();
    });

    $('#inputAddress').focusout(function () {
        checkAddress();
    });

    $('#inputCity').focusout(function () {
        checkCity();
    });


    $('#inputZip').focusout(function () {
        checkZip();
    });

    $('#inputfirstName').focusout(function () {
        checkFirstName();
    });

    $('#inputlastName').focusout(function () {
        checkLastName();
    });

    // $('#inputphone').focusout(function () {
    //     checkPhone();
    // });

    $('#inputemail').focusout(function () {
        checkEmail();
    });

    $('#selectType').focusout(function () {
        checkType();
    });

    $('#inputpassword').focusout(function () {
        checkPassword();
    });

    $('#inputconfirmPassword').focusout(function () {
        checkConfirmPassword();
    });


    function checkRestaurant() {
        var val = $('#inputrestaurantName').val();

        var Length = val.length;

        if (val != '') {
            $('#errorRestaurantName').hide();
            errorRestaurant = false;
        } else {
            $('#errorRestaurantName').html("* Restaurant name is missing");
            $('#errorRestaurantName').show();
            errorRestaurant = true;
        }
    }

    function checkAddress() {
        var val = $('#inputAddress').val();
        var length = val.length;

        if (val != '') {
            $('#errorAddress').hide();
            errorAddress = false;
        } else {
            $('#errorAddress').html("* Address is missing");
            $('#errorAddress').show();
            errorAddress = true;
        }
    }

    function checkCity() {
        var val = $('#inputCity').val();
        var length = val.length;

        if (val != '') {
            $('#errorCity').hide();
            errorCity = false;
        } else {
            $('#errorCity').html("* City is missing");
            $('#errorCity').show();
            errorCity = true;
        }
    }

    function checkZip() {
        var val = $('#inputZip').val();
        var length = val.length;

        if (val != '') {
            $('#errorZip').hide();
            errorZip = false;

        } else {
            if (val.includes("-", 3)) {
                $('#errorZip').html("* Postal Code not valid");
                $('#errorZip').show();
                errorZip = true;
            }
            $('#errorZip').html("* Postal Code not valid");
            $('#errorZip').show();
            errorZip = true;
        }
    }

    function checkFirstName() {
        var val = $('#inputfirstName').val()

        var firstnameLength = val.length;

        if (firstnameLength < 0) {
            $('#errorFirstname').html("* Missing First Name");
            $('#errorFirstname').show();
            errorFirstname = true;

        } else if (/^[a-zA-Z]+$/.test(val)) {
            $('#errorFirstname').hide();
            errorFirstname = false;

        } else {
            $('#errorFirstname').html("* Must contain only letters");
            $('#errorFirstname').show();
            errorFirstname = true;
        }
    }

    function checkLastName() {
        var val = $('#inputlastName').val()

        var lastnameLength = val.length;

        if (lastnameLength < 0) {
            $('#errorLastname').html("* Missing Last Name");
            $('#errorLastname').show();
            errorFirstname = true;

        } else if (/^[a-zA-Z]+$/.test(val)) {
            $('#errorLasttname').hide();
            errorLastname = false;

        } else {
            $('#errorLastname').html("* Must contain only letters");
            $('#errorLastname').show();
            errorLastname = true;
        }
    }


    function checkEmail() {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

        if (pattern.test($("#inputemail").val())) {
            $("errorEmail").hide();
            errorEmail = false;
        } else {
            $("#errorEmail").html("* Invalid email address");
            $("#errorEmail").show();
            errorEmail = true;
        }
    }

    function checkType() {
        var selected = $('#selectType').val();

        if (selected == 'default') {
            $("#errorKitchen").html("* What is your restaurant kitchen type?");
            $("#errorKitchen").show();
            errorKitchen = true;

        } else {
            $("#errorKitchen").hide();
            errorKitchen = false;
        }
    }

    function checkPassword() {
        var passLength = $("#inputpassword").val().length;

        if (passLength < 8) {
            $("#errorPassword").html("* Must contain at least 8 characters");
            $("#errorPassword").show();
            errorPassword = true;
        } else {
            $("errorPassword").hide();
            errorPassword = false;
        }
    }


    function checkConfirmPassword() {
        var password = $("#inputpassword").val();
        var confirmPassword = $("#inputconfirmPassword").val();

        if (password != confirmPassword) {
            $("#errorConfirmPassword").html("* Passwords don´t match");
            $("#errorConfirmPassword").show();
            errorConfirmPassword = true;
        } else {
            $("errorConfirmPassword").hide();
            errorConfirmPassword = false;
        }
    }



    $("#form").submit(function () {

        var errorRestaurant = false;
        var errorAddress = false;
        var errorCity = false;
        var errorZip = false;
        var errorFirstname = false;
        var errorLastname = false;
        var errorEmail = false;
        var errorKitchen = false;
        var errorPassword = false;
        var errorConfirmPassword = false;

        checkRestaurant();
        checkAddress();
        checkCity();
        checkZip();
        checkFirstName();
        checkLastName();
        checkEmail();
        checkType();
        checkPassword();
        checkConfirmPassword();



        if (errorRestaurant === false && errorAddress === false && errorCity === false && errorZip === false && errorFirstname === false && errorLastname === false && errorEmail === false && errorKitchen == false && errorPassword === false && errorConfirmPassword === false) {
            return true;
        } else {
            return false;
        }
    });

});