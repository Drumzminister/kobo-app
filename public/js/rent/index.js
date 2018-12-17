let app = new Vue({
    el: "#rentApp",
    data: {
        startDate: "",
        endDate: "",
        amount:"",
        banks: [],
        showPaymentSettings: false
    },
    mounted () {
        axios.get('/getClientId').then (res => {
            user_id = res.data.id;
        }).catch ()
    },
    methods: {
        beforeSubmit () {
            this.showPaymentSettings = false;
            document.querySelector('#submitBtn').click();
        },

        createRent () {
            // evt.preventDefault();
            // console.log(evt.target);
            let paymentModes = document.querySelectorAll('.payment_mode');
            let formData = new FormData(evt.target);
            axios.post('/rent', formData).then(res => {
                paymentModes.forEach(mode => {
                    let parent = mode.parentElement.parentElement;
                    let amount = parent.querySelector('.payment_amount');
                    let formData = new FormData();
                    formData.append('mode', mode.value);
                    formData.append('amount', amount.value);
                    axios.post(`/rent/${res.data.rent.id}/add-payment-method`, formData);
                });

            });
        },

        setRentParams () {
            axios.get(`/client/${user_id}/banks`).then(res => {
                this.banks = res.data;
            })
        }
    }
});