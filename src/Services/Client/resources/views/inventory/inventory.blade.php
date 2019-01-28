
@extends('client::layouts.app')
<style>
label {display: block; padding: 5px; position: relative; padding-left: 10px;}
label input {display: none;}
label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
input:checked + span {background: #ccf; border-color: #ccf;}

input {
    border: none;
    background: transparent;
}
.fa fa-trash {
    cursor: pointer;
}
</style>
@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/client/inventory" class="text-dark">Purchase</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
    </section>
{{-- end of heading section --}}

{{-- sales chart --}}
    <section id ="">
        <div class = "container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white px-3 py-4 introduction" id="topp"> 
                            <a href='http://example.com/' data-intro='Hello step one! View your History'></a>
                        <div class="row">
                            <div class="col-md-3">
                                    <h5 class="h5">Monthly Purchases</h5>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" /><span>D</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" /><span>W</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio"  /><span>M</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" /><span>Y</span></label>
                                    </div>
                                            
                            </div>
                            <div class="col-md-6 row">
                                <div class="form-group col">
                                    <select id="inputState" class="form-control btn-loginn">
                                        <option selected>Start Date</option>
                                        <option>January</option>
                                        <option>Feburary</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <select id="inputState" class="form-control btn-loginn">
                                        <option selected class>End Date</option>
                                        <option>January</option>
                                        <option>Feburary</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>  
                                    </select>
                                </div>
                            </div>
                        </div>
                        <canvas id="canvasSale"  height="100"></canvas>
                    </div>
                </div>

                {{-- top sales --}}
                <div class="col-md-4">
                    <div class="bg-white p-2 " id="topp">
                        <div class="row my-1">
                            <div class="col mt-1">
                                <h5 class="h5">Top 10 Purchases</h5>
                            </div>
                            <div class="col">
                                <select id="" @change="highestPurchase" class="form-control btn-filter pull-right">
                                        <option selected>Quantity <i class="fa fa-filter"></i></option>
                                        <option  class="text-small">By Amount</option>
                                </select>           
                            </div>
                        </div>
                        <div class="all-scroll">
                        <table class="table table-striped table-hover" id="table">
                            <thead class="sale-head">
                              <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Amount</th>
                              </tr>
                            </thead>
                            <tbody class="tbody">
                              <tr v-for="purchase in top_purchase">
                                <td>@{{  purchase.name }}</td>
                                <td>@{{ purchase.quantity }}</td>
                                <td>@{{ purchase.purchase_price }}</td>
                              </tr>
                            </tbody>

                        </table>
                        </div>
                            <h3 v-if="top_purchase.length === 0"class="text-center">
                                Top purchases will appear here
                            </h3>
                        {{--<div class="text-center p-1">--}}
                            {{--<a href="" class="view-more">View More Analytics</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
{{-- end of sales chart --}}
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">
        <div class="container my-4">
                    <div class="bg-white p-4">
                            <div class="row pb-3">
                                    <div class="col-md-3">
                                        <div class="dropdown show">
                                            <a class="btn btn-addSale" href="/client/inventory/single-inventory" role="button">
                                                    Add Purchase                                    
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="/client/inventory/single-inventory" class="text-green">Single Product</a>
                                                <a class="dropdown-item" href="/client/inventory/multiple-inventory" class="text-green">Multi Products</a>
                                            </div>
                                        </div>                                              
                                    </div>
                
                                    {{-- <div class="col-md-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Search</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 float-right">
                                        <div class="dropdown show float-right">
                                                <a class="btn btn-filter" href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Filter <i class="fa fa-filter"></i>                                    
                                                </a>                                   
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#" class="text-green">By Quantity</a>
                                                    <a class="dropdown-item" href="#" class="text-green">By Amount</a>
                                                </div>
                                        </div>
                                    </div> --}}
                            </div>    
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                              <th>ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">SKU</th>
                            <th scope="col">QTY Bought</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col">Vendors</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(purchase, index) in all_purchases" :key="index">
                              <td>@{{ index + 1 }}</td>
                              <td>
                                  @{{purchase.delivered_date | dateTime  }}
                              </td>
                            <td>
                                <a href="" @click.prevent="getInventoryItem(purchase.id)" data-toggle="modal" data-target="#exampleModalCenter">
                                   INV-@{{ purchase.invoice_number }}
                                </a>
                            </td>
                            <td>
                                @{{ getPurchaseQuantityInventoryItem(purchase) }}
                            </td>
                            <td>
                                @{{ getPurchaseSalesPriceInventoryItem(purchase) | numberFormat }}
                            </td>
                            <td>
                                @{{ purchase.vendor.name }}
                            </td>
                              <td><i @click.prevent="deleteInventory(purchase.id)" class="fa fa-trash" style="font-size:24px; cursor: pointer"></i></td>
                        </tr>
                        <tr v-if="purchase.length === 0">
                            <td colspan="7" class="text-center"><h3>All purchases will appear here</h3></td>
                        </tr>
                            
                        </tbody>

                    </table>
                </div>
                    <hr class="mt-0">
                    <div class="text-center mt-3" v-if="purchase.length > 0">
                        <a href="/client/inventory/list" class="view-more">View More</a>
                    </div>
                   
            </div> 
           
        </div>
    </section>



    {{-- invoice modal --}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                        <div class="container p-3">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="row px-5 pt-3">
                                <div class="col-md-2">
                                    <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                </div>
                                <div class="col-md-10">
                                    <h5 class="text-green h5">Mercy Ikpa</h5>
                                    <h6 class="text-primary h6">Invoice NO:KB &#x2d; 1234</h6>

                                        <div class="form row pt-3 px-3">
                                            <div class="col-md-4">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5">Total Amount</h5>
                                                    <h4 class="text-orange">&#8358;18,000</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5">Amount Paid</h5>
                                                    <h4 class="text-orange">&#8358;18,000.45</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-2" id="topp">
                                                    <h5 class="h5 "> Balance</h5>
                                                    <h4 class="text-orange">&#8358;18,000.53</h4>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                       
                            <div class="modal-body">
                        <section id="sale-table">
                                <div class="container">                                               
                                    <div class="long-scroll">
                                        <div class="table-responsive table-responsive-sm" id="topp">
                                            <table class="table table-striped table-hover table-condensed" id="dataTable">
                                                <thead class="p-3">
                                                    <tr class="tab">
                                                    <th scope="col">Payment Date</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">Sales Price (&#8358;)</th>
                                                    <th scope="col">Balance</th>
                        
                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td >21/08/2020 </td>
                                                        <td>
                                                        Lorem ipsum dolor si
                                                        </td> 
                                                        <td> 23</td>
                                                        <td> 43,000</td>
                                                        <td>123,0000</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                   
                                </div>
                            </section>                                    
                        </div>

                        <div class="modal-footer text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                      </div>
            </div>
        </div>
    </div>


@endsection
@section('other_js')
    <script>
        window.all_purchases = @json($inventories);
        window.highest_purchase = @json($highest_purchase);
        window.highest_quantity = @json($highest_quantity);
    </script>
@endsection
