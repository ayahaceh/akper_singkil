<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\KontakMail;
use App\Models\TentangModel;
use App\Models\TimModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TentangCont extends Controller
{
    public function index()
    {
        $title      = 'Tentang Kami';
        $tentang    = TentangModel::first();
        $teams      = TimModel::get();

        return view('public_pages.tentang_s', compact(
            'title',
            'tentang',
            'teams',
        ));
    }

    public function kontak()
    {
        $title      = 'Kontak';
        $tentang    = TentangModel::first();

        return view('public_pages.kontak_s', compact(
            'title',
            'tentang',
        ));
    }

    public function kirim_pesan(Request $request)
    {

        $details    = [
            'title' => 'From ' . $request->name,
            'body'  => $request->comment,
            'reply_wa'  => $this->whatsapp_link($request->wa),
        ];

        Mail::to($request->mail)->send(new KontakMail($details));

        return back()->with('success', 'Pesan telah dikirim!');
    }

    public function whatsapp_link($wa)
    {
        $whatsapp = $wa;

        if ($whatsapp) {
            $whatsapp = str_replace(' ', '', $whatsapp);
            $whatsapp = str_replace('+62', '62', $whatsapp);
            $whatsapp = str_replace('(', '', $whatsapp);
            $whatsapp = str_replace(')', '', $whatsapp);
            $whatsapp = str_replace('-', '', $whatsapp);
            $whatsapp = str_replace('.', '', $whatsapp);
            $whatsapp = str_replace('/', '', $whatsapp);
            $whatsapp = str_replace(' ', '', $whatsapp);
            $whatsapp = 'https://wa.me/' . $whatsapp;
        } else {
            return null;
        }

        return $whatsapp;
    }
}
