<template>
    <div>
        <div class="row">
            <div class="col-md-2">
                <h5 class="h5 text-capitalize">{{ period }} {{ page }}</h5>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <label><input type="radio" v-model="mode" value="day" name="mode"/><span>D</span></label>
                </div>
                <div class="form-check form-check-inline">
                    <label><input type="radio" v-model="mode" value="week" name="mode"/><span>W</span></label>
                </div>
                <div class="form-check form-check-inline">
                    <label><input type="radio" v-model="mode" value="month" name="mode"/><span>M</span></label>
                </div>
                <div class="form-check form-check-inline">
                    <label><input type="radio" v-model="mode" value="year" name="mode"/><span>Y</span></label>
                </div>

            </div>
            <div class="col-md-7 row">
                <div class="form-group col-12">
                    <date-range-picker
                            :opens="opens"
                            :startDate="startDate"
                            :endDate="endDate"
                            @update="updateValues"
                            :locale-data="{ firstDay: 1, format: 'DD-MM-YYYY' }"
                            :minDate="minDate" :maxDate="maxDate"
                    >
                        <div slot="input" slot-scope="picker">
                            {{ picker.startDate | date }} - {{ picker.endDate | date }}
                        </div>
                    </date-range-picker>
                </div>
            </div>
        </div>
        <div class="row">`
            <canvas id="myChart" width="400" height="150"></canvas>
        </div>
    </div>
</template>

<script>
    import DateRangePicker from 'vue2-daterange-picker'

    export default {
        components: { DateRangePicker },
        props: [
            'month', 'day', 'week', 'year', 'options', 'data'
        ],
        filters: {
            date (value) {
                let options = {year: 'numeric', month: 'long', day: 'numeric'};
                return Intl.DateTimeFormat('en-US', options).format(value)
            }
        },
        data() {
            return {
                mode: this.options.mode || 'month',
                page: this.options.page || '',
                opens: 'center',
                startDate: this.options.dateRangeStart || moment().format("YYYY-MM-DD"),
                endDate: moment().format("YYYY-MM-DD"),
                minDate: '2017-09-02',
                maxDate: moment().format("YYYY-MM-DD"),
            }
        },
        computed: {
            period() {
                switch (this.mode || 'month') {
                    case 'month':
                        return "Monthly";
                    case 'day':
                        return "Daily";
                    case 'week':
                        return "Weekly";
                    case 'year':
                        return "Yearly";
                }
            },
            dateRange: {
                get: function() {
                    return this.startDate + ' - ' + this.endDate;
                }
            },
            type () {
                return this.options.dateColumn ? 'line' : 'scatter';
            }
        },
        watch: {
            mode: function(newValue, oldValue) {
                this.processChart();
            },
            dateRange: function(newValue, oldValue) {
                this.processChart(this.getDataByDateRange());
            }
        },
        mounted() {
            this.processChart();
        },
        methods: {
            getDataByDateRange () {
                return this.data.filter((one) => moment(one[this.options.dateColumn]).isBetween(this.startDate, this.endDate, null, '[]') );
            },
            updateValues (values) {
                this.startDate = values.startDate.toISOString().slice(0, 10);
                this.endDate = values.endDate.toISOString().slice(0, 10);
            },
            getData (data) {
                let result = Object.values(data);
                let { xColumn, yColumn } = this.options;
                let graphData = result.map((plot) => {
                    return {
                            x:this.options.dateColumn ? new Date(plot[xColumn]) : plot[xColumn],
                            y:plot[yColumn]
                    }
                });
                let labels = result.map(({ delivered_date }) => {
                    return moment(delivered_date)[this.mode]();
                });
                return { graphData };
            },
            processChart (newData) {
                let mode = this.mode;
                let data = newData ? this.getData(newData) : this.getData(this[mode]);

                let ctx = document.getElementById("myChart");
                let myChart = new Chart(ctx, {
                    type: this.type,
                    data: {
                        datasets: [{
                            showLine: true,
                            label: this.options.label,
                            data: data.graphData,
                            backgroundColor: [

                            ],
                            borderColor: [

                            ],
                            borderWidth: 3
                        }]
                    },
                    options: this.getOptions()
                });
            },
            getOptions () {
                let options = {};
                let xAxes = [];

                if (this.options.dateColumn) {
                    xAxes.push({ type: 'time' });
                } else {
                    xAxes.push({
                        type: 'linear',
                        position: 'bottom'
                    });
                    options.responsive = true;
                }

                options.scales = { xAxes: xAxes };
                return options;
            },
        }
    }
</script>
