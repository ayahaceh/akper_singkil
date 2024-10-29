@extends(adminTemplate())
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning mb-2" role="alert">
                        <h6 class="alert-heading">Peringatan</h6>
                        <div class="alert-body fw-normal">Mungkin butuh waktu untuk profil Anda bisa berubah! Silahkan
                            login ulang untuk memastikan profil Anda benar-benar berubah.</div>
                    </div>

                    <form action="{{ route('profil-saya.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <x-input-comp label="Nama lengkap" type="text" name="nama" value="{{ user('nama') }}" required
                            theme="horizontal" />

                        <x-input-comp label="Username" type="text" name="username" value="{{ user('username') }}" required
                            theme="horizontal" />

                        <x-input-comp label="Alamat email" type="email" name="email" value="{{ user('email') }}" required
                            theme="horizontal" />

                        <x-textarea-comp label="Alamat" name="alamat" value="{{ user('alamat') }}" rows="3" required
                            theme="horizontal" />

                        <div class="mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">
                                    Profil
                                </h4>
                                <div class="d-flex flex-column flex-md-row">
                                    <img src="{{ user('foto_profil_compress') }}" id="profil-feature-image"
                                        class="me-2 mb-1 mb-md-0" style="border-radius: 100%;" width="50" height="50"
                                        alt="Profil" />
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
