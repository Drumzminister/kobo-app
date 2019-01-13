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
{{--    @include('sales._vat')--}}
<vat-component :customers="{{ json_encode($customers) }}" :taxes="{{ json_encode($taxes) }}"></vat-component>
{{-- End VAT section --}}

{{-- add sales table --}}
<add-sale :inventories="{{ json_encode($inventories) }}" :banks="{{ json_encode($banks) }}" :channels="{{ json_encode($channels) }}"></add-sale>
    {{--@include('sales._sales-table')--}}
{{-- end of sales table --}}

{{-- Invoice Modal --}}
      @include('sales._modal')
{{--End of modal --}}

{{--<script src="/js/sales/sales.js"></script>--}}

@endsection
