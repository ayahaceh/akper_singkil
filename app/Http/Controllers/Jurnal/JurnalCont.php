<?php

namespace App\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\Jurnal\JurnalModel;
use App\Models\Jurnal\KoleksiJurnalModel;
use App\Models\ProdukGambarModel;
use App\Models\ProdukKategoriModel;
use App\Models\ProdukModel;
use App\Models\ProdukTerlarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;
use Image;

class JurnalCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request, $koleksi_jurnal_id = null)
    {
        $search = true;
        $title  = 'Jurnal Ilmiah';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => 'Jurnal'],
        ];

        $jurnals = JurnalModel::with([
            'joinKoleksiJurnal' => function ($query) {
                $query->withTrashed();
            }
        ])
            ->latest();

        if ($koleksi_jurnal_id) {
            $jurnals = $jurnals->where('koleksi_jurnal_id', $koleksi_jurnal_id);
        }

        if ($request->has('cari')) {
            $jurnals = $jurnals->where(function ($query) use ($request) {
                $query
                    ->where('judul', 'like', '%' . $request->cari . '%')
                    ->orWhere('pengarang', 'like', '%' . $request->cari . '%')
                    ->orWhere('penerbit', 'like', '%' . $request->cari . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $request->cari . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->cari . '%')
                    ->orWhere('keyword', 'like', '%' . $request->cari . '%')
                    ->orWhereHas('joinKoleksiJurnal', function ($query) use ($request) {
                        $query
                            ->where('nama_koleksi', 'like', '%' . $request->cari . '%')
                            ->withTrashed();
                    });
            });
        }

        $jurnals = $jurnals->paginate(20);

        if ($request->has('cari')) {
            $jurnals->appends(['cari' => $request->cari]);
        }

        if (@user('role')) {
            return view('master.postingan.produk.produk_l', compact(
                'search',
                'title',
                'bread',
                'jurnals',
            ));
        }

        $koleksi_jurnal = KoleksiJurnalModel::where('id', $koleksi_jurnal_id)->firstOrFail();
        $title          =  $title . ' ' . $koleksi_jurnal->nama_koleksi;
        $search         = true;

        return view('public_pages.jurnal.jurnal_l', compact(
            'title',
            'jurnals',
            'search',
        ));
    }

    public function show($koleksi_jurnal_id, $id)
    {
        $jurnal = JurnalModel::where('id', $id)->firstOrFail();
        $title  = $jurnal->judul;

        return view('public_pages.jurnal.jurnal_s', compact(
            'title',
            'jurnal',
        ));
    }

    public function create()
    {
        $title  = 'Tambah Jurnal';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => 'Jurnal'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        return view('master.postingan.produk.produk_a', compact(
            'title',
            'bread',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'judul'             => 'required|string|max:255',
            'koleksi'           => 'required|exists:koleksi_jurnal,id',
            'pengarang'         => 'required|array',
            'penerbit'          => 'required|string|max:255',
            'tahun_terbit'      => 'required|date_format:Y',
            'keyword'           => 'required|array',
            'deskripsi'         => 'required',
            'berkas_jurnal'     => 'required|file|mimes:pdf|max:10240',
            'thumbnail'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try {
            $jurnal                     = new JurnalModel();
            $jurnal->koleksi_jurnal_id  = $request->koleksi;
            $jurnal->judul              = $request->judul;
            $jurnal->pengarang          = implode(', ', $request->pengarang);;
            $jurnal->penerbit           = $request->penerbit;
            $jurnal->tahun_terbit       = $request->tahun_terbit;
            $jurnal->deskripsi          = $request->deskripsi;
            $jurnal->keyword            = implode(', ', $request->keyword);;

            if ($request->hasFile('berkas_jurnal')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_BERKAS_JURNAL);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->berkas_jurnal,
                    $path_to_upload,
                    $file_name,

                );

                if ($upload['success'] === true) {
                    $jurnal->berkas_jurnal = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            if ($request->hasFile('thumbnail')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_THUMBNAIL_JURNAL);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->thumbnail,
                    $path_to_upload,
                    $file_name,
                    true,
                );

                if ($upload['success'] === true) {
                    $jurnal->berkas_thumbnail = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $jurnal->created_by         = @user('id');
            $jurnal->save();

            DB::commit();

            return redirect()
                ->route('publikasi.jurnal.index')
                ->with('toast_success', 'Data telah disimpan!');
        } catch (Throwable $th) {
            DB::rollBack();

            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $title  = 'Ubah Jurnal';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Publikasi'],
            ['url' => '#', 'title' => 'Jurnal'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $data   = JurnalModel::with([
            'joinKoleksiJurnal' => function ($query) {
                $query->withTrashed();
            },
        ])
            ->findOrFail($id);

        return view('master.postingan.produk.produk_e', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'judul'             => 'required|string|max:255',
            'koleksi'           => 'required|exists:koleksi_jurnal,id',
            'pengarang'         => 'required|array',
            'penerbit'          => 'required|string|max:255',
            'tahun_terbit'      => 'required|date_format:Y',
            'keyword'           => 'required|array',
            'deskripsi'         => 'required',
            'berkas_jurnal'     => 'nullable|file|mimes:pdf|max:10240',
            'thumbnail'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();

        try {
            $jurnal                     = JurnalModel::findOrFail($id);
            $jurnal->koleksi_jurnal_id  = $request->koleksi;
            $jurnal->judul              = $request->judul;
            $jurnal->pengarang          = implode(', ', $request->pengarang);;
            $jurnal->penerbit           = $request->penerbit;
            $jurnal->tahun_terbit       = $request->tahun_terbit;
            $jurnal->deskripsi          = $request->deskripsi;
            $jurnal->keyword            = implode(', ', $request->keyword);;

            if ($request->hasFile('berkas_jurnal')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_BERKAS_JURNAL);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->berkas_jurnal,
                    $path_to_upload,
                    $file_name,
                    false,
                    $jurnal->berkas_jurnal
                );

                if ($upload['success'] === true) {
                    $jurnal->berkas_jurnal = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            if ($request->hasFile('thumbnail')) {
                $get_path_file  = setPathFile(KODE_FOLDER_PUBLIKASI_THUMBNAIL_JURNAL);
                $path_to_upload = $get_path_file['path'];
                $file_name      = $get_path_file['name'];

                $upload         = $this->uploadFile(
                    $request->thumbnail,
                    $path_to_upload,
                    $file_name,
                    true,
                    $jurnal->berkas_thumbnail,
                );

                if ($upload['success'] === true) {
                    $jurnal->berkas_thumbnail = $upload['file_name'];
                } else {
                    return $upload['message'];
                }
            }

            $jurnal->updated_by         = @user('id');
            $jurnal->save();

            DB::commit();

            return redirect()
                ->route('publikasi.jurnal.index')
                ->with('toast_success', 'Data telah disimpan!');
        } catch (Throwable $th) {
            DB::rollBack();

            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $produk             = JurnalModel::findOrFail($id);
            $produk->deleted_by = @user('id');
            $produk->save();
            $produk->delete();

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
