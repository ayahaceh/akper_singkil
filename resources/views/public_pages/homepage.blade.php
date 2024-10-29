@extends(landingTemplate())
@section('seo')
    <meta name="description"
        content="Selamat datang di Akademi Keperawatan Yappkes Aceh Singkil! Kami menyediakan pendidikan keperawatan berkualitas tinggi dengan fokus pada keterampilan klinis dan pengetahuan medis terkini. Hubungi kami untuk memulai perjalanan Anda di dunia perawatan kesehatan.">
    <meta name="keywords"
        content="Akademi Keperawatan, Yappkes Aceh Singkil, Pendidikan Keperawatan, Keterampilan Klinis, Perawat, Kesehatan">
    <meta name="author" content="Akademi Keperawatan Yappkes Aceh Singkil">
@endsection
@section('container')
    <div class="blog-pages-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_40">
                    <h6 class="section-sub-title mb-20">Berita Terbaru</h6>
                    <h3 class="heading">
                        Tetap terhubung dengan berita dan informasi terbaru tentang berbagai aktivitas di
                        <span class="text-color-primary">{{ NAMA_INSITUSI_LENGKAP }}</span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                @foreach ($new_blogs as $blog)
                    <div class="col-lg-4 col-md-6 mb-30 wow move-up">
                        <div class="single-blog-item blog-grid">
                            <!-- Post Feature Start -->
                            <div class="post-feature blog-thumbnail">
                                <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" class="w-100">
                                    <img class="img-fluid" src="{{ $blog->foto_thumbnail_compress }}"
                                        style="width: 100% !important; height: 250px !important; object-fit: cover;">
                                </a>
                            </div>
                            <!-- Post Feature End -->

                            <!-- Post info Start -->
                            <div class="post-info lg-blog-post-info">
                                <div class="post-categories">
                                    <a
                                        href="{{ route('blog.kategori', ['nama_kategori' => strtolower($blog->joinKategori->nama_kategori)]) }}">
                                        {{ $blog->joinKategori->nama_kategori }}
                                    </a>
                                </div>

                                <div class="post-meta">
                                    <div class="post-date">
                                        <span class="far fa-calendar meta-icon"></span>
                                        {{ formatDateDokumentasi($blog->created_at) }}
                                    </div>
                                </div>

                                <h5 class="post-title font-weight--bold">
                                    <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                        {{ $blog->judul }}
                                    </a>
                                </h5>

                                <div class="post-excerpt mt-15">
                                    <p>
                                        {{ $blog->konten_resume }}
                                    </p>
                                </div>
                                <div class="btn-text">
                                    <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                        Baca Selengkapnya <i class="ms-25 button-icon far fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Post info End -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
