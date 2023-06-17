<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">

  <!-- site title -->
  <title>Aruk - Multipurpose Woocommerce Store</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="aruk - multipurpose ecommerce store, electronic shop, fashion store">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicons and shortcut icons -->
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- stylesheets -->
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.nice-number.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mean-menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

  @include('components.scrolltop')
  {{-- @include('components.autopop') --}}
  @include('components.header')
  @yield('content')
  @include('components.footer')
  @include('components.jscripts')

</body>

</html>







