@extends(adminTemplate())
@section('right-menu')
    <a href="{{ route('publikasi.jurnal.create') }}" class="btn btn-primary">
        <i data-feather="plus" class="me-25"></i>
        <span>Baru</span>
    </a>
@endsection
@section('container')
    <x-searching-info-comp />

    <div class="card">
        <div class="d-md-flex justify-content-between">
            <div class="card-header">
                <h4 class="card-title">Daftar {{ $title }}</h4>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center d-none d-lg-table-cell" style="width: 1rem;">No</th>
                            {{-- <th class="d-none d-lg-table-cell" style="width: 16rem;">Thumbnail</th> --}}
                            <th>Konten</th>
                            <th class="text-center d-none d-lg-table-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurnals as $key => $data)
                            <tr>
                                <td class="text-center d-none d-lg-table-cell">
                                    {{ $jurnals->firstItem() + $key }}
                                </td>
                                {{-- <td class="d-none d-lg-table-cell">
                                    <img src="{{ $data->get_compress_berkas_thumbnail }}" class="rounded me-2 mb-1 mb-md-0"
                                        style="height: calc(110px - 5%); width: calc(170px - 5%);" alt="Blog Thumbnail"
                                        id="thumb-{{ $key }}" />
                                </td> --}}
                                <td>
                                    <h4 class="mb-50">{{ $data->judul }}</h4>
                                    <span class="badge badge-glow bg-warning mb-50">
                                        {{ @$data->joinKoleksiJurnal->nama_koleksi ?? 'Uknown' }}
                                    </span>
                                    <p class="mb-25">
                                        @php
                                            $deskripsi = strip_tags($data->deskripsi, '<br>');
                                            $deskripsi = str_replace('<br>', ' ', $deskripsi);
                                        @endphp
                                        {!! Illuminate\Support\Str::limit($deskripsi, 192) !!}
                                    </p>
                                    <p class="mb-0 text-primary">
                                        {{ $data->pengarang }}
                                    </p>
                                </td>
                                <td class="text-center d-none d-lg-table-cell">
                                    <a href="{{ route('publikasi.jurnal.edit', ['id' => $data->id]) }}"
                                        class="btn btn-outline-primary btn-sm my-25 text-nowrap">
                                        <i data-feather="edit" class="me-25"></i>
                                        <span>Ubah</span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm my-25 text-nowrap"
                                        onclick="confirmDelete('{{ route('publikasi.jurnal.delete', ['id' => $data->id]) }}')">
                                        <i data-feather="trash" class="me-25"></i>
                                        <span>Hapus</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <x-data-not-found-comp />
                        @endforelse
                    </tbody>
                </table>
            </div>
            <x-pagination-comp :data="$jurnals" />
        </div>
    </div>
@endsection

@section('script')
    <script>
        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>
@endsection
