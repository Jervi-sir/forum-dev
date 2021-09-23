<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function storeUploads(Request $request)
    {

        $response = cloudinary()->upload($request->input('image'))->getSecurePath();

        dd($response);

        return back()
            ->with('success', 'File uploaded successfully');
    }

}
