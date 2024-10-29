<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::truncate();

        // insert kategori
        $kategori = [
            'Umum',
            'Senat',
            'Akademik',
            'Pengumuman',
        ];

        foreach ($kategori as $value) {
            KategoriModel::create([
                'nama_kategori' => $value,
            ]);
        }
    }
}
