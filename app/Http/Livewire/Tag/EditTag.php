<?php

namespace App\Http\Livewire\Tag;

use LivewireUI\Modal\ModalComponent;
use App\Models\Tag;
use App\Http\Livewire\Tag\IndexTag;
use App\Http\Livewire\Article\ArticleIndex;

class EditTag extends ModalComponent
{
    public $name;
    public $tagId;

    protected $rules = ['name' => 'required'];

    public function mount(Tag $tag)
    {
        if($tag) {
            $this->tagId = $tag->id;
            $this->name = $tag->name;
        }
    }

    public function updateTag()
    {
        $this->validate();
        $tag = Tag::findOrFail($this->tagId);
        $tag->update(['name' => $this->name]);
        $this->closeModalWithEvents(['tagsUpdated',
        IndexTag::getName() => 'tagsUpdated',
        ArticleIndex::getName() => 'tagsUpdated']);
    }

    public function render()
    {
        return view('livewire.tag.edit-tag');
    }
}
