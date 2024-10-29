<?php

use App\Http\Controllers\Auth\AuthCont;
use App\Models\UserModel;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthCont::class, 'login'])->name('auth.login');
Route::post('/login/store', [AuthCont::class, 'login_store'])->name('auth.login.store');
Route::get('/logout', [AuthCont::class, 'logout'])->name('auth.logout');

Route::get('/example', function () {
    $title  = 'Example Page';
    $search = true;

    if (request()->has('_token')) {
        // request()->validate([
        //     'email' => 'required|string',
        //     'country' => 'required|string',
        //     'description' => 'required|string',
        // ]);
    }

    $users = UserModel::paginate(10);

    return view('example', compact(
        'title',
        'search',
        'users',
    ));
});

// route group
// Route::group(['middleware' => ['auth', 'role:1']], function () {
//     Route::get('/dashboard', function () {
//         $title  = 'Dashboard';
//         $bread  = [
//             ['url' => route('dashboard'), 'title' => 'Dashboard'],
//         ];
//         $pencarian  = true;

//         return view('dashboard.dashboard', compact(
//             'title',
//             'bread',
//             'pencarian',
//         ));
//     })->name('dashboard');
// });
