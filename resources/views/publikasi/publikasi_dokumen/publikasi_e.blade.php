@extends(adminTemplate())
@section('container')
    <form
        action="{{ route('publikasi-dokumen.update', ['ref_jenis_publikasi_dokumen_id' => request()->route('ref_jenis_publikasi_dokumen_id'), 'id' => request()->route('id')]) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card">
            <div class="card-body">

                <x-input-comp label="Judul Dokumen" type="text" name="judul_dokumen" value="{{ $data->judul }}"
                    placeholder="Masukkan disini..." theme="horizontal" col="9" required />

                <x-input-comp label="Berkas Dokumen" type="file" name="berkas_dokumen" theme="horizontal" col="9"
                    message="Berkas dokumen dengan format: PDF dan ukuran maksimal 4MB." accept="application/pdf" />
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">
                        <i data-feather="save" class="me-25"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
