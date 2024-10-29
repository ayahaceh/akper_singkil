<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\KolaborasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class KolaborasiCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $search = true;
        $title  = 'Kolaborasi';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Pengaturan'],
            ['url' => '#', 'title' => 'Kolaborasi'],
        ];

        $kolaborasi = new KolaborasiModel();

        if ($request->has('cari')) {
            $kolaborasi = $kolaborasi->where(function ($query) use ($request) {
                $query
                    ->where('nama', 'like', '%' . $request->cari . '%');
            });
        }

        $kolaborasi = $kolaborasi->paginate(20);

        if ($request->has('cari')) {
            $kolaborasi->appends(['cari' => $request->cari]);
        }

        if (@user('role')) {
            return view('pengaturan.kolaborasi.kolaborasi_l', compact(
                'search',
                'title',
                'bread',
                'kolaborasi',
            ));
        }

        $search = true;
        return view('public_pages.kerjasama.kerjasama_l', compact(
            'title',
            'search',
            'kolaborasi',
        ));
    }

    public function store(Request $request)
    {
        $rules  = [
            'nama'  => 'required',
            'logo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-kolaborasi-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $create         = new KolaborasiModel();
            $create->nama   = $request->nama;

            if ($request->hasFile('logo')) {
                $upload_path    = 'web/foto/kolaborasi';
                $upload         = $this->uploadCompress($request, 'logo', $upload_path, $create->nama);
                if ($upload['success'] === true) {
                    $create->logo   = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'tambah-kolaborasi-modal' => true,
                            'toast_failed' => 'Gagal mengupload logo: ' . $upload['message']
                        ])
                        ->withInput();
                }
            } else {
                $create->logo = 'default.png';
            }

            $create->save();

            return back()
                ->with('toast_success', 'Data berhasil ditambahkan.');
        } catch (Throwable $th) {

            if ($request->hasFile('logo')) {
                $this->removeFile($upload_path . '/', $create->logo);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'nama'  => 'required',
            'logo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator  = Validator::make($request->all(), $rules);
        $update     = KolaborasiModel::findOrFail($id);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-kolaborasi-modal' => true,
                    'ubah-kolaborasi-modal-action' => route('kolaborasi.update', $id),
                    'ubah-logo-kolaborasi-modal' => $update->foto_logo,
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $update->nama   = $request->nama;

            if ($request->hasFile('logo')) {
                $upload_path    = 'web/foto/kolaborasi';
                $upload         = $this->uploadCompress($request, 'logo', $upload_path, $update->nama);
                if ($upload['success'] === true) {
                    // remove file
                    $this->removeFile($upload_path . '/', $update->logo);

                    $update->logo = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'ubah-kolaborasi-modal'         => true,
                            'ubah-kolaborasi-modal-action'  => route('kolaborasi.update', ['id' => $id]),
                            'ubah-logo-kolaborasi-modal'    => $update->foto_logo,
                            'toast_failed'                  => 'Gagal mengupload foto_logo: ' . $upload['message']
                        ])
                        ->withInput();
                }
            }

            $update->save();

            return back()
                ->with('toast_success', 'Data berhasil diubah.');
        } catch (Throwable $th) {

            if ($request->hasFile('logo')) {
                $this->removeFile($upload_path . '/', $update->logo);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $kolaborasi = KolaborasiModel::findOrFail($id);
            $logo       = $kolaborasi->logo;
            $kolaborasi->delete();

            $this->removeFile('web/foto/kolaborasi/', $logo);

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
