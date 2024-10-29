<?php

namespace App\Http\Controllers\Postingan;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;
use Image;

class BlogCont extends Controller
{
    public function create()
    {
        $title  = 'Tambah Postingan Blog';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Blog'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        return view('master.postingan.blog.blog_a', compact(
            'title',
            'bread',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'kategori_id'   => 'required|exists:kategori,id',
            'judul'         => 'required|max:255',
            'konten'        => 'required',
            'konten_resume' => 'required|string|max:255',
            'tag'           => 'required|max:255',
            'thumbnail'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $blog                   = new BlogModel();
            $blog->kategori_id      = $request->kategori_id;
            $blog->judul            = $request->judul;
            $blog->konten           = $request->konten;
            $blog->konten_resume    = $request->konten_resume;
            $blog->tag              = implode(',', $request->tag);

            $thumbnail          = $this->uploadThumbnail($request);
            if ($thumbnail['status'] === 'uploaded') {
                $blog->thumbnail = $thumbnail['file_name'];
            } else {
                return back()
                    ->with('toast_failed', 'Gagal mengupload thumbnail: ' . $thumbnail['message'])
                    ->withInput();
            }

            $blog->jml_view     = 0;
            $blog->status       = BLOG_STATUS_DITERBITKAN;
            $blog->created_by   = @user('id');
            $blog->updated_by   = @user('id');

            $blog->save();

            return redirect()
                ->route('postingan.blogg.index')
                ->with('toast_success', 'Berhasil menambahkan postingan blog.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage())
                ->withInput();
        }
    }

    public function uploadThumbnail($request)
    {
        try {
            $file_name      = Str::limit($request->judul, 64, '') . '-' . time();
            $file_name      = Str::of($file_name)->slug('-');
            $thumbnail      = $request->file('thumbnail');
            $thumbnail_name = $file_name . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail_path = public_path('/web/foto/postingan/blog/thumbnail/');

            $thumbnail->move($thumbnail_path, $thumbnail_name);

            // comporess image
            $thumbnail_path_compress_to = public_path('/web/foto/postingan/blog/thumbnail/compress/' . $thumbnail_name);

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

    public function index(Request $request)
    {
        $search = true;
        $title  = 'Postingan Blog';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Blog'],
        ];

        $blog_diterbitkan = [];
        if (!$request->has('tab') || $request->tab == 'diterbitkan') {
            $blog_diterbitkan = BlogModel::with(['joinKategori' => fn ($query) => $query->withTrashed()])
                ->whereStatus(BLOG_STATUS_DITERBITKAN)
                ->latest();

            if ($request->has('cari')) {
                $blog_diterbitkan = $blog_diterbitkan->where(function ($query) use ($request) {
                    $query->where('judul', 'like', '%' . $request->cari . '%')
                        ->orWhere('konten', 'like', '%' . $request->cari . '%')
                        ->orWhereHas('joinKategori', function ($query) use ($request) {
                            $query
                                ->where('nama_kategori', 'like', '%' . $request->cari . '%')
                                ->withTrashed();
                        });
                });
            }

            $blog_diterbitkan = $blog_diterbitkan->paginate(20);

            if ($request->has('cari')) {
                $blog_diterbitkan->appends(['cari' => $request->cari]);
            }
        }

        $blog_draf = [];
        if ($request->has('tab') && $request->tab == 'draf') {
            $blog_draf = BlogModel::with(['joinKategori' => fn ($query) => $query->withTrashed()])
                ->whereStatus(BLOG_STATUS_DRAF)
                ->latest();

            if ($request->has('cari')) {
                $blog_draf = $blog_draf->where(function ($query) use ($request) {
                    $query->where('judul', 'like', '%' . $request->cari . '%')
                        ->orWhere('konten', 'like', '%' . $request->cari . '%')
                        ->orWhereHas('joinKategori', function ($query) use ($request) {
                            $query
                                ->where('nama_kategori', 'like', '%' . $request->cari . '%')
                                ->withTrashed();
                        });
                });
            }

            $blog_draf = $blog_draf->paginate(20);

            if ($request->has('cari')) {
                $blog_draf->appends(['cari' => $request->cari]);
            }

            $blog_draf->appends(['tab' => 'draf']);
        }

        return view('master.postingan.blog.blog_l', compact(
            'search',
            'title',
            'bread',
            'blog_diterbitkan',
            'blog_draf',
        ));
    }

    public function show($id)
    {
        $title  = 'Lihat Postingan Blog';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Blog'],
            ['url' => '#', 'title' => 'Lihat'],
        ];

        $data   = BlogModel::with([
            'joinKategori' => fn ($query) => $query->withTrashed(),
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
        ])
            ->findOrFail($id);

        return view('master.postingan.blog.blog_s', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function edit($id)
    {
        $title  = 'Ubah Postingan Blog';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Postingan'],
            ['url' => '#', 'title' => 'Blog'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $data   = BlogModel::with([
            'joinKategori' => fn ($query) => $query->withTrashed(),
            'joinCreatedBy' => fn ($query) => $query->withTrashed(),
        ])
            ->findOrFail($id);

        return view('master.postingan.blog.blog_e', compact(
            'title',
            'bread',
            'data',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kategori_id'   => 'required|exists:kategori,id',
            'judul'         => 'required|string|max:255',
            'konten'        => 'required',
            'konten_resume' => 'required|string|max:255',
            'tag'           => 'required|max:255',
            'thumbnail'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $blog                   = BlogModel::findOrFail($id);
            $blog->kategori_id      = $request->kategori_id;
            $blog->judul            = $request->judul;
            $blog->konten           = $request->konten;
            $blog->konten_resume    = $request->konten_resume;
            $blog->tag              = implode(',', $request->tag);

            if ($request->hasFile('thumbnail')) {
                $thumbnail  = $this->uploadThumbnail($request);
                if ($thumbnail['status'] === 'uploaded') {
                    // remove old thumbnail
                    if (file_exists(public_path('web/foto/postingan/blog/thumbnail/' . $blog->thumbnail))) {
                        unlink(public_path('web/foto/postingan/blog/thumbnail/' . $blog->thumbnail));
                    }

                    // remove old thumbnail compress
                    if (file_exists(public_path('web/foto/postingan/blog/thumbnail/compress/' . $blog->thumbnail))) {
                        unlink(public_path('web/foto/postingan/blog/thumbnail/compress/' . $blog->thumbnail));
                    }

                    $blog->thumbnail = $thumbnail['file_name'];
                } else {
                    return back()
                        ->with('toast_failed', 'Gagal mengupload thumbnail: ' . $thumbnail['message'])
                        ->withInput();
                }
            }

            $blog->updated_by   = @user('id');
            $blog->save();

            return redirect()
                ->route('postingan.blogg.show', ['id' => $id])
                ->with('toast_success', 'Postingan berhasil diubah.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function move_draf($id)
    {
        try {
            $blog = BlogModel::findOrFail($id);

            $blog->status = BLOG_STATUS_DRAF;

            $blog->save();

            return back()
                ->with('toast_success', 'Berhasil memindahkan postingan blog ke dalam tabulasi draf.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function restore_draf($id)
    {
        try {
            $blog = BlogModel::findOrFail($id);

            $blog->status = BLOG_STATUS_DITERBITKAN;

            $blog->save();

            return back()
                ->with('toast_success', 'Berhasil mempublikasikan postingan blog.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $blog = BlogModel::findOrFail($id);
            $blog->deleted_by = @user('id');
            $blog->save();
            $blog->delete();

            session()->flash('toast_success', 'Berhasil menghapus postingan blog.');

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
