@extends('layouts.app')

@section('content')

@component('includes.dashboard-header-3')
  @slot('dashboardTitle')
    Bank
  @endslot
  @slot('ctaButtons')
    <button type="button" class="btn ml-3" data-target="#addBankModal" data-toggle="modal">Add a Bank</button>
    <button type="button" class="btn btn-green ml-3" data-target="#makeTransferModal" data-toggle="modal">Make a Transfer</button>
  @endslot
@endcomponent

<section class="d-flex justify-content-center banking-pages">
  <div class="w-90">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="30,000" aria-label="Recipient's username" aria-describedby="button-addon2">
      <div class="input-group-append">
        <button class="btn btn-orange" type="button" id="button-addon2">Search</button>
      </div>
      <button class="btn btn-green px-5 filter-btn ml-4" type="button" id="button-addon2">Filter</button>
    </div>

    <div class="table-responsive">
      <table class="table table-borderless " id="banksTable">
        <thead>
          <tr>
            <th scope="col">
              <div class="d-flex h-100 align-items-center">
                Bank Name
              </div>
            </th>
            <th scope="col">
              <div class="d-flex h-100 align-items-center">
                Account Name
              </div>
            </th>
            <th scope="col">
              <div class="d-flex h-100 align-items-center">
                Account Number
              </div>
            </th>
            <th scope="col">
              <div class="d-flex h-100 align-items-center">
                Balance ( &#8358;)
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">
              <div class="d-flex h-100 align-items-center">
                <svg width="110" height="68" viewBox="0 0 110 68" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <rect width="110" height="68" fill="#C4C4C4"/>
                  <rect width="110" height="68" fill="url(#pattern0)"/>
                  <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0" transform="translate(-0.0381818) scale(0.00363636 0.00588235)"/>
                  </pattern>
                  <image id="image0" width="296" height="170" xlink:href="data:image/jpeg;base64,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"/>
                  </defs>
                </svg>
                <span class="ml-3">First Bank</span>
              </div>
            </th>
            <td>
              <div class="d-flex h-100 align-items-center">
                Chukwuemeka Somto
              </div>
            </td>
            <td>
              <div class="d-flex h-100 align-items-center">
                123456789012
              </div>
            </td>
            <td>
              <div class="d-flex h-100 align-items-center">
                300,000.00
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Modal -->
@include('modals._addBank')
@include('modals._makeTransfer')
@endsection
