<?php

namespace App\Http\Livewire\Tag;

use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Tag\IndexTag;
use App\Http\Livewire\Article\ArticleIndex;
use App\Models\Tag;

class DeleteTag extends ModalComponent
{
    public $tagId;

    public function mount(Tag $tag)
    {
        $this->tagId = $tag;
    }

    public function deleteTag()
    {
        $this->tagId->articles()->detach();
        $this->tagId->delete();
        $this->closeModalWithEvents(['tagsUpdated',
        IndexTag::getName() => 'tagsUpdated',
        ArticleIndex::getName() => 'tagsUpdated']);
    }

    public function render()
    {
        return view('livewire.tag.delete-tag');
    }
}
