<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadFileTrait;
use App\Models\PartnerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PartnerCont extends Controller
{
    use UploadFileTrait;

    public function index(Request $request)
    {
        $search = false;
        $title  = 'Partner';
        $bread  = [
            ['url' => route('dashboard'), 'title' => 'Dashboard'],
            ['url' => '#', 'title' => 'Pengaturan'],
            ['url' => '#', 'title' => 'Partner'],
        ];

        $partner = PartnerModel::paginate(20);

        return view('pengaturan.partner.partner_l', compact(
            'search',
            'title',
            'bread',
            'partner',
        ));
    }

    public function store(Request $request)
    {
        $rules  = [
            'logo'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->with('tambah-partner-modal', true)
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $create         = new PartnerModel();

            if ($request->hasFile('logo')) {
                $upload_path    = 'web/foto/partner';
                $upload         = $this->uploadCompress($request, 'logo', $upload_path, Str::random(12));
                if ($upload['success'] === true) {
                    $create->logo   = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'tambah-partner-modal'  => true,
                            'toast_failed'          => 'Gagal mengupload logo: ' . $upload['message']
                        ])
                        ->withInput();
                }
            }

            $create->save();

            return back()
                ->with('toast_success', 'Data berhasil ditambahkan.');
        } catch (Throwable $th) {

            if ($request->hasFile('logo')) {
                $this->removeFile($upload_path . '/', $create->logo);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $rules  = [
            'logo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $validator  = Validator::make($request->all(), $rules);
        $update     = PartnerModel::findOrFail($id);

        if ($validator->fails()) {
            return back()
                ->with([
                    'ubah-partner-modal'        => true,
                    'ubah-partner-modal-action' => route('partner.update', $id),
                    'ubah-logo-partner-modal'   => $update->foto_logo,
                ])
                ->withInput()
                ->withErrors($validator);
        }

        try {
            if ($request->hasFile('logo')) {
                $upload_path    = 'web/foto/partner';
                $upload         = $this->uploadCompress($request, 'logo', $upload_path, Str::random(12));
                if ($upload['success'] === true) {
                    // remove file
                    $this->removeFile($upload_path . '/', $update->logo);

                    $update->logo = $upload['file_name'];
                } else {
                    return back()
                        ->with([
                            'ubah-partner-modal'        => true,
                            'ubah-partner-modal-action' => route('partner.update', ['id' => $id]),
                            'ubah-logo-partner-modal'   => $update->foto_logo,
                            'toast_failed'              => 'Gagal mengupload foto_logo: ' . $upload['message']
                        ])
                        ->withInput();
                }
            }

            $update->save();

            return back()
                ->with('toast_success', 'Data berhasil diubah.');
        } catch (Throwable $th) {

            if ($request->hasFile('logo')) {
                $this->removeFile($upload_path . '/', $update->logo);
            }

            return back()
                ->with('toast_failed', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $partner    = PartnerModel::findOrFail($id);
            $logo       = $partner->logo;
            $partner->delete();

            $this->removeFile('web/foto/partner/', $logo);

            session()->flash('toast_success', 'Data berhasil dihapus.');

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
