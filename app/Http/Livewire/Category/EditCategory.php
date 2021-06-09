<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Category\IndexCategory;
use App\Http\Livewire\Article\ArticleIndex;

class EditCategory extends ModalComponent
{
    public $name;
    public $categoryId;

    protected $rules = ['name' => 'required'];

    public function mount(Category $category)
    {
        if($category) {
            $this->categoryId = $category->id;
            $this->name = $category->name;
        }
    }

    public function updateCategory()
    {
        $this->validate();
        $category = Category::findOrFail($this->categoryId);
        $category->update(['name' => $this->name]);
        $this->closeModalWithEvents(['categoriesUpdated',
        IndexCategory::getName() => 'categoriesUpdated',
        ArticleIndex::getName() => 'categoriesUpdated']);
    }

    public function render()
    {
        return view('livewire.category.edit-category');
    }
}
