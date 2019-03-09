export const salesListView = {
    data: {
        saleSearchQuery: "",
        salesList: window.salesList,
        saleInvoice: {},
        columns: [
            'sale_date',
            'invoice_number',
            'quantity',
            'total_amount',
            'customer_name',
        ],
        options: {
            filterByColumn: true,
            // texts: {
            //     filterBy: 'Filter by {column}',
            //     count:''
            // },
            dateColumns: ['sale_date'],
            datepickerOptions: {
                showDropdowns: true,
                autoUpdateInput: true,
            },
            headings: {
                sale_date: 'Date',
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
            filterable: ['sale_date', 'customer_name', 'channel_name', 'total_amount', 'invoice_number', 'quantity']
        }
    },
    mounted () {

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
