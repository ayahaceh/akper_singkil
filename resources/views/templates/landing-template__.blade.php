<!DOCTYPE html>
<html lang="en">

<!-- Located at :  startup/index-1.html  14:23:10 GMT -->

<head>
    <meta charset="utf-8">
    <title>Alidata Technology - Partner Inovasi Teknologi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Alidata Technology" name="keywords">
    <meta content="Alidata Technology" name="description">
    <link rel="icon" href="{{ asset('web/logo/alidata-nav-icon-o.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    {{-- Font Awesome 5.10.0 --}}
    <link href="{{ asset('assets/startup/css/all.min.css') }}" rel="stylesheet">
    {{-- Bootstrap Icon 1.8.2 --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/startup/css/bootstrap-icons.css') }}"> --}}
    <link href="{{ asset('assets/startup/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/startup/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/startup/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/startup/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/startup/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    {{-- Container Here --}}
    @yield('container')
    {{-- .Container Here --}}


    {{-- Icon Goto Upper --}}
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top">
        <i class="fas fa-arrow-up"></i>
        <!-- <i class="bi bi-arrow-up"></i> -->
    </a>
    {{-- .Icon Goto Upper --}}

    {{-- <script data-cfasync="false" src="{{ asset('assets/startup/js/email-decode.min.js') }}"></script> --}}
    <script src="{{ asset('assets/startup/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/startup/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/startup/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/startup/js/main.js') }}"></script>
    <script src="{{ asset('assets/startup/js/rocket-loader.min.js') }}"></script>

</body>

<!-- Located at :  startup/index-1.html  14:23:39 GMT -->

</html>