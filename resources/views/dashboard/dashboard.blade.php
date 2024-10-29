@extends(adminTemplate())
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/charts/chart-apex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/pages/dashboard-ecommerce.min.css') }}">
@endsection
@section('container')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">

        <div class="row match-height">

            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="globe" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $blog_count }} Total</h4>
                                        <p class="card-text font-small-3 mb-0">Blog / Berita</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $prestasi_count }} Total</h4>
                                        <p class="card-text font-small-3 mb-0">Prestasi Diraih</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="image" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $kegiatan_count }} Total</h4>
                                        <p class="card-text font-small-3 mb-0">Kegiatan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="file-text" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $jurnal_count }} Total</h4>
                                        <p class="card-text font-small-3 mb-0">Jurnal Ilmiah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>

    </section>
@endsection
