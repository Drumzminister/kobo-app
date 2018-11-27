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
		<td>6</td>
		<td>Soap</td>
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

<input type="button" onclick="cloneRow()" value="Clone Row" />
  <input type="button" onclick="createRow()" value="Create Row" />
  <table>
    <tbody id="tableToModify">
      <tr id="rowToClone">
        <td></td>
        <td><input type="text"/></td>
      </tr>
    </tbody>
  </table>
</body>

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
  $("#sum").text(sum.toFixed(2));
}
</script>
<script type="text/javascript">
    function cloneRow() {
      var row = document.getElementById("rowToClone"); // find row to copy
      var table = document.getElementById("tableToModify"); // find table to append to
      var clone = row.cloneNode(true); // copy children too
      clone.id = "newID"; // change id or other attributes/contents
      table.appendChild(clone); // add new row to end of table
    }

    function createRow() {
      var row = document.createElement('tr'); // create row node
      var col = document.createElement('td'); // create column node
      var col2 = document.createElement('td'); // create second column node
      row.appendChild(col); // append first column to row
      row.appendChild(col2).value = ''; // append second column to row
      col.innerHTML = "qwe"; // put data in first column
      col2.innerHTML = "rty"; // put data in second column
      var table = document.getElementById("tableToModify"); // find table to append to
      table.appendChild(row); // append row to table
    }
  </script>
</html>