export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleTax: "",
            saleDate: "",
            salePaymentMethods: [],
            saleItems: []
        }
    },
    created: function() {
        this.addSaleItemForm();
        this.addSalePaymentMethod();
    },
    computed: {
        availableBankList: function () {
            let that = this;
            return this.banks.filter(function (bank) {
                return that.isBankSelected(bank);
            });
        }
    },
    watch: {
        availableBankList: function (val) {
            console.log("Changed");
        }
    },
    methods: {
        setPaymentMode: function (paymentMode, selectedBank) {
            paymentMode.bank_id = selectedBank.id;
            paymentMode.name = selectedBank.account_name;
        },
        isBankSelected: function (bank) {
            console.log("Called");
            for (let key in this.salePaymentMethods) {
                return this.salePaymentMethods[key].bank_id !== bank.id;
            }
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
        },
        removeSalePaymentMethod: function (index) {
            this.salePaymentMethods.splice(index, 1);
        },
        addNewSaleItemRow: function () {
            this.addSaleItemForm();
        },
        addSaleItemForm: function () {
            this.saleItems.push({
                inventory_id: "",
                description: "",
                quantity: "",
                sales_price: "",
                total_price: "",
                sale_channel_id: ""
            });
        }
    }
};