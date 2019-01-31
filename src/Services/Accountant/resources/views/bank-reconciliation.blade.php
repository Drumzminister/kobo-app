@extends('layouts.app')

@section('content')

@component('includes.dashboard-header-2')
  @slot('dashboardTitle')
    Manage Client
  @endslot
@endcomponent

<section class="d-flex justify-content-center">
  <div class="w-90">
    <div class="name-card">
      <img src="{{ asset('/img/name-logo.svg')}}" alt="" style="width: 44px;height: 45px; margin-right:16px;">
      <div class="">
        <p>Name of client</p>
        <p id="name">Mary Ekihinde</p>
      </div>
    </div>
    <div class="unreconciled-transactions-contianer d-block d-md-flex">
      <div class="details">
        <div class="header">
          <p>Unreconciled transactions</p>
        </div>
        <div class="body">
          <div class="d-flex">
            <div class="left">
              <ul class="fa-ul bg-primary">
                <li class="bg-white"><i class="fas fa fa-circle text-orange f-8"></i>26th Aug, 2018</li>
              </ul>
            </div>
            <div class="right">
              <p>Recieved the payment from CosCharis today  please kindly check the records too.</p>
            </div>
          </div>
          <div class="d-flex">
            <div class="left">
              <ul class="fa-ul bg-primary">
                <li class="bg-white"><i class="fas fa fa-circle text-orange f-8"></i>26th Aug, 2018</li>
              </ul>
            </div>
            <div class="right">
              <p>Recieved the payment from CosCharis today  please kindly check the records too.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="stats">
        <div class="header">
          <p>Number of Unreconciled transations</p>
        </div>
        <div class="body">
          <div class="d-flex">
            <p>These are some records that need to be attended to</p>
            <p class="amount">15</p>
          </div>
          <a href="#" class="btn bg-transparent p-0 border-0 text-orange">show all</a>
        </div>
      </div>
    </div>
    <div class="transactions-container d-block d-md-flex justify-content-between">
      <div class="banks">
        <div class="header">
          <div class="left d-flex">
            <img src="{{ asset('/img/rubric.svg')}}" alt="" style="width: 23px;height: 23px; margin-right:10px;">
            <p class="f-18">Transactions As per Bank</p>
          </div>
          <div class="right">
            <p class="f-18 text-center">Choose bank</p>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bank (GTB1)
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Bank (Fidelity)</a>
                <a class="dropdown-item" href="#">Bank (UBA)</a>
                <a class="dropdown-item" href="#">Bank (Zenith)</a>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table " id="transactions">
            <thead class="thead-light">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Reciepts</th>
                <th scope="col">Payments</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">Feb 12, 2018</td>
                <td>Lorem ipsum dolor sit amet, dico <br> utinam ancillae sea id. Cu doming.</td>
                <td>230,000</td>
                <td class="d-flex px-0">
                  30,000
                  <div class="dropdown ">
                    <button class="btn btn-success p-0 d-flex justify-content-center align-item-center ml-3" style="width:25px; height:25px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-circle text-white f-5 "></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Reconcile</a>
                      <a class="dropdown-item" href="#" data-target="#createJournalModal" data-toggle="modal">Create Journal</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="records">
        <div class="header">
          <div class="w-100">
            <div class="d-flex justify-content-center">
              <img src="{{ asset('/img/rubric.svg')}}" alt="" style="width: 23px;height: 23px; margin-right:10px;">
              <p class="f-18">Transactions As per Bank</p>
            </div>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="30,000" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table " id="transactions-records">
            <thead class="thead-light">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Payments</th>
                <th scope="col">Contacts</th>
                <th scope="col">Trans ID</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">Feb 12, 2018</td>
                <td>Lorem ipsum dolor sit amet, dico utinam ancillae s</td>
                <td class="text-danger">30,000</td>
                <td>Ubong Ita</td>
                <td class="text-primary">KB-10732</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="createJournalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <div class="d-flex">
          <img src="{{ asset('/img/rubric.svg')}}" alt="" style="width: 23px;height: 23px; margin-right:10px;">
          <p class="f-18">Create Journal</p>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table " id="transactions">
            <thead class="thead-light">
              <tr>
                <th scope="col">Trans ID</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">KB-A001E</td>
                <td>Being purchase of Fuel for Office use. </td>
                <td>
                  <select class="form-control form-control-sm border-0">
                    <option>Small select</option>
                  </select>
                </td>
                <td>30,000</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-green">
            <i class="fas fa-plus text-white f-16"></i>
          </button>
        </div>
      </div>
      <div class="modal-footer justify-content-between border-top-0">
        <button type="button" class="btn bg-white border" data-dismiss="modal" style="width:122px; height:35px;">Close</button>
        <button type="button" class="btn btn-orange border" style="height:35px;">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection
