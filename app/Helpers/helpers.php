<?php

if (!function_exists('adminTemplate')) {
    function adminTemplate()
    {
        // return 'templates/main_template';
        return 'templates/admin_template';
    }
}

if (!function_exists('loginTemplate')) {
    function loginTemplate()
    {
        return 'templates/auth_template';
    }
}

if (!function_exists('landingTemplate')) {
    function landingTemplate()
    {
        return 'templates/landing_template';
    }
}

if (!function_exists('redirectRole')) {
    function redirectRole($USER_ROLE)
    {
        if ($USER_ROLE == USER_ROLE_SUPER_ADMIN) {
            return redirect()->route('dashboard');
        } else if ($USER_ROLE == USER_ROLE_ADMIN) {
            dd('USER_ROLE_ADMIN');
        } else if ($USER_ROLE == USER_ROLE_USER) {
            dd('USER_ROLE_USER');
        }
    }
}

if (!function_exists('createAdminSession')) {
    function createAdminSession($request)
    {
        $user = auth()->user();

        $request->session()->regenerate();
        $request->session()->put('user', $user);
    }
}

if (!function_exists('user')) {
    function user($KEY = null)
    {
        $user = session('user');

        if ($KEY) {
            return $user->$KEY;
        }

        return $user;
    }
}

if (!function_exists('getLogo')) {
    function getLogo()
    {
        return asset('web/logo/alidata-icon.png');
    }
}

if (!function_exists('getAlidataLogo')) {
    function getAlidataLogo()
    {
        return asset('web/logo/alidata-logo.png');
    }
}

if (!function_exists('getAlidataNavIcon')) {
    function getAlidataNavIcon()
    {
        return asset('web/logo/alidata-nav-icon.png');
    }
}

if (!function_exists('getAlidataBanner')) {
    function getAlidataBanner()
    {
        return asset('web/logo/alidata-banner.png');
    }
}

if (!function_exists('getAlidataBannerWhite')) {
    function getAlidataBannerWhite()
    {
        return asset('web/logo/alidata-banner-white.png');
    }
}

if (!function_exists('getRole')) {
    function getRole()
    {
        if (user('role') === USER_ROLE_SUPER_ADMIN) {
            return 'Super Admin';
        } else if (user('role') === USER_ROLE_ADMIN) {
            return 'Admin';
        } else if (user('role') === USER_ROLE_USER) {
            return 'User';
        }
    }
}

// Format Date
if (!function_exists('formatDateBlog')) {
    function formatDateBlog($date)
    {
        return date('M d, Y', strtotime($date));
    }
}

if (!function_exists('formatDateProduk')) {
    function formatDateProduk($date)
    {
        return date('M d, Y', strtotime($date));
    }
}

if (!function_exists('formatDateDokumentasi')) {
    function formatDateDokumentasi($date)
    {
        return date('M d, Y H:i', strtotime($date));
    }
}

if (!function_exists('kodeToPathFolder')) {
    function kodeToPathFolder($kode_folder)
    {
        switch ($kode_folder) {
                // Publikasi Dokumen -> Berkas Pendukung
            case KODE_FOLDER_PUBLIKASI_DOKUMEN:
                return 'publikasi-dokumen';
                break;
            case KODE_FOLDER_PUBLIKASI_BERKAS_JURNAL:
                return 'publikasi-jurnal/berkas';
                break;
            case KODE_FOLDER_PUBLIKASI_THUMBNAIL_JURNAL:
                return 'publikasi-jurnal/thumbnail';
                break;
            case KODE_FOLDER_BERKAS_SERTIFIKAT_PRESTASI:
                return 'sertifikat-prestasi';
                break;
            default:
                return 'lainnya';
        }
    }
}


if (!function_exists('setPathFile')) {
    /**
     * @param int $kode_folder Kode folder untuk menentukan lokasi folder.
     * @param int $skpd_id ID SKPD.
     * @return array Mengembalikan array key `path` dan `name`.
     */
    function setPathFile($kode_folder)
    {
        // Folder dipisah per tahun dan Bulan date('Ym);
        $path       = kodeToPathFolder($kode_folder);
        $time       = now();
        $random     = str_pad(rand(1, 999), 3, '00', STR_PAD_LEFT); // 3 digit
        $sep1       = '/';
        $sep2       = '_';

        return [
            'path'  => 'upload' . $sep1 . $path . $sep1 . $time->format('Ym'),
            'name'  => $kode_folder . $sep2 . $time->format('Ym') . $sep2 . $time->format('dHis') . $sep2 . auth()->id() . $sep2 . $random
        ];
    }
}

if (!function_exists('getPathFile')) {
    function getPathFile($file_name, $call_compressed = false)
    {
        if (!$file_name) return null;

        // Untuk berkas default
        if ($file_name == 'default.jpg' || $file_name == 'default.pdf') {
            return 'upload/' . $file_name;
        }

        $sep        = '/';
        $exp        = explode('_', $file_name);
        // validasi jumlah array
        if (count($exp) <= 2) return null;
        // Tidak ada parameter SKPD pada app ini
        // $skpd_id    = $exp[0];
        // $path       = kodeToPathFolder($exp[1]);
        // $Ym         = $exp[2];
        // return 'upload' . $sep . $skpd_id . $sep . $path . $sep . $Ym . $sep . $file_name;
        $path       = kodeToPathFolder($exp[0]);
        $Ym         = $exp[1];

        return 'upload' . $sep . $path . $sep . $Ym . $sep . ($call_compressed ? 'compress' . $sep : '') . $file_name;
    }
}
