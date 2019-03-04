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

		#customers tbody > tr:nth-child(even){background-color: #f2f2f2;}

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
	Invoice No: {{ $sale->invoice_number }}
</p>

<p>
	Date: {{ $sale->sale_date }}
</p>

<p>
	Sale Total: N{{ number_format($sale->total_amount) }}
</p>

<p>
    Amount Paid: N{{ number_format($sale->amountPaid) }}
</p>

<p>
    Balance: N{{ number_format($sale->balance) }}
</p>

<table id="customers">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Rate (N)</th>
            <th>Price (N)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sale->saleItems as $key => $item)
            <tr>
                <th>{{ $key + 1 }}</th>
                <th>{{ $item->inventory->name }}</th>
                <th>{{ $sale->quantity }}</th>
                <th>{{ number_format($item->inventory->sales_price) }}</th>
                <th>{{ number_format($item->inventory->sales_price * $item->quantity) }}</th>
            </tr>
        @endforeach
    </tbody>
	{{--@foreach($budget->items as $key => $item)--}}
		{{--<tr>--}}
			{{--<td>{{ $key + 1 }}</td>--}}
			{{--<td>{{ $item->name }}</td>--}}
			{{--<td>{{ $item->quantity }}</td>--}}
			{{--<td>{{ number_format($item->rate , 2) }}</td>--}}
			{{--<td>{{ number_format(($item->rate * $item->quantity), 2) }}</td>--}}
		{{--</tr>--}}
	{{--@endforeach--}}
</table>

@if($sale->transactions->count() > 0)
    <div>
        <h3>Payment Methods</h3>
        <ul>
            @foreach($sale->transactions as $transaction)
                <li>
                    {{ $transaction->paymentMode->bank_name }} - N{{ $transaction->amount }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <h3>Delivery Cost</h3>
    <ul>
        <li>
            {{ $transaction->paymentMode->bank_name }} - N{{ $transaction->amount }}
        </li>
    </ul>
</div>

<p>
	Created with Kobo
</p>

</body>
</html>
