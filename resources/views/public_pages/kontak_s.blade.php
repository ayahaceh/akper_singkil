@extends(landingTemplate())
@section('container')
    {{-- Kirim ke Email --}}
    <div class="container-fluid py-5 wow fadeInUp" id="kontak-section" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title-1 position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Diskusi</h5>
                        <h1 class="mb-0">Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi
                            kami</h1>
                    </div>
                    <div class="row gx-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fas fa-reply text-primary me-3"></i>Respon chat/pesan
                                dalam 1-2 jam</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fas fa-phone-alt text-primary me-3"></i>Layanan Telepon
                                24 Jam</h5>
                        </div>
                    </div>
                    <p class="mb-4">
                        Anda juga dapat membuat jadwal pertemuan baik secara offline maupun online (zoom meeting/Video
                        Conference)

                    </p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Telepon untuk mengajukan pertanyaan</h5>
                            <h4 class="text-primary mb-0">{{ $tentang->telepon_format }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form action="{{ route('kirim-pesan') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                @if (session('success'))
                                    <div class="col-xl-12">
                                        <div class="alert alert-primary mb-2">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-12">
                                    <input type="text" name="name" class="form-control bg-light border-0" placeholder="Nama"
                                        style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="email" name="mail" class="form-control bg-light border-0"
                                        placeholder="Alamat Email" style="height: 55px;" required>
                                </div>
                                <div class="col-xl-12">
                                    <input type="text" name="wa" class="form-control bg-light border-0"
                                        placeholder="Whatsapp: 628" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="comment" class="form-control bg-light border-0" rows="3" placeholder="Pesan" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Kirim ke Email --}}
@endsection
@section('script')
    <script>
        $('form').submit(function() {
            $('button[type="submit"]').attr('disabled', 'disabled');
        });
    </script>
@endsection
