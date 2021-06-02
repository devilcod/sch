<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article-index', compact('articles'));
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
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'category_id' => 'nullable',
            'tag_id' => 'nullable',
            'paragraph' => 'required',
        ]);
        $thumbnail = $request->file('thumbnail');
        $thumbnail->storeAs('public/thumbnails', $thumbnail->hashName());
        $article = Article::create([
            'title' => $request->title,
            'thumbnail' => $thumbnail->hashName(),
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'paragraph' => $request->paragraph,
        ]);
        if($article)
        {
            return redirect()->route('articles.index');
        }
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
        // $data = Article::findOrFail($article);
        // dd($data);
        $categories = Category::all();
        $tags = Tag::all();
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
            'title'         => 'required',
            'thumbnail'      => 'nullable|image|mimes:png,jpg,jpeg',
            'category_id'   => 'nullable',
            'tag_id'        => 'nullable',
            'paragraph'     => 'required'
        ]);

        $article = Article::findOrFail($request->article);

        if(!$request->file('thumbnail')) {

            $article->update([
                'title'         => $request->title,
                'thumbnail'      => $request->thumbnail,
                'category_id'   => $request->category_id,
                'tag_id'        => $request->tag_id,
                'paragraph'     => $request->paragraph
            ]);

        } else {

            //hapus old image
            Storage::delete("public/thumbnails/" .$article->thumbnail);

            //upload new image
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/thumbnails/', $thumbnail->hashName());

            $article->update([
                'title'        => $request->title,
                'thumbnail'    => $thumbnail->hashName(),
                'category_id'  => $request->category_id,
                'tag_id'       => $request->tag_id,
                'paragraph'    => $request->paragraph,
            ]);

        }
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
        // dd($article);
        Storage::delete("public/thumbnails/" .$article->thumbnail);
        $article->delete();

        return redirect()->route('articles.index');
    }
}