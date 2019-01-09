export const salesListView = {
    data: {
        saleSearchQuery: "",
        salesList: window.salesList,
        saleInvoice: {}
    },
    methods: {
        searchSale: function () {
            if (this.saleSearchQuery === "") return;
            this.showAppLoading();
        },

        showSaleInvoice: function (saleId) {
            this.saleInvoice = this.salesList[saleId];
            this.openModal("#exampleModalCenter");
        }
    }
};