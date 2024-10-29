<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LamanModel extends Model
{
    use SoftDeletes;

    protected $table = 'laman';

    protected $guarded = [
        'id',
    ];

    public $timestamps = true;
}
