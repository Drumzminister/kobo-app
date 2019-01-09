export const salesListView = {
    data: {
        saleSearchQuery: "",
        salesList: {}
    },
    created: function () {
        this.salesList = window.salesList;
    },
    methods: {
        searchSale: function () {
            if (this.saleSearchQuery === "") return;
            this.showAppLoading();
        }
    }
};