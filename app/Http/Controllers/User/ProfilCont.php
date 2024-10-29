<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

class ProfilCont extends Controller
{
    use UploadFileTrait;

    public function edit()
    {
        $title  = 'Profil Saya';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Profil Saya'],
        ];

        return view('user.profil_e', compact(
            'title',
            'bread',
        ));
    }

    public function edit_update(Request $request)
    {
        $id     = user('id');
        $request->merge(['username' => Str::slug($request->username, '')]);

        $rules  = [
            'username'  => 'required|unique:users,username,' . $id,
            'nama'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $id,
            'alamat'    => 'required',
            'profil'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        try {
            $user           = UserModel::findOrFail($id);
            $user->username = $request->username;
            $user->nama     = $request->nama;
            $user->email    = $request->email;
            $user->alamat   = $request->alamat;

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

            session()->forget('user');
            createAdminSession($request);

            return redirect()
                ->route('profil-saya')
                ->with('toast_success', 'Profil berhasil diubah');
        } catch (Throwable $th) {
            if ($request->hasFile('profil')) {
                $this->removeFile('web/foto/profil/', $upload['file_name']);
                $this->removeFile('web/foto/profil/compress/', $upload['file_name']);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function ganti_sandi()
    {
        $title  = 'Ganti Kata Sandi';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Ganti Sandi'],
        ];

        return view('user.ganti_sandi', compact(
            'title',
            'bread',
        ));
    }

    public function ganti_sandi_update(Request $request)
    {
        $rules  = [
            'password_lama' => 'required',
            'password'      => 'required|confirmed',
        ];

        $this->validate($request, $rules);

        try {
            // cek password lama
            if (!Hash::check($request->password_lama, user('password'))) {
                return back()
                    ->with('toast_failed', 'Kata sandi lama salah.')
                    ->withInput();
            }

            $user           = UserModel::findOrFail(user('id'));
            $user->password = Hash::make($request->password);
            $user->save();

            return back()
                ->with('toast_success', 'Kata sandi telah dirubah.');
        } catch (Throwable $th) {
            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }
}
