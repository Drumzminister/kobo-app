@extends('layouts.app')
<style>
label {display: block; padding: 5px; position: relative; padding-left: 10px;}
label input {display: none;}
label span {border: 1px solid #ccc; width: 17px; height: 17px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
input:checked + span {background: #ccf; border-color: #ccf;}

input {
    border: none;
    background: transparent;
}

.modal.left .modal-dialog {
	position: fixed;
	margin: auto;
	width: 300px;
	height: 100%;
	-webkit-transform: translate3d(0%, 0, 0);
	-ms-transform: translate3d(0%, 0, 0);
	-o-transform: translate3d(0%, 0, 0);
	transform: translate3d(0%, 0, 0);
}

.modal.left .modal-content {
	height: 100%;
	overflow-y: auto;
}

.modal.left .modal-body {
	padding: 15px 15px 80px;
}

.modal.left.fade .modal-dialog {
	right: -320px;
	-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
	-moz-transition: opacity 0.3s linear, left 0.3s ease-out;
	-o-transition: opacity 0.3s linear, left 0.3s ease-out;
	transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.left.fade.show .modal-dialog {
	right: 0;
}



</style>
@section('content')

{{-- heading section --}}
    <section id="history">
        <div class="container mt-5">
            <div class="row p-3">
                <h2>Sales</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
{{-- end of heading section --}}

{{-- sales chart --}}
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="bg-white p-3"> 
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="sale-h3">Monthly sales</h4>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>D</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>W</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>M</span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label><input type="radio" name="select" /><span>Y</span></label>
                                    </div>
                                          
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                            <canvas id="canvasSale"></canvas>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-white p-3">
                        <h4 class="sale-h4">Most Expenses Transaction</h4>
                        <table class="table table-striped table-hover">
                            <thead class="sale-head">
                              <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Mode</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Cars</a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal" >33,000</a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">GTB</a></td>
                              </tr>
                              <tr>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Furnitures</a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">55,000</a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Access Bank</a></td>
                              </tr>
                              <tr>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Phone</a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">45,000 </a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Access  </a></td>
                              </tr>
                              <tr>
                                <td> <a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">Car </a></td>
                                <td><a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">33,000 </a></td>
                                <td> <a href="" class="right-modal" data-toggle="modal" data-target="#exampleModal">GTB </a></td>
                                </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
{{-- end of sales chart --}}
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">
                <div class="row p-3">
                    <div id="addNew" class="btn btn-addSale" >Add Expenses</div>            
                    <div id="" class="btn btn-success ml-2">Filter</div>
                </div>
            <div class="bg-white mt">
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Date</th>
                            <th scope="col">Inventory Items</th>
                            <th scope="col">QTY sold</th>
                            <th scope="col">Sales Price (&#8358;)</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Channel</th>

                
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td >
                                  21/08/2020
                              </td>
                            <td>
                                Car
                            </td>
                            <td>
                                23
                            </td>
                            <td>
                                43,000
                            </td>
                            <td>
                                Mercy Ikpe
                            </td>
                            <td>
                                IG
                            </td>
                          </tr>

                            <tr>
                               <td >21/08/2020 </td>
                               <td> Car </td>
                              <td> 23</td>
                              <td> 43,000</td>
                              <td> Mercy Ikpe</td>
                              <td> IG</td>
                            </tr>

                            <tr>
                                <td >21/08/2020 </td>
                                <td> Car </td>
                                <td> 23</td>
                                <td> 43,000</td>
                                <td> Mercy Ikpe</td>
                                <td> IG</td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
                    <hr class="mt-0">
                    <div class="text-center mb-5 pb-3">
                        <a href="" class="view-more">View More</a> 
                    </div>
            </div> 
           
        </div>
    </section>
    <div class="modal left fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <div class="product-details">
                            <h5>Product Name</h5>
                            <p>Wallpaper</p>

                            <h5>Description</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, aliquid cumque asperiores, eius totam m ex itaque.</p>
                        
                            <h5>Amount Sold</h5>
                            <p>&#8358; 50,000</p>

                            <h5>Customer</h5>
                            <p>Mercy Ikpe</p>

                            <h5>Accountant Review</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda et dolore, necessitatibus sit .</p>


                        </div>


                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection