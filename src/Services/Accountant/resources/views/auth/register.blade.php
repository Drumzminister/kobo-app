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
  <link href="https://fonts.googleapis.com/css?family=Alef:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,700" rel="stylesheet">
{{-- styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/accountant-auth.css') }}" rel="stylesheet">
</head>
<body>
    <div id="login pt-3">
        <div class="container pt-3">
            <div class="col-12 col-md-8 login-kobo ">
                <div class="container d-block p-3">
                    <p class="level float-right small">1/2</p><br>
                    <h5 class="title-text pb-3 text-center font-weight-bold">
                        Create Account
                    </h5>
                    <hr class="hr">
                    <form method="POST" action="">
                        @csrf
                        <div class="row text-muted">
                            <div class="col-12 col form-group required col-12 col-md-4">
                                <label for="name" class="label">First Name</label>
                                <input type="text" class="form-control" id="" placeholder="Yolu" required>
                            </div>
                            <div class="col-12 col form-group required col-12 col-md-4">
                                <label for="name" class="label">Last Name</label>
                                <input type="text" class="form-control" id="" placeholder="Bosunki" required>
                            </div>
                            <div class="col-12 col form-group required col-12 col-md-4">
                                <label for="email" class="label">Email</label>
                                <input type="email" class="form-control" id="" placeholder="syf@gmail.com" required>
                            </div>
                        </div>

                        <div class="row text-muted">
                            <div class="col-12 col form-group required col-12 col-md-6">
                                <label for="phone no" class="label">Phone Number 1</label>
                                <input type="number" class="form-control" id="" placeholder="090847432" required>
                            </div>
                            <div class="col-12 col form-group col-12 col-md-6">
                                <label for="phone no">Phone Number 2</label>
                                <input type="number" class="form-control" id="" placeholder="0816754883">
                            </div>
                        </div>

                        <div class="row text-muted">
                            <div class="col-12 col form-group required col-12 col-md-6">
                                <label for="password" class="label">Enter Password</label>
                                <input type="password" class="form-control" id="" placeholder="******" required>
                            </div>
                            <div class="col-12 col form-group required col-12 col-md-6">
                                <label for="Password" class="label">Confirm Password</label>
                                <input type="password" class="form-control" id="" placeholder="********" required>
                            </div>
                        </div>

                        <div class="form-check py-2">
                              <input type="checkbox" class="form-check-input" id="" required >
                              <label class="form-check-label" for="terms">By Checking this box, I agree to <a href="/" target="_blank"> Terms and Conditions</a> and <a href="/" target="_blank">Privacy Policy</a></label>
                        </div>

                        <div class="d-flex justify-content-center my-3">
                            <a href="{{ route('accountant.register')}}" class="btn btn-continue" >Continue <i class="fas fa-arrow-right fa-xs ml-2"></i></a>

                        </div>
                        <div class="d-flex justify-content-center my-3">
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
