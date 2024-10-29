<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use App\Models\TentangModel;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class ProdukCont extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Daftar Produk';

        $products   = ProdukModel::latest()
            ->with([
                'joinProdukKategori' => fn ($query) => $query->with([
                    'joinKategori' => fn ($query) => $query->withTrashed()
                ]),
            ]);

        if ($request->has('produk_keyword')) {
            $products   = $products->where(function ($query) use ($request) {
                $query->where('nama_produk', 'like', '%' . $request->produk_keyword . '%')
                    ->orWhere('keterangan_produk', 'like', '%' . $request->produk_keyword . '%')
                    ->orWhereHas('joinProdukKategori', function ($query) use ($request) {
                        $query->whereHas('joinKategori', function ($query) use ($request) {
                            $query
                                ->where('nama_kategori', 'like', '%' . $request->produk_keyword . '%')
                                ->withTrashed();
                        });
                    });
            });
        }

        $products   = $products->paginate(15);

        if ($request->has('produk_keyword')) {
            $products->appends(['produk_keyword' => $request->produk_keyword]);
        }

        return view('public_pages.produk.produk_l', compact(
            'title',
            'products',
        ));
    }

    public function produk_detail($slug)
    {
        $title_in_seo   = true;
        $produk = ProdukModel::whereSlug($slug)
            ->with([
                'joinProdukKategori' => fn ($query) => $query->with([
                    'joinKategori' => fn ($query) => $query->withTrashed()
                ]),
                'joinCreatedBy' => fn ($query) => $query->withTrashed(),
                'joinProdukGambar',
            ])
            ->first();

        $title  = $produk->nama_produk;

        $produk_lainnya = ProdukModel::limit(6)
            ->with([
                'joinProdukKategori' => fn ($query) => $query->with([
                    'joinKategori' => fn ($query) => $query->withTrashed()
                ]),
            ])
            ->orderByDesc('jml_view')
            ->get();

        $tentang    = TentangModel::first();

        $produk->jml_view = $produk->jml_view + 1;
        $produk->save();

        // Seo
        $keterangan_produk = strip_tags($produk->keterangan_produk, '<br>');
        $keterangan_produk = str_replace('<br>', ' ', $keterangan_produk);

        SEOMeta::setTitle($produk->nama_produk);
        SEOMeta::setDescription($keterangan_produk); // harusnya keterangan_produk yang diresume
        SEOMeta::addMeta('product:published_time', $produk->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('product:section', @$produk->joinProdukKategori[0]->joinKategori->nama_kategori, 'property');
        // SEOMeta::addKeyword(['key1', 'key2', 'key3']);

        OpenGraph::setDescription($keterangan_produk); // harusnya keterangan_produk yang diresume
        OpenGraph::setTitle($produk->nama_produk);
        OpenGraph::addProperty('type', 'product');
        OpenGraph::addProperty('locale', 'id-ID');
        OpenGraph::addProperty('locale:alternate', ['id-ID', 'en-us']);

        OpenGraph::addImage($produk->foto_thumbnail);
        OpenGraph::addImage(['url' => $produk->foto_thumbnail]);
        OpenGraph::addImage($produk->foto_thumbnail, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($produk->nama_produk);
        JsonLd::setDescription($keterangan_produk); // harusnya keterangan_produk yang diresume
        JsonLd::setType('Product');
        JsonLd::addImage($produk->foto_thumbnail);
        // End Seo

        return view('public_pages.produk.produk_s', compact(
            'title_in_seo',
            'title',
            'produk',
            'produk_lainnya',
            'tentang',
        ));
    }
}
