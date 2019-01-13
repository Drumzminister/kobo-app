<template>
    <section id="sale-table">
        <div class="container mt-4">
            <div class="bg-white">
                <div class="table-editableWTF">
                    <table id="tableRow" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead class="p-3">
                        <tr class="tab">
                            <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                                Inventory Items
                            </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                Description
                            </th>

                            <th scope="col" class="tool" data-tip="Include the quantity sold." tabindex="1">
                                QTY sold
                            </th>
                            <th scope="col"class="tool" data-tip="Add price per head of product" tabindex="1">
                                Price of product (&#8358;)
                            </th>
                            <th scope="col" class="tool" data-tip="Add the total price of sales." tabindex="1">
                                Total Price (&#8358;)
                            </th>
                            <th scope="col" class="tool" data-tip="Channel of sale" tabindex="1">
                                Channel
                            </th>
                            <th class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody id="salesTable">
                        <tr v-for="item in saleItems">
                            <td>
                                <select v-model="item.inventory_id" class="form-control inventory">
                                    <option value="">
                                        Select ...
                                    </option>
                                    <option v-for="inventory in inventories" :value="inventory.id">
                                        {{ inventory.name }}
                                    </option>
                                </select>
                            </td>
                            <td><input v-model="item.description" type="text" id="sales_description" class="form-control sales_description "></td>
                            <td><input v-model="item.quantity" type="number"  class="sales_quantity form-control "></td>
                            <td><input v-model="item.sales_price" type="number" class="form-control sales_price"></td>
                            <td><input v-model="item.total_price" type="text" class="form-control sales_total" id="sales_total"></td>
                            <td>
                                <select v-model="item.sale_channel_id" class="form-control search sales_channel">
                                    <option v-for="channel in channels" :value="channel.id">
                                        {{ channel.name }}
                                    </option>
                                </select>
                            </td>

                            <td id="delete"><i style="color: #da1313;" class="fa fa-trash"></i></td>
                        </tr>
                        </tbody>
                    </table>
                    <span @click="addNewSaleItemRow()" class="float-right">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i></span>
                </div>

                <div class="row p-2 mt-2 ">
                    <div class="col-md-6">
                        <div class="bg-grey py-4 px-3" id="top">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5 class="h6 uppercase">Payment Mode</h5>
                                </div>

                                <div class="col-md-5">
                                    <h5 class="h6 uppercase">Amount</h5>
                                </div>

                                <div class="col-md-2 mt-4 ">
                                </div>
                            </div>
                            <div v-for="(paymentMethod, index) in salePaymentMethods" class="row" >
                                <div class="col-md-5">
                                    <div class="dropdown show mt-3 payment_mode">
                                        <a class="btn btn-lg btn-payment dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ paymentMethod.name || 'Select'}}
                                        </a>
                                        <div class="dropdown-menu payment_mode_id" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" v-for="bank in getAvailableBankList()" @click="setPaymentMode(paymentMethod, bank)" href="#">{{ bank.account_name}}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="show input-group input-group-lg mt-3">
                                        <input v-model="paymentMethod.amount" type="text" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                                    </div>
                                </div>

                                <div class="col-md-2" style="margin-top: 20px">
                                    <span class="" style="cursor: pointer; margin-top: 20px" v-show="salePaymentMethods.length > 1" @click="removeSalePaymentMethod(index)"><i class="fa fa-times" style="font-size:32px;color:#c22c29;"></i></span>
                                </div>
                            </div>

                            <div class="row text-center mt-4 ">
                                <div class="col-md-3">
                                </div>

                                <div class="col-md-3 ml-5">
                                    <span class="" style="cursor: pointer;" v-show="!bankIsNotAvailable()" @click="addSalePaymentMethod()"><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i></span>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--@include('sales._payment')-->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {addSale} from "../../mixins/addSale";
    export default {
        props: ['inventories', 'channels', 'banks'],
        mixins: [addSale],
        mounted() {
        }
    }
</script>
