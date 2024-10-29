<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserAdminCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $search = true;
        $title  = 'User Admin';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'User Admin'],
        ];

        $users  = UserModel::whereIn('role', [USER_ROLE_SUPER_ADMIN, USER_ROLE_ADMIN])
            ->whereStatus(USER_STATUS_AKTIF);

        if ($request->has('cari')) {
            $users  = $users->where(function ($query) use ($request) {
                $query
                    ->where('nama', 'like', '%' . $request->cari . '%')
                    ->orWhere('email', 'like', '%' . $request->cari . '%');
            });
        }

        $users = $users->paginate(20);

        if ($request->has('cari')) {
            $users->appends(['cari' => $request->cari]);
        }

        return view('user.admin.admin_l', compact(
            'search',
            'title',
            'bread',
            'users'
        ));
    }

    public function create()
    {
        $title  = 'Tambah User Admin';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'User Admin'],
            ['url' => '#', 'title' => 'Tambah'],
        ];

        return view('user.admin.admin_a', compact(
            'title',
            'bread'
        ));
    }

    public function store(Request $request)
    {
        $request->merge(['username' => Str::slug($request->username, '')]);

        $rules  = [
            'username'  => 'required|unique:users,username',
            'nama'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'alamat'    => 'required',
            'profil'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role'      => 'required|in:' . USER_ROLE_SUPER_ADMIN . ',' . USER_ROLE_ADMIN . ',' . USER_ROLE_USER,
        ];

        $this->validate($request, $rules);

        try {
            $user           = new UserModel();
            $user->username = $request->username;
            $user->nama     = $request->nama;
            $user->email    = $request->email;
            $user->password = Hash::make(USER_PASSWORD_DEFAULT);
            $user->alamat   = $request->alamat;
            $user->role     = $request->role;
            $user->status   = USER_STATUS_AKTIF;

            if ($request->hasFile('profil')) {
                $upload     = $this->uploadCompress($request, 'profil', 'web/foto/profil', $request->username, ['x' => 300, 'y' => null], true);

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
                ->route('user.admin.index')
                ->with('toast_success', 'User berhasil ditambahkan');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile('web/foto/profil/', $upload['file_name']);
                $this->removeFile('web/foto/profil/compress/', $upload['file_name']);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function edit($id)
    {
        if ($id == @user('id')) {
            return back()
                ->with('toast_failed', 'Anda tidak dapat mengubah akun anda sendiri');
        }

        $title  = 'Ubah User Admin';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Master Data'],
            ['url' => '#', 'title' => 'User Admin'],
            ['url' => '#', 'title' => 'Ubah'],
        ];

        $user   = UserModel::findOrFail($id);

        return view('user.admin.admin_e', compact(
            'title',
            'bread',
            'user'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->merge(['username' => Str::slug($request->username, '')]);

        $rules  = [
            'username'  => 'required|unique:users,username,' . $id,
            'nama'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $id,
            'alamat'    => 'required',
            'profil'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role'      => 'required|in:' . USER_ROLE_SUPER_ADMIN . ',' . USER_ROLE_ADMIN . ',' . USER_ROLE_USER,
        ];

        $this->validate($request, $rules);

        try {
            $user           = UserModel::findOrFail($id);
            $user->username = $request->username;
            $user->nama     = $request->nama;
            $user->email    = $request->email;
            $user->alamat   = $request->alamat;
            $user->role     = $request->role;

            if ($request->hasFile('profil')) {
                $upload     = $this->uploadCompress($request, 'profil', 'web/foto/profil', $request->username, ['x' => 300, 'y' => 300], true);

                if ($upload['success'] === true) {
                    $this->removeFile('web/foto/profil/', $user->profil);
                    $this->removeFile('web/foto/profil/compress/', $user->profil);

                    $user->profil = $upload['file_name'];
                } else {
                    return back()
                        ->with('toast_failed', $upload['message'])
                        ->withInput();
                }
            }

            $user->save();

            return redirect()
                ->route('user.admin.index')
                ->with('toast_success', 'User berhasil diubah');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile('web/foto/profil/', $upload['file_name']);
                $this->removeFile('web/foto/profil/compress/', $upload['file_name']);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            UserModel::findOrFail($id)->delete();

            session()->flash('toast_success', 'Berhasil menghapus user.');

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
