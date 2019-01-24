<template>
    <div  class="modal fade" id="previewInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="container p-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="row px-5 pt-3">
                        <div class="col-md-2">
                            <img :src="customer ? customer.image: ''" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-green h5">{{ customer ? `${customer.first_name}  ${ customer.last_name}` : "Customer Not Selected" }}</h5>
                            <h6 class="text-primary h6">Invoice NO: KB &#x2d; {{ sale.invoice_number || "" }}</h6>

                            <form action="" method="post">
                                <div class="form row pt-3 px-3">
                                    <div class="col-md-4">
                                        <div class="p-2" id="topp">
                                            <h5 class="h5">Total Amount</h5>
                                            <h4 class="text-orange">&#8358; {{ $currency.format(totalAmount) || 0.00 }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-2" id="topp">
                                            <h5 class="h5">Amount Paid</h5>
                                            <h4 class="text-orange">&#8358; {{ $currency.format(amountPaid) || 0.00 }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-2" id="topp">
                                            <h5 class="h5 "> Balance</h5>
                                            <h4 class="text-orange">&#8358; {{ $currency.format(balance) || 0.00 }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal-body">
                        <section id="sale-table">
                            <div class="container">
                                <div class="long-scroll">
                                    <div class="table-responsive table-responsive-sm" id="topp">
                                        <table class="table table-hover table-condensed" id="dataTable">
                                            <thead class="p-3">
                                            <tr class="tab">
                                                <th scope="col">Payment Date</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">Sales Price (&#8358;)</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <template  v-if="saleItems.length > 0 && item.saved" v-for="(item, index) in saleItems">
                                                <tr v-if="item.type !== 'reversed'" :class="{'itemReversed' : item.isReversed }">
                                                    <td>
                                                        {{ item.created_at }}
                                                    </td>
                                                    <td>
                                                        {{ item.inventory.name }}
                                                    </td>
                                                    <td> {{ item.quantity }}</td>
                                                    <td> {{ item.sales_price }}</td>
                                                    <td> {{ item.totalPrice() }}</td>
                                                </tr>

                                                <tr v-if=" item.type !== 'reversed' && item.reversedItem !== null" style="border-left: 6px solid #FD9A97;" :class="{'itemReversed' : item.isReversed, 'itemReversed' : item.reversedItem.isReversed }">
                                                    <td>
                                                        {{ item.created_at }}
                                                    </td>
                                                    <td>
                                                        {{ item.inventory.name }}
                                                    </td>
                                                    <td> {{ item.quantity }}</td>
                                                    <td> {{ item.sales_price }}</td>
                                                    <td> {{ item.totalPrice() }}</td>
                                                </tr>

                                            </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="modal-foote mt-3">
                        <div class="row text-center">
                            <div class="col-md-2 "></div>
                            <!--<div class="col">-->
                                <!--<button type="button" class="btn btn-login" data-dismiss="modal">Reverse</button>-->
                            <!--</div>-->
                            <!--<div class="col">-->
                                <!--<button type="button" class="btn btn-started" data-dismiss="modal">Update</button>-->
                            <!--</div>-->
                            <div class="col">
                                <button type="button" class="btn btn-danger px-5" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            sale () {
                return this.$parent.sale;
            },
            saleItems () {
                return this.$parent.saleItems.filter((item) => item.saved);
            },
            totalAmount () {
                return this.$parent.computedSalesAmount;
            },
            amountPaid () {
                return this.$parent.totalPaid;
            },
            customer () {
                return this.$parent.customer;
            },
            balance () {
                return this.totalAmount - this.amountPaid;
            },
            currency () {
                return this.$currency;
            }
        }
    }
</script>
