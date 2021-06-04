<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class FilepondController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('thumbnails/tmp/' . $folder, $filename, 'public');

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }
}
