@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
            <i data-feather="plus" class="me-25"></i>
            <span>Baru</span>
        </button>
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
                        <th class="text-center" style="width: 1rem;">No</th>
                        <th>Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $key => $data)
                        <tr>
                            <td class="text-center">
                                {{ $kategori->firstItem() + $key }}
                            </td>
                            <td>
                                {{ $data->nama_kategori }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap ubah"
                                    data-bs-toggle="modal" data-bs-target="#ubahKategoriModal"
                                    data-route="{{ route('kategori.update', ['id' => $data->id]) }}"
                                    data-kategori="{{ $data }}">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-md-0 text-nowrap"
                                    onclick="confirmDelete('{{ route('kategori.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$kategori" />
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Tambah Kategori</h1>
                    </div>
                    <form action="{{ route('kategori.store') }}" method="post" class="row gy-1 pt-75">
                        @csrf
                        <x-input-comp label="Nama Kategori" type="text" name="nama_kategori" id="t_nama_kategori"
                            required />
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahKategoriModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Ubah Kategori</h1>
                    </div>
                    <form action="xxx" method="post" class="row gy-1 pt-75">
                        @csrf
                        @method('put')
                        <x-input-comp label="Nama Kategori" type="text" name="nama_kategori" id="u_nama_kategori"
                            required />
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.ubah').click(function() {
            const action = $(this).data('route');
            const nama_kategori = $(this).data('kategori').nama_kategori;

            $('#ubahKategoriModal form').attr('action', action);
            $('#ubahKategoriModal #u_nama_kategori').val(nama_kategori);
        });

        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>

    @if (session('tambah-kategori-modal'))
        <script>
            var tambahKategoriModal = new bootstrap.Modal(document.getElementById("tambahKategoriModal"), {});
            document.onreadystatechange = function() {
                tambahKategoriModal.show();
            };
        </script>
    @endif

    @if (session('ubah-kategori-modal'))
        <script>
            var ubahKategoriModal = new bootstrap.Modal(document.getElementById("ubahKategoriModal"), {});
            document.onreadystatechange = function() {
                ubahKategoriModal.show();
            };
            $('#ubahKategoriModal form').attr('action', "{{ session('ubah-kategori-modal-action') }}");
        </script>
    @endif
@endsection
