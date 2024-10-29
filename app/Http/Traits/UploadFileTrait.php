<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Throwable;

trait UploadFileTrait
{
    public function uploadFile($file, $path_to_upload, $file_name = null, $with_compress = false, $old_file = null)
    {
        try {
            if ($old_file) {
                if (file_exists(public_path($path_to_upload . '/' . $old_file))) {
                    unlink(public_path($path_to_upload . '/' . $old_file));
                }

                if ($with_compress && file_exists(public_path($path_to_upload . '/compress/' . $old_file))) {
                    unlink(public_path($path_to_upload . '/compress/' . $old_file));
                }
            }

            if ($file_name) {
                $file_name      = $file_name . '.' . $file->getClientOriginalExtension();
            } else {
                $random_number  = rand(1, 99);
                $random_number  = $random_number < 10 ? '0' . $random_number : $random_number;
                $file_name      = $file_name . '_' . date('YmdHis') . $random_number . '.' . $file->getClientOriginalExtension();
            }

            // check if exist path to upload
            if (!File::exists($path_to_upload)) {
                File::makeDirectory($path_to_upload, 0777, true);
            }

            // move file original
            $file->move($path_to_upload, $path_to_upload . '/' . $file_name);

            if ($file->getClientOriginalExtension() !== 'pdf') {
                // compress image
                if ($with_compress) {
                    // check if exist path to upload
                    if (!File::exists($path_to_upload . '/compress')) {
                        File::makeDirectory($path_to_upload . '/compress', 0777, true);
                    }

                    $img = Image::make($path_to_upload . '/' . $file_name);
                    $img->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path_to_upload . '/compress/' . $file_name);
                }
            }


            return [
                'success'   => true,
                'file_name' => $file_name
            ];
        } catch (Throwable $th) {
            return [
                'success'   => false,
                'message'   => 'Upload ' . $file_name . ' failed: ' . $th->getMessage()
            ];
        }
    }


    public function uploadCompress($request, $field, $path, $file_name, $compress = ['x' => 300, 'y' => null], $with_original = false)
    {
        try {
            $file_name      = Str::limit($file_name, 64, '') . '-' . time();
            $file_name      = Str::of($file_name)->slug('-');
            $file           = $request->file($field);
            $file_name      = $file_name . '.' . $file->getClientOriginalExtension();

            if ($with_original) {
                $file->move(public_path('/' . $path . '/'), $file_name);

                $make       = public_path('/' . $path . '/') . $file_name;
                $save       = public_path($path . '/' . 'compress/' . $file_name);
            } else {
                $make       = $file;
                $save       = public_path($path . '/' . $file_name);
            }

            Image::make($make)
                ->resize($compress['x'], $compress['y'], function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($save);

            return [
                'success'   => true,
                'file_name' => $file_name,
            ];
        } catch (Throwable $th) {
            return [
                'success'   => false,
                'message'   => $th->getMessage(),
            ];
        }
    }

    public function removeFile($file_path, $file_name)
    {
        if ($file_name !== 'default.png') {
            if (file_exists(public_path($file_path . $file_name))) {
                unlink(public_path($file_path . $file_name));
            }
        }
    }
}
