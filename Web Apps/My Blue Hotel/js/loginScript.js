window.onload = function() {
  if (window.jQuery) {  
      // jQuery is loaded  
      console.log("Yeah! Jquery's running");
  } else {
      // jQuery is not loaded
      console.log("jQuery Doesn't Work");
  }
};

$( document ).ready(function() {
  console.log("JQ ready!");

  var userName = $('#userNameLogin').val();
  var passWord = $('#passLogin').val();

  $('#submitLogin').click(function(){
    console.log("Click clack click");
    console.log(userName);
    console.log(passWord);
    
    $('.loginData').hide();
    $('.authent').show();
    setTimeout(function() {
      window.location.href = "main.html"
    }, 3000);
  });
  $('#infoButtonBar').click(function(){
    //Show information Zone
    $('.loginData').hide();
    $('.infoData').show();
  });
  $('#homeButtonBar').click(function(){
    $('.infoData').hide();
    $('.loginData').show();
  });

});
