@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="list-group-wrap section-space--mb_60">
        <div class="separator-list-wrap">
            <div class="element-title section-space--mb_30">
                <h5>Daftar Koleksi Jurnal</h5>
            </div>
            @if ($koleksies->total() > 0)
                <ul class="separator-list">
                    @foreach ($koleksies as $koleksi)
                        <li class="list-item">
                            <a href="{{ route('web.publik.koleksi.jurnal', ['koleksi_jurnal_id' => $koleksi->id]) }}"
                                class="hover-style-link">
                                {{ $koleksi->nama_koleksi }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">Data tidak ditemukan</p>
            @endif
        </div>
    </div>

    <x-pagination-bs5-comp :data="$koleksies" />
@endsection
