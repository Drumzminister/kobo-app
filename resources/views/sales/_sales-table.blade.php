<section id="sale-table">
        <div class="container mt-4">
                
            <div class="bg-white">
                    <div id="table" class="table-editable">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col" class="tool" data-tip="Add all your inventory here." tabindex="1">
                            Inventory Items
                            </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                    Description
                                    </th>
                            <th scope="col" class="tool" data-tip="Provide description of item" tabindex="1">
                                    Invoice
                            </th>
        
                            <th scope="col" class="tool" data-tip="Include the quantity sold." tabindex="1">
                                QTY sold
                            </th>
                            <th scope="col"class="tool" data-tip="Add price per head of product" tabindex="1">
                                    Price of product (&#8358;)
                                </th>
                            <th scope="col"class="tool" data-tip="Add the total price of sales." tabindex="1">
                            Total Price (&#8358;)
                        </th>
                            <th scope="col" class="tool" data-tip="" tabindex="1">
                                Customer
                            </th>
                            <th scope="col" class="tool" data-tip="Channel of sale" tabindex="1">
                                Channel
                            </th>
                            <th class="text-center">Remove</th>            
                
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                <td class="pt-3-half" contenteditable="true">30</td>
                                <td class="pt-3-half" contenteditable="true">Deepends</td>
                                <td class="pt-3-half" contenteditable="true">invoice</td>
                                <td class="pt-3-half" contenteditable="true">Spain</td>
                                <td class="pt-3-half" contenteditable="true">Madrid</td>
                                <td class="pt-3-half" contenteditable="true">Spain</td>
                                <td class="pt-3-half" contenteditable="true">Madrid</td>
                                <td>
                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                    </td>
                            </tr>
                            <tr>
                                    <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                    <td class="pt-3-half" contenteditable="true">30</td>
                                    <td class="pt-3-half" contenteditable="true">Deepends</td>
                                    <td class="pt-3-half" contenteditable="true">invoice</td>
                                    <td class="pt-3-half" contenteditable="true">Spain</td>
                                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                                    <td class="pt-3-half" contenteditable="true">Spain</td>
                                    <td class="pt-3-half" contenteditable="true">Madrid</td>
                                    <td>
                                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                        </td>
                                </tr><tr>
                                        <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                        <td class="pt-3-half" contenteditable="true">30</td>
                                        <td class="pt-3-half" contenteditable="true">Deepends</td>
                                        <td class="pt-3-half" contenteditable="true">invoice</td>
                                        <td class="pt-3-half" contenteditable="true">Spain</td>
                                        <td class="pt-3-half" contenteditable="true">Madrid</td>
                                        <td class="pt-3-half" contenteditable="true">Spain</td>
                                        <td class="pt-3-half" contenteditable="true">Madrid</td>
                                        <td>
                                            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                            </td>
                                    </tr>
                                    <tr>
                                            <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                            <td class="pt-3-half" contenteditable="true">30</td>
                                            <td class="pt-3-half" contenteditable="true">Deepends</td>
                                            <td class="pt-3-half" contenteditable="true">invoice</td>
                                            <td class="pt-3-half" contenteditable="true">Spain</td>
                                            <td class="pt-3-half" contenteditable="true">Madrid</td>
                                            <td class="pt-3-half" contenteditable="true">Spain</td>
                                            <td class="pt-3-half" contenteditable="true">Madrid</td>
                                            <td>
                                                <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                                <td class="pt-3-half" contenteditable="true">30</td>
                                                <td class="pt-3-half" contenteditable="true">Deepends</td>
                                                <td class="pt-3-half" contenteditable="true">invoice</td>
                                                <td class="pt-3-half" contenteditable="true">Spain</td>
                                                <td class="pt-3-half" contenteditable="true">Madrid</td>
                                                <td class="pt-3-half" contenteditable="true">Spain</td>
                                                <td class="pt-3-half" contenteditable="true">Madrid</td>
                                                <td>
                                                    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                                    </td>
                                            </tr>
                     
                 
                        </tbody>
                            
                    </table>
                    <span class="table-add float-right"  >Add Row <i class="fa fa-plus-square" style="font-size:24px;color:#00C259;"></i>
                    </span>            
                </div>

                    {{-- payment section --}}

                    <div class="row p-2 mt-2 ">
                        <div class="col-md-6">
                            <div class="bg-grey py-4 px-3" id="topp">
                                <div class="row" >
                                    <div class="col-md-5">
                                        <h5 class="h5 uppercase">Payment Mode</h5>
                                        <div class="dropdown show mt-3">
                                                <a class="btn btn-lg btn-payment dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Bank (GTB)
                                                </a>
                                              
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <a class="dropdown-item" href="#">GTB 1</a>
                                                  <a class="dropdown-item" href="#">GTB 2</a>
                                                  <a class="dropdown-item" href="#">Skye Bank</a>
                                                </div>
                                              </div>
                                    </div>

                                    <div class="col-md-5">
                                        <h5 class="h5 uppercase">Amount</h5>
                                        <div class="show input-group input-group-lg mt-3">
                                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="" placeholder="500,000">
                                        </div>                                
                                    </div>

                                    <div class="col-md-2"></div>
                                </div>
                                
                                
                                <div class="row">
                                        <div class="col-md-5">
                                            <div class="dropdown show mt-3">
                                                    <a class="btn btn-lg btn-payment dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Cash
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                      <a class="dropdown-item" href="#">ATM</a>
                                                      <a class="dropdown-item" href="#">GTB 2</a>
                                                      <a class="dropdown-item" href="#">Skye Bank</a>
                                                    </div>
                                                  </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="show input-group input-group-lg mt-3">
                                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="750,000">
                                            </div>                                   
                                        </div>
                                        <div class="col-md-2 mt-4 "> 
                                                <span class=""><i class="fa fa-plus-square" style="font-size:32px;color:#00C259;"></i>
                                                </span>
                                        </div>    
                                </div>
                            </div>
                        </div>
                    {{-- end of current payment --}}

                    {{-- total sum section --}}
                        <div class="col-md-6">
                                <div class="bg-grey py-4 px-3" id="topp">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="h5 uppercase">Total Discount</h5>
                                                <div class="input-group mb-3 input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="h5 uppercase">Total Delivery Amount</h5>
                                                <div class="input-group mb-3 input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                    </div>
                                                    <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="100,000">                        
                                                </div>
                            
                                            </div>
                                        </div>
                                                                                
                                        <div class="row pt-2">
                                            <div class="col">
                                            <h5 class="h5 uppercase">Total Amount</h5>
                                            </div>
                                            <div class="col input-group input-group-lg">
                                                <div class="input-group-prepend cus">
                                                    <span class="input-group-text customer-input" id="basic-addon3">&#8358;</span>
                                                </div>
                                                <input type="text" class="form-control " id="basic-url" aria-describedby="basic-addon3" placeholder="1,275,000">                        
                                            </div>            
                                        </div>
                                    </div>
                        </div>
                        {{-- end of total sum section --}}                    
                    </div>  
                    {{-- end of entire payment section --}}

                    {{-- payment buttons --}}
                    <div class="row p-3">
                        <div class="col">                           
                            <a href="" class="btn btn-lg btn-login" data-toggle="modal" data-target="#exampleModalCenter">Send Invoice</a>
                        </div>
                        <div class="col">
                            <span class="float-right">
                                <a href="" class="btn btn-lg btn-started">Save</a>
                            </span>
                        </div>
                    </div>
            </div> 
           
        </div>
    </section>