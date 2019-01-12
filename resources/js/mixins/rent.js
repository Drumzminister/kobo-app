export const rentApp = {
    data: {
        rents: [],
        rentAmount: "",
        rentEndDate: "",
        rentStartDate: "",
        editingRent: {},
        rentLoading: false,
        paymentMethods: [],
        rentSearchParam: "",
        other_rental_cost: "",
        rentShowPaymentSettings: false,
    },

    mounted () {
        /*axios.get('/banking/payment_modes').then (res => {
            this.paymentMethods = res.data;
        });*/
        this.rents = window.rents;
    },
    methods: {
        dater (value) {
            let date = new Date(value);
            let options = { month: 'long'};
            let month = new Intl.DateTimeFormat('en-US', options).format(date);
            let year = date.getFullYear();
            return `${date.getDate()} ${month} ${year}`;
        },
        beforeSubmit (form) {
            document.querySelector(`#${form}`).querySelector('.submitBtn').click();
        },

        createRent (evt) {
            evt.preventDefault();
            let formData = new FormData(evt.target);
            axios.post('/client/rent/add', formData).then(res => {
                this.rents.unshift(res.data.rent);
                swal("Success", "Rent added successfully", "success");
                location.reload();
                $('#addRentModal').modal('toggle');
            });
        },
        rentUsed (rent) {
            let start = moment(rent.start);
            let end = moment(rent.end);
            let today = moment();
            let amortized = 0;
            let diff = start.diff(end, 'months');

            if (diff === 0) {
                amortized = rent.amount;
            } else {
                amortized = rent.amount / diff;
            }

            if (today.isAfter(end)) {
                return rent.amount;
            }
            // debugger;
            return amortized * (diff - today.diff(end, 'months') );

        },

        getStatus (rent) {
            let amount = rent.amount;
            let rentUsed = this.rentUsed(rent);
            let status = rentUsed * 100 / amount
            return `${100 - status.toFixed(0)}`;
        },

        searchRent () {
            if (this.rentSearchParam.trim()) {
                this.rentLoading = true;
                axios.get (`/client/rent/search/${this.rentSearchParam.trim()}`)
                    .then ( (res) => {
                        this.rents = res.data.rents;
                        this.rentLoading = false;
                    } )
                    .catch ((err) => {
                        this.rentLoading = false;
                        swal("Oops", "An error occurred while processing your request", "error");
                    })
                ;
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
            if (total !== this.rentAmount+this.other_rental_cost) {
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

        editRent (evt, rent) {
            this.editingRent = {...rent};
            $('#editRentModal').modal('show');
        },

        updateRent(evt) {
            evt.preventDefault();

            let formData = this.editingRent;
            axios.post(`/client/rent/update/${formData.id}`, formData).then((response) => {
                swal("Success", "Rent updated successfully", "success");
                this.rents.splice(this.rents.findIndex((rent) => {
                    return rent.id === this.editingRent.id;
                }), 1, response.data.rent);
                // location.reload();
                $('#editRentModal').modal('toggle');
            });
        },

        setRentParams () {

        }
    }
};