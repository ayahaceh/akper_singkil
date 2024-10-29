@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTestiModal">
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
                        <th>Profil</th>
                        <th>Pesan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonies as $key => $data)
                        <tr>
                            <td class="text-center">
                                {{ $testimonies->firstItem() + $key }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group me-1">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar pull-up my-0">
                                            <img src="{{ $data->foto_profil }}" alt="Avatar" height="50" width="50" />
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-0 text-primary">{{ $data->nama }}</h5>
                                        <p class="mb-0 text-uppercase small text-nowrap">{{ $data->profesi }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $data->pesan }}
                            </td>
                            <td class="text-center">
                                @if ($data->status == TESTI_STATUS_NONAKTIF)
                                    <span class="badge badge-light-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge badge-light-success">Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm my-25 my-25 text-nowrap ubah"
                                    data-bs-toggle="modal" data-bs-target="#ubahTestiModal"
                                    data-route="{{ route('testimoni.update', ['id' => $data->id]) }}"
                                    data-testimoni="{{ $data }}" data-profil="{{ $data->foto_profil }}">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-25 text-nowrap"
                                    onclick="confirmDelete('{{ route('testimoni.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$testimonies" />
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="tambahTestiModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Tambah Testimoni</h1>
                    </div>
                    <form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data"
                        class="row gy-1 pt-75">
                        @csrf
                        <x-input-comp label="Nama" type="text" name="nama" id="t_nama" required />

                        <x-input-comp label="Profesi" type="text" name="profesi" id="t_profesi" required />

                        <x-textarea-comp label="Pesan" name="pesan" id="t_pesan" rows="3" required />

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Profil
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="" id="profil-feature-image" class="me-2 mb-1 mb-md-0 d-none"
                                        style="border-radius: 100%;" width="50" height="50" alt="Testimoni Profil" />
                                    <div class="featured-info">
                                        <small class="text-muted">
                                            Resolusi gambar yang dibutuhkan 1:1, ukuran gambar maksimal 2mb. <br>
                                            Tipe gambar harus berupa jpeg, png atau jpg.
                                        </small>
                                        <p class="my-50">
                                            <a href="#" id="profil-image-text"></a>
                                        </p>
                                        <div class="d-inline-block">
                                            <input class="form-control" type="file" name="profil" id="profilFile"
                                                accept="image/*" />
                                            <x-validation-error-comp name="profil" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

    <div class="modal fade" id="ubahTestiModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Ubah Testimoni</h1>
                    </div>
                    <form action="xxx" method="post" enctype="multipart/form-data" class="row gy-1 pt-75">
                        @csrf
                        @method('put')

                        <x-input-comp label="Nama" type="text" name="nama" id="u_nama" required />

                        <x-input-comp label="Profesi" type="text" name="profesi" id="u_profesi" required />

                        <x-textarea-comp label="Pesan" name="pesan" id="u_pesan" rows="3" required />

                        <x-select-comp label="Status" name="status" required>
                            <option value="" disabled>Pilih status</option>
                            <option value="{{ TESTI_STATUS_AKTIF }}" @if (old('status') == TESTI_STATUS_AKTIF) selected @endif>
                                Aktif
                            </option>
                            <option value="{{ TESTI_STATUS_NONAKTIF }}"
                                @if (old('status') == TESTI_STATUS_NONAKTIF) selected @endif>
                                Tidak Aktif
                            </option>
                        </x-select-comp>

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Profil
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="" id="profil-feature-image" class="me-2 mb-1 mb-md-0"
                                        style="border-radius: 100%;" width="50" height="50" alt="Testimoni Profil" />
                                    <div class="featured-info">
                                        <small class="text-muted">
                                            Resolusi gambar yang dibutuhkan 1:1, ukuran gambar maksimal 2mb. <br>
                                            Tipe gambar harus berupa jpeg, png atau jpg.
                                        </small>
                                        <p class="my-50">
                                            <a href="#" id="profil-image-text"></a>
                                        </p>
                                        <div class="d-inline-block">
                                            <input class="form-control" type="file" name="profil" id="profilFile"
                                                accept="image/*" />
                                            <x-validation-error-comp name="profil" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
        // upload profil
        $('#profilFile').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profil-feature-image').removeClass('d-none');
                $('#profil-feature-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);

            // get file path
            var filePath = $(this).val();
            var fileName = filePath.split('\\');
            $('#profil-image-text').text(fileName[fileName.length - 1]);
        });

        $('.ubah').click(function() {
            const action = $(this).data('route');
            const nama = $(this).data('testimoni').nama;
            const profesi = $(this).data('testimoni').profesi;
            const pesan = $(this).data('testimoni').pesan;
            const profil = $(this).data('profil');
            const status = $(this).data('testimoni').status;

            $('#ubahTestiModal form').attr('action', action);
            $('#ubahTestiModal #u_nama').val(nama);
            $('#ubahTestiModal #u_profesi').val(profesi);
            $('#ubahTestiModal #u_pesan').val(pesan);
            $('#ubahTestiModal #profil-feature-image').attr('src', profil);
            $('#ubahTestiModal #status').val(status);
        });

        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>

    @if (session('tambah-testimoni-modal'))
        <script script>
            var tambahTestiModal = new bootstrap.Modal(document.getElementById("tambahTestiModal"), {});
            document.onreadystatechange = function() {
                tambahTestiModal.show();
            };
        </script>
    @endif

    @if (session('ubah-testimoni-modal'))
        <script>
            var ubahTestiModal = new bootstrap.Modal(document.getElementById("ubahTestiModal"), {});
            document.onreadystatechange = function() {
                ubahTestiModal.show();
            };
            $('#ubahTestiModal form').attr('action', "{{ session('ubah-testimoni-modal-action') }}");

            $('#ubahTestiModal #profil-feature-image').attr('src', "{{ session('ubah-profil-testimoni-modal') }}");
        </script>
    @endif
@endsection
