@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="blog-pages-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="page-sidebar-content-wrapper page-sidebar-left  small-mt__40 tablet-mt__40">

                        <!--=== Sidebar Widget Start ===-->
                        <div class="sidebar-widget search-post wow move-up">
                            <div class="widget-title">
                                <h4 class="sidebar-widget-title">Pencarian</h4>
                            </div>
                            <form action="" method="get">
                                <div class="widget-search">
                                    <input type="text" name="cari" value="{{ request('cari') }}"
                                        placeholder="Kata kunci...">

                                    <button type="submit" class="search-submit">
                                        <span class="search-btn-icon fa fa-search"></span>
                                    </button>

                                </div>
                            </form>
                        </div>
                        <!--=== Sidebar Widget End ===-->


                        <!-- === Sidebar Widget Start === -->
                        <div class="sidebar-widget widget-blog-recent-post wow move-up">

                            <h4 class="sidebar-widget-title">Semua Kategori</h4>

                            <ul>
                                @foreach ($categories as $kategori)
                                    <li>
                                        <a
                                            href="{{ route('blog.kategori', ['nama_kategori' => strtolower($kategori->nama_kategori)]) }}">
                                            {{ $kategori->nama_kategori }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- === Sidebar Widget End === -->


                        <!-- === Sidebar Widget Start === -->
                        <div class="sidebar-widget widget-blog-recent-post wow move-up">

                            <h4 class="sidebar-widget-title">Postingan Terbaru</h4>

                            <ul>
                                @foreach ($new_blogs as $new_blog)
                                    <li>
                                        <a href="{{ route('blog.detail', ['slug' => $new_blog->slug]) }}">
                                            {{ $new_blog->judul }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- === Sidebar Widget End === -->

                    </div>
                </div>

                <div class="col-lg-8 order-lg-2 order-1">
                    <div class="main-blog-wrap">
                        @forelse ($blogs as $blog)
                            <div class="single-blog-item lg-blog-item border-bottom wow move-up">
                                <div class="post-feature blog-thumbnail">
                                    <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" class="w-100">
                                        <img class="img-fluid" src="{{ $blog->foto_thumbnail_compress }}"
                                            style="width: 100% !important; height: 450px !important; object-fit: cover;">
                                    </a>
                                </div>

                                <div class="post-info lg-blog-post-info">
                                    <div class="post-categories">
                                        <a
                                            href="{{ route('blog.kategori', ['nama_kategori' => strtolower($blog->joinKategori->nama_kategori)]) }}">
                                            {{ $blog->joinKategori->nama_kategori }}
                                        </a>
                                    </div>

                                    <h3 class="post-title">
                                        <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">
                                            {{ $blog->judul }}
                                        </a>
                                    </h3>

                                    <div class="post-meta mt-20">
                                        <div class="post-author">
                                            <a href="javascript:void(0);">
                                                <img class="img-fluid avatar-96"
                                                    src="{{ $blog->joinCreatedBy->foto_profil_compress }}">
                                                {{ $blog->joinCreatedBy->nama }}
                                            </a>
                                        </div>
                                        <div class="post-date">
                                            <span class="far fa-calendar meta-icon"></span>
                                            {{ formatDateDokumentasi($blog->created_at) }}
                                        </div>
                                        <div class="post-view">
                                            <span class="meta-icon far fa-eye"></span>
                                            {{ $blog->jml_view }} Ditampilkan
                                        </div>
                                    </div>

                                    <div class="post-excerpt mt-15">
                                        <p>
                                            {{ $blog->konten_resume }}
                                        </p>
                                    </div>

                                    <div class="read-post-share-wrap  mt-20">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="post-read-more">
                                                    <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}"
                                                        class="ht-btn ht-btn-md">
                                                        Baca Selengkapnya
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="entry-post-share">
                                                    <div class="share-label">
                                                        Share this post
                                                    </div>
                                                    <div class="share-media">
                                                        <span class="share-icon far fa-share-alt"></span>

                                                        <div class="share-list">
                                                            <a class="hint--bounce hint--top hint--primary twitter"
                                                                target="_blank" aria-label="Twitter" href="#">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                            <a class="hint--bounce hint--top hint--primary facebook"
                                                                target="_blank" aria-label="Facebook" href="#">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                            <a class="hint--bounce hint--top hint--primary linkedin"
                                                                target="_blank" aria-label="Linkedin" href="#">
                                                                <i class="fab fa-linkedin"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada postingan</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
