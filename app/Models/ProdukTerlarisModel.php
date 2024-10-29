<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTerlarisModel extends Model
{
    use HasFactory;

    protected $table = 'produk_terlaris';

    public $timestamps = true;

    // relasi
    public function joinProduk()
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id')->withTrashed();
    }
}
