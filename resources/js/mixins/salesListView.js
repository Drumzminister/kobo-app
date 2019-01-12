export const salesListView = {
    data: {
        saleSearchQuery: "",
        salesList: window.salesList,
        saleInvoice: {},
        columns: [
            'invoice_number',
            'created_at',
            'quantity',
            'total_amount',
            'customer_name',
            'channel_name',
        ],
        options: {
            filterByColumn: true,
            // texts: {
            //     filterBy: 'Filter by {column}',
            //     count:''
            // },
            dateColumns: ['created_at'],
            datepickerOptions: {
                showDropdowns: true,
                autoUpdateInput: true,
            },
            headings: {
                created_at: 'Date',
                invoice_number: 'Invoice',
                quantity: 'QTY Sold',
                customer_name: 'Customer',
                channel_name: 'Channel',
                total_amount: 'Sales Price (₦)'
            },
            templates: {
                //
            },
            // sortable: ['name', 'code'],
            filterable: ['created_at', 'customer_name', 'channel_name', 'total_amount', 'invoice_number', 'quantity']
        }
    },
    methods: {
        searchSale: function () {
            if (this.saleSearchQuery === "") return;
            this.showAppLoading();
        },

        showSaleInvoice: function (saleId) {
            this.saleInvoice = this.salesList[saleId];
            this.openModal("#exampleModalCenter");
        },
        resolveSaleDate: function (date) {
            return date = moment(date);
        }
    }
};