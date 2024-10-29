<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Dashboard\DashboardCont,
    Master\KategoriCont,
    Postingan\BlogCont,
    Postingan\ProdukCont,
    Master\TestimoniCont,
    Master\DokumentasiCont,
    Pengaturan\TentangCont,
};
use App\Http\Controllers\Pengaturan\KolaborasiCont;
use App\Http\Controllers\Pengaturan\LayananCont;
use App\Http\Controllers\Pengaturan\PartnerCont;
use App\Http\Controllers\User\ProfilCont;
use App\Http\Controllers\User\UserAdminCont;
use App\Http\Controllers\User\UserTimCont;

Route::group(['middleware' => ['auth', 'role:1']], function () {
    // Admin
    Route::group(['prefix' => 'admin'], function () {
        // Dashboard
        Route::get('/dashboard', [DashboardCont::class, 'index'])->name('dashboard');

        // Postingan Blog
        Route::get('/postingan/blog/baru', [BlogCont::class, 'create'])->name('postingan.blog.create');
        Route::post('/postingan/blog/store', [BlogCont::class, 'store'])->name('postingan.blog.store');

        // Postingan Produk
        // Route::get('/postingan/produk/baru/step1', [ProdukCont::class, 'step1_create'])->name('postingan.produk.create');
        // Route::get('/postingan/produk/baru/step2/{id}', [ProdukCont::class, 'step2_create'])->name('postingan.produk.step2-create');
        // Route::post('/postingan/produk/step1-store', [ProdukCont::class, 'step1_store'])->name('postingan.produk.step1-store');
        // Route::post('/postingan/produk/step2-store/{id}', [ProdukCont::class, 'step2_store'])->name('postingan.produk.step2-store');

        // Master
        Route::group(['prefix' => 'master'], function () {
            // Kategori
            Route::get('/kategori', [KategoriCont::class, 'index'])->name('kategori.index');
            Route::post('/kategori/tambah/store', [KategoriCont::class, 'store'])->name('kategori.store');
            Route::put('/kategori/update/{id}', [KategoriCont::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/delete/{id}', [KategoriCont::class, 'delete'])->name('kategori.delete');

            // Postingan Blog
            Route::get('/postingan/blog', [BlogCont::class, 'index'])->name('postingan.blogg.index');
            Route::get('/postingan/blog/detail/{id}', [BlogCont::class, 'show'])->name('postingan.blogg.show');
            Route::get('/postingan/blog/ubah/{id}', [BlogCont::class, 'edit'])->name('postingan.blogg.edit');
            Route::put('/postingan/blog/ubah/{id}', [BlogCont::class, 'update'])->name('postingan.blog.update');
            Route::get('/postingan/blog/move-draf/{id}', [BlogCont::class, 'move_draf'])->name('postingan.blog.move-draf');
            Route::get('/postingan/blog/restore-draf/{id}', [BlogCont::class, 'restore_draf'])->name('postingan.blog.restore-draf');
            Route::delete('/postingan/blog/delete/{id}', [BlogCont::class, 'delete'])->name('postingan.blog.delete');

            // Postingan Produk
            // Route::delete('/postingan/produk/step2-delete', [ProdukCont::class, 'step2_delete'])->name('postingan.produk.step2-delete');
            // Route::get('/postingan/produk/baru/done', [ProdukCont::class, 'send_message'])->name('postingan.produk.send-message');
            // Route::get('/postingan/produk', [ProdukCont::class, 'index'])->name('postingan.produkk.index');
            // Route::get('/postingan/produk/detail/{id}', [ProdukCont::class, 'show'])->name('postingan.produkk.show');
            // Route::get('/postingan/produk/ubah/{id}', [ProdukCont::class, 'edit'])->name('postingan.produkk.edit');
            // Route::put('/postingan/produk/ubah/{id}', [ProdukCont::class, 'update'])->name('postingan.produk.update');
            // Route::delete('/postingan/produk/delete/{id}', [ProdukCont::class, 'delete'])->name('postingan.produk.delete');
            // Route::post('/postingan/produk-teratas/store', [ProdukCont::class, 'teratas_store'])->name('postingan.produk-teratas.store');
            // Route::delete('/postingan/produk-teratas/delete/{id}', [ProdukCont::class, 'teratas_delete'])->name('postingan.produk-teratas.delete');

            // Testimoni
            // Route::get('/testimoni', [TestimoniCont::class, 'index'])->name('testimoni.index');
            // Route::post('/testimoni/store', [TestimoniCont::class, 'store'])->name('testimoni.store');
            // Route::put('/testimoni/update/{id}', [TestimoniCont::class, 'update'])->name('testimoni.update');
            // Route::delete('/testimoni/delete/{id}', [TestimoniCont::class, 'delete'])->name('testimoni.delete');

            // Dokumentasi
            Route::get('/dokumentasi', [DokumentasiCont::class, 'index'])->name('dokumentasi.index');
            Route::get('/dokumentasi/tambah', [DokumentasiCont::class, 'create_1'])->name('dokumentasi.create');
            Route::post('/dokumentasi/store', [DokumentasiCont::class, 'store_1'])->name('dokumentasi.store_1');
            Route::get('/dokumentasi/tambah/{id}', [DokumentasiCont::class, 'create_2'])->name('dokumentasi.create_2');
            Route::post('/dokumentasi/store/{id}', [DokumentasiCont::class, 'store_2'])->name('dokumentasi.store_2');
            Route::delete('/dokumentasi/delete/gambar', [DokumentasiCont::class, 'delete_foto'])->name('dokumentasi.delete-foto');
            Route::get('/dokumentasi/done', [DokumentasiCont::class, 'done'])->name('dokumentasi.send-message');
            Route::get('/dokumentasi/ubah/{id}', [DokumentasiCont::class, 'edit'])->name('dokumentasi.edit');
            Route::put('/dokumentasi/update/{id}', [DokumentasiCont::class, 'update'])->name('dokumentasi.update');
            Route::delete('/dokumentasi/delete/{id}', [DokumentasiCont::class, 'delete'])->name('dokumentasi.delete');

            Route::get('/user/admin', [UserAdminCont::class, 'index'])->name('user.admin.index');
            Route::get('/user/admin/tambah', [UserAdminCont::class, 'create'])->name('user.admin.create');
            Route::post('/user/admin/store', [UserAdminCont::class, 'store'])->name('user.admin.store');
            Route::get('/user/admin/ubah/{id}', [UserAdminCont::class, 'edit'])->name('user.admin.ubah');
            Route::put('/user/admin/update/{id}', [UserAdminCont::class, 'update'])->name('user.admin.update');
            Route::delete('/user/admin/delete/{id}', [UserAdminCont::class, 'delete'])->name('user.admin.delete');

            Route::get('/user/tim', [UserTimCont::class, 'index'])->name('user.tim.index');
            Route::get('/user/tim/tambah', [UserTimCont::class, 'create'])->name('user.tim.create');
            Route::post('/user/tim/store', [UserTimCont::class, 'store'])->name('user.tim.store');
            Route::get('/user/tim/ubah/{id}', [UserTimCont::class, 'edit'])->name('user.tim.ubah');
            Route::put('/user/tim/update/{id}', [UserTimCont::class, 'update'])->name('user.tim.update');
            Route::delete('/user/tim/delete/{id}', [UserTimCont::class, 'delete'])->name('user.tim.delete');
        });
        // End Master

        // Pengaturan
        Route::group(['prefix' => 'pengaturan'], function () {
            // Layanan Jasa
            // Route::get('/layanan', [LayananCont::class, 'index'])->name('layanan.index');
            // Route::post('/layanan/store', [LayananCont::class, 'store'])->name('layanan.store');
            // Route::put('/layanan/update/{id}', [LayananCont::class, 'update'])->name('layanan.update');
            // Route::delete('/layanan/delete/{id}', [LayananCont::class, 'delete'])->name('layanan.delete');

            // Kolaborasi
            Route::get('/kolaborasi', [KolaborasiCont::class, 'index'])->name('kolaborasi.index');
            Route::post('/kolaborasi/store', [KolaborasiCont::class, 'store'])->name('kolaborasi.store');
            Route::put('/kolaborasi/update/{id}', [KolaborasiCont::class, 'update'])->name('kolaborasi.update');
            Route::delete('/kolaborasi/delete/{id}', [KolaborasiCont::class, 'delete'])->name('kolaborasi.delete');

            // Partner
            // Route::get('/partner', [PartnerCont::class, 'index'])->name('partner.index');
            // Route::post('/partner/store', [PartnerCont::class, 'store'])->name('partner.store');
            // Route::put('/partner/update/{id}', [PartnerCont::class, 'update'])->name('partner.update');
            // Route::delete('/partner/delete/{id}', [PartnerCont::class, 'delete'])->name('partner.delete');

            // Kontak
            Route::get('/tentang', [TentangCont::class, 'edit'])->name('tentang.edit');
            Route::put('/tentang/update-personal', [TentangCont::class, 'update_personal'])->name('tentang.update-personal');
            Route::put('/tentang/update-kontak', [TentangCont::class, 'update_kontak'])->name('tentang.update-kontak');
        });
        // End Pengaturan
    });

    // Profile
    Route::get('/profil', [ProfilCont::class, 'edit'])->name('profil-saya');
    Route::put('/profil/update', [ProfilCont::class, 'edit_update'])->name('profil-saya.update');
    Route::get('/ganti-sandi', [ProfilCont::class, 'ganti_sandi'])->name('ganti-sandi');
    Route::put('/ganti-sandi/update', [ProfilCont::class, 'ganti_sandi_update'])->name('ganti-sandi.update');

    // End Admin
});
