<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tim';

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'nip',
        'selaku',
        'profil',
        'tentang',

        // kontak
        'email',
        'telepon',
        'whatsapp',
        'facebook',
        'twitter',
        'google_plus',
        'instagram',
        'linkedin',

        'no_urut',
    ];

    // get foto_profil
    public function getFotoProfilAttribute()
    {
        if (file_exists(public_path('web/foto/tim/' . $this->profil))) {
            return asset('web/foto/tim/' . $this->profil);
        } else {
            return asset('/web/foto/tim/default.png');
        }
    }

    // get foto_profil_compress
    public function getFotoProfilCompressAttribute()
    {
        if (file_exists(public_path('web/foto/tim/compress/' . $this->profil))) {
            return asset('web/foto/tim/compress/' . $this->profil);
        } else {
            return asset('/web/foto/tim/compress/default.png');
        }
    }

    // generate link_facebook
    public function getLinkFacebookAttribute()
    {
        if ($this->facebook) {
            return 'https://www.facebook.com/' . $this->facebook;
        } else {
            return null;
        }
    }

    // generate link_twitter
    public function getLinkTwitterAttribute()
    {
        if ($this->twitter) {
            return 'https://www.twitter.com/' . $this->twitter;
        } else {
            return null;
        }
    }

    // generate link_instagram
    public function getLinkInstagramAttribute()
    {
        if ($this->instagram) {
            return 'https://www.instagram.com/' . $this->instagram;
        } else {
            return null;
        }
    }

    // generate link_linkedin
    public function getLinkLinkedinAttribute()
    {
        if ($this->linkedin) {
            return 'https://www.linkedin.com/in/' . $this->linkedin;
        } else {
            return null;
        }
    }

    public function joinRefJenisTim()
    {
        return $this->belongsTo(RefJenisTimModel::class, 'ref_jenis_tim_id');
    }
}
