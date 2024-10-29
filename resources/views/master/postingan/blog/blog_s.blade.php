@extends(adminTemplate())
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
            <a class="dropdown-item" href="{{ route('postingan.blogg.edit', ['id' => $data->id]) }}">
                <i class="me-1" data-feather="edit"></i>
                <span class="align-middle">Ubah</span>
            </a>
            @php
                if ($data->status == BLOG_STATUS_DITERBITKAN) {
                    $route_draf = route('postingan.blog.move-draf', ['id' => $data->id]);
                    $title_draf = 'Pindahkan ke Draf';
                    $icon_draf = 'archive';
                    $btn_confirm_draf = 'Ya, Pindahkan';
                } elseif ($data->status == BLOG_STATUS_DRAF) {
                    $route_draf = route('postingan.blog.restore-draf', ['id' => $data->id]);
                    $title_draf = 'Publikasikan Blog';
                    $icon_draf = 'upload';
                    $btn_confirm_draf = 'Publikasikan';
                }
            @endphp
            <a class="dropdown-item" href="#"
                onclick="confirmMoveRestoreDraf('{{ $route_draf }}', '{{ $btn_confirm_draf }}')">
                <i class="me-1" data-feather="{{ $icon_draf }}"></i>
                <span class="align-middle">{{ $title_draf }}</span>
            </a>
            <a class="dropdown-item" href="#"
                onclick="confirmDeleteBlog('{{ route('postingan.blog.delete', ['id' => $data->id]) }}')">
                <i class="me-1" data-feather="trash"></i>
                <span class="align-middle">Hapus Blog</span>
            </a>
        </div>
    </div>
@endsection
@section('container')
    @if ($data->status == BLOG_STATUS_DRAF)
        <div class="alert alert-warning" role="alert">
            <div class="alert-body">
                Pengunjung tidak dapat melihat postingan blog selama status masih
                <strong>Draf</strong>. Untuk mengubah status postingan blog ini, silahkan
                klik tombol <strong>Publikasikan</strong>.
            </div>
        </div>
    @endif
    <div class="card">
        <img src="{{ $data->foto_thumbnail }}" class="img-fluid card-img-top img-md-cover" alt="Blog Detail Pic" />
        <div class="card-body">
            <h4 class="card-title">{{ $data->judul }}</h4>
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
                <span class="badge badge-glow bg-primary mb-25">
                    {{ $data->joinKategori->nama_kategori ?? '??' }}
                </span>
            </div>
            {!! $data->konten !!}
            @if ($data->tag)
                <div class="mt-4">
                    @foreach (explode(',', $data->tag) as $tag)
                        <span class="badge badge-light-primary">#{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
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
    <script>
        function confirmDeleteBlog(route) {
            confirm('default', 'Apakah anda yakin ingin menghapus blog ini?', function() {
                ajaxDelete(route, "{{ csrf_token() }}", "{{ route('postingan.blogg.index') }}");
            }, 'Ya, Hapus');
        }

        function confirmMoveRestoreDraf(route, confirmButtonText) {
            confirm('default', 'Apakah anda yakin ingin memindahkan blog ini ke dalam tabulasi Draf?', function() {
                window.location.href = route;
            }, confirmButtonText);
        }
    </script>
@endsection
