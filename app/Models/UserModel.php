<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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
