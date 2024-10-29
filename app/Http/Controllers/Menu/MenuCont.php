<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class MenuCont extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Daftar Menu';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Tampilan'],
            ['url' => '#', 'title' => 'Menu'],
        ];

        $menus  = MenuModel::with([
            'joinSubMenus',
            'joinRefJenisMenu',
        ])
            ->get();


        return view('menu.menu_l', compact(
            'title',
            'bread',
            'menus',
        ));
    }

    public function change_link(Request $request, $menu_id)
    {
        $rules = [
            'link'          => 'required|string|max:255',
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            MenuModel::where([
                'id'                    => $menu_id,
                'ref_jenis_menu_id'     => REF_JENIS_MENU_LINK,
            ])
                ->update([
                    'redirect_link'         => $request->link,
                ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            return $th->getMessage();
        }

        return back()->with('toast_success', 'Data telah disimpan!');
    }
}
