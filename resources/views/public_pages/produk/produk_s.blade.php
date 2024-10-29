@extends(landingTemplate())
@section('style')
    <style>
        .produk-carousel .owl-nav {
            margin-top: -30px;
        }

    </style>
@endsection
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="owl-carousel project-carousel produk-carousel mb-4">
                            <div class="portfolio-item">
                                <div class="position-relative portfolio-box">
                                    <div class="portfolio-img rounded overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ $produk->foto_thumbnail }}"
                                            alt="Produk Thumbnail">
                                    </div>
                                    <div class="portfolio-btn mt-5">
                                        <a href="{{ $produk->foto_thumbnail }}" data-lightbox="portfolio">
                                            <i class="bi bi-eye display-1 text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @foreach ($produk->joinProdukGambar as $gambar)
                                <div class="portfolio-item">
                                    <div class="position-relative portfolio-box">
                                        <div class="portfolio-img rounded overflow-hidden">
                                            <img class="img-fluid w-100" src="{{ $gambar->foto_gambar }}"
                                                alt="Produk Gambar">
                                        </div>
                                        <div class="portfolio-btn mt-5">
                                            <a href="{{ $gambar->foto_gambar }}" data-lightbox="portfolio">
                                                <i class="bi bi-eye display-1 text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex mb-3">
                            <small class="me-3">
                                <i class="far fa-user text-primary me-2"></i>
                                {{ $produk->joinCreatedBy->nama }}
                            </small>
                            <small class="me-3">
                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                {{ formatDateProduk($produk->created_at) }}
                            </small>
                            <small class="me-3">
                                <i class="far fa-eye text-primary me-2"></i>
                                {{ $produk->jml_view ?? 0 }} Dilihat
                            </small>
                        </div>
                        <h1 class="mb-4">{{ $produk->nama_produk }}</h1>
                        <div style="text-align: justify;">
                            {!! $produk->keterangan_produk !!}
                        </div>
                    </div>

                    <div class="d-flex align-items-center border-bottom pb-4">
                        <img class="img-fluid" src="{{ $produk->joinCreatedBy->foto_profil }}"
                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 100%;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">{{ $produk->joinCreatedBy->nama }}</h4>
                            <small class="text-uppercase">Admin</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">
                                <h3 class="text-white mb-0">Informasi Produk</h3>
                            </li>
                            <li class="list-group-item">
                                <span class="text-primary">Nama Produk:</span>
                                {{ $produk->nama_produk }}
                            </li>
                            <li class="list-group-item">
                                <span class="text-primary">Live Demo:</span>
                                @if ($produk->link_demo)
                                    <a href="{{ $produk->link_demo }}" target="_blank">Klik Disini</a>
                                @else
                                    <i>tidak tersedia</i>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <span class="text-primary">Kategori:</span>
                                @foreach ($produk->joinProdukKategori as $produk_kategori)
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $produk_kategori->joinKategori->nama_kategori ?? '??' }}
                                    </span>
                                @endforeach
                            </li>
                        </ul>
                    </div>

                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Produk Populer</h3>
                        </div>
                        <div class="owl-carousel project-carousel">
                            @foreach ($produk_lainnya as $lainnya)
                                <div class="portfolio-item">
                                    <div class="position-relative portfolio-box">
                                        <div class="portfolio-img rounded overflow-hidden">
                                            <img class="img-fluid w-100" src="{{ $lainnya->foto_thumbnail_compress }}"
                                                alt="Produk Thumbnail">
                                        </div>
                                        <a class="portfolio-title border-bottom border-5 border-primary" href="#">
                                            <h4>{{ $lainnya->nama_produk }}</h4>
                                            <small class="text-body text-uppercase">
                                                <i class="fa fa-folder text-primary me-2"></i>
                                                {{ $lainnya->joinProdukKategori[0]->joinKategori->nama_kategori }}
                                            </small>
                                        </a>
                                        <div class="portfolio-btn">
                                            <a href="{{ $lainnya->foto_thumbnail }}" data-lightbox="portfolio"><i
                                                    class="bi bi-eye display-1 text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Informasi Kontak</h3>
                        </div>
                        <div class="bg-primary rounded p-4">
                            <div class="d-flex align-items-center mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">Telepon</p>
                                    <p class="text-white mb-0">{{ $tentang->telepon_format }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-brands fa-whatsapp text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">Whatsapp</p>
                                    <p class="text-white mb-0">
                                        <a href="{{ $tentang->whatsapp_link }}" class="text-white">Klik Disini</a>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">Alamat Email</p>
                                    <p class="text-white mb-0">{{ $tentang->email }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-location-dot text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">Lokasi</p>
                                    <p class="text-white mb-0">{{ $tentang->alamat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
