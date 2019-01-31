@extends('client::layouts.app')

@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/client/inventory" class="text-dark">Purchase</a></h2>
                @include('client::accountant-button')
            </div>
        </div>
    </section>
{{-- end of heading section --}}

<section>
    <div class="container my-4">
        <div class="bg-white p-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="container">
                        <form action="client/inventory/add" method="post">
                        <div class="upload">
                            <!-- Drop Zone -->
                            <div class="upload-drop-zone" >
                                <div class="content pt-5">
                                    <i class="fa fa-cloud-upload" style="font-size:36px;color:#00C259"></i>
                                    <br>
                                    <span> drag to upload</span>
                                </div>
                            </div>
                                <input onchange="inventoryForm.attachment" name="attachment"type="file" class="btn btn-success"/>
                          </div>
                    </div>
                </div>
                <div class="col-md-8 px-2">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="name" v-model="inventoryForm.name" name="name" class="form-control bg-grey" id="" placeholder="Enter Name of product">
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="inventoryForm.description" class="form-control bg-grey" name="description" id="" rows="5" placeholder="Brief Placeholder"></textarea>
                            </div>
                            <div class="form-row py-3">
                                <div class="col">
                                        <label for="name">Cost Price</label>
                                        <input v-model="inventoryForm.costPrice" type="text" name="cost_price" class="form-control bg-grey" placeholder="NGN 10,000">
                                </div>
                                <div class="col">
                                        <label for="name">Sales Price</label>
                                        <input v-model="inventoryForm.salePrice" type="text" name="sales_price" nam class="form-control bg-grey" placeholder="NGN 20,000">
                                </div>
                            </div>
                            <div class="form-row py-3">
                                    <div class="col">
                                        <label for="name">Quantity</label>
                                        <input type="number" v-model="inventoryForm.quantity" name="quantity" id="quantity" class="form-control bg-grey">
                                    </div>
                                    <div class="col" >
                                        <label for="name">Vendor</label>
                                        <select  v-model="inventoryForm.vendor_id" class="form-control bg-grey" >
                                            <option v-for="vendor in vendors" :value="vendor.id">
                                                @{{ vendor.name }}
                                            </option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="col">
                                        <label for="name">Category</label>
                                        <select v-model="inventoryForm.category" name="category" id="quantity" class="form-control bg-grey">
                                                <option selected>Choose...</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>5</option>
                                            </select>
                                                                            </div>
                                    <div class="col">
                                        <label for="name">Payment Mode</label>
                                        <select v-model="inventoryForm.paymentMode" name="payment_mode" id="quantity" class="form-control bg-grey">
                                                <option selected>Select Payment</option>
                                                <option>Cash</option>
                                                <option>GTB </option>
                                                <option>Access Bank</option>
                                                <option>Zenith Bank</option>
                                            </select>
                                        </div>
                            </div>
                            <div class="form-row mt-5">
                                <div class="col-md-2"></div>
                                <div class="col">
                                    <button class="btn btn-secondary form-control"> Cancel</button>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col">
                                    <button type="submit" @click="createInventory" class="btn btn-addsale form-control"> Add Product</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('other_js')
<script>
window.vendors = @json($vendors)
</script>
@endsection
