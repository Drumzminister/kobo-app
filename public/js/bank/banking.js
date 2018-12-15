let banking = new Vue({
    el: "#banking",
    data: {
        banks: [],
        accNum: "",
        balance: "",
        searchString: "",
        hasSearched: false,
        loadingBanks: true,
        showBalError: false,
        showAccNumError: false,
    },
    mounted () {
        axios.get('/getClientId').then(res => {
            user_id = res.data.id;
            axios.get(`/client/${user_id}/banks`).then(res => {
               this.banks = res.data;
               this.loadingBanks = false;
            });
        });
    },
    watch: {
        accNum () {
            this.showAccNumError = this.accNum.length !== 10;
        },
        balance () {
            this.showBalError = this.balance < 0.01;
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
                this.loadingBanks = false;
            });
        }
    }

});