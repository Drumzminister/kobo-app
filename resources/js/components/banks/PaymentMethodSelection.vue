<template>
    <div class="col-12">
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
                        <button class="btn btn-lg btn-payment dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ paymentMethod.name || 'Select'}}
                        </button>
                        <div class="dropdown-menu payment_mode_id" aria-labelledby="dropdownMenuLink">
                            <button class="dropdown-item" v-for="account in availableAccounts" @click="setPaymentMode(paymentMethod, account)">{{ account.account_name.split(' ')[0]}}</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="show input-group input-group-lg mt-3">
                        <input v-model="paymentMethod.amount" type="number" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                    </div>
                </div>

                <div class="col-md-2" style="margin-top: 20px">
                    <span class="" style="cursor: pointer; margin-top: 20px" v-show="salePaymentMethods.length > 1" @click="removeSalePaymentMethod(index, paymentMethod.id)"><i class="fa fa-times" style="font-size:32px;color:#c22c29;"></i></span>
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
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        props: ['banks'],
        data() {
            return {
                salePaymentMethods: [],
                selectedPaymentMethods: []
            }
        },
        computed: {
            ...mapGetters(['availableAccounts', 'selectedAccounts'])
        },
        created: function() {
            this.addSalePaymentMethod();
            this.addBanksToStore();
        },
        methods: {
            addBanksToStore () {
                this.$store.commit('setCompanyAccounts', this.banks);
            },
            setPaymentMode: function (paymentMode, selectedBank) {
                if (paymentMode.id) {
                    this.removeAccountFromStore(paymentMode.id);
                }

                if (this.selectedAccounts.length === 0) {
                    paymentMode.amount = this.$parent.totalSalesAmount;
                }

                paymentMode.id = selectedBank.id;
                paymentMode.name = selectedBank.account_name;
                this.$store.commit('selectAccount', paymentMode)
            },
            removeAccountFromStore (account) {
                this.$store.commit('removeAccount', account);
            },
            bankIsNotAvailable: function () {
                return this.salePaymentMethods.length === this.banks.length;
            },
            addSalePaymentMethod: function () {
                if (this.bankIsNotAvailable()) return;
                this.salePaymentMethods.push({
                    bank_id: null,
                    amount: null,
                    name: null,
                });

            },
            removeSalePaymentMethod: function (index, accountId) {
                this.salePaymentMethods.splice(index, 1);
                this.removeAccountFromStore(accountId);
            }
        }
    }
</script>
