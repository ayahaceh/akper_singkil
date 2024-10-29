@php
    $menus = App\Models\Menu\MenuModel::with('joinSubMenus')->get();
    $tentang = App\Models\TentangModel::first();
    $kategories = App\Models\KategoriModel::whereHas('joinBlog', function ($query) {
        $query->whereNotNull('id')->whereStatus(BLOG_STATUS_DITERBITKAN);
    })
        ->limit(5)
        ->get();
    $blog_populers = App\Models\BlogModel::where('status', BLOG_STATUS_DITERBITKAN)
        ->orderByDesc('jml_view')
        ->limit(5)
        ->get();
@endphp

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Located at :   mitech/index-appointment.html  21:04:48 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('seo')

    @if (!@$title_in_seo)
        <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    @endif

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('web/logo/logo.png') }}">

    <!-- CSS
        ============================================ -->

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->

    <link rel="stylesheet" href="{{ asset('mitech/assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mitech/assets/css/plugins/plugins.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('mitech/assets/css/style.css') }}">

    @yield('style')

</head>

<body>

    {{-- <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div> --}}

    <!--====================  header area ====================-->
    <div class="header-area header-sticky only-mobile-sticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header position-relative">
                        <!-- brand logo -->
                        <div class="top-logo py-2">
                            <div class="d-flex align-items-center">
                                <a href="/">
                                    <img src="{{ asset('web/logo/logo.png') }}" style="height: 75px; width: 75px;"
                                        class="img-fluid">
                                </a>
                                <div class="ps-3 d-none d-lg-block">
                                    <h4>{{ NAMA_INSITUSI_LENGKAP }}</h4>
                                    <p class="mb-0">{{ $tentang->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="header-right flexible-image-slider-wrap">

                            <div class="header-right-inner" id="hidden-icon-wrapper">
                                <!-- Header Search Form -->
                                <div class="header-search-form d-md-none d-block">
                                    <form action="#" class="search-form-top">
                                        <input class="search-field" type="text" placeholder="Search…">
                                        <button class="search-submit">
                                            <i class="search-btn-icon fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- Header Social Networks -->
                                <div class="header-social-networks style-icons">
                                    <div class="inner">
                                        @if ($tentang->link_facebook)
                                            <a class="social-link hint--black hint--bottom-left" aria-label="Facebook"
                                                href="{{ $tentang->link_facebook }}" data-hover="Facebook"
                                                target="_blank">
                                                <i class="social-icon fab fa-facebook-f"></i>
                                            </a>
                                        @endif

                                        @if ($tentang->link_twitter)
                                            <a class="social-link hint--black hint--bottom-left" aria-label="Twitter"
                                                href="{{ $tentang->link_twitter }}" data-hover="Twitter"
                                                target="_blank">
                                                <i class="social-icon fab fa-twitter"></i>
                                            </a>
                                        @endif

                                        @if ($tentang->link_instagram)
                                            <a class="social-link hint--black hint--bottom-left" aria-label="Instagram"
                                                href="{{ $tentang->link_instagram }}" data-hover="Instagram"
                                                target="_blank">
                                                <i class="social-icon fab fa-instagram"></i>
                                            </a>
                                        @endif

                                        @if ($tentang->link_linkedin)
                                            <a class=" social-link hint--black hint--bottom-left" aria-label="Linkedin"
                                                href="{{ $tentang->link_linkedin }}" data-hover="Linkedin"
                                                target="_blank">
                                                <i class="social-icon fab fa-linkedin"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- mobile menu -->
                            <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                <i></i>
                            </div>
                            <!-- hidden icons menu -->
                            <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                <a href="javascript:void(0)">
                                    <i class="far fa-ellipsis-h-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom-wrap bg-theme-default d-md-block d-none header-sticky">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-bottom-inner position-relative">
                            <div class="header-bottom-left-wrap">
                                <!-- navigation menu -->
                                <div class="header__navigation d-none d-xl-block">
                                    <nav class="navigation-menu navigation-menu--text_white">

                                        <ul>
                                            @foreach ($menus as $menu)
                                                @if ($menu->menu_id === null)
                                                    <li
                                                        class="@if (count($menu->joinSubMenus) > 0) has-children has-children--multilevel-submenu @endif ms-2 text-nowrap">
                                                        @php
                                                            $link = 'javascript:void(0);';

                                                            if ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN) {
                                                                $link = route('web.laman.show', ['slug_nama_menu' => $menu->get_slug . '-' . base64_encode($menu->id)]);
                                                            } elseif ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK) {
                                                                $link = $menu->redirect_link;
                                                            }
                                                        @endphp

                                                        <a href="{{ $link }}">
                                                            <span>{{ $menu->nama_menu }}</span>
                                                        </a>

                                                        @if (count($menu->joinSubMenus) > 0)
                                                            <ul class="submenu">
                                                                @foreach ($menu->joinSubMenus as $sub_menu)
                                                                    <li>
                                                                        @php
                                                                            $link = 'javascript:void(0);';

                                                                            if ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN) {
                                                                                $link = route('web.laman.show', ['slug_nama_menu' => $sub_menu->get_slug . '-' . base64_encode($sub_menu->id)]);
                                                                            } elseif ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK) {
                                                                                $link = $sub_menu->redirect_link;
                                                                            }
                                                                        @endphp

                                                                        <a href="{{ $link }}">
                                                                            <span>{{ $sub_menu->nama_menu }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="header-search-form ">
                                <form action="{{ route('blog') }}" method="get" class="search-form-top style-03">
                                    <input class="search-field" type="search" name="cari"
                                        value="{{ request('cari') }}" placeholder="Kata kunci...">
                                    <button class="search-submit">
                                        <i class="search-btn-icon fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--====================  End of header area  ====================-->

    <div id="main-wrapper">
        <div class="site-wrapper-reveal pb-5">
            @if (request()->routeIs('homepage'))
                <div class="flexible-image-slider-wrap">
                    <div class="swiper-container single-flexible__container">
                        <div class="swiper-wrapper">
                            @foreach ($blog_populers as $blog)
                                <div class="swiper-slide" style="position: relative; ">
                                    <!-- Overlay -->
                                    <div
                                        style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0, 0, 0, .3);">
                                    </div>

                                    <div class="single-flexible-slider">
                                        <img src="{{ $blog->foto_thumbnail }}" class="img-fluid"
                                            style="width: 100% !important; height: 75vh !important; object-fit: cover;">
                                    </div>

                                    <div style="position: absolute; bottom: 30px; left: 30px;">
                                        <a
                                            href="{{ route('blog.kategori', ['nama_kategori' => @$blog->joinKategori->nama_kategori ?? '-']) }}">
                                            <span
                                                class="badge bg-primary">{{ @$blog->joinKategori->nama_kategori ?? 'Uknown' }}</span>
                                        </a>
                                        <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"
                                            class="d-block">
                                            <h2 class="text-white">
                                                {{ $blog->judul }}
                                            </h2>
                                            <p class="text-white">
                                                {{ $blog->konten_resume }}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-nav-button swiper-button-next"><i class="nav-button-icon"></i></div>
                        <div class="swiper-nav-button swiper-button-prev"><i class="nav-button-icon"></i></div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-1 section-space--mt_50"></div>
                </div>

                <div class="feature-icon-wrapper section-space--ptb_100">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrap text-center section-space--mb_40">
                                    <h6 class="section-sub-title mb-20">Tentang Kami</h6>
                                    <h3 class="heading">
                                        {{ NAMA_INSITUSI_LENGKAP }}
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10 col-lg-8">
                                <p class="text-center">
                                    "{{ $tentang->tentang }}"
                                </p>
                            </div>
                        </div>

                        <div class="text-center">

                            <h6 class="section-sub-title mt-4 mb-2">Follow US</h6>

                            <ul class="list ht-social-networks solid-rounded-icon">

                                @if ($tentang->link_facebook)
                                    <li class="item">
                                        <a href="{{ $tentang->link_facebook }}" target="_blank"
                                            aria-label="Facebook"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-facebook-f link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_twitter)
                                    <li class="item">
                                        <a href="{{ $tentang->link_twitter }}" target="_blank" aria-label="Twitter"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-twitter link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_instagram)
                                    <li class="item">
                                        <a href="{{ $tentang->link_instagram }}" target="_blank"
                                            aria-label="Instagram"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-instagram link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_linkedin)
                                    <li class="item">
                                        <a href="{{ $tentang->link_linkedin }}" target="_blank"
                                            aria-label="Linkedin"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-linkedin link-icon"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @hasSection('title')
                <div class="breadcrumb-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb_box text-center">
                                    <h2 class="breadcrumb-title">
                                        @yield('title')
                                    </h2>
                                </div>

                                @if (@$search)
                                    <div class="row mt-3 d-flex justify-content-center">
                                        <div class="col-lg-6 col-md-8">
                                            <form action="" method="get">
                                                <div class="widget-search">
                                                    <input type="text" name="cari"
                                                        value="{{ request('cari') }}" placeholder="Kata kunci...">

                                                    <button type="submit" class="search-submit">
                                                        <span class="search-btn-icon fa fa-search"></span>
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="container mt-5">
                @yield('container')
            </div>

            @if (request()->routeIs('homepage'))
                <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-7">
                                <div class="cta-content md-text-center">
                                    <h3 class="heading text-white">
                                        Jelajahi <span class="text-color-secondary">Berita Terbaru</span> Kami
                                        Selengkapnya!
                                    </h3>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="cta-button-group--one text-center">
                                    <a href="{{ route('blog') }}" class="btn btn--white btn-one">
                                        Ayo, Pergi <i class="ms-1 button-icon far fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!--====================  footer area ====================-->
        <div class="footer-area-wrapper bg-gray mt-0">
            <div class="footer-area section-space--ptb_80">
                <div class="container">
                    <div class="row footer-widget-wrapper">
                        <div class="col-lg-6 footer-widget">
                            <div class="footer-widget__logo mb-30">
                                <img src="{{ asset('web/logo/logo.png') }}" style="height: 75px; width: 75px;"
                                    class="img-fluid" alt="">
                            </div>
                            <ul class="footer-widget__list">
                                <li>
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    {{ $tentang->alamat }}
                                </li>
                                @if ($tentang->email)
                                    <li>
                                        <a href="mailto:{{ $tentang->email }}" class="hover-style-link">
                                            <i class="fas fa-envelope me-1"></i>
                                            {{ $tentang->email }}
                                        </a>
                                    </li>
                                @endif
                                @if ($tentang->telepon)
                                    <li>
                                        <a href="tel:{{ $tentang->telepon }}"
                                            class="hover-style-link text-black font-weight--bold">
                                            <i class="fas fa-phone me-1"></i>
                                            {{ $tentang->telepon }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-4 footer-widget">
                            <h6 class="footer-widget__title mb-20">Berita Populer</h6>
                            <ul class="footer-widget__list">
                                @foreach ($blog_populers as $blog)
                                    <li>
                                        <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"
                                            class="hover-style-link">
                                            {{ $blog->judul }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-2 footer-widget">
                            <h6 class="footer-widget__title mb-20">Kategori</h6>
                            <ul class="footer-widget__list">
                                @foreach ($kategories as $kategori)
                                    <li>
                                        <a href="{{ route('blog.kategori', ['nama_kategori' => strtolower($kategori->nama_kategori)]) }}"
                                            class="hover-style-link">
                                            {{ $kategori->nama_kategori }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright-area section-space--pb_30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <span class="copyright-text">
                                &copy; 2023 {{ NAMA_INSITUSI_LENGKAP }}.
                                <a href="{{ route('homepage') }}">All Rights Reserved.</a>
                            </span>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <ul class="list ht-social-networks solid-rounded-icon">

                                @if ($tentang->link_facebook)
                                    <li class="item">
                                        <a href="{{ $tentang->link_facebook }}" target="_blank"
                                            aria-label="Facebook"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-facebook-f link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_twitter)
                                    <li class="item">
                                        <a href="{{ $tentang->link_twitter }}" target="_blank" aria-label="Twitter"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-twitter link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_instagram)
                                    <li class="item">
                                        <a href="{{ $tentang->link_instagram }}" target="_blank"
                                            aria-label="Instagram"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-instagram link-icon"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($tentang->link_linkedin)
                                    <li class="item">
                                        <a href="{{ $tentang->link_linkedin }}" target="_blank"
                                            aria-label="Linkedin"
                                            class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-linkedin link-icon"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->

    </div>
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fal fa-long-arrow-up"></i>
        <i class="arrow-bottom fal fa-long-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/logo-dark.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        @foreach ($menus as $menu)
                            @if ($menu->menu_id === null)
                                <li class="@if (count($menu->joinSubMenus) > 0) has-children @endif">
                                    @php
                                        $link = 'javascript:void(0);';

                                        if ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN) {
                                            $link = route('web.laman.show', ['slug_nama_menu' => $menu->get_slug . '-' . base64_encode($menu->id)]);
                                        } elseif ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK) {
                                            $link = $menu->redirect_link;
                                        }
                                    @endphp

                                    <a href="{{ $link }}">
                                        <span>{{ $menu->nama_menu }}</span>
                                    </a>

                                    @if (count($menu->joinSubMenus) > 0)
                                        <ul class="sub-menu">
                                            @foreach ($menu->joinSubMenus as $sub_menu)
                                                <li>
                                                    @php
                                                        $link = 'javascript:void(0);';

                                                        if ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN) {
                                                            $link = route('web.laman.show', ['slug_nama_menu' => $sub_menu->get_slug . '-' . base64_encode($sub_menu->id)]);
                                                        } elseif ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK) {
                                                            $link = $sub_menu->redirect_link;
                                                        }
                                                    @endphp

                                                    <a href="{{ $link }}">
                                                        <span>{{ $sub_menu->nama_menu }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->

    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="#">
                        <input type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->

    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('mitech/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- jQuery JS -->
    <script src="{{ asset('mitech/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('mitech/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('mitech/assets/js/vendor/bootstrap.min.js') }}"></script>

    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

    <script src="{{ asset('mitech/assets/js/plugins/plugins.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('mitech/assets/js/main.js') }}"></script>

    @yield('script')

</body>


<!-- Located at :   mitech/index-appointment.html  21:04:52 GMT -->

</html>
