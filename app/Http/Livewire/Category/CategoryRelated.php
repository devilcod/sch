<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\Article;

class CategoryRelated extends Component
{
    public $category;

    public function mount(Category $category)
    {
        $this->category = Category::find($category->id);
    }

    public function render()
    {
        $articles = Article::where('category_id', $this->category->id)->with('tags')->get();
        return view('livewire.category.category-related', compact('articles'))->layout('layouts.read');
    }
}
