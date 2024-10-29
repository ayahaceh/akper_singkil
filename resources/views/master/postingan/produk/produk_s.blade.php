@extends(adminTemplate())
@section('style')
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/plugins/extensions/ext-component-swiper.min.css') }}">
@endsection
@section('right-menu')
    <div class="dropdown">
        <button type="button" class="btn btn-flat-primary me-25" onclick="history.back(-1)">
            <i data-feather="arrow-left" class="me-25"></i>
            Kembali
        </button>
        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i data-feather="more-vertical"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="{{ route('postingan.produkk.edit', ['id' => $data->id]) }}">
                <i class="me-1" data-feather="edit"></i>
                <span class="align-middle">Ubah</span>
            </a>
            <a class="dropdown-item" href="{{ route('postingan.produk.step2-create', ['id' => $data->id]) }}?kelola=true">
                <i class="me-1" data-feather="image"></i>
                <span class="align-middle">Kelola Gambar</span>
            </a>
            <a class="dropdown-item" href="#"
                onclick="confirmDeleteProduk('{{ route('postingan.produk.delete', ['id' => $data->id]) }}')">
                <i class="me-1" data-feather="trash"></i>
                <span class="align-middle">Hapus Produk</span>
            </a>
        </div>
    </div>
@endsection
@section('container')
    <div class="card">
        <img src="{{ $data->foto_thumbnail }}" class="img-fluid card-img-top img-md-cover" alt="Produk Detail Pic" />
        <div class="card-body">
            <h4 class="card-title">{{ $data->nama_produk }}</h4>
            <div class="d-flex">
                <div class="avatar me-50">
                    <img src="{{ $data->joinCreatedBy->foto_profil_compress }}" alt="Avatar" width="24" height="24" />
                </div>
                <div class="author-info">
                    <small class="text-muted me-25">by</small>
                    <small><a href="#" class="text-body">{{ $data->joinCreatedBy->nama }}</a></small>
                    <span class="text-muted ms-50 me-25">|</span>
                    <small class="text-muted">{{ formatDateBlog($data->created_at) }}</small>
                </div>
            </div>
            <div class="my-1 py-25">
                @foreach ($data->joinProdukKategori as $produkKategori)
                    <span class="badge badge-glow bg-primary mb-25">
                        {{ $produkKategori->joinKategori->nama_kategori ?? '??' }}
                    </span>
                @endforeach
            </div>
            {!! $data->keterangan_produk !!}
            <div class="mt-4">
                <h4 class="card-title text-primary">Gambar/Screenshot Produk</h4>
                @if (count($data->joinProdukGambar) > 0)
                    <div class="row">
                        <div class="col-12 col-xxl-8">
                            <div class="swiper-gallery swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    @foreach ($data->joinProdukGambar as $gambar)
                                        <div class="swiper-slide">
                                            <img class="img-fluid d-flex align-items-center"
                                                src="{{ $gambar->foto_gambar }}" alt="banner" />
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper mt-25">
                                    @foreach ($data->joinProdukGambar as $gambar)
                                        <div class="swiper-slide">
                                            <img class="img-fluid" src="{{ $gambar->foto_gambar_compress }}"
                                                alt="banner" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Tidak ada gambar yang diupload</p>
                @endif
            </div>
            <hr class="my-2" />
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center me-1">
                        <a href="#" class="me-50">
                            <i data-feather="eye" class="font-medium-5 text-body align-middle"></i>
                        </a>
                        <a href="#">
                            <div class="text-body align-middle">{{ $data->jml_view ?? 0 }}</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vuexy/app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/js/scripts/extensions/ext-component-swiper.min.js') }}"></script>
    <script>
        function confirmDeleteProduk(route) {
            confirm('default', 'Apakah anda yakin ingin menghapus produk ini?', function() {
                ajaxDelete(route, "{{ csrf_token() }}", "{{ route('postingan.produkk.index') }}");
            }, 'Ya, Hapus');
        }
    </script>
@endsection
