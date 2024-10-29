<?php

namespace App\Http\Controllers;

use App\Models\JasaModel;
use Illuminate\Http\Request;

class PrestasiCont extends Controller
{
    public function index(Request $request)
    {
        $title      = 'Prestasi Yang Diraih';
        $prestasies = JasaModel::latest();
        $search     = true;

        if ($request->has('cari')) {
            $prestasies = $prestasies->where(function ($query) use ($request) {
                $query
                    ->where('nama_jasa', 'like', '%' . $request->cari . '%')
                    ->orWhere('keterangan_jasa', 'like', '%' . $request->cari . '%')
                    ->orWhere('peringkat', 'like', '%' . $request->cari . '%')
                    ->orWhere('penyelenggara', 'like', '%' . $request->cari . '%')
                    ->orWhere('tahun', 'like', '%' . $request->cari . '%')
                    ->orWhere('tema', 'like', '%' . $request->cari . '%');
            });
        }

        $prestasies    = $prestasies->paginate(20);

        if ($request->has('cari')) {
            $prestasies->appends(['cari' => $request->cari]);
        }

        return view('public_pages.prestasi.prestasi_l', compact(
            'title',
            'prestasies',
            'search'
        ));
    }
}
