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
                                <span style="cursor: pointer" class="submit" @click="beforeSubmit('addRentModal')">
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
                                    <button class="btn btn-started" @click="beforeSubmit('addRentModal')">Pay</button>
                                </div>
                            </div>
                        </div>
                        <button style="display: none" type="submit" class="submitBtn"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
