<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KolaborasiModel extends Model
{
    use HasFactory;

    protected $table = 'kolaborasi';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'logo',
    ];

    // get foto_logo
    public function getFotoLogoAttribute()
    {
        return asset('web/foto/kolaborasi/' . $this->logo);
    }
}
