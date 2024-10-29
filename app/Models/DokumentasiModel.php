<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumentasiModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dokumentasi';

    public $timestamps = true;

    protected $fillable = [
        'nama_dokumentasi',
        'keterangan',
        // 'gambar',
    ];

    // relasi
    public function joinDokumentasiFoto()
    {
        return $this->hasMany(DokumentasiFotoModel::class, 'dokumentasi_id');
    }
}
