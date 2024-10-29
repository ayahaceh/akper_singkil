{{-- data-bs-toggle="modal" data-bs-target="#myModal" --}}

<div class="modal fade" id="myModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Tambah Kategori</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, ea.</p>
                </div>
                <form action="xxx" method="post" class="row gy-1 pt-75">
                    @csrf
                    <x-input-comp label="Nama Kategori" type="text" name="nama_kategori" id="t_nama_kategori"
                        required />
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal"
                            aria-label="Close">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
