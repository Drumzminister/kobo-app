<template>
    <div class="modal-content">
        <div class="modal-body">
            <div class="nav flex-sm-column flex-row">
                <div class="product-details">
                    <form @submit.prevent="saveLoan" class="loan-form">
                        <h5 class="h5 uppercase">New Loan</h5>
                        <div class="form-group">
                            <label class="px-0" for="source">Source</label>
                            <input type="text" v-model="searchSource" @keyup="debouncedSearch" class="form-control" id="source" placeholder="E.g Microfinance Banks">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" v-model="loanDescription" rows="3" placeholder="Briefly Describe the purpose of loan"></textarea>
                        </div>
                        <h5 class="h5 pt-1">Additional</h5>
                        <div class="form-group">
                            <label class="px-0"  for="rate">Interest Rate(%)</label>
                            <input type="number" min="0.00" step="0.01" v-model="loanInterest" class="form-control" id="rate" placeholder="0.00">
                        </div>
                        <div class="form-group">
                            <label class="px-0" for="loanAmount">Loan Amount</label>
                            <input type="number" min="0.00" step="0.01" v-model="loanAmount" class="form-control" id="loanAmount" placeholder="0.00">
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="loanDuration">Loan Duration</label>
                            <div class="d-flex">
                                <div class="col-6">
                                    <input type="number"  v-model="loanTerm" class="form-control" min="0" id="loanDuration" placeholder="10">
                                </div>
                                <div class="ml-auto col-6">
                                    <select name="period" class="form-control" style="background-color: #00C259; color: #ffffff;" v-model="loanPeriod" id="loanPeriod">
                                        <option value="week">Weeks</option>
                                        <option value="month">Months</option>
                                        <option value="year">Years</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="px-0" >Payment Interval</label>
                            <div class="btn-group dropright">
                                <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleShowIntervalSelector()">
                                    {{ loanPaymentInterval.name }}
                                </button>
                                <ul class="dropdown-menu"  style="display: block; overflow: auto; max-height: 320px;" v-if="showIntervalSelector">
                                    <li class="dropdown-item" v-for="interval in loanPaymentIntervalList" @click="selectLoanPaymentInterval(interval)" style="cursor: pointer">
                                        {{ interval.name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="px-0" for="loanDate">Start date of Loan</label>
                            <div class="date ">
                                <div class="dates input-group input-group-lg pb-3">
                                    <input type="date" class="form-control date-picker" v-model="loanDate" id="loanDate" value="" name="event_date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <payment-method-selection :banks="banks" :options="{receiveMode: true}"></payment-method-selection>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="button" v-if="isRequestingLoan" class="btn btn-secondary py-2 px-4" disabled>Cancel</button>
                                <button type="button" v-else class="btn btn-secondary py-2 px-4" @click="closeModal()">Cancel</button>
                            </div>
                            <div class="col-8">
                                <button type="button" v-if="isRequestingLoan" class="btn btn-started pull-right ">Loading...<i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                                <button type="submit" v-else class="btn btn-started pull-right ">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box" v-if="showSourcesForm">
                <div class="form-group d-flex">
                    <input type="text" class="form-control rounded-0 loader" v-model="newSource">
                    <button v-if="isRequestingLoan"  style="cursor: default"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></button>
                    <button  v-else @click="addSource" style="cursor: pointer" class="fa fa-plus p-2"></button>

                </div>
                <ul class="p-0 mb-0">
                    <li class="d-block p-1 mb-2" v-for="source in sources" @click="selectSource(source.id, $event)">{{source.name}}</li>
                    <p v-if="noSourceFound">There's no existing loan source with this name. <br>Create a new loan source using the input field above.</p>
                    <p v-if="sourceSearching">Searching for loan sources...</p>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import {toast} from "../../helpers/alert";
    import PaymentMethodSelection from "../banks/PaymentMethodSelection"

    export default {
        name: "AddLoan",
        data () {
            return {
                sources: {},
                newSource: "",
                allSources: [],
                searchSource: "",
                chosenSource: "",
                loanDate: "",
                loanTerm: "",
                loanAmount: "",
                loanInterest: "",
                loanDescription: "",
                loanPeriod: "month",
                loanPaymentAmount: "",
                loanPaymentIntervalList: [],
                showIntervalSelector: false,
                loanPaymentInterval: "Monthly",
                showSourcesForm: false,
                sourceSearching: false,
                isRequestingLoan: false,
            }
        },
        props: ['banks', 'loans'],
        components: {
            PaymentMethodSelection
        },
        mounted () {
            this.allLoanIntervals = [
                {
                    name: "Weekly" ,
                    value: "1 week"
                },
                {
                    name: "Bi-weekly",
                    value: "2 week"
                },
                {
                    name: "Monthly",
                    value: "1 month"
                },
                {
                    name: "Bi-monthly",
                    value: "2 month"
                },
                {
                    name: "Quaterly",
                    value: "3 month"
                },
                {
                    name: "Anually",
                    value: "1 year"
                },
                {
                    name: "4 Months",
                    value: "4 month"
                },
                {
                    name: "5 Months",
                    value: "5 month"
                },
                {
                    name: "6 Months",
                    value: "6 month"
                },
                {
                    name: "7 Months",
                    value: "7 month"
                },
                {
                    name: "8 Months",
                    value: "8 month"
                },
                {
                    name: "9 Months",
                    value: "9 month"
                },
                {
                    name: "10 Months",
                    value: "10 month"
                },
                {
                    name: "11 Months",
                    value: "11 month"
                },
            ];
            this.loanPaymentIntervalList = [...this.allLoanIntervals];
            this.loanPaymentInterval = this.loanPaymentIntervalList[0];
            this.runDebouncedSearch = _.debounce(this.searchForSource, 500);
        },
        computed: {
            spreadAmount () {
                return this.loanAmount;
            },
            selectedAccounts () {
                return this.$store.getters.selectedAccounts;
            },
        },
        watch: {
            loanInterest () {
                if (Number(this.loanInterest) >= 100) {
                    toast('Interest can not be greater than 100%', 'error');
                    this.loanInterest = this.loanInterest.slice(0, this.loanInterest.length - 1) ;
                }
            },
            loanTerm () {
                this.calculateIntervalsToBeShown();
            },
            loanPeriod () {
                this.calculateIntervalsToBeShown();
            }
        },
        methods: {
            closeModal () {
                this.$parent.addLoan = false;
                $('#addLoanModal').modal('toggle');
                // this.$parent.closeLoanModal();
            },
            toggleShowMoreIntervals (evt) {
                this.showMoreIntervals = !this.showMoreIntervals;
                if (this.showMoreIntervals) {
                    setTimeout(() => {
                        evt.target.parentElement.scrollTo({
                            top: 200,
                            left: 0,
                            behaviour: "smooth"
                        });
                    },  10);
                }
            },
            toggleShowIntervalSelector () {
                this.showIntervalSelector = !this.showIntervalSelector;
            },
            debouncedSearch () {
                this.runDebouncedSearch();
            },
            searchForSource () {
                if (this.searchSource.trim() === "") {
                    this.noSourceFound = false;
                    this.showSourcesForm = false;
                    return;
                }
                this.noSourceFound = false;
                this.showSourcesForm = true;
                this.sourceSearching = true;
                window.axios.get(`/client/loan/sources/search/${this.searchSource}`).then(res => {
                    if (res.data.sources.length === 0) {
                        this.sources = {};
                        this.noSourceFound = true;
                        this.newSource = this.searchSource;
                    } else {
                        this.newSource = "";
                        this.sources = res.data.sources;
                        this.noSourceFound = false;
                    }

                    this.sourceSearching = false;

                }).catch(err => {
                    this.sourceSearching = false;
                    console.error("An error occurred: " +err)
                });
            },
            selectSource (id, evt) {
                this.chosenSource = id;
                this.searchSource = evt.target.innerText;
                this.showSourcesForm = false;
            },
            addSource () {
                let formData = new FormData();
                this.isRequestingLoan = true;
                formData.append('name', this.newSource);
                window.axios.post('/client/loan/sources/add', formData).then(res => {
                    toast("New loan source added successfully", 'success');
                    this.showSourcesForm = false;
                    this.isRequestingLoan = false;
                    this.chosenSource= res.data.source.id;
                    this.searchSource = res.data.source.name;
                }).catch(err => {
                    this.isRequestingLoan = false;
                    console.error(err);
                })
            },
            saveLoan () {
                if (this.loanDescription.trim() === "" || this.loanAmount.trim() === "" || this.loanInterest.trim() === "" || this.loanPeriod.trim() === "" || this.loanTerm.trim() === "" ||  this.chosenSource.toLocaleString() === "" || this.loanDate.trim() === "") {
                    toast("Some required fields are empty", "error");
                    return;
                }
                let sum = 0;
                this.selectedAccounts.forEach((account) => {
                    if ( !isNaN(Number(account.amount)) ) {
                        sum += Number(account.amount);
                    }
                });
                if (sum !== Number(this.loanAmount)) {
                    swal({
                        title: "Error",
                        text: `Amount received should equal to loan amount: ${this.loanAmount}`,
                        type: `warning`,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    return;
                }
                let formData = new FormData();
                formData.append('description', this.loanDescription);
                formData.append('interest', this.loanInterest);
                formData.append('loan_source_id', this.chosenSource);
                formData.append('amount', this.loanAmount);
                formData.append('period', this.loanPeriod);
                formData.append('term', this.loanTerm);
                formData.append('payment_interval', this.loanPaymentInterval.value);
                formData.append('start_date', this.loanDate);
                formData.append('receivingAccount', JSON.stringify(this.selectedAccounts));
                this.isRequestingLoan = true;
                window.axios.post(window.addLoanUrl, formData).then(res => {
                    swal({
                        type: 'success',
                        title: "Successful",
                        text: 'Loan added successfully',
                        timer: 1000,
                        showConfirmButton: false
                    });
                    this.isRequestingLoan = false;
                    this.$parent.closeLoanModal();
                    let loan = res.data.loan;
                    loan.source_name = this.searchSource;
                    loan.status = "running";
                    loan.amount_paid = 0;
                    this.loans.unshift(loan);
                    location.reload();
                }).catch(err => {
                    this.isRequestingLoan = false;
                    swal('Oops', err.response.data.error, "error");
                });
            },
            calculateIntervalsToBeShown () {
                if (this.loanTerm.trim() === "") {
                    this.loanPaymentIntervalList = [...this.allLoanIntervals];
                }
                if (this.loanTerm) {
                    let duration = moment([]).add(this.loanTerm, this.loanPeriod);
                    this.loanPaymentIntervalList = this.allLoanIntervals.filter(interval => {
                        let term, period;
                        [term, period] = interval.value.split(" ");
                        let nextInterval = moment([]).add(term, period);
                        return duration.isSameOrAfter(nextInterval);
                    });
                    this.loanPaymentInterval = this.loanPaymentIntervalList[0];
                }
            },
            selectLoanPaymentInterval (interval) {
                this.loanPaymentInterval = interval;
                this.toggleShowIntervalSelector();
            },
        }
    }
</script>

<style scoped>

</style>
