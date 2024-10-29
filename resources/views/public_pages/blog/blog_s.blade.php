@extends(landingTemplate())
@section('seo')
    {!! SEO::generate() !!}
@endsection
@section('container')
    <div class="blog-pages-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 order-lg-2 order-2">
                    <div class="page-sidebar-content-wrapper page-sidebar-right small-mt__40 tablet-mt__40">

                        <!--=== Sidebar Widget Start ===-->
                        <div class="sidebar-widget search-post wow move-up">
                            <div class="widget-title">
                                <h4 class="sidebar-widget-title">Pencarian</h4>
                            </div>
                            <form action="{{ route('blog') }}" method="get">
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

                            <h4 class="sidebar-widget-title">Kategori</h4>

                            <ul>
                                @foreach ($categories as $item)
                                    <li>
                                        <a
                                            href="{{ route('blog.kategori', ['nama_kategori' => strtolower($item->nama_kategori)]) }}">
                                            {{ $item->nama_kategori }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- === Sidebar Widget End === -->

                        <!-- === Sidebar Widget Start === -->
                        <div class="sidebar-widget widget-tag wow move-up">
                            <h4 class="sidebar-widget-title">Tags</h4>
                            @foreach (explode(',', $blog->tag) as $tag)
                                <a href="{{ route('blog', ['cari' => $tag]) }}" class="ht-btn ht-btn-xs">
                                    {{ $tag }}
                                </a>
                            @endforeach

                        </div>
                        <!-- === Sidebar Widget End === -->
                    </div>
                </div>
                <div class="col-lg-8 order-lg-1 order-1">
                    <div class="main-blog-wrap">
                        <!--======= Single Blog Item Start ========-->
                        <div class="single-blog-item">
                            <!-- Post Feature Start -->
                            <div class="post-feature blog-thumbnail wow move-up">
                                <img class="img-fluid" src="{{ $blog->foto_thumbnail }}"
                                    style="width: 100% !important; height: 450px !important; object-fit: cover;">
                            </div>
                            <!-- Post Feature End -->

                            <!-- Post info Start -->
                            <div class="post-info lg-blog-post-info  wow move-up">
                                <div class="post-categories">
                                    <a
                                        href="{{ route('blog.kategori', ['nama_kategori' => strtolower($blog->joinKategori->nama_kategori)]) }}">
                                        {{ $blog->joinKategori->nama_kategori }}
                                    </a>
                                </div>

                                <h3 class="post-title">
                                    {{ $blog->judul }}
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
                                    {!! $blog->konten !!}

                                    <div class="entry-post-share-wrap  border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="entry-post-tags">
                                                    <div class="tagcloud-icon">
                                                        <i class="far fa-tags"></i>
                                                    </div>
                                                    <div class="tagcloud">
                                                        @foreach (explode(',', $blog->tag) as $tag)
                                                            <a href="{{ route('blog', ['cari' => $tag]) }}">
                                                                {{ $tag . (!$loop->last ? ',' : '') }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
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

                                    <div class="entry-author">
                                        <div class="author-info">
                                            <div class="author-avatar">
                                                <img src="{{ $blog->joinCreatedBy->foto_profil_compress }}"
                                                    style="width: 65px; height: 65px; object-fit: cover;">
                                            </div>
                                            <div class="author-description">
                                                <h6 class="author-name">
                                                    {{ $blog->joinCreatedBy->nama }}
                                                </h6>
                                                <div class="author-biographical-info">
                                                    Author
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
