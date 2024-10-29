<?php

use App\Http\Controllers\FileHandlingCont;
use App\Http\Controllers\Jurnal\JurnalCont;
use App\Http\Controllers\Jurnal\KoleksiJurnalCont;
use App\Http\Controllers\Menu\LamanCont;
use App\Http\Controllers\Pengaturan\KolaborasiCont;
use App\Http\Controllers\PrestasiCont;
use App\Http\Controllers\Public\BlogCont;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCont;
use App\Http\Controllers\Publikasi\PublikasiDokumenCont;
use App\Http\Controllers\Publikasi\PublikasiKegiatanCont;
use App\Http\Controllers\User\UserTimCont;

Route::get('/', [PublicCont::class, 'index'])->name('homepage');

Route::get('/blog', [BlogCont::class, 'index'])->name('blog');
Route::get('/blog/kategori/{nama_kategori}', [BlogCont::class, 'index'])->name('blog.kategori');
Route::get('/blog/{slug}', [BlogCont::class, 'blog_detail'])->name('blog.detail');

Route::get('/web/laman/{slug_nama_menu}', [LamanCont::class, 'show'])->name('web.laman.show');

Route::get('/web/publikasi-dokumen-{ref_jenis_publikasi_dokumen_id}', [PublikasiDokumenCont::class, 'index'])->name('web.publik.publikasi-dokumen');
Route::get('/web/publikasi-dokumen/dokumentasi-kegiatan', [PublikasiKegiatanCont::class, 'index'])->name('web.publik.publikasi-kegiatan');

Route::get('/kerjasama', [KolaborasiCont::class, 'index'])->name('web.kerjasama');

Route::get('/web/publikasi-pegawai-{ref_jenis_tim_id}', [UserTimCont::class, 'index'])->name('web.publikasi-pegawai');

Route::get('/prestasi', [PrestasiCont::class, 'index'])->name('web.publik.prestasi');

Route::get('/jurnal', [KoleksiJurnalCont::class, 'index'])->name('web.publik.koleksi');
Route::get('/jurnal/collect-{koleksi_jurnal_id}', [JurnalCont::class, 'index'])->name('web.publik.koleksi.jurnal');
Route::get('/jurnal/collect-{koleksi_jurnal_id}/jurnal-{id}', [JurnalCont::class, 'show'])->name('web.publik.koleksi.jurnal.show');

// File Handler
Route::get('/down/doc/{nama_file}', [FileHandlingCont::class, 'index'])->name('download.file');
Route::get('/prev/doc/{nama_file}', [FileHandlingCont::class, 'preview'])->name('preview.file');
