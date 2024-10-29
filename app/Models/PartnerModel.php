<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model
{
    use HasFactory;

    protected $table = 'partner';

    public $timestamps = false;

    protected $fillable = [
        'logo',
    ];

    // get foto_logo
    public function getFotoLogoAttribute()
    {
        return asset('web/foto/partner/' . $this->logo);
    }
}
