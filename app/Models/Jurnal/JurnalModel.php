<?php

namespace App\Models\Jurnal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JurnalModel extends Model
{
    use SoftDeletes;

    protected $table = 'jurnal';

    protected $guarded = [
        'id'
    ];

    public $timestamps = true;

    /* .................................................. Asesor .................................................. */

    // get_berkas_thumbnail
    public function getGetBerkasThumbnailAttribute()
    {
        $file = getPathFile($this->berkas_thumbnail);
        if ($this->berkas_thumbnail && file_exists(public_path($file))) {
            return route('preview.file', ['nama_file' => $this->berkas_thumbnail]);
        }

        return null;
    }

    // get_compress_berkas_thumbnail
    public function getGetCompressBerkasThumbnailAttribute()
    {
        $file = getPathFile($this->berkas_thumbnail);
        if ($this->berkas_thumbnail && file_exists(public_path($file))) {
            return route('preview.file', ['nama_file' => $this->berkas_thumbnail, 'call_compressed' => true]);
        }

        return null;
    }

    // get_berkas_jurnal
    public function getGetBerkasJurnalAttribute()
    {
        $file = getPathFile($this->berkas_jurnal);
        if ($this->berkas_jurnal && file_exists(public_path($file))) {
            return route('preview.file', ['nama_file' => $this->berkas_jurnal]);
        }

        return null;
    }

    /* .................................................. Relasi .................................................. */

    public function joinKoleksiJurnal()
    {
        return $this->belongsTo(KoleksiJurnalModel::class, 'koleksi_jurnal_id');
    }
}
