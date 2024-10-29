<?php

use App\Http\Controllers\Public\BlogCont;
use App\Http\Controllers\Public\DokumentasiCont;
use App\Http\Controllers\Public\LayananCont;
use App\Http\Controllers\Public\ProdukCont;
use App\Http\Controllers\Public\TentangCont;
use App\Http\Controllers\Public\TestimoniCont;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCont;

Route::get('/', [PublicCont::class, 'index'])->name('homepage');

Route::get('/blog', [BlogCont::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogCont::class, 'blog_detail'])->name('blog.detail');

Route::get('/produk', [ProdukCont::class, 'index'])->name('produk');
Route::get('/produk/{slug}', [ProdukCont::class, 'produk_detail'])->name('produk.detail');

Route::get('/layanan', [LayananCont::class, 'index'])->name('layanan');

Route::get('/tentang', [TentangCont::class, 'index'])->name('tentang');

Route::get('/kontak', [TentangCont::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim-pesan', [TentangCont::class, 'kirim_pesan'])->name('kirim-pesan');

Route::get('/dokumentasi', [DokumentasiCont::class, 'index'])->name('dokumentasi');

Route::get('/testimoni', [TestimoniCont::class, 'index'])->name('testimoni');
