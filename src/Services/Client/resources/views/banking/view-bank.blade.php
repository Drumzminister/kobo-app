@extends('layouts.app')

@section('content')
<section id="top">
        <div class="container p-2">
            <div class="row py-2">
                <h2><a href="/client/banking" class="text-dark">Banks</a></h2>
                {{-- <div class="row ml-auto ">
                    <button class="col btn bank-button btn-addBank mr-2" data-toggle="modal" data-target="#add-bank">
                        Add Bank               
                    </button>
                    <button class="accountant btn bank-button btn-accountant btn-transfer col" data-toggle="modal" data-target="#make-transfer">
                        Make a transfer           
                    </button>
                </div> --}}
            </div>
        </div>
    </section>

    <section>  
        <div class="container bg-white px-5 py-3">
            <div class="row">
                <div class="col-4 col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('img/firstbank.png')}}" alt="firstBank Logo" srcset="" class="img-fluid">
                                </div>
                                <div class="col">
                                    <p>
                                        Name:Chukwuma Bosun
                                        <br>
                                        Account No: 3079645739
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('img/uba.png')}}" alt="firstBank Logo" srcset="" class="img-fluid">
                                </div>
                                <div class="col">
                                    <p>
                                        Name:Chukwuma Bosun
                                        <br>
                                        Account No: 3079645739
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('img/diamond.png')}}" alt="firstBank Logo" srcset="" class="img-fluid">
                                </div>
                                <div class="col">
                                    <p>
                                        Name:Chukwuma Bosun
                                        <br>
                                        Account No: 3079645739
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                            <div class="row ">
                                <div class="col">
                                    <img src="{{asset('img/access.png')}}" alt="firstBank Logo" srcset="" class="img-fluid">
                                </div>
                                <div class="col">
                                    <p>
                                        Name:Chukwuma Bosun
                                        <br>
                                        Account No: 3079645739
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-8 p-3 col-md-8" id="topp">
                    <div class="tab-content" id="nav-tabContent">
                       @include('client::banking.view-firstbank')    
                    
                       @include('client::banking.view-secondbank')    
                    
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                    
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                    </div>
                </div>
            </div>  
        </div>     
        
    </section>

@endsection