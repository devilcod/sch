<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article-create',compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'nullable',
            'tag_id' => 'nullable',
            'paragraph' => 'required',
        ]);
        $article = Article::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'paragraph' => $request->paragraph,
        ]);
        $article->tags()->attach(request('tags'));
            if($request->thumbnail)
            {
                $temporaryFile = TemporaryFile::where('folder', $request->thumbnail)->first();
                if($temporaryFile){
                $thumbnail = $article->addMedia(storage_path('app/public/thumbnails/tmp/' . $request->thumbnail . '/' . $temporaryFile->filename))
                        ->toMediaCollection('thumbnails');
                    rmdir(storage_path('app/public/thumbnails/tmp/' . $request->thumbnail));
                    $temporaryFile->delete();
                }

                $article->update(['thumbnail' => $thumbnail->getUrl()]);
            }
            $request->session()->flash('flash.banner', 'Created!');
            return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('article-edit', compact(['article', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'nullable',
            'paragraph' => 'required',
        ]);

        $article = Article::findOrFail($request->article);
        if($request->thumbnail) {
            // Storage::delete($article->thumbnail);
            $temporaryFile = TemporaryFile::where('folder', $request->thumbnail)->first();
                if($temporaryFile){
                $thumbnail = $article->addMedia(storage_path('app/public/thumbnails/tmp/' . $request->thumbnail . '/' . $temporaryFile->filename))
                        ->toMediaCollection('thumbnails');
                    rmdir(storage_path('app/public/thumbnails/tmp/' . $request->thumbnail));
                    $temporaryFile->delete();
                }
                $thumbnail_url = $thumbnail->getUrl();

            $article->update([
                'title'        => $request->title,
                'category_id'  => $request->category_id,
                'tag_id'       => $request->tag_id,
                'paragraph'    => $request->paragraph,
                'thumbnail' => $thumbnail_url,
            ]);
        } else {
            $article->update([
                'title'         => $request->title,
                'thumbnail'      => $request->thumbnail,
                'category_id'   => $request->category_id,
                'paragraph'     => $request->paragraph,
                'thumbnail'     => $article->thumbnail,
            ]);
            $article->tags()->sync(request('tags'));
        }
        $request->session()->flash('flash.banner', 'Updated!');
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        Storage::delete($article->thumbnail);
        $article->delete();

        return redirect()->route('articles.index');
    }
}
