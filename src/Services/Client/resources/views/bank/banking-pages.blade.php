@extends('layouts.app')

@section('content')
<div id="banking">
  @component('includes.dashboard-header-3')
    @slot('dashboardTitle')
      Bank
    @endslot
    @slot('ctaButtons')
      <button type="button" class="btn ml-3" data-target="#addBankModal" data-toggle="modal">Add a Bank</button>
      @if($banks->count() > 0)
        <button type="button" class="btn btn-green ml-3" @click="$modal.open('#makeTransferModal')">Make a Transfer</button>
      @endif
    @endslot
  @endcomponent
    <section class="d-flex justify-content-center banking-pages">
      <banks-page :banks="{{ $banks }}"></banks-page>
    </section>

    <!-- Modal -->
    <add-bank :banks="{{ $supportedBanks }}"></add-bank>
{{--    @include('modals._makeTransfer')--}}
    <make-transfer></make-transfer>
</div>
@endsection
