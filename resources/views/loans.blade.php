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
            width: 400px;
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
            padding: 30px;
        }
        
        .modal.left.fade .modal-dialog {
            left: -320px;
            transition: opacity 0.5s linear, left 0.5s ease-out;
        }
        
        .modal.left.fade.show .modal-dialog {
            left: 0;
        }
        </style>
        
@section('content')

{{-- heading section --}}
    <section id="top">
        <div class="container p-2">
            <div class="row p-3">
                <h2>Loans</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
        </div>
    </section>
{{-- end of heading section --}}

{{--  --}}
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4 ">
                    <div class="bg-green loa p-4 text-white" >
                        <h5 class="h5">Total Current Loan</h5>
                        <span class="total-loan">&#8358;1,000,000</span>        
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="bg-white text-grey loa p-4">
                        <h5 class="h5">Total Amount Paid</h5>
                        <span class="total-loan">&#8358;1,000,000</span>        
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="bg-white text-grey loa p-4">
                        <h5 class="h5">Total Amount Owed</h5>
                        <span class="total-loan"> &#8358;1,000,000</span>        
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="sale-table">
        <div class="container mt-4">
                <div class="row p-3">
                        <a href="" class="btn btn-addSale left-modal" data-toggle="modal" data-target="#exampleModal">Add Loan</a>            
                        <div id="" onclick="">
                                <button style="font-size:18px" class="btn btn-filter">Filter <i class="fa fa-filter"></i></button>         
                        </div>
                </div>
            <div class="bg-white mt">
                
                <div class="table-responsive table-responsive-sm">
                    <table class="table table-striped table-hover" id="dataTable">
                        <thead class="p-3">
                          <tr class="tab">
                            <th scope="col">Source</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Amount (&#8358;)</th>
                            <th scope="col">Status</th>
                            <th scope="col">Period</th>              
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td >237,000 </td>
                                <td class="completed">Completed</td>
                                <td> 10 years </td>      
                          </tr>

                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td>230,000 </td>
                                <td class="running">Running </td>
                                <td> 10 years </td>      
                          </tr>

                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td >135,000 </td>
                                <td class="completed">Completed </td>
                                <td> 10 years </td>      
                          </tr>

                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td>230,000 </td>
                                <td class="running">Running </td>
                                <td> 10 years </td>      
                          </tr>

                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td >135,000 </td>
                                <td class="completed">Completed </td>
                                <td> 10 years </td>      
                          </tr>
                          <tr>
                                <td> Microfinance Bank</td>
                                <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, architecto.</td>
                                <td >173,000 </td>
                                <td class="running">Running </td>
                                <td> 10 years </td>      
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

    {{-- modal --}}
    <div class="modal left fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <div class="product-details">

                            <form method="" class="loan-form">
                            <h5 class="h5 uppercase">New Loan</h5>

                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Source</label>
                                      <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Description</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <h5 class="h5 pt-3">Additional</h5>
                                        <div class="form-group">
                                                <label for="exampleFormControlInput1">Loan Amount</label>
                                                <input type="text" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Interest Rate Amount</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Loan Term</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Number of Payments per Year</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group dates">
                                                <label for="exampleFormControlInput1">Start Date of the Loan</label>
                                                <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                                            </div>                           

                                  </form>
                        </div>               
                    </div>
                    <div class="row">
                        <div class="col">
                                <button type="button" class="btn btn-secondary py-2 px-4" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-started pull-right ">Add</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection