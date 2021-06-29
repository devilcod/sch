<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleIndex extends Component
{
    public $search;
    public $articles;

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
        $this->articles = Article::where('title', 'like', '%'.$this->search.'%')->get();
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
}
