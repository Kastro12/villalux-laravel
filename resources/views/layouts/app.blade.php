<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/create_reservation.js')}}"></script>
    <script src="{{asset('js/update_reservation.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ asset('fancybox/jquery.fancybox.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">



            @yield('content')

    </div>
</body>
</html>
