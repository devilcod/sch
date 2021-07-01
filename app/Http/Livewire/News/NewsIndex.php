<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Article;

class NewsIndex extends Component
{
    public function render()
    {
        $articles = Article::with(['category', 'tags'])->get();
        return view('livewire.news.news-index', compact('articles'))->layout('layouts.read');
    }
}
