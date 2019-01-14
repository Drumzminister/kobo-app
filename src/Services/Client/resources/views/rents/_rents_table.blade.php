<div class="table-responsive table-responsive-sm" v-if="!rentLoading">
    <table class="table table-striped table-hover" id="dataTable">
        <thead class="p-3">
        <tr class="tab">
            <th scope="col">Rental period</th>
            <th scope="col">Rental Properties</th>
            <th scope="col">Amount (&#8358;)</th>
            <th scope="col">Rent Used (&#8358;)</th>
            <th scope="col">Balance(&#8358;)</th>
            <th scope="col">Status</th>
            <th scope="col">Edit/Pay</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="rent in rents"  >
                <td>
                    @{{ dater(rent.start) }} - @{{ dater(rent.end) }}
                </td>
                <td>
                    @{{ rent.property_details }}
                </td>
                <td> @{{ rent.amount | numberFormat }}</td>
                <td> @{{ rentUsed(rent) | numberFormat}}</td>
                <td> @{{ balance(rent) | numberFormat}}</td>
                <td>
                    <div class="progress">
                        <div v-if="getStatus(rent) < 31 " class="progress-bar bg-danger" role="progressbar" :style="`width: ${getStatus(rent)}%;`" :aria-valuenow=" `${getStatus(rent)}%` " aria-valuemin="0" aria-valuemax="100">@{{ `${getStatus(rent)}%` }}</div>
                        <div v-if="getStatus(rent) > 31 && getStatus(rent) < 51 " class="progress-bar" role="progressbar" :style="`width: ${getStatus(rent)}%;`" :aria-valuenow=" `${getStatus(rent)}%` " aria-valuemin="0" aria-valuemax="100">@{{ `${getStatus(rent)}%` }}</div>
                        <div v-if="getStatus(rent) > 51 && getStatus(rent) < 71 " class="progress-bar bg-info" role="progressbar" :style="`width: ${getStatus(rent)}%;`" :aria-valuenow=" `${getStatus(rent)}%` " aria-valuemin="0" aria-valuemax="100">@{{ `${getStatus(rent)}%` }}</div>
                        <div v-if="getStatus(rent) > 79 " class="progress-bar bg-success" role="progressbar" :style="`width: ${getStatus(rent)}%;`" :aria-valuenow=" `${getStatus(rent)}%` " aria-valuemin="0" aria-valuemax="100">@{{ `${getStatus(rent)}%` }}</div>
                    </div>
                </td>
                <td>
                    <i class="fa fa-edit pr-2" @click="editRent($event, rent)" style="font-size: 24px; cursor: pointer;"></i>
                    <i class="fa fa-money" @click="openPaymentModal(rent)" style="font-size:24px; cursor: pointer;"></i>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div v-if="rentLoading"  class="d-flex justify-content-center">
    <img  src="/img/loader.gif">
</div>
<!--Edit Rent Modal -->
@include('client::rents._update_rent_modal')
@include('client::rents._payment_modal')
