<?php

namespace App\Http\Livewire\Tag;

use LivewireUI\Modal\ModalComponent;
use App\Models\Tag;

class IndexTag extends ModalComponent
{
    public $search;
    public $tags;
    public $listeners = ['tagsUpdated' => 'render'];

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        $this->tags = Tag::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.tag.index-tag', ['tags' => $this->tags]);
    }
}
