@extends(landingTemplate())
@section('container')
    <div class="blog-pages-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <div class="page-sidebar-content-wrapper page-sidebar-left  small-mt__40 tablet-mt__40">
                        <!-- === Sidebar Widget Start === -->
                        <div class="sidebar-widget widget-tag wow move-up">
                            <img class="img-fluid mb-4" src="{{ asset('web/logo/logo-pdf-sm.png') }}"
                                style="height: 100px !important;">

                            <div class="d-flex flex-column mb-3">
                                <h6>Berkas:</h6>
                                <div>
                                    <a href="{{ $jurnal->get_berkas_jurnal }}" class="hover-style-link">
                                        <i class="fas fa-download me-25"></i> Download
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column mb-3">
                                <h6>Authors:</h6>
                                <div>
                                    @foreach (explode(', ', $jurnal->pengarang) as $pengarang)
                                        <a href="{{ route('web.publik.koleksi.jurnal', ['koleksi_jurnal_id' => $jurnal->koleksi_jurnal_id, 'cari' => $pengarang]) }}"
                                            class="hover-style-link">
                                            {{ $pengarang . (!$loop->last ? ', ' : '') }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex flex-column mb-3">
                                <h6>Penerbit:</h6>
                                <div>
                                    {{ $jurnal->penerbit }}
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <h6>Tahun Terbit:</h6>
                                <div>
                                    {{ $jurnal->tahun_terbit }}
                                </div>
                            </div>

                        </div>
                        <!-- === Sidebar Widget End === -->
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="main-blog-wrap">
                        <!--======= Single Blog Item Start ========-->
                        <div class="single-blog-item">
                            <!-- Post info Start -->
                            <div class="post-info lg-blog-post-info  wow move-up">

                                <h3 class="post-title">
                                    {{ $jurnal->judul }}
                                </h3>

                                <div class="post-excerpt mt-15">
                                    <h6>Deskripsi:</h6>
                                    <p>
                                        {!! $jurnal->deskripsi !!}
                                    </p>

                                    <h6>Keyword:</h6>
                                    <p>
                                        @foreach (explode(', ', $jurnal->keyword) as $keyword)
                                            <a href="" class="hover-style-link">
                                                {{ $keyword . (!$loop->last ? ', ' : '') }}
                                            </a>
                                        @endforeach
                                    </p>

                                    <h6>Koleksi:</h6>
                                    <p>
                                        <a href="{{ route('web.publik.koleksi.jurnal', ['koleksi_jurnal_id' => $jurnal->koleksi_jurnal_id]) }}"
                                            class="hover-style-link">
                                            {{ $jurnal->joinKoleksiJurnal->nama_koleksi }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
