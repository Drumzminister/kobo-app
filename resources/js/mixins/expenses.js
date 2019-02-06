export const expenseApp = {
    data: {
        latest: [],
        expenses: [],
        expenseAmount: 0,
        currentExpense: "",
        currentExpenseRow: "",
        selectedMethods: [],
        expenseRecords: [],
        methodToBeChanged: {},
        isPayingExpense: false,
        isSavingExpense: false,
        expenseShowPaymentMethods: false
    },
    mounted () {
        this.latest = window.latest;
        this.expenses = window.expenses;
        this.addExpenseRecord();
    },
    computed: {
        selectedAccounts () {
            return this.$store.getters.selectedAccounts;
        },
        spreadAmount () {
            return this.currentExpense.amount - this.currentExpense.amount_paid || 0;
        }
    },
    methods: {
        sortLatest (key) {
            if (key) {
                this.latest.sort(function (a, b) {
                    return b.amount - a.amount;
                })
            } else {
                this.latest.sort(function (a, b) {
                    return a.amount - b.amount;
                })
            }
        },
        showPayExpenseModal (evt, expense) {
            let row = evt.target.parentElement.parentElement;
            
            if (!document.querySelector("#expense_date").value) {
                swal("Oops", "No date specified", "warning");
            }else if ( expense.description.trim() && expense.amount.trim() && !isNaN(Number(expense.amount.trim())) && expense.amount.trim() > 0) {
                this.currentExpense = expense;
                this.currentExpenseRow = row;
                this.openModal("#paymentModal");
            } else {
                swal("Oops", "Invalid description or amount of expense", "warning");
            }
        },
        payExpense (evt) {
            evt.preventDefault();
            let sum = 0;
            this.selectedAccounts.forEach((account) => {
                if ( !isNaN(Number(account.amount)) ) {
                    sum += Number(account.amount);
                }
            });
            let expenseAmount = Number(this.currentExpense.amount);
            let details = this.currentExpense.description;
            let date = document.querySelector("#expense_date").value;
            let payBtn = this.currentExpenseRow.querySelector('.payBtn');
            let paidBtn = this.currentExpenseRow.querySelector('.paid');
            if ( sum !==  expenseAmount) {
                swal({
                    timer: 3000,
                    toast: true,
                    type: 'warning',
                    position: 'top-end',
                    showConfirmButton: false,
                    text: `You are making an incomplete payment for this expense amount left is:${expenseAmount - sum}`,
                });
            }
            let formData = new FormData();
            formData.append('date', date);
            formData.append('details', details);
            formData.append('amount', expenseAmount.toString());
            formData.append('amount_paid', sum.toString());
            formData.append('paymentMethods', JSON.stringify(this.selectedAccounts));
            this.isPayingExpense = true;
            axios
                .post('/client/expenses/add', formData)
                .then(res => {
                    swal({
                        timer: 2500,
                        toast: true,
                        type: 'success',
                        position: 'top-end',
                        showConfirmButton: false,
                        title: `Payment Made successfully`,
                    });
                    this.isPayingExpense = false;
                    this.currentExpenseRow.querySelector('.expenseAmount').readOnly = true;
                    payBtn.style.display = "none";
                    paidBtn.style.display = "block";
                    this.closeModal('#paymentModal');
                })
                .catch(err => {
                    swal({
                        timer: 3000,
                        toast: true,
                        type: 'error',
                        position: 'top-end',
                        showConfirmButton: false,
                        title: `Unable to complete payment: ${err.response.data.message}`,
                    });
                    this.isPayingExpense = false;
                })
            ;
        },
        addExpenseRecord () {
            let expense = {
                description: null,
                amount: null,
            };
            this.expenseRecords.push(expense);
        },
        beforeSavingExpenses () {
            let rows = document.querySelectorAll('.records');
            let details = [];
            let hasUnpaid = false;
            if (!document.querySelector("#expense_date").value) {
                swal("Oops", "No date specified", "warning");
                return;
            }
            swal({
                timer: 2000,
                toast: true,
                type: 'info',
                position: 'top-end',
                showConfirmButton: false,
                text: `All unfilled records will be ignored`,
            });
            for (let i = 0; i < rows.length; i++) {
                if (rows[i].querySelector('.expenseDescription').value.trim()) {
                    details.push(rows[i]);
                    if (!rows[i].querySelector('.expenseAmount').readOnly) {
                        hasUnpaid = true;
                    }
                }
            }
            if (hasUnpaid) {
                swal({
                    title: 'Are you sure?',
                    text: "Some unpaid expenses has been found. Will you like to go back and pay for these expenses?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#4f4',
                    cancelButtonText: 'Yes, Go back!',
                    confirmButtonText: 'No, Proceed!'
                }).then((result) => {
                    if (result.value) {
                        this.saveExpenses(details);
                    }
                })
            } else {
                this.saveExpenses(details);
            }
        },
        saveExpenses (details) {
            let saved = 0;
            let date = document.querySelector("#expense_date").value;
            details.forEach(expense => {
                if (!expense.querySelector('.expenseAmount').value) {
                    swal({
                        timer: 2000,
                        toast: true,
                        type: 'error',
                        position: 'top-end',
                        showConfirmButton: false,
                        text: `Some records have no amount entered`,
                    });
                    return;
                }

                let formData = new FormData();
                formData.append('date', date);
                formData.append('details', expense.querySelector('.expenseDescription').value.trim());
                formData.append('amount', expense.querySelector('.expenseAmount').value.trim());

                this.isSavingExpense = true;
                axios
                    .post('/client/expenses/add', formData)
                    .then(res => {
                        saved += 1;
                    })
                    .catch(err => {
                        swal({
                            timer: 3000,
                            toast: true,
                            type: 'error',
                            position: 'top-end',
                            showConfirmButton: false,
                            title: `Unable to save: ${err.response.data.message}`,
                        });
                    })
            });
            let checkSaved = setInterval(function () {
                if (saved === details.length) {
                    location.href = "/client/expenses";
                    clearInterval(checkSaved);
                    this.isSavingExpense = false;
                }
            }, 50)
        },
        payUnpaidExpenses (expenseId) {
            this.currentExpense = this.expenses.find(exp => exp.id === expenseId);
            console.log("jame");
        }
    }
};
