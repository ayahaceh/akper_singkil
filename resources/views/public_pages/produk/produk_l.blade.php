@extends(landingTemplate())
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Proyek Kami</h5>
                <h1 class="mb-0">Proyek Selesai untuk Klien Kami yang Bahagia</h1>
            </div>
            {{-- <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn btn-outline-primary py-2 px-4 active">
                            <i class="fa fa-star me-2"></i>
                            Semua
                        </li>
                        <li class="btn btn-outline-primary py-2 px-4">
                            <i class="fa fa-laptop-code me-2"></i>
                            Design
                        </li>
                        <li class="btn btn-outline-primary py-2 px-4">
                            <i class="fa fa-mobile-alt me-2"></i>
                            Development
                        </li>
                    </ul>
                </div>
            </div> --}}
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-4">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" name="produk_keyword" class="form-control p-3"
                                    placeholder="Pencarian produk..." value="{{ request('produk_keyword') }}">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row g-5 portfolio-container">
                @forelse ($products as $produk)
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first wow slideInUp" data-wow-delay="0.1s">
                        <div class="position-relative portfolio-box">
                            <div class="portfolio-img rounded overflow-hidden">
                                <img class="img-fluid w-100" src="{{ $produk->foto_thumbnail_compress }}"
                                    alt="Produk Thumbnail">
                            </div>
                            <a class="portfolio-title border-bottom border-5 border-primary"
                                href="{{ route('produk.detail', ['slug' => $produk->slug]) }}">
                                <h4>{{ $produk->nama_produk }}</h4>
                                <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>
                                    {{ $produk->joinProdukKategori[0]->joinKategori->nama_kategori }}
                                </small>
                            </a>
                            <div class="portfolio-btn">
                                <a href="{{ $produk->foto_thumbnail }}" data-lightbox="portfolio">
                                    <i class="bi bi-eye display-1 text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Produk tidak ditemukan</p>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                <x-pagination-startup-comp :data="$products" />
            </div>
        </div>
    </div>
@endsection
