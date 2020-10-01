   /*$(document).ready(function(){
  $('#cocktails').click(function(e){
    var itemName = $(e.target).text();
    console.log(itemName);
  });
});*/

$(document).ready(function(){
  //Wine Items
  $('#wine_item1').click(function(){
    var item = 'Dona Paterna (minho)';
    var itemValue = '16.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#wine_item2').click(function(){
    var item = 'Vinhas do lasso (lisboa)';
    var itemValue = '16.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#wine_item3').click(function(){
    var item = 'Vicentino (alentejo)';
    var itemValue = '17.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //---------------------------------------------------------------------------
  //Gin Items
  $('#gin_item1').click(function(){
    var item = 'Beefeater';
    var itemValue = '6.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#gin_item2').click(function(){
    var item = 'Bombay sapphire';
    var itemValue = '7.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#gin_item3').click(function(){
    var item = 'Hendriks';
    var itemValue = '10.00$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //---------------------------------------------------------------------------
  //Cocktail Items
  $('#cocktail_item1').click(function(){
    var item = 'French 75';
    var itemValue = '8.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#cocktail_item2').click(function(){
    var item = 'Paloma';
    var itemValue = '8.00$'
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  $('#cocktail_item3').click(function(){
    var item = 'Last word';
    var itemValue = '8.50$';
    var newRow = $('<tr><td>' + item + '</td><td>1</td><td>' + itemValue + '</td></tr>');
    newRow.insertAfter('#table_top');
  });
  //----------------------------------------------------------------------------
})