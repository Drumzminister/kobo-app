@extends('layouts.app')

@section('content')
<style>
    .loaderTable {
        width: 250% !important;
        height: 50% !important;
    }
    .box li {
        cursor: pointer;
        background-color: #fdfdfd;
    }
    .box li:hover {
        cursor: pointer;
        background-color: #dedede;
    }
    .box {
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 2;
        position: absolute;
        margin-top: -25px;
        border-radius: 3px;
    }
</style>
<div id="banking">
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
        <form action="" @submit="search($event)">
            <div class="input-group">
                <input type="text" class="form-control" v-model="searchString" placeholder="Search for banks" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-orange" type="submit" id="button-addon2">Search</button>
                </div>
                <button class="btn btn-green px-5 filter-btn ml-4" @click="showFilterOptions = !showFilterOptions" type="button" id="button-addon2">Filter</button>
            </div>
        </form>
        <div class="d-flex justify-content-end">
            <div class="box bg-white pt-2" v-if="showFilterOptions">
                <ul class="p-0 mb-0">
                    <li class="d-block py-1 px-2 mb-2" @click="filterBy('bank_name')">By Bank Name</li>
                    <li class="d-block py-1 px-2 mb-2" @click="filterBy('account_name')">By Account Name</li>
                    <li class="d-block py-1 px-2 mb-2" @click="filterBy('account_balance')">By Account Balance</li>
                </ul>
            </div>
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
            <tr v-for="bank in banks" v-if="!loadingBanks">
              <th scope="row">
                <div class="d-flex h-100 align-items-center">
                  <span class="ml-3">@{{ bank.bank_name }}</span>
                </div>
              </th>
              <td>
                <div class="d-flex h-100 align-items-center">
                  @{{ bank.account_name }}
                </div>
              </td>
              <td>
                <div class="d-flex h-100 align-items-center">
                    @{{ bank.account_number }}
                </div>
              </td>
              <td>
                <div class="d-flex h-100 align-items-center">
                    @{{ bank.account_balance | numberFormat}}
                </div>
              </td>
            </tr>
            <tr v-if="loadingBanks">
                <td colspan="4" class="loaderTable d-flex justify-content-center">
                    <img src="/img/loader.gif" alt="">
                </td>
            </tr>
          </tbody>
        </table>
      </div>
        <section id="pagination">
            <div class="py-3">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="pagination" v-if="hasSearched">
                            <li class="page-item"><button class="page-link" @click="showAll"><< Show All</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
  </section>

    <!-- Modal -->
    @include('modals._addBank')
    @include('modals._makeTransfer')
</div>
<script src="/js/bank/banking.js"></script>
@endsection
