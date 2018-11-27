<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

Amount : <input type="text" class="amount"><br/> 
Amount : <input type="text" class="amount"><br/> 
Amount : <input type="text" class="amount"><br/> 
Expense : <input type="text" id="expense"><br/>

<input type="submit" name="add" class="btn btn primary" id="add"/>

</body>
<script>
$(document).ready(function(){
 var i=1;
$("#add").click(function(){
$('#addr'+i).html("<td>"+ (i+1) +"</td><td><select class='form-control' name='cat"+i+"'><option value='bill'>Bill</option><option value='exchange'>Exchange</option></select><td><input name='name"+i+"' type='text' placeholder='Item Name' class='form-control input-md'  /> </td><td class='amount'><input  name='mail"+i+"' type='number' min='0.01' step='0.01' placeholder='Amount' id='amount"+i+"'  class='form-control input-md'></td><td><input type='file' name='upload"+i+"' class='form-control'/></td>");

 $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
 i++; 
});
$("#delete_row").click(function(){
		if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
});

});

</script>
<script>
$(".amount").on('change', calculate);
function calculate() {
  var sum = 0;
  $('.amount').each(function(i, obj) {
    if ($.isNumeric(this.value)) {
      sum += parseFloat(this.value);
    }
  });
  $('#expense').val(sum);
}
</script>
</html>