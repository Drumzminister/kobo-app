export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleTax: "",
            saleDate: "",
            salePaymentMethods: [],
            saleItems: [],
            availableBankList: []
        }
    },
    created: function() {
        this.addSaleItemForm();
        this.addSalePaymentMethod();
    },
    computed: {
        availableBankList: function () {
            // console.log("set Called");
            let that = this;
            return this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });

            // console.log(this.availableBankList);
        }
    },
    watch: {
        // availableBankList: function (val) {
        //     console.log("Changed");
        // }
    },
    methods: {
        setPaymentMode: function (paymentMode, selectedBank) {
            paymentMode.bank_id = selectedBank.id;
            paymentMode.name = selectedBank.account_name;
            // this.setAvailableBankList();
        },
        bankIsNotAvailable: function () {
            return this.salePaymentMethods.length === this.banks.length;
        },
        addSalePaymentMethod: function () {
            if (this.bankIsNotAvailable()) return;
            this.salePaymentMethods.push({
                bank_id: "",
                amount: null,
                name: null,
            });
            // this.setAvailableBankList();
        },
        setAvailableBankList: function () {
            // console.log("set Called");
            let that = this;
            this.availableBankList = this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });

            // console.log(this.availableBankList);
        },
        isBankSelected: function (bank) {
            console.log(bank);
            for (let key in this.salePaymentMethods) {
                return this.salePaymentMethods[key].bank_id !== bank.id;
            }
        },
        removeSalePaymentMethod: function (index) {
            this.salePaymentMethods.splice(index, 1);
        },
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        addSaleItemForm: function () {
            this.saleItems.push({
                inventory_id:       "",
                description:        "",
                quantity:           "",
                sales_price:        "",
                total_price:        "",
                sale_channel_id:    ""
            });
        }
    }
};