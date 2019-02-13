<template>
	<payment-method-selection :banks="banks" :options="options"></payment-method-selection>
</template>

<script>
	export default {
		name: "LoanReceiver",
		props: ['options', 'banks', 'amount'],
		computed: {
			spreadAmount () {
				return this.amount;
			}
		}
	}
</script>