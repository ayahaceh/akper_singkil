<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefJenisTimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_jenis_tim')->truncate();
        DB::table('ref_jenis_tim')->insert([
            [
                'id'            => 1,
                'nama_jenis'    => 'Dosen',
            ],
            [
                'id'            => 2,
                'nama_jenis'    => 'Staff',
            ]
        ]);
    }
}
