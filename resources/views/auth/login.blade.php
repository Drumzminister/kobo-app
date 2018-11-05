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
         

           <div id="login pt-5">
            <div class="container pt-5">               
                <div class="col-md-6 login-kobo">
                    <div class=" p-3">
                        <div class="pb-4">
                            <img src="{{asset('img/logo.svg')}}" alt="logo" srcset="" class="img-fluid logo">
                        </div>

                            <h5 class="login-h2 pb-3 text-white">
                                Sign in to Kobo Accountant
                            </h5>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="email" aria-describedby="" placeholder="Email or Username" required="">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="password" class="form-control" id=""  aria-describedby="" placeholder="Password" required="">
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
                                    <spa class="forgot"><a href="#" class="login-forgot pull-right">Forgot Password?</a></spa>
                                </div>
                                <a class="btn btn-loginn" href="/login" role="button"><span>Login</span></a>

                            </form>
                    </div>
                    <div class="register-link">
                        <p class="text-white pb-3">
                            Don't you have account?
                            <a href="#">Sign Up Here</a>
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


{{-- @extends('layouts.app')

@section('content')

                </div>
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
                    
                 
            </div>
        </div>
    </div>
</div>
 <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                             <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                       
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                </div>
                                                               <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"> {{ __('Login') }}</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection --}}

