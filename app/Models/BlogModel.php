<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class BlogModel extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasSEO;

    protected $table = 'blog';

    public $timestamps = true;

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'konten',
        'konten_resume',
        'tag',
        'thumbnail',
        'jml_view',
        'status',
    ];

    protected $casts = [
        'jml_view' => 'integer',
    ];

    // relasi
    public function joinKategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    public function joinCreatedBy()
    {
        return $this->belongsTo(UserModel::class, 'created_by');
    }

    // auto slug
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(255) // maksimal panjang slug
            ->doNotGenerateSlugsOnUpdate(); // jangan regenerate slug jika update
    }

    // get foto_thumbnail
    public function getFotoThumbnailAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/blog/thumbnail/' . $this->thumbnail))) {
            return asset('web/foto/postingan/blog/thumbnail/' . $this->thumbnail);
        } else {
            return asset('/webfoto/postingan/blog/thumbnail/no-image.png');
        }
    }

    // get foto_thumbnail_compress
    public function getFotoThumbnailCompressAttribute()
    {
        if (file_exists(public_path('web/foto/postingan/blog/thumbnail/compress/' . $this->thumbnail))) {
            return asset('web/foto/postingan/blog/thumbnail/compress/' . $this->thumbnail);
        } else {
            return asset('/webfoto/postingan/blog/thumbnail/compress/no-image.png');
        }
    }

    // Seo
    // public function getDynamicSEOData(): SEOData
    // {
    //     return new SEOData(
    //         title: $this->judul,
    //         description: $this->konten,
    //         image: $this->foto_thumbnail_compress,
    //         author: @$this->joinCreatedBy->nama,
    //     );
    // }
}
