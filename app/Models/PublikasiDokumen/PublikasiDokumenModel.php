<?php

namespace App\Models\PublikasiDokumen;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublikasiDokumenModel extends Model
{
    use SoftDeletes;

    protected $table = 'publikasi_dokumen';

    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    /* .................................................. Asesor .................................................. */

    // get_berkas_pendukung
    public function getGetBerkasPendukungAttribute()
    {
        $file = getPathFile($this->berkas_pendukung);
        if ($this->berkas_pendukung && file_exists(public_path($file))) {
            return route('preview.file', ['nama_file' => $this->berkas_pendukung]);
        }

        return null;
    }

    /* .................................................. Relasi .................................................. */

    public function joinCreatedBy()
    {
        return $this->belongsTo(UserModel::class, 'created_by');
    }
}
