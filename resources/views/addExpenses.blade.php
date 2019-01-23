@extends('layouts.app')
<style>
    input[type=text] {
        background: transparent;
        border-radius: 4px;
    }
</style>

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
                        <input type="date"  class="form-control"  value="{{Date('m/d/Y')}}" name="expense_date">
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
                                    <input type="text" name="description" class="form-control">
                                </td>
                                <td class="pt-3-half">
                                    <input type="number" name="amount" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-primary px-4" data-toggle="modal" data-target="#paymentModal">Pay</button>
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
                            <div class="modal-body ">
                                <div class="d-flex pb-3">
                                    <h5 class="h5 uppercase col-5">Payment Mode</h5>
                                    <h5 class="h5 uppercase ml-auto col-6">Amount</h5>
                                </div>
                                <div class="d-flex">
                                    <div class="col-5">
                                        <button class="btn btn-payment col-12 dropdown-toggle" id="paymentListDropDown" data-toggle="dropdown" aria-expanded="false">Bank</button>
                                    </div>
                                    <div class="col-6 ml-auto">
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div>

                                </div>
                                <section class="d-flex col-12 justify-content-end mt-3">
                                    <span>
                                        <i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i>
                                    </span>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-payment" >Pay</button>
                            </div>
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

    {{-- end of inventory table --}}



@endsection
