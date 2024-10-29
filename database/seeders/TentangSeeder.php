<?php

namespace Database\Seeders;

use App\Models\TentangModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TentangModel::truncate();

        TentangModel::create([
            'tentang'       => 'Akademi Keperawatan Yappkes Aceh Singkil merupakan salah satu kampus favorit calon mahasiswa baru di Aceh.Lokasinya berada di Jl Raya Rimo-Singkil Km 10 23784 Aceh, Indonesia. Setiap tahunnya, kampus ini selalu ramai dipadati calon mahasiswa baru. Sebagai informasi umum, Akademi Keperawatan Yappkes Aceh Singkil berdiri pada tanggal 15 July 2004 dengan nomor SK 80DO2004. Saat ini, Akademi Keperawatan Yappkes Aceh Singkil belum terakreditasi oleh BAN-PT. Dengan tenaga pengajar profesional, Akademi Keperawatan Yappkes Aceh Singkil mampu menjadikan lulusan memiliki skill dan pengetahuan yang cukup luas. Selain itu, kampus telah dilengkapi dengan sarana dan prasarana pembelajar yang memadai, sehingga memungkinkan mahasiswa dapat fokus belajar demi menggapai asa.',
            'alamat'        => 'Jl Raya Rimo-Singkil Km 10 23784 Aceh, Indonesia Aceh, Indonesia',
            'visi'          => '',
            'misi'          => '',
            'awal_berdiri'  => '2004-07-15',
            'email'         => 'akperyappkes@gmail.com',
            'telepon'       => '0658 21877',
            'whatsapp'      => null,
            'facebook'      => 'akperyappkes.acehsingkil',
            'twitter'       => null,
            'google_plus'   => null,
            'instagram'     => 'akperyappkes_aceh_singkil',
            'linkedin'      => null,
        ]);
    }
}
