<?php

namespace App\Models\Menu;

use App\Models\LamanModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuModel extends Model
{
    protected $table = 'menu';

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    /* ............................................................ Asesor .................................................. */

    // get_slug
    public function getGetSlugAttribute()
    {
        return Str::of($this->nama_menu)->slug('-');
    }

    /* ............................................................ Relasi .................................................. */

    public function joinSubMenus()
    {
        return $this->hasMany(MenuModel::class, 'menu_id');
    }

    public function joinRefJenisMenu()
    {
        return $this->belongsTo(RefJenisMenuModel::class, 'ref_jenis_menu_id');
    }

    public function joinLaman()
    {
        return $this->belongsTo(LamanModel::class, 'laman_id');
    }
}
