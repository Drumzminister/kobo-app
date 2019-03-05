@extends('client::layouts.app')

@section('content')

@component('includes.dashboard-header-2')
  @slot('dashboardTitle')
    Opening Pages
  @endslot
@endcomponent


<section>
  <div class="d-flex justify-content-center">
    <div class="main-body d-flex justify-content-center">
      <div class="content bg-">
        <div class="accordion bg-transparent" id="accordionExample">
          <div class="card border-0 mb-5">
            <div class="card-header bg-white border-0" id="headingOne">
              <h5 class="mb-0">
                <button class="btn bg-transparent w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="title-div d-flex">
                    <div class="mr-auto text-left">
                      <p class="title">Existing Assets</p>
                      <p class="subtitle">List of Existing Assets</p>
                    </div>
                    <div class="pt-3 pr-3">
                      <i class="fas fa-chevron-up fa-2x"></i>
                    </div>
                  </div>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control " placeholder="Search Assets" aria-label="Search Assets" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
                  </div>
                </div>

                @include('includes.opening-pages._balance-table-1')

              </div>
            </div>
          </div>
          <div class="card border-0 mb-5">
            <div class="card-header bg-white border-0" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn bg-transparent w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="title-div d-flex">
                    <div class="mr-auto text-left">
                      <p class="title">Debtors</p>
                      <p class="subtitle">List of Existing Debtors</p>
                    </div>
                    <div class="pt-3 pr-3">
                      <i class="fas fa-chevron-up fa-2x"></i>
                    </div>
                  </div>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control " placeholder="Search Assets" aria-label="Search Assets" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
                  </div>
                </div>

                @include('includes.opening-pages._balance-table-2')
              </div>
            </div>
          </div>
          <div class="card border-0 mb-5">
            <div class="card-header bg-white border-0" id="headingThree">
              <h5 class="mb-0">
                <button class="btn bg-transparent w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <div class="title-div d-flex">
                    <div class="mr-auto text-left">
                      <p class="title">Creditors</p>
                      <p class="subtitle">List of Existing Creditors</p>
                    </div>
                    <div class="pt-3 pr-3">
                      <i class="fas fa-chevron-up fa-2x"></i>
                    </div>
                  </div>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control " placeholder="Search Assets" aria-label="Search Assets" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
                  </div>
                </div>

                @include('includes.opening-pages._balance-table-3')
              </div>
            </div>
          </div>
          <div class="card border-0 mb-5">
            <div class="card-header bg-white border-0" id="headingFour">
              <h5 class="mb-0">
                <button class="btn bg-transparent w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <div class="title-div d-flex">
                    <div class="mr-auto text-left">
                      <p class="title">Loans</p>
                      <p class="subtitle">Available working Loans</p>
                    </div>
                    <div class="pt-3 pr-3">
                      <i class="fas fa-chevron-up fa-2x"></i>
                    </div>
                  </div>
                </button>
              </h5>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control " placeholder="Search Assets" aria-label="Search Assets" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
                  </div>
                </div>

                @include('includes.opening-pages._balance-table-4')
              </div>
            </div>
          </div>
          <opening-rent rents="{{$openingRents}}"></opening-rent>
        </div>
        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-green mr-4"> + Add to Opening Balance</button>
          <button type="button" class="btn bg-white btn-whites text-green"> Save Changes</button>
        </div>
      </div>
    </div>
  </div>
</section>
@include('client::rents._add_rent_modal')
@endsection
@section('other_js')
@endsection