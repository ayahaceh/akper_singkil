@extends(loginTemplate())
@section('container')
    <div class="card mb-0">
        <div class="card-body">
            <a href="" class="brand-logo">
                <img src="{{ asset('web/logo/logo.png') }}" alt="" class="img-fluid" style="height: 8rem;">
            </a>

            <h4 class="card-title mb-1">Selamat datang di {{ env('APP_NAME') }}</h4>
            <p class="card-text mb-2">Silakan masuk ke akun Anda dan mulai petualangan</p>

            <form class="auth-login-form mt-2" action="{{ route('auth.login.store') }}" method="post">
                @csrf

                <x-input-comp label="Username" type="text" name="username" required />

                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Kata Sandi</label>
                        <a href="#">
                            <small>Lupa Sandi?</small>
                        </a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" class="form-control form-control-merge" name="password" id="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>

            <div class="divider my-2">
                <div class="divider-text">atau</div>
            </div>

            <div class="auth-footer-btn d-flex justify-content-center">
                <a href="#" class="btn btn-facebook">
                    <i data-feather="facebook"></i>
                </a>
                <a href="#" class="btn btn-twitter white">
                    <i data-feather="twitter"></i>
                </a>
                <a href="#" class="btn btn-google">
                    <i data-feather="mail"></i>
                </a>
                <a href="#" class="btn btn-github">
                    <i data-feather="github"></i>
                </a>
            </div>

        </div>
    </div>
@endsection
