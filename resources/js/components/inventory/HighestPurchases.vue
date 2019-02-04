<template>
    <div class="col-md-4">
        <div class="bg-white p-2 " id="topp">
            <div class="row my-1">
                <div class="col mt-1">
                    <h5 class="h5">Top 10 Purchases</h5>
                </div>
                <div class="col">
                    <select id="" @change="highestPurchase" class="form-control btn-filter pull-right">
                        <option selected>Quantity <i class="fa fa-filter"></i></option>
                        <option  class="text-small">By Amount</option>
                    </select>
                </div>
            </div>
            <div class="all-scroll">
                <table class="table table-striped table-hover" id="table">
                    <thead class="sale-head">
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    <tr v-for="purchase in top_purchase" :key="purchase.id">
                        <td>{{  purchase.name }}</td>
                        <td>{{ purchase.quantity }}</td>
                        <td>{{ purchase.sales_price }}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <h3 v-if="top_purchase.length === 0"class="text-center">
                Top purchases will appear here
            </h3>
            <!--<div class="text-center p-1">-->
                <!--<a href="" class="view-more">View More Analytics</a>-->
            <!--</div>-->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                top_purchase: {},
                highest_purchase: '',
                highest_quantity: '',
            }
        },
        mounted() {
            this.fetchHighestPurchases();
            this.fetchHighestQuantity();
            this.top_purchase = this.highest_quantity;
        },
        methods: {
            fetchHighestQuantity() {
                this.highest_quantity = window.highest_quantity;
            },
            fetchHighestPurchases() {
                this.highest_purchase = window.highest_purchase
            },
            highestPurchase() {
                if (this.top_purchase === highest_quantity) {
                    this.top_purchase = highest_purchase;
                } else {
                    this.top_purchase = highest_quantity;
                }
            },
        }
    }
</script>
