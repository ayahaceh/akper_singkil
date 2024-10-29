<!DOCTYPE html>
<!--
Website Name: Alidata
Author: Alidata Team
http://www.alidata.co.id/
Contact: cs@alidata.co.id

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="author" content="{{ env('APP_NAME') }}">
    <x-meta-comp />

    <title>{{ @$title }} | {{ env('APP_NAME') }}</title>

    <link
        href="{{ asset('vuexy/fonts.googleapis.com/css219a5.css?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600') }}"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/css/themes/semi-dark-layout.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">

    <x-pageloader-comp />

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        @yield('container')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('vuexy/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{ asset('js/app.js') }}"></script>

    <x-toast-comp />

</body>
<!-- END: Body-->

</html>
