<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Article;

class NewsRead extends Component
{
    public $article;
    public $title;
    public $category;
    public $tags;
    public $thumbnail;
    public $paragraph;

    public function mount(Article $article)
    {
        $this->article = Article::find($article);
        $this->title = $article->title;
        $this->category = $article->category;
        $this->tags = $article->tags;
        $this->thumbnail = $article->thumbnail;
        $this->paragraph = $article->paragraph;
        visits($article)->increment();
    }
    public function render()
    {
        return view('livewire.news.news-read')
        ->extends('layouts.read');
    }
}
