<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/gallery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/vit-gallery.css') }}">
    <link rel="shortcut icon" type="text/css" href="{{ asset('theme/client/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/client/css/bootstrap-select.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="../../../../cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" /> --}}
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="{{ asset('theme/client/css/styles.css') }}">
</head>
<body>
    @include('client.layouts.header');
    @yield('content')
    @include('client.layouts.footer')
</body>
</html>