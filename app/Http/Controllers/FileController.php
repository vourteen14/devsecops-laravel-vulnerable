<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|max:20480', 
        ]);

        $originalFilename = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->storeAs('uploads', $originalFilename, 'public');

        Upload::create([
            'filename' => $originalFilename,
            'path' => $path,
        ]);

        return redirect()->route('gallery')->with('success', 'File uploaded successfully!');
    }
}
