<template>
    <div class="table-responsive table-responsive-sm" v-if="expenses.length > 0">
        <table class="table table-striped table-hover" id="expenseTable">
            <thead class="p-3">
                <tr class="tab">
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount (&#8358;)</th>
                    <th scope="col">Category</th>
                    <th scope="col">Payment Status</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="expense in expenses" :key="expense.id">
                    <td>{{ expense.date }}</td>
                    <td>{{ expense.details }}</td>
                    <td>{{ expense.amount }}</td>
                    <td>{{ expense.classification }}</td>
                    <td v-if="expense.has_finished_payment">Paid</td>
                    <td v-else>{{ expense.amount_paid > 0 ? 'Incomplete' : 'Not paid' }}<button class="btn mr-4 pull-right btn-sm btn-primary" @click=payUnpaidExpenses(expense.id)>Pay</button></td>

                </tr>
                <tr v-if="expenses.length === 0" id="noExpense">
                    <td colspan="5">
                        You have no expense. <br> Use the add expense button to add new expenses.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "ExpensesTable",
    props: ["expenses"],
    data () {
        return {

        }
    },
    methods: {
        payUnpaidExpenses (expenseId) {
            this.$parent.currentExpense = this.expenses.find(exp => exp.id === expenseId);
            this.$parent.openModal("#paymentModal");
        }
    },
    
}
</script>

<style scoped>
    
</style>