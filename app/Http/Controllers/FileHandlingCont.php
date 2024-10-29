<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileHandlingCont extends Controller
{
    public function index($nama_file)
    {
        // ini nanti bisa di berikan improvement
        // dengan memberikan paramenter baru pada nama file
        // saat user melakukan upload file tsb.
        // contoh case:
        // Misal untuk file private yang hanya bisa diakses oleh user yg upload saja,
        // maka pada akhir nama file dikasih kode huruf pr
        // sehingga nama file di akhir stringnya 123_4567_......_p.pdf
        // ujung file bs dikasih pr = private, pb = publik

        // Sementara langsung download aja, yg pntg uda login
        $file_path = getPathFile($nama_file);
        return response()->download($file_path);
    }

    public function preview(Request $request, $nama_file)
    {
        return response()->file(getPathFile($nama_file, $request->has('call_compressed') ? true : false));
    }
}
