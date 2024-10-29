<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class TestimoniCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $search = true;
        $title  = 'Testimoni';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Testimoni'],
        ];

        $testimonies    = TestimoniModel::latest();

        if ($request->has('cari')) {
            $testimonies = $testimonies->where(function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->cari . '%')
                    ->orWhere('profesi', 'like', '%' . $request->cari . '%')
                    ->orWhere('pesan', 'like', '%' . $request->cari . '%');
            });
        }

        $testimonies = $testimonies->paginate(10);

        return view('master.testimoni.testimoni_l', compact(
            'search',
            'title',
            'bread',
            'testimonies'
        ));
    }

    public function store(Request $request)
    {
        $rules  = [
            'nama'      => 'required',
            'profesi'   => 'required',
            'pesan'     => 'required|max:255',
            'profil'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-testimoni-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $create             = new TestimoniModel();
            $create->nama       = $request->nama;
            $create->profesi    = $request->profesi;
            $create->pesan      = $request->pesan;

            if ($request->hasFile('profil')) {
                $upload_path    = 'web/foto/testimoni';
                $upload         = $this->uploadCompress($request, 'profil', $upload_path, $create->nama);
                if ($upload['success'] === true) {
                    $create->profil = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'tambah-testimoni-modal' => true,
                            'toast_failed' => 'Gagal mengupload profil: ' . $upload['message']
                        ])
                        ->withInput();
                }
            }

            $create->status     = TESTI_STATUS_AKTIF;
            $create->save();

            return back()
                ->with('toast_success', 'Data telah ditambahkan.');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile($upload_path . '/', $create->profil);
            }

            return back()
                ->with([
                    'tambah-testimoni-modal' => true,
                    'toast_failed' => $th->getMessage()
                ])
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'nama'      => 'required',
            'profesi'   => 'required',
            'pesan'     => 'required|max:255',
            'profil'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];

        $validator  = Validator::make($request->all(), $rules);
        $update     = TestimoniModel::findOrFail($id);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-testimoni-modal-action' => route('testimoni.update', ['id' => $id]),
                    'ubah-profil-testimoni-modal' => $update->foto_profil,
                    'ubah-testimoni-modal' => $id,
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $update->nama       = $request->nama;
            $update->profesi    = $request->profesi;
            $update->pesan      = $request->pesan;
            $update->status     = $request->status;

            if ($request->hasFile('profil')) {
                $upload_path    = 'web/foto/testimoni';
                $upload         = $this->uploadCompress($request, 'profil', $upload_path, $update->nama);
                if ($upload['success'] === true) {
                    // remove file
                    $this->removeFile($upload_path . '/', $update->profil);

                    $update->profil = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'ubah-testimoni-modal-action'   => route('testimoni.update', ['id' => $id]),
                            'ubah-profil-testimoni-modal'   => $update->foto_profil,
                            'ubah-testimoni-modal'          => $id,
                            'toast_failed'                  => 'Gagal mengupload profil: ' . $upload['message']
                        ])
                        ->withInput();
                }
            }

            $update->save();

            return back()
                ->with('toast_success', 'Data telah diubah.');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile($upload_path . '/', $update->profil);
            }

            return back()
                ->with([
                    'ubah-testimoni-modal-action'   => route('testimoni.update', ['id' => $id]),
                    'ubah-profil-testimoni-modal'   => $update->foto_profil,
                    'ubah-testimoni-modal'          => $id,
                    'toast_failed'                  => $th->getMessage()
                ])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $blog   = TestimoniModel::findOrFail($id);
            $profil = $blog->profil;
            $blog->delete();

            $this->removeFile('web/foto/testimoni/', $profil);

            session()->flash('toast_success', 'Berhasil menghapus testimoni.');

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
