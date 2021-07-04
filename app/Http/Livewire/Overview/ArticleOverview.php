<?php

namespace App\Http\Livewire\Overview;

use Livewire\Component;
use App\Models\Article;

class ArticleOverview extends Component
{
    public function render()
    {
        $articles = Article::all();
        $topArticles = visits('App\Models\Article')->top(3);
        return view('livewire.overview.article-overview', compact('articles', 'topArticles'));
    }
}
