<?php

namespace App\Http\Controllers\Ref;

use App\Http\Controllers\Controller;
use App\Http\Resources\Select2\KategoriPaginateResource;
use App\Http\Resources\Select2\KoleksiJurnalPaginateResource;
use App\Http\Resources\Select2\ProdukPaginateResource;
use App\Models\Jurnal\KoleksiJurnalModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class Select2Cont extends Controller
{
    public function getKategoriPaginate(Request $request)
    {
        $kategori = KategoriModel::orderBy('nama_kategori');

        if ($request->has('cari')) {
            $kategori = $kategori->where(function ($query) use ($request) {
                $query->where('nama_kategori', 'like', '%' . $request->cari . '%');
            });
        }

        $kategori = $kategori->paginate(10);

        return KategoriPaginateResource::collection($kategori);
    }

    public function getKoleksiJurnalPaginate(Request $request)
    {
        $koleksi_jurnal = KoleksiJurnalModel::orderBy('nama_koleksi');

        if ($request->has('cari')) {
            $koleksi_jurnal = $koleksi_jurnal->where(function ($query) use ($request) {
                $query->where('nama_koleksi', 'like', '%' . $request->cari . '%');
            });
        }

        $koleksi_jurnal = $koleksi_jurnal->paginate(10);

        return KoleksiJurnalPaginateResource::collection($koleksi_jurnal);
    }

    public function getProdukPaginate(Request $request)
    {
        $kategori = ProdukModel::orderByDesc('jml_view');

        if ($request->has('cari')) {
            $kategori = $kategori->where(function ($query) use ($request) {
                $query->where('nama_produk', 'like', '%' . $request->cari . '%');
            });
        }

        $kategori = $kategori->paginate(10);

        return ProdukPaginateResource::collection($kategori);
    }
}
