
clicked = true;
$(document).ready(function(){
    $("img").click(function(){
        if(clicked){
            
            $(this).removeClass("w3-border w3-border-blue w3-round-xlarge");
            clicked  = false;
        } else {
            $(this).addClass("w3-border w3-border-blue w3-round-xlarge" );
            clicked  = true;
        }   
    });

    $("#button_check").click(function(){
        successReservation();
        time = parseInt($("#choose-time").val());
        if (isNaN(time)){
            $("#missing_time").show();
        }
        else if (time < 8){
            $("#open_warning").show();
           
        }
        else if (time >= 21){
            $("#close_warning").show();
        }
        else {
            successReservation();
            
        }
    });

});

function successReservation() {
    var x = document.getElementById("check");
    var y = document.getElementById("button_check");
    x.style.display = "inline-block";
    y.style.display = "none";
    setTimeout("pageRedirect()", 3000);
  }

  function pageRedirect() {
    window.location.replace("main.html");
  }     