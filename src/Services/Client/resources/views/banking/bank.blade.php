@extends("layouts.app")

@section("content")
{{-- heading section --}}
@include('client::banking.bank-heading')
{{-- end of heading section --}}
@include('client::banking.bank-table')


@endsection