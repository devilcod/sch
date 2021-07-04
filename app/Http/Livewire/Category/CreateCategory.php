<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Tag\IndexTag;
use App\Http\Livewire\Article\ArticleIndex;

class CreateCategory extends ModalComponent
{
public $name;

    protected $rules = ['name' => 'required'];

    public function render()
    {
        return view('livewire.category.create-category');
    }

    public function addCategory()
    {
        $data = $this->validate();
        Category::create($data);
        $this->reset();
        $this->dispatchBrowserEvent('categoriesUpdated');
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexTag::getName() => 'categoriessUpdated',
        ArticleIndex::getName() => 'categoriesUpdated']);
    }
}
