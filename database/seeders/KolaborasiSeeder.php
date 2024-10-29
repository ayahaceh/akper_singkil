<?php

namespace Database\Seeders;

use App\Models\KolaborasiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KolaborasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KolaborasiModel::truncate();

        $create = [
            [
                'nama'  => 'Kab. Aceh Singkil',
                'logo'  => 'aceh_singkil.png',
            ],
        ];

        KolaborasiModel::insert($create);
    }
}
