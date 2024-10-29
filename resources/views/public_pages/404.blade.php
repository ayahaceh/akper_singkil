@extends(landingTemplate())
@section('container')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="display-1">404</h1>
                    <h1>Halaman Tidak Ditemukan</h1>
                    <p class="mb-4">Maaf, halaman yang Anda cari tidak ada di website kami! Mungkin pergi ke
                        halaman rumah kami atau mencoba menggunakan pencarian?</p>
                    <a class="btn btn-primary py-3 px-5" href="{{ route('homepage') }}">Kembali Ke Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
