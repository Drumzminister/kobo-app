<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand pr-3 pl-3" href="/">
        <img src="{{asset('img/logo.svg')}}" alt="logo" srcset="" class="img-fluid logoo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav" id="navLink">
                <li class="nav-item pr-3 pl-3">
                    <a class="nav-link pr-3 pl-3" href="/dashboard">Dashboard</a>
                </li>

                <li class="nav-item dropdown pr-4 pl-4">                   
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clients
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="/client">Client</a>
                    <a class="dropdown-item" href="/manage/clients">Manage Clients</a>
                    <a class="dropdown-item" href="/profile">Client Profile</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown pr-4 pl-4">                   
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Transaction
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="/budget">Budget</a>
                    <a class="dropdown-item" href="/npv">NPV Calculator</a>
                    <a class="dropdown-item" href="/bank-reconciliation">Bank Reconcilation</a>
                    </div>
                </li>

                <li class="nav-item dropdown pr-4 pl-4">                   
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tools
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="/toolkits">Toolkits</a>
                    <a class="dropdown-item" href="/resources">Resources</a>
                    </div>
                </li>


                <li class="nav-item pr-4 pl-4">
                    <a class="nav-link pr-3 pl-3 " href="/chats">Chats</a>
                </li>

            </ul>
 

        {{-- notification --}}
            <div class=" multi-collapse py-0 my-0 " id=""  style="max-width: 600px; padding-right:50px;">
                <ul class="navbar-nav ml-auto navbar-row upper-navbar py-0 my-0">
        
                    <li class="nav-item dropdown py-3">
                        <a class="nav-link mr-2 remove-after notification" href="#" 
                            id="navbarSettings" onclick ="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell-o navbar-icon"  style="font-size:24px"></i>                        
                            <span class="badge badge-danger rounded-circle notification-badge" id="notification-badge">4</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-notification " aria-labelledby="navbarSettings">
                        <div class="notifications-div activee ">Notifications <span class="badge badge-danger rounded-circle notification-badge " id="">4</span></div>
                            <span class="dropdown-item hover-text" href="#" style="font-size:12px!important; " >
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png" ><strong>Matthew Okon </strong>appproved your pending order</span>
                            
                                <hr class="line">
                            
                            <span class="dropdown-item hover" href="#" style="font-size:12px!important; ">
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"><strong>Matthew Okon </strong>appproved your pending order</span>
                            
                                <hr class="line">
                        
                            <span class="dropdown-item hover" href="#" style="font-size:12px!important; ">
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"><strong>Matthew Okon </strong>appproved your pending order</span>

                                <hr class="line">
                            
                            <div class="drop-footer">
                                <span>
                                <a class="view_all" href="">View All</a>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        {{-- End of notification --}}

        {{-- Message --}}
            <div class=" multi-collapse py-0 my-0 js-item-menu" id=""  style="max-width: 950px; padding-right:50px;">
                <ul class="navbar-nav ml-auto navbar-row upper-navbar py-0 my-0">
        
                    <li class="nav-item dropdown py-3">
                        <a class="nav-lin mr-2 remove-after notification" href="#" 
                            id="navbarSettings" onclick ="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope-o navbar-icon"  style="font-size:24px;color:white;" ></i>                        
                            <span class="badge badge-danger rounded-circle notification-badge" id="notification-badge">6</span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-notification" aria-labelledby="navbarSettings">
                        <div class="notifications-divv">
                            <a class="button activee message pt-3 pb-3" href="" data-rel="#message" >Messages <span class="badge badge-danger rounded-circle notification-badge " id="messageActive">3</span></a>
                            <a class=" button recommend pt-3 pl-1 pb-3" href="" data-rel="#recommend" >Recommendation <span class="badge badge-danger rounded-circle notification-badge " id="recommendActive">3</span></a>                        
                        </div>
                        
                        {{-- message section --}}
                            <div class="drop-messag" id="message">
                                <span class="dropdown-item hover-text" href="#" style="font-size:12px!important; " >
                                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png" ><strong>Matthew Okon </strong>appproved your pending order</span>
                                
                                <hr class="line">
                                
                                <span class="dropdown-item hover" href="#" style="font-size:12px!important; ">
                                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"><strong>Matthew Okon </strong>appproved your pending order</span>
                                
                                <hr class="line">
                            
                                <span class="dropdown-item hover" href="#" style="font-size:12px!important; ">
                                    <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"><strong>Matthew Okon </strong>appproved your pending order</span>

                                <hr class="line">
                            </div>
                    {{-- end of message section --}}

                            {{-- recommendation section --}}
                            <div class="drop-messag" id="recommend">
                                <span class="dropdown-item hover-text" href="#" style="font-size:12px!important; " >
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png" ><strong>Matthew Okon </strong>recommend your sale</span>
                            
                                <hr class="line">
                            
                                <span class="dropdown-item hover" href="#" style="font-size:12px!important; ">
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png"><strong>Matthew Okon </strong>recommend your inventory record</span>
                            
                                <hr class="line">                           
                            </div>
                            {{-- end of recommendation --}}

                            {{-- message footer --}}
                            <div class="drop-footer">
                                    <span>                                
                                    <a class="view_all" href="">View All</a>
                                    </span>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        {{-- End of message --}}

            {{-- user section --}} 
            <div class=" multi-collapse " id="">
                <ul class="navbar-nav ml-auto navbar-row ">
        
                    <li class="nav-item dropdown py-3">
                        <a class="nav-link mr-2 remove-after notification" href="#" 
                            id="navbarSettings" onclick ="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="login">
                            <span>Olu David</span>
                            <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png" >
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right " style="width:260px;" aria-labelledby="navbarSettings">
                         {{-- <div class="">
                                <img src="https://res.cloudinary.com/samuelweke/image/upload/v1527079189/profile.png" style="width:50px" >
                                Olu David <span class="pl-4"> ekpnoambrose@gmial.com</span>
                        </div> --}}
                            <a class="dropdown-item " href="#"><i class="fa fa-user pr-3" style="font-size:24px; color:#00C259;"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-gear pr-3" style="font-size:24px; color:#00C259;"></i>Setting</a>
                            <a class="dropdown-item hover" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off pr-3" style="font-size:24px;color:#00C259;" >
                                </i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>