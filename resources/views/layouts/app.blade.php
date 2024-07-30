<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}


    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/vit-gallery.css') }}">
    <link rel="shortcut icon" type="text/css" href="{{ asset('theme/client/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/bootstrap-select.min.css') }}">
    <script src="https://kit.fontawesome.com/24d8b82fa8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('theme/client/css/styles.css') }}">
</head>

<body>
    @include('layouts.header');
    @yield('content')
    @include('layouts.footer')

</body>

</html>
