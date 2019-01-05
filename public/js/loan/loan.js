let loan = new Vue({
    el: "#loan",
    data: {
        newSource: "",
        searchSource: "",
        sources: {},
        chosenSource: "",
        description: "",
        amount: "",
        interest: "",
        term: "",
        paymentIntervals: [1,2,4],
        period: "month",
        paymentPerYear: 1,
        loanDate: "",
        loans: [],
        loadingLoanDetails: false,
        allSources: [],
        amtPaid: 0,
        amtOwing: 0,
        amtRunning: 0,
        currentLoan: {},
        noSourceFound: false,
        showSourcesForm: false,
        sourceSearching: false,
        currentLoanPayments: [],
        paymentAmount: "",
        paymentValidationError: false,
        paymentValidationMessage: "",
    },
    watch: {
        paymentAmount () {
              if (this.paymentAmount > (this.currentLoan.amount - this.currentLoan.amount_paid) + (this.currentLoan.interest * this.currentLoan.amount / 100)) {
                  this.paymentValidationError = true;
                  this.paymentValidationMessage = "The amount entered is greater than the maximum payable amount";
              } else{
                  this.paymentValidationError = false;
              }
        },
        period () {
            if (this.period === "month") {
                this.paymentIntervals = [1, 2, 4];
            } else if(this.period === "year") {
                this.paymentIntervals = [1, 2, 3, 4, 5, 6, 12];
            } else {
                this.paymentIntervals = [1, 2, 3, 4, 5, 6, 7];
            }
        }
    },
    filters: {
        numberFormat (value) {
            value = Number(value);
            if (isNaN(value)) {return value;}
            const formatter = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            return formatter.format(value);
        }
    },
    mounted () {
        axios.get('/loans/sources/all').then (res => {
            this.allSources = res.data.sources;
            axios.get('/loans/get').then(res => {
                this.loans = res.data.loans
                this.loans.forEach(loan => {
                    this.allSources.forEach(source => {
                        if (loan.loan_source_id === source.id ) {
                            loan.source_name = source.name;
                        }
                    });

                });
            })
        }).catch(err => {
            console.error(err);
        });

        axios.get('/loans/running/count').then(res => {
            this.amtRunning = res.data;
        }).catch(err => {
            console.error(err);
        });

        axios.get('/loans/completed/count').then(res => {
            this.amtPaid = res.data;
        }).catch(err => {
            console.error(err);
        });

        axios.get('/loans/owing/count').then(res => {
            this.amtOwing = res.data;
        }).catch(err => {
            console.error(err);
        });
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
            axios.get(`/loans/sources/${this.searchSource}`).then(res => {
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
            formData.append('_token', token);
            formData.append('name', this.newSource);
            axios.post('/loans/sources', formData).then(res => {
                swal('Successful', "New loan source added successfully", "success");
                this.showSourcesForm = false;
                this.searchSource = res.data.source.name;
                this.chosenSource= res.data.source.id;
            }).catch(err => {
                console.error(err);
            })
        },
        saveLoan () {
            if (this.description.trim() === "" || this.amount.trim() === "" || this.interest.trim() === "" || this.period.trim() === "" || this.term.trim() === "" || !this.paymentPerYear ||  this.chosenSource.toLocaleString() === "" || this.loanDate.trim() === "") {
                swal('Oops', "Some required fields are empty", "error");
                return;
            }
            let formData = new FormData();
            formData.append('description', this.description);
            formData.append('amount', this.amount);
            formData.append('interest', this.interest);
            formData.append('period', this.period);
            formData.append('term', this.term);
            formData.append('payment_interval', this.paymentPerYear);
            formData.append('source_id', this.chosenSource);
            formData.append('start_date', this.loanDate);
            formData.append('_token', token);
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
            if (this.paymentValidationError) {
                swal ("Oops", this.paymentValidationMessage, "warning");
            }else {
                let formData = new FormData(evt.target);
                formData.append('_token', token);
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
});