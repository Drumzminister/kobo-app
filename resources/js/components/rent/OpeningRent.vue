<template>
    <div class="card border-0 mb-5">
        <div class="card-header bg-white border-0" id="headingFive">
            <h5 class="mb-0">
            <button class="btn bg-transparent w-100 collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <div class="title-div d-flex">
                <div class="mr-auto text-left">
                    <p class="title">Rent</p>
                    <p class="subtitle">Already existing Rents</p>
                </div>
                <div class="pt-3 pr-3">
                    <i class="fas fa-chevron-up fa-2x"></i>
                </div>
                </div>
            </button>
            </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control " placeholder="Search Assets" aria-label="Search Assets" aria-describedby="button-addon2">
                <div class="input-group-append">
                <button class="btn btn-orange" type="button" id="button-addon2">Filter</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-striped balance-table-1">
                    <thead>
                        <tr>
                            <th scope="col">Rental Period</th>
                            <th scope="col">Rental Properties</th>
                            <th scope="col">Rental Fees</th>
                            <th scope="col">Other Rental Cost</th>
                            <th scope="col">Total Amount ( &#8358;)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="rent in localRents" :key="rent.id">
                            <th scope="row">
                                {{ dater(rent.start) }} - {{ dater(rent.end) }}
                            </th>
                            <td>
                                {{ rent.property_details }}
                            </td>
                            <td>
                                {{(rent.amount - rent.total_other_costs) | numberFormat}}
                            </td>
                            <td>
                                {{ rent.total_other_costs | numberFormat }}
                            </td>
                            <td>
                                {{ rent.amount | numberFormat}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-green" @click="openAddRentModal">
                    <i class="fas fa-plus text-white fa-2x"></i>
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OpeningRent",
    props: ['rents'],
    data() {
        return {
            localRents: [],
        }
    },
    mounted() {
        this.$parent.rentType = "opening";
        
        this.localRents = JSON.parse(this.rents).map(this.getTotalOtherCost);
        this.$eventHub.$on('newOpeningRent', this.addToRent);
    },
    methods: {
        openAddRentModal () {
            this.$parent.setRentParams();
        },
        
        dater (date) {
            return this.$parent.dater(date);
        },

        getTotalOtherCost (rent) {
            rent.total_other_costs = 0;
            rent.other_costs = JSON.parse(rent.other_costs);
            rent.other_costs.forEach(cost => {
                rent.total_other_costs += Number(cost.amount);
            });
            return rent;
        },

        addToRent (rent) {
            this.localRents.unshift(this.getTotalOtherCost(rent));
        }
    },
}
</script>

<style>

</style>
