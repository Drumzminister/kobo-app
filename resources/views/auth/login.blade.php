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
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">


</head>
<body>
    <div id="load"></div>
         <section id="particles"></section>

         @if (session('status'))
         <div class="alert alert-success">
             {{ session('status') }}
         </div>
         @endif
         @if (session('warning'))
         <div class="alert alert-warning">
             {{ session('warning') }}
         </div>
         @endif
         

        <div id="login pt-3">
            <div class="container pt-3">               
                <div class="col-md-6 login-kobo">
                    <div class=" p-3">
                        <div class="pb-2">
                            <img src="{{asset('img/logo.svg')}}" alt="logo" srcset="" class="img-fluid logo">
                        </div>

                            <h5 class="login-h2 pb-3 text-white">
                                Sign in to Kobo Accountant
                            </h5>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="email" name="email" class="form-control" id="email" aria-describedby="" placeholder="Email" required="" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="password" name="password" class="form-control" id=""  aria-describedby="" placeholder="Password" required="" value="{{ old('password') }}">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-white">
                                    <label>
                                        <input type="checkbox"  name="remember" class="text-white"> Remember me
                                    </label>
                                    <span class="forgot"><a href="#" class="login-forgot pull-right">Forgot Password?</a></span>
                                </div>
                                <button class="btn btn-loginn" type="submit"><span>Login</span></button>

                            </form>
                    </div>
                    <div class="register-link">
                        <p class="text-white pb-5">
                            Don't you have account?
                            <a href="/register">Sign Up Here</a>
                        </p>
                    </div>

                </div> 
            </div>
        </div>
    

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/particles.js')}}"></script>
<script src="{{asset('js/appp.js')}}"></script>


</body>
</html>


