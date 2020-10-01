$(function(){
    $("#errorFirstname").hide();
    $("#errorLastname").hide();
    $("#errorPassword").hide();
    $("#errorConfirmPassword").hide();
    $("#errorEmail").hide();
    $("#errorUsername").hide();

    var errorFirstname = false;
    var errorLastname = false;
    var errorPassword = false;
    var errorConfirmPassword = false;
    var errorEmail = false;
    var errorUsername = false;

    $('#firstName').focusout(function(){
        checkFirstName(); 
    });

    $('#lastName').focusout(function(){
        checkLastName(); 
    });

    $('#password').focusout(function(){
        checkPassword(); 
    });

    $('#confirmPassword').focusout(function(){
        checkConfirmPassword(); 
    });

    $('#email').focusout(function(){
        checkEmail(); 
    });

    $('#username').focusout(function(){
        checkUsername(); 
    });


    function checkFirstName(){
        var val = $('#firstName').val()
       
        var fistnameLength = val.length;
        
        if (/^[a-zA-Z]+$/.test(val)){
            if(fistnameLength < 2 || fistnameLength > 10) {
                $('#errorFirstname').html("* Should be between 2 - 10 characters");
                $('#errorFirstname').show();
                errorFirstname = true;
            } else {
                $('#errorFirstname').hide();
                errorFirstname = false;
            }
        } else {
            $('#errorFirstname').html("* Must contain only letters");
            $('#errorFirstname').show();
            errorFirstname = true;
        }

        
    }

    function checkLastName(){
        var val = $('#lastName').val()
        
        var lastnameLength = val.length;
        
        if (/^[a-zA-Z]+$/.test(val)){
            if(lastnameLength < 2 || lastnameLength > 10) {
                $('#errorLastname').html("* Should be between 2 - 10 characters");
                $('#errorLastname').show();
                errorLastname = true;
            } else {
                $('#errorLastname').hide();
                errorLastname = false;
            }
        } else {
            $('#errorLastname').html("* Must contain only letters");
            $('#errorLastname').show();
            errorLastname = true;
        }

        
    }

    function checkPassword(){
        var passLength = $("#password").val().length;

        if(passLength < 8){
            $("#errorPassword").html("* Must contain at least 8 characters");
            $("#errorPassword").show();
            errorPassword = true;
        } else {
            $("errorPassword").hide();
            errorPassword = false;
        }
    }


    function checkConfirmPassword(){
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();

        if(password != confirmPassword){
            $("#errorConfirmPassword").html("* Passwords don´t match");
            $("#errorConfirmPassword").show();
            errorConfirmPassword = true;
        } else {
            $("errorConfirmPassword").hide();
            errorConfirmPassword = false;
        }
    }

    function checkEmail(){
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        

        if(pattern.test($("#email").val())){
            $("errorEmail").hide();
            errorEmail = false;
        } else {
            $("#errorEmail").html("* Invalid email address");
            $("#errorEmail").show();
            errorEmail = true;
        }
    }

    function checkUsername(){
        var val = $('#username').val()
       
        var usernameLength = val.length;
        
    
        if(usernameLength < 2 || usernameLength > 10) {
            $('#errorUsername').html("* Should be between 2 - 10 characters");
            $('#errorUsername').show();
            errorUsername = true;
        } else {
            $('#errorUsername').hide();
            errorUsername = false;
        }   
    }


    $("#form").submit(function(){

        errorFirstname = false;
        errorLastname = false;
        errorPassword = false;
        errorConfirmPassword = false;
        errorEmail = false;
        errorUsername = false;

        checkFirstName();
        checkLastName();
        checkPassword();
        checkConfirmPassword();
        checkEmail();
        checkUsername();

        if(errorFirstname === false && errorLastname === false && errorPassword === false && errorConfirmPassword === false && errorEmail === false && errorUsername === false){
            return true;
        } else {
            return false;
        }
    });

});