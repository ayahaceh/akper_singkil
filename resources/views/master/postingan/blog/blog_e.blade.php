@extends(adminTemplate())
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection
@section('right-menu')
    <button type="button" class="btn btn-flat-primary me-25" onclick="history.back(-1)">
        <i data-feather="arrow-left" class="me-25"></i>
        Kembali
    </button>
@endsection
@section('container')
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar me-75">
                                <img src="{{ user('foto_profil_compress') }}" width="38" height="38" alt="Avatar" />
                            </div>
                            <div class="author-info">
                                <h6 class="mb-25">{{ user('nama') }}</h6>
                                <p class="card-text">Author</p>
                            </div>
                        </div>

                        <form action="{{ route('postingan.blog.update', ['id' => $data->id]) }}" method="post"
                            enctype="multipart/form-data" class="mt-2">
                            @csrf
                            @method('put')

                            <x-input-comp label="Judul" type="text" name="judul" value="{{ $data->judul }}" required
                                theme="horizontal" />

                            <x-input-comp label="Slug" type="text" name="slug" value="{{ $data->slug }}" disabled
                                theme="horizontal" />

                            @php
                                $message_kategori_id = null;
                                if ($data->joinKategori->deleted_at !== null) {
                                    $message_kategori_id = 'Kategori lama pada blog ini telah dihapus. Harap memilih kategori baru.';
                                }
                            @endphp
                            <x-select-comp label="Kategori" name="kategori_id" required theme="horizontal"
                                message="{{ $message_kategori_id }}">
                                @if (old('kategori_id'))
                                    <option value="{{ old('kategori_id') }}" selected>
                                        @php
                                            $kategori = \App\Models\KategoriModel::find(old('kategori_id'));
                                            echo $kategori->nama_kategori;
                                        @endphp
                                    </option>
                                @else
                                    <option value="@if ($data->joinKategori->deleted_at == null) {{ $data->kategori_id }} @endif"
                                        selected>
                                        {{ $data->joinKategori->nama_kategori }}
                                    </option>
                                @endif
                            </x-select-comp>

                            <div class="mb-2">
                                <label class="form-label">
                                    Konten <span class="text-danger">*</span>
                                </label>
                                <input type="hidden" name="konten" id="kontenHidden">
                                <div id="blogEdit">
                                    <div class="editor">
                                        {!! old('konten', $data->konten) !!}
                                    </div>
                                </div>
                                <x-validation-error-comp name="konten" />
                            </div>

                            <div class="mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">
                                        Thumbnail <span class="text-danger">*</span>
                                    </h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img src="{{ $data->foto_thumbnail_compress }}" id="blog-feature-image"
                                            class="rounded me-2 mb-1 mb-md-0" width="170" height="110"
                                            alt="Blog Thumbnail" />
                                        <div class="featured-info">
                                            <small class="text-muted">
                                                Resolusi gambar yang dibutuhkan 800x400, ukuran gambar 2mb. <br>
                                                Tipe gambar harus berupa jpeg, png, jpg, gif atau svg.
                                            </small>
                                            <p class="my-50">
                                                <a href="#" id="blog-image-text"></a>
                                            </p>
                                            <div class="d-inline-block">
                                                <input class="form-control" type="file" name="thumbnail"
                                                    id="thumbnailFile" accept="image/*" />
                                                <x-validation-error-comp name="thumbnail" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1">
                                <label for="konten_resume" class="form-label">
                                    Konten Resume <span class="text-danger">*</span>
                                </label>
                                <div class="form-floating mb-0">
                                    <textarea data-length="150" class="form-control char-textarea" name="konten_resume" id="konten_resume" rows="3"
                                        placeholder="Konten Resume"
                                        style=" height: 100px" required>{{ old('konten_resume', $data->konten_resume) }}</textarea>
                                </div>
                                <small class="textarea-counter-value float-end">
                                    <span class="char-count">
                                        {{ strlen(old('konten_resume', $data->konten_resume)) }}
                                    </span>
                                    / 150
                                </small>
                                <p><small class="text-muted">Isi konten yang diresume disarankan maksimal 150
                                        karakter</small></p>
                                <x-validation-error-comp name="konten_resume" />
                            </div>

                            <x-select-comp label="Tag" name="tag[]" id="tag" required multiple
                                message="Isi kata yang mengandung konten Anda.">
                                @if (old('tag'))
                                    @foreach (old('tag') as $tag)
                                        <option value="{{ $tag }}" selected>
                                            {{ $tag }}
                                        </option>
                                    @endforeach
                                @else
                                    @foreach (explode(',', $data->tag) as $tag)
                                        <option value="{{ $tag }}" selected>
                                            {{ $tag }}
                                        </option>
                                    @endforeach
                                @endif
                            </x-select-comp>

                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary me-1">
                                    <i data-feather="save" class="me-25"></i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script>
        select2Pagination('#kategori_id', "{{ route('select.get-kategori-paginate') }}");

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

        $('#tag').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
@endsection
