<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\LamanModel;
use App\Models\Menu\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class LamanCont extends Controller
{
    public function create_or_update($menu_id, $laman_id = null)
    {
        $title  = 'Laman';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Tampilan'],
            ['url' => '#', 'title' => 'Menu'],
            ['url' => '#', 'title' => 'Laman'],
        ];

        $laman = LamanModel::where('id', $laman_id)->first();

        return view('menu.laman.laman_e', compact(
            'title',
            'bread',
            'laman',
        ));
    }

    public function create_or_update_store(Request $request, $menu_id, $laman_id = null)
    {
        $rules = [
            'nama_laman'            => 'required|string|max:255',
            'uraian'                => 'required',
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $create_or_update = [
                'nama_laman'    => $request->nama_laman,
                'uraian'        => $request->uraian,
            ];

            if (!$laman_id) {
                $create_or_update['created_by'] = auth()->id();
            } else {
                $create_or_update['updated_by'] = auth()->id();
            }

            $laman = LamanModel::updateOrCreate(
                ['id' => $laman_id],
                $create_or_update,
            );

            // Update menu -> laman_id
            MenuModel::where('id', $menu_id)->update([
                'laman_id'  => $laman->id
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            return $th->getMessage();
        }

        return redirect()->route('menu.index')->with('toast_success', 'Data telah disimpan!');
    }

    public function show($slug_menu)
    {
        $menu_id    = base64_decode(explode('-', $slug_menu)[count(explode('-', $slug_menu)) - 1]);
        $menu       = MenuModel::where('id', $menu_id)
            ->with('joinLaman')
            ->firstOrFail();

        $title      = $menu->nama_menu;

        return view('public_pages.laman.laman_s', compact(
            'title',
            'menu',
        ));
    }
}
