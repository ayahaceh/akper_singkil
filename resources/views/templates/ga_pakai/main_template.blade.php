<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    {{-- Font Awesome Version 6.1.1 --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    {{-- Sweetalert 2 --}}
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{ asset('assets/select2/select2.min.css') }}">
    {{-- Bulma Version 0.9.4 --}}
    <link rel="stylesheet" href="{{ asset('assets/bulma/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <x-meta-comp />
</head>

<body>

    <x-pageloader-comp />

    <nav class="navbar is-white">
        <div class="container is-flex is-justify-content-space-between is-align-items-center px-3">
            <div class="navbar-brand">
                <a class="navbar-item brand-text is-flex is-align-items-center" href="{{ route('dashboard') }}">
                    <figure class="image is-32x32 mr-2 mt-3">
                        <img src="{{ getLogo() }}" alt="{{ env('APP_NAME') }}">
                    </figure>
                    <span class="is-size-5 has-text-weight-medium">{{ env('APP_NAME') }}</span>
                </a>
            </div>
            <div class="is-flex is-align-items-center">
                @if (@$search && $search === true)
                    <div class="@if (request()->has('cari') && strlen(request('cari')) > 0) mr-4 @else mr-2 @endif">
                        <button class="button is-ghost modal-trigger has-tooltip-bottom" data-target="pencarian-modal"
                            data-tooltip="Pencarian">
                            @if (request()->has('cari') && strlen(request('cari')) > 0)
                                <span class="badge is-warning">1</span>
                            @endif
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                @endif
                <x-dropdown-comp id="profile-menu-desktop" class="is-right is-hidden-mobile">
                    @slot('buttonSlot')
                        <button class="button has-tooltip-bottom pl-3" aria-haspopup="true"
                            aria-controls="profile-menu-desktop" data-tooltip="User menu">
                            <div class="is-flex is-align-items-center">
                                <figure class="image is-32x32 mr-3">
                                    <img src="{{ @user('foto_profil') }}" alt="{{ @user('nama') }}"
                                        class="is-rounded">
                                </figure>
                                <span>{{ Illuminate\Support\Str::limit(user('nama'), 10) }}</span>
                            </div>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    @endslot
                    @slot('contentSlot')
                        <x-menu-dropdown-profile-menu-comp />
                    @endslot
                </x-dropdown-comp>
                <x-dropdown-comp id="profile-menu-mobile" class="is-right is-block-mobile is-hidden-tablet">
                    @slot('buttonSlot')
                        <div class="has-tooltip-bottom" aria-haspopup="true" aria-controls="profile-menu-mobile"
                            data-tooltip="User menu">
                            <figure class="image is-32x32">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="32x32" class="is-rounded">
                            </figure>
                        </div>
                    @endslot
                    @slot('contentSlot')
                        <x-menu-dropdown-profile-menu-comp />
                    @endslot
                </x-dropdown-comp>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('templates.menu.admin_menu')
            </div>
            <div class="column is-9">
                <div class="is-flex is-justify-content-space-between mb-4">
                    <div>
                        <x-bread-comp :data="@$bread" :title="@$title" />
                    </div>
                    <div>
                        @if (@$back && $back === true)
                            <a href="#" onclick="history.back()">
                                <i class="fa-solid fa-left-long mr-1"></i>
                                Kembali
                            </a>
                        @endif
                    </div>
                </div>
                @yield('container')
            </div>
        </div>
    </div>

    @yield('modal')

    @if (@$search && $search === true)
        <x-modal-comp id="pencarian-modal" :header="false" :footer="true" :form="[
            'action' => '',
            'method' => 'get',
        ]"
            submitText="<i class='fa-solid fa-search mr-2'></i> Cari">
            <x-input-comp type="search" name="cari" class="is-large" value="{{ request('cari') }}"
                placeholder="Kata kunci pencarian..." required />
        </x-modal-comp>
    @endif

    {{-- jQuery Version 3.6.0 --}}
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')

    <x-toast-comp />

    <script>
        function logout() {
            confirm('default', 'Anda akan mengakhiri sesi.', function() {
                setPageLoading();
                window.location.href = "{{ route('auth.logout') }}";
            }, 'Ya, Keluar');
        }
    </script>

</body>

</html>
