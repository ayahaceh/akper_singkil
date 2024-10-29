<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'profesi',
        'pesan',
        'profil',
        'status',
    ];

    // get foto_profil
    public function getFotoProfilAttribute()
    {
        if (file_exists(public_path('web/foto/testimoni/' . $this->profil))) {
            return asset('web/foto/testimoni/' . $this->profil);
        } else {
            return asset('/web/foto/testimoni/default.png');
        }
    }
}
