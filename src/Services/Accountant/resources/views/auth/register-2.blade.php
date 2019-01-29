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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
.btn-continue span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.8s;
}

.btn-continue span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.8s;
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
                    {{-- <p class="level float-right small">1/2</p><br>                  --}}
                    <h5 class="login-h2 pb-3 text-center text-uppercase">
                        Create Account
                    </h5>
                    <hr class="hr">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-row text-muted">
                            <div class="form-group required col-md-3">
                                <label for="name" class="label">Sex</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                            <div class="form-group required col-md-3">
                                <label for="date" class="label">Date of Birth</label>
                                <input type="date" class="form-control" id="" placeholder="29/09/1998" required>
                            </div>
                            <div class="form-group required col-md-6">
                                <label for="city" class="label">City</label>
                                <select class="custom-select mr-sm-2" id="">
                                    <option selected>Choose City</option>
                                    <option value="1">Lekki</option>
                                    <option value="2">Ikeja</option>
                                    <option value="3">Ajah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="address" class="label">Address</label>
                                <input type="text" class="form-control" id="" placeholder="34 nepa line" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=state>State</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Lagos</option>
                                    <option value="1">Ebonyi</option>
                                    <option value="2">Cross River</option>
                                    <option value="3">Adamawa</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="info" class="label">How did you hear about us</label>
                                <input type="text" class="form-control" id="" placeholder="Friend" required>                            </div>
                            <div class="form-group required col-md-6">
                                <label for="country" class="label">Country</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Nigeria</option>
                                    <option value="1">Cameroun</option>
                                    <option value="2">England</option>
                                    <option value="3">Ghana</option>
                                </select>                            
                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="name" class="label">Highest Qualification</label>
                                <input type="text" class="form-control" id="" placeholder="female" required>
                            </div>
                            <div class="form-group required col-md-3">
                                <label for="date" class="label">Job Status</label>
                                <input type="date" class="form-control" id="" placeholder="29/09/1998" required>
                            </div>
                            <div class="form-group required col-md-3">
                                <label for="city" class="label">Work Experience</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>6-12months</option>
                                    <option value="1">1-3 years</option>
                                    <option value="2">3-5 years</option>
                                    <option value="3">5-10 years</option>
                                </select>                            </div>
                        </div>

                        <div class="form-row text-muted">
                            <div class="form-group required col-md-6">
                                <label for="country" class="label">Chartered?</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>Yes</option>
                                    <option value="1">No</option>
                                </select>                            
                            </div>
                            <div class="form-group required col-md-6">
                                <label for="info" class="label">Most active Social Media handle</label>
                                <input type="text" class="form-control" id="" placeholder="Friend" required>                            </div>
                        </div>
                        <div class="form-check py-2">
                              <input type="checkbox" class="form-check-input" id="" required >
                              <label class="form-check-label" for="terms">By Checking this box, I agree to <a href="/" target="_blank"> Terms and Conditions</a> and <a href="/" target="_blank">Privacy Policy</a></label>
                        </div>

                        <div class="button text-center py-2">
                            <button class="btn"> <a href="/login" class="btn-continue">Login</a></button><br>
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