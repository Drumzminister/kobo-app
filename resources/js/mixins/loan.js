export const loanApp = {
    data: {
        loans: [],
        sources: {},
        loanDate: "",
        loanTerm: "",
        newSource: "",
        loanAmount: "",
        allSources: [],
        loanAmtPaid: 0,
        currentLoan: {},
        loanAmtOwing: 0,
        searchSource: "",
        chosenSource: "",
        loanInterest: "",
        paymentPerYear: 1,
        loanAmtRunning: 0,
        loanDescription: "",
        loanPeriod: "month",
        noSourceFound: false,
        loanPaymentAmount: "",
        showSourcesForm: false,
        sourceSearching: false,
        loanPaymentMethods: [],
        currentLoanPayments: [],
        showMoreIntervals: false,
        accountReceivingLoan: "Select",
        loadingLoanDetails: false,
        showIntervalSelector: false,
        loanPaymentInterval: "Monthly",
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
        }
    },
    mounted () {
        this.loans = window.loans;
        this.allSources = window.loanSources;
        this.loanAmtPaid = window.loanAmtPaid;
        this.loanAmtOwing = window.loanAmtOwing;
        this.loanAmtRunning = window.loanAmtRunning;
        this.loanPaymentMethods = window.paymentMethods;
    },
    methods: {
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
            // formData.append('_token', token);
            formData.append('name', this.newSource);
            axios.post('/client/loan/sources/add', formData).then(res => {
                swal('Successful', "New loan source added successfully", "success");
                this.showSourcesForm = false;
                this.searchSource = res.data.source.name;
                this.chosenSource= res.data.source.id;
            }).catch(err => {
                console.error(err);
            })
        },
        saveLoan () {
            if (this.loanDescription.trim() === "" || this.loanAmount.trim() === "" || this.loanInterest.trim() === "" || this.loanPeriod.trim() === "" || this.loanTerm.trim() === "" || !this.paymentPerYear ||  this.chosenSource.toLocaleString() === "" || this.loanDate.trim() === "") {
                swal('Oops', "Some required fields are empty", "error");
                return;
            }
            let formData = new FormData();
            formData.append('description', this.loanDescription);
            formData.append('interest', this.loanInterest);
            formData.append('loan_source_id', this.chosenSource);
            formData.append('amount', this.loanAmount);
            formData.append('period', this.loanPeriod);
            formData.append('term', this.loanTerm);
            formData.append('payment_interval', this.paymentPerYear);
            formData.append('start_date', this.loanDate);
            formData.append('receivingAccount', JSON.stringify(this.accountReceivingLoan) );
            // formData.append('_token', token);
            axios.post(window.addLoanUrl, formData).then(res => {
                swal('Successful', 'Loan added successfully', 'success');
                document.querySelector('#cancelLoanModal').click();
                let loan = res.data.loan;
                loan.source_name = this.searchSource;
                loan.status = "running";
                this.loans.unshift(loan);
            }).catch(err => {
                swal('Oops', err.response.data.error, "error");
            });
        },
        displayLoanDetails (loan, evt) {
            let row = evt.target;
            this.currentLoan = loan;
            this.loadingLoanDetails = true;
            axios.get(`/loans/${loan.id}/payments`).then(res => {
                this.loadingLoanDetails = false;
                this.currentLoanPayments = res.data.payments;
            }).catch(err => {
                this.loadingLoanDetails = false;
                console.error(err)
            });
            $('#loanDetailsModal').modal('show');
        },
        payLoan (evt) {
            evt.preventDefault();
            if (this.loanPaymentValidationError) {
                swal ("Oops", this.loanPaymentValidationMessage, "warning");
            }else {
                let formData = new FormData(evt.target);
                // formData.append('_token', token);
                formData.append('loan_id', this.currentLoan.id);

                axios.post('/loans/payment', formData).then(res => {
                    this.currentLoanPayments.unshift(res.data.payment);
                    swal('Successful', 'Payments Made Successfully', 'success');
                    this.currentLoan.amount_paid = Number(this.currentLoan.amount_paid);
                    this.currentLoan.amount_paid += Number(res.data.payment.amount);
                    $('#pay-loan').modal('hide');
                }).catch(err => {
                    swal('Oops', err.response.data.error, "error");
                })
            }
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
        selectLoanPaymentInterval (event) {
            this.loanPaymentInterval = event.target.innerText;
            this.toggleShowIntervalSelector();
        }
    }
};
