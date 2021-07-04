<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show(Request $request, Article $article)
    {
        $article = Article::findOrFail($article);
        $file = Storage::get($article->thumbnail);
        return $file;
    }
}
