<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="container p-3">
                <button type="button" class="close" @click="closeCustomerModal('editCustomerModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="h5 uppercase" id="">Edit Customer - <em></em></h5>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="address" class="d-block"><h5>Name</h5></label>
                            <input type="text" step="0.01" class="form-control" v-model="editingCustomer.amount" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="d-block"><h5>Address</h5></label>
                            <input type="text" class="form-control" v-model="editingCustomer.address" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="d-block"><h5>Phone</h5></label>
                            <input type="text" class="form-control" v-model="editingCustomer.phone" required>
                        </div>
                        <div class="form-group">
                            <label for="amount" class="d-block"><h5>Email</h5></label>
                            <input type="text" class="form-control" v-model="editingCustomer.email" required>
                        </div>
                        <div class="form-group">
                            <label for="website" class="d-block"><h5>Website</h5></label>
                            <input type="text" class="form-control" v-model="editingCustomer.website">
                        </div>
                        <button type="submit" class="btn btn-primary submitBtn">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
