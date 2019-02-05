<!DOCTYPE html>
<html>
<head>
	<style>
		#customers {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #1849af;
			color: white;
		}
	</style>
</head>
<body>

<h1 style="text-align: center">
	<img src="{{ asset('img/logo.svg') }}" alt="Logo" class="logo-ico" style="height:40px"><br>
</h1>

<p>
	Invoice For: Lode
</p>

<p>
	Date: 12-10-1994
</p>

<p>
	Sale For: House
</p>

<table id="customers">
	<tr>
		<th>S/N</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Rate (N)</th>
		<th>Price (N)</th>
	</tr>
	{{--@foreach($budget->items as $key => $item)--}}
		{{--<tr>--}}
			{{--<td>{{ $key + 1 }}</td>--}}
			{{--<td>{{ $item->name }}</td>--}}
			{{--<td>{{ $item->quantity }}</td>--}}
			{{--<td>{{ number_format($item->rate , 2) }}</td>--}}
			{{--<td>{{ number_format(($item->rate * $item->quantity), 2) }}</td>--}}
		{{--</tr>--}}
	{{--@endforeach--}}

	<tr>
		<th>Total</th>
		<th></th>
		<th></th>
		<th></th>
		<th>1000000</th>
	</tr>
</table>

<p>
	Created with Kobo
</p>

</body>
</html>
