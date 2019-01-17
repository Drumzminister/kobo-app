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
                        <tr v-for="(item, index) in saleItems" :class="{'border-right-green' : item.saved, 'border-right-red' : !item.saved }">
                            <td>
                                <select v-model="item.inventory_id" @change="fillSaleItemWithInventory(item)" class="form-control inventory">
                                    <option value="">
                                        Select ...
                                    </option>
                                    <option v-for="inventory in availableInventories" :value="inventory.id">
                                        {{ inventory.name }}
                                    </option>
                                </select>
                            </td>
                            <td><input v-model="item.description" @change="item.debounceItemSaving()" type="text" id="sales_description" class="form-control sales_description "></td>
                            <td><input :disabled="item.inventory_id === ''" @change="item.debounceItemSaving()" v-model="item.quantity" type="number" class="sales_quantity form-control"></td>
                            <td><input disabled v-model="item.sales_price" type="number" class="form-control sales_price"></td>
                            <td><input disabled v-model="item.totalPrice()" type="text" class="form-control sales_total" id="sales_total"></td>
                            <td>
                                <select v-model="item.sale_channel_id" @change="item.debounceItemSaving()" class="form-control search sales_channel">
                                    <option value="">Channel ...</option>
                                    <option v-for="channel in channels" :value="channel.id">
                                        {{ channel.name }}
                                    </option>
                                </select>
                            </td>

                            <td id="delete">
                                <i @click="deleteSaleItemRow(index)" v-show="saleItems.length > 1 && !item.processing" style="cursor: pointer; color: #da1313; font-size: 20px" class="fa fa-times"></i>
                                <i v-show="item.processing" style="color: #da1313; font-size: 30px" class="fa fa-circle-notch fa-spin-fast"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <span @click="addNewSaleItemRow()" class="float-right">Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i></span>
                </div>
                <div class="row p-2 mt-2 ">
                    <div class="md-8">
                        <payment-method-selection :banks="banks"></payment-method-selection>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-grey py-4 px-3" id="topp">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Discount</h5>
                                    <div class="input-group mb-3 input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input">&#8358;</span>
                                        </div>
                                        <input type="text" v-model="saleDiscount" class="form-control discount" id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="h6 uppercase">Total Delivery Amount</h5>
                                    <div class="input-group mb-3 input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                        </div>
                                        <input type="text" class="form-control " id="" aria-describedby="basic-addon3" placeholder="100,000">
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col">
                                    <h5 class="h6 uppercase">Total Amount</h5>
                                </div>
                                <div class="col input-group input-group-lg">
                                    <div class="input-group-prepend cus">
                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                    </div>
                                    <input type="text" :disabled="true" v-model="totalSalesAmount" class="form-control" id="total" aria-describedby="basic-addon3" placeholder="1,275,000">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="col">
                            <a href="" class="btn btn-lg btn-login" @click="openSendingModal()" data-toggle="modal" data-target="#exampleModalCenter">Send Invoice</a>
                        </div>
                        <div class="col">
                            <span class="float-right">
                                <button type="submit" @click="saveSale()" class="btn btn-lg btn-started">Save</button>
                            </span>
                        </div>

                        <div class="col">
                            <span class="float-right">
                                <button type="submit" @click="previewInvoice()" class="btn btn-lg btn-started">Preview Invoice</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <invoice-modal></invoice-modal>
    </section>
</template>

<script>
    import {addSale} from "../../mixins/addSale";
    import {appModal} from "../../mixins/appModals";
    import PaymentMethodSelection from "../banks/PaymentMethodSelection";
    import InvoiceModal from "./InvoiceModal";
    export default {
        mixins: [addSale, appModal],
        props: ['inventories', 'channels', 'banks', 'sale'],
        components: { PaymentMethodSelection : PaymentMethodSelection, InvoiceModal },
        mounted() {
        }
    }
</script>
