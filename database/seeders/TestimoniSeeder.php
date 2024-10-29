<?php

namespace Database\Seeders;

use App\Models\TestimoniModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestimoniModel::truncate();

        $testimonies    = [
            [
                'nama'      => 'Rizki',
                'profesi'   => 'Sekretaris',
                'pesan'     => 'Saya sangat puas dengan pelayanan yang diberikan oleh tim kami. Kami sangat senang bisa berkolaborasi dengan anda untuk menjadi lebih baik lagi.',
                'profil'    => 'default.png',
                'status'    => TESTI_STATUS_AKTIF,
            ],
            [
                'nama'      => 'Udin',
                'profesi'   => 'Kepala Bagian',
                'pesan'     => 'Saya sangat puas dengan pelayanan yang diberikan oleh tim kami. Kami sangat senang bisa berkolaborasi dengan anda untuk menjadi lebih baik lagi.',
                'profil'    => 'default.png',
                'status'    => TESTI_STATUS_AKTIF,
            ],
            [
                'nama'      => 'Budi',
                'profesi'   => 'Pemilik Perusahaan',
                'pesan'     => 'Saya sangat puas dengan pelayanan yang diberikan oleh tim kami. Kami sangat senang bisa berkolaborasi dengan anda untuk menjadi lebih baik lagi.',
                'profil'    => 'default.png',
                'status'    => TESTI_STATUS_AKTIF,
            ],
            [
                'nama'      => 'Andi',
                'profesi'   => 'Tim Pengembang',
                'pesan'     => 'Saya sangat puas dengan pelayanan yang diberikan oleh tim kami. Kami sangat senang bisa berkolaborasi dengan anda untuk menjadi lebih baik lagi.',
                'profil'    => 'default.png',
                'status'    => TESTI_STATUS_NONAKTIF,
            ],
        ];

        foreach ($testimonies as $testimony) {
            TestimoniModel::create($testimony);
        }
    }
}
