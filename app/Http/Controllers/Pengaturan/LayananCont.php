<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\JasaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class LayananCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $search = true;
        $title  = 'Prestasi';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Prestasi'],
        ];

        $layanan    = JasaModel::latest();

        if ($request->has('cari')) {
            $layanan    = $layanan->where(function ($query) use ($request) {
                $query
                    ->where('nama_jasa', 'like', '%' . $request->cari . '%')
                    ->orWhere('keterangan_jasa', 'like', '%' . $request->cari . '%')
                    ->orWhere('peringkat', 'like', '%' . $request->cari . '%')
                    ->orWhere('penyelenggara', 'like', '%' . $request->cari . '%')
                    ->orWhere('tahun', 'like', '%' . $request->cari . '%')
                    ->orWhere('tema', 'like', '%' . $request->cari . '%');
            });
        }

        $layanan    = $layanan->paginate(20);

        if ($request->has('cari')) {
            $layanan->appends(['cari' => $request->cari]);
        }

        return view('pengaturan.layanan.layanan_l', compact(
            'search',
            'title',
            'bread',
            'layanan',
        ));
    }

    public function store(Request $request)
    {
        $rules  = [
            'nama_prestasi'         => 'required|string|max:255',
            'peringkat'             => 'required|string|max:255',
            'penyelenggara'         => 'required|string|max:255',
            'tahun'                 => 'required|date_format:Y',
            'tema'                  => 'required|string|max:255',
            'sertifikat'            => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-jasa-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $jasa                   = new JasaModel();
            $jasa->nama_jasa        = $request->nama_prestasi;
            $jasa->peringkat        = $request->peringkat;
            $jasa->penyelenggara    = $request->penyelenggara;
            $jasa->tahun            = $request->tahun;
            $jasa->tema             = $request->tema;

            if ($request->hasFile('sertifikat')) {
                $get_path_file  = setPathFile(KODE_FOLDER_BERKAS_SERTIFIKAT_PRESTASI);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->sertifikat,
                    $path_to_upload,
                    $file_name,
                );

                if ($upload['success'] === true) {
                    $jasa->logo_jasa = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $jasa->keterangan_jasa = '';
            $jasa->save();

            return back()
                ->with('toast_success', 'Data berhasil ditambahkan.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'nama_prestasi'         => 'required|string|max:255',
            'peringkat'             => 'required|string|max:255',
            'penyelenggara'         => 'required|string|max:255',
            'tahun'                 => 'required|date_format:Y',
            'tema'                  => 'required|string|max:255',
            'sertifikat'            => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-jasa-modal' => true,
                    'ubah-jasa-modal-action' => route('layanan.update', $id),
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $jasa                   = JasaModel::findOrFail($id);
            $jasa->nama_jasa        = $request->nama_prestasi;
            $jasa->peringkat        = $request->peringkat;
            $jasa->penyelenggara    = $request->penyelenggara;
            $jasa->tahun            = $request->tahun;
            $jasa->tema             = $request->tema;

            if ($request->hasFile('sertifikat')) {
                $get_path_file  = setPathFile(KODE_FOLDER_BERKAS_SERTIFIKAT_PRESTASI);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->sertifikat,
                    $path_to_upload,
                    $file_name,
                    false,
                    $jasa->logo_jasa,
                );

                if ($upload['success'] === true) {
                    $jasa->logo_jasa = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $jasa->save();

            return back()
                ->with('toast_success', 'Data berhasil diubah.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            JasaModel::findOrFail($id)->delete();

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
