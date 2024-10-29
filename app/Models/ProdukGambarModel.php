<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukGambarModel extends Model
{
    use HasFactory;

    protected $table = 'produk_gambar';

    public $timestamps = false;

    // get foto_gambar
    public function getFotoGambarAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/produk/' . $this->gambar))) {
            return asset('web/foto/postingan/produk/' . $this->gambar);
        } else {
            return asset('/webfoto/postingan/produk/no-image.png');
        }
    }

    // get foto_gambar_compress
    public function getFotoGambarCompressAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/produk/compress/' . $this->gambar))) {
            return asset('web/foto/postingan/produk/compress/' . $this->gambar);
        } else {
            return asset('/webfoto/postingan/produk/no-image.png');
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
