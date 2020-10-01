function myFunction() {
  var x = document.getElementById("check");
  var y = document.getElementById("button_check")
    x.style.display = "inline-block";
    y.style.display = "none";
}

function dropdown_breakfast() {
  var x = document.getElementById("breakfast");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown_snacks() {
  var x = document.getElementById("snacks");
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown_drinks() {
  var x = document.getElementById("drinks");
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

/** Add to the list selected product */
$(document).ready(function(){
  //Breakfast
  $('#breakfast_item1').click(function(){
    var item = 'Scrambled eggs with bacon';
    var itemValue = '12.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#breakfast_item2').click(function(){
    var item = 'Toast with beans';
    var itemValue = '18.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#breakfast_item3').click(function(){
    var item = 'Vegan Toast';
    var itemValue = '11.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#breakfast_item4').click(function(){
    var item = 'Cereal with milk';
    var itemValue = '5.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //---------------------------------------------------------------------------
  //Snacks
  $('#snacks_item1').click(function(){
    var item = 'Cheese burguer';
    var itemValue = '10.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#snacks_item2').click(function(){
    var item = 'Vegan omelet';
    var itemValue = '14.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#snacks_item3').click(function(){
    var item = 'Ham and Cheese toast';
    var itemValue = '8.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#snacks_item4').click(function(){
    var item = 'Large fries';
    var itemValue = '4.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //---------------------------------------------------------------------------
  //Drinks
  $('#drinks_item1').click(function(){
    var item = 'Bottle of water (35cl)';
    var itemValue = '1.50$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#drinks_item2').click(function(){
    var item = 'Bottle of water (50cl)';
    var itemValue = '2.50$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#drinks_item3').click(function(){
    var item = 'Juice of the day';
    var itemValue = '3.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#drinks_item4').click(function(){
    var item = 'Tea';
    var itemValue = '1.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#drinks_item5').click(function(){
    var item = 'Coffee';
    var itemValue = '0.90$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#drinks_item6').click(function(){
    var item = 'Coca-cola';
    var itemValue = '1.70$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //----------------------------------------------------------------------------
})

function dropdown_main(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
