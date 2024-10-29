<?php

namespace App\Http\Controllers\Postingan;

use App\Http\Controllers\Controller;
use App\Models\ProdukGambarModel;
use App\Models\ProdukKategoriModel;
use App\Models\ProdukModel;
use App\Models\ProdukTerlarisModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;
use Image;

class ProdukCont extends Controller
{
    public function step1_create()
    {
        $title  = 'Tambah Postingan Produk';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Produk'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        $step   = 1;
        $kelola = false;

        return view('master.postingan.produk.produk_a', compact(
            'title',
            'bread',
            'step',
            'kelola',
        ));
    }

    public function step2_create($id)
    {
        $title  = 'Tambah Postingan Produk';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Produk'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        $kelola = false;
        if (request()->has('kelola')) {
            $title  = 'Kelola Gambar Produk';
            $bread  = [
                ['url' => route('dashboard'), 'title' => 'Dashboard'],
                ['url' => '#', 'title' => 'Postingan'],
                ['url' => '#', 'title' => 'Produk'],
                ['url' => '#', 'title' => 'Kelola Gambar'],
            ];
            $kelola = true;
        }

        $step   = 2;
        $data   = ProdukModel::whereId($id)
            ->with('joinProdukGambar')
            ->first();

        if ($data == null) {
            return back()
                ->with('toast_failed', 'Produk tidak ditemukan.');
        }

        return view('master.postingan.produk.produk_a', compact(
            'title',
            'bread',
            'step',
            'data',
            'kelola',
        ));
    }

