<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class PublicCont extends Controller
{
    public function index(Request $request)
    {
        $title          = 'Home';
        $new_blogs      = BlogModel::with([
            'joinKategori' => fn ($query) => $query->withTrashed(),
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
        ])
            ->whereStatus(BLOG_STATUS_DITERBITKAN)
            ->latest()
            ->limit(3)
            ->get();

        return view('public_pages.homepage', compact(
            'title',
            'new_blogs'
        ));
    }

    // --------------------------------------------------------------------------------
}
