<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->truncate();

        // Menu Home
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 1,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Home',
                'laman_id'              => null,
                'redirect_link'         => '/',
                'is_required'           => true,
            ],
        ]);

        // Menu Profil
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 2,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Profil',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 3,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Sejarah',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 4,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Visi & Misi',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 5,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Logo & Arti',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 6,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Mars Akpes',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 7,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Struktur Organisasi',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 8,
                'menu_id'               => 2,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Pimpinan',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
        ]);

        // Menu Akademik
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 9,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Akademik',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 10,
                'menu_id'               => 9,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Kalender Akademik',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 11,
                'menu_id'               => 9,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Lulusan Ujikom Per Periode',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 12,
                'menu_id'               => 9,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Lulusan Ujikom Per Angkatan',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 13,
                'menu_id'               => 9,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Dokumen Akademik',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-dokumen-1',
                'is_required'           => true,
            ],
            [
                'id'                    => 14,
                'menu_id'               => 9,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Informasi Akademik',
                'laman_id'              => null,
                'redirect_link'         => '/blog/kategori/akademik',
                'is_required'           => false,
            ],
        ]);

        // Menu Kemahasiswaan
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 15,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Kemahasiswaan',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 16,
                'menu_id'               => 15,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Dokumen Kemahasiswaan',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-dokumen-2',
                'is_required'           => true,
            ],
            [
                'id'                    => 17,
                'menu_id'               => 15,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Struktur Organisasi Senat Mahasiswa',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 18,
                'menu_id'               => 15,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Prestasi',
                'laman_id'              => null,
                'redirect_link'         => '/prestasi',
                'is_required'           => true,
            ],
        ]);

        // Menu Kerjasama
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 19,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Kerjasama',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 20,
                'menu_id'               => 19,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'MOU Kerjasama',
                'laman_id'              => null,
                'redirect_link'         => '/kerjasama',
                'is_required'           => true,
            ],
            [
                'id'                    => 21,
                'menu_id'               => 19,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Dokumen Kerjasama',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-dokumen-3',
                'is_required'           => true,
            ],
        ]);

        // Menu Home Care
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 22,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Home Care',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 23,
                'menu_id'               => 22,
                'ref_jenis_menu_id'     => 1,
                'nama_menu'             => 'Visi & Misi',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            [
                'id'                    => 24,
                'menu_id'               => 22,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Dokumentasi Kegiatan',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-dokumen/dokumentasi-kegiatan',
                'is_required'           => true,
            ],
        ]);

        // Menu Data Dosen
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 25,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 0,
                'nama_menu'             => 'Data Dosen',
                'laman_id'              => null,
                'redirect_link'         => null,
                'is_required'           => false,
            ],
            // Sub-menu
            [
                'id'                    => 26,
                'menu_id'               => 25,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Dosen',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-pegawai-1',
                'is_required'           => true,
            ],
            [
                'id'                    => 27,
                'menu_id'               => 25,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Staff',
                'laman_id'              => null,
                'redirect_link'         => '/web/publikasi-pegawai-2',
                'is_required'           => true,
            ],
        ]);

        // Menu Jurnal & Pengumuman
        DB::table('menu')->insert([
            // Menu
            [
                'id'                    => 28,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Jurnal',
                'laman_id'              => null,
                'redirect_link'         => '/jurnal',
                'is_required'           => true,
            ],
            [
                'id'                    => 29,
                'menu_id'               => null,
                'ref_jenis_menu_id'     => 2,
                'nama_menu'             => 'Pengumuman',
                'laman_id'              => null,
                'redirect_link'         => '/blog/kategori/pengumuman',
                'is_required'           => false,
            ],
        ]);
    }
}
