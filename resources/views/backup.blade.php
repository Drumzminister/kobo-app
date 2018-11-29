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
<style>
  body {
				font-family: sans-serif;
			}
			#summation {
				font-size: 18px;
				font-weight: bold;
				color:#174C68;
			}
			.txt {
				background-color: #FEFFB0;
				font-weight: bold;
				text-align: right;
			}
</style>
<body>
<div class="container">
  <div class="row col-md-6">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<table width="300px" border="1" style="border-collapse:collapse;background-color:#E8DCFF">
	<tr>
		<td width="40px">1</td>
		<td>Butter</td>
		<td><input class="txt" type="text" name="txt"/></td>
	</tr>
	<tr>
		<td>2</td>
		<td>Cheese</td>
		<td><input class="txt" type="text" name="txt"/></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Eggs</td>
		<td><input class="txt" type="text" name="txt"/></td>
	</tr>
	<tr>
		<td>4</td>
		<td>Milk</td>
		<td><input class="txt" type="text" name="txt"/></td>
	</tr>
	<tr>
		<td>5</td>
		<td>Bread</td>
		<td><input class="txt" type="text" name="txt"/></td>
    </tr>
    <tr>
		<td>5</td>
		<td>Bread</td>
		<td><input class="txt" type="text" name="txt"/></td>
	</tr>
	<tr id="summation">
		<td>&nbsp;</td>
		<td align="right">Sum :</td>
		<td align="center"><span id="sum">0</span></td>
  </tr>
    
</table>
  </div>
</div>

<table id="Table" border="1">
        <tr>
            <td><b>Inventory item</b></td>
            <td><b>Description</b></td>
						<td><b>Qty sold</b></td>
						<td><b>Price of Product</b></td>
						<td><b>Customer</b></td>
						<td><b>Add row</b></td>
				</tr>
			
        <tr>
            <td><input size=25 type="text" id="Measured0[]" contenteditable="true" value=''></td>
            <td><input size=25 type="text" id="Inclination0[]" contenteditable='true' value=''></td>
						<td><input size=25 type="text" id="Azimuth0[]" contenteditable='true' value=''></td>
            <td><input size=25 type="text" id="Azimuth0[]" contenteditable='true' value=''></td>
            <td><input size=25 type="text" id="Azimuth0[]" contenteditable='true' value=''></td>						
						<td><input type="button" id="addmorebutton0" value="Add Row Below" onclick="addRow(this)"/></td>
						
					</tr>
					<td id="sum">Total: N </td>
				
			
</table>

<script>
$(document).ready(function(){
  //iterate through each textboxes and add keyup
  //handler to trigger sum event
  $(".txt").each(function() {

    $(this).keyup(function(){
      calculateSum();
    });
  });

});
function calculateSum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".txt").each(function() {

    //add only if the value is number
    if(!isNaN(this.value) && this.value.length!=0) {
      sum += parseFloat(this.value);
    }
  });
  //.toFixed() method will roundoff the final sum to 2 decimal places
  $("#sum").html(sum.toFixed(2));
}
</script>
<script>
function addRow(row)
{
	var i = row.parentNode.parentNode.rowIndex;
	var tr = document.getElementById('Table').insertRow(i+1);
	tr.innerHTML = row.parentNode.parentNode.innerHTML;
	var inputs = tr.querySelectorAll("input[type='text']");
	for(var i=0; i<inputs.length; i++)
		inputs[i].value = "";
}

	
window.onbeforeunload = function() {
	var ta = document.getElementById("Measured0[]").value;
	if(ta.length > 0 ){
		return "You will lose your inputed data";
	}
}
</script>
</html>