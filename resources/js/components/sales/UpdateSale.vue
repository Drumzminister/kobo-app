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
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id="salesTable">
                        <tr v-for="(item, index) in saleItems" :class="{'border-right-green' : item.saved, 'border-right-red' : !item.saved, 'itemReversed' : item.isReversed }">
                            <td>
                                {{ item.inventory ? item.inventory.name : "" }}
                                <!--<Select2 :settings="{placeholder: 'Inventory'}" v-model="item.inventory_id" :options="availableInventories.map((inventory) => {return {id: inventory.id, text: inventory.name} })" @change="fillSaleItemWithInventory(item)"/>-->
                            </td>
                            <td>
                                {{ item.description }}
                                <!--<input v-model="item.description" @change="item.debounceItemSaving()" type="text" id="sales_description" class="form-control sales_description ">-->
                            </td>
                            <td>
                                {{ item.quantity }}
                                <!--<input style="width: 200px" :disabled="item.inventoryid === ''" @change="item.debounceItemSaving()" min="1" :max="item.inventory ? item.inventory.quantity : 0" v-model="item.quantity" type="number" class="sales_quantity form-control" :placeholder="item.inventory ? item.inventory.quantity + ' In Stock' : null">-->
                            </td>
                            <td>
                                {{ $currency.format(item.sales_price) }}
                                <!--<input disabled v-model="item.sales_price" type="number" min="1" class="form-control sales_price" placeholder="0.00">-->
                            </td>
                            <td>
                                {{ $currency.format(item.totalPrice()) }}
                                <!--<input disabled v-model="item.totalPrice()" type="text" class="form-control sales_total" id="sales_total" placeholder="0.00">-->
                            </td>
                            <td>
                                <select v-model="item.sale_channel_id" @change="item.debounceItemSaving()" class="form-control search sales_channel">
                                    <option value="">Channel ...</option>
                                    <option v-for="channel in channels" :value="channel.id">
                                        {{ channel.name }}
                                    </option>
                                </select>
                            </td>

                            <td id="delete">
                                <i @click="reverseSaleItemRow(index)" v-show="saleItems.length > 1 && !item.processing" style="cursor: pointer; color: #da1313;" class="fa fa-jedi"></i>
                                <i v-show="item.processing" style="color: #da1313; font-size: 30px" class="fa fa-circle-notch fa-spin-fast"></i>
                            </td>
                        </tr>
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
                        <payment-method-selection :banks="banks"></payment-method-selection>
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
                                        <input type="number" min="1" v-model="saleDiscount" class="form-control discount" id="basic-url" aria-describedby="basic-addon3" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Delivery Amount</h5>
                                    <div class="input-group mb-3 input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>
                                        <input type="number" min="1" v-model="deliveryCost" class="form-control " id="" aria-describedby="basic-addon3" placeholder="0.00">
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
                })
            }
        }
    }
</script>
