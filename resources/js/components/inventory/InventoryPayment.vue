<template>
    <payment-method-selection  :banks="banks"></payment-method-selection>
</template>

<script>

    export default {
        name: "InventoryPayment",
        props: ['banks', 'total_cost_price'],
        computed: {
            spreadAmount () {
                return this.total_cost_price
            }
        }
    }
</script>

<style scoped>

</style>
