<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;

class TestimoniCont extends Controller
{
    public function index()
    {
        $title          = 'Testimoni';
        $testimonies    = TestimoniModel::whereStatus(TESTI_STATUS_AKTIF)
            ->limit(20)
            ->latest()
            ->get();

        return view('public_pages.testimoni_l', compact(
            'title',
            'testimonies',
        ));
    }
}
