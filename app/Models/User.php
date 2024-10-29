<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // get foto_profil
    public function getFotoProfilAttribute()
    {
        if (file_exists(public_path('web/foto/profil/' . $this->profil))) {
            return asset('web/foto/profil/' . $this->profil);
        } else {
            return asset('/web/foto/profil/default.png');
        }
    }

    // get foto_profil_compress
    public function getFotoProfilCompressAttribute()
    {
        if (file_exists(public_path('web/foto/profil/compress/' . $this->profil))) {
            return asset('web/foto/profil/compress/' . $this->profil);
        } else {
            return asset('/web/foto/profil/compress/default.png');
        }
    }
}
