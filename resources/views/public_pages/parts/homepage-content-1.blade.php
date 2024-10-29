{{-- About Us --}}
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

{{-- Why Choose Us --}}
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Mengapa Memilih Kami</h5>
            <h1 class="mb-0">
                Berpengalaman lebih dari 8 tahun, kami terus bekerja keras
                memberikan pelayanan yang terbaik untuk Anda!
            </h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <h2><i class="fas fa-star text-white"></i></h2>
                        </div>
                        <h4>Kemudahan Penggunaan</h4>
                        <p class="mb-0">Kami menterjemahkan Aplikasi/sitem yang rumit
                            menjadi mudah digunakan dan mudah di implementasikan.
                            Karyawan anda tidak akan kesulitan dalam menggunakan produk dan layanan dari kami.
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-12 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <h2><i class="fas fa-thumbs-up text-white"></i></h2>
                        </div>
                        <h4>Gratis Update/Upgrade </h4>
                        <p class="mb-0">
                            Kami menyediakan update/upgrade gratis selama 2 tahun untuk Aplikasi/sistem kami,
                            guna menyesuaikan perkembangan teknologi dan kebutuhan Anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s"
                        src="{{ asset('web/foto/landing/landing-2.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-12 wow zoomIn" data-wow-delay="0.4s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <h2><i class="fas fa-user-tie text-white"></i></h2>
                        </div>
                        <h4>Gratis Training </h4>
                        <p class="mb-0">
                            Kami konsisten memberikan Training gratis atas setiap produk-produk
                            dan layanan yang dibeli dari kami.
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-12 wow zoomIn" data-wow-delay="0.8s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <h2><i class="fas fa-headset text-white"></i></h2>
                        </div>
                        <h4>24/7 Support</h4>
                        <p class="mb-0">
                            Layanan pelanggan 24 jam, 7 hari dalam seminggu.
                            Guna memastikan bahwa layanan kami akan selalu tersedia untuk Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Work Process --}}
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">PROSES KERJA</h5>
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

{{-- Our Service --}}
<div class="container-fluid py-5 wow fadeInUp" id="layanan-section" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Layanan</h5>
            <h1 class="mb-0">Solusi IT Kustom untuk Bisnis Anda yang Sukses</h1>
        </div>
        <div class="row g-5">
            @foreach ($services as $layanan)
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="{{ $layanan->logo_jasa }} text-white"></i>
                        </div>
                        <h4 class="mb-3">{{ $layanan->nama_jasa }}</h4>
                        <p class="m-0">
                            {{ $layanan->keterangan_jasa }}
                        </p>
                        {{-- <a class="btn btn-lg btn-primary rounded" href="#">
                            <i class="bi bi-arrow-right"></i>
                        </a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Produk & Layanan --}}
@if (count($produk_terlaris) > 0)
    <div class="container-fluid py-5 wow fadeInUp" id="produk-teratas" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Produk Teratas</h5>
                <h1 class="mb-0">Beberapa Produk & Layanan Paling Diminati</h1>
            </div>
            <div class="row g-5 mt-2 d-flex justify-content-center">
                @foreach ($produk_terlaris as $terlaris)
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first wow slideInUp" data-wow-delay="0.1s">
                        <div class="position-relative portfolio-box">
                            <div class="portfolio-img rounded overflow-hidden">
                                <img class="img-fluid w-100"
                                    src="{{ $terlaris->joinProduk->foto_thumbnail_compress }}" alt="Produk Thumbnail">
                            </div>
                            <a class="portfolio-title border-bottom border-5 border-primary"
                                href="{{ route('produk.detail', ['slug' => $terlaris->joinProduk->slug]) }}">
                                <h4>{{ $terlaris->joinProduk->nama_produk }}</h4>
                                <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>
                                    {{ $terlaris->joinProduk->joinProdukKategori[0]->joinKategori->nama_kategori }}
                                </small>
                            </a>
                            <div class="portfolio-btn">
                                <a href="{{ $terlaris->joinProduk->foto_thumbnail }}" data-lightbox="portfolio">
                                    <i class="bi bi-eye display-1 text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

{{-- Quote --}}
{{-- <div class="container-fluid py-5 wow fadeInUp" id="kontak-section" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title-1 position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Demo</h5>
                    <h1 class="mb-0">Butuh Demo atau informasi lebih lanjut? Jangan ragu untuk menghubungi
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
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">+012 345 6789</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-12">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 2</option>
                                    <option value="3">Service 3</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- Latest Blog --}}
@if (count($blog_terbaru) > 0)
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Blog Terbaru</h5>
                <h1 class="mb-0">Baca Artikel Terbaru dari Postingan Blog Kami</h1>
            </div>
            <div class="row g-5">
                @foreach ($blog_terbaru as $blog)
                    <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ $blog->foto_thumbnail_compress }}"
                                    alt="Thumbnail">
                                <span
                                    class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">
                                    {{ $blog->joinKategori->nama_kategori }}
                                </span>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3">
                                        <i class="far fa-user text-primary me-2"></i>
                                        {{ $blog->joinCreatedBy->nama }}
                                    </small>
                                    <small>
                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                        {{ formatDateBlog($blog->created_at) }}
                                    </small>
                                </div>
                                <h4 class="mb-3">{{ $blog->judul }}</h4>
                                <p>
                                    {{ Illuminate\Support\Str::limit($blog->konten_resume, 155) }}
                                </p>
                                <a class="text-uppercase"
                                    href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

{{-- Testimoni --}}
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

{{-- Partner --}}
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Partner</h5>
            <h1 class="mb-0">Kami Telah Berpartisipasi di Beberapa Perusahaan</h1>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($partners as $partner)
                <div class="col-md-3 my-4">
                    <img class="img-fluid" src="{{ $partner->foto_logo }}" style="height: 80px;">
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Berkolaborasi --}}
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Kolaborasi</h5>
            <h1 class="mb-0">Kami Telah Bekerja Sama dengan Beberapa Pemerintah Daerah</h1>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($kolaborasies as $kolaborasi)
                <div class="col-md-3 my-4 text-center">
                    <img class="img-fluid" src="{{ $kolaborasi->foto_logo }}" style="height: 80px;">
                    <h5 class="mt-3">{{ $kolaborasi->nama }}</h5>
                </div>
            @endforeach
        </div>
    </div>
</div>
