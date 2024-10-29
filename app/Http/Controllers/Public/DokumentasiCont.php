<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DokumentasiModel;
use Illuminate\Http\Request;

class DokumentasiCont extends Controller
{
    public function index()
    {
        $title          = 'Dokumentasi';
        $dokumentasi    = DokumentasiModel::latest()
            ->with(['joinDokumentasiFoto'])
            ->paginate(10);

        return view('public_pages.dokumentasi_l', compact(
            'title',
            'dokumentasi',
        ));
    }
}
