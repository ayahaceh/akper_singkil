@extends(adminTemplate())
@section('style')
    @if ($step === 1)
        <link rel="stylesheet" href="{{ asset('vuexy/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vuexy/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    @endif

    @if ($step === 2)
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/app-assets/css/plugins/forms/form-file-uploader.min.css') }}">
    @endif
@endsection
@section('right-menu')
    <button type="button" class="btn btn-flat-primary me-25" onclick="history.back(-1)">
        <i data-feather="arrow-left" class="me-25"></i>
        Kembali
    </button>
@endsection
@section('container')
    @if ($step === 1)
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dokumentasi.store_1') }}" method="post">
                            @csrf

                            <x-input-comp label="Judul" type="text" name="judul" required theme="horizontal" />

                            <x-textarea-comp label="Keterangan" name="keterangan" rows="3" required theme="horizontal" />

                            <x-input-comp label="Waktu Posting" type="text" name="waktu" value="{{ now() }}"
                                class="flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" required theme="horizontal" />

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
    @elseif ($step === 2)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dokumentasi.store_2', ['id' => $data->id]) }}" method="post"
                            enctype="multipart/form-data" class="dropzone dropzone-area" id="upload">
                            @csrf
                            <div class="dz-message">Letakkan file di sini atau klik untuk mengunggah.</div>
                            @foreach ($data->joinDokumentasiFoto as $gambar)
                                <div class="dz-preview dz-processing dz-image-preview dz-complete">
                                    <div class="dz-image">
                                        <img alt="{{ $gambar->gambar }}" src="{{ $gambar->foto_gambar }}"
                                            style="height: 120px; width: 120px; object-fit: cover;">
                                    </div>
                                    <div class="dz-details">
                                        <div class="dz-size">
                                            <span data-dz-size=""><strong>{{ $gambar->size_gambar }}</strong> MB</span>
                                        </div>
                                        <div class="dz-filename">
                                            <span data-dz-name="">{{ $gambar->gambar }}</span>
                                        </div>
                                    </div>
                                    <div class="dz-progress"> <span class="dz-upload" data-dz-uploadprogress=""
                                            style="width: 100%;"></span> </div>
                                    <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                    <a class="dz-remove hapus" href="javascript:undefined;" data-dz-remove=""
                                        data-name="{{ $gambar->gambar }}">Remove file</a>
                                </div>
                            @endforeach
                        </form>
                        <p class="mt-50">
                            <small class="text-muted">
                                Ukuran gambar yang dibutuhkan maksimal 1mb. <br>
                                Tipe gambar harus berupa jpeg, jpg atau png.
                            </small>
                        </p>
                        <a href="{{ route('dokumentasi.send-message') }}" class="btn btn-primary me-1">
                            <i data-feather="save" class="me-25"></i>
                            <span>Selesai</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    @if ($step === 1)
        <script src="{{ asset('vuexy/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('vuexy/app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
    @endif

    @if ($step === 2)
        <script src="{{ asset('vuexy/app-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
        <script>
            Dropzone.autoDiscover = false, $((function() {
                "use strict";
                $('#upload').dropzone({
                    paramName: "file",
                    maxFilesize: 1,
                    clickable: true,
                    acceptedFiles: ".jpeg,.jpg,.png",
                    addRemoveLinks: true,
                    timeout: 5000,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return "{{ $data->id }}-" + time + '.' + file.type.split('/')[1];
                    },
                    success: function(file, response) {
                        if (response.success == true) {
                            return toastSuccess('Berhasil mengupload gambar.');
                        }
                    },
                    error: function(file, response) {
                        toastFailed(response);

                        var parent = $(file.previewElement).find('.dz-details');
                        parent.find('.dz-filename span').text('Gagal');
                    },
                    removedfile: function(file) {
                        confirm('default', 'Gambar yang dipilih akan dihapus.', function() {
                            var name = file.upload.filename;

                            $.ajax({
                                type: 'delete',
                                url: "{{ route('dokumentasi.delete-foto') }}",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    gambar: name,
                                },
                                success: function(data) {
                                    if (data.success == true) {
                                        toastSuccess(
                                            'Berhasil menghapus gambar.');

                                        var fileRef;
                                        return (fileRef = file.previewElement) !=
                                            null ?
                                            fileRef.parentNode.removeChild(file
                                                .previewElement) : void 0;
                                    }
                                },
                                error: function(error) {
                                    toastFailed(error);
                                }
                            });
                        }, 'Ya, Hapus');
                    },
                })
            }));

            function countChild() {
                var count = $('#upload .dz-preview').length;
                if (count > 0) {
                    $('#upload .dz-message').addClass('d-none');
                } else {
                    $('#upload .dz-message').removeClass('d-none');
                }
            }

            countChild();

            $('.hapus').click(function() {
                var name = $(this).data('name');
                var parent = $(this).parent();

                confirm('default', 'Gambar yang dipilih akan dihapus.', function() {
                    $.ajax({
                        type: 'delete',
                        url: "{{ route('dokumentasi.delete-foto') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            gambar: name,
                        },
                        success: function(data) {
                            if (data.success == true) {
                                toastSuccess(
                                    'Berhasil menghapus gambar.');

                                $(parent).remove();

                                countChild();
                            }
                        },
                        error: function(error) {
                            toastFailed(error);
                        }
                    });
                }, 'Ya, Hapus');
            })
        </script>
    @endif
@endsection
