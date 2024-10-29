@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJasaModel">
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
                        <th class="d-none d-lg-table-cell" style="width: 16rem;">Sertifikat</th>
                        <th>Prestasi</th>
                        <th>Penyelenggara</th>
                        <th>Tema</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layanan as $key => $data)
                        <tr>
                            <td class="text-center">
                                {{ $layanan->firstItem() + $key }}
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <img src="{{ $data->get_logo_jasa }}" class="rounded me-2 mb-1 mb-md-0"
                                    style="height: calc(50px - 5%); width: 100%;" alt="Blog Thumbnail" />
                            </td>
                            <td>
                                <h5 class="mb-25 text-primary">{{ $data->nama_jasa }}</h5>
                                Peringkat {{ $data->peringkat }}
                            </td>
                            <td>
                                {{ $data->penyelenggara }} <br>
                                {{ $data->tahun }}
                            </td>
                            <td>
                                {{ $data->tema }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap ubah"
                                    data-bs-toggle="modal" data-bs-target="#ubahJasaModal"
                                    data-route="{{ route('prestasi.update', ['id' => $data->id]) }}"
                                    data-jasa="{{ $data }}">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-md-0 text-nowrap"
                                    onclick="confirmDelete('{{ route('prestasi.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$layanan" />
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="tambahJasaModel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Tambah Prestasi</h1>
                    </div>
                    <form action="{{ route('prestasi.store') }}" method="post" enctype="multipart/form-data"
                        class="row gy-1 pt-75">
                        @csrf

                        <x-input-comp label="Nama Prestasi" type="text" name="nama_prestasi" id="t_nama_prestasi"
                            required />

                        <x-input-comp label="Peringkat" type="text" name="peringkat" id="t_peringkat" required />

                        <x-input-comp label="Penyelenggara" type="text" name="penyelenggara" id="t_penyelenggara"
                            required />

                        <x-input-comp label="Tahun" type="text" maxlength="4" name="tahun" id="t_tahun" required />

                        <x-input-comp label="Tema" type="text" name="tema" id="t_tema" required />

                        <x-input-comp label="Sertifikat" type="file" name="sertifikat" id="t_sertifikat" required
                            message="Sertifikat dengan format: png, jpg, atau jpeg dengan ukuran maksimal 2MB." />

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

    <div class="modal fade" id="ubahJasaModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Ubah Prestasi</h1>
                    </div>
                    <form action="xxx" method="post" enctype="multipart/form-data" class="row gy-1 pt-75">
                        @csrf
                        @method('put')

                        <x-input-comp label="Nama Prestasi" type="text" name="nama_prestasi" id="u_nama_prestasi"
                            required />

                        <x-input-comp label="Peringkat" type="text" name="peringkat" id="u_peringkat" required />

                        <x-input-comp label="Penyelenggara" type="text" name="penyelenggara" id="u_penyelenggara"
                            required />

                        <x-input-comp label="Tahun" type="text" maxlength="4" name="tahun" id="u_tahun"
                            required />

                        <x-input-comp label="Tema" type="text" name="tema" id="u_tema" required />

                        <x-input-comp label="Sertifikat" type="file" name="sertifikat" id="u_sertifikat"
                            message="Sertifikat dengan format: png, jpg, atau jpeg dengan ukuran maksimal 2MB." />

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
            const jasa = $(this).data('jasa');

            $('#ubahJasaModal form').attr('action', action);
            $('#ubahJasaModal #u_nama_prestasi').val(jasa.nama_jasa);
            $('#ubahJasaModal #u_peringkat').val(jasa.peringkat);
            $('#ubahJasaModal #u_penyelenggara').val(jasa.penyelenggara);
            $('#ubahJasaModal #u_tahun').val(jasa.tahun);
            $('#ubahJasaModal #u_tema').val(jasa.tema);
        });

        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>

    @if (session('tambah-jasa-modal'))
        <script>
            var tambahJasaModel = new bootstrap.Modal(document.getElementById("tambahJasaModel"), {});
            document.onreadystatechange = function() {
                tambahJasaModel.show();
            };
        </script>
    @endif

    @if (session('ubah-jasa-modal'))
        <script>
            var ubahJasaModal = new bootstrap.Modal(document.getElementById("ubahJasaModal"), {});
            document.onreadystatechange = function() {
                ubahJasaModal.show();
            };
            $('#ubahJasaModal form').attr('action', "{{ session('ubah-jasa-modal-action') }}");
        </script>
    @endif
@endsection
