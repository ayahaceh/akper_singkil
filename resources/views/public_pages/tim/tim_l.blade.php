@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            @forelse ($users as $user)
                <div class="col-6 col-md-4 col-lg-3">
                    <img src="{{ $user->foto_profil_compress }}"
                        style="height: 300px; width: 100%; object-fit: cover; border-radius: 5px;">
                    <div class="mt-2 text-center">
                        <h6>{{ $user->nama }}</h6>
                        <p class="">NIP. {{ $user->nip ?? '-' }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center">Data tidak ditemukan</p>
            @endforelse
        </div>

        <x-pagination-bs5-comp :data="$users" />
    </div>
@endsection
