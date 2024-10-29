{{-- Address Nav Bar --}}
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ $template_tentang->alamat }}
                </small>
                <small class="me-3 text-light">
                    <i class="fas fa-phone-alt me-2"></i>
                    {{ $template_tentang->telepon_format }}
                </small>
                <small class="text-light">
                    <i class="fas fa-envelope-open me-2"></i>
                    {{ $template_tentang->email }}
                </small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $template_tentang->link_twitter }}">
                    <i class="fab fa-twitter fw-normal"></i>
                </a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $template_tentang->link_facebook }}">
                    <i class="fab fa-facebook-f fw-normal"></i>
                </a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $template_tentang->link_linkedin }}">
                    <i class="fab fa-linkedin-in fw-normal"></i>
                </a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                    href="{{ $template_tentang->link_instagram }}">
                    <i class="fab fa-instagram fw-normal"></i>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- .Address Nav Bar --}}

{{-- Menu Bar --}}
<div class="container-fluid position-relative p-0">

    <nav
        class="@if (!@$is_landing) text-dark shadow-sm @endif navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('homepage') }}" class="navbar-brand p-0">
            <img src="{{ getAlidataBanner() }}" alt="Logo" style="height: 80px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('homepage') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('homepage')) active @endif">
                    Home
                </a>
                <a href="{{ route('tentang') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('tentang')) active @endif">
                    Tentang
                </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if (request()->routeIs('produk*')) active @endif"
                        data-bs-toggle="dropdown">
                        Produk
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('homepage') }}#produk-teratas" class="dropdown-item">
                            Produk Teratas
                        </a>
                        <a href="{{ route('produk') }}"
                            class="dropdown-item @if (request()->routeIs('produk*')) active @endif">
                            Semua Produk
                        </a>
                    </div>
                </div>
                <a href="{{ route('blog') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('blog*')) active @endif">
                    Blog
                </a>
                <a href="{{ route('layanan') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('layanan')) active @endif">
                    Layanan
                </a>
                <a href="{{ route('testimoni') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('testimoni*')) active @endif">
                    Testimoni
                </a>
                <a href="{{ route('dokumentasi') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('dokumentasi')) active @endif">
                    Dokumentasi
                </a>
                <a href="{{ route('kontak') }}"
                    class="nav-item nav-link px-2 @if (request()->routeIs('kontak')) active @endif">
                    Kontak
                </a>
            </div>
            {{-- <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                    class="fas fa-search"></i></button> --}}
            {{-- <a href="#" class="btn btn-primary py-2 px-3 ms-3">Purchase Now</a> --}}
        </div>
    </nav>

    @if (!@$is_landing)
        <div class="py-0 py-md-5"></div>
    @endif
