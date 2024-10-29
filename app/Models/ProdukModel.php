<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ProdukModel extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $table = 'produk';

    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'slug',
        'keterangan_produk',
        'thumbnail',
        'link_demo',
        'jml_view',
    ];

    // auto slug
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_produk')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255) // maksimal panjang slug
            ->doNotGenerateSlugsOnUpdate(); // jangan regenerate slug jika update
    }

    // relasi
    public function joinProdukGambar()
    {
        return $this->hasMany(ProdukGambarModel::class, 'produk_id', 'id');
    }

    public function joinProdukKategori()
    {
        return $this->hasMany(ProdukKategoriModel::class, 'produk_id', 'id');
    }

    public function joinCreatedBy()
    {
        return $this->belongsTo(UserModel::class, 'created_by');
    }

    // get foto_thumbnail
    public function getFotoThumbnailAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/produk/thumbnail/' . $this->thumbnail))) {
            return asset('web/foto/postingan/produk/thumbnail/' . $this->thumbnail);
        } else {
            return asset('/webfoto/postingan/produk/thumbnail/no-image.png');
        }
    }

    // get foto_thumbnail_compress
    public function getFotoThumbnailCompressAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/produk/thumbnail/compress/' . $this->thumbnail))) {
            return asset('web/foto/postingan/produk/thumbnail/compress/' . $this->thumbnail);
        } else {
            return asset('/webfoto/postingan/produk/thumbnail/compress/no-image.png');
        }
    }
}
