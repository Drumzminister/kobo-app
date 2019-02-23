<div class="modal fade" id="editRentModal" tabindex="-1" role="dialog" aria-labelledby="editRentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="container p-3">
                <button type="button" class="close" @click="closeRentModal('editRentModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="h5 uppercase" id="">Edit Rent - <em>@{{ editingRent.property_details }}</em></h5>
                <div class="modal-body">
                    <form id="rentForm" method="post" @submit="updateRent($event)">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="" class="d-block"><h5>Rental Period</h5></label>
                                <label for="" class="d-block"><small>Add the period the rent will last</small></label>

                                <div class="form-row">
                                    <div class="col">
                                        <input type="date" class="form-control" name="edit_start" v-model="editingRent.start" :max="editingRent.end" placeholder="Start Date" required>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="edit_end"  v-model="editingRent.end" placeholder="End Date" :min="editingRent.start" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="d-block"><h5>Rental Fee</h5></label>
                            <label  class="d-block"><small>Add the amount of the rent</small></label>
                            <money-input :model="'editingRent.amount'"  :initial= "editingRent.amount" :classes="'form-control'" :options="{placeholder: '5,000, 000'}"></money-input>
                            {{-- <input type="number" step="0.01" class="form-control" v-model="editingRent.amount" name="amount" min="0.00" id="amount" placeholder="NGN 5,0000,000" required> --}}
                        </div>
                        <div class="form-group shadow-textarea">
                            <label for=""><h5>Rental Properties</h5></label>
                            <label for="" class="d-block"><small>Add details of rental property</small></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" v-model="editingRent.property_details" name="property_details" rows="3" placeholder="Compose Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""><h5>Other Rental Cost</h5></label>
                            <label for="" class="d-block"><small>Add other rental cost </small></label>
                            <div class="d-flex mt-2" v-for="(cost, index) in other_costs">
                                <input type="text" class="form-control mr-4" v-model="cost.description" placeholder="Description" >
                                {{-- <input type="number" placeholder="amount" v-model="cost.amount" class="form-control" id="" placeholder=""> --}}
                                <money-input :model="'other_costs['+ index +'].amount'" :initial="cost.amount" :classes="'form-control'" :options="{placeholder: '5,000, 000'}"></money-input>
                                <span v-if="other_costs.length > 1" @click="removeOtherCost(cost.key)"><i class="fa fa-times ml-2" style="font-size:32px;color:#c22c29; cursor:pointer"></i></span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <i class="fa fa-plus-square" @click="addOtherCosts" style="font-size:32px; color:#00C259; cursor:pointer;"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""><h5>Comments</h5></label>
                            <label for="" class="d-block"><small>Any other comment on renting this property</small></label>
                            <textarea name="comment" v-model="editingRent.comment" style="resize: none" id="" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <div class="justify-content-around text-center pt-2" v-if="isRequesting">
                                <span style="cursor: pointer" class="submit">
                                    <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px; color:#00C259;"></i>
                                </span>
                            <h5 class="h5 text-green">Updating Rent...</h5>
                        </div>
                        <div class="justify-content-around text-center pt-2" v-else>
                                <span style="cursor: pointer" class="submit" @click="beforeSubmit('editRentModal')">
                                    <i class="fa fa-telegram " style="font-size:48px; color:#00C259;"></i>
                                </span>
                            <h5 class="h5 text-green">Update Rent</h5>
                        </div>
                        <button style="display: none" type="submit" class="submitBtn"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
