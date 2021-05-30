<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ArticleCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $thumbnail;
    public $category_id;
    public $tag_id;
    public $paragraph;


    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'thumbnail' => 'nullable|image',
        'category_id' => 'nullable',
        'tag_id' => 'nullable',
        'paragraph' => 'required',
    ];

    public function addArticle()
    {
        $this->slug = Str::slug($this->title);
        $data = $this->validate();
        $thumbnail_name = $this->thumbnail->store('thumbnails', 'public');
        $data['thumbnail'] = $thumbnail_name;
        Article::create($data);
        $this->reset();
    }
    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('livewire.article.article-create',compact(['categories','tags']));
    }
}
