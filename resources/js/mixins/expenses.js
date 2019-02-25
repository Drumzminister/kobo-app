import {toast} from '../helpers/alert';

export const expenseApp = {
    data: {
        latest: [],
        expenses: [],
        oldExpenses: [],
        searchParam: "",
        expenseAmount: 0,
        isSearching: false,
        expenseRecords: [],
        currentExpense: "",
        selectedMethods: [],
        currentExpenseRow: "",
        methodToBeChanged: {},
        isPayingExpense: false,
        isSavingExpense: false,
        hasSearchResults: false,
        expenseShowPaymentMethods: false
    },
    filters: {
        truncate (str) {
            if (str.length > 20) {
                return `${str.substring(0, 20)}...`;
            }
            return str;
        }
    },
    mounted () {
        this.latest = window.latest;
        this.expenses = window.expenses;
        this.addExpenseRecord();
    },
    computed: {
        selectedAccounts () {
            return this.$store.getters.selectedAccounts;
        }
    },
    methods: {
        removeUnpaidExpense (expense) {
            this.expenseRecords.splice(this.expenseRecords.findIndex(ex => ex === expense), 1);
        },
        showOriginalExpenses () {
            this.hasSearchResults = false;
            this.expenses = [...this.oldExpenses];
        },
        searchExpense () {
            if (!this.searchParam.trim()) {
                return;
            } 
            this.isSearching = true;
            if (this.oldExpenses.length === 0) {
                this.oldExpenses = [...this.expenses];
            }
            axios.get(`/client/expenses/search/${this.searchParam.trim()}`)
                .then(res => {
                    this.isSearching = false;
                    if (res.data.expenses.length === 0) {
                        toast("No result found for search param. Redefine search parameters", "error");
                        return;
                    }
                    this.hasSearchResults = true;
                    this.expenses = res.data.expenses;
                    this.searchParam = "";

                })
                .catch(err => {
                    this.isSearching = false;
                    console.error(err);
                    this.searchParam = "";
                })
            ;
        },
        showExpenseDetails (expense) {
            this.currentExpense = expense;
            this.openModal('#expenseDetailsModal');
        },
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

        addExpenseRecord () {
            let expense = {
                description: null,
                amount: null,
                amount_paid: 0,
            };
            this.expenseRecords.push(expense);
        },
        beforeSavingExpenses () {
            let inValidRecords = []
            let hasUnpaid = false;
            if (!document.querySelector("#expense_date").value) {
                swal("Oops", "No date specified", "warning");
                return;
            }

            inValidRecords = this.expenseRecords.filter(expense => {
                return (expense.description === null) || (expense.amount === null) || (expense.description.trim() === "");
            })
            if (inValidRecords.length !== 0) {
                toast("Some required fields are missing", "error");
                return;
            }

            this.expenseRecords.forEach(expense => {
                if (!expense.paid) {
                    hasUnpaid = true;
                }
            });

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
                        this.saveExpenses(this.expenseRecords);
                    }
                })
            } else {
                this.saveExpenses(this.expenseRecords);
            }
        },
        saveExpenses (details) {
            let saved = 0;
            let date = document.querySelector("#expense_date").value;
            details.forEach(expense => {
                let formData = new FormData();
                formData.set('date', date);
                formData.set('details', expense.description.trim());
                formData.set('amount', expense.amount);

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
                        clearInterval(checkSaved);
                        this.isSavingExpense = false;
                    })
                ;
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
            this.openModal("#paymentModal");
        }
    }
};
