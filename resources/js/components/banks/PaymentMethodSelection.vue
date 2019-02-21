<template>
    <div class="bg-grey">
        <div class="bg-grey py-4 px-3" id="top">
            <div class="row">
                <div class="col-md-6" v-if="!receiveMode">
                    PAID: {{ $currency.format(totalAmountPaid) }}
                </div>
                <div class="col-md-6" v-if="receiveMode">
                    Amount Received: {{ $currency.format(totalAmountPaid) }}
                </div>
                <div class="col-md-6">
                    BAL: {{ $currency.format(balanceLeft) }}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <h5 class="h6 uppercase">Payment Mode</h5>
                </div>

                <div class="col-md-4">
                    <h5 class="h6 uppercase">Amount</h5>
                </div>
            </div>
            <div v-show="readOnly && transactions.length > 0" v-for="(paymentMethod, index) in salePaymentMethods" class="row" >
                <div class="col-md-5">
                    <div class="dropdown show mt-3 payment_mode">
                        <button class="btn btn-lg btn-payment dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ paymentMethod.name || 'Select'}}
                        </button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="show input-group input-group-lg mt-3">
                        <input v-model="paymentMethod.amount" :disabled="readOnly" type="number" min="1" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="0.00">
                    </div>
                </div>

            </div>

            <div v-show="!readOnly" v-for="(paymentMethod, index) in salePaymentMethods" class="row" >
                <div class="w-50">
                    <div class="dropdown show mt-3 payment_mode">
                        <button class="btn btn-lg btn-payment dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ paymentMethod.name || 'Select'}}
                        </button>
                        <div class="dropdown-menu payment_mode_id" aria-labelledby="dropdownMenuLink">
                            <button class="dropdown-item" type="button" v-for="account in availableAccounts" @click="setPaymentMode(paymentMethod, account)">{{ account.account_name.split(' ')[0] }}</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="show input-group input-group-lg mt-3">
                        <!--<money-input :model="'salePaymentMethods.' + index + '.paymentMethod.amount'" :class="'form-control'" :placeholder="'0.00'"></money-input>-->
                        <money-input :model="'salePaymentMethods[' + index + '].paymentMethod.amount'" :class="'form-control'" :options="{ placeholder: '0.00' }"></money-input>
                        <!--<input v-model="paymentMethod.amount" :disabled="readOnly" type="number" min="1" style="height: 39px;" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="0.00">-->
                    </div>
                </div>

                <div class="col-md-3" style="margin-top: 20px">
                    <span class="" style="cursor: pointer; margin-top: 20px" v-show="salePaymentMethods.length > 1" @click="removeSalePaymentMethod(index, paymentMethod.id)"><i class="fa fa-times" style="font-size:32px;color:#c22c29;"></i></span>
                </div>
            </div>

            <div class="row text-center mt-4 ">
                <div class="col-md-3">
                </div>

                <div class="col-md-3 ml-5">
                    <span class="" style="cursor: pointer;" v-show="!bankIsNotAvailable() && !readOnly" @click="addSalePaymentMethod()"><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i></span>
                </div>

                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex';
    import {toast} from "../../helpers/alert";

    export default {
        props: ['banks', 'options', 'transactions'],
        data() {
            return {
                salePaymentMethods: [],
                selectedPaymentMethods: []
            }
        },
        mounted () {
            this.addTransactionsRecordIfAvailable();
        },
        computed: {
            ...mapGetters(['availableAccounts', 'selectedAccounts']),
            readOnly () {
                return this.options ? this.options.readOnly || false : false;
            },
            receiveMode () {
                return this.options ? this.options.receiveMode || false : false;
            },
            totalAmountPaid () {
                let sum = 0;
                this.selectedAccounts.forEach(function (method) {
                    sum += parseInt(method.amount) || 0;
                });

                return sum;
            },
            totalSpread () {
                return this.$parent.spreadAmount || 0;
            },
            balanceLeft () {
                return this.totalSpread - this.totalAmountPaid;
            }
        },
        created: function() {
            this.addSalePaymentMethod();
            this.addBanksToStore();
            this.debouncePaidAmountChanged = _.debounce(this.paidAmountChanged, 500);
            this.$watch(() => this.totalSpread, this.debouncePaidAmountChanged);
        },
        destroyed: function () {
            this.$store.commit('resetDefaults');
        },
        methods: {
            ...mapMutations(['totalPaid', 'invalidPaymentsSum']),
            addTransactionsRecordIfAvailable () {
                if (this.transactions) {
                    this.transactions.forEach((transaction) => {
                        let bank = { amount: transaction.amount, id: transaction.bank_detail_id, name: transaction.bank.bank_name};
                        let pos = this.salePaymentMethods.push(bank) - 1;
                        this.setPaymentMode(this.salePaymentMethods[pos], transaction.bank);
                        this.selectedPaymentMethods.push(bank);
                    });
                }
            },
            addBanksToStore () {
                this.$store.commit('setCompanyAccounts', this.banks);
            },
            setPaymentMode: function (paymentMode, selectedBank) {
                if (paymentMode.id) {
                    this.removeAccountFromStore(paymentMode.id);
                }

                if (this.selectedAccounts.length === 0 && !this.readOnly) {
                    // paymentMode.amount = this.totalSpread;
                    // this.invalidPaymentsSum(false);
                }

                paymentMode.id = selectedBank.id;
                paymentMode.name = selectedBank.account_name;

                // Creating watcher for the Amount inputted and source
                this.$watch(() => paymentMode.amount, this.debouncePaidAmountChanged);
                this.$watch(() => paymentMode.id, this.debouncePaidAmountChanged);

                this.$store.commit('selectAccount', paymentMode);
                this.$store.commit('totalPaid', this.totalAmountPaid);
            },
            paidAmountChanged(val) {
                if (this.totalAmountPaid > this.totalSpread) {
                    // toast('Amount paid cannot be greater than total sales amount', 'error', 'center');
                    this.invalidPaymentsSum(true);
                    this.$store.commit('totalPaid', this.totalAmountPaid);
                    return null;
                }

                this.$store.commit('totalPaid', this.totalAmountPaid);
                this.invalidPaymentsSum(false);
            },
            removeAccountFromStore (account) {
                this.$store.commit('removeAccount', account);
                this.$store.commit('totalPaid', this.totalAmountPaid);
            },
            bankIsNotAvailable: function () {
                return this.salePaymentMethods.length === this.banks.length;
            },
            addSalePaymentMethod: function () {
                if (this.bankIsNotAvailable() || this.readOnly) return;

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
