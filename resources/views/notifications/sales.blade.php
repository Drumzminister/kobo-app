{{-- Send the notification variable containing a particular notification in this case it should be MadeSales notification --}}
@php
	$sale = Koboaccountant\Models\Sale::find($notification->data['sale_id']);
@endphp
<div>
	{{$sale->company->name}} sold {{$sale->quantity}} quantity of  {{$sale->inventory->name}} for N{{$sale->amount}}
</div>