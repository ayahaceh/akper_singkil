<?php

namespace Database\Seeders;

use App\Models\DokumentasiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DokumentasiModel::truncate();

        for ($i = 1; $i <= 10; $i++) {
            DokumentasiModel::create([
                'nama_dokumentasi' => 'Dokumentasi ' . $i,
                'keterangan'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, adipisci soluta quod voluptatum excepturi placeat quia exercitationem eos quis totam. Quia, quisquam. Quasi, quisquam.',
            ]);
        }
    }
}
