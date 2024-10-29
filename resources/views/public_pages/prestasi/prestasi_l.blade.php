@extends(landingTemplate())
@section('title', $title)
@section('container')
    @forelse ($prestasies as $data)
        <div class="single-blog-item post-list-wrapper xs-list-blog-item border-bottom wow move-up">
            <div class="row ">
                <div class="col-lg-4">
                    <!-- Post Feature Start -->
                    <div class="post-feature blog-thumbnail">
                        <a href="blog-post-layout-one.html">
                            <img class="img-fluid" src="{{ $data->get_logo_jasa }}"
                                style="height: 200px !important; width: 100% !important; object-fit: cover;">
                        </a>
                    </div>
                    <!-- Post Feature End -->
                </div>

                <div class="col-lg-8">
                    <div class="post-info lg-blog-post-info">
                        <h4 class="post-title">
                            <a href="blog-post-layout-one.html">
                                {{ $data->nama_jasa }}
                            </a>
                        </h4>

                        <div class="post-excerpt mt-15">
                            <table class="w-100">
                                <tr>
                                    <td style="width: 28%;">Peringkat</td>
                                    <td style="width: 2%;">:</td>
                                    <td style="width: 70%;">{{ $data->peringkat }}</td>
                                </tr>
                                <tr>
                                    <td>Penyelenggara</td>
                                    <td>:</td>
                                    <td>{{ $data->penyelenggara }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td>{{ $data->tahun }}</td>
                                </tr>
                                <tr>
                                    <td>Tema</td>
                                    <td>:</td>
                                    <td>{{ $data->tema }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Data tidak ditemukan</p>
    @endforelse

    <x-pagination-bs5-comp :data="$prestasies" />
@endsection
