<?php

namespace App\Http\Controllers\Publikasi;

use App\Http\Controllers\Controller;
use App\Models\DokumentasiModel;
use Illuminate\Http\Request;

class PublikasiKegiatanCont extends Controller
{
    public function index()
    {
        $title          = 'Dokumentasi Kegiatan';
        $dokumentasies  = DokumentasiModel::latest()
            ->with('joinDokumentasiFoto')
            ->whereHas('joinDokumentasiFoto')
            ->paginate(20);

        return view('public_pages.dokumentasi.dokumentasi_l', compact(
            'title',
            'dokumentasies',
        ));
    }
}
