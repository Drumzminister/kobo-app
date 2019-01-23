<template>
    <section id="sale-table">
        <div class="container mt-4">
            <div class="bg-white">
                <div class="table-editableWTF">
                    <table id="tableRow" class="table table-bordered table-responsive-md text-center">
                        <thead class="p-3">
                        <tr class="tab">
                            <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                                Items
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
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody id="salesTable">
                            <template v-for="(item, index) in saleItems">
                                <tr v-if="item.type !== 'reversed'" :class="{'border-right-green' : item.saved, 'border-right-red' : !item.saved, 'itemReversed' : item.isReversed }">
                                    <td>
                                        {{ item.inventory ? item.inventory.name : "" }}
                                    </td>
                                    <td>
                                        {{ item.description }}
                                    </td>
                                    <td>
                                        {{ item.quantity }}
                                    </td>
                                    <td>
                                        {{ $currency.format(item.sales_price) }}
                                    </td>
                                    <td>
                                        {{ $currency.format(item.totalPrice()) }}
                                    </td>
                                    <td>
                                        {{ getChannelName(item.sale_channel_id) }}
                                    </td>

                                    <td id="delete">
                                        <i @click="reverseSaleItemRow(index)" v-show="item.reversedItem === null && !item.processing" style="cursor: pointer; color: #da1313;" class="fa fa-undo"></i>
                                        <i v-show="item.processing" style="color: #da1313; font-size: 30px" class="fa fa-circle-notch fa-spin-fast"></i>
                                    </td>
                                </tr>

                                <tr v-if=" item.type !== 'reversed' && item.reversedItem !== null" style="border-left: 6px solid #FD9A97;" :class="{'border-right-green' : item.saved, 'border-right-red' : !item.saved, 'itemReversed' : item.reversedItem.isReversed }">
                                    <td>
                                        {{ item.reversedItem.inventory ? item.inventory.name : "" }}
                                    </td>
                                    <td>
                                        {{ item.reversedItem.description }}
                                    </td>
                                    <td>
                                        {{ item.reversedItem.quantity }}
                                    </td>
                                    <td>
                                        {{ $currency.format(item.reversedItem.sales_price) }}
                                    </td>
                                    <td>
                                        {{ $currency.format(item.reversedItem.totalPrice()) }}
                                    </td>
                                    <td>
                                        {{ getChannelName(item.reversedItem.sale_channel_id) }}
                                    </td>

                                    <td id="delete">
                                        <!--<i @click="reverseSaleItemRow(index)" v-show="saleItems.length > 1 && !item.processing" style="cursor: pointer; color: #da1313;" class="fa fa-jedi"></i>-->
                                        <i v-show="item.processing" style="color: #da1313; font-size: 30px" class="fa fa-circle-notch fa-spin-fast"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!--<div class="row">-->
                    <!--<div class="col-md-12 pr-5">-->
                        <!--<span @click="addNewSaleItemRow()" class="float-right">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259; cursor: pointer;"></i></span>-->
                    <!--</div>-->
                <!--</div>-->
                <div class="row p-2 mt-2 ">
                    <div class="col-md-6">
                        <payment-method-selection :options="paymentModeOptions" :transactions="sale.transactions" :banks="banks"></payment-method-selection>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-grey py-4 px-3" id="topp">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Discount</h5>
                                    <div class="input-group mb-3 input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input">&#8358;</span>
                                        </div>
                                        <input type="number" min="1" :disabled="true" v-model="saleDiscount" class="form-control discount" id="basic-url" aria-describedby="basic-addon3" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Delivery Amount</h5>
                                    <div class="input-group mb-3 input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>
                                        <input type="number" min="1" :disabled="true" v-model="deliveryCost" class="form-control " id="" aria-describedby="basic-addon3" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">TAX Amount</h5>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>
                                        <input type="text" :disabled="true" v-model="taxAmount" class="form-control" aria-describedby="basic-addon3" placeholder="0.00">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Amount</h5>
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>
                                        <input type="text" :disabled="true" v-model="currency.format(computedSalesAmount)" class="form-control" id="total" aria-describedby="basic-addon3" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <button class="btn btn-lg btn-login" @click="openSendingModal()">Send</button>
                    </div>

                    <div class="col">

                    </div>

                    <div class="col">
                            <span class="float-right mr-2">
                                <button type="submit" :disabled="savingSale" @click="saveSale()" class="btn btn-lg btn-started"><i v-show="savingSale" class="fa fa-circle-notch fa-spin"></i> {{ savingSale ? 'Saving' : saleSaved ? 'Saved!' : 'Save' }}</button>
                            </span>

                            <span class="float-right mr-2">
                                <button type="submit" @click="previewInvoice()" class="btn btn-lg btn-started">Preview</button>
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <invoice-modal></invoice-modal>
        <invoice-sender></invoice-sender>
    </section>
</template>

<script>
    import {updateSale} from "../../mixins/updateSale";
    import {appModal} from "../../mixins/appModals";
    import PaymentMethodSelection from "../banks/PaymentMethodSelection";
    import InvoiceModal from "./InvoiceModal";
    import InvoiceSender from "./InvoiceSender";
    import Select2 from 'v-select2-component';

    export default {
        mixins: [updateSale, appModal],
        props: ['inventories', 'channels', 'banks', 'sale'],
        components: { PaymentMethodSelection : PaymentMethodSelection, InvoiceModal, InvoiceSender, Select2 },
        data() {
            return {
                currency: new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 2
                }),
                paymentModeOptions: {
                    readOnly: true,
                }
            }
        }
    }
</script>
