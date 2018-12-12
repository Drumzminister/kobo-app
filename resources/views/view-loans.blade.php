@extends("layouts.app-acct")

@section("content")
    <style>
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
        }
        .mysearch {
            border: solid 1px #eb7e00;
        }
        .searchP :hover {
            background-color: #eb7e00;
        }
    </style>
    <div id="loanApp">
        <section id="top">
            <div class="container py-3">
                <h3 class="h3">Loans</h3>
                <span class="accountant ml-auto btn btn-accountant">
            <a href="" class="btn-accountant">
                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
            </a>
        </span>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-6">
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" v-model="search"  placeholder="&#xF002; Search different sources, purposes or status of loans" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div style="cursor:pointer;" @click="searchLoan()" class="input-group-append searchP">
                                <span class="input-group-text vat-input px-5 py-2 mysearch" id="basic-addon2">Search</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-6">
                        <div id="" class="mt-2" onclick="">
                            <button style="" @click="showFilterOptions = !showFilterOptions" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>
                        </div>
                        <div class="box bg-white py-2" v-if="showFilterOptions">
                            <ul class="p-0 mb-0">
                                <li class="d-block py-1 px-2 mb-2" @click="filterBy('source')">By Source</li>
                                <li class="d-block py-1 px-2 mb-2" @click="filterBy('status')">By Status</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="sale-table">
            <div class="container mt-4">

                <div class="bg-white p-4">

                    <div v-if="!loadingLoans" class="table-responsive table-responsive-sm">

                        <table class="table table-striped table-hover" id="dataTable">
                            <thead class="p-3">
                                <tr class="tab">
                                    <th scope="col">Source</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Amount (&#8358;)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Period</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="loan in loans" style="cursor: pointer;" @click="displayLoanDetails(loan, $event)">
                                    <td>@{{loan.source_name}}</td>
                                    <td>@{{loan.description}}</td>
                                    <td >@{{loan.amount | numberFormat}}</td>
                                    <td><a :class="loan.status">@{{loan.status}}</a></td>
                                    <td> @{{loan.term}} @{{loan.period}}s </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="loans.length === 0 && search.trim()" class="alert alert-info">
                            <h5>No loans found. Please redefine the search parameter</h5>
                        </div>
                    </div>
                    <div v-if="loadingLoans" class="d-flex justify-content-center">
                        <img src="/img/loader.gif">
                    </div>
                </div>

            </div>
        </section>

        <section id="pagination" v-if="displayPaginator">
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="pagination" v-if="!hasSearched">
                            <li class="page-item" v-if="canPrevious"><button class="page-link" @click="toPrevious"><< Previous</button></li>
                            <li class="page-item" v-if="!canPrevious"><button class="page-link" disabled><< Previous</button></li>
                            <li class="page-item ml-3" v-if="canNext"><button  class="page-link" @click="toNext">Next >></button></li>
                            <li class="page-item ml-3" v-if="!canNext" ><button class="page-link" disabled>Next >></button></li>
                        </ul>
                        <ul class="pagination" v-if="hasSearched">
                            <li class="page-item"><button class="page-link" @click="toOriginal"><< Back</button></li>
                        </ul>

                    </div>
                    {{--<div class="col-md-5">
                        <span>Go to page:</span>
                    </div>--}}
                </div>
            </div>
        </section>
        {{--Loan Details Modal--}}
        @include('partials._loan_details_modal')
    </div>


<script src="/js/loan/index.js"></script>
@endsection