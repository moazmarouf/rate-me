<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{URL::to('Site/img/logo.png')}}"/>
    <link rel="stylesheet" href="{{URL::to('Site/css/font-awesome-5all.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('Site/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('Site/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('Site/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('Site/css/style.css')}}"/>
</head>
@include('partials.validation')

<body class="body">
<!-- Start Loader-->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- End Loader-->
<!-- Start Body Image-->
<!-- End Body Image-->
<!-- Start Top Header-->
<header class="header">
    <img class="logo" src="{{asset('Site/img/logo.png')}}"/>
</header>
<!-- Start validations -->
<!-- End /validations -->
@yield('content')
<!-- End Header Content-->
<!-- Start Body-->

<!-- End Body-->
<!-- Start Footer-->
<!-- End Footer-->
<!-- Start Fixed Footer-->
<!-- End Fixed Footer-->
</body>
<script src="{{asset('Site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('Site/js/popper.min.js')}}"></script>
<script src="{{asset('Site/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
<script src="{{asset('Site/js/scripts.js')}}"></script>
@yield('scripts')
</html>
