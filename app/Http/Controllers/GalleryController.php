<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Upload::latest()->get();
        return view('gallery', compact('images'));
    }
}
