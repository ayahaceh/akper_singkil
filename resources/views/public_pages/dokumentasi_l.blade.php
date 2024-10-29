@extends(landingTemplate())
@section('style')
    <style>
        .dok-carousel .owl-nav {
            margin-top: -30px;
        }

    </style>
@endsection
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Dokumentasi</h5>
                <h1 class="mb-0">Informasi terkait kegiatan kami</h1>
            </div>
            <div class="row g-5 d-flex justify-content-center">
                <div class="col-lg-8 wow zoomIn" data-wow-delay="0.3s">
                    @foreach ($dokumentasi as $dok)
                        <div class="mb-5 border-bottom pb-4">
                            <div class="owl-carousel project-carousel dok-carousel mb-4">
                                @foreach ($dok->joinDokumentasiFoto as $foto)
                                    <div class="portfolio-item">
                                        <div class="position-relative portfolio-box">
                                            <div class="portfolio-img rounded overflow-hidden">
                                                <img class="img-fluid w-100" src="{{ $foto->foto_gambar }}" alt="Gambar">
                                            </div>
                                            <div class="portfolio-btn mt-5">
                                                <a href="{{ $foto->foto_gambar }}" data-lightbox="portfolio">
                                                    <i class="bi bi-eye display-1 text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <h1 class="mb-4">{{ $dok->nama_dokumentasi }}</h1>
                            <p>{{ $dok->keterangan }}</p>
                            <small>{{ formatDateDokumentasi($dok->created_at) }}</small>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        <x-pagination-startup-comp :data="$dokumentasi" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
