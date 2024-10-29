<?php

namespace App\Models\Jurnal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KoleksiJurnalModel extends Model
{
    use SoftDeletes;

    protected $table = 'koleksi_jurnal';

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;
}
