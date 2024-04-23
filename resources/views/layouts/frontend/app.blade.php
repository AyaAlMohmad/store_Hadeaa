<!DOCTYPE html>
<html>

<head>
    <title> هديتي </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A affiliate store contains many categories of products for sale.">
    <meta name="author" content="Eng. Aya Almohamad, Software Engineer and Web developer ">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/22.jpg') }}">
    <!-- Plugins CSS Links -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owlcarousel/assets/owl.theme.default.css') }}">

    <!-- Custom CSS Links -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/profile.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/product.css')}}">
  {{-- <!-- Main Templet Css File --> --}}
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/contact/master.css')}}">
  <!-- Render All Elements Normally -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/contact/normalize.css')}}">
  <!-- Font Awesome Library -->
  {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/contact/all.min.css')}}"> --}}
  
</head>

<body class="rtl">
    <!-- Header Page Start -->
    <header class="page-header">
     @include('layouts.frontend.include.header')
        <!-- ---- Navbar Start ---- -->
        @include('layouts.frontend.include.nevbar')
      <!-- ./navbar -->
    </header>
    <!-- Main Page Start -->
    <main>
        @yield('content')
    </main>
    <!-- Footer Page Start -->
   @include('layouts.frontend.include.footer')
    <!-- Plugins JS Links -->
    <script src="{{ asset('frontend/assets/plugins/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/owlcarousel/owl.carousel.js') }}"></script>
    <!-- <script src="assets/plugins/slick/slick.js"></script> -->
    <!-- Custom JS Links -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
</body>

</html>
