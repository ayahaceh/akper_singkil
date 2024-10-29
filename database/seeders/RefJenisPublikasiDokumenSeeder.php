<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefJenisPublikasiDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_jenis_publikasi_dokumen')->truncate();
        DB::table('ref_jenis_publikasi_dokumen')->insert([
            [
                'id'            => 1,
                'nama_jenis'    => 'Dokumen Akademik',
            ],
            [
                'id'            => 2,
                'nama_jenis'    => 'Dokumen Kemahasiswaan',
            ],
            [
                'id'            => 3,
                'nama_jenis'    => 'Dokumen Kerjasama',
            ],
        ]);
    }
}
