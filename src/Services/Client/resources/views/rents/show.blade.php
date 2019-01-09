@extends("client::layouts.app")

@section("content")

    <div id="rentApp">
        <section id="top">
            <div class="container py-3">
                <div class="row">
                    <h2><a href="/rent" class="text-dark"> Rent</a></h2>
                    <span class="accountant ml-auto btn btn-accountant">
                    <a href="" class="btn-accountant">
                        <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                    </a>
                </span>
                </div>
            </div>
        </section>

        <section>
            <div class="container mt-3">
                <div class="bg-white p-4">
                    <div class="form row py-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-white text-muted" id="topp">
                                <h5 class="h5">Total Rental Properties</h5>
                                <h2 class="">&#8358;{{ number_format($total, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-grey text-dark" id="topp">
                                <h5 class="h5">Total Used Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-green text-white" id="topp">
                                <h5 class="h5 ">Total Unused Rent</h5>
                                <h2 class="">&#8358;{{ number_format($total - $total_used_rent, 2) }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-md-3">
                            <button class="btn btn-addsale px-3" @click="setRentParams" data-toggle="modal" data-target="#addRentModal">Add Rent</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sale-table">
            <div class="container">

                <div class="bg-white px-4">

                    <div class="table-responsive table-responsive-sm">
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
                                <tr v-for="rent in rents">
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
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </td>
                                    <td><i class="fa fa-edit pr-2" style="font-size:24px"></i><i class="fa fa-money" style="font-size:24px"></i></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="text-center pb-3">
                        <a href="{{ route('client.rent.show-all') }}" class="view-more">View More</a>
                    </div>
                </div>

            </div>
        </section>



        <!-- Modal -->
        <div class="modal fade" id="addRentModal" tabindex="-1" role="dialog" aria-labelledby="addRentModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="container p-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="h5 uppercase" id="">Add Rent</h5>
                        <div class="modal-body">
                            <form id="rentForm" method="post" @submit="createRent($event)">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="" class="d-block"><h5>Rental Period</h5></label>
                                        <label for="" class="d-block"><small>Add the period the rent will last</small></label>

                                        <div class="form-row">
                                            <div class="col">
                                                <input type="date" class="form-control" name="start" v-model="startDate" :max="endDate" placeholder="Start Date" required>
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control" name="end" v-model="endDate" placeholder="End Date" :min="startDate" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount" class="d-block"><h5>Rental Fee</h5></label>
                                    <label  class="d-block"><small>Add the amount of the rent</small></label>
                                    <input type="number" step="0.01" class="form-control" v-model="amount" name="amount" min="0.00" id="amount" placeholder="NGN 5,0000,000" required>
                                </div>
                                <div class="form-group shadow-textarea">
                                    <label for=""><h5>Rental Properties</h5></label>
                                    <label for="" class="d-block"><small>Add details of rental property</small></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="property_details" rows="3" placeholder="Compose Message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for=""><h5>Other Rental Cost</h5></label>
                                    <label for="" class="d-block"><small>Add other rental cost </small></label>
                                    <input type="number" v-model="other_rental_cost" name="other_costs" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for=""><h5>Comments</h5></label>
                                    <label for="" class="d-block"><small>Any other comment on renting this property</small></label>
                                    <textarea name="comment" style="resize: none" id="" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div class="justify-content-around text-center pt-2">
                                <span style="cursor: pointer" class="submit" @click="beforeSubmit">
                                    <i class="fa fa-telegram " style="font-size:48px; color:#00C259;"></i>
                                </span>
                                    <h5 class="h5 text-green">Add Rent</h5>
                                </div>
                                <div v-if="showPaymentSettings" class="col-12 mybox">
                                    <div class="bg-grey py-4 px-3">
                                        <div class="row" id="paymentParent">
                                            <div class="col-md-5">
                                                <label for="paymentMode" class="h5 uppercase">Payment Mode</label>
                                            </div>
                                            <div class="col-md-5">
                                                <h5 class="h5 uppercase">Amount</h5>
                                            </div>
                                            <div class="d-flex col-12">
                                                <select name="payment_mode" id="paymentMode" class="payment_mode custom-select col-md-5">
                                                    <option v-for="mode in paymentMethods" :value="mode.mode">@{{ mode.mode}}</option>
                                                    <option v-if="paymentMethods.length === 0" disabled title="Go to the banking page to add your bank details">No Payment mode available.</option>
                                                </select>
                                                <div class="show input-group col-md-5">
                                                    <input type="number" class="form-control payment_amount" step="0.01" :value="amount" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2" >
                                        <span class="" style="cursor: pointer;" @click="addPaymentMode" title="Add multiple payment modes">
                                            <i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i>
                                        </span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-started" @click="beforeSubmit">Pay</button>
                                        </div>
                                    </div>
                                </div>
                                <button style="display: none" type="submit" id="submitBtn"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
