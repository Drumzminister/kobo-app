import {toast} from "../helpers/alert";

export const loanApp = {
    data: {
        loans: [],
        sources: {},
        newSource: "",
        allSources: [],
        searchSource: "",
        chosenSource: "",
        loanDate: "",
        loanTerm: "",
        loanAmount: "",
        loanAmtPaid: 0,
        currentLoan: {},
        loanAmtOwing: 0,
        loanInterest: "",
        loanAmtRunning: 0,
        paymentPerYear: 1,
        loanDescription: "",
        loanPeriod: "month",
        noSourceFound: false,
        allLoanIntervals: [],
        loanPaymentAmount: "",
        showSourcesForm: false,
        sourceSearching: false,
        loanPaymentMethods: [],
        currentLoanPayments: [],
        isRequestingLoan: false,
        showMoreIntervals: false,
        loadingLoanDetails: false,
        accountReceivingLoan: null,
        loanPaymentIntervalList: [],
        showIntervalSelector: false,
        loanPaymentInterval: "Monthly",
        showSelectPaymentMode: false,
        loanPaymentValidationMessage: "",
        loanPaymentValidationError: false
    },
    watch: {
        loans () {
            if (this.loans === undefined) return;
            this.loans.forEach(loan => {
                this.allSources.forEach(source => {
                    if (loan.loan_source_id === source.id ) {
                        loan.source_name = source.name;
                    }
                });
            });
        },
        loanPaymentAmount () {
            if (this.loanPaymentAmount > (this.currentLoan.amount - this.currentLoan.amount_paid) + (this.currentLoan.interest * this.currentLoan.amount / 100)) {
                this.loanPaymentValidationError = true;
                this.loanPaymentValidationMessage = "The amount entered is greater than the maximum payable amount";
            } else{
                this.loanPaymentValidationError = false;
            }
        },
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
    mounted () {
        this.loans = window.loans;
        this.banks = window.banks;
        this.allSources = window.loanSources;
        this.loanAmtPaid = window.loanAmtPaid;
        this.loanAmtOwing = window.loanAmtOwing;
        this.loanAmtRunning = window.loanAmtRunning;
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
        selectedAccounts () {
            return this.$store.getters.selectedAccounts;
        },
        spreadAmount () {
            return this.loanAmount;
        }
    },
    methods: {
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
            axios.get(`/client/loan/sources/search/${this.searchSource}`).then(res => {
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
            axios.post('/client/loan/sources/add', formData).then(res => {
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
            if (this.loanDescription.trim() === "" || this.loanAmount.trim() === "" || this.loanInterest.trim() === "" || this.loanPeriod.trim() === "" || this.loanTerm.trim() === "" || !this.paymentPerYear ||  this.chosenSource.toLocaleString() === "" || this.loanDate.trim() === "") {
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
                    text: `Amount receivable should equal loan amount: ${this.loanAmount}`,
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
            axios.post(window.addLoanUrl, formData).then(res => {
                swal({
                    type: 'success',
                    title: "Successful",
                    text: 'Loan added successfully',
                    timer: 1000,
                    showConfirmButton: false
                });
                this.isRequestingLoan = false;
                this.closeLoanModal();
                let loan = res.data.loan;
                loan.source_name = this.searchSource;
                loan.status = "running";
                loan.amount_paid = 0;
                this.loans.unshift(loan);
            }).catch(err => {
                this.isRequestingLoan = false;
                swal('Oops', err.response.data.error, "error");
            });
        },
        displayLoanDetails (loan) {
            this.currentLoan = loan;
            this.loadingLoanDetails = true;
            axios.get(`/client/loan/${loan.id}/payments`).then(res => {
                this.loadingLoanDetails = false;
                this.currentLoanPayments = res.data.payments;
            }).catch(err => {
                this.loadingLoanDetails = false;
                console.error(err)
            });
            this.openModal('#loanDetailsModal');
        },
        payLoan (evt) {
            evt.preventDefault();
            let sum = 0;
            this.selectedAccounts.forEach((account) => {
                if ( !isNaN(Number(account.amount)) ) {
                    sum += Number(account.amount);
                }
            });

            if (sum > (Number(this.currentLoan.amount - this.currentLoan.amount_paid) + Number(this.currentLoan.interest * this.currentLoan.amount / 100)) ) {
                swal("Error", `Total amount payable should be less than ${(this.currentLoan.amount - this.currentLoan.amount_paid) + (this.currentLoan.interest * this.currentLoan.amount / 100)}`, "error");
                return;
            }
            let formData = new FormData();
            formData.append('amount', sum.toString());
            formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
            this.isRequestingLoan = true;
            axios.post(`/client/loan/${this.currentLoan.id}/pay`, formData).then(response => {
                this.isRequestingLoan = false;
                this.closeModal('#loanDetailsModal');
                this.currentLoan.amount_paid = Number(this.currentLoan.amount_paid) + Number(sum);
                toast(`Payment made successfully`, 'success');
                this.showSelectPaymentMode = !this.showSelectPaymentMode
            }).catch(err => {
                this.isRequestingLoan = false;
                toast(`${err.response.data.message}`, 'error');
            });
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
        selectLoanPaymentInterval (interval) {
            this.loanPaymentInterval = interval;
            this.toggleShowIntervalSelector();
        },
        closeLoanModal () {
            document.querySelector('.loan-form').reset();
            this.loanDate= "";
            this.loanTerm= "";
            this.loanAmount= "";
            this.loanDescription = "";
            this.loanPeriod = "";
            this.loanInterest = "";
            this.paymentPerYear = 1;
            this.closeModal('#addLoanModal');
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
        }
    }
};
