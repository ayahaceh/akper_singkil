<?php

use App\Http\Controllers\Ref\Select2Cont;
use Illuminate\Support\Facades\Route;

Route::get('/select/get-kategori-paginate', [Select2Cont::class, 'getKategoriPaginate'])->name('select.get-kategori-paginate');
Route::get('/select/get-koleksi-jurnal-paginate', [Select2Cont::class, 'getKoleksiJurnalPaginate'])->name('select.get-koleksi-jurnal-paginate');
Route::get('/select/get-produk-paginate', [Select2Cont::class, 'getProdukPaginate'])->name('select.get-produk-paginate');
