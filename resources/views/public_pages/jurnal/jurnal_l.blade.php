@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="mb-4">
        @forelse ($jurnals as $data)
            <div class="d-flex">
                <img class="img-fluid" src="{{ asset('web/logo/logo-pdf-sm.png') }}" style="height: 100px !important;">

                <div class="ms-4">
                    <div class="badge bg-primary">
                        {{ $data->joinKoleksiJurnal->nama_koleksi }}
                    </div>
                    <h5 class="post-title">
                        <a
                            href="{{ route('web.publik.koleksi.jurnal.show', ['koleksi_jurnal_id' => request()->route('koleksi_jurnal_id'), 'id' => $data->id]) }}">
                            {{ $data->judul }}
                        </a>
                    </h5>
                    <p>@php
                        $deskripsi = strip_tags($data->deskripsi, '<br>');
                        $deskripsi = str_replace('<br>', ' ', $deskripsi);
                    @endphp
                        {!! Illuminate\Support\Str::limit($deskripsi, 192) !!}</p>
                </div>
            </div>

            @if (!$loop->last)
                <hr class="my-4">
            @endif

        @empty
            <p class="text-center">Data tidak ditemukan</p>
        @endforelse
    </div>

    <x-pagination-bs5-comp :data="$jurnals" />
@endsection
