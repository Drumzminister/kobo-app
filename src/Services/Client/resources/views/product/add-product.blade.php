@extends('client::layouts.app')

@section('content')

    {{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/client/product" class="text-dark">Product</a></h2>
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
                                <div class="upload">
                                    <!-- Drop Zone -->
                                    <div class="upload-drop-zone" >
                                        <div class="content pt-5">
                                            <i class="fa fa-cloud-upload" style="font-size:36px;color:#00C259"></i>
                                            <br>
                                            <span> drag to upload</span>
                                        </div>
                                    </div>
                                    <input @change="productImageUpload($event)" width="30px" name="attachment" type="file" class="btn"/>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-8 px-2">
                        <div class="form-group">
                            <label for="name">Name </label>
                            <input type="name" v-model="productForm.name" name="name" v-validate="'required'" class="form-control bg-grey" id="" placeholder="Enter Name of product">
                            <span class="text-danger">@{{ errors.first('name') }}</span>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea v-model="productForm.description" class="form-control bg-grey" name="description" id="" rows="5" placeholder="Brief Placeholder"></textarea>
                        </div>
                        <div class="form-row py-3">
                            <div class="col">
                                <label for="name">Tag</label>
                                {{--<input v-model="productForm.tag" type="text" class="form-control bg-grey" placeholder="Use comma to seperate tags">--}}
                                {{--<td><Select2 v-model="content.name" :settings="Object.assign(InventorySelectSettings, {placeholder: 'Select Product' })" :options="formattedProduct()" :value="1" ></Select2></td>--}}
                                <Select2 v-model="productForm.tag" :settings="Object.assign(ProductSelectSettings)" :options="['people','time', 'business', 'cloud']" multiple="multiple"></Select2>
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="col">
                                <label for="name">Notify on low quantity</label>
                                <input type="number" v-model="productForm.low_quantity" class="form-control bg-grey">
                            </div>
                        </div>
                        <div class="form-row mt-5">
                            <div class="col-md-2"></div>
                            <div class="col">
                                <button class="btn btn-secondary form-control"> Cancel</button>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col">
                                <button type="submit" @click="createProduct" class="btn btn-addsale form-control"> Add Product</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

