<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            TentangSeeder::class,
            // JasaSeeder::class,
            // TimSeeder::class,
            // DokumentasiSeeder::class,
            // DokumentasiFotoSeeder::class,
            // TestimoniSeeder::class,
            // PartnerSeeder::class,
            // KolaborasiSeeder::class,

            // Akpes Singkil
            RefJenisMenuSeeder::class,
            MenuSeeder::class,
            RefJenisPublikasiDokumenSeeder::class,
            RefJenisTimSeeder::class,
        ]);
    }
}
