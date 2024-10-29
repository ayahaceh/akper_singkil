<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Questrial&display=swap"> --}}
    {{-- Font Awesome Version 6.1.1 --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    {{-- Sweetalert 2 --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    {{-- Bulma Version 0.9.4 --}}
    <link rel="stylesheet" href="{{ asset('assets/bulma/bulma.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <x-meta-comp />
</head>

<body class="auth">

    <x-pageloader-comp />

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">{{ $title }}</h3>
                    <hr class="login-hr">
                    <p class="subtitle has-text-black">{{ @$subtitle }}</p>
                    @yield('container')
                </div>
            </div>
        </div>
    </section>

    {{-- jQuery Version 3.6.0 --}}
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')

    <x-toast-comp />

</body>

</html>
