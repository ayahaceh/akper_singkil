<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Dashboard\DashboardCont,
    Master\KategoriCont,
    Postingan\BlogCont,
    Master\DokumentasiCont,
    Pengaturan\TentangCont,
};
use App\Http\Controllers\Jurnal\JurnalCont;
use App\Http\Controllers\Jurnal\KoleksiJurnalCont;
use App\Http\Controllers\Menu\LamanCont;
use App\Http\Controllers\Menu\MenuCont;
use App\Http\Controllers\Pengaturan\KolaborasiCont;
use App\Http\Controllers\Pengaturan\LayananCont;
use App\Http\Controllers\Publikasi\PublikasiDokumenCont;
use App\Http\Controllers\User\ProfilCont;
use App\Http\Controllers\User\UserAdminCont;
use App\Http\Controllers\User\UserTimCont;

Route::group(['middleware' => ['auth', 'role:1']], function () {
    // Admin
    Route::group(['prefix' => 'admin'], function () {
        // Dashboard
        Route::get('/dashboard', [DashboardCont::class, 'index'])->name('dashboard');

        // Menu
        Route::get('/menu', [MenuCont::class, 'index'])->name('menu.index');
        Route::put('/menu/change-link/{id}', [MenuCont::class, 'change_link'])->name('menu.change-link');
        Route::get('/menu/laman/{menu_id}/{laman_id?}/', [LamanCont::class, 'create_or_update'])->name('menu.laman.create-or-update');
        Route::post('/menu/laman/{menu_id}/{laman_id?}', [LamanCont::class, 'create_or_update_store'])->name('menu.laman.create-or-update.store');

        // Postingan Berita / Blog
        Route::get('/postingan/blog', [BlogCont::class, 'index'])->name('postingan.blogg.index');
        Route::get('/postingan/blog/detail/{id}', [BlogCont::class, 'show'])->name('postingan.blogg.show');
        Route::get('/postingan/blog/baru', [BlogCont::class, 'create'])->name('postingan.blog.create');
        Route::post('/postingan/blog/store', [BlogCont::class, 'store'])->name('postingan.blog.store');
        Route::get('/postingan/blog/ubah/{id}', [BlogCont::class, 'edit'])->name('postingan.blogg.edit');
        Route::put('/postingan/blog/ubah/{id}', [BlogCont::class, 'update'])->name('postingan.blog.update');
        Route::get('/postingan/blog/move-draf/{id}', [BlogCont::class, 'move_draf'])->name('postingan.blog.move-draf');
        Route::get('/postingan/blog/restore-draf/{id}', [BlogCont::class, 'restore_draf'])->name('postingan.blog.restore-draf');
        Route::delete('/postingan/blog/delete/{id}', [BlogCont::class, 'delete'])->name('postingan.blog.delete');

        // Prestasi Diraih
        Route::get('/prestasi', [LayananCont::class, 'index'])->name('prestasi.index');
        Route::post('/prestasi/store', [LayananCont::class, 'store'])->name('prestasi.store');
        Route::put('/prestasi/update/{id}', [LayananCont::class, 'update'])->name('prestasi.update');
        Route::delete('/prestasi/delete/{id}', [LayananCont::class, 'delete'])->name('prestasi.delete');

        // Kegiatan Home Care
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

        // Publikasi Dokumen
        Route::get('/publikasi-dokumen/{ref_jenis_publikasi_dokumen_id}', [PublikasiDokumenCont::class, 'index'])->name('publikasi-dokumen.index');
        Route::get('/publikasi-dokumen/{ref_jenis_publikasi_dokumen_id}/tambah', [PublikasiDokumenCont::class, 'create'])->name('publikasi-dokumen.create');
        Route::post('/publikasi-dokumen/{ref_jenis_publikasi_dokumen_id}/store', [PublikasiDokumenCont::class, 'store'])->name('publikasi-dokumen.store');
        Route::get('/publikasi-dokumen/{ref_jenis_publikasi_dokumen_id}/edit/{id}', [PublikasiDokumenCont::class, 'edit'])->name('publikasi-dokumen.edit');
        Route::put('/publikasi-dokumen/{ref_jenis_publikasi_dokumen_id}/update/{id}', [PublikasiDokumenCont::class, 'update'])->name('publikasi-dokumen.update');
        Route::delete('/publikasi-dokumen/delete/{id}', [PublikasiDokumenCont::class, 'delete'])->name('publikasi-dokumen.delete');

        // MOU Kerjasama
        Route::get('/kolaborasi', [KolaborasiCont::class, 'index'])->name('kolaborasi.index');
        Route::post('/kolaborasi/store', [KolaborasiCont::class, 'store'])->name('kolaborasi.store');
        Route::put('/kolaborasi/update/{id}', [KolaborasiCont::class, 'update'])->name('kolaborasi.update');
        Route::delete('/kolaborasi/delete/{id}', [KolaborasiCont::class, 'delete'])->name('kolaborasi.delete');

        // Koleksi Jurnal
        Route::get('/koleksi-jurnal', [KoleksiJurnalCont::class, 'index'])->name('koleksi-jurnal.index');
        Route::post('/koleksi-jurnal/tambah/store', [KoleksiJurnalCont::class, 'store'])->name('koleksi-jurnal.store');
        Route::put('/koleksi-jurnal/update/{id}', [KoleksiJurnalCont::class, 'update'])->name('koleksi-jurnal.update');
        Route::delete('/koleksi-jurnal/delete/{id}', [KoleksiJurnalCont::class, 'delete'])->name('koleksi-jurnal.delete');

        // Jurnal Ilmiah
        Route::get('/publikasi/jurnal', [JurnalCont::class, 'index'])->name('publikasi.jurnal.index');
        Route::get('/publikasi/jurnal/baru', [JurnalCont::class, 'create'])->name('publikasi.jurnal.create');
        Route::post('/publikasi/jurnal/store', [JurnalCont::class, 'store'])->name('publikasi.jurnal.store');
        Route::get('/publikasi/jurnal/ubah/{id}', [JurnalCont::class, 'edit'])->name('publikasi.jurnal.edit');
        Route::put('/publikasi/jurnal/update/{id}', [JurnalCont::class, 'update'])->name('publikasi.jurnal.update');
        Route::delete('/publikasi/jurnal/delete/{id}', [JurnalCont::class, 'delete'])->name('publikasi.jurnal.delete');

        // Master
        Route::group(['prefix' => 'master'], function () {
            // Kategori
            Route::get('/kategori', [KategoriCont::class, 'index'])->name('kategori.index');
            Route::post('/kategori/tambah/store', [KategoriCont::class, 'store'])->name('kategori.store');
            Route::put('/kategori/update/{id}', [KategoriCont::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/delete/{id}', [KategoriCont::class, 'delete'])->name('kategori.delete');

            // Dosen & Staff
            Route::get('/user/tim/tambah', [UserTimCont::class, 'create'])->name('user.tim.create');
            Route::post('/user/tim/store', [UserTimCont::class, 'store'])->name('user.tim.store');
            Route::get('/user/tim/ubah/{id}', [UserTimCont::class, 'edit'])->name('user.tim.ubah');
            Route::put('/user/tim/update/{id}', [UserTimCont::class, 'update'])->name('user.tim.update');
            Route::delete('/user/tim/delete/{id}', [UserTimCont::class, 'delete'])->name('user.tim.delete');
            Route::get('/user/tim/{ref_jenis_tim_id?}', [UserTimCont::class, 'index'])->name('user.tim.index');

            // Manejemen User Admin
            Route::get('/user/admin', [UserAdminCont::class, 'index'])->name('user.admin.index');
            Route::get('/user/admin/tambah', [UserAdminCont::class, 'create'])->name('user.admin.create');
            Route::post('/user/admin/store', [UserAdminCont::class, 'store'])->name('user.admin.store');
            Route::get('/user/admin/ubah/{id}', [UserAdminCont::class, 'edit'])->name('user.admin.ubah');
            Route::put('/user/admin/update/{id}', [UserAdminCont::class, 'update'])->name('user.admin.update');
            Route::delete('/user/admin/delete/{id}', [UserAdminCont::class, 'delete'])->name('user.admin.delete');
        });
        // End Master

        // Pengaturan
        Route::group(['prefix' => 'pengaturan'], function () {
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
