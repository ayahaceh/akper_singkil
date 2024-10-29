<?php

namespace Database\Seeders;

use App\Models\PartnerModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerModel::truncate();

        $create = [
            [
                'logo' => 'qris.png',
            ],
        ];

        PartnerModel::insert($create);
    }
}
