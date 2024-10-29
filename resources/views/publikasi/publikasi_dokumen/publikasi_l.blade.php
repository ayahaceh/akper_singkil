@extends(adminTemplate())
@section('right-menu')
    <a href="{{ route('publikasi-dokumen.create', ['ref_jenis_publikasi_dokumen_id' => request()->route('ref_jenis_publikasi_dokumen_id')]) }}"
        class="btn btn-primary">
        <i data-feather="plus" class="me-25"></i>
        <span>Baru</span>
    </a>
@endsection

@section('container')
    <x-searching-info-comp class="mb-2" />

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar {{ $title }}</h4>
            <div class="card-tools">
                <form action="" method="get">
                    <div class="input-group input-group-sm">
                        <input type="text" name="cari" class="form-control form-control-sm"
                            value="{{ request('cari') }}" placeholder="Pencarian..." autocomplete="off">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1rem;">No</th>
                        <th>Judul</th>
                        <th>Dokumen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($publikasi_dokumens as $key => $data)
                        <tr>
                            <td class="text-center">
                                {{ $publikasi_dokumens->firstItem() + $key }}
                            </td>
                            <td>
                                {{ $data->judul }}
                            </td>
                            <td>
                                @if ($data->get_berkas_pendukung)
                                    <a href="{{ $data->get_berkas_pendukung }}" target="_blank" class="text-nowrap">
                                        <i class="fas fa-external-link-alt me-25"></i> Lihat Berkas
                                    </a>
                                @else
                                    <i>- Tidak ada berkas -</i>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('publikasi-dokumen.edit', ['ref_jenis_publikasi_dokumen_id' => request()->route('ref_jenis_publikasi_dokumen_id'), 'id' => $data->id]) }}"
                                    class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap ubah">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-md-0 text-nowrap"
                                    onclick="confirmDelete('{{ route('publikasi-dokumen.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$publikasi_dokumens" />
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
