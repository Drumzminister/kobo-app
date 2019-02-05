<template>
    <div class="w-90">
        <form>
            <!--<div class="input-group">-->
                <!--<input type="text" class="form-control" placeholder="Search for banks" aria-label="Recipient's username" aria-describedby="button-addon2">-->
                <!--<div class="input-group-append">-->
                    <!--<button class="btn btn-orange" type="submit" id="button-addon2">Search</button>-->
                <!--</div>-->
                <!--<button class="btn btn-green px-5 filter-btn ml-4" type="button" id="button-addon2">Filter</button>-->
            <!--</div>-->
        </form>
        <!--<div class="d-flex justify-content-end">-->
            <!--<div class="box bg-white pt-2">-->
                <!--&lt;!&ndash;<ul class="p-0 mb-0">&ndash;&gt;-->
                    <!--&lt;!&ndash;<li class="d-block py-1 px-2 mb-2" @click="">By Bank Name</li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<li class="d-block py-1 px-2 mb-2" @click="">By Account Name</li>&ndash;&gt;-->
                    <!--&lt;!&ndash;<li class="d-block py-1 px-2 mb-2" @click="">By Account Balance</li>&ndash;&gt;-->
                <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--</div>-->
        <!--</div>-->

        <div v-show="banks.length > 0" class="table-responsive">
            <table class="table table-borderless " id="banksTable">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex h-100 align-items-center">
                            Bank Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex h-100 align-items-center">
                            Account Name
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex h-100 align-items-center">
                            Account Number
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex h-100 align-items-center">
                            Balance ( &#8358;)
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <template v-for="bank in banks">
                    <tr>
                        <th scope="row">
                            <div class="d-flex h-100 align-items-center">
                                <span class="ml-3">{{ bank.bank_name }}</span>
                            </div>
                        </th>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                {{ bank.account_name }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                {{ bank.account_number }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                {{ $currency.format(bank.account_balance) }}
                            </div>
                        </td>
                    </tr>
                </template>

                <template>
                    <tr>
                        <th scope="row">
                            <div class="d-flex h-100 align-items-center">
                                <span class="ml-3">Total</span>
                            </div>
                        </th>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                <!--{{ bank.account_name }}-->
                            </div>
                        </td>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                <!--{{ bank.account_number }}-->
                            </div>
                        </td>
                        <td>
                            <div class="d-flex h-100 align-items-center">
                                {{ $currency.format(balanceSum) }}
                            </div>
                        </td>
                    </tr>
                </template>
                <!--<tr v-if="loadingBanks">-->
                    <!--<td colspan="4" class="loaderTable d-flex justify-content-center">-->
                        <!--<img src="/img/loader.gif" alt="">-->
                    <!--</td>-->
                <!--</tr>-->
                </tbody>
            </table>
        </div>
        <div v-show="banks.length === 0" class="table-responsive">
            <div id="people" class="text-center">
                <h1> You've not added any Bank!</h1>
                <button type="button" @click="addNewBank" class="btn btn-primary ml-3">Add a Bank</button>
            </div>
        </div>
        <section id="pagination">
            <div class="py-3">
                <div class="row">
                    <div class="col-md-7">
                        <!--<ul class="pagination" v-if="hasSearched">-->
                            <!--<li class="page-item"><button class="page-link" @click="showAll"><< Show All</button></li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        props: ['banks'],
        data () {
            return {
            }
        },
        computed: {
            balanceSum () {
                let sum = 0;
                this.banks.forEach(function (bank) {
                    sum += parseInt(bank.account_balance);
                });

                return sum;
            }
        },
        mounted () {
        },
        watch: {
        },
        filters: {

        },
        methods: {
            addNewBank () {
                this.$modal.open('#addBankModal');
            }
        }
    }
</script>