<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleIndex extends Component
{
    public $search;
    public $articles;
    public $amount_data = 3;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $listeners = [
        'categoriesUpdated' => 'render',
        'tagsUpdated' => 'render',
        'articlesUpdated' => 'render',
        'beginSearch' => 'render',
    ];

    public function render()
    {
        $this->articles = Article::where('title', 'like', '%'.$this->search.'%')->take($this->amount_data)->orderBy('updated_at','desc')->get();
        return view('livewire.article.article-index', ['articles' => $this->articles]);
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->tags()->detach();
        Storage::delete($article->thumbnail);
        $article->delete();
        $this->emit('articlesUpdated');
    }
    public function load()
    {
        $this->amount_data += 3;
    }
}
