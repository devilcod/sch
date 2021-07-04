<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Article;

class NewsIndex extends Component
{
    public $search;
    // public $articles;
    public $amount_data = 6;

    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {
        $articles = Article::where('title', 'like', '%'.$this->search.'%')->take($this->amount_data)->orderBy('updated_at','desc')->get();
        return view('livewire.news.news-index', ['articles' => $articles])->extends('layouts.read');
    }

    public function load_more()
    {
        $this->amount_data += 6;
    }
}
