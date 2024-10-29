@extends(adminTemplate())
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/css/plugins/forms/form-wizard.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection
@section('container')
    <section class="horizontal-wizard">
        <div class="bs-stepper horizontal-wizard-example">
            <div class="card-body">

                <form action="{{ route('publikasi.jurnal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <x-input-comp label="Judul" type="text" name="judul" required theme="horizontal" />

                    <x-select-comp label="Koleksi" name="koleksi" id="koleksi" required theme="horizontal">
                        @if (old('koleksi'))
                            @php
                                $koleksi = \App\Models\Jurnal\KoleksiJurnalModel::where('id', old('koleksi'))->get();
                            @endphp
                            @foreach ($koleksi as $old_koleksi)
                                <option value="{{ $old_koleksi->id }}" selected>
                                    {{ $old_koleksi->nama_koleksi }}
                                </option>
                            @endforeach
                        @endif
                    </x-select-comp>

                    <x-select-comp label="Pengarang" name="pengarang[]" id="pengarang" required multiple theme="horizontal">
                        @if (old('pengarang'))
                            @foreach (old('pengarang') as $pengarang)
                                <option value="{{ $pengarang }}" selected>
                                    {{ $pengarang }}
                                </option>
                            @endforeach
                        @endif
                    </x-select-comp>

                    <x-input-comp label="Penerbit" type="text" name="penerbit" theme="horizontal" required />

                    <x-input-comp label="Tahun Terbit" type="text" maxlength="4" name="tahun_terbit" theme="horizontal"
                        required />

                    <x-select-comp label="Keyword" name="keyword[]" id="keyword" multiple theme="horizontal">
                        @if (old('keyword'))
                            @foreach (old('keyword') as $keyword)
                                <option value="{{ $keyword }}" selected>
                                    {{ $keyword }}
                                </option>
                            @endforeach
                        @endif
                    </x-select-comp>

                    <x-input-comp label="Berkas Jurnal" type="file" name="berkas_jurnal" theme="horizontal"
                        col="9" message="Berkas jurnal dengan format: PDF dan ukuran maksimal 10MB."
                        accept="application/pdf" required />

                    <div class="mb-2">
                        <label class="form-label">
                            Deskripsi <span class="text-danger">*</span>
                        </label>
                        <input type="hidden" name="deskripsi" id="kontenHidden">
                        <div id="blogEdit">
                            <div class="editor">
                                {!! old('deskripsi') !!}
                            </div>
                        </div>
                        <x-validation-error-comp name="deskripsi" />
                    </div>

                    {{-- <div class="mb-2">
                        <div class="border rounded p-2">
                            <h4 class="mb-1">
                                Thumbnail <span class="text-danger">*</span>
                            </h4>
                            <div class="d-flex flex-column flex-md-row">
                                <img src="" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0 d-none"
                                    width="170" height="110" alt="Blog Thumbnail" />
                                <div class="featured-info">
                                    <small class="text-muted">
                                        Ukuran gambar yang dibutuhkan maksimal 2mb. <br>
                                        Tipe gambar harus berupa jpeg, png, jpg, gif atau svg.
                                    </small>
                                    <p class="my-50">
                                        <a href="#" id="blog-image-text"></a>
                                    </p>
                                    <div class="d-inline-block">
                                        <input class="form-control" type="file" name="thumbnail" id="thumbnailFile"
                                            accept="image/*" required />
                                        <x-validation-error-comp name="thumbnail" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12 mt-50">
                        <button type="submit" class="btn btn-primary me-1">
                            <i data-feather="save" class="me-25"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('vuexy/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>

    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script>
        select2Pagination('#koleksi', "{{ route('select.get-koleksi-jurnal-paginate') }}");

        var quill = new Quill("#blogEdit .editor", {
            bounds: "#blogEdit .editor",
            modules: {
                formula: !0,
                syntax: !0,
                toolbar: [
                    [{
                        font: []
                    }, {
                        size: []
                    }],
                    ["bold", "italic", "underline", "strike"],
                    [{
                        color: []
                    }, {
                        background: []
                    }],
                    [{
                        script: "super"
                    }, {
                        script: "sub"
                    }],
                    [{
                        header: "1"
                    }, {
                        header: "2"
                    }, "blockquote", "code-block"],
                    [{
                        list: "ordered"
                    }, {
                        list: "bullet"
                    }, {
                        indent: "-1"
                    }, {
                        indent: "+1"
                    }],
                    ["direction", {
                        align: []
                    }],
                    ["link", "image", "video", "formula"],
                    ["clean"]
                ]
            },
            theme: "snow",
            placeholder: "Tulis konten disini...",
        });

        // pass konten ke input text hidden
        var form = document.querySelector("form");
        var kontenHidden = document.querySelector('#kontenHidden');

        form.addEventListener('submit', function(e) {
            kontenHidden.value = quill.root.innerHTML;
            if (quill.root.innerHTML == '<p><br></p>') {
                $('#kontenHidden').val('');
            }
        });

        // upload gambar
        $('#thumbnailFile').change(function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blog-feature-image').removeClass('d-none');
                $('#blog-feature-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);

            // get file path
            var filePath = $(this).val();
            var fileName = filePath.split('\\');
            $('#blog-image-text').text(fileName[fileName.length - 1]);
        });

        $('#pengarang, #keyword').select2({
            tags: true,
            tokenSeparators: [',', '']
        })
    </script>
@endsection
