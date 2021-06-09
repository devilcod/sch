<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Tag\IndexTag;
USE App\Http\Livewire\Article\ArticleIndex;

class CreateTag extends ModalComponent
{
    public $name;

    protected $rules = ['name' => 'required'];

    public function render()
    {
        return view('livewire.tag.create-tag');
    }

    public function addTag()
    {
        $data = $this->validate();
        $tags = explode(',', $data['name']);
        foreach ($tags as $tag) {
            $itemTag = Tag::where('name', trim($tag))->first();

            if (!$itemTag) {
                $itemTag = Tag::create(['name' => trim($tag)]);
            }

        }
        $this->reset();
        $this->closeModalWithEvents(['tagsUpdated',
        IndexTag::getName() => 'tagsUpdated',
        ArticleIndex::getName() => 'tagsUpdated']);
    }

}
