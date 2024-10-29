<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
        <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
            <i data-feather="home"></i>
            <span class="menu-title text-truncate" data-i18n="Dashboard">
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="d-flex align-items-center" href="index.html">
            <i data-feather="feather"></i>
            <span class="menu-title text-truncate" data-i18n="Tampilan">
                Tampilan
            </span>
        </a>
        <ul class="menu-content">
            <li @if (request()->routeIs('menu*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('menu.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Blog">
                        Menu
                    </span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="d-flex align-items-center" href="index.html">
            <i data-feather="send"></i>
            <span class="menu-title text-truncate" data-i18n="Postingan">
                Postingan
            </span>
        </a>
        <ul class="menu-content">
            <li @if (request()->routeIs('postingan.blogg*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('postingan.blogg.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Berita / Blog">
                        Berita / Blog
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('prestasi*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('prestasi.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Prestasi Diraih">
                        Prestasi Diraih
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('dokumentasi*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('dokumentasi.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Kegiatan Home Care">
                        Kegiatan Home Care
                    </span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="d-flex align-items-center" href="index.html">
            <i data-feather="globe"></i>
            <span class="menu-title text-truncate" data-i18n="Publikasi">
                Publikasi
            </span>
        </a>
        <ul class="menu-content">
            <li @if (request()->routeIs('publikasi-dokumen*') &&
                    request()->route('ref_jenis_publikasi_dokumen_id') == REF_JENIS_PUBLIKASI_DOKUMEN_AKADEMIK) class="active" @endif>
                <a class="d-flex align-items-center"
                    href="{{ route('publikasi-dokumen.index', ['ref_jenis_publikasi_dokumen_id' => REF_JENIS_PUBLIKASI_DOKUMEN_AKADEMIK]) }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Akademik">
                        Akademik
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('publikasi-dokumen*') &&
                    request()->route('ref_jenis_publikasi_dokumen_id') == REF_JENIS_PUBLIKASI_DOKUMEN_KEMAHASISWAAN) class="active" @endif>
                <a class="d-flex align-items-center"
                    href="{{ route('publikasi-dokumen.index', ['ref_jenis_publikasi_dokumen_id' => REF_JENIS_PUBLIKASI_DOKUMEN_KEMAHASISWAAN]) }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Kemahasiswaan">
                        Kemahasiswaan
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('publikasi-dokumen*') &&
                    request()->route('ref_jenis_publikasi_dokumen_id') == REF_JENIS_PUBLIKASI_DOKUMEN_KERJASAMA) class="active" @endif>
                <a class="d-flex align-items-center"
                    href="{{ route('publikasi-dokumen.index', ['ref_jenis_publikasi_dokumen_id' => REF_JENIS_PUBLIKASI_DOKUMEN_KERJASAMA]) }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Kerjasama">
                        Kerjasama
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('kolaborasi*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('kolaborasi.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Kerjasama">
                        MOU Kerjasama
                    </span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="d-flex align-items-center" href="index.html">
            <i data-feather="file-text"></i>
            <span class="menu-title text-truncate" data-i18n="Jurnal Ilmiah">
                Jurnal Ilmiah
            </span>
        </a>
        <ul class="menu-content">
            <li @if (request()->routeIs('koleksi-jurnal*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('koleksi-jurnal.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Koleksi">
                        Koleksi
                    </span>
                </a>
            </li>
            <li @if (request()->routeIs('publikasi.jurnal*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('publikasi.jurnal.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="Jurnal Ilmiah">
                        Jurnal Ilmiah
                    </span>
                </a>
            </li>
        </ul>
    </li>


    {{-- Master Data --}}
    <li class="navigation-header">
        <span data-i18n="Master Data">
            Master Data
        </span>
        <i data-feather="more-horizontal"></i>
    </li>

    <li class="nav-item @if (request()->routeIs('kategori*')) active @endif">
        <a class="d-flex align-items-center" href="{{ route('kategori.index') }}">
            <i data-feather="grid"></i>
            <span class="menu-title text-truncate" data-i18n="Kategori">
                Kategori
            </span>
        </a>
    </li>

    <li class="nav-item @if (request()->routeIs('user.tim*')) active @endif">
        <a class="d-flex align-items-center" href="{{ route('user.tim.index') }}">
            <i data-feather="github"></i>
            <span class="menu-title text-truncate" data-i18n="Dosen & Staff">
                Dosen & Staff
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="d-flex align-items-center" href="index.html">
            <i data-feather="users"></i>
            <span class="menu-title text-truncate" data-i18n="Manajemen User">
                Manajemen User
            </span>
        </a>
        <ul class="menu-content">
            <li @if (request()->routeIs('user.admin*')) class="active" @endif>
                <a class="d-flex align-items-center" href="{{ route('user.admin.index') }}">
                    <i data-feather="circle"></i>
                    <span class="menu-item text-truncate" data-i18n="User Admin">
                        User Admin
                    </span>
                </a>
            </li>
        </ul>
    </li>

    {{-- Pengaturan --}}
    <li class="navigation-header">
        <span data-i18n="Pengaturan">
            Pengaturan
        </span>
        <i data-feather="more-horizontal"></i>
    </li>

    <li class="nav-item @if (request()->routeIs('tentang*')) active @endif">
        <a class="d-flex align-items-center" href="{{ route('tentang.edit') }}">
            <i data-feather="help-circle"></i>
            <span class="menu-title text-truncate" data-i18n="Tentang">
                Tentang
            </span>
        </a>
    </li>
</ul>
