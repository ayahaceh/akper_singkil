<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKategoriModel extends Model
{
    use HasFactory;

    protected $table = 'produk_kategori';

    public $timestamps = false;

    protected $fillable = [
        'produk_id',
        'kategori_id',
    ];

    // relasi
    public function joinKategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
}
