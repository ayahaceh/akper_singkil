<?php

namespace Database\Seeders;

use App\Models\TimModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimModel::truncate();

        $teams  = [
            [
                'nama'          => 'Udin Jampang',
                'selaku'        => 'Founder + CEO',
                'profil'        => 'default.png',
                'tentang'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sapiente adipisci nesciunt sunt quod rem eaque incidunt magnam, praesentium at.',
                'email'         => 'udinjampang@gmail.com',
                'telepon'       => '681234567890',
                'whatsapp'      => '681234567890',
                'facebook'      => 'udinjampang',
                'twitter'       => 'udinjampang',
                'google_plus'   => 'udinjampang',
                'instagram'     => 'udinjampang',
                'linkedin'      => 'udinjampang',
            ],
            [
                'nama'          => 'Asrul',
                'selaku'        => 'Web Developer',
                'profil'        => 'default.png',
                'tentang'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sapiente adipisci nesciunt sunt quod rem eaque incidunt magnam, praesentium at.',
                'email'         => 'asrul@gmail.com',
                'telepon'       => '681234567890',
                'whatsapp'      => '681234567890',
                'facebook'      => 'asrul',
                'twitter'       => 'asrul',
                'google_plus'   => 'asrul',
                'instagram'     => 'asrul',
                'linkedin'      => 'asrul',
            ],
            [
                'nama'          => 'Agus Akbar',
                'selaku'        => 'IT Support',
                'profil'        => 'default.png',
                'tentang'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti sapiente adipisci nesciunt sunt quod rem eaque incidunt magnam, praesentium at.',
                'email'         => 'agusakbar@yahoo.com',
                'telepon'       => '681234567890',
                'whatsapp'      => '681234567890',
                'facebook'      => 'agusakbar',
                'twitter'       => 'agusakbar',
                'google_plus'   => 'agusakbar',
                'instagram'     => 'agusakbar',
                'linkedin'      => 'agusakbar',
            ],
        ];

        foreach ($teams as $team) {
            TimModel::create($team);
        }
    }
}
