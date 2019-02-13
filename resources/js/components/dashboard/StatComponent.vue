<template>
    <div class="bg-white p-3">
        <h5 class="h5 pt-2 text-green">STAT (<span>&#8358;</span>)</h5>
        <p>Lorem, ipsum dolor sit amet consectet</p>

        <form action="" method="post">
            <div class="form-row pt-2">
                <div class="dates form-group col-md-6 col-6">
                    <label for="date" class="date">Start Date</label>
                    <input type="text" class="form-control" id="startDate" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                </div>
                <div class="dates form-group col-md-6 col-6">
                    <label for="date" class="date">End Date</label>
                    <input type="text" class="form-control" id="endDate" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                </div>
            </div>

            <div class="row pt-2 px-2">
                <div class="col-md-4 col-4">
                    <h5 class="h6 col-net">Total Sales</h5>
                    <span class="col-net">NGN</span>
                    <h5 class="text-muted">{{ $currency.format(3000) }}</h5>
                </div>
                <div class="col-md-4 col-4">
                    <h5 class="h6 col-net">Total Expenses</h5>
                    <span class="text-warning">NGN</span>
                    <h5 class="text-muted">{{ $currency.format(3000) }}</h5>
                </div>
                <div class="col-md-4  col-4">
                    <h5 class="h6 col-net"> Total Profit</h5>
                    <span class="text-green">NGN</span>
                    <h5 class="text-muted">{{ $currency.format(3000) }}</h5>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props: ['sales', 'expenses'],
        computed: {
            totalSales () {

            },
            totalExpense () {

            }
        },
        mounted() {
        }
    }
</script>