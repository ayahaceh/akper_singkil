@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <a href="{{ route('dokumentasi.create') }}" class="btn btn-primary">
            <i data-feather="plus" class="me-25"></i>
            <span>Baru</span>
        </a>
    </div>
@endsection
@section('container')
    <x-searching-info-comp class="mb-2" />

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar {{ $title }}</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center d-none d-lg-table-cell" style="width: 1rem;">No</th>
                        <th class="d-none d-lg-table-cell" style="width: 16rem;">Foto</th>
                        <th>Dokumentasi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokumentasies as $key => $data)
                        <tr>
                            <td class="text-center d-none d-lg-table-cell">
                                {{ $dokumentasies->firstItem() + $key }}
                            </td>
                            <td class="d-none d-lg-table-cell text-center">
                                @if (count($data->joinDokumentasiFoto) > 0)
                                    <img src="{{ $data->joinDokumentasiFoto[0]->foto_gambar }}"
                                        class="rounded me-2 mb-1 mb-md-0"
                                        style="height: calc(110px - 5%) !important; width: calc(170px - 5%) !important; object-fit: cover;"
                                        alt="Foto" />
                                @endif
                                <a href="{{ route('dokumentasi.create_2', ['id' => $data->id]) }}"
                                    class="btn btn-warning btn-sm @if (count($data->joinDokumentasiFoto) > 0) mt-50 @endif">
                                    <i data-feather="image" class="me-25"></i>
                                    Kelola
                                </a>
                            </td>
                            <td>
                                <h5 class="mb-0 text-primary">{{ $data->nama_dokumentasi }}</h5>
                                <p class="mb-0 small">{{ $data->keterangan }}</p>
                                <a href="{{ route('dokumentasi.create_2', ['id' => $data->id]) }}"
                                    class="btn btn-warning btn-sm mt-50 d-inline-flex d-lg-none">
                                    <i data-feather="image" class="me-50"></i>
                                    Kelola Gambar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('dokumentasi.edit', ['id' => $data->id]) }}"
                                    class="btn btn-outline-primary btn-sm my-25 my-25 text-nowrap">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-25 text-nowrap"
                                    onclick="confirmDelete('{{ route('dokumentasi.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$dokumentasies" />
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
