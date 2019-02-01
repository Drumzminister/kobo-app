@extends('client::layouts.app')
@section('other_styles')
<style>
    input[type=text] {
        background: transparent;
        border-radius: 4px;
    }
</style>
@endsection
@section('content')
    {{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2 class="h2"><a href="/client/expenses" class="text-dark">Expenses</a></h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
    {{-- end of heading section --}}

    {{-- add expenses table --}}
    <section id="sale-table">
        <div class="container mt-4">

            <div class="bg-white py-3 px-5">
                <div class="date float-right">
                    <div class="dates input-group input-group-lg pb-3">
                        <input type="date" class="form-control" id="expense_date" value="{{Date('Y/m/d')}}" name="expense_date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar icon" id="datepicker"></i></span>
                        </div>
                    </div>
                </div>
                <div id="table" class="table-editableWTF">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead class="p-3">
                        <tr class="tab">
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                Description
                            </th>
                            <th scope="col"class="tool" data-tip="Amount Expended" tabindex="1">
                                Amount (&#8358;)
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="expense in expenseRecords" class="records">
                                <td class="pt-3-half">
                                    <input type="text" v-model="expense.description" name="description" class="form-control expenseDescription">
                                </td>
                                <td class="pt-3-half">
                                    <input type="number" v-model="expense.amount" name="amount" class="form-control expenseAmount">
                                </td>
                                <td>
                                    <button class="btn btn-primary px-4 payBtn" type="button" @click="showPayExpenseModal($event, expense)">Pay</button>
                                    <button class="btn btn-success px-4 paid" style="display: none" type="button" disabled>Paid</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <span class="" style="cursor: pointer;" @click="addExpenseRecord()"><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i></span>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Payment Mode</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <payment-method-selection class="col-12" :banks="{{ $banks }}"></payment-method-selection>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-payment" @click="payExpense" v-if="selectedAccounts.length > 0 && !isPayingExpense">Pay</button>
                                <button class="btn btn-sm px-3 btn-info" style="cursor: not-allowed;" v-if="selectedAccounts.length < 1" disabled>Pay</button>
                                <button class="btn btn-sm btn-payment" disabled v-if="isPayingExpense">Paying... <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- payment buttons --}}
                <div class="row p-3">
                    <div class="col">
                        <span class="float-right">
                            <button v-if="isSavingExpense" class="btn btn-lg btn-light" disabled>Saving...<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                            <button  v-else @click="beforeSavingExpenses" class="btn btn-lg btn-started">Save</button>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
