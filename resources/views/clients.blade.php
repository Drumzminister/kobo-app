@extends('layouts.app-acct')
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
<section id="top">
    <div class="container py-3">
        <div class="row">
            <div class="col">
                <h3 class="h3">Clients</h3>
            </div>
            <div class="col">
                <div class="pull-right">
                    <a href="" class="btn btn-login">Actions</a>
                    <a href="" class="btn btn-started">Create Clients</a>
                </div>
            </div>
        </div>
        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text vat-input px-5 py-2" id="basic-addon2">Filter<i class="fa fa-filter px-2"></i></span>
            </div>
        </div>
    </div>
</section>

{{-- table section --}}
<section id="table">
    <div class="container bg-white mt-5">
            <div class="table-responsive table-responsive-sm">
                    <table class="table table-stripe table-hover text-grey" id="table">
                        <thead class="">
                          <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                            <th scope="col">Client</th>
                            <th scope="col">Prefix</th>
                            <th scope="col">IDNumber</th>
                            <th scope="col">Staff Number</th
                         </tr>
                        </thead>

                        <tbody>
                          <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                              <td >
                                  <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                  <span class="text-green pl-3"> Lagos Insurance</span>
                                </td>
                            <td>
                                KB12
                            </td>
                            <td>
                                HN-01234
                            </td>
                            <td>
                                40
                            </td>                                   
                          </tr>

                          <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                <td >
                                    <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                      <span class="text-green pl-3"> Lagos Insurance</span>
                                  </td>
                              <td>
                                  KB12
                              </td>
                              <td>
                                  HN-01234
                              </td>
                              <td>
                                  40
                              </td>                                   
                            </tr>
  
                            <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                    <td >
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class=" rounded-circle img-fluid service-img">
                                        <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                  <td>
                                      KB12
                                  </td>
                                  <td>
                                      HN-01234
                                  </td>
                                  <td>
                                      40
                                  </td>                                   
                                </tr>

                                <tr class="right-modal" data-toggle="modal" data-target="#exampleModal">
                                        <td >
                                            <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                            <span class="text-green pl-3"> Lagos Insurance</span>
                                        </td>
                                      <td>
                                          KB12
                                      </td>
                                      <td>
                                          HN-01234
                                      </td>
                                      <td>
                                          40
                                      </td>                                   
                                    </tr>
          
                            <tr class="d-none">
                                    <td >
                                         <img src=" " alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                         <span class="text-green pl-3"> Lagos Insurance</span>
                                    </td>
                                    <td> <textarea class="form-control"></textarea></td>
                                    
                                    <td> <input type="number" placeholder=""> </td>

                                <td>
                                    <div class="dates">
                                        <input type="text" class="form-control" id="usr1" name="event_date" placeholder="DD-MM-YYYY" autocomplete="off" >
                                    </div>
                                </td>
                                  
                                </tr>                                  
                        </tbody>
                    </table>                
            </div>
    </div>
</section>

<section id="pagination">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-7">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
            </div>
            <div class="col-md-5">
                <span>Go to page:</span>

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
                        <h3 class="h3">Client Review</h3>
                        <p class="text-muted">Write a review below</p>
                        <center>
                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-imgg"><br>
                        <span class="text-green pl-3"> Lagos Insurance</span>
                    </center>
                    <form method="" class="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Subject</label>
                            <input type="text" class="form-control" id="" placeholder="Enter title here">
                        </div>
                                                
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Last Review Summary</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Review</label>
                            <textarea class="form-control" id="" rows="5" placeholder="Not more than 350 words"></textarea> 
                        </div>

                    <button type="button" class="btn btn-addSale" data-dismiss="modal">Save</button>

                    </form>                                   
                    </div>
                </div>                
            </div>
        </div>
    </div>

@endsection