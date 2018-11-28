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
<form method="post">
	@csrf
	<table width="300px" id="Table" border="1" style="border-collapse:collapse;background-color:#E8DCFF">
			<td>5</td>
			<td>Bread</td>
			<td><input class="txt" type="text" name="amount[]" value=""/></td>

			
		</tr>
	</table>
	<div class="display">
		<div value="20"><span>Sum :</span> <span id="sum" value="">0</span></div>
	</div>
		</div>
		<button type="submit" class="btn btn-primary">Send</button>
	</div>
</form>
<input type="button" id="addmorebutton0"  value="Add Row Below" onclick="addRow()"/>
<script>
$(document).ready(function(){
  //iterate through each textboxes and add keyup
  //handler to trigger sum event
	// listener()  

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
function listener () {
	$(".txt").each(function() {

    $(this).keyup(function(){
      calculateSum();
    });
  });
}
function addRow()
{
	let table = document.querySelector('#Table');
	let tr = document.createElement('tr');
	let td1 = document.createElement('td');
	let td2 = document.createElement('td');
	let td3 = document.createElement('td');
	let inp = document.createElement('input');
	inp.type = "text";
	inp.classList = "txt";
	inp.name = "amount[]";
	td3.appendChild(inp);
	td1.innerHTML = "5";
	td2.innerHTML = "Bread";
	tr.appendChild(td1);
	tr.appendChild(td2);
	tr.appendChild(td3);
	table.appendChild(tr);

	// listener();
}
</script>
</html>