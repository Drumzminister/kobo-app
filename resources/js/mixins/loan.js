export const loanApp = {
    data: {
        newSource: "",
        searchSource: "",
        sources: {},
        chosenSource: "",
        loanDescription: "",
        loanAmount: "",
        loanInterest: "",
        loanTerm: "",
        loanPaymentIntervals: [1,2,4],
        period: "month",
        paymentPerYear: 1,
        loanDate: "",
        loans: [],
        loadingLoanDetails: false,
        allSources: [],
        loanAmtPaid: 0,
        loanAmtOwing: 0,
        loanAmtRunning: 0,
        currentLoan: {},
        noSourceFound: false,
        showSourcesForm: false,
        sourceSearching: false,
        currentLoanPayments: [],
        loanPaymentAmount: "",
        loanPaymentValidationError: false,
        loanPaymentValidationMessage: "",
    },
    watch: {
        loans () {
            this.loans.forEach(loan => {
                this.sources.forEach(source => {
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
        period () {
            if (this.period === "month") {
                this.loanPaymentIntervals = [1, 2, 4];
            } else if(this.period === "year") {
                this.loanPaymentIntervals = [1, 2, 3, 4, 5, 6, 12];
            } else {
                this.loanPaymentIntervals = [1, 2, 3, 4, 5, 6, 7];
            }
        }
    },
    mounted () {
        this.loans = window.loans;
        this.allSources = window.loanSources;
        this.loanAmtPaid = window.loanAmtPaid;
        this.loanAmtOwing = window.loanAmtOwing;
        this.loanAmtRunning = window.loanAmtRunning;
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
            if (this.loanDescription.trim() === "" || this.loanAmount.trim() === "" || this.loanInterest.trim() === "" || this.period.trim() === "" || this.loanTerm.trim() === "" || !this.paymentPerYear ||  this.chosenSource.toLocaleString() === "" || this.loanDate.trim() === "") {
                swal('Oops', "Some required fields are empty", "error");
                return;
            }
            let formData = new FormData();
            formData.append('description', this.loanDescription);
            formData.append('amount', this.loanAmount);
            formData.append('interest', this.loanInterest);
            formData.append('period', this.period);
            formData.append('term', this.loanTerm);
            formData.append('payment_interval', this.paymentPerYear);
            formData.append('source_id', this.chosenSource);
            formData.append('start_date', this.loanDate);
            // formData.append('_token', token);
            axios.post('/loans', formData).then(res => {
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
        }
    }
};
