@extends('layouts.app')
<style>
    input[type=text] {
    background: transparent;
    border-radius: 4px;
}
</style>

@section('content')
    {{-- heading section --}}
    @include('sales._heading')
    {{-- end of heading section --}}

    {{-- VAT section --}}
        <vat-component :customers="{{ $customers }}" :taxes="{{ $taxes }}" :sale="{{ json_encode($sale) }}"></vat-component>
    {{-- End VAT section --}}

    @if($sale->type === "published")
        <update-sale :inventories="{{ $inventories }}" :banks="{{ $banks }}" :channels="{{ $channels }}" :sale="{{ json_encode($sale) }}"></update-sale>
    @else
        {{-- add sales table --}}
        <add-sale :inventories="{{ $inventories }}" :banks="{{ $banks }}" :channels="{{ $channels }}" :sale="{{ json_encode($sale) }}"></add-sale>
        {{-- end of sales table --}}
    @endif
    {{-- Invoice Modal --}}
    @include('sales._modal')
    {{--End of modal --}}
@endsection

@include('components.confirm-exit')

