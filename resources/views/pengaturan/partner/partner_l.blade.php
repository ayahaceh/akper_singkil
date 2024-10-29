@extends(adminTemplate())
@section('right-menu')
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPartnerModal">
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
                        <th>Logo</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($partner as $key => $data)
                        <tr>
                            <td class="text-center">
                                {{ $partner->firstItem() + $key }}
                            </td>
                            <td>
                                <img src="{{ $data->foto_logo }}" alt="Logo" height="60" />
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap ubah"
                                    data-bs-toggle="modal" data-bs-target="#ubahPartnerModal"
                                    data-route="{{ route('partner.update', ['id' => $data->id]) }}"
                                    data-logo="{{ $data->foto_logo }}">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm my-25 my-md-0 text-nowrap"
                                    onclick="confirmDelete('{{ route('partner.delete', ['id' => $data->id]) }}')">
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
        <x-pagination-comp :data="$partner" />
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="tambahPartnerModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Tambah Partner</h1>
                    </div>
                    <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data"
                        class="row gy-1 pt-75">
                        @csrf

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Logo
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="" id="logo-feature-image" class="me-2 mb-1 mb-md-0 d-none" height="50"
                                        alt="Logo" />
                                    <div class="featured-info">
                                        <small class="text-muted">
                                            Ukuran gambar maksimal 2mb. <br>
                                            Tipe gambar harus berupa jpeg, png atau jpg.
                                        </small>
                                        <p class="my-50">
                                            <a href="#" id="logo-image-text"></a>
                                        </p>
                                        <div class="d-inline-block">
                                            <input class="form-control" type="file" name="logo" id="logoFile"
                                                accept="image/*" />
                                            <x-validation-error-comp name="logo" />
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

    <div class="modal fade" id="ubahPartnerModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Ubah Partner</h1>
                    </div>
                    <form action="xxx" method="post" enctype="multipart/form-data" class="row gy-1 pt-75">
                        @csrf
                        @method('put')

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Logo
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="" id="logo-feature-image" class="me-2 mb-1 mb-md-0" height="50" alt="Logo" />
                                    <div class="featured-info">
                                        <small class="text-muted">
                                            Ukuran gambar maksimal 2mb. <br>
                                            Tipe gambar harus berupa jpeg, png atau jpg.
                                        </small>
                                        <p class="my-50">
                                            <a href="#" id="logo-image-text"></a>
                                        </p>
                                        <div class="d-inline-block">
                                            <input class="form-control" type="file" name="logo" id="logoFile"
                                                accept="image/*" />
                                            <x-validation-error-comp name="logo" />
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
        // upload logo
        $('#logoFile').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-feature-image').removeClass('d-none');
                $('#logo-feature-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);

            // get file path
            var filePath = $(this).val();
            var fileName = filePath.split('\\');
            $('#logo-image-text').text(fileName[fileName.length - 1]);
        });

        $('.ubah').click(function() {
            const action = $(this).data('route');
            const logo = $(this).data('logo');

            $('#ubahPartnerModal form').attr('action', action);
            $('#ubahPartnerModal #logo-feature-image').attr('src', logo);
        });

        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>

    @if (session('tambah-partner-modal'))
        <script>
            var tambahPartnerModal = new bootstrap.Modal(document.getElementById("tambahPartnerModal"), {});
            document.onreadystatechange = function() {
                tambahPartnerModal.show();
            };
        </script>
    @endif

    @if (session('ubah-partner-modal'))
        <script>
            var ubahPartnerModal = new bootstrap.Modal(document.getElementById("ubahPartnerModal"), {});
            document.onreadystatechange = function() {
                ubahPartnerModal.show();
            };
            $('#ubahPartnerModal form').attr('action', "{{ session('ubah-partner-modal-action') }}");
            $('#ubahPartnerModal #logo-feature-image').attr('src', "{{ session('ubah-logo-partner-modal') }}");
        </script>
    @endif
@endsection
