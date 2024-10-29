<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiFotoModel extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_foto';

    public $timestamps = false;

    protected $fillable = [
        'dokumentasi_id',
        'gambar',
    ];

    // get foto_gambar
    public function getFotoGambarAttribute()
    {
        if (file_exists(public_path('web/foto/dokumentasi/' . $this->gambar))) {
            return asset('web/foto/dokumentasi/' . $this->gambar);
        } else {
            return null;
        }
    }

    // get size_gambar
    public function getSizeGambarAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/produk/' . $this->gambar))) {
            $size = filesize(public_path('web/foto/postingan/produk/' . $this->gambar));
            // convert to MB
            $size = $size / 1024 / 1024;
            return round($size, 2);
        } else {
            return 0;
        }
    }
}
