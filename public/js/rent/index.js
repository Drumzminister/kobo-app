export const rent = {
    data: {
        rents: [],
        amount:"",
        endDate: "",
        startDate: "",
        paymentMethods: [],
        other_rental_cost: "",
        showPaymentSettings: false
    },
    filters: {
        numberFormat (value) {
            value = Number(value);
            if (isNaN(value)) {return value;}
            const formatter = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            return formatter.format(value);
        }
    },
    mounted () {
        axios.get('/banking/payment_modes').then (res => {
            this.paymentMethods = res.data;
        });
        axios.get('/rent/user').then (res => {
            this.rents = res.data.rents;
        });
    },
    methods: {
        dater (value) {
            let date = new Date(value);
            let options = { month: 'long'};
            let month = new Intl.DateTimeFormat('en-US', options).format(date);
            let year = date.getFullYear();
            return `${date.getDate()} ${month} ${year}`;
        },
        beforeSubmit () {
            // this.showPaymentSettings = false;
            document.querySelector('#submitBtn').click();
        },

        createRent (evt) {
            evt.preventDefault();
            let formData = new FormData(evt.target);
            axios.post('/rent', formData).then(res => {
                this.rents.unshift(res.data.rent);
                swal("Success", "Rent added successfully", "success");
                $('#addRentModal').modal('toggle');
            });
        },
        rentUsed (rent) {
            let start = new Date(rent.start);
            let end = new Date(rent.end);
            let today = new Date();
            let diff;
            if (end.getFullYear() - start.getFullYear() === 0) {
                diff = (end.getMonth()) - start.getMonth();
                if ( diff === 0 ) {
                    if (today.getDate() < end.getDate()) {
                        return 0;
                    } else {
                        return rent.amount;
                    }
                }
            } else if (end.getFullYear() - start.getFullYear() === 1) {
                diff = (end.getMonth() + 12) -  start.getMonth();
                // return diff;
                if (diff === 1) {
                    if ((today.getMonth() === end.getMonth() && today.getDate() - end.getDate() > 0) || (today.getMonth() !== end.getMonth() && today.getDate() - end.getDate() > 0 ) ) {
                        return rent.amount;
                    } else if ((today.getMonth() === end.getMonth() && today.getDate() - end.getDate() <= 0) || (today.getMonth() !== end.getMonth() && today.getDate() - end.getDate() <= 0 )) {
                        return 0
                    }
                }
            }
            if (typeof diff === "number") {

                let amortized = rent.amount / diff;
                // return diff;
                if (today.getFullYear() - start.getFullYear() === 0) {
                    return amortized * (today.getMonth() - start.getMonth() + 1 );
                } else if (today.getFullYear() - start.getFullYear() === 1) {
                    return amortized  * (10 + start.getMonth() - today.getMonth() );
                }
            }
        },

        addPaymentMode () {
            let parent = document.createElement('div');
            parent.classList = "d-flex col-12 mt-3";
            let select = document.createElement('select');
            select.classList = "payment_mode custom-select col-md-5";
            this.paymentMethods.forEach(mode  => {
                let option = document.createElement('option');
                option.value = mode.mode;
                option.innerText = mode.mode;
                select.appendChild(option);
            });
            let inputParent = document.createElement('div');
            inputParent.classList = "show input-group col-md-5";
            let input = document.createElement('input');
            input.classList = "form-control payment_amount";
            input.type = "number";
            input.step = "0.01";
            inputParent.appendChild(input);

            parent.appendChild(select);
            parent.appendChild(inputParent);

            document.querySelector('#paymentParent').appendChild(parent);
        },
        balance (rent) {
            return rent.amount - this.rentUsed(rent);
        },
        payRent () {
            let amounts = document.querySelectorAll('.payment_amount');
            let paymentModes = document.querySelectorAll('.payment_mode');
            let total = 0;
            amounts.forEach(amount => {
                total += Number(amount.value);
            });
            if (total !== this.amount+this.other_rental_cost) {
                swal("Oops", "The amount entered must be equal to the amount paid for rent plus extra costs", "warning");
                return;
            }
            for (let i = 0; i < paymentModes.length; i++) {
                this.paymentMethods.forEach(method => {
                    if (method.mode === paymentModes[i].value && Number(amounts[i].value > method.balance )) {
                        swal("Oops", `The amount entered for ${method.mode} should be lower than  available balance`, "warning");
                        return;
                    }
                });
            }
        },

        setRentParams () {

        }
    }
};
