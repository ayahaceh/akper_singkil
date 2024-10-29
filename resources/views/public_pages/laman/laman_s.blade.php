@extends(landingTemplate())
@php
    if ($menu->joinLaman) {
        $title = $menu->joinLaman->nama_laman;
    } else {
        $title = $menu->nama_menu;
    }
@endphp

@section('title', $title)
@section('container')
    @if ($menu->joinLaman)
        {!! $menu->joinLaman->uraian !!}
    @else
        <p class="text-center">Tidak ada konten</p>
    @endif
@endsection
