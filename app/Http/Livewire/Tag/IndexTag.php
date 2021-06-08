<?php

namespace App\Http\Livewire\Tag;

use LivewireUI\Modal\ModalComponent;
use App\Models\Tag;

class IndexTag extends ModalComponent
{

    public $listeners = ['tagsUpdated' => 'render'];

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        $tags = Tag::all();
        return view('livewire.tag.index-tag', compact('tags'));
    }
}
