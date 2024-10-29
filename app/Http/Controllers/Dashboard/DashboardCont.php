<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\DokumentasiModel;
use App\Models\JasaModel;
use App\Models\Jurnal\JurnalModel;
use Illuminate\Http\Request;

class DashboardCont extends Controller
{
    public function index()
    {
        $title          = 'Dashboard';
        $blog_count     = BlogModel::whereStatus(BLOG_STATUS_DITERBITKAN)->count();
        $prestasi_count = JasaModel::count();
        $kegiatan_count = DokumentasiModel::count();
        $jurnal_count   = JurnalModel::count();

        return view('dashboard.dashboard', compact(
            'title',
            // ...
            'blog_count',
            'prestasi_count',
            'kegiatan_count',
            'jurnal_count',
        ));
    }
}
