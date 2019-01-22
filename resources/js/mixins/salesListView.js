import Chart from "chart.js";
export const salesListView = {
    data: {
        saleSearchQuery: "",
        salesList: window.salesList,
        saleInvoice: {},
        columns: [
            'created_at',
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
    mounted () {
        // this.processChart();
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
        },
        processChart () {
            let ctx = document.getElementById("myChart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    }
};