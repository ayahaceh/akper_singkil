<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::truncate();

        // insert role super admin
        $user               = new UserModel();
        $user->username     = 'super_admin';
        $user->nama         = 'Super Admin';
        $user->alamat       = '...';
        $user->email        = 'super_admin@alidata.co.id';
        $user->password     = Hash::make('super_admin');
        $user->profil       = 'default.png';
        $user->role         = USER_ROLE_SUPER_ADMIN;
        $user->status       = USER_STATUS_AKTIF;
        $user->created_at   = now();
        $user->updated_at   = now();
        $user->save();
    }
}
