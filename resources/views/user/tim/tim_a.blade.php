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
                    <form action="{{ route('user.tim.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <x-select-comp label="Jenis Pegawai" name="jenis_pegawai" theme="horizontal" col="9"
                            required>
                            <option value="" selected disabled>- Pilih salah satu -</option>
                            @foreach ($ref_jenis_tims as $data)
                                <option value="{{ $data->id }}" @if (old('jenis_pegawai') == $data->id) selected @endif>
                                    {{ $data->nama_jenis }}
                                </option>
                            @endforeach
                        </x-select-comp>

                        <x-input-comp label="Nama" type="text" name="nama" required theme="horizontal" />

                        <x-input-comp label="NIP" type="number" name="nip" theme="horizontal" />

                        {{-- <x-input-comp label="Selaku" type="text" name="selaku" required theme="horizontal" /> --}}

                        <x-textarea-comp label="Tentang" name="tentang" rows="3" theme="horizontal" />

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="form-label" for="twitter">Url Profil Twitter</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i data-feather="twitter"></i>
                                        </span>
                                        <span class="input-group-text">{{ LINK_PROFIL_TWITTER }}</span>
                                        <input type="text" name="twitter" id="twitter" value="{{ old('twitter') }}"
                                            class="form-control" placeholder="Twitter" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="form-label" for="facebook">Url Profil Facebook</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i data-feather="facebook"></i>
                                        </span>
                                        <span class="input-group-text">{{ LINK_PROFIL_FACEBOOK }}</span>
                                        <input type="text" name="facebook" id="facebook" value="{{ old('facebook') }}"
                                            class="form-control" placeholder="Facebook" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="form-label" for="instagram">Url Profil Instagram</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i data-feather="instagram"></i>
                                        </span>
                                        <span class="input-group-text">{{ LINK_PROFIL_INSTAGRAM }}</span>
                                        <input type="text" name="instagram" id="instagram" value="{{ old('instagram') }}"
                                            class="form-control" placeholder="Instagram" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="form-label" for="linkedin">Url Profil Linkedin</label>
                                </div>
                                <div class="col-sm-9">

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                            <i data-feather="linkedin"></i>
                                        </span>
                                        <span class="input-group-text">{{ LINK_PROFIL_LINKEDIN }}</span>
                                        <input type="text" name="linkedin" id="linkedin" value="{{ old('linkedin') }}"
                                            class="form-control" placeholder="Linkedin" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-input-comp label="No. Urut" type="number" name="no_urut" required theme="horizontal" />

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
