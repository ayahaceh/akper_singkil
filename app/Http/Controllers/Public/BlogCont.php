<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class BlogCont extends Controller
{
    public function index(Request $request, $nama_kategori = null)
    {
        $kategori   = KategoriModel::where('nama_kategori', "$nama_kategori")->first();

        if ($kategori) {
            $title  = 'Postingan ' . $kategori->nama_kategori;
        } else {
            $title  = 'Daftar Blog';
        }

        $blogs = BlogModel::with([
            'joinKategori' => fn ($query) => $query->withTrashed(),
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
        ])
            ->whereStatus(BLOG_STATUS_DITERBITKAN)
            ->latest();

        if ($kategori) {
            $blogs = $blogs->where(function ($query) use ($nama_kategori) {
                $query
                    ->whereHas('joinKategori', function ($query) use ($nama_kategori) {
                        $query
                            ->where('nama_kategori', 'like', '%' . $nama_kategori . '%')
                            ->withTrashed();
                    });
            });
        }

        if ($request->has('blog_keyword')) {
            $blogs = $blogs->where(function ($query) use ($request) {
                $query->where('judul', 'like', '%' . $request->blog_keyword . '%')
                    ->orWhere('konten', 'like', '%' . $request->blog_keyword . '%')
                    ->orWhere('konten_resume', 'like', '%' . $request->blog_keyword . '%')
                    ->orWhere('tag', 'like', '%' . $request->blog_keyword . '%')
                    ->orWhereHas('joinKategori', function ($query) use ($request) {
                        $query
                            ->where('nama_kategori', 'like', '%' . $request->blog_keyword . '%')
                            ->withTrashed();
                    });
            });
        }

        if ($request->has('kategori')) {
            $blogs = $blogs->where(function ($query) use ($request) {
                $query
                    ->whereHas('joinKategori', function ($query) use ($request) {
                        $query
                            ->where('nama_kategori', 'like', '%' . $request->kategori . '%')
                            ->withTrashed();
                    });
            });
        }

        $blogs = $blogs->paginate(20);

        if ($request->has('blog_keyword')) {
            $blogs->appends(['blog_keyword' => $request->blog_keyword]);
        }

        if ($request->has('kategori')) {
            $blogs->appends(['kategori' => $request->kategori]);
        }

        $categories = KategoriModel::whereHas('joinBlog', function ($query) {
                $query
                    ->whereNotNull('id')
                    ->whereStatus(BLOG_STATUS_DITERBITKAN);
            })
            ->get();

        $new_blogs = BlogModel::limit(5)
            ->whereStatus(BLOG_STATUS_DITERBITKAN)
            ->latest()
            ->get();

        return view('public_pages.blog.blog_l', compact(
            'title',
            'blogs',
            'new_blogs',
            'categories'
        ));
    }

    public function blog_detail($slug)
    {
        $title_in_seo = true;
        $blog = BlogModel::whereSlug($slug)
            ->whereStatus(BLOG_STATUS_DITERBITKAN)
            ->with([
                'joinKategori' => fn ($query) => $query->withTrashed(),
                'joinCreatedBy' => fn ($query) => $query->withTrashed(),
            ])
            ->first();

        if (!$blog) {
            $title = '404 Halaman Tidak Ditemukan';
            return view('public_pages.404', compact(
                'title',
            ));
        }

        $title = $blog->judul;

        $categories = KategoriModel::whereHas('joinBlog', function ($query) {
                $query
                    ->whereNotNull('id')
                    ->whereStatus(BLOG_STATUS_DITERBITKAN);
            })
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $blog->jml_view = $blog->jml_view + 1;
        $blog->save();

        // Seo
        SEOMeta::setTitle($blog->judul);
        SEOMeta::setDescription($blog->konten_resume);
        SEOMeta::addMeta('article:published_time', $blog->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', @$blog->joinKategori->nama_kategori, 'property');
        SEOMeta::addKeyword(explode(',', $blog->tag));

        OpenGraph::setDescription($blog->konten_resume);
        OpenGraph::setTitle($blog->judul);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id-ID');
        OpenGraph::addProperty('locale:alternate', ['id-ID', 'en-us']);

        OpenGraph::addImage($blog->foto_thumbnail);
        OpenGraph::addImage(['url' => $blog->foto_thumbnail]);
        OpenGraph::addImage($blog->foto_thumbnail, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($blog->judul);
        JsonLd::setDescription($blog->konten_resume);
        JsonLd::setType('Article');
        JsonLd::addImage($blog->foto_thumbnail);
        // End Seo

        return view('public_pages.blog.blog_s', compact(
            'title_in_seo',
            'title',
            'blog',
            'categories',
        ));
    }
}
