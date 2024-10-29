@extends(landingTemplate())
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Layanan Kami</h5>
                <h1 class="mb-0">Solusi IT Kustom untuk Bisnis Anda yang Sukses</h1>
            </div>
            <div class="row g-5 d-flex justify-content-center">
                @foreach ($services as $layanan)
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service3-item bg-light rounded">
                            <div class="position-relative d-flex p-5">
                                <div class="service-icon flex-shrink-0">
                                    <i class="{{ $layanan->logo_jasa }} text-white"></i>
                                </div>
                                <div class="ps-4">
                                    <h4 class="mb-3">{{ $layanan->nama_jasa }}</h4>
                                    <p>
                                        {{ $layanan->keterangan_jasa }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
