@extends(adminTemplate())
@section('right-menu')
    <button type="button" class="btn btn-flat-primary me-25" onclick="history.back(-1)">
        <i data-feather="arrow-left" class="me-25"></i>
        Kembali
    </button>
@endsection
@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dokumentasi.update', ['id' => $data->id]) }}" method="post">
                        @csrf
                        @method('put')

                        <x-input-comp label="Judul" type="text" name="judul" value="{{ $data->nama_dokumentasi }}"
                            required theme="horizontal" />

                        <x-textarea-comp label="Keterangan" name="keterangan" value="{{ $data->keterangan }}" rows="3"
                            required theme="horizontal" />

                        <div class="col-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i data-feather="save" class="me-25"></i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
