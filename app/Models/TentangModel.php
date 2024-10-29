<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangModel extends Model
{
    use HasFactory;

    protected $table = 'tentang';

    public $timestamps = false;

    protected $fillable = [
        'tentang',
        'alamat',
        'visi',
        'misi',
        'awal_berdiri',
        'email',
        'telepon',
        'whatsapp',
        'facebook',
        'twitter',
        'google_plus',
        'instagram',
        'linkedin',
    ];

    protected $casts = [
        'awal_berdiri' => 'datetime',
    ];

    // generate whatsapp_link
    public function getWhatsappLinkAttribute()
    {
        $whatsapp = $this->whatsapp;

        if ($whatsapp) {
            $whatsapp = str_replace(' ', '', $whatsapp);
            $whatsapp = str_replace('+62', '62', $whatsapp);
            $whatsapp = str_replace('(', '', $whatsapp);
            $whatsapp = str_replace(')', '', $whatsapp);
            $whatsapp = str_replace('-', '', $whatsapp);
            $whatsapp = str_replace('.', '', $whatsapp);
            $whatsapp = str_replace('/', '', $whatsapp);
            $whatsapp = str_replace(' ', '', $whatsapp);
            $whatsapp = 'https://wa.me/' . $whatsapp;
        }

        return $whatsapp;
    }

    // generate telepon_format ex: +628-111-65-7788
    public function getTeleponFormatAttribute()
    {
        $telepon = $this->telepon;

        if ($telepon) {
            $telepon = str_replace(' ', '', $telepon);
            $telepon = str_replace('+62', '62', $telepon);
            $telepon = str_replace('(', '', $telepon);
            $telepon = str_replace(')', '', $telepon);
            $telepon = str_replace('-', '', $telepon);
            $telepon = str_replace('.', '', $telepon);
            $telepon = str_replace('/', '', $telepon);
            $telepon = str_replace(' ', '', $telepon);
            $telepon = '+' . substr($telepon, 0, 3) . '-' . substr($telepon, 3, 3) . '-' . substr($telepon, 6, 2) . '-' . substr($telepon, 8);
        }

        return $telepon;
    }

    // generate link_facebook
    public function getLinkFacebookAttribute()
    {
        if ($this->facebook) {
            return LINK_PROFIL_FACEBOOK . $this->facebook;
        } else {
            return null;
        }
    }

    // generate link_twitter
    public function getLinkTwitterAttribute()
    {
        if ($this->twitter) {
            return LINK_PROFIL_TWITTER . $this->twitter;
        } else {
            return null;
        }
    }

    // generate link_instagram
    public function getLinkInstagramAttribute()
    {
        if ($this->instagram) {
            return LINK_PROFIL_INSTAGRAM . $this->instagram;
        } else {
            return null;
        }
    }

    // generate link_linkedin
    public function getLinkLinkedinAttribute()
    {
        if ($this->linkedin) {
            return LINK_PROFIL_LINKEDIN . $this->linkedin;
        } else {
            return null;
        }
    }
}
