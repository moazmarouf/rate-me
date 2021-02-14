<!DOCTYPE html>
<html lang="en">
<!-- start head -->
@include('site.includes.head')
<!-- End head -->
@include('site.includes.validation')

<body>

<!-- start header -->
@include('site.includes.header')
<!-- end header -->
<div class="home-page">
    <!-- start sidebar -->

@include('site.includes.sidebar')
<!-- start sidebar -->

    @yield('content')
</div>
<!-- notification -->
@include('site.includes.notifications')
<!--end  notification -->

@include('site.includes.footer')

