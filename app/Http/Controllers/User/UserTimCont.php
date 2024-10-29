<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\RefJenisTimModel;
use App\Models\TimModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class UserTimCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request, $ref_jenis_tim_id = null)
    {
        $search = true;
        $title  = 'Dosen & Staff';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Dosen & Staff'],
        ];

        $users  = TimModel::with('joinRefJenisTim')
            ->orderBy('no_urut');

        if ($ref_jenis_tim_id) {
            $users = $users->where('ref_jenis_tim_id', $ref_jenis_tim_id);
        }

        if ($request->has('cari')) {
            $users  = $users->where(function ($query) use ($request) {
                $query
                    ->where('nama', 'like', '%' . $request->cari . '%')
                    ->orWhere('nip', 'like', '%' . $request->cari . '%')
                    ->orWhere('email', 'like', '%' . $request->cari . '%');

                $query->orWhereHas('joinRefJenisTim', function ($query) use ($request) {
                    $query->where('nama_jenis', 'like', "%$request->cari%");
                });
            });
        }

        $users = $users->paginate(20);

        if ($request->has('cari')) {
            $users->appends(['cari' => $request->cari]);
        }

        if (@user('role')) {
            return view('user.tim.tim_l', compact(
                'search',
                'title',
                'bread',
                'users'
            ));
        }

        $ref_jenis_tim  = RefJenisTimModel::where('id', $ref_jenis_tim_id)->firstOrFail();
        $title          = $ref_jenis_tim->nama_jenis;
        $search         = true;

        return view('public_pages.tim.tim_l', compact(
            'title',
            'users',
            'search',
        ));
    }

    public function create()
    {
        $title  = 'Tambah Dosen & Staff';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Dosen & Staff'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        $ref_jenis_tims = RefJenisTimModel::all();

        return view('user.tim.tim_a', compact(
            'title',
            'bread',
            'ref_jenis_tims',
        ));
    }

    public function store(Request $request)
    {
        $rules  = [
            'jenis_pegawai'         => 'required|exists:ref_jenis_tim,id',
            'nama'                  => 'required|string|max:255',
            'nip'                   => 'nullable|numeric',
            'selaku'                => 'nullable',
            'tentang'               => 'nullable|string|max:1024',
            'no_urut'               => 'required|numeric',
            'profil'                => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $user                   = new TimModel();
            $user->ref_jenis_tim_id = $request->jenis_pegawai;
            $user->nama             = $request->nama;
            $user->nip              = $request->nip;
            $user->selaku           = $request->selaku;
            $user->tentang          = $request->tentang;
            $user->twitter          = $request->twitter;
            $user->facebook         = $request->facebook;
            $user->instagram        = $request->instagram;
            $user->linkedin         = $request->linkedin;
            $user->no_urut          = $request->no_urut;

            if ($request->hasFile('profil')) {
                $upload     = $this->uploadCompress($request, 'profil', 'web/foto/tim', Str::slug($request->nama, ''), ['x' => 300, 'y' => null], true);

                if ($upload['success'] === true) {
                    $user->profil = $upload['file_name'];
                } else {
                    return back()
                        ->with('toast_failed', $upload['message'])
                        ->withInput();
                }
            } else {
                $user->profil = 'default.png';
            }

            $user->save();

            return redirect()
                ->route('user.tim.index')
                ->with('toast_success', 'Data telah disimpan!');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile('web/foto/tim/', $upload['file_name']);
                $this->removeFile('web/foto/tim/compress/', $upload['file_name']);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $title  = 'Ubah Dosen & Staff';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'Dosen & Staff'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $user           = TimModel::findOrFail($id);
        $ref_jenis_tims = RefJenisTimModel::all();

        return view('user.tim.tim_e', compact(
            'title',
            'bread',
            'user',
            'ref_jenis_tims'
        ));
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'jenis_pegawai'         => 'required|exists:ref_jenis_tim,id',
            'nama'                  => 'required|string|max:255',
            'nip'                   => 'nullable|numeric',
            'selaku'                => 'nullable',
            'tentang'               => 'nullable|string|max:1024',
            'no_urut'               => 'required|numeric',
            'profil'                => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $user                   = TimModel::findOrFail($id);
            $user->ref_jenis_tim_id = $request->jenis_pegawai;
            $user->nama             = $request->nama;
            $user->nip              = $request->nip;
            $user->selaku           = $request->selaku;
            $user->tentang          = $request->tentang;
            $user->twitter          = $request->twitter;
            $user->facebook         = $request->facebook;
            $user->instagram        = $request->instagram;
            $user->linkedin         = $request->linkedin;
            $user->no_urut          = $request->no_urut;

            if ($request->hasFile('profil')) {
                $upload     = $this->uploadCompress($request, 'profil', 'web/foto/tim', Str::slug($request->nama, ''), ['x' => 300, 'y' => 300], true);

                if ($upload['success'] === true) {
                    $this->removeFile('web/foto/tim/', $user->profil);
                    $this->removeFile('web/foto/tim/compress/', $user->profil);

                    $user->profil = $upload['file_name'];
                } else {
                    return back()
                        ->with('toast_failed', $upload['message'])
                        ->withInput();
                }
            }

            $user->save();

            return redirect()
                ->route('user.tim.index')
                ->with('toast_success', 'Data telah disimpan!');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile('web/foto/tim/', $upload['file_name']);
                $this->removeFile('web/foto/tim/compress/', $upload['file_name']);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            TimModel::findOrFail($id)->delete();

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
