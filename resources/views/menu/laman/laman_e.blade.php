@extends(adminTemplate())
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
@endsection

@section('container')
    <form
        action="{{ route('menu.laman.create-or-update.store', ['menu_id' => request()->route('menu_id'), 'laman_id' => request()->route('laman_id')]) }}"
        method="post">
        @csrf

        <div class="card">
            <div class="card-body">
                <x-input-comp label="Nama Laman" type="text" name="nama_laman" value="{{ @$laman->nama_laman }}"
                    required />

                <div class="mb-2">
                    <label class="form-label">
                        Uraian
                    </label>
                    <input type="hidden" name="uraian" id="uraian_hidden">
                    <div id="form-editor">
                        <div class="editor">
                            {!! old('uraian', @$laman->uraian) !!}
                        </div>
                    </div>
                    <x-validation-error-comp name="uraian" />
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1">
                        <i data-feather="save" class="me-25"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('vuexy/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>

    <script>
        var quill = new Quill("#form-editor .editor", {
            bounds: "#form-editor .editor",
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
            placeholder: "Tulis uraian disini...",
        });

        // pass uraian ke input text hidden
        var form = document.querySelector("form");
        var uraian_hidden = document.querySelector('#uraian_hidden');

        form.addEventListener('submit', function(e) {
            uraian_hidden.value = quill.root.innerHTML;
            if (quill.root.innerHTML == '<p><br></p>') {
                $('#uraian_hidden').val('');
            }
        });
    </script>
@endsection
