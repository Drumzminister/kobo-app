<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Kobo accountant</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Description" content="Accounting site, Accounting App ">
  <meta content="koboaccountant, accounting, kobo" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  
  <!-- Favicons -->
  <link href="https://res.cloudinary.com/syfon/image/upload/v1536857508/favicon.png" rel="icon">

{{-- font-awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- intro js --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
{{-- styles --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
<link href="{{ asset('css/autocomplete.css') }}" rel="stylesheet">






{{-- jquery --}}
<script src="js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>
<body>

    <div id="load"></div>
     <!-- Header -->
     @include('layouts.header')
        
     <!-- include main content -->
     <main>
             @yield('content')
      </main>

     <!-- //Footer -->
    @include('layouts.footer')
</section>



{{-- javascript --}}
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/particles.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/datepicker.js')}}"></script>
<script src="{{asset('js/rater.js')}}"></script>


 {{-- chart js --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.js"></script>
 <script src="{{asset('js/bundle.js')}}"></script>
 <script src="{{asset('js/jquery.circliful.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/appp.js')}}"></script>



 <script>


var introguide = introJs();


// and check for it when deciding whether to start.
window.addEventListener('load', function () {
    var doneTour = localStorage.getItem('EventTour') === 'Completed';
    if (doneTour) {
        return;
    }
    else {
        introguide.start()

        introguide.oncomplete(function () {
            localStorage.setItem('EventTour', 'Completed');
        });

        introguide.onexit(function () {
            localStorage.setItem('EventTour', 'Completed');
        });
    }
});

</script>
    
    </script>
 
</body>
</html>
