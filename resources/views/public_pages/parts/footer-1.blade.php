{{-- Footer 1 --}}
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <a href="{{ route('homepage') }}" class="navbar-brand">
                        <img src="{{ getAlidataBannerWhite() }}" alt="Logo" style="height: 80px;">
                    </a>
                    <p class="mt-3 mb-4">
                        {{ $template_tentang->tentang }}
                    </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Berhubungan</h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">{{ $template_tentang->alamat }}</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">{{ $template_tentang->email }}</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">{{ $template_tentang->telepon_format }}</p>
                        </div>
                        <div class="section-title-1 section-title-sm position-relative pb-3 my-4">
                            <h3 class="text-light mb-0">Media Sosial</h3>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2" href="{{ $template_tentang->link_twitter }}">
                                <i class="fab fa-twitter fw-normal"></i>
                            </a>
                            <a class="btn btn-primary btn-square me-2" href="{{ $template_tentang->link_facebook }}">
                                <i class="fab fa-facebook-f fw-normal"></i>
                            </a>
                            <a class="btn btn-primary btn-square me-2" href="{{ $template_tentang->link_linkedin }}">
                                <i class="fab fa-linkedin-in fw-normal"></i>
                            </a>
                            <a class="btn btn-primary btn-square" href="{{ $template_tentang->link_instagram }}">
                                <i class="fab fa-instagram fw-normal"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Tautan Cepat</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="{{ route('homepage') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Home
                            </a>
                            <a class="text-light mb-2" href="{{ route('tentang') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Tentang
                            </a>
                            <a class="text-light mb-2" href="{{ route('produk') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Produk
                            </a>
                            <a class="text-light mb-2" href="{{ route('blog') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Blog
                            </a>
                            <a class="text-light mb-2" href="{{ route('layanan') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Layanan
                            </a>
                            <a class="text-light mb-2" href="{{ route('testimoni') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Testimoni
                            </a>
                            <a class="text-light mb-2" href="{{ route('dokumentasi') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Dokumentasi
                            </a>
                            <a class="text-light" href="{{ route('kontak') }}">
                                <i class="bi bi-arrow-right text-primary me-2"></i>
                                Kontak
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Subscribe</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-3" placeholder="Alamat email">
                                    <button class="btn btn-primary"><i class="fa fa-paper-plane px-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Footer 2 --}}
<div class="container-fluid text-white" style="background: #061429;">
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">
                        {{ $template_tentang->awal_berdiri->format('Y') . ' - ' . date('Y') }} &copy; <a
                            class="text-white border-bottom"
                            href="{{ route('homepage') }}">{{ env('APP_NAME') }}</a>.
                        All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
