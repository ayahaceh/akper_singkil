@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <a href="{{ route('postingan.blog.create') }}" class="btn btn-primary">
            <i data-feather="plus" class="me-25"></i>
            <span>Baru</span>
        </a>
    </div>
@endsection
@section('search-form')
    <input type="hidden" name="tab" value="{{ request('tab', 'diterbitkan') }}">
@endsection
@section('container')
    <x-searching-info-comp />

    <div class="card">
        <div class="d-md-flex justify-content-between">
            <div class="card-header">
                <h4 class="card-title">Daftar {{ $title }}</h4>
            </div>
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs pt-md-1 pe-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if (!request()->has('tab') || request()->tab == 'diterbitkan') active @endif" id="diterbitkan-tab"
                            href="?tab=diterbitkan" aria-controls="diterbitkan" role="tab" aria-selected="true">
                            Diterbitkan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->has('tab') && request()->tab == 'draf') active @endif" id="draf-tab" href="?tab=draf"
                            aria-controls="draf" role="tab" aria-selected="false">
                            Draf
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane @if (!request()->has('tab') || request()->tab == 'diterbitkan') active @endif" id="diterbitkan"
                aria-labelledby="diterbitkan-tab" role="tabpanel">
                @if (!request()->has('tab') || request()->tab == 'diterbitkan')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center d-none d-lg-table-cell" style="width: 1rem;">No</th>
                                    <th class="d-none d-lg-table-cell" style="width: 16rem;">Thumbnail</th>
                                    <th>Konten</th>
                                    <th class="text-center d-none d-lg-table-cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blog_diterbitkan as $key => $data_diterbitkan)
                                    <tr>
                                        <td class="text-center d-none d-lg-table-cell">
                                            {{ $blog_diterbitkan->firstItem() + $key }}
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <img src="{{ $data_diterbitkan->foto_thumbnail_compress }}"
                                                class="rounded me-2 mb-1 mb-md-0"
                                                style="height: calc(110px - 5%); width: calc(170px - 5%);"
                                                alt="Blog Thumbnail" id="thumb-{{ $key }}" />
                                        </td>
                                        <td>
                                            <h4 class="mb-50">{{ $data_diterbitkan->judul }}</h4>
                                            <span class="badge badge-glow bg-warning mb-50">
                                                {{ $data_diterbitkan->joinKategori->nama_kategori ?? '??' }}
                                            </span>
                                            <p class="mb-25">
                                                {{ Illuminate\Support\Str::limit($data_diterbitkan->konten_resume, 155) }}
                                            </p>
                                            <div class="d-none d-lg-flex align-items-center">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>{{ $data_diterbitkan->jml_view ?? 0 }}</span>
                                            </div>
                                            <div class="d-lg-none mt-50">
                                                <a href="{{ route('postingan.blogg.show', ['id' => $data_diterbitkan->id]) }}"
                                                    class="btn btn-primary btn-sm text-nowrap">
                                                    <i data-feather="eye" class="me-25"></i>
                                                    <span>({{ $data_diterbitkan->jml_view ?? 0 }}) Detail Blog</span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center d-none d-lg-table-cell">
                                            <a href="{{ route('postingan.blogg.show', ['id' => $data_diterbitkan->id]) }}"
                                                class="btn btn-primary btn-sm text-nowrap">
                                                <i data-feather="eye" class="me-25"></i>
                                                <span>Lihat</span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <x-data-not-found-comp />
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <x-pagination-comp :data="$blog_diterbitkan" />
                @endif
            </div>
            <div class="tab-pane @if (request()->has('tab') && request()->tab == 'draf') active @endif" id="draf" aria-labelledby="draf-tab"
                role="tabpanel">
                @if (request()->has('tab') && request()->tab == 'draf')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center d-none d-lg-table-cell" style="width: 1rem;">No</th>
                                    <th class="d-none d-lg-table-cell" style="width: 16rem;">Thumbnail</th>
                                    <th>Konten</th>
                                    <th class="text-center d-none d-lg-table-cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blog_draf as $key => $data_draf)
                                    <tr>
                                        <td class="text-center d-none d-lg-table-cell">
                                            {{ $blog_draf->firstItem() + $key }}
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <img src="{{ $data_draf->foto_thumbnail_compress }}"
                                                class="rounded me-2 mb-1 mb-md-0"
                                                style="height: calc(110px - 5%); width: calc(170px - 5%);"
                                                alt="Blog Thumbnail" />
                                        </td>
                                        <td>
                                            <h4 class="mb-50">{{ $data_draf->judul }}</h4>
                                            <span class="badge badge-glow bg-warning mb-50">
                                                {{ $data_draf->joinKategori->nama_kategori ?? '??' }}
                                            </span>
                                            <p class="mb-25">
                                                {{ Illuminate\Support\Str::limit($data_draf->konten_resume, 155) }}
                                            </p>
                                            <div class="d-none d-lg-flex align-items-center">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>{{ $data_draf->jml_view ?? 0 }}</span>
                                            </div>
                                            <div class="d-lg-none mt-50">
                                                <a href="{{ route('postingan.blogg.show', ['id' => $data_draf->id]) }}"
                                                    class="btn btn-primary btn-sm text-nowrap">
                                                    <i data-feather="eye" class="me-25"></i>
                                                    <span>({{ $data_draf->jml_view ?? 0 }}) Detail Blog</span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-center d-none d-lg-table-cell">
                                            <a href="{{ route('postingan.blogg.show', ['id' => $data_draf->id]) }}"
                                                class="btn btn-primary btn-sm text-nowrap">
                                                <i data-feather="eye" class="me-25"></i>
                                                <span>Lihat</span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <x-data-not-found-comp />
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <x-pagination-comp :data="$blog_draf" />
                @endif
            </div>
        </div>
    </div>
@endsection

@section('modal')
@endsection

@section('script')
@endsection
