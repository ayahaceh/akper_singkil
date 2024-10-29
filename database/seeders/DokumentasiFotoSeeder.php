<?php

namespace Database\Seeders;

use App\Models\DokumentasiFotoModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DokumentasiFotoModel::truncate();

        for ($i = 1; $i <= 10; $i++) {
            DokumentasiFotoModel::create([
                'dokumentasi_id' => $i,
                'gambar'         => 'seeder-1.jpg',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DokumentasiFotoModel::create([
                'dokumentasi_id' => $i,
                'gambar'         => 'seeder-2.jpg',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            DokumentasiFotoModel::create([
                'dokumentasi_id' => $i,
                'gambar'         => 'seeder-3.jpg',
            ]);
        }
    }
}
