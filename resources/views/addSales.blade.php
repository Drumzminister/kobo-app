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
    @include('sales._vat')
{{-- End VAT section --}}

{{-- add sales table --}}
    @include('sales._sales-table')
{{-- end of sales table --}}

{{-- Invoice Modal --}}
      @include('sales._modal')
{{--End of modal --}}

<script src="/js/sales.js"></script>

@endsection