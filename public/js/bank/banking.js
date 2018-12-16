let banking = new Vue({
    el: "#banking",
    data: {
        banks: [],
        accNum: "",
        comment: "",
        balance: "",
        payingBanks: [],
        searchString: "",
        transferAmount: 0,
        hasSearched: false,
        loadingBanks: true,
        receivingBanks: [],
        showBalError: false,
        showAccNumError: false,
        selectedPayingBank: {},
        selectedReceivingBank: {},
        transferAmountError: false,
    },
    mounted () {
        axios.get('/getClientId').then(res => {
            user_id = res.data.id;
            axios.get(`/client/${user_id}/banks`).then(res => {
                this.banks = res.data;
                this.loadingBanks = false;
                this.payingBanks = [...this.banks];
                this.receivingBanks = [...this.banks];
            });
        });
    },
    watch: {
        accNum () {
            this.showAccNumError = this.accNum.length !== 10;
        },
        balance () {
            this.showBalError = this.balance < 0.01;
        },
        selectedPayingBank() {
            this.receivingBanks = [...this.banks];
            this.receivingBanks.splice(this.receivingBanks.findIndex(bank => {
                return bank.bank_name === this.selectedPayingBank.bank_name;
            }),1);
        },
        transferAmount () {
            this.transferAmountError = (this.transferAmount > this.selectedPayingBank.account_balance) || (this.transferAmount <= 0 && this.transferAmount.trim() !== "") ;
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
    methods: {
        addBank (evt) {
            evt.preventDefault();
            if (!this.isValidated()) {
                swal("Oops", "There are some errors on your input", "warning");
                return;
            }
            let formData = new FormData (evt.target);
            formData.append('_token', token);
            axios.post('/client/new-bank', formData).then(res => {
                swal('Success', res.data.message, "success");
                this.showAll();
                $('#addBankModal').modal('hide');
            }).catch(err => {
               swal("Oops", "An error occurred when creating this account", "error");
            });
        },
        search (evt) {
            evt.preventDefault();
            this.loadingBanks = true;
            this.hasSearched = true;
            axios.get(`/banks/search?q=${this.searchString}`).then(res => {
                this.banks = res.data;
                this.loadingBanks = false;
            })
        },
        isValidated () {
            return this.accNum.length === 10 && this.balance > 0;
        },
        showAll () {
            this.loadingBanks = true;
            axios.get(`/client/${user_id}/banks`).then(res => {
                this.hasSearched = false;
                this.banks = res.data;
                this.payingBanks = [...this.banks];
                this.receivingBanks = [...this.banks];
                this.loadingBanks = false;
            });
        },
        filter () {},
        makeTransfer (evt) {
            evt.preventDefault();
            formData = new FormData();
            formData.append('payer', this.selectedPayingBank.id);
            formData.append('receiver', this.selectedReceivingBank.id);
            formData.append('amount', this.transferAmount);
            formData.append('comment', this.comment);
            formData.append('_token', token);
            axios.post('/banking/transfer', formData).then(res => {
                swal("Success", res.data[0], "success");
                this.showAll();
                $('#makeTransferModal').modal('hide');
            }).catch(err => {
                swal('Error', err.response.data, 'error');
            })
        }
    }

});