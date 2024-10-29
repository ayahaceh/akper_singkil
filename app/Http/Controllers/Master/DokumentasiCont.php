<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\DokumentasiFotoModel;
use App\Models\DokumentasiModel;
use Illuminate\Http\Request;
use Throwable;

class DokumentasiCont extends Controller
{
    public function index(Request $request)
    {
        $search = true;
        $title  = 'Kegiatan Home Care';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Kegiatan Home Care'],
        ];

        $dokumentasies  = DokumentasiModel::latest()
            ->with([
                'joinDokumentasiFoto'
            ]);

        if ($request->has('cari')) {
            $dokumentasies  = $dokumentasies->where(function ($query) use ($request) {
                $query
                    ->where('nama_dokumentasi', 'like', '%' . $request->cari . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->cari . '%');
            });
        }

        $dokumentasies  = $dokumentasies->paginate(10);

        if ($request->has('cari')) {
            $dokumentasies->appends(['cari' => $request->cari]);
        }

        return view('master.dokumentasi.dokumentasi_l', compact(
            'search',
            'title',
            'bread',
            'dokumentasies',
        ));
    }

    public function create_1()
    {
        $title  = 'Tambah Kegiatan Home Care';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Kegiatan Home Care'],
            ['url' => '#', 'title' => 'Tambah'],
        ];
        $step   = 1;

        return view('master.dokumentasi.dokumentasi_a', compact(
            'title',
            'bread',
            'step'
        ));
    }

    public function create_2($id)
    {
        $title  = 'Upload Foto';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Kegiatan Home Care'],
            ['url' => '#', 'title' => 'Tambah'],
        ];
        $step   = 2;

        $data   = DokumentasiModel::whereId($id)
            ->with(['joinDokumentasiFoto'])
            ->firstOrFail();

        return view('master.dokumentasi.dokumentasi_a', compact(
            'title',
            'bread',
            'step',
            'data',
        ));
    }

    public function store_1(Request $request)
    {
        $rules  = [
            'judul'         => 'required|string|max:255',
            'keterangan'    => 'required|string|max:255',
            'waktu'         => 'required|date',
        ];

        $this->validate($request, $rules);

        try {
            $create                     = new DokumentasiModel();
            $create->nama_dokumentasi   = $request->judul;
            $create->keterangan         = $request->keterangan;
            $create->created_at         = $request->waktu ?? now();
            $create->updated_at         = $request->waktu ?? now();
            $create->save();

            return redirect()
                ->route('dokumentasi.create_2', ['id' => $create->id]);
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function store_2(Request $request, $id)
    {
        $file           = $request->file('file');
        $file_name      = $file->getClientOriginalName();
        $file_path      = public_path('/web/foto/dokumentasi/');

        $file->move($file_path, $file_name);

        $produk_gambar                  = new DokumentasiFotoModel();
        $produk_gambar->dokumentasi_id  = $id;
        $produk_gambar->gambar          = $file_name;
        $produk_gambar->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function delete_foto(Request $request)
    {
        $file_name  = $request->gambar;
        $file_path  = public_path('/web/foto/dokumentasi/');

        DokumentasiFotoModel::whereGambar($file_name)->delete();

        if (file_exists($file_path . $file_name)) {
            unlink($file_path . $file_name);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function done()
    {
        return redirect()
            ->route('dokumentasi.index')
            ->with('alert_success', 'Dokumentasi telah disimpan!');
    }

    public function edit($id)
    {
        $title  = 'Ubah Dokumentasi';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Kegiatan Home Care'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $data   = DokumentasiModel::whereId($id)
            ->firstOrFail();

        return view('master.dokumentasi.dokumentasi_e', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'judul'         => 'required|string|max:255',
            'keterangan'    => 'required|string|max:255',
        ];

        $this->validate($request, $rules);

        try {
            $update                     = DokumentasiModel::findOrFail($id);
            $update->nama_dokumentasi   = $request->judul;
            $update->keterangan         = $request->keterangan;
            $update->save();

            return redirect()
                ->route('dokumentasi.index')
                ->with('toast_success', 'Dokumentasi telah diubah!');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DokumentasiModel::findOrFail($id)->delete();

            session()->flash('toast_success', 'Berhasil menghapus dokumentasi.');

            return response()->json([
                'status'    => 'success',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'message'   => $th->getMessage(),
            ]);
        }
    }
}
