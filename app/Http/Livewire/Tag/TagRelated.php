<?php

namespace App\Http\Livewire\Tag;

use Livewire\Component;
use App\Models\Tag;

class TagRelated extends Component
{
    public $tag;

    public function mount(Tag $tag)
    {
        $this->tag = Tag::findOrFail($tag->id);
    }
    public function render()
    {
        $articles = $this->tag->articles()->get();
        return view('livewire.tag.tag-related', ['articles' => $articles])->layout('layouts.read');
    }
}
