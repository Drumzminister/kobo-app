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

{{-- styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">

{{-- jquery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

    <div id="load"></div>

    <section id="landing">
        <div class="landing-cover">

            <div class="container">
                <div class="landing-page pt-5 pb-5 ">
                    <div class="land-logo text-center">
                    <img src="{{asset('img/logo.svg')}}" alt="logo" srcset="" class="img-fluid logo">
                    </div>
                    <div class="land-header text-center pb-4 ">
                        <h1 class="land-h1">Introducing Kobo Accountant</h1>
                        <h5 class="land-h5">Easy Accounting wherever whenever</h5>

                    </div>
                    <div class="land-text text-center pt-2 pb-4">
                        <p>Koboaccountant is a simple platform where SMEs and Accountants can work together on their bookkeeping services, save money and time without compromising expertise.</p>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-4 col-12">
                            <a class="btn btn-started" href="#" role="button">Get Started</a>
                        </div>
                        <div class="col-md-1"></div>

                        <div class="col-md-1"></div>
                        <div class="col-md-4 col-12">
                                <a class="btn btn-login" href="/login" role="button"><span>Login</span></a>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

{{-- javascript --}}
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>
  
