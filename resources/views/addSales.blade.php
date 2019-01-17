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
    <vat-component :customers="{{ $customers }}" :taxes="{{ $taxes }}"></vat-component>
    {{-- End VAT section --}}

    {{-- add sales table --}}
    <add-sale :inventories="{{ $inventories }}" :banks="{{ $banks }}" :channels="{{ $channels }}"></add-sale>
    {{-- end of sales table --}}

    {{-- Invoice Modal --}}
    @include('sales._modal')
    {{--End of modal --}}
@endsection
