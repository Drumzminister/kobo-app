let app = new Vue({
    el: "#loanApp",
    data: {
        total:0,
        loans: [],
        search: "",
        sources: [],
        canNext:true,
        pageCount: 1,
        currentLoan: {},
        paymentAmount: 0,
        hasSearched: false,
        canPrevious: false,
        loadingLoans: true,
        currentLoanPayments: [],
        displayPaginator: false,
        showFilterOptions: false,
        loadingLoanDetails: false,
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
        pageCount () {
            if (this.pageCount > 1) {
                this.canPrevious = true;
            } else {
                this.canPrevious = false
            }
            if (this.total <= this.pageCount * 10 ) {
                this.canNext = false;
            } else {
                this.canNext = true;
            }
        },
        loans () {
            this.loans.forEach(loan => {
                this.sources.forEach(source => {
                    if (loan.loan_source_id === source.id ) {
                        loan.source_name = source.name;
                    }
                });

            });
        }
    },
    filters: {
        numberFormat (value) {
            value = Number(value);
            if (isNaN(value)) {return value;}
            const formatter = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2
            });
            return formatter.format(value);
        }
    },
    mounted () {
        axios.get('/loans/sources/all').then (res => {
            this.sources = res.data.sources;
            axios.get('/loans/paginated').then(res => {
                this.loadingLoans = false;
                this.total = res.data.total;
                if (res.data.total > 10) {
                    this.displayPaginator = true
                }
                this.loans = res.data.loans;
            })
        }).catch(err => {
            console.error(err);
        });
    },
    methods: {
        filterBy (key) {
            if (key === "source") {
                /*
                *    This is probably the most complex javascript that I've written in my whole life;
                *    the spread operator will flatten the already filtered array and add them to the loanArray
                * */
                let loanArray = [];
                let sourceNames = [];
                this.sources.forEach(source => {
                   sourceNames.push(source.name);
                });
                sourceNames.sort().forEach(source => {
                    loanArray.push(...this.loans.filter(loan => loan.source_name === source))
                });
                this.loans = loanArray;
            } else if (key === 'status') {
                let loanArray = [];
                let statuses = ['running', 'completed'];
                statuses.forEach(status => {
                    loanArray.unshift(...this.loans.filter(loan => loan.status === status))
                });
                this.loans = loanArray;
            }

            this.showFilterOptions = false;
        },
        displayLoanDetails (loan) {
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
                    console.error(err);
                })
            }
        },
        toNext () {
            this.loadingLoans = true;
            axios.get(`/loans/paginated?page=${++this.pageCount}`).then(res => {
                this.loadingLoans = false;
                this.loans = res.data.loans;
                this.total = res.data.total;

                this.hasSearched = false;
            });
        },
        searchLoan () {
            let query = this.search;
            if (!query.trim()) {
                return;
            }
            this.loadingLoans = true;
            axios.get(`/loans/search?query=${query.trim()}`).then(res => {
                this.loadingLoans = false;
                this.hasSearched = true;
                this.loans = res.data.results;
            }).catch (err => {
                console.error(err);
            });
        },
        toPrevious () {
            this.loadingLoans = true;
            axios.get(`/loans/paginated?page=${--this.pageCount}`).then(res => {
                this.loadingLoans = false;
                this.loans = res.data.loans;
                this.total = res.data.total;
                this.hasSearched = false;
                this.loans.forEach(loan => {
                    this.sources.forEach(source => {
                        if (loan.loan_source_id === source.id ) {
                            loan.source_name = source.name;
                        }
                    });

                });
            })
        },
        toOriginal () {
            this.loadingLoans = true;
            axios.get('/loans/paginated').then(res => {
                this.loadingLoans = false;
                this.total = res.data.total;
                if (res.data.total > 10) {
                    this.displayPaginator = true
                }
                this.loans = res.data.loans;
                this.hasSearched = false;
            })
        }
    }
});