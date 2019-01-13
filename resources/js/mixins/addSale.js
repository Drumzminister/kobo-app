export const addSale = {
    data() {
        return {
            sale_customer_id: "",
            saleTax: "",
            saleDate: "",
            saleItems: [],
        }
    },
    created: function() {
        this.addSaleItemForm();
    },
    methods: {
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