<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;

    protected $table = 'jasa';

    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    // get_logo_jasa
    public function getGetLogoJasaAttribute()
    {
        $file = getPathFile($this->logo_jasa);
        if ($this->logo_jasa && file_exists(public_path($file))) {
            return route('preview.file', ['nama_file' => $this->logo_jasa]);
        }

        return null;
    }
}
