@extends(adminTemplate())
@section('right-menu')
    <button type="button" class="btn btn-flat-primary me-25" onclick="history.back(-1)">
        <i data-feather="arrow-left" class="me-25"></i>
        Kembali
    </button>
@endsection
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.admin.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <x-input-comp label="Nama lengkap" type="text" name="nama" required theme="horizontal" />

                        <x-input-comp label="Username" type="text" name="username" required theme="horizontal" />

                        <x-input-comp label="Alamat email" type="email" name="email" required theme="horizontal" />

                        <x-textarea-comp label="Alamat" name="alamat" rows="3" required theme="horizontal" />

                        <x-input-comp label="Kata sandi" type="text" name="password" value="{{ USER_PASSWORD_DEFAULT }}"
                            readonly required theme="horizontal" />

                        <x-select-comp label="User akses" name="role" required theme="horizontal"
                            message="Untuk saat ini hanya bisa Super Admin!">
                            <option value="" selected disabled>Pilih akses</option>
                            <option value="{{ USER_ROLE_SUPER_ADMIN }}" @if (old('role') == USER_ROLE_SUPER_ADMIN) selected @endif>
                                Super Admin
                            </option>
                            <option value="{{ USER_ROLE_ADMIN }}" @if (old('role') == USER_ROLE_ADMIN) selected @endif>
                                Admin
                            </option>
                            <option value="{{ USER_ROLE_USER }}" @if (old('role') == USER_ROLE_USER) selected @endif>
                                User
                            </option>
                        </x-select-comp>

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Profil
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="" id="profil-feature-image" class="me-2 mb-1 mb-md-0 d-none"
                                        style="border-radius: 100%;" width="50" height="50" alt="Profil" />
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

                        <div class="col-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i data-feather="save" class="me-25"></i>
                                <span>Simpan</span>
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
        // upload gambar
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
    </script>
@endsection
