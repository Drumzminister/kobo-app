@extends('layouts.app')

@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/inventory" class="text-dark">Purchase</a></h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
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
                            <form action="" method="post" enctype="" id=""> 
                                <button type="submit" class="btn btn-started">Choose a file</button>
                           </form>
                          </div>
                    </div>
                </div>
                <div class="col-md-8 px-2">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" class="form-control bg-grey" id="" placeholder="Enter Name of product">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control bg-grey" id="" rows="5" placeholder="Brief Placeholder"></textarea>
                            </div>
                            <div class="form-row py-3">
                                <div class="col">
                                        <label for="name">Cost Price</label>
                                        <input type="text" class="form-control bg-grey" placeholder="NGN 10,000">
                                </div>
                                <div class="col">
                                        <label for="name">Sales Price</label>
                                        <input type="text" class="form-control bg-grey" placeholder="NGN 20,000">
                                </div>
                            </div>
                            <div class="form-row py-3">
                                    <div class="col">
                                        <label for="name">Quantity</label>
                                        <select id="quantity" class="form-control bg-grey">
                                            <option selected>Choose...</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="name">Vendor</label>            
                                        <select id="inputState" class="form-control bg-grey">
                                            <option selected>Choose Vendor</option>
                                            <option>Mercy Bassey</option>
                                            <option>Promise Somto</option>
                                            
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="col">
                                        <label for="name">Category</label>
                                        <select id="quantity" class="form-control bg-grey">
                                                <option selected>Choose...</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>5</option>
                                            </select>
                                                                            </div>
                                    <div class="col">
                                        <label for="name">Payment Mode</label>
                                        <select id="quantity" class="form-control bg-grey">
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
                                        <button class="btn btn-addsale form-control"> Add Product</button>
                                    </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

    


  
    
@endsection
