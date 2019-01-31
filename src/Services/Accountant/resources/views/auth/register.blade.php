<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kobo accountant</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Description" content="Accounting site, Accounting App ">
  <meta content="koboaccountant, accounting, kobo" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <!-- Favicons -->
  <link href="https://res.cloudinary.com/syfon/image/upload/v1536857508/favicon.png" rel="icon">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

{{-- styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/auth.css') }}" rel="stylesheet"> --}}
<style>
body{
  background: #a7a6a6b0;
}

.form-group.required .label:after {
  content:"*";
  color:red;
}

.hr{
width: 30px;
height: 2px;
background-color: red;
margin-top: -10px;
}


.btn-cancel{
    border-radius: 50px;
    /* background-color: #333; */
    color: black;
    font-weight: 600;
    font-size: 1.1rem;
    letter-spacing: 1px;
    display: inline-block;
    padding: 6px 30px;
    /* border: 1px solid; */
    transition: 0.9s;   
     padding: 6px 30px;

}

.btn-cancel:hover,
.btn-cancel:focus {
    color: #00C259;
    font-weight: 600;
    text-shadow: none;
    /* Prevent inheritance from `body` */
    background-color: transparent;
    border: .05rem solid #00C259;
    /* padding: .8em 4em; */
}
.btn-continue{
font-weight: 600;
  font-size: 1.1rem;
  letter-spacing: 1px;
  display: inline-block;
  padding: 6px 30px;
  border: 1px solid;
  transition: 0.9s;
  color: #00C259;
  background:transparent ;
  border-radius: 50px;

}

.btn-continue:hover span {
  padding-right: 25px;
  color: #fff ;

}

.btn-continue:hover span:after {
  opacity: 1;
  right: 0;
  color: #fff ;
}

#login{
    width: 90%;
    margin: auto;
    position:absolute;
      width: 100%;
      text-align: center;
      background: transparent;
      z-index: -2;
}

.login-kobo{
  background: white;
  margin: auto;
  animation-name: example;
    animation-duration: 3s;    
    animation-fill-mode: forwards;
}

@keyframes example {
  from {top: 200px;}
  to {top: 0px;}
}

</style>
</head>
<body>
    <div id="login pt-3">
        <div class="container pt-3">               
            <div class="col-md-6 login-kobo ">
                <div class="container d-block p-3"> 
                    <p class="level float-right small">1/2</p><br>                 
                    <h5 class="login-h2 pb-3 text-center text-uppercase">
                        Create Account
                    </h5>
                    <hr class="hr">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-row text-muted">
                            <div class="form-group required col-md-4">
                                <label for="name" class="label">First Name</label>
                                <input type="text" class="form-control" id="" placeholder="Yolu" required>
                            </div>
                            <div class="form-group required col-md-4">
                                <label for="name" class="label">Last Name</label>
                                <input type="text" class="form-control" id="" placeholder="Bosunki" required>
                            </div>
                            <div class="form-group required col-md-4">
                                <label for="email" class="label">Email</label>
                                <input type="email" class="form-control" id="" placeholder="syf@gmail.com" required>
                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="phone no" class="label">Phone Number 1</label>
                                <input type="number" class="form-control" id="" placeholder="090847432" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone no">Phone Number 2</label>
                                <input type="number" class="form-control" id="" placeholder="0816754883">
                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="password" class="label">Enter Password</label>
                                <input type="password" class="form-control" id="" placeholder="******" required>                            </div>
                            <div class="form-group required col-md-6">
                                <label for="Password" class="label">Confirm Password</label>
                                <input type="password" class="form-control" id="" placeholder="********" required>
                            </div>
                        </div>

                        <div class="form-check py-2">
                              <input type="checkbox" class="form-check-input" id="" required >
                              <label class="form-check-label" for="terms">By Checking this box, I agree to <a href="/" target="_blank"> Terms and Conditions</a> and <a href="/" target="_blank">Privacy Policy</a></label>
                        </div>

                        <div class="button text-center py-2">
                            <button class="btn btn-continue"> <a href="/accountant/registration" class="style=color:#00C259;">Continue </a><i class="fas fa-arrow-right"></i></button><br>
                            <button class="btn btn-cancel mt-3">Cancel</button>

                        </div>

                    </form>
                </div>
            </div> 
        </div>
    </div>
    

</body>
</head>
</html>