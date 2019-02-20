@extends('client::layouts.app')

@section("content")
<section id="top">
    <div class="container py-3">
        <div class="row">
            <h3 class="h3"><a href ="/client/expenses" class="text-dark">Expenses</a></h3>
             @include('client::accountant-button')

        </div>
    </div>
</section>

<section>
    <div class="container my-3">
        <div class="client-info bg-white p-3 loa" id="topp">
            <h6 class="h6">Total Expenses Amount</h6>
            <h2 class="h2">&#8358; {{ number_format($total) }}</h2>
        </div>
    </div>
</section>

<section>
    <div class="container">    
        <div class="row mt-2">
            <div class="col-md-10 col-6">
                <div class="input-group mb-3">
                    <input type="text" v-model="searchParam" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append" style="cursor:pointer;" @click="searchExpense">
                        <span class="input-group-text vat-input px-5" id="basic-addon2">Search</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div id="" class=float-right" onclick="">
                    <button style="" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                </div>
            </div>
        </div>
    </div>
</section>

<section id="sale-table">
    <div class="container mt-4">
        <div class="bg-white p-4"> 
            <expenses-table :expenses="expenses" v-if="expenses.length > 0 && !isSearching"></expenses-table>
            <div v-if="isSearching" class="d-flex justify-content-center">
                <div class="spinner-border text-warning " style="width: 150px; height:150px" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> 
    </div>
</section>

<section id="pagination">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-7" v-if="!hasSearchResults">
                {{ $expenses->links() }}
            </div>
            <div class="col-md-7" v-else>
                <ul class="pagination">
                    <li class="page-item"><button class="page-link" @click="showOriginalExpenses"><< Back</button></li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> --}}
    
</section>
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <expense-payment :expense="currentExpense" :row="currentExpenseRow" :options="{payOnly: true}" :banks="{{$banks}}"></expense-payment>
    </div>
</div>
@endsection

@section('other_js')
    <script>
        window.latest = @json($latest);
        window.expenses = @json($expenses).data;
    </script>
@endsection