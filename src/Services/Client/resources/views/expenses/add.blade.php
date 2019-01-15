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
                <h2 class="h2">Expenses</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>
                </span>
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
                        <tr>
                            <td class="pt-3-half">
                                <input type="text" name="description" class="form-control expenseDescription">
                            </td>
                            <td class="pt-3-half">
                                <input type="number" name="amount" v-model="expenseAmount" class="form-control expenseAmount">
                            </td>
                            <td>
                                <button class="btn btn-primary px-4" type="button" @click="showPayExpenseModal($event)">Pay</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

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
                            <form action="" @submit="payExpense($event)">
                                <div class="modal-body ">
                                    <div class="d-flex pb-3">
                                        <h5 class="h5 uppercase col-5">Payment Mode</h5>
                                        <h5 class="h5 uppercase ml-auto col-6">Amount</h5>
                                    </div>
                                    <div class="d-flex" v-for="selectedMethod in selectedMethods">
                                        <div class="col-6">
                                            <button class="btn btn-payment w-100 px-2 paymentMethods dropdown-toggle" type="button" @click="changePaymentMethod(selectedMethod)" >@{{ selectedMethod.mode }}</button>
                                        </div>
                                        <div class="col-5 ml-auto d-flex flex-column">
                                            <input type="number" :placeholder="expenseAmount" @change="expenseAmountChange($event)" :max="expenseAmount" class="form-control selectedAmount">
                                            <span class="text-danger invalid-feedback" v-if="expenseAmount > selectedMethod.balance || hasExpensePaymentError" style="display: block" role="alert"><strong>Amount inserted is greater than available amount in @{{ selectedMethod.mode }}</strong></span>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" style="top:60%; display: block" aria-labelledby="paymentListDropDown" v-if="expenseShowPaymentMethods">
                                        <ul class="px-0">
                                            <li class="dropdown-item" style="cursor:pointer" v-for="method in expensePaymentMethods" @click="selectPaymentMethod(method)" >@{{ method.mode }}</li>
                                        </ul>
                                    </div>
                                    <section class="d-flex col-12 justify-content-end mt-3">
                                        <span style="cursor: pointer;">
                                            <i class="fa fa-plus-square" style="font-size:32px; color:#00C259;"></i>
                                        </span>
                                    </section>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-payment" >Pay</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                {{-- payment buttons --}}
                <div class="row p-3">
                    <div class="col">
                        <span class="float-right">
                            <a href="" class="btn btn-lg btn-started">Save</a>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('other_js')
    <script>
        window.paymentMethods = @json($paymentMethods);
    </script>
@endsection
