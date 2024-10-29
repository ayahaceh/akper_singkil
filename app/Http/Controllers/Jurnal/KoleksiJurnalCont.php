<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Models\Jurnal\KoleksiJurnalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class KoleksiJurnalCont extends Controller
{
    public function index(Request $request)
    {
        $search = true;
        $title  = 'Koleksi';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Jurnal Ilmiah'],
            ['url' => '#', 'title' => 'Koleksi'],
        ];

        $koleksies   = KoleksiJurnalModel::orderBy('nama_koleksi');

        if ($request->has('cari')) {
            $koleksies = $koleksies->where(function ($query) use ($request) {
                $query->where('nama_koleksi', 'like', '%' . $request->cari . '%');
            });
        }

        $koleksies = $koleksies->paginate(20);

        if ($request->has('cari')) {
            $koleksies->appends(['cari' => $request->cari]);
        }

        if (@user('role')) {
            return view('master.koleksi_jurnal.koleksi_l', compact(
                'search',
                'title',
                'bread',
                'koleksies',
            ));
        }

        $search = true;

        return view('public_pages.jurnal.koleksi_l', compact(
            'title',
            'koleksies',
            'search',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_koleksi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-koleksi-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            KoleksiJurnalModel::create($request->all());

            return back()
                ->with('toast_success', 'Data berhasil ditambahkan.');
        } catch (Throwable $th) {
            dd($th);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_koleksi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-koleksi-modal' => true,
                    'ubah-koleksi-modal-action' => route('koleksi-jurnal.update', $id),
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            KoleksiJurnalModel::findOrFail($id)->update($request->all());

            return back()
                ->with('toast_success', 'Data berhasil diubah.');
        } catch (Throwable $th) {
            dd($th);
        }
    }

    public function delete($id)
    {
        try {
            KoleksiJurnalModel::findOrFail($id)->update([
                'deleted_by'    => auth()->id(),
                'deleted_at'    => now(),
            ]);

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