    public function step1_store(Request $request)
    {
        $rules = [
            'kategori_id'       => 'required|array',
            'nama_produk'       => 'required|max:255',
            'keterangan_produk' => 'required',
            'thumbnail'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $produk                     = new ProdukModel();
            $produk->nama_produk        = $request->nama_produk;
            $produk->keterangan_produk  = $request->keterangan_produk;
            $produk->link_demo          = $request->link_demo ?? null;

            $thumbnail                  = $this->uploadThumbnail($request);
            if ($thumbnail['status'] === 'uploaded') {
                $produk->thumbnail = $thumbnail['file_name'];
            } else {
                return back()
                    ->with('toast_failed', 'Gagal mengupload thumbnail: ' . $thumbnail['message'])
                    ->withInput();
            }

            $produk->jml_view           = 0;
            $produk->created_by         = @user('id');
            $produk->updated_by         = @user('id');
            $produk->save();

            // insert kategori to produk_kategori
            $kategories = $request->kategori_id;
            foreach ($kategories as $kategori) {
                $produk_kategori                = new ProdukKategoriModel();
                $produk_kategori->produk_id     = $produk->id;
                $produk_kategori->kategori_id   = $kategori;
                $produk_kategori->save();
            }

            return redirect()
                ->route('postingan.produk.step2-create', ['id' => $produk->id]);
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function uploadThumbnail($request)
    {
        try {
            $file_name      = Str::limit($request->nama_produk, 64, '') . '-' . time();
            $file_name      = Str::of($file_name)->slug('-');
            $thumbnail      = $request->file('thumbnail');
            $thumbnail_name = $file_name . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail_path = public_path('/web/foto/postingan/produk/thumbnail/');

            $thumbnail->move($thumbnail_path, $thumbnail_name);

            // comporess image
            $thumbnail_path_compress_to = public_path('/web/foto/postingan/produk/thumbnail/compress/' . $thumbnail_name);

            Image::make($thumbnail_path . $thumbnail_name)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($thumbnail_path_compress_to);

            return [
                'status'    => 'uploaded',
                'file_name' => $thumbnail_name,
            ];
        } catch (Throwable $th) {
            return [
                'status'    => 'failed',
                'message'   => $th->getMessage(),
            ];
        }
    }

    public function step2_store(Request $request, $id)
    {
        $file           = $request->file('file');
        $file_name      = $file->getClientOriginalName();
        $file_path      = public_path('/web/foto/postingan/produk/');

        $file->move($file_path, $file_name);

        // compress
        $file_path_compress_to = public_path('/web/foto/postingan/produk/compress/' . $file_name);
        Image::make($file_path . $file_name)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($file_path_compress_to);

        $produk_gambar = new ProdukGambarModel();
        $produk_gambar->produk_id   = $id;
        $produk_gambar->gambar      = $file_name;
        $produk_gambar->save();

        return response()->json([
            'success' => true,
        ]);
    }

    public function step2_delete(Request $request)
    {
        $file_name  = $request->gambar;
        $file_path  = public_path('/web/foto/postingan/produk/');

        ProdukGambarModel::whereGambar($file_name)->delete();

        if (file_exists($file_path . $file_name)) {
            unlink($file_path . $file_name);
        }

        // delete compress
        $file_path_compress_to = public_path('/web/foto/postingan/produk/compress/' . $file_name);
        if (file_exists($file_path_compress_to)) {
            unlink($file_path_compress_to);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function send_message(Request $request)
    {
        if ($request->has('detail_id')) {
            return redirect()
                ->route('postingan.produkk.show', ['id' => $request->detail_id])
                ->with('toast_success', 'Gambar produk telah disimpan.');
        }

        return redirect()
            ->route('postingan.produkk.index')
            ->with('alert_success', 'Produk telah disimpan!');
    }

    public function index(Request $request)
    {
        $search = true;
        $title  = 'Postingan Produk';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Produk'],
        ];

        $produk = [];
        if (!$request->has('tab') || $request->tab == 'daftar') {
            $produk = ProdukModel::with(['joinProdukKategori' => function ($query) {
                $query->with(['joinKategori' => fn ($query) => $query->withTrashed()]);
            }])
                ->latest();

            if ($request->has('cari')) {
                $produk = $produk->where(function ($query) use ($request) {
                    $query
                        ->where('nama_produk', 'like', '%' . $request->cari . '%')
                        ->orWhere('keterangan_produk', 'like', '%' . $request->cari . '%')
                        ->orWhereHas('joinProdukKategori', function ($query) use ($request) {
                            $query->whereHas('joinKategori', function ($query) use ($request) {
                                $query
                                    ->where('nama_kategori', 'like', '%' . $request->cari . '%')
                                    ->withTrashed();
                            });
                        });
                });
            }

            $produk = $produk->paginate(20);

            if ($request->has('cari')) {
                $produk->appends(['cari' => $request->cari]);
            }
        }

        $teratas = [];
        if ($request->tab === 'teratas') {
            $search     = false;
            $teratas    = ProdukTerlarisModel::with(['joinProduk' => function ($query) {
                $query
                    ->with(['joinProdukKategori' => function ($query) {
                        $query->with(['joinKategori' => fn ($query) => $query->withTrashed()]);
                    }]);
            }])
                ->limit(MINIMAL_PRODUK_TERTAS)
                ->get();
        }

        return view('master.postingan.produk.produk_l', compact(
            'search',
            'title',
            'bread',
            'produk',
            'teratas',
        ));
    }

    public function show($id)
    {
        $title  = 'Lihat Postingan Produk';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Produk'],
            ['url' => '#', 'title' => 'Lihat'],
        ];

        $data   = ProdukModel::with([
            'joinProdukKategori' => function ($query) {
                $query->with(['joinKategori' => fn ($query) => $query->withTrashed()]);
            },
            'joinProdukGambar',
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
        ])
            ->findOrFail($id);

        return view('master.postingan.produk.produk_s', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function edit($id)
    {
        $title  = 'Ubah Postingan Produk';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Produk'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $data   = ProdukModel::with([
            'joinProdukKategori' => function ($query) {
                $query
                    ->whereHas('joinKategori', function ($query) {
                        $query
                            ->whereNull('deleted_at');
                    })
                    ->with(['joinKategori']);
            },
            'joinProdukGambar',
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
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
            'kategori_id'       => 'required|array',
            'nama_produk'       => 'required|max:255',
            'keterangan_produk' => 'required',
            'thumbnail'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $produk                     = ProdukModel::findOrFail($id);
            $produk->nama_produk        = $request->nama_produk;
            $produk->keterangan_produk  = $request->keterangan_produk;
            $produk->link_demo          = $request->link_demo ?? null;

            if ($request->hasFile('thumbnail')) {
                $thumbnail                  = $this->uploadThumbnail($request);
                if ($thumbnail['status'] === 'uploaded') {
                    // remove old thumbnail
                    if (file_exists(public_path('web/foto/postingan/produk/thumbnail/' . $produk->thumbnail))) {
                        unlink(public_path('web/foto/postingan/produk/thumbnail/' . $produk->thumbnail));
                    }

                    // remove old thumbnail compress
                    if (file_exists(public_path('web/foto/postingan/produk/thumbnail/compress/' . $produk->thumbnail))) {
                        unlink(public_path('web/foto/postingan/produk/thumbnail/compress/' . $produk->thumbnail));
                    }

                    $produk->thumbnail = $thumbnail['file_name'];
                } else {
                    return back()
                        ->with('toast_failed', 'Gagal mengupload thumbnail: ' . $thumbnail['message'])
                        ->withInput();
                }
            }

            $produk->updated_by         = @user('id');
            $produk->save();

            // delete kategori old
            ProdukKategoriModel::whereProdukId($id)->delete();

            // insert kategori to produk_kategori
            $kategories = $request->kategori_id;
            foreach ($kategories as $kategori) {
                $produk_kategori                = new ProdukKategoriModel();
                $produk_kategori->produk_id     = $produk->id;
                $produk_kategori->kategori_id   = $kategori;
                $produk_kategori->save();
            }

            return redirect()
                ->route('postingan.produkk.show', ['id' => $id]);
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $produk             = ProdukModel::findOrFail($id);
            $produk->deleted_by = @user('id');
            $produk->save();
            $produk->delete();

            session()->flash('toast_success', 'Berhasil menghapus postingan produk.');

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

    public function teratas_store(Request $request)
    {
        $rules = [
            'produk_id' => 'required|exists:produk,id|unique:produk_terlaris,produk_id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('atur-produk-teratas-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            // cek jumlah produk
            $produk_terlaris = ProdukTerlarisModel::count();

            if ($produk_terlaris >= MINIMAL_PRODUK_TERTAS) {
                return back()
                    ->with('atur-produk-teratas-modal', true)
                    ->withInput()
                    ->with('toast_failed', 'Produk teratas sudah mencapai ' . MINIMAL_PRODUK_TERTAS . '.');
            }

            $produk_terlaris = new ProdukTerlarisModel();
            $produk_terlaris->produk_id = $request->produk_id;
            $produk_terlaris->save();

            return back()
                ->with('toast_success', 'Berhasil menambahkan produk teratas.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function teratas_delete($id)
    {
        try {
            ProdukTerlarisModel::findOrFail($id)->delete();

            session()->flash('toast_success', 'Berhasil menghapus produk dari daftar Teratas.');

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
