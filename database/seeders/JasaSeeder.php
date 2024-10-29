<?php

namespace Database\Seeders;

use App\Models\JasaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JasaModel::truncate();

        $jasa   = [
            [
                'nama_jasa'         => 'Web Development',
                'logo_jasa'              => 'fas fa-code',
                'keterangan_jasa'   => 'Jasa Pembuatan & Pengembangan Aplikasi Berbasis Web yang berkualitas dan berstandar tinggi.'
            ],
            [
                'nama_jasa'         => 'Apps Development',
                'logo_jasa'              => 'fab fa-android',
                'keterangan_jasa'   => 'Jasa Pembuatan & Pengembangan Aplikasi Berbasis Mobile (Android | IOS | Hybrid) dengan kualitas dah harga terbaik.'
            ],
            [
                'nama_jasa'         => 'Layanan Terintegrasi',
                'logo_jasa'              => 'fas fa-chart-pie',
                'keterangan_jasa'   => 'Membangun Layanan komplite yang terintegrasi dan terhubung dengan peralatan (Hardware) kedalam sistem berbasis web dan mobile sekaligus.'
            ],
        ];

        foreach ($jasa as $value) {
            JasaModel::create($value);
        }
    }
}
