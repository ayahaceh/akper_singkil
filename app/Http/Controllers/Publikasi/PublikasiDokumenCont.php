<?php

namespace App\Http\Controllers\Publikasi;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\PublikasiDokumen\PublikasiDokumenModel;
use App\Models\PublikasiDokumen\RefJenisPublikasiDokumenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class PublikasiDokumenCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request, $ref_jenis_publikasi_dokumen_id)
    {
        $ref_jenis_publikasi_dokumen    = RefJenisPublikasiDokumenModel::where('id', $ref_jenis_publikasi_dokumen_id)->firstOrFail();
        $title                          = 'Publikasi ' . $ref_jenis_publikasi_dokumen->nama_jenis;
        $bread                          = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => $ref_jenis_publikasi_dokumen->nama_jenis],
        ];
        $publikasi_dokumens = PublikasiDokumenModel::where([
            'ref_jenis_publikasi_dokumen_id'    => $ref_jenis_publikasi_dokumen_id,
        ])
            ->with([
                'joinCreatedBy:id,nama'
            ]);

        if ($request->has('cari') && strlen($request->cari) > 0) {
            $publikasi_dokumens = $publikasi_dokumens->where('judul', 'like', "%$request->cari%");
        }

        $publikasi_dokumens = $publikasi_dokumens->paginate(20);

        if ($request->has('cari') && strlen($request->cari) > 0) $publikasi_dokumens->appends(['cari' => $request->cari]);

        if (@user('role')) {
            return view('publikasi.publikasi_dokumen.publikasi_l', compact(
                'title',
                'bread',
                'publikasi_dokumens',
            ));
        }

        $search = true;

        return view('public_pages.publikasi_dokumen.publikasi_l', compact(
            'title',
            'search',
            'publikasi_dokumens',
        ));
    }

    public function create($ref_jenis_publikasi_dokumen_id)
    {
        $ref_jenis_publikasi_dokumen    = RefJenisPublikasiDokumenModel::where('id', $ref_jenis_publikasi_dokumen_id)->firstOrFail();
        $title                          = 'Tambah Publikasi ' . $ref_jenis_publikasi_dokumen->nama_jenis;
        $bread                          = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => $ref_jenis_publikasi_dokumen->nama_jenis],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        return view('publikasi.publikasi_dokumen.publikasi_a', compact(
            'title',
            'bread',
        ));
    }

    public function store(Request $request, $ref_jenis_publikasi_dokumen_id)
    {
        $rules = [
            'judul_dokumen'         => 'required|string|max:255',
            'berkas_dokumen'        => 'required|file|mimes:pdf|max:4096',
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $publikasi_dokumen                                      = new PublikasiDokumenModel();
            $publikasi_dokumen->ref_jenis_publikasi_dokumen_id      = $ref_jenis_publikasi_dokumen_id;
            $publikasi_dokumen->judul                               = $request->judul_dokumen;

            if ($request->hasFile('berkas_dokumen')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_DOKUMEN);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->berkas_dokumen,
                    $path_to_upload,
                    $file_name,
                );

                if ($upload['success'] === true) {
                    $publikasi_dokumen->berkas_pendukung = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $publikasi_dokumen->created_by = auth()->id();
            $publikasi_dokumen->save();

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            return $th->getMessage();
        }

        return redirect()
            ->route('publikasi-dokumen.index', ['ref_jenis_publikasi_dokumen_id' => $ref_jenis_publikasi_dokumen_id])
            ->with('toast_success', 'Data telah disimpan!');
    }

    public function edit($ref_jenis_publikasi_dokumen_id, $id)
    {
        $ref_jenis_publikasi_dokumen    = RefJenisPublikasiDokumenModel::where('id', $ref_jenis_publikasi_dokumen_id)->firstOrFail();
        $title                          = 'Ubah Publikasi ' . $ref_jenis_publikasi_dokumen->nama_jenis;
        $bread                          = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => $ref_jenis_publikasi_dokumen->nama_jenis],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $data = PublikasiDokumenModel::where([
            'id'                                => $id,
            'ref_jenis_publikasi_dokumen_id'    => $ref_jenis_publikasi_dokumen_id,
        ])
            ->firstOrFail();

        return view('publikasi.publikasi_dokumen.publikasi_e', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function update(Request $request, $ref_jenis_publikasi_dokumen_id, $id)
    {
        $rules = [
            'judul_dokumen'         => 'required|string|max:255',
            'berkas_dokumen'        => 'nullable|file|mimes:pdf|max:4096',
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $publikasi_dokumen                                      = PublikasiDokumenModel::where('id', $id)->firstOrFail();
            $publikasi_dokumen->judul                               = $request->judul_dokumen;

            if ($request->hasFile('berkas_dokumen')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_DOKUMEN);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->berkas_dokumen,
                    $path_to_upload,
                    $file_name,
                    false,
                    $publikasi_dokumen->berkas_pendukung,
                );

                if ($upload['success'] === true) {
                    $publikasi_dokumen->berkas_pendukung = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $publikasi_dokumen->updated_by = auth()->id();
            $publikasi_dokumen->save();

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            return $th->getMessage();
        }

        return redirect()
            ->route('publikasi-dokumen.index', ['ref_jenis_publikasi_dokumen_id' => $ref_jenis_publikasi_dokumen_id])
            ->with('toast_success', 'Data telah disimpan!');
    }

    public function delete($id)
    {
        try {
            $data = PublikasiDokumenModel::findOrFail($id);
            $data->deleted_by = auth()->id();
            $data->save();
            $data->delete();

            session()->flash('toast_success', 'Data telah dihapus!');

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
