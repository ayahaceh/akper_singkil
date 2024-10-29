@extends(adminTemplate())
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h4 class="card-header">Ganti Kata Sandi</h4>
                <div class="card-body">
                    <form action="{{ route('ganti-sandi.update') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="alert alert-warning mb-2" role="alert">
                            <h6 class="alert-heading">Pastikan persyaratan ini terpenuhi</h6>
                            <div class="alert-body fw-normal">Panjang minimal 8 karakter, huruf besar & simbol</div>
                        </div>

                        <div class="mb-2 form-password-toggle">
                            <label class="form-label" for="password_lama">Kata Sandi Lama</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control" type="password" id="password_lama" name="password_lama"
                                    value="{{ old('password_lama') }}"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                            <x-validation-error-comp name="password_lama" />
                        </div>

                        <div class="mb-2 form-password-toggle">
                            <label class="form-label" for="password">Kata Sandi Baru</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control" type="password" id="password" name="password"
                                    value="{{ old('password') }}"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                            <x-validation-error-comp name="password" />
                        </div>

                        <div class="mb-2 form-password-toggle">
                            <label class="form-label" for="password_confirmation">Konfirmasi Sandi Baru</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" id="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            <x-validation-error-comp name="password_confirmation" />
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Ganti Sandi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
