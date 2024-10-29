<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kategori';

    public $timestamps = true;

    protected $fillable = [
        'nama_kategori',
    ];

    public function joinBlog()
    {
        return $this->hasOne(BlogModel::class, 'kategori_id');
    }
}
