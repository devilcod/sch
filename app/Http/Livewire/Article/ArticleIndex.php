<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use  App\Models\Article;

class ArticleIndex extends Component
{
    public $listeners = [
        'categoriesUpdated' => 'render',
        'tagsUpdated' => 'render'
    ];

    public function render()
    {
        $articles = Article::all();
        return view('livewire.article.article-index',compact('articles'));

    }
}
