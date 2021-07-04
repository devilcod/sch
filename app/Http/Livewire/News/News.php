<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Article;

class News extends Component
{
    public function render()
    {
        $news = Article::with('tags')->take(3)->orderBy('updated_at','desc')->get();
        return view('livewire.news.news', compact('news'));

    }
}
