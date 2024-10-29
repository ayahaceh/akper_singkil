@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="blog-pages-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                @forelse ($dokumentasies as $data)
                    <div class="col-lg-4 col-md-6  mb-30 wow move-up">
                        <div class="single-blog-item blog-grid">
                            <div class="post-feature blog-thumbnail">

                                <div class="flexible-image-slider-wrap">
                                    <div class="swiper-container single-flexible__container">
                                        <div class="swiper-wrapper">
                                            @foreach ($data->joinDokumentasiFoto as $foto)
                                                <div class="swiper-slide" style="position: relative;">
                                                    <div class="single-flexible-slider">
                                                        <img src="{{ $foto->foto_gambar }}" class="img-fluid"
                                                            style="width: 100% !important; height: 350px; !important; object-fit: cover;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="swiper-nav-button swiper-button-next">
                                            <i class="nav-button-icon"></i>
                                        </div>
                                        <div class="swiper-nav-button swiper-button-prev">
                                            <i class="nav-button-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="post-info lg-blog-post-info">
                                <div class="post-meta">
                                    <div class="post-date">
                                        <span class="far fa-calendar meta-icon"></span>
                                        {{ formatDateDokumentasi($data->created_at) }}
                                    </div>
                                </div>

                                <h5 class="post-title font-weight--bold">
                                    {{ $data->nama_dokumentasi }}
                                </h5>

                                <div class="post-excerpt mt-15">
                                    <p>
                                        {{ $data->keterangan }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Data tidak ditemukan</p>
                @endforelse

            </div>

            <x-pagination-bs5-comp :data="$dokumentasies" />
        </div>
    </div>
@endsection
