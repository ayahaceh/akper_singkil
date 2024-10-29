@extends(adminTemplate())
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-xxl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Personal
                    </h4>
                    <form action="{{ route('tentang.update-personal') }}" method="post">
                        @csrf
                        @method('put')

                        <x-textarea-comp label="Tentang" name="tentang" value="{{ $tentang->tentang }}" rows="4"
                            required />

                        <x-input-comp label="Alamat" type="text" name="alamat" value="{{ $tentang->alamat }}"
                            required />

                        <x-input-comp label="Awal berdiri" type="month" name="awal_berdiri"
                            value="{{ $tentang->awal_berdiri->format('Y-m') }}" required />

                        {{-- <x-textarea-comp label="Visi" name="visi" value="{{ $tentang->visi }}" rows="5" required />

                        <x-textarea-comp label="Misi" name="misi" value="{{ $tentang->misi }}" rows="5" required /> --}}

                        <div class="col-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1">
                                <i data-feather="save" class="me-25"></i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Kontak
                    </h4>
                    <form action="{{ route('tentang.update-kontak') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="email">Alamat email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="mail"></i>
                                    </span>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $tentang->email) }}" class="form-control"
                                        placeholder="Alamat email" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="telepon">Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="phone"></i>
                                    </span>
                                    <input type="text" name="telepon" id="telepon"
                                        value="{{ old('telepon', $tentang->telepon) }}" class="form-control"
                                        placeholder="Telepon" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="whatsapp">Whatsapp</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </span>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        value="{{ old('whatsapp', $tentang->whatsapp) }}" class="form-control"
                                        placeholder="Whatsapp" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="facebook">Url Profil Facebook</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="facebook"></i>
                                    </span>
                                    <span class="input-group-text">{{ LINK_PROFIL_FACEBOOK }}</span>
                                    <input type="text" name="facebook" id="facebook"
                                        value="{{ old('facebook', $tentang->facebook) }}" class="form-control"
                                        placeholder="Facebook" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="twitter">Url Profil Twitter</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="twitter"></i>
                                    </span>
                                    <span class="input-group-text">{{ LINK_PROFIL_TWITTER }}</span>
                                    <input type="text" name="twitter" id="twitter"
                                        value="{{ old('twitter', $tentang->twitter) }}" class="form-control"
                                        placeholder="Twitter" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="instagram">Url Profil Instagram</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="instagram"></i>
                                    </span>
                                    <span class="input-group-text">{{ LINK_PROFIL_INSTAGRAM }}</span>
                                    <input type="text" name="instagram" id="instagram"
                                        value="{{ old('instagram', $tentang->instagram) }}" class="form-control"
                                        placeholder="Instagram" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="linkedin">Url Profil Linkedin</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <i data-feather="linkedin"></i>
                                    </span>
                                    <span class="input-group-text">{{ LINK_PROFIL_LINKEDIN }}</span>
                                    <input type="text" name="linkedin" id="linkedin"
                                        value="{{ old('linkedin', $tentang->linkedin) }}" class="form-control"
                                        placeholder="Linkedin" />
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1">
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
@endsection
