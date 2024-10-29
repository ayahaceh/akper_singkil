<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthCont extends Controller
{
    public function login()
    {
        $title      = 'Masuk ke Akun';
        $subtitle   = 'Silakan masuk untuk melanjutkan.';

        return view('auth.login', compact(
            'title',
            'subtitle',
        ));
    }

    public function login_store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password], true)) {
            createAdminSession($request);

            return redirectRole(user('role'));
        }

        return back()
            ->with('toast_failed', 'Username atau kata sandi salah.')
            ->onlyInput('username');
    }

    public function logout()
    {
        auth()->logout();
        session()->forget('user');

        return redirect()
            ->route('auth.login')
            ->with('toast_success', 'Anda telah mengakhiri sesi.');
    }
}
