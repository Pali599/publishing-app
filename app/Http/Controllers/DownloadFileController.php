<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    public function download($filename)
    {
        $file_path = public_path('uploads/article/' . $filename);

        if (file_exists($file_path)) {
            return response()->download($file_path, $filename);
        } else {
            return abort(404, 'File not found');
        }
    }
}
