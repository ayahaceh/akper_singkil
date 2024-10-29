<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- <meta content="{{ env('APP_NAME') }}" name="keywords">
    <meta content="Alidata Technology" name="description"> --}}

    @yield('seo')

    @if (!@$title_in_seo)
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    @endif

    <link rel="icon" href="{{ asset('web/logo/alidata-nav-icon-o.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Rubik:wght@400;500;600;700&amp;display=swap">

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/startup/cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/startup/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/startup/lib/animate/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/startup/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/startup/lib/lightbox/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/startup/css/style.css') }}">

    @yield('style')

    <style>
        .text-dark.navbar .navbar-nav a {
            /* dark */
            color: #091E3E !important;
        }
    </style>
</head>

<body>

    @php
    $template_tentang = \App\Models\TentangModel::first();
    $template_blog = \App\Models\BlogModel::limit(6)
    ->latest()
    ->get();
    @endphp

    {{-- Loading Page --}}
    {{--<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>--}}
    {{-- End Loading Page --}}

    @include('public_pages.parts.header-1')

    {{-- Container Here --}}
    @yield('container')
    {{-- .Container Here --}}

    @include('public_pages.parts.footer-1')

    {{-- Icon Goto Upper --}}
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>
    {{-- .Icon Goto Upper --}}

    <script data-cfasync="false" src="{{ asset('assets/startup/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/startup/js/jquery.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript">
    </script>
    <script src="{{ asset('assets/startup/js/bootstrap.bundle.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/wow/wow.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript">
    </script>
    <script src="{{ asset('assets/startup/lib/easing/easing.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript">
    </script>
    <script src="{{ asset('assets/startup/lib/waypoints/waypoints.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/counterup/counterup.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/isotope/isotope.pkgd.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/owlcarousel/owl.carousel.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/lib/lightbox/js/lightbox.min.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/startup/js/main.js') }}" type="3f4280ae93371ddb0ff05dc4-text/javascript"></script>
    <script src="{{ asset('assets/startup/js/rocket-loader.min.js') }}" data-cf-settings="3f4280ae93371ddb0ff05dc4-|50" defer=""></script>

    @yield('script')

</body>

</html>