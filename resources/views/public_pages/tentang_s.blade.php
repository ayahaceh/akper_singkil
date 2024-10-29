@extends(landingTemplate())
@section('container')
    {{-- Tentang --}}
    <div class="container-fluid py-5 wow fadeInUp" id="tentang-section" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title-1 position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Tentang Kami</h5>
                        <h1 class="mb-0">Alidata Technology Solutions</h1>
                    </div>
                    <p class="mb-4">
                        {{ $tentang->tentang }}
                    </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fas fa-check text-primary me-3"></i>Layanan Terintegrasi
                            </h5>
                            <h5 class="mb-3"><i class="fas fa-check text-primary me-3"></i>Tim yang Profesional
                            </h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fas fa-check text-primary me-3"></i>Layanan Pelanggan 24/7
                            </h5>
                            <h5 class="mb-3"><i class="fas fa-check text-primary me-3"></i>Harga Bersaing</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <h4><i class="fas fa-phone-alt text-white"></i></h4>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Konsultasi/Pertanyaan</h5>
                            <h4 class="text-primary mb-0">{{ $tentang->telepon_format }}</h4>
                        </div>
                    </div>
                    <a href="{{ $tentang->whatsapp_link }}" target="_blank"
                        class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">
                        <h4 class="text-white "> <i class="fab fa-whatsapp mr-2"></i> Kirim Pesan </h4>
                    </a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ asset('web/foto/landing/landing-1.jpg') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Tentang --}}

    {{-- Proses Kerja --}}
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Proses Kerja</h5>
                <h1 class="mb-0">Bagaimana cara kami bekerja?</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6 process-item wow slideInUp" data-wow-delay="0.2s">
                    <div class="position-relative d-flex flex-column align-items-center text-center">
                        <div class="process-icon bg-primary rounded d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-search fa-2x text-white"></i>
                        </div>
                        <h3>Research</h3>
                        <p class="mb-0">
                            Melakukan Penelitian dan Penelusuran Alur Proses Bisnis yang anda inginkan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 process-item wow slideInUp" data-wow-delay="0.4s">
                    <div class="position-relative d-flex flex-column align-items-center text-center">
                        <div class="process-icon bg-primary rounded d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-sitemap fa-2x text-white"></i>
                        </div>
                        <h3>Concept</h3>
                        <p class="mb-0">
                            Menyampaikan Konsep dan Opsi yang sesuai dengan kebutuhan, serta membuat kesepakatan konsep
                            kerja.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 process-item wow slideInUp" data-wow-delay="0.6s">
                    <div class="position-relative d-flex flex-column align-items-center text-center">
                        <div class="process-icon bg-primary rounded d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-code fa-2x text-white"></i>
                        </div>
                        <h3>Development</h3>
                        <p class="mb-0">
                            Melakukan Pembuatan dan Pemasangan Aplikasi serta Ujicoba produk/layanan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 process-item wow slideInUp" data-wow-delay="0.8s">
                    <div class="position-relative d-flex flex-column align-items-center text-center">
                        <div class="process-icon bg-primary rounded d-flex align-items-center justify-content-center mb-4">
                            <i class="fas fa-check fa-2x text-white"></i>
                        </div>
                        <h3>Finalization</h3>
                        <p class="mb-0">
                            Training untuk melatih Pegawai/karyawan anda dalam menggunakan produk/layanan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Proses Kerja --}}

    {{-- Tim --}}
    @if ($teams)
        <div class="container-fluid py-5 wow fadeInUp" id="tim-section" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Anggota Tim</h5>
                    <h1 class="mb-0">Staff Profesional Siap Membantu Bisnis Anda</h1>
                </div>
                <div class="row g-5">
                    @foreach ($teams as $tim)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="team-item bg-light rounded overflow-hidden">
                                <div class="team-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ $tim->foto_profil_compress }}" alt="">
                                    <div class="team-social">
                                        @if ($tim->link_twitter)
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded"
                                                href="{{ $tim->link_twitter }}" target="_blank">
                                                <i class="fab fa-twitter fw-normal"></i>
                                            </a>
                                        @endif
                                        @if ($tim->link_facebook)
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded"
                                                href="{{ $tim->link_facebook }}" target="_blank">
                                                <i class="fab fa-facebook-f fw-normal"></i>
                                            </a>
                                        @endif
                                        @if ($tim->link_instagram)
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded"
                                                href="{{ $tim->link_instagram }}" target="_blank">
                                                <i class="fab fa-instagram fw-normal"></i>
                                            </a>
                                        @endif
                                        @if ($tim->link_linkedin)
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded"
                                                href="{{ $tim->link_linkedin }}" target="_blank">
                                                <i class="fab fa-linkedin-in fw-normal"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h4 class="text-primary">{{ $tim->nama }}</h4>
                                    <p class="text-uppercase m-1"><b>{{ $tim->selaku }}</b></p>
                                    <p>{{ $tim->tentang }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    {{-- End Tim --}}
@endsection
