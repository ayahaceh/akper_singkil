<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefJenisMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_jenis_menu')->truncate();
        DB::table('ref_jenis_menu')->insert([
            [
                'id'            => 1,
                'nama_jenis'    => 'Laman',
            ],
            [
                'id'            => 2,
                'nama_jenis'    => 'Redirect Link',
            ],
        ]);
    }
}
