<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/themes/semi-dark-layout.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- END: Page CSS-->

    @yield('style')

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-sticky footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <x-pageloader-comp />

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center navbar-light navbar-shadow p-0 fixed-top">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item mx-25">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                </li>
                @if (@$search && $search === true)
                    <li class="nav-item nav-search mx-25">
                        <a class="nav-link nav-link-search">
                            <i class="ficon" data-feather="search"></i>
                        </a>
                        <div class="search-input">
                            <div class="search-input-icon">
                                <i data-feather="search"></i>
                            </div>
                            <form action="" method="get">
                                @yield('search-form')
                                <input class="form-control input" type="text" name="cari"
                                    placeholder="Kata kunci pencarian..." tabindex="-1" data-search="search">
                            </form>
                            <div class="search-input-close">
                                <i data-feather="x"></i>
                            </div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown dropdown-user ms-25">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ @user('nama') }}</span>
                            <span class="user-status">{{ getRole() }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ @user('foto_profil_compress') }}" alt="avatar"
                                height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('profil-saya') }}">
                            <i class="me-50" data-feather="user"></i>
                            Profil Saya
                        </a>
                        <a class="dropdown-item" href="{{ route('ganti-sandi') }}">
                            <i class="me-50" data-feather="lock"></i>
                            Ganti Sandi
                        </a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="">
                            <i class="me-50" data-feather="settings"></i>
                            Pengaturan
                        </a> --}}
                        <a class="dropdown-item" href="#" onclick="logout('{{ route('auth.logout') }}');">
                            <i class="me-50" data-feather="power"></i>
                            Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ route('homepage') }}">
                        <span class="brand-logo">
                            <img src="{{ asset('web/logo/logo.png') }}" class="img-fluid logo-width"
                                alt="Brand Logo" />
                        </span>
                        <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
                            data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content mt-1">
            @include('templates.menu.admin_menu')
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title @if (@$bread) float-start @endif mb-0">
                                {{ $title }}
                            </h2>
                            @if (@$bread)
                                <div class="breadcrumb-wrapper">
                                    <x-bread-comp :data="$bread" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-flex justify-content-end">
                    <div class="mb-1 breadcrumb-right">
                        @yield('right-menu')
                    </div>
                </div>
            </div>
            <div class="content-body">
                @yield('container')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">
                Copyright &copy; {{ date('Y') }}
                <a class="ms-25" href="#" target="_blank">{{ env('APP_NAME') }}</a>.
                <span class="d-none d-sm-inline-block">
                    All rights Reserved
                </span>
            </span>
            <span class="float-md-end d-none d-md-block">
                Hand-crafted & Made with
                <i data-feather="heart"></i>
            </span>
        </p>
    </footer>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @yield('modal')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('vuexy/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{ asset('js/app.js') }}"></script>

    <x-toast-comp />
    <x-alert-comp />

    @yield('script')

</body>
<!-- END: Body-->

</html>
