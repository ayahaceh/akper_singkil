<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\TentangModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TentangCont extends Controller
{
    public function edit()
    {
        $title  = 'Tentang';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Pengaturan'],
            ['url' => '#', 'title' => 'Tentang'],
        ];

        $tentang    = TentangModel::first();

        return view('pengaturan.tentang.tentang_e', compact(
            'title',
            'bread',
            'tentang'
        ));
    }

    public function update_personal(Request $request)
    {
        $rules = [
            'tentang'       => 'required',
            'alamat'        => 'required',
            // 'visi'          => 'required',
            // 'misi'          => 'required',
            'awal_berdiri'  => 'required',
        ];

        $this->validate($request, $rules);

        try {
            $tentang                = TentangModel::first();
            $tentang->tentang       = $request->tentang;
            $tentang->alamat        = $request->alamat;
            $tentang->visi          = $request->visi ?? '';
            $tentang->misi          = $request->misi ?? '';
            $tentang->awal_berdiri  = new DateTime($request->awal_berdiri);
            $tentang->save();

            return redirect()->back()->with('toast_success', 'Data personal berhasil diubah.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function update_kontak(Request $request)
    {
        $rules = [
            'email'         => 'required',
            'telepon'       => 'required',
            'whatsapp'      => 'required',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'instagram'     => 'required',
            'linkedin'      => 'required',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try {
            $tentang                = TentangModel::first();
            $tentang->email         = $request->email;
            $tentang->telepon       = $request->telepon;
            $tentang->whatsapp      = $request->whatsapp;
            $tentang->facebook      = $request->facebook;
            $tentang->twitter       = $request->twitter;
            $tentang->instagram     = $request->instagram;
            $tentang->linkedin      = $request->linkedin;
            $tentang->save();

            DB::commit();

            return redirect()->back()->with('toast_success', 'Data kontak berhasil diubah.');
        } catch (Throwable $th) {
            DB::rollBack();

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }
}
