export const expenseApp = {
    data: {
        expenseAmount: 0,
        selectedMethods: [],
        methodToBeChanged: {},
        expensePaymentMethods: [],
        expenseShowPaymentMethods: false
    },
    mounted () {
        this.expensePaymentMethods = window.paymentMethods;
        if (this.expensePaymentMethods) {
            this.selectedMethods.push(this.expensePaymentMethods[0]);
        }
    },
    methods: {
        changePaymentMethod (method) {
            this.methodToBeChanged = method;
            this.toggleShowPaymentMethods();
        },
        toggleShowPaymentMethods () {
            this.expenseShowPaymentMethods = !this.expenseShowPaymentMethods;
        },
        selectPaymentMethod (method) {
            this.selectedMethods.splice(
                this.selectedMethods.findIndex(method => {
                    return method.mode === this.methodToBeChanged.mode;
                }) , 1, method
            );
            this.toggleShowPaymentMethods();
        },
        showPayExpenseModal (evt) {
            let row = evt.target.parentElement.parentElement;
            if (!document.querySelector("#expense_date").value) {
                swal("Oops", "No date specified", "warning");
                return;
            }else if ( row.querySelector('.expenseDescription').value.trim() && row.querySelector('.expenseAmount').value.trim() && !isNaN(row.querySelector('.expenseAmount').value.trim()) && row.querySelector('.expenseAmount').value.trim() > 0) {
                this.openModal("#paymentModal");
            } else {
                swal("Oops", "Invalid description or amount of expense", "warning");
            }
        },
        expenseAmountChange (evt) {
            if (true) {}
        },
        payExpense (evt) {
            evt.preventDefault();

        }
    }
};
