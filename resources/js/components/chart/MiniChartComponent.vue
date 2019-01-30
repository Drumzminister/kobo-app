<template>
    <div>
        <div class="row">
            <div class="col-md-2">
                <h5 class="h5">{{ period }} Sales</h5>
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
                    <!--<input type="date" v-model="dateRange" id="graphDateRange" class="form-control" placeholder="Start Date">-->
                    <!--<select id="inputState" class="form-control btn-loginn">-->
                        <!--<option selected>Start Date</option>-->
                        <!--<option>January</option>-->
                        <!--<option>Feburary</option>-->
                        <!--<option>March</option>-->
                        <!--<option>April</option>-->
                        <!--<option>May</option>-->
                        <!--<option>June</option>-->
                    <!--</select>-->
                </div>
                <!--<div class="form-group col-6">-->
                    <!--<input type="date" v-model="endDate" class="form-control" placeholder="End Date">-->
                    <!--&lt;!&ndash;<select id="inputState" class="form-control btn-loginn">&ndash;&gt;-->
                        <!--&lt;!&ndash;<option selected class>End Date</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>January</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>Feburary</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>March</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>April</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>May</option>&ndash;&gt;-->
                        <!--&lt;!&ndash;<option>June</option>&ndash;&gt;-->
                    <!--&lt;!&ndash;</select>&ndash;&gt;-->
                <!--</div>-->
            </div>
        </div>
        <div class="row">
            <canvas id="myChart" width="400" height="150"></canvas>
        </div>
    </div>
</template>

<script>
    import DateRangePicker from 'vue2-daterange-picker'

    export default {
        components: { DateRangePicker },
        props: [
            'month', 'day', 'week', 'year', 'options'
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
                opens: 'center',
                startDate: '2017-09-19',
                endDate: '2017-10-09',
                minDate: '2017-09-02',
                maxDate: '2017-10-02',
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
            }
        },
        watch: {
            mode: function(newValue, oldValue) {
                this.processChart();
            }
        },
        mounted() {
            this.processChart();
        },
        methods: {
            updateValues (values) {
                this.startDate = values.startDate.toISOString().slice(0, 10);
                this.endDate = values.endDate.toISOString().slice(0, 10);
            },
            getSalesQuantityData (data) {
                let graphData = data.map(({ quantity, created_at }) => { return { t:new Date(created_at), y:quantity } });
                let labels = data.map(({ created_at }) => {
                    return moment(created_at)[this.mode]();
                });
                return { graphData, labels };
            },
            processChart () {
                let mode = this.mode;
                let data = this.getSalesQuantityData(this[mode]);

                let ctx = document.getElementById("myChart").getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        // labels: data.labels,
                        // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange", "Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                        datasets: [{
                            label: '# of Quantity Sold',
                            data: data.graphData,
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
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                type: 'time',
                                // time: {
                                //     unit: 'week'
                                // }
                            }]
                        }
                    }
                });
            }
        }
    }
</script>
