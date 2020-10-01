function openNav() {
  document.getElementById("mySidebar").style.width = "60%";
  document.getElementById("mySidebar").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.display = "none";
}

function actualTime(){
  var currentdate = new Date(); 
  var datetime = "Time: " + currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds(); 
  return datetime
}

function successLicitation() {
  var x = document.getElementById("check");
  var y = document.getElementById("button_check");
  x.style.display = "inline-block";
  y.style.display = "none";

  setTimeout("pageRedirect()", 3000);

}

function pageRedirect() {
  window.location.replace("main.html");
}      


function validLicitation(){
  var valor = document.getElementById("valorLicitacao");
  if (valor.value == 0 || valor.value == null ){
    alert("The value must be grather then 0€");
  }
  else if (valor.value >= 5000){
    alert("The value must be smaller then 5000€");
  }
  else{
    successLicitation();
  }
  console.log("Valor licitacao: " + valor.value + 
    "\n---------\n" + actualTime());
}

/** Pedir toalha */
function requestTowel(){
  var x = document.getElementById("check")
  x.style.display = "inline-block";
}

/**Funcoes Menu Bar */
function dropdown_wine() {
  var x = document.getElementById("wine");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown_gin() {
  var x = document.getElementById("gin");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown_cocktails() {
  var x = document.getElementById("cocktails");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown_main(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

