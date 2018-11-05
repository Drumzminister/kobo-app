@extends('layouts.app')

@section('content')

{{-- modal section --}}
{{-- first modal --}}
<div class="modal hide fade m-auto" id="myModal" tabindex="-1" role="dialog">
    <div class=" modal-dialog modal-dialog-centered" role="document">
      <div class="container p-5 modal-content">
            <div class="modal-body text-center">
                <h5 class="modal-h5">Welcome Ola &#x1f642 !!!</h5>
                <h5 class="h5 pt-3">SETUP AN OPENING ACCOUNT</h5>
                <p class="modal-account">Setup your account by providing some details about your Debtors, Creditors, Value of existing assets and Rent. This will help the accountant to easily start taking records of you company.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-started mr-auto"> <a href="/opening-asset" target="_blank">Get Started</a> </button>
                <button type="button" class="btn btn-login pr-4 pl-4" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Skip</button>
            </div>
        </div>
    </div>
  </div>

{{-- second modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="container p-5 modal-content">
                        <div class="modal-body text-center">
                            <h5 class="modal-h5">Hi Ola &#x1f642 !!!</h5>
                            <p class="modal-account pt-3">You can continue without providing the details but your records might not be detailed. Do you wish to continue ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-started mr-auto" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-login pr-4 pl-4"><a href="/opening-asset" target="_blank"> Continue</a></button>
                        </div>
                </div>
        </div>
</div>

{{-- end of modal --}}

{{-- heading section --}}
    <section id="history">
        <div class="container mt-5">
            <div class="row account">
                <h2>Dashboard</h2>
                <span class="accountant ml-auto btn btn-accountant">
                <a href="" class="btn-accountant">
                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"> Accountant
                </a>                
                </span>
            </div>
{{-- end of heading section --}}

{{-- history and performance section --}}
            <div class="row mt-3">
                <div class="col-md-4 ">
                    <div class="bg-white pt-2">
                        <div class="rounded-circlee ml-5 mt-3"></div>
                        <ul class="history">
                            <h5 class="h5 pl-5 pt-4">HISTORY</h5>
                            <li class="history-list">
                                <a href="" class="history-link" >Recent Transaction</a>
                            </li>
                            <li class="history-list">
                                <a href="" class="history-link">Update Transaction</a>
                            </li>
                            <li class="history-list">
                                <a href="" class="history-link">Last seen</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="bg-white p-4">
                        <h5 class= "h5">PERFORMANCE</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="test-circle"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, possimus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div id="test-circle2"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, possimus?</p>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div id="test-circle3"></div>
                                    <div class= "text-center">
                                        <h6 class="h6">PROFITABILITY</h6>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, possimus?</p>
                                    </div>
                            </div>
                        </div>                           
                    </div>
                </div>
            </div>
        </div>       
</section>
{{-- end of history and performance --}}

{{-- transaction section --}}
<section id="transaction">
    <div class="container pt-5">
        <div class="row">

            {{-- transaction --}}
            <div class="col-md-8 ">
                <div class="bg-white p-4" >
                    <h5 class="h5">TRANSACTION</h5>
                    {{-- transaction chart --}}
                    <div style="">
                            <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
            {{-- end of transaction --}}

            {{-- report --}}
            <div class="col-md-4 ">
                <div class="bg-white p-3">
                    <h5 class="h5 pt-5">REPORT (<span>&#8358;</span>)</h5>
                    <p>Lorem, ipsum dolor sit amet consectet</p>

                    {{-- report date --}}
                    <form>
                        <div class="form-row pt-2">
                          <div class="form-group col-md-6">
                            <label for="date" class="date">Start Date</label>
                            <input type="date" class="form-control" id="" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="date" class="date">End Date</label>
                            <input type="date" class="form-control" id="" placeholder="">
                          </div>
                        </div>
                    </form>
                    {{-- end of report date --}}

                    <div class="row pt-2">
                        <div class="col-md-4">
                            <h6 class="total-h6">TOTAL SALES</h6>
                            <h4 class="col-sales">18,000</h4>
                        </div>
                        <div class="col-md-4">
                                <h6 class="total-h6">TOTAL EXPENSES</h6>
                                <h4 class="col-expenses">18,000</h4>
                        </div>
                        <div class="col-md-4">
                                <h6 class="total-h6"> NET PROFIT</h6>
                                <h4 class="col-net">18,000</h4>
                        </div>
                    </div>

                </div>
            </div>
            {{-- end of report --}}
        </div>
    </div>
</section>
{{-- end of transaction section --}}

{{-- services section --}}
<section id="services">
    <div class="container pl-5 bg-white mt-5">
        <div class="row p-5">
            <div class="col-md-4 text-center">
                <div class="circle text-center p-5">
                    <a href="" class="service-link">
                        <img src="{{asset('img/sales.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">SALES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="circle text-center p-5">
                    <a href="" class="service-link">
                        <img src="{{asset('img/inventory.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">INVENTORY</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>        
            </div>

            <div class="col-md-4">
                <div class="circle text-center p-5">
                    <a href="" class="service-link">
                        <img src="{{asset('img/expenses.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                        <h5 class="h5 pt-1">EXPENSES</h5>
                        <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row p-5">
                <div class="col-md-4 text-center">
                    <div class="circle text-center p-5">
                        <a href="" class="service-link">
                            <img src="{{asset('img/loans.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">LOANS</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="circle text-center p-5">
                        <a href="" class="service-link">
                            <img src="{{asset('img/rent.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">RENT</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>        
                </div>

                <div class="col-md-4">
                    <div class="circle text-center p-5">
                        <a href="" class="service-link"> 
                            <img src="{{asset('img/banking.svg')}}" alt="services-img" srcset="" class="img-fluid service-img">
                            <h5 class="h5 pt-1">BANKING</h5>
                            <p class="service-p">Lorem ipsum dolor sit amet consectetur </p>
                        </a>
                    </div>   
                </div>
            </div>
    </div>
</section>
{{-- end of services section --}}



@endsection
