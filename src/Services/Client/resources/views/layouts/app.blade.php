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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-size.css')}}">
</head>
<body>
<!-- Header -->
@include('layouts.header')
@yield('other_styles')
<!-- include main content -->
<main id="app">
    @yield('content')
</main>

<!-- //Footer -->
@include('layouts.footer')


{{-- javascript --}}

@yield('other_js')
<script src="{{asset('js/app.js')}}"></script>
{{-- chart js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.js"></script>
<script src="{{asset('js/bundle.js')}}"></script>
<script src="{{asset('js/jquery.circliful.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/appp.js')}}"></script>
<!-- Date Picker CDN -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script>

</body>
</html>

