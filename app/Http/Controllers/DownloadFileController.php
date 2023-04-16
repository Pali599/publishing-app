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

    public function downloadJournal($filename)
    {
        $file_path = public_path('uploads/journal/' . $filename);

        if (file_exists($file_path)) {
            return response()->download($file_path, $filename);
        } else {
            return abort(404, 'File not found');
        }
    }

    public function downloadLetter($filename)
    {
        $file_path = public_path('uploads/cover_letter/' . $filename);

        if (file_exists($file_path)) {
            return response()->download($file_path, $filename);
        } else {
            return abort(404, 'File not found');
        }
    }
}
