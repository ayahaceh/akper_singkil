@extends(landingTemplate())
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimoni</h5>
                <h1 class="mb-0">Apa Kata Klien Kami Tentang Layanan Digital Kami</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                @foreach ($testimonies as $testi)
                    <div class="testimonial-item bg-light my-4">
                        <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                            <img class="img-fluid rounded" src="{{ $testi->foto_profil }}"
                                style="width: 60px; height: 60px;">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">{{ $testi->nama }}</h4>
                                <small class="text-uppercase">{{ $testi->profesi }}</small>
                            </div>
                        </div>
                        <div class="pt-4 pb-5 px-5">
                            {{ $testi->pesan }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
