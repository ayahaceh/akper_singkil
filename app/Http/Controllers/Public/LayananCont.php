<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JasaModel;
use Illuminate\Http\Request;

class LayananCont extends Controller
{
    public function index()
    {
        $title  = 'Layanan';

        $services    = JasaModel::get();

        return view('public_pages.layanan_l', compact(
            'title',
            'services'
        ));
    }
}
