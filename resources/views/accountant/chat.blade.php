@extends('layouts.app-acct')

@section('content')
{{-- heading section --}}
<section id="top">
    <div class="container p-2">
        <h2>Chats</h2>
    </div>
</section>
{{-- end of heading section --}}

{{-- chat section --}}
<section>
    <div class="container my-4">
        <div class="bg-white p-3">
            <div class="row">
                <div class="col-md-4">
                        <div class="input-group ">
                                <input type="text" class="form-control py-3" placeholder="&#xF002; Who are you looking for?" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">       
                        </div>
                {{-- chat panel --}}
                    <div class="chat-scroll">
                        <div class="list-group py-3" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="topp list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="h6 ">Dextel okon</h6>
                                        <span class="text-muted small">Reply my message... Its urgent</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-muted small">03 Feb</p>
                                        <span class="nego"></span>
                                    </div>
                                </div> 
                            </a>
                            <a class="list-group-item list-group-item-action" id="topp list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="h6 ">Dextel Ambrose</h6>
                                        <span class="text-muted small">Reply my message... Its urgent</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-muted small">03 Feb</p>
                                        <span class="badge badge-danger rounded-circle notification-badge" id="notification-badg">2</span>
                                    </div>
                                </div>
                                
                            </a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="h6 ">Mercy okon</h6>
                                        <span class="text-muted small">Reply my message... Its urgent</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-muted small">03 Feb</p>
                                    <span class="badge badge-danger rounded-circle notification-badge" id="notification-badg">4</span>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h6 class="h6 ">Tolu okon</h6>
                                        <span class="text-muted small">Reply my message... Its urgent</span>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="text-muted small">03 Feb</p>
                                        <span class="nego"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- chat zone --}}
                <div class="col-md-8">
                    <div class="bg-green">
                        <div class="row px-4 py-3">
                            <div class="col-md-2">
                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                            </div>
                            <div class="col-md-10 text-white">
                                <h6 class="h6">David Somto</h6>
                                <span>Online</span>
                            </div>
                        </div>
                    </div>

                    {{-- chat display --}}
                    <div class="chat p-5 chat-scroll">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <div class="row py-2 px-5">
                                    <div class="col-md-2">
                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="bg-white p-3 text-muted" id="topp">
                                            I have seen the report and also reponded
                                        </div>
                                        <p class="text-muted small py-2">3:59pm</p>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="row py-2 px-5">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="bg-green p-3 text-white" id="topp">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti similique tenetur magni ratione autem deleniti totam, delectus reprehenderit praesentium quidem!
                                            </div>
                                        <p class="text-muted small py-2">4:09pm</p>

                                        </div>
                                        <div class="col-md-2">
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                        </div>
                                    </div>

                            </div>
                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                ertvhjikk
                            </div>
                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                    <div class="row py-2 px-5">
                                            <div class="col-md-2">
                                                <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="bg-white p-3 text-muted" id="topp">
                                                    I have seen the report and also reponded
                                                </div>
                                                <p class="text-muted small py-2">3:59pm</p>
                                            </div>
                                             <div class="col-md-2"></div>
                                        </div>
    
                                        <div class="row py-2 px-5">
                                                <div class="col-md-2">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bg-green p-3 text-white" id="topp">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti similique tenetur magni ratione autem deleniti totam, delectus reprehenderit praesentium quidem!
                                                    </div>
                                                <p class="text-muted small py-2">4:09pm</p>
    
                                                </div>
                                                <div class="col-md-2">
                                                        <img src="{{asset('img/account-client.png')}}" alt="client logo" srcset="" class="rounded-circle img-fluid service-img">
                                                </div>
                                            </div>           
                                    </div>                                
                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                                hvsgygvfwqyd wqnhdbh
                            </div>
                        </div> 
                        <div class="chat-area">
                            <div class="input-group">
                                <input type="text" class="form-control py-3" placeholder="&#xF002; Who are you looking for?" style="font-family:Arial, FontAwesome" aria-label="Recipient's username" aria-describedby="basic-addon2">       
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection