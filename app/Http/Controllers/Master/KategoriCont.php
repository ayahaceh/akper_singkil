<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class KategoriCont extends Controller
{
    public function index(Request $request)
    {
        $search = true;
        $title  = 'Kategori';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Kategori'],
        ];

        $kategori   = KategoriModel::latest();

        if ($request->has('cari')) {
            $kategori = $kategori->where(function ($query) use ($request) {
                $query->where('nama_kategori', 'like', '%' . $request->cari . '%');
            });
        }

        $kategori = $kategori->paginate(20);

        if ($request->has('cari')) {
            $kategori->appends(['cari' => $request->cari]);
        }

        return view('master.kategori.kategori_l', compact(
            'search',
            'title',
            'bread',
            'kategori',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-kategori-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            KategoriModel::create($request->all());

            return back()
                ->with('toast_success', 'Data berhasil ditambahkan.');
        } catch (Throwable $th) {
            dd($th);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-kategori-modal' => true,
                    'ubah-kategori-modal-action' => route('kategori.update', $id),
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            KategoriModel::find($id)->update($request->all());

            return back()
                ->with('toast_success', 'Data berhasil diubah.');
        } catch (Throwable $th) {
            dd($th);
        }
    }

    public function delete($id)
    {
        try {
            KategoriModel::findOrFail($id)->delete();

            session()->flash('toast_success', 'Data berhasil dihapus.');

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
